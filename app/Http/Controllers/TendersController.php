<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class TendersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = App\Tender::all();
        
        return view('Backend.tenders')->with([
        'tenders'=>$tenders,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editTender($id)
    {
        $tenders = App\Tender::find($id);
        return view('Backend.edit-tender')->with([
            'tenders'=>$tenders,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTender(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'short_description'=>'required|string',
                'budget_year'=> 'required',
                'budget_year_en'=> 'required',
            ]);

        $tenders = App\Tender::find($id);
        if (!empty($request->file('pdf_file'))) {
            //unlink('uploads/tenders/' . $tenders->pdf_file);
            
            $pdfName = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/tenders/', $pdfName);
            $tenders->pdf_file = $pdfName;
        }
        $tenders->name = $request->name;
        $tenders->name_en = $request->name_en;
        $tenders->short_description = $request->short_description;
        $tenders->short_description_en = $request->short_description_en;
        $tenders->budget_year=$request->budget_year;
        $tenders->budget_year_en=$request->budget_year_en;
        $tenders->save();
        Session::flash('success', 'Your Tender has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTender($id)
    {
        $tenders = App\Tender::find($id);
        unlink('uploads/tenders/' . $tenders->pdf_file);
        $tenders->delete();
        Session::flash('success', 'Your Tender Has been Deleted Successfully');
        return redirect()->route('tenderspage');
    }
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTender(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'short_description'=>'required|string',
            'pdf_file'=>'required',
            'budget_year'=>'required',
            'budget_year_en'=>'required'
        ]);

        if (!empty($request->pdf_file)) {
            $new_name = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/tenders/', $new_name);
            App\Tender::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'short_description' => $request->short_description,
            'short_description_en' => $request->short_description_en,
            'pdf_file' => $new_name,
            'budget_year'=>$request->budget_year,
            'budget_year_en'=>$request->budget_year_en,
            ]);
            Session::flash('success', 'Your New Tender Had Been Added Successfully.');
            return redirect()->route('tenderspage');
        }
    }
}
