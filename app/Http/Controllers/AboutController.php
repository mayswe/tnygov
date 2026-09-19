<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = App\Info::find(1);
        $about = App\About::find(1);
        $skills = App\Skill::all();
        return view('Backend.about')->with([
            'about'=>$about,
            'skills'=>$skills,
            'info'=>$info,
        ]);
    }

    /**
     * Update History.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateHistory(Request $request)
    {
        $History = App\About::find(1);
        $request->validate([
            'history' => 'required|string',
            ]);
        $History->history = $request->history;
        $History->save();
        Session::flash('success', 'Your History has been updated successfully.');
        return redirect()->back();
    }

        /**
     * Update Mission.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMission(Request $request)
    {
        $mission = App\About::find(1);
        $request->validate([
            'mission' => 'required|string',
            ]);
        $mission->mission = $request->mission;
        $mission->save();
        Session::flash('success', 'Your Mission has been updated successfully.');
        return redirect()->back();
    }

        /**
     * Update Vision.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateVision(Request $request)
    {
        $vision = App\About::find(1);
        $request->validate([
            'vision' => 'required|string',
            ]);
        $vision->vision = $request->vision;
        $vision->save();
        Session::flash('success', 'Your Vision has been updated successfully.');
        return redirect()->back();
    }

           /**
     * Get Edit Skill Form.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function editSkill($id)
    {
        $skill = App\Skill::find($id);
        return view('Backend.edit-skill')->with('skill', $skill);
    }

        /**
     * Update Skill Name.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function updateSkill(Request $request, $id)
    {
        $skill = App\Skill::find($id);
        $request->validate([
            'name' => 'string|max:255',
            'pourcentage' => 'numeric',
            ]);
        $skill->name = $request->name;
        $skill->pourcentage = $request->pourcentage;
        $skill->save();
        Session::flash('success', 'Your Skill has been updated successfully.');
        return redirect()->route('aboutpage');
    }

           /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function addSkill()
    {
        return view('Backend.add-skill');
    }

            /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'pourcentage' => 'numeric'
            ]);
        App\Skill::create([
            'name' => $request->name,
            'pourcentage' => $request->pourcentage,
        ]);
        Session::flash('success', 'Your Skill had been Added successfully.');
        return redirect()->route('aboutpage');
    }

            /**
     * delete Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function deleteSkill($id)
    {
        $skill = App\Skill::find($id);
        $skill->delete();
        Session::flash('success', 'Your Skill had been Deleted successfully.');
        return redirect()->route('aboutpage');
    }

        /**
     * Update Logo.
     *
     * @param  \Illuminate\Http\MetasRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateLogo(Request $request)
    {
        $logoAbout = App\About::find(1);
        $request->validate([
            'logo' => 'required|image'
            ]);
        if (!empty($request->file('logo'))) {
            unlink('uploads/' . $logoAbout->logo);
            $logoNew = time() . $request->file('logo')->getClientOriginalName();
            $request->logo->move('uploads/', $logoNew);
            $logoAbout->logo = $logoNew;
        }
        $logoAbout->save();
        Session::flash('success', 'Your Logo has been updated successfully.');
        return redirect()->back();
    }
}
