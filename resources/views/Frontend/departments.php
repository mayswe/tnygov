@extends('Frontend.Template.layout')
@section('title')
Departments
@endsection
@section('content')







<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
<!-- start breadcrumb -->
<div class="container">
    <div class="row" >
        
<div class="col-12 pt_10">
                <div class="headline">
                    <h1>Departments</h1>
                    <hr class="line">
                </div>
           
</div>
        </div>
    </div>
<!-- end breadcrumb -->
    <div class="container">
        <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <?php
                print_r($news);
                ?>
            @foreach($news as $post)
            <?php
            if (App::isLocale('en')) {
                $name = $post->name_en;
                $short_description = $post->short_description_en;
            }else{

                $name = $post->name;
                $short_description = $post->short_description;
            }
            ?>
                
                <div class="col-md-6" style="padding-top:20px;">
                <div class="card-content">
                    <div class="card-img">
                        <a href="{{ route('singledd',['id'=>$post->id]) }}">
                        <?php
        $results = DB::select('select * from d_d_images where news_id = :id', ['id' => $post->id]);
        foreach ($results as $user) {
    $image =  $user->name;
           
}
        if (empty($image)) {
            ?>
        <img src="{{ asset('uploads/dd/noimage.jpg') }}" class="img-fluid" alt="{{$post->name }}">
        <?php
        }else{
            ?>
        <img src="{{ asset('uploads/dd/' . $image) }}" class="img-fluid" alt="{{$post->name }}">
        <?php
        }
        ?>    </a>
                        
                    </div>
                    <div class="card-desc">
                        <?php
        $postion_results = DB::select('select * from positions where id = :position', ['position' => $post->position]);
        foreach ($postion_results as $postion){
        $postion_name =  $postion->name;
        $postion_id =  $postion->id;
        }
        
        ?>
        <?php
        $location_results = DB::select('select * from townships where id = :tsp', ['tsp' => $post->tsp]);
        foreach ($location_results as $location){
        $location_name =  $location->name;
        $location_id =  $location->id;
        }
        
        ?>  
                        <div class="datetime pt_5 pb_5">
                            <a href="{{ route('newsposition',['id'=>$postion_id]) }}" class="datetime">{{$postion_name}}</a>&nbsp;|&nbsp;
                            <a href="{{ route('newslocation',['id'=>$location_id]) }}" class="datetime">{{$location_name}}</a>
                        </div>
                        <h3><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{ $name }}</a></h3>
                       
                        
                        
					<div class="post hid blog-author" style="width:100%">
                        <ul>
                            <?php
                                if($post->news_date == NULL){
                                    $news_date = $post->created_at;
                                }else{
                                    $news_date = $post->news_date;
                                }
                                ?>
                            <li><i class="fa fa-calendar-o"></i>{{ date('d-m-Y', strtotime($news_date)) }}</li>
                            <li class="blog-button"><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{__('messages.more')}} <i class="fa fa-chevron-circle-right"></i></a></li>
                        </ul>
                    </div>
				
                    </div>
                </div>
            </div>
                @endforeach
          
            

            <div class="col-12 pt_10 text-center">
            {{ $news->links() }}
            </div>
        
            </div>
            </div>
            

        </div>
        
    </div>
</div>

<!--Blog End-->
@endsection