<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequestValidation;

use App;

use Illuminate\Http\Request;

use Session;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = App\Service::all();
        return view('Backend.services')->with([
            'services'=>$services,
        ]);
    }

    /**
     * Get Edit Service Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editServiceForm($id)
    {
        $service = App\Service::find($id);
        return view('Backend.edit-service')->with([
            'service'=>$service,
        ]);
    }

    /**
     * Update Service
     *
     * @return \Illuminate\Http\Response
     */
    public function updateService(ServicesRequestValidation $request, $id)
    {
        $service = App\Service::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/services/' . $service->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/services/', $imageName);
            $service->image = $imageName;
        }
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->short_description = $request->short_description;
        $service->long_description = $request->long_description;
        $service->save();
        Session::flash('success', 'Your Service has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Service.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteService($id)
    {
        $service = App\Service::find($id);
        unlink('uploads/services/' . $service->image);
        $service->delete();
        Session::flash('success', 'Your Service Has been Deleted Successfully');
        return redirect()->route('servicespage');
    }

        /**
     * Add a newly partner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addService(ServicesRequestValidation $request)
    {

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/services/', $new_name);

            App\Service::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $new_name,
            ]);
            Session::flash('success', 'Your New Service Had Been Added Successfully.');
            return redirect()->route('servicespage');
        }
    }
}
