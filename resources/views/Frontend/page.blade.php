@extends('Frontend.Template.layout')
@section('title')
{{ $title }}
@endsection
@section('content')

<div class="pagebody about-area pt_40">
    <div class="pb_40">
    <div class="container">
        <div class="row" >
    <nav aria-label="breadcrumb" style="width:100%">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">{{__('messages.home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
  </ol>
</nav>
</div></div>
        <div class="container nodepage">
       
            <h2>{{ $title }}</h2>
            <p>{!! $content !!}</p>
            @foreach($pages as $page)
              <!-- <li><a href="{{ route('page', ['id'=>$page->id, 'title'=> str_replace(" ", "-", $page->title)]) }}">{{ $page->title }}</a></li> -->
            @endforeach
        </div>
    </div>
</div>

@endsection
