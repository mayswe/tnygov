<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $news = App\DepartmentDetail::all()->sortByDesc("id");
        $position = App\Position::all();
        $township = App\Township::all();
        return view('Backend.department')->with([
        'news'=>$news,
        'position'=>$position,
        'township'=>$township,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editDepartment($id)
    {
        $news = App\DepartmentDetail::find($id);
        $position = App\Position::all();
        $township = App\Township::all();
        $news_img = App\DDImage::all();
        return view('Backend.edit-dd')->with([
            'news'=>$news,
            'position'=>$position,
        'township'=>$township,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDepartment(Request $request, $id)
    {
        $position = App\Position::all();
        $township = App\Township::all();
        $this->validate($request, [
                'name'=>'required',
            ]);
        $news = App\DepartmentDetail::find($id);
       if($files=$request->file('images')){
            foreach($files as $file){
              
                
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/dd/',$name);
                
                App\DDImage::create([
                'news_id'=>  $id,    
                'name'=>  $name,
            ]);
            
            }
        }
        
        $covid = $request->covid;
        if($covid==1){
            
        
            if (!empty($request->file('cover'))) {
            //unlink('uploads/slider/' . $slider->slide);
            $filename = time() . $request->file('cover')->getClientOriginalName();
            $slide = str_replace(' ', '', $filename);
            $request->cover->move('uploads/covid/', $slide);
            $cover = $slide;
        }
        $covid = App\Covid::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'body_en' => $request->body_en,
            'image'=>  $cover,
            'news_date' => $request->news_date,
            ]);
        }
      
        $news->name = $request->name;
        $news->short_description = $request->short_description;
        $news->body = $request->body;
        $news->name_en = $request->name_en;
        $news->short_description_en = $request->short_description_en;
        $news->body_en = $request->body_en;
        $news->news_date = $request->news_date;
        $news->position = $request->position;
        $news->tsp = $request->township;
        $news->save();
        Session::flash('success', 'Your Department Detail has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDDImage($id)
    {
        $news = App\DDImage::find($id);
        $news->delete();
        Session::flash('success', 'Your Image Has been Deleted Successfully');
        return redirect()->back();
    }
    
    public function deleteDepartment($id)
    {
        $news = App\DepartmentDetail::find($id);
        $news->delete();
        Session::flash('success', 'Your Department Detail Has been Deleted Successfully');
        return redirect()->route('departmentpage');
    }
    
    
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function addDepartment(Request $request)
    {
        $user = \Auth::user();
        $images=array();
        $this->validate($request, [
            'name'=>'required',
        ]);
        
           
            $news = App\DepartmentDetail::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'body_en' => $request->body_en,
            'image'=>  implode("|",$images),
            'tsp' => $request->township,
            'position' => $request->position,
            'news_date' => $request->news_date,
            ]);
            
            $news_id =  $news->id;
        
            if($files=$request->file('images')){
                
            foreach($files as $file){
                $i = 1;
                
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/dd/',$name);
                
                App\DDImage::create([
                'news_id'=>  $news_id,    
                'name'=>  $name,
            ]);
            if($i==1){
                $cover = $name;
            }
            $i++;
            }
        }
        $covid = $request->covid;
        if($covid==1){
            
            if (!empty($request->cover)) {
            $filename = time() . $request->file('cover')->getClientOriginalName();
            $slide = str_replace(' ', '', $filename);
            $request->cover->move('uploads/covid/', $slide);
            $cover = $slide;
            }else{
              $cover = NULL;
          }
          
            $covid = App\Covid::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'body_en' => $request->body_en,
            'image'=>  $cover,
            'news_date' => $request->news_date,
            ]);
        }
        
        
            
            
            Session::flash('success', 'Your Department Detail Had Been Added Successfully.');
            return redirect()->route('departmentpage');
        
    }
    
}
