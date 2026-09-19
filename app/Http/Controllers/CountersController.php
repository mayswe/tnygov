<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class CountersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = App\Counter::all();
        return view('Backend.counter')->with([
        'counters'=>$counters,
        ]);
    }

           /**
     * Get Edit counter Form.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given counter
     * @return \Illuminate\Http\Response
     */
    public function editCounter($id)
    {
        $counter = App\Counter::find($id);
        return view('Backend.edit-counter')->with('counter', $counter);
    }

        /**
     * Update counter.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given counter
     * @return \Illuminate\Http\Response
     */
    public function updateCounter(Request $request, $id)
    {
        $counter = App\Counter::find($id);
        $request->validate([
        'title' => 'required|string|max:255',
        'number' => 'required|numeric',
        ]);
        $counter->title = $request->title;
        $counter->number = $request->number;
        $counter->save();
        Session::flash('success', 'Your Counter has been updated successfully.');
        return redirect()->route('counterspage');
    }

            /**
     * delete Counter.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given feature
     * @return \Illuminate\Http\Response
     */
    public function deleteCounter($id)
    {
        $counter = App\Counter::find($id);
        $counter->delete();
        Session::flash('success', 'Your Counter had been Deleted successfully.');
        return redirect()->route('counterspage');
    }

           /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function addCounter()
    {
        return view('Backend.add-counter');
    }

            /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function storeCounter(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|numeric',
            ]);
        App\Counter::create([
            'title' => $request->title,
            'number' => $request->number,
        ]);
        Session::flash('success', 'Your Counter had been Added successfully.');
        return redirect()->route('counterspage');
    }
}
