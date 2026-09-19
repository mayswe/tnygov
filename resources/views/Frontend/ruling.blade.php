@extends('Frontend.Template.layout')
@section('title')
Tender
@endsection
@section('content')

<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h1>{{__('messages.ruling')}}</h1>
                    <hr class="line">
                </div>
            </div>
            <div class="container nodepage">
                <div class="tender">
            <ul>
            @foreach($news as $post)
            <li>
            <span>{{ $post->name }}</span><br>
            <span><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="<?php echo e(asset('uploads/tender/' . $post->pdf_file)); ?>" type="application/pdf;">Download</a></span><br>
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
<!--Blog End-->
@endsection
