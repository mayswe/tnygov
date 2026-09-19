<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AnnualReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annualreports = App\AnnualReport::all();
        
        return view('Backend.annualreports')->with([
        'annualreports'=>$annualreports,
        ]);
    }

    /**
     * Get Edit Annual Report Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAnnualReport($id)
    {
        $annualreports = App\AnnualReport::find($id);
        return view('Backend.edit-annualreport')->with([
            'annualreports'=>$annualreports,
           
        ]);
    }

    /**
     * Update Annual report
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAnnualReport(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
            ]);

        $annualreports = App\AnnualReport::find($id);
        if (!empty($request->file('pdf_file'))) {
            
            $pdfName = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/annualreports/', $pdfName);
            $annualreports->pdf_file = $pdfName;
        }
        if (!empty($request->file('pdf_file_en'))) {
            
            $pdfName_en = time() . $request->file('pdf_file_en')->getClientOriginalName();
            $request->pdf_file_en->move('uploads/annualreports/', $pdfName_en);
            $annualreports->pdf_file_en = $pdfName_en;
        }
        if (!empty($request->file('image'))) {
            
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/annualreports/', $imageName);
            $annualreports->cover = $imageName;
        }
        if (!empty($request->file('image_en'))) {
           
            $imageName_en = time() . $request->file('image_en')->getClientOriginalName();
            $request->image_en->move('uploads/annualreports/', $imageName_en);
            $annualreports->cover_en = $imageName_en;
        }
        $annualreports->name = $request->name;
        $annualreports->name_en = $request->name_en;
        $annualreports->save();
        Session::flash('success', 'Your Annual Report has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Annual Report.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAnnualReport($id)
    {
        $annualreports = App\AnnualReport::find($id);
        unlink('uploads/annualreports/' . $annualreports->pdf_file);
        $annualreports->delete();
        Session::flash('success', 'Your Annual Report Has been Deleted Successfully');
        return redirect()->route('annualreportspage');
    }
        /**
     * Add a new annual report.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addAnnualReport(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'pdf_file'=>'required',
        ]);
        if (!empty($request->file('pdf_file_en'))) {
            
            $pdf_file_en = time() . $request->file('pdf_file_en')->getClientOriginalName();
            $request->pdf_file_en->move('uploads/annualreports/', $pdf_file_en);
            
            $image_en = time() . $request->file('image_en')->getClientOriginalName();
            $request->image_en->move('uploads/annualreports/', $image_en);
        }else{
            $pdf_file_en = NULL;
            $image_en = NULL;
        }
        if (!empty($request->pdf_file)) {
            
            $pdf_file = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/annualreports/', $pdf_file);
            
            $image = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/annualreports/', $image);
            
            
            
            App\AnnualReport::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'pdf_file' => $pdf_file,
            'pdf_file_en' => $pdf_file_en,
            'cover' => $image,
            'cover_en' => $image_en,
            ]);
            Session::flash('success', 'Your New Annual Report Had Been Added Successfully.');
            return redirect()->route('annualreportspage');
        }
    }
}
