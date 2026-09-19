<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class JudicialJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annualreports = App\JudicialJournal::all();
        
        return view('Backend.judicialjournal')->with([
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
        $annualreports = App\JudicialJournal::find($id);
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
                'name_en'=>'required|string|max:255',
            ]);

        $annualreports = App\JudicialJournal::find($id);
        if (!empty($request->file('pdf_file'))) {
            unlink('uploads/judicial/' . $annualreports->pdf_file);
            $pdfName = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/annualreports/', $pdfName);
            $annualreports->pdf_file = $pdfName;
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
        $annualreports = App\JudicialJournal::find($id);
        unlink('uploads/judicial/' . $annualreports->pdf_file);
        $annualreports->delete();
        Session::flash('success', 'Your Annual Report Has been Deleted Successfully');
        return redirect()->route('judicialjournalpage');
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
            'name_en'=>'required|string|max:255',
            'pdf_file'=>'required',
        ]);

        if (!empty($request->pdf_file)) {
            $new_name = time() . $request->file('pdf_file')->getClientOriginalName();
            $request->pdf_file->move('uploads/judicial/', $new_name);
            App\JudicialJournal::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'pdf_file' => $new_name,
            ]);
            Session::flash('success', 'Your New Annual Report Had Been Added Successfully.');
            return redirect()->route('judicialjournalpage');
        }
    }
}
