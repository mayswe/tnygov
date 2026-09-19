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
    <li class="breadcrumb-item"><a href="/news">{{__('messages.news')}}</a></li>
  </ol>
</nav>
    </div>
<div class="col-lg-8 pb_15">
<div class="blog-area pt_35 pb_90">
    <div class="container">
        <div class="row">
            
            <div class="container nodepage">
        
           
            <div class="single-blog">
                <h3>{{ $name }}</h3>
                    <img src="{{ asset('uploads/slider/' . $post->slide) }}" alt="Post Image">
                    
                
            <div class="row">
           
                
                <?php 
                if($post->image){
                    ?>
                 
                     
                    <div class="col-12">
                 <p class="post-text">{!! $short_description !!}</p>
                </div>
                <?php
                }else{
                    ?>
                <div class="col-12">
                 <p class="post-text">{!! $short_description !!}</p>
                </div>
                <?php
                }
                         ?>
            
            
            </div>        
                   
                
                </div>
            
        </div>
    </div>
</div>
    </div></div>
<div id ="rid-sidebar-first" class="col-lg-4 pb_15">
                <div id="rid-sidebar-first">
                  <div id="block-views-block-block-latest-news-block-2">
  <div class="block__inner">

    <h2 id="block-views-block-block-latest-news-block-2-title">
      <span>နောက်ဆုံးရ သတင်း</span>
    </h2>
      <div class="view-block-latest-news">
        
   @foreach($newslist as $page)
    <div class="views-row">
    <div class="views-field-title">
      <a href="{{ route('singlepost',['id'=>$page->id]) }}" >{{$page->name}}</a>
    </div>
    <div class="views-field views-field-field-post-date">
    <time datetime="2021-01-25T05:18:29Z" class="datetime">2021-01-25</time>
</div>
  </div>
   @endforeach 
    

    </div>
  
          </div>
</div>

</div>
            </div>

    
    </div></div>
<!--Blog-One End-->
@endsection
