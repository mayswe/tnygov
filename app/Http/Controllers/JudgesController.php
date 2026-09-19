<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class JudgesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $judges = App\Judge::orderBy('id', 'desc')->get();
        
        return view('Backend.judges')->with([
        'judges'=>$judges,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editJudge($id)
    {
        $judges = App\Judge::find($id);
        return view('Backend.edit-judge')->with([
            'judges'=>$judges,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateJudge(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'short_description'=>'required|string',
                'long_description'=>'required|string',
                'name_en'=>'required|string|max:255',
                'short_description_en'=>'required|string',
                'long_description_en'=>'required|string',
                'order'=>'required|string',
                
            ]);

        $judges = App\Judge::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/judges/' . $judges->image);
            $pdfName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/judges/', $pdfName);
            $judges->image = $pdfName;
        }
        $judges->name = $request->name;
        $judges->short_description = $request->short_description;
        $judges->long_description = $request->long_description;
        $judges->name_en = $request->name_en;
        $judges->short_description_en = $request->short_description_en;
        $judges->long_description_en = $request->long_description_en;
        $judges->order = $request->order;
        $judges->save();
        Session::flash('success', 'Your Judge has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteJudge($id)
    {
        $judges = App\Judge::find($id);
        unlink('uploads/judges/' . $judges->image);
        $judges->delete();
        Session::flash('success', 'Your Judge Has been Deleted Successfully');
        return redirect()->route('judgespage');
    }
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addJudge(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'short_description'=>'required|string',
            'long_description'=>'required|string',
            'name_en'=>'required|string|max:255',
            'short_description_en'=>'required|string',
            'long_description_en'=>'required|string',
            'image'=>'required',
            'order'=>'required',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/judges/', $new_name);
            App\Judge::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'long_description_en' => $request->long_description_en,
            'image' => $new_name,
            'order' => $request->order,
            ]);
            Session::flash('success', 'Your New Judge Had Been Added Successfully.');
            return redirect()->route('judgespage');
        }
    }
}
