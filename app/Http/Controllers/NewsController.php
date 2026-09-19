<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function storeLookup(Request $request, $type)
    {
        $rules = ['name' => 'required|string|max:255', 'name_en' => 'nullable|string|max:255'];
        if ($type === 'township') $rules['district_id'] = 'required|integer';
        $this->validate($request, $rules);

        $model = $type === 'position' ? App\Position::class : ($type === 'township' ? App\Township::class : ($type === 'district' ? App\District::class : null));
        abort_unless($model, 404);

        $data = ['name' => $request->name];
        if ($type !== 'township') {
            $data['name_en'] = $request->name_en ?: $request->name;
        } else {
            $data['name_en'] = $request->name_en ?: $request->name;
            $data['district_id'] = $request->district_id;
        }
        $item = $model::create($data);
        return response()->json(['id' => $item->id, 'text' => $item->name]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $news = App\News::orderByDesc('id')->paginate(10);
        $position = App\Position::all();
        $township = App\Township::all();
        $districts = App\District::all();
        return view('Backend.news')->with([
        'news'=>$news,
        'position'=>$position,
            'township'=>$township,
        'districts'=>$districts,
        ]);
    }

    /**
     * Get Edit Judge Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editNews($id)
    {
        $news = App\News::find($id);
        $position = App\Position::all();
        $township = App\Township::all();
        $districts = App\District::all();
        $news_img = App\NewsImage::all();
        return view('Backend.edit-news')->with([
            'news'=>$news,
            'position'=>$position,
        'township'=>$township,
            'districts'=>$districts,
           
        ]);
    }

    /**
     * Update Judges
     *
     * @return \Illuminate\Http\Response
     */
    public function updateNews(Request $request, $id)
    {
        $position = App\Position::all();
        $township = App\Township::all();
        $this->validate($request, [
                'name'=>'required',
            ]);
        $news = App\News::find($id);
       if($files=$request->file('images')){
            foreach($files as $file){
              
                
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/news/',$name);
                
                App\NewsImage::create([
                'news_id'=>  $id,    
                'name'=>  $name,
            ]);
            
            }
        }
        
        $covid = $request->covid;
        if($covid==1){
            
        
            if (!empty($request->file('cover'))) {
            //unlink('uploads/slider/' . $slider->slide);
            $filename = time() . $request->file('cover')->getClientOriginalName();
            $slide = str_replace(' ', '', $filename);
            $request->cover->move('uploads/covid/', $slide);
            $cover = $slide;
        }
        $covid = App\Covid::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'body_en' => $request->body_en,
            'image'=>  $cover,
            'news_date' => $request->news_date,
            ]);
        }
      
        $news->name = $request->name;
        $news->short_description = $request->short_description;
        $news->body = $request->body;
        $news->name_en = $request->name_en;
        $news->short_description_en = $request->short_description_en;
        $news->body_en = $request->body_en;
        $news->news_date = $request->news_date;
        $news->position = $request->position;
        $news->tsp = $request->township;
        $news->save();
        Session::flash('success', 'Your News has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Judge.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNewsImage($id)
    {
        $news = App\NewsImage::find($id);
        $news->delete();
        Session::flash('success', 'Your Image Has been Deleted Successfully');
        return redirect()->back();
    }
    
    public function deleteNews($id)
    {
        $news = App\News::find($id);
        $news->delete();
        Session::flash('success', 'Your News Has been Deleted Successfully');
        return redirect()->route('newspage');
    }
    
    
        /**
     * Add a new Judge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function addNews(Request $request)
    {
        $user = \Auth::user();
        $images=array();
        $this->validate($request, [
            'name'=>'required',
        ]);
        
           
            $news = App\News::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'body_en' => $request->body_en,
            'image'=>  implode("|",$images),
            'tsp' => $request->township,
            'position' => $request->position,
            'news_date' => $request->news_date,
            ]);
            
            $news_id =  $news->id;
        
            if($files=$request->file('images')){
                
            foreach($files as $file){
                $i = 1;
                
                $name=time() . $file->getClientOriginalName();
                $file->move('uploads/news/',$name);
                
                App\NewsImage::create([
                'news_id'=>  $news_id,    
                'name'=>  $name,
            ]);
            if($i==1){
                $cover = $name;
            }
            $i++;
            }
        }
        $covid = $request->covid;
        if($covid==1){
            
            if (!empty($request->cover)) {
            $filename = time() . $request->file('cover')->getClientOriginalName();
            $slide = str_replace(' ', '', $filename);
            $request->cover->move('uploads/covid/', $slide);
            $cover = $slide;
            }else{
              $cover = NULL;
          }
          
            $covid = App\Covid::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'name_en' => $request->name_en,
            'short_description_en' => $request->short_description_en,
            'body_en' => $request->body_en,
            'image'=>  $cover,
            'news_date' => $request->news_date,
            ]);
        }
        
        
            
            
            Session::flash('success', 'Your News Had Been Added Successfully.');
            return redirect()->route('newspage');
        
    }
    
}
