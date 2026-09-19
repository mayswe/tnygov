<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = App\Photo::all();
        
        return view('Backend.photo')->with([
        'news'=>$news,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPhoto($id)
    {
        $news = App\Photo::find($id);
        return view('Backend.edit-photo')->with([
            'news'=>$news,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePhoto(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'name_en'=>'required|string|max:255',
                'show_date'=>'required|string',
                
            ]);

        $news = App\Photo::find($id);
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/photo/',$name);
                $images[]=$name;
            }
            
           
            $news->image =  implode("|",$images);
        }
    
        $news->name = $request->name;
        $news->name_en = $request->name_en;
        $news->show_date = $request->show_date;
        $news->save();
        Session::flash('success', 'Your Photo has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePhoto($id)
    {
        $news = App\Photo::find($id);
        $news->delete();
        Session::flash('success', 'Your Photo Has been Deleted Successfully');
        return redirect()->route('photopage');
    }
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function addPhoto(Request $request)
    {
        $images=array();
        $images_en=array();
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'name_en'=>'required|string|max:255',
            'show_date'=>'required|string',
        ]);
        if($files=$request->file('images')){
            foreach($files as $file){
                
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/photo/',$name);
                $images[]=$name;
            }
        }
            
         
        
            App\Photo::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'show_date' => $request->show_date,
            'image'=>  implode("|",$images),
            ]);
            
            Session::flash('success', 'Your Photo Had Been Added Successfully.');
            return redirect()->route('photopage');
        }
    }