<?php

namespace App\Http\Controllers;

use App;

use Session;

use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = App\Subscriber::all();
        return view('Backend.subscribers')->with([
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Add New subscriber To List.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSubscriber(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers',
        ]);
        App\Subscriber::create([
            'email'=> $request->email,
        ]);
        return redirect()->back();
    }

    /**
     * Delete Subscriber.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSubscriber($id)
    {
        $subscriber = App\Subscriber::find($id);
        $subscriber->delete();
        Session::flash('success', 'Your Subscriber Has been Deleted Successfully');
        return redirect()->route('subscriberspage');
    }
}
