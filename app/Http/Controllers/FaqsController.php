<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = App\Faq::all();
        return view('Backend.faqs')->with([
        'faqs'=>$faqs,
        ]);
    }

    /**
     * Get Edit Faq Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editFaqsForm($id)
    {
        $faq = App\Faq::find($id);
        return view('Backend.edit-faq')->with([
            'faq'=>$faq,
        ]);
    }

     /**
     * Update Service
     *
     * @return \Illuminate\Http\Response
     */
    public function updateFaqs(Request $request, $id)
    {
        $faq = App\Faq::find($id);
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            ]);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Session::flash('success', 'Your Faq has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Service.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFaqs($id)
    {
        $faq = App\Faq::find($id);
        $faq->delete();
        Session::flash('success', 'Your Faq Has been Deleted Successfully');
        return redirect()->route('faqspage');
    }

        /**
     * Add a newly slider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFaqs(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            ]);

            App\Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
            Session::flash('success', 'Your New Faq Had Been Added Successfully.');
            return redirect()->route('faqspage');
    }
}
