<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $medias = App\Media::all();
        $media_cats = App\MediaCat::all();
        return view('Backend.medias')->with([
        'medias'=>$medias,
        'media_cats'=>$media_cats,
       
        ]);
    }

    /**
     * Get Edit Daily Activity Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editMedia($id)
    {
        $medias= App\Media::find($id);
        $media_cats = App\MediaCat::all();
        return view('Backend.edit-media')->with([
            'medias'=>$medias,
            'media_cats'=>$media_cats,
           
        ]);
    }

    /**
     * Update Daily Activity
     *
     * @return \Illuminate\Http\Response
     */
    public function updateMedia(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'name_en'=>'required|string|max:255',
                'category_id'=>'required|numeric',
            ]);

        $medias = App\Media::find($id);

      
        
        $medias->name = $request->name;
        $medias->name_en = $request->name_en;
        $medias->category_id = $request->category_id;      
        $medias->show_date = $request->show_date;
        $medias->media_file = $request->media_file;
        $medias->media_file_en = $request->media_file_en;
        $medias->save();
        Session::flash('success', 'Your Media has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Cause List.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMedia($id)
    {
        $medias = App\Media::find($id);
        $medias->delete();
        Session::flash('success', 'Your Media Has been Deleted Successfully');
        return redirect()->route('mediaspage');
    }

    /**
     * Get Edit Category Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $media_cats = App\MediaCat::find($id);
        return view('Backend.edit-mediacategory')->with([
            'media_cats'=>$media_cats,
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
            ]);

        $media_cats = App\MediaCat::find($id);
        $media_cats->name = $request->name;
        $media_cats->save();
        Session::flash('success', 'Your Category has been updated successfully.');
        return redirect()->route('mediaspage');
    }

    /**
     * Delete Daily Activity CAtegory.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $media_cat = App\MediaCat::find($id);
        $media_cat->delete();
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
        ]);
            App\MediaCat::create([
            'name' => $request->name,
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
    public function addMedia(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'name_en'=>'required|string|max:255',
            'category_id'=>'required|numeric',
            'media_file' => 'required',
            'media_file_en' => 'required',

        ]);
        if (!empty($request->name)) {
        App\Media::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'category_id' => $request->category_id,
            'show_date' => $request->show_date,
            'media_file' => $request->media_file,
            'media_file_en' => $request->media_file_en,
            ]);
            Session::flash('success', 'Your New Cause List Had Been Added Successfully.');
            return redirect()->route('mediaspage');
    }
    }
}
