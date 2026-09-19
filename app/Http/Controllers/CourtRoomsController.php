<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class CourtRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courtrooms = App\CourtRoom::all();
        $courtroom_cats = App\CourtRoomCat::all();
        return view('Backend.courtrooms')->with([
        'courtrooms'=>$courtrooms,
        'courtroom_cats'=>$courtroom_cats,
        ]);
    }

    /**
     * Get Edit Court Room Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCourtRoom($id)
    {
        $courtroom = App\CourtRoom::find($id);
        $courtroom_cat = App\CourtRoomCat::all();
        return view('Backend.edit-courtroom')->with([
            'courtroom'=>$courtroom,
            'courtroom_cat'=>$courtroom_cat,
        ]);
    }

    /**
     * Update Announcement
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCourtRoom(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'category_id'=>'required|numeric',
                'show_date' => 'required',
                'long_description'=>'required|string',
            ]);

        $courtrooms = App\CourtRoom::find($id);
        $courtrooms->name = $request->name;
        $courtrooms->category_id = $request->category_id;
        $courtrooms->show_date = $request->show_date;
        $courtrooms->long_description = $request->long_description;
        $courtrooms->save();
        Session::flash('success', 'Your Court Room has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Court Room.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCourtRoom($id)
    {
        $courtrooms = App\CourtRoom::find($id);
        $courtrooms->delete();
        Session::flash('success', 'Your Court Room Has been Deleted Successfully');
        return redirect()->route('courtroomspage');
    }

    /**
     * Get Edit Category Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $courtroom_cats = App\CourtRoomCat::find($id);
        return view('Backend.edit-courtroomcategory')->with([
            'courtroom_cats'=>$courtroom_cats,
        ]);
    }

     /**
     * Update Court Room Category
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
            ]);

        $courtroom_cats = App\CourtRoomCat::find($id);
        $courtroom_cats->name = $request->name;
        $courtroom_cats->save();
        Session::flash('success', 'Your Category has been updated successfully.');
        return redirect()->route('courtroomspage');
    }

    /**
     * Delete Court Room CAtegory.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $courtroom_cats = App\CourtRoomCat::find($id);
        $courtroom_cats->delete();
        Session::flash('success', 'Your Category Has been Deleted Successfully');
        return redirect()->back();
    }

        /**
     * Add a newly court room category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
            App\CourtRoomCat::create([
            'name' => $request->name,
            ]);
            Session::flash('success', 'Your New Category Had Been Added Successfully.');
            return redirect()->back();
    }
        /**
     * Add a new announcement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCourtRoom(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'category_id'=>'required|numeric',
            'show_date' => 'required',
            'long_description'=>'required|string',
        ]);
            App\CourtRoom::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'show_date' => $request->show_date,
            'long_description' => $request->long_description,
            ]);
            Session::flash('success', 'Your New CourtRoom Had Been Added Successfully.');
            return redirect()->route('courtroomspage');

    }
}
