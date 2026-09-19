<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CovidTopBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = App\CovidTopBox::all();
        
        return view('Backend.covidtopbox')->with([
        'footers'=>$footers,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCovidTopBox($id)
    {
        $footers = App\CovidTopBox::find($id);
        return view('Backend.edit-covidtopbox')->with([
            'footers'=>$footers,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCovidTopBox(Request $request, $id)
    {

        $this->validate($request, [
                'type'=>'required',
                'people'=>'required',
                'news_date'=>'required',
                
            ]);

        $footers = App\CovidTopBox::find($id);
       
        $footers->type = $request->type;
        $footers->people = $request->people;
        $footers->date = $request->news_date;
        $footers->save();
        Session::flash('success', 'Your Article has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCovidTopBox($id)
    {
        $footers = App\CovidTopBox::find($id);
        $footers->delete();
        Session::flash('success', 'Your Top Block Has been Deleted Successfully');
        return redirect()->route('covidtopboxpage');
    }
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCovidTopBox(Request $request)
    {
        $this->validate($request, [
            'type'=>'required',
            'people'=>'required',
            'news_date'=>'required',
        ]);

        
            App\CovidTopBox::create([
            'type' => $request->type,
            'people' => $request->people,
            'date' => $request->news_date,
            ]);
            
            Session::flash('success', 'Your Top Block Had Been Added Successfully.');
            return redirect()->route('covidtopboxpage');
        
    }
}
