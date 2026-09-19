<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class SliderController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = App\Slider::all();
        return view('Backend.slider')->with([
            'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSlider()
    {
        return view('Backend.slider-add');
    }

    /**
     * Store a newly slider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSlider(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'title_en' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'required',
            'images' => 'required',
        ]);
        
        $images=array();
        
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/slider/',$name);
                $images[]=$name;
            }
            if (!empty($request->image)) {
            $slide = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/slider/', $slide);
            }
            App\Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'title_en' => $request->title_en,
            'description_en' => $request->description_en,
            'image' =>  implode("|",$images),
            'slide' =>  $slide,
            ]);
            Session::flash('success', 'Your New Slider Had Been Added Successfully.');
            return redirect()->route('sliderpage');
        }
    }
    


    /**
     * Show Edit Slider Form.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function editSlider($id)
    {
        $slider = App\Slider::find($id);
        return view('Backend.edit-slider')->with('slider', $slider);
    }

    /**
     * Update Slider.
     *
     * @param  $id
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateSlider(Request $request, $id)
    {
        $slider = App\Slider::find($id);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'title_en' => 'required|string',
            'description_en' => 'required|string',
        ]);
        
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/slider/',$name);
                $images[]=$name;
            }
            
           
            $slider->image =  implode("|",$images);
        }
        if (!empty($request->file('image'))) {
            //unlink('uploads/slider/' . $slider->slide);
            $slide = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/slider/', $slide);
            $slider->slide = $slide;
        }
        
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->title_en = $request->title_en;
        $slider->description_en = $request->description_en;
        $slider->save();
        Session::flash('success', 'Your Slider Has been Updated Successfully');
        return redirect()->route('sliderpage');
    }

    /**
     * Delete Slider.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSlider($id)
    {
        $slider = App\Slider::find($id);
        //unlink('uploads/slider/' . $slider->image);
        $slider->delete();
        Session::flash('success', 'Your Slider Has been Deleted Successfully');
        return redirect()->route('sliderpage');
    }
}
