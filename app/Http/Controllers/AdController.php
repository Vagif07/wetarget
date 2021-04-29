<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class AdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        $paginate = 5;
        $orderBy = 'DESC';
        $ads = $user->ads();

        if (request()->get('q') != null) {
            $q = request()->get('q');
            $ads->where("id", "LIKE", "%" . $q . "%");
        }

        if (request()->get('paginate') != null) {
            $paginate = request()->get('paginate');
        }

        if (request()->get('orderBy') != null) {
            $orderBy = request()->get('orderBy');
        }

        $ads = $ads->orderBy('created_at', $orderBy)->paginate($paginate);

        return view('company.ads.list')->with(['ads' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->has('image')) {
            $filename = 'ad_' . time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('public')->put($filename, file_get_contents($request->image));
        }

        Ad::create([
            'name'          => $request->name,
            'description'   => $request->description ?? null,
            'image'         => $filename ?? null,
            'ad_type'       => $request->ad_type,
            'action_link'   => $request->action_link,
            'width'         => $request->width,
            'height'        => $request->height,
            'ad_placement'  => $request->ad_placement,
            'currency'      => $request->currency,
            'rate'          => Helper::getCurrencyRate($request->currency),
            'daily_budget'  => $request->daily_budget,
            'tags'          => json_decode($request->tags),
            'status'        => 'PENDING_REVIEW',
            'start_time'    => $request->start_time,
            'end_time'      => $request->end_time,
            'user_id'       => $user->id,
        ]);

        return redirect('/ads')->with('success', 'The ad was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('company.ads.edit')->with(['ad' => $ad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Ad $ad)
    {
        $logo = $ad->image;

        $ad->update($request->all());
        $ad->tags = explode(',', $request->tags);
        $ad->status = 'PENDING_REVIEW';

        // If there is any logo attached to the request, rename and store it
        if ($request->has('image')) {

            // Remove previous logo, if there was any
            if (isset($logo)) {
                Storage::disk('public')->delete($logo);
            }

            $filename = 'ad_' . time() . '.' . $request->image->getClientOriginalExtension();
            Storage::disk('public')->put($filename, file_get_contents($request->image));

            $ad->image = $filename;
        }

        $ad->save();

        return redirect('/ads')->with('success', 'The ad was successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ad $ad)
    {

        if (isset($ad->image)) {
            Storage::disk('public')->delete($ad->image);
        }

        $ad->delete();

        return redirect()->back()->with('success', 'The ad was successfully deleted!');
    }
}
