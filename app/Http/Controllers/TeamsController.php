<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class TeamsController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = App\Team::all();
        return view('Backend.team')->with([
            'teams' => $teams,
        ]);
    }

    /**
     * Show Edit team Form.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function editTeamForm($id)
    {
        $member = App\Team::find($id);
        return view('Backend.edit-team')->with('member', $member);
    }

    /**
     * Update Team Member
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTeam(Request $request, $id)
    {
        $member = App\Team::find($id);
        $this->validate($request, [
                'fname'=>'required|string|max:70',
                'lname'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'image'=>'image',
                'facebook'=>'required|url',
                'twitter'=>'required|url',
                'instagram'=>'required|url',
                'linkedin'=>'required|url',
            ]);
        if (!empty($request->file('image'))) {
            unlink('uploads/team/' . $member->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/team/', $imageName);
            $member->image = $imageName;
        }
        $member->fname = $request->fname;
        $member->lname = $request->lname;
        $member->position = $request->position;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->linkedin = $request->linkedin;
        $member->save();
        Session::flash('success', 'Your Team Member has been updated successfully.');
        return redirect()->route('teampage');
    }

    /**
     * Delete Team Member.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTeam($id)
    {
        $member = App\Team::find($id);
        unlink('uploads/team/' . $member->image);
        $member->delete();
        Session::flash('success', 'Your Team Member Has been Deleted Successfully');
        return redirect()->route('teampage');
    }

            /**
     * Add a newly Team Member.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTeam(Request $request)
    {

        $this->validate($request, [
                'fname'=>'required|string|max:70',
                'lname'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'image'=>'image',
                'facebook'=>'required|url',
                'twitter'=>'required|url',
                'instagram'=>'required|url',
                'linkedin'=>'required|url',
            ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/team/', $new_name);
            App\Team::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'position' => $request->position,
            'image' => $new_name,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            ]);
            Session::flash('success', 'Your New Team Member Had Been Added Successfully.');
            return redirect()->route('teampage');
        }
    }
}
