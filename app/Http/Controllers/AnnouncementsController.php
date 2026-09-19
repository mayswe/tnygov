<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $announcements = App\Announcement::all()->sortByDesc("id");
        $announcement_cats = App\AnnouncementCat::all();
        return view('Backend.announcements')->with([
        'announcements'=>$announcements,
        'announcement_cats'=>$announcement_cats,
        ]);
    }

    /**
     * Get Edit Announcement Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAnnouncement($id)
    {
        $announcement = App\Announcement::find($id);
        $announcement_cats = App\AnnouncementCat::all();
        return view('Backend.edit-announcement')->with([
            'announcement'=>$announcement,
            'announcement_cats'=>$announcement_cats,
        ]);
    }

    /**
     * Update Announcement
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAnnouncement(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'category_id'=>'required|numeric',
            ]);

        $announcements = App\Announcement::find($id);
        if (!empty($request->file('pdf_file'))) {
            $pdfName = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/announcements/', $pdfName);
            $announcements->pdf_file = $pdfName;
        }
        if (!empty($request->file('image'))) {
            $cover = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/announcements/', $cover);
            $announcements->cover = $cover;
        }
        $announcements->name = $request->name;
        $announcements->category_id = $request->category_id;
        $announcements->long_description = $request->long_description;
        $announcements->save();
        Session::flash('success', 'Your Announcement has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Announcement.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAnnouncement($id)
    {
        $announcements = App\Announcement::find($id);
        //unlink('uploads/announcements/' . $announcements->pdf_file);
        $announcements->delete();
        Session::flash('success', 'Your Announcement Has been Deleted Successfully');
        return redirect()->route('announcementspage');
    }

    /**
     * Get Edit Category Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $announcement_cats = App\AnnouncementCat::find($id);
        return view('Backend.edit-announcementcategory')->with([
            'announcement_cats'=>$announcement_cats,
        ]);
    }

     /**
     * Update Announcement Category
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
            ]);

        $announcement_cats = App\AnnouncementCat::find($id);
        $announcement_cats->name = $request->name;
        $announcement_cats->save();
        Session::flash('success', 'Your Category has been updated successfully.');
        return redirect()->route('announcementspage');
    }

    /**
     * Delete Announcement CAtegory.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $category = App\AnnouncementCat::find($id);
        $category->delete();
        Session::flash('success', 'Your Category Has been Deleted Successfully');
        return redirect()->back();
    }

        /**
     * Add a newly announcement category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
            App\AnnouncementCat::create([
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
    public function addAnnouncement(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'category_id'=>'required|numeric',
        ]);
        
        if (!empty($request->image)) {
            $cover = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/announcements/', $cover);
        }else{
            $cover = NULL;
        }
        if (!empty($request->pdf_file)) {
            $new_name = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/announcements/', $new_name);
        }else{
            $new_name =  NULL;
        }
            App\Announcement::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'long_description' => $request->long_description,
            'pdf_file' => $new_name,
            'cover' => $cover,
            ]);
            Session::flash('success', 'Your New Announcement Had Been Added Successfully.');
            return redirect()->route('announcementspage');
        
    }
}
