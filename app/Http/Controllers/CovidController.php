<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covid = App\Covid::orderBy('news_date','desc')->paginate(10);
        return view('Backend.covid')->with([
        'covid'=>$covid,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCovid($id)
    {
        $covid = App\Covid::find($id);
        return view('Backend.edit-covid')->with([
            'covid'=>$covid,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCovid(Request $request, $id)
    {
        
        $this->validate($request, [
                'name'=>'required|string|max:255',
            ]);
        $covid = App\Covid::find($id);
     
       if (!empty($request->file('image'))) {
            $cover = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/covid/', $cover);
            $covid->image = $cover;
        }
        $covid->name = $request->name;
        $covid->short_description = $request->short_description;
        $covid->body = $request->body;
        $covid->name_en = $request->name_en;
        $covid->short_description_en = $request->short_description_en;
        $covid->body_en = $request->body_en;
        $covid->news_date = $request->news_date;
        $covid->save();
        Session::flash('success', 'Your Covid has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCovidImage($id)
    {
        $covid = App\CovidImage::find($id);
        $covid->delete();
        Session::flash('success', 'Your Image Has been Deleted Successfully');
        return redirect()->back();
    }
    
    public function deleteCovid($id)
    {
        $covid = App\Covid::find($id);
        $covid->delete();
        Session::flash('success', 'Your Covid Has been Deleted Successfully');
        return redirect()->route('covidpage');
    }
    
    
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function addCovid(Request $request)
    {
        $images=array();
        $this->validate($request, [
            'name'=>'required|string|max:255',
        ]);
        if (!empty($request->image)) {
            $cover = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/covid/', $cover);
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
            
            $covid_id =  $covid->id;
        
           
        
            
            
            Session::flash('success', 'Your Covid Had Been Added Successfully.');
            return redirect()->route('covidpage');
        
    }
    
}
