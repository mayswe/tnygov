<?php
namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Scode41Controller extends Controller
{
/**
* Display a listing of the resource.
* @return \Illuminate\Http\Response
*/
    public function index()
    {
        $messages = App\Scode41::all();
        return view('Backend.messages')->with([
        'messages'=>$messages,
        ]);
    }
/**
* Display a listing of the resource.
* @return \Illuminate\Http\Response
*/
    public function readMessage($id)
    {
        $message = App\Scode41::find($id);
        return view('Backend.full-message')->with([
        'message'=>$message,
        ]);
    }
/**
* Delete Message.
*
* @param  $id
* @return \Illuminate\Http\Response
*/
    public function deleteMessage($id)
    {
        $message = App\Scode41::find($id);
        $message->delete();
        Session::flash('success', 'Your Message Has been Deleted Successfully');
        return redirect()->route('messagespage');
    }
/**
* Delete Message.
*
* @param  $id
* @return \Illuminate\Http\Response
*/
    public function sendScode41(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|string|max:255|min:4',
        ]);
        App\Scode41::create([
        'name'=> $request->name,
        'dob'=> $request->dob,
        'nrc'=> $request->nrc,
        'nationality'=> $request->nationality,
        'regilion'=> $request->regilion,
        'father'=> $request->father,
        'mother'=> $request->mother,
        'spouse_name'=> $request->spouse_name,
        'dop'=> $request->dop,
        'income'=> $request->income,
        'pensioner'=> $request->pensioner,
        'address'=> $request->address,
        'assistant_name'=> $request->assistant_name,
        'relationship'=> $request->relationship,
        'contact'=> $request->contact,
        'yayaka'=> $request->yayaka,
        'photo'=> $request->photo,
        'attached'=>   $request->attached, 
        ]);
        
        Session::flash('success', 'Your Message Has been Sent Successfully! We Will Contact You Back As Soon As Possible!');
        return redirect()->back();
    }
}
