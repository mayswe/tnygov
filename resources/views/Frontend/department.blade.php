@extends('Frontend.Template.layout')
@section('title')
Single Post
@endsection
@section('content')

<!--Blog-One Start-->

<div class="container">
<div class="row">
<!-- start left -->
<div class="col-12 pt_10">
<nav aria-label="breadcrumb" style="width:100%">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">{{__('messages.homeb')}}</a></li>
    <li class="breadcrumb-item"><a href="/news">{{__('messages.departments')}}</a></li>
  </ol>
</nav>
    </div>
<div class="col-lg-12 pb_15">
<div class="blog-area pt_35 pb_90">
    <div class="container">
        <div class="row">
            
            <div class="container nodepage">
        
           
            <div class="single-blog">
                 <h3>{{ $name }}</h3>
                <?php 
                        $results = DB::select('select * from news_images where news_id = :id', ['id' => $post->id]);
                        
        foreach ($results as $user) {
            $image = $user->name;
    ?>                      
                <img src="{{ asset('uploads/news/' . $image) }}" alt="{{ $name }}">
                
                <?php
        }
                ?>
                   
                    
                    <div class="post-text">{!! $body !!}</div>
                </div>
            
        </div>
    </div>
</div>
</div>
    </div>
<!-- end left -->
<!-- start right -->


</div>
<!-- end right -->
</div>
<!--Blog-One End-->

@endsection
