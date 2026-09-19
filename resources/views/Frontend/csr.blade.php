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
    <li class="breadcrumb-item"><a href="/csrs">ပြည်သူ့အကျိုးပြု</a></li>
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

    <h2 id="block-views-block-block-latest-news-block-2-title">
      <span>ပြည်သူ့ဝန်ဆောင်မှုများ</span>
    </h2>
      <div class="view-block-latest-news">
        
   @foreach($daily as $service)
    <div class="views-row">
    <div class="views-field-title">
      <a href="{{ route('singlecsr',['id'=>$service->id]) }}" >{{$service->name}}</a>
    </div>
   
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
