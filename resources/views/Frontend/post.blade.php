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
<div id ="rid-sidebar-first" class="col-lg-4 pb_15">
                <div id="rid-sidebar-first">
                  <div id="block-views-block-block-latest-news-block-2">
  <div class="block__inner">

    <h3>နောက်ဆုံးရ သတင်း</h3>
      <hr style="height: 4px; background: #fed23e">
      <div class="view-block-latest-news">
        
   @foreach($newslist as $page)
    <div class="views-row">
    <p><a href="{{ route('singlepost',['id'=>$page->id]) }}" >{{$page->name}}</a>
    <time datetime="2021-01-25T05:18:29Z" class="datetime">{{ date('d-m-Y', strtotime($page->created_at)) }}</time>
        </p>
    
  </div>
   @endforeach 
    

    </div>
  
          </div>
</div>

</div>
            </div>

</div>
<!-- end right -->
</div>
<!--Blog-One End-->

@endsection
