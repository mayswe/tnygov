<?php

namespace App\Http\Controllers;

use App;

use Session;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = App\Project::all();
        $project_cats = App\ProjectCat::all();
        return view('Backend.projects')->with([
        'projects'=>$projects,
        'project_cats'=>$project_cats,
        ]);
    }

    /**
     * Get Edit Project Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProject($id)
    {
        $project = App\Project::find($id);
        $project_cats = App\ProjectCat::all();
        return view('Backend.edit-project')->with([
            'project'=>$project,
            'project_cats'=>$project_cats,
        ]);
    }

    /**
     * Update Project
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProject(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
                'category_id'=>'required|numeric',
                'short_description'=>'required|string|max:255',
                'long_description'=>'required|string|min:100',
                'client_name'=>'required|string|max:255',
                'client_feedback'=>'required|string|max:255',
                'start_date'=>'required|date',
                'end_date'=>'required|date',
                'image'=>'image',
            ]);

        $project = App\Project::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/projects/' . $project->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/projects/', $imageName);
            $project->image = $imageName;
        }
        $project->name = $request->name;
        $project->category_id = $request->category_id;
        $project->short_description = $request->short_description;
        $project->long_description = $request->long_description;
        $project->client_name = $request->client_name;
        $project->client_feedback = $request->client_feedback;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->save();
        Session::flash('success', 'Your Project has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Project.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProject($id)
    {
        $project = App\Project::find($id);
        unlink('uploads/projects/' . $project->image);
        $project->delete();
        Session::flash('success', 'Your Project Has been Deleted Successfully');
        return redirect()->route('projectspage');
    }

    /**
     * Get Edit Category Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $category = App\ProjectCat::find($id);
        return view('Backend.edit-category')->with([
            'category'=>$category,
        ]);
    }

     /**
     * Update Project Category
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {

        $this->validate($request, [
                'name'=>'required|string|max:255',
            ]);

        $category = App\ProjectCat::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Your Category has been updated successfully.');
        return redirect()->route('projectspage');
    }

    /**
     * Delete PRoject CAtegory.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $category = App\ProjectCat::find($id);
        $category->delete();
        Session::flash('success', 'Your Category Has been Deleted Successfully');
        return redirect()->back();
    }

        /**
     * Add a newly project category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
            App\ProjectCat::create([
            'name' => $request->name,
            ]);
            Session::flash('success', 'Your New Category Had Been Added Successfully.');
            return redirect()->back();
    }
        /**
     * Add a new project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProject(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'category_id'=>'required|numeric',
            'short_description'=>'required|string|max:255',
            'long_description'=>'required|string|min:100',
            'client_name'=>'required|string|max:255',
            'client_feedback'=>'required|string|max:255',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'image'=>'image',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/projects/', $new_name);
            App\Project::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'client_name' => $request->client_name,
            'client_feedback' => $request->client_feedback,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $new_name,
            ]);
            Session::flash('success', 'Your New Project Had Been Added Successfully.');
            return redirect()->route('projectspage');
        }
    }
}
