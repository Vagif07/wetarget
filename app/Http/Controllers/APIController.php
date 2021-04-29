<?php

namespace App\Http\Controllers;

use App\Keyword;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Customer;
use App\Ad;

class APIController extends Controller
{
    public function saveTags(Request $request) {
        $client = new Client();

        $customer = Customer::where('device', $request->header('User-Agent'))
            ->where('ip_address', $request->ip())
            ->first();

        if ($customer === null) {
            $customer = new Customer();
            $customer->device = $request->header('User-Agent');
            $customer->ip_address = $request->ip();
            $customer->referrer = $request->header('referer') ?? 'Not-Given';
            $customer->save();
        }

        $result = $client->post('http://127.0.0.1:8000/pos', [
            'json' => [
                'text' => $request->text,
            ]
        ]);
        $tags = json_decode($result->getBody(), false)->pos_tags;
        foreach ($tags as $tag) {
            $word = key((array)$tag);
            $pos = current((array)$tag);

            if ($pos === "IS.;") {
                $keyword = new Keyword();
                $keyword->tags = json_encode($word);

                $customer->keywords()->save($keyword);
            }
        }

        $data = [
            'keywords' => $customer->keywords()->orderBy('created_at', 'DESC')->get()
        ];

        return $data;
    }

    public function getAd(Request $request) {

        $customer = Customer::where('device', $request->header('User-Agent'))
            ->where('ip_address', $request->ip())
            ->first();

        $ads = Ad::where('status', 'ACTIVE');
        $keywords = [];

        if ($customer !== null) {
            $keywords = $customer->keywords;

            $ads->whereJsonContains('tags', '');
            foreach ($keywords as $item) {
                $ads->orWhere(function ($query) use ($item) {
                    $query->whereJsonContains('tags', json_decode($item->tags));
                });
            }
        }

        if ($ads->count() === 0) {
            $ads = Ad::where('status', 'ACTIVE');
        }

        $data = [
            'ad' => $ads->inRandomOrder()->first(),
            'keywords' => $keywords
        ];

        return $data;
    }

    public function reset(Request $request) {

        $customer = Customer::where('device', $request->header('User-Agent'))
            ->where('ip_address', $request->ip())
            ->first();

        if ($customer !== null) {
            $customer->keywords->each->delete();
        }
    }
}
