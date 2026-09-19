<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class DailyActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $activities = App\DailyActivity::all();
        $activitiy_cats = App\DailyActivityCat::all();
        return view('Backend.dailyactivities')->with([
        'activities'=>$activities,
        'activity_cats'=>$activitiy_cats,
        ]);
    }

    /**
     * Get Edit Daily Activity Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editActivity($id)
    {
        $activities= App\DailyActivity::find($id);
        $activity_cats = App\DailyActivityCat::all();
        return view('Backend.edit-dailyactivity')->with([
            'activities'=>$activities,
            'activity_cats'=>$activity_cats,
            
        ]);
    }

    /**
     * Update Daily Activity
     *
     * @return \Illuminate\Http\Response
     */
    public function updateActivity(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
            ]);

        $activities = App\DailyActivity::find($id);
       
        $activities->name = $request->name;
        $activities->name_en = $request->name_en;
        $activities->short_description =$request->short_description;
        $activities->short_description_en =$request->short_description_en;
        $activities->body =$request->body;
        $activities->body_en =$request->body_en;
        $activities->save();
        Session::flash('success', 'Your Daily Activity has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Daily Activity.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteActivity($id)
    {
        $activities = App\DailyActivity::find($id);
        $activities->delete();
        Session::flash('success', 'Your Daily Activity Has been Deleted Successfully');
        return redirect()->route('dailyactivitiespage');
    }

    /**
     * Get Edit Category Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $activity_cats = App\DailyActivityCat::find($id);
        return view('Backend.edit-dailyactivitycategory')->with([
            'activity_cats'=>$activity_cats,
        ]);
    }

     /**
     * Update Daily Activity Category
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'name_en'=>'required|string|max:255',
            ]);

        $activitiy_cats = App\DailyActivityCat::find($id);
        $activitiy_cats->name = $request->name;
        $activitiy_cats->name_en = $request->name_en;
        $activitiy_cats->save();
        Session::flash('success', 'Your Category has been updated successfully.');
        return redirect()->route('dailyactivitiespage');
    }

    /**
     * Delete Daily Activity CAtegory.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $category = App\DailyActivityCat::find($id);
        $category->delete();
        Session::flash('success', 'Your Category Has been Deleted Successfully');
        return redirect()->back();
    }

        /**
     * Add a newly Daily Activity category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);
            App\DailyActivityCat::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            ]);
            Session::flash('success', 'Your New Category Had Been Added Successfully.');
            return redirect()->back();
    }
        /**
     * Add a new daily activity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addActivity(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',

        ]);

        
            App\DailyActivity::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'short_description' => $request->short_description,
            'short_description_en' => $request->short_description_en,
            'body' => $request->body,
            'body_en' => $request->body_en,
            ]);
            Session::flash('success', 'Your New Daily Activity Had Been Added Successfully.');
            return redirect()->route('dailyactivitiespage');
    
    }
}
