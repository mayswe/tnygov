<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class JudgementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $causelists = App\JudgementList::all();
        $causelist_cats = App\CauseListCat::all();
        return view('Backend.causelists')->with([
        'causelists'=>$causelists,
        'causelist_cats'=>$causelist_cats,
       
        ]);
    }

    /**
     * Get Edit Daily Activity Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCauseList($id)
    {
        $causelists= App\JudgementList::find($id);
        $causelist_cats = App\CauseListCat::all();
        return view('Backend.edit-causelist')->with([
            'causelists'=>$causelists,
            'causelist_cats'=>$causelist_cats,
           
        ]);
    }

    /**
     * Update Daily Activity
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCauseList(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'name_en'=>'required|string|max:255',
                'category_id'=>'required|numeric',
                
            ]);

        $causelists = App\JudgementList::find($id);
        if (!empty($request->file('pdf_file'))) {
            unlink('uploads/causelists/' . $causelists->pdf_file);
            $pdfName = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/causelists/', $pdfName);
            $causelists->pdf_file = $pdfName;
        }
        $causelists->name = $request->name;
        $causelists->name_en = $request->name_en;
        $causelists->category_id = $request->category_id;      
        $causelists->save();
        Session::flash('success', 'Your Cause Lists has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Cause List.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCauseList($id)
    {
        $causelists = App\JudgementList::find($id);
        unlink('uploads/causelists/' . $causelists->pdf_file);
        $causelists->delete();
        Session::flash('success', 'Your Cause List Has been Deleted Successfully');
        return redirect()->route('causelistspage');
    }

    /**
     * Get Edit Category Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $causelist_cats = App\CauseListCat::find($id);
        return view('Backend.edit-causelistcategory')->with([
            'causelist_cats'=>$causelist_cats,
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

        $caueslist_cats = App\CauseListCat::find($id);
        $caueslist_cats->name = $request->name;
        $caueslist_cats->name_en = $request->name_en;
        $caueslist_cats->save();
        Session::flash('success', 'Your Category has been updated successfully.');
        return redirect()->route('causelistspage');
    }

    /**
     * Delete Daily Activity CAtegory.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $category = App\CauseListCat::find($id);
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
            App\CauseListCat::create([
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
    public function addCauseList(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'name_en'=>'required|string|max:255',
            'category_id'=>'required|numeric',
            'pdf_file' =>'required',

        ]);

        if (!empty($request->pdf_file)) {
            $new_name = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/causelists/', $new_name);
            App\JudgementList::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'category_id' => $request->category_id,
            'pdf_file' => $new_name,
            'show_date' => $request->show_date,
            ]);
            Session::flash('success', 'Your New Cause List Had Been Added Successfully.');
            return redirect()->route('causelistspage');
        }
    }
}
