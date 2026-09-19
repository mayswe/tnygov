<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class FooterSliderBlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = App\FooterSliderBlock::all();
        
        return view('Backend.footersliderblocks')->with([
        'footers'=>$footers,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editFooterSliderBlock($id)
    {
        $footers = App\FooterSliderBlock::find($id);
        return view('Backend.edit-footersliderblock')->with([
            'footers'=>$footers,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateFooterSliderBlock(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'body'=>'required|string',
                
            ]);

        $footers = App\FooterSliderBlock::find($id);
       
        $footers->name = $request->name;
        $footers->body = $request->body;
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
    public function deleteFooterSliderBlock($id)
    {
        $footers = App\FooterSliderBlock::find($id);
        $footers->delete();
        Session::flash('success', 'Your Footer Slider Block Has been Deleted Successfully');
        return redirect()->route('footersliderblockspage');
    }
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFooterSliderBlock(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'body'=>'required|string',
        ]);

        
            App\FooterSliderBlock::create([
            'name' => $request->name,
            'body' => $request->body,
            ]);
            
            Session::flash('success', 'Your New Footer Slider Block Had Been Added Successfully.');
            return redirect()->route('footersliderblockspage');
        
    }
}
