<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = App\Page::all();
        return view('Backend.pages')->with([
        'pages'=>$pages,
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function addNewPage()
    {
        return view('Backend.add-page');
    }

        /**
     * Add a new project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPage(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            'title_en'=>'required|string|max:255',
            'content_en'=>'required|string',
        ]);

            App\Page::create([
            'title' => $request->title,
            'content' => $request->content,
            'title_en' => $request->title_en,
            'content_en' => $request->content_en,
            ]);
            Session::flash('success', 'Your New Page Had Been Added Successfully.');
            return redirect()->route('pagespage');
    }

    /**
     * Get Edit Page Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPage($id)
    {
        $page = App\Page::find($id);
        return view('Backend.edit-page')->with([
            'page'=>$page,
        ]);
    }

        /**
     * Update Page
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePage(Request $request, $id)
    {

        $this->validate($request, [
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            'title_en'=>'required|string|max:255',
            'content_en'=>'required|string',
            ]);

        $page = App\Page::find($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->title_en = $request->title_en;
        $page->content_en = $request->content_en;
        $page->save();
        Session::flash('success', 'Your Page has been updated successfully.');
        return redirect()->route('pagespage');
    }

    /**
     * Delete Post.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePage($id)
    {
        $page = App\Page::find($id);
        $page->delete();
        Session::flash('success', 'Your Page Has been Deleted Successfully');
        return redirect()->route('pagespage');
    }
}
