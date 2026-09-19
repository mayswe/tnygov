<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = App\Partner::all();
        return view('Backend.partners')->with([
        'partners'=>$partners,
        ]);
    }

    /**
     * Get Edit Partner Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPartnerForm($id)
    {
        $partner = App\Partner::find($id);
        return view('Backend.edit-partner')->with([
            'partner'=>$partner,
        ]);
    }

    /**
     * Update Partner
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePartner(Request $request, $id)
    {
        $partner = App\Partner::find($id);
        $this->validate($request, [
                'logo'=>'image',
                'name'=>'required|string|max:255',
            ]);
        if (!empty($request->file('logo'))) {
            unlink('uploads/partners/' . $partner->logo);
            $logoName = time() . $request->file('logo')->getClientOriginalName();
            $request->logo->move('uploads/partners/', $logoName);
            $partner->logo = $logoName;
        }
        $partner->name = $request->name;
        $partner->save();
        Session::flash('success', 'Your Partner has been updated successfully.');
        return redirect()->route('partnerspage');
    }

    /**
     * Delete Partner.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePartner($id)
    {
        $partner = App\Partner::find($id);
        unlink('uploads/partners/' . $partner->logo);
        $partner->delete();
        Session::flash('success', 'Your Partner Has been Deleted Successfully');
        return redirect()->route('partnerspage');
    }

        /**
     * Add a newly Partner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPartner(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'logo' => 'required|image',
        ]);

        if (!empty($request->logo)) {
            $new_name = time() . $request->file('logo')->getClientOriginalName();
            $request->logo->move('uploads/partners/', $new_name);
            App\Partner::create([
            'name' => $request->name,
            'logo' => $new_name,
            ]);
            Session::flash('success', 'Your New Partner Had Been Added Successfully.');
            return redirect()->route('partnerspage');
        }
    }
}
