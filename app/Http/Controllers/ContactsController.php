<?php
namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
/**
* Display a listing of the resource.
* @return \Illuminate\Http\Response
*/
    public function index()
    {
        $messages = App\Contact::all();
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
        $message = App\Contact::find($id);
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
        $message = App\Contact::find($id);
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
    public function sendMessage(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|string|max:255|min:4',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string'
        ]);
        App\Contact::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'subject'=> $request->subject,
        'message'=> $request->message,
        ]);
        $info = App\Info::find(1);
        $EmailTo = $info->email;
        $Subject = $request->subject;
        $message = $request->message;
    // send email
        $success = mail($EmailTo, $Subject, $message);
        Session::flash('success', 'Your Message Has been Sent Successfully! We Will Contact You Back As Soon As Possible!');
        return redirect()->back();
    }
}
