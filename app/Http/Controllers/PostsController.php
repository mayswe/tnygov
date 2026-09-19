<?php

namespace App\Http\Controllers;

use App;

use Session;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = App\News::all();
        $position = App\Position::all();
        $township = App\Township::all();
        return view('Backend.news')->with([
        'news'=>$news,
        'position'=>$position,
        'township'=>$township,
        ]);
    }

        /**
     * Add a new project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPost(Request $request)
    {
        $position = App\Position::all();
        $township = App\Township::all();
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'post'=>'required|string',
            'image'=>'required|image',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/blog/', $new_name);
        }
       
            if (!empty($request->position)) {
                
             App\Post::create([
            'title' => $request->title,
            'post' => $request->post,
            'image' => $new_name,
            'position' => $request->position,
            
            ]);   
            }else{
                
             App\Post::create([
            'title' => $request->title,
            'post' => $request->post,
            'image' => $new_name,
            'position' => $request->position,
            
            ]);   
            
            }
            
            Session::flash('success', 'Your New Post Had Been Added Successfully.');
            return redirect()->route('postspage');
        
    }

    /**
     * Get Edit Post Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {
        $post = App\Post::find($id);
        return view('Backend.edit-post')->with([
            'post'=>$post,
        ]);
    }

        /**
     * Update Post
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {

        $this->validate($request, [
                'title'=>'required|string|max:255',
                'content'=>'required|string',
                'image'=>'image',
            ]);

        $post = App\Post::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/blog/' . $post->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/blog/', $imageName);
            $post->image = $imageName;
        }
        $post->title = $request->title;
        $post->post = $request->content;
        $post->save();
        Session::flash('success', 'Your Post has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Post.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id)
    {
        $post = App\Post::find($id);
        unlink('uploads/blog/' . $post->image);
        $post->delete();
        Session::flash('success', 'Your Post Has been Deleted Successfully');
        return redirect()->route('postspage');
    }
}
