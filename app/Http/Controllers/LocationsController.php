<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = App\Location::all();
        return view('Backend.locations')->with([
        'pages'=>$pages,
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function addNewLocation()
    {
        return view('Backend.add-location');
    }

        /**
     * Add a new project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addLocation(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            'title_en'=>'required|string|max:255',
            'content_en'=>'required|string',
            'map'=>'required|string',
        ]);

            App\Location::create([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            'map' => $request->map,
            ]);
            Session::flash('success', 'Your New Location Had Been Added Successfully.');
            return redirect()->route('locationspage');
    }

    /**
     * Get Edit Page Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editLocation($id)
    {
        $page = App\Location::find($id);
        return view('Backend.edit-location')->with([
            'page'=>$page,
        ]);
    }

        /**
     * Update Page
     *
     * @return \Illuminate\Http\Response
     */
    public function updateLocation(Request $request, $id)
    {

        $this->validate($request, [
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            'title_en'=>'required|string|max:255',
            'content_en'=>'required|string',
            'map'=>'required|string',
            ]);

        $page = App\Location::find($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->title_en = $request->title_en;
        $page->content_en = $request->content_en;
        $page->map = $request->map;
        $page->save();
        Session::flash('success', 'Your Location has been updated successfully.');
        return redirect()->route('locationspage');
    }

    /**
     * Delete Post.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteLocation($id)
    {
        $page = App\Location::find($id);
        $page->delete();
        Session::flash('success', 'Your Location Has been Deleted Successfully');
        return redirect()->route('locationspage');
    }
}
