<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = App\Article::all();
        
        return view('Backend.articles')->with([
        'articles'=>$articles,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editArticle($id)
    {
        $articles = App\Article::find($id);
        return view('Backend.edit-article')->with([
            'articles'=>$articles,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateArticle(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'short_description'=>'required|string',
                'long_description'=>'required|string',
                
            ]);

        $articles = App\Article::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/articles/' . $articles->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/articles/', $imageName);
            $articles->image = $imageName;
        }
        $articles->name = $request->name;
        $articles->short_description = $request->short_description;
        $articles->long_description = $request->long_description;
        $articles->save();
        Session::flash('success', 'Your Article has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteArticle($id)
    {
        $articles = App\Article::find($id);
        unlink('uploads/articles/' . $articles->image);
        $articles->delete();
        Session::flash('success', 'Your Article Has been Deleted Successfully');
        return redirect()->route('articlespage');
    }
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addArticle(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'short_description'=>'required|string',
            'long_description'=>'required|string',
            'image'=>'required',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/articles/', $new_name);
            App\Article::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $new_name,
            ]);
            Session::flash('success', 'Your New Article Had Been Added Successfully.');
            return redirect()->route('articlespage');
        }
    }
}
