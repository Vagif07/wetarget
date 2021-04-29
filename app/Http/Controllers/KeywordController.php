<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MonkeyLearn\Client;

class KeywordController extends Controller
{

    public function getKeywords(Request $request) {
        $ml = new Client(config('services.monkeylearn.api_key'));
        $data = [
            $request->text
        ];
        $model_id = 'ex_YCya9nrn';
        $res = $ml->extractors->extract($model_id, $data);
        return response()->json($res->result);
    }
}
