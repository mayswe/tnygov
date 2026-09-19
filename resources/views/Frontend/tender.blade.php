@extends('Frontend.Template.layout')
@section('title')
Tender
@endsection
@section('content')
<!-- start banner -->

<!-- end banner -->
<!--Blog Start-->
<div class="page blog-area pt_35 pb_90">
<!-- start breadcrumb -->
<div class="container">
<div class="row" >
<nav aria-label="breadcrumb" style="width:100%">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">{{__('messages.home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('messages.tender')}}</li>
  </ol>
</nav>
</div>
</div>
<!-- end breadcrumb -->
<div class="container">
<div class="row">
<!-- start left -->
<div class="col-12">
<div class="blog-area pt_35 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h1>{{__('messages.tender')}}</h1>
                    <hr class="line">
                </div>
            </div>
            <div class="container nodepage">
                <div class="tender">
            <ul>
            @foreach($news as $post)
            <li>
            <span style="font-weight:bold">{{ $post->name }}</span>
            <div style="word-wrap: break-word;">
            {!! $post->short_description !!}
                </div>
            <span><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a target="_blank" href="<?php echo e(asset('uploads/tenders/' . $post->pdf_file)); ?>" type="application/pdf;">Download</a></span><br>
            <span>Budget Year: {{ $post->budget_year }}</span>
            </li>
            @endforeach
</ul></div> 
            </div>
            <div class="col-12 pt_10 text-center">
            {{ $news->links() }}
            </div>
        </div>

        
    
    </div>
</div>
    </div>
<!-- end left -->

</div>
</div>
</div>
<!--Blog End-->
@endsection
