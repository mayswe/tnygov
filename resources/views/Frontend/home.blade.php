@extends('Frontend.Template.layout')
@section('title')
Home Page
@endsection
@section('content')
<div class="hometop">
@if($home->slider !== "hide")
@include('Frontend.partials.slider')
@endif 
</div>
<div class="homewhite">
<div class="container">
<div class="row">
<div class="col-lg-12">
  @if($home->blog !== "hide")
@include('Frontend.partials.blog')
@endif  
</div>
</div></div></div>
<div class="homewhite" style="background-color:#fff;">
<div class="container-fluid">
<div class="row">
<div class="col-lg-9">
  @if($home->teams !== "hide")
@include('Frontend.partials.announcements')
@endif  
</div>
<div class="col-lg-3 col-md-3 col-sm-12" style="background:#edf3f6">
      <div class="portlet-body" style="padding-top:30px;">


	<h2 style="font-size:25px; margin-top:10px; margin-bottom:20px; text-align:center">{{__('messages.emergency_calls')}}</h2>
          <hr class="line">
        
      @foreach($rightblock as $block)
            <li style="list-style: none;
    line-height:17px; padding-left:20px">
			    <p style="font-weight:bold;">{{$block->name}}</p>
			    <p style="font-size:14px;" class="text-left">{!! $block->body !!}</p>
			
			
		</li>
            @endforeach
        
	</div>
    <div class="portlet-body" style="padding-top:30px; border-top:1px solid #ccc;">


        <a href="/csrs"><h2 style="font-size:25px; margin-top:10px; margin-bottom:20px; text-align:center">
            {{__('messages.public_services')}}</h2></a>
        <hr class="line">
        
        <ul>
        @foreach($daily as $service)
            <li style="list-style: none;line-height:17px; padding-left:20px">
			<a href="{{ route('singlecsr',['id'=>$service->id]) }}" class="topmargin0">
			    <p style="font-size:14px;" class="text-left">{{$service->name}}</p>
			</a>
			
		</li>
            @endforeach
        </ul>
        
	</div>
         </div>
    </div>
    
    </div>
</div>

@endsection
