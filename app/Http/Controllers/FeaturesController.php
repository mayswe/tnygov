<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = App\Feature::all();
        $why = App\Feature::find(1);
        return view('Backend.features')->with([
        'features'=>$features,
        'why'=>$why,
        ]);
    }

           /**
     * Get Edit feature Form.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function editFeature($id)
    {
        $feature = App\Feature::find($id);
        return view('Backend.edit-feature')->with('feature', $feature);
    }

        /**
     * Update Feature.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given feature
     * @return \Illuminate\Http\Response
     */
    public function updateFeature(Request $request, $id)
    {
        $feature = App\Feature::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            ]);
        $feature->title = $request->name;
        $feature->icon = $request->icon;
        $feature->save();
        Session::flash('success', 'Your Feature has been updated successfully.');
        return redirect()->route('featurespage');
    }

            /**
     * delete Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given feature
     * @return \Illuminate\Http\Response
     */
    public function deleteFeature($id)
    {
        $feature = App\Feature::find($id);
        $feature->delete();
        Session::flash('success', 'Your Feature had been Deleted successfully.');
        return redirect()->route('featurespage');
    }

          /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function addFeature()
    {
        return view('Backend.add-feature');
    }

            /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function storeFeature(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255'
            ]);
        App\Feature::create([
            'title' => $request->name,
            'icon' => $request->icon,
        ]);
        Session::flash('success', 'Your Feature had been Added successfully.');
        return redirect()->route('featurespage');
    }
}
