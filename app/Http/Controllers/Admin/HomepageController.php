<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

use App\Ad;

class HomepageController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }


    /** 
     * @return collection App\Homepage
     * @return homepage index view
     */
    public function index()
    {
        $ads = Ad::where('isSlider', 0)->get();
        $sliders = Ad::where('isSlider', 1)->get();
        return view('multiauth::homepage.index', [
            'ads' => $ads, 
            'sliders' => $sliders->sortBy('sort'),
        ]);
    }

    /** 
     * @param Request $request
     * 
     * @return redirect
     */
    public function store(Request $request)
    {
        $request->validate([
            'adLink' => 'required|max:255|string',
            'adImage' => 'image|mimes:jpg,jpeg,png,svg|max:10000|required',
            'isSlider' => 'required',
        ]);

        // upload image
        $imagename = time() . '-' . Str::random(8) . '.' . $request->adImage->getClientOriginalExtension();
        $request->adImage->move(public_path('uploads/ads'), $imagename);
        // end upload image
        $ad = new Ad();
        $ad->link = $request->adLink;
        $ad->image = $imagename;
        if($request->isSlider == 1) {
            $ad->isSlider = 1;    
        }
        $ad->save();

        return redirect()->route('admin.homepage.index');
    }

    /** 
     * change slider sort
     * 
     * @return echo json_encode
     */
    public function changeSort(Request $request)
    {   
        $a = 1;
        foreach($request->ids as $id){
            Ad::where('isSlider', 1)->where('id', $id)->update(['sort' => $a]);
            $a++;
            dump($a);
        }
        $a = 1;
        return json_encode('success');
    }

    /**
     * get details for every ad
     * 
     * @param Request $request (id of ad)
     * 
     * @return json_encode 
     */
    public function getDetails(Request $request)
    {
        $ad = Ad::findOrFail($request->id);
        $ad->updateUrl = route('admin.homepage.update', ['homepage' => $ad->id]);
        return json_encode($ad);
    }

    /** 
     * update ad
     * 
     * @param Request $request
     * 
     * @return redirect to route
     */
    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        // dd($request);
        $request->validate([
            'adLink' => 'max:255|required',
            'adImage' => 'image|mimes:jpg,jpeg,png,svg|max:10000|required' 
        ]);

        @unlink(public_path('uploads/ads'), $ad->image);
        $imagename = time() . '-' . Str::random(8) . '.' . $request->adImage->getClientOriginalExtension();
        $request->adImage->move(public_path('uploads/ads'), $imagename);
        Ad::where('id', $id)->update([
            'link' => $request->adLink,
            'image' => $imagename,
        ]);
        return redirect()->route('admin.homepage.index');
    }

    /**
     * delete ad
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        @unlink(public_path('uploads/ads/'.$ad->image));
        $ad->delete();
        return redirect()->route('admin.homepage.index');
    }
}
