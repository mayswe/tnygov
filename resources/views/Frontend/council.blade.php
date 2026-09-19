@extends('Frontend.Template.layout')
@section('title')
Announcements
@endsection
@section('content')

<!--Portfolio Start-->
<div class="container">
    <div class="row">
      <div class="col-12 pt_10">
    <nav aria-label="breadcrumb" style="width:100%">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">{{__('messages.home')}}</a></li>
    <li class="breadcrumb-item"><a href="/judges">{{__('messages.council')}}</a></li>
  </ol>
</nav>
            </div>
</div></div>

<div class="portfolio-area pb_70">
    <div class="container">
        
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h4>{{__('messages.counciltitle')}}</h4>
                    <hr class="line">
                    
                </div>
            </div>
           
        </div>
        <div class="row">
            
            @foreach($judges as $judge)
            <?php
            if (App::isLocale('en')) {
                $name = $judge->name_en;
                $short_description = $judge->short_description_en;
            }else{

                $name = $judge->name;
                $short_description = $judge->short_description;
            }
            ?>
            @if ($judge->id == 1)
    <div class="col-lg-12 col-sm-12" id="judgetop">
                <div class="judgebox">
                    <div class="judge_img"><img class="border" src="{{ asset('uploads/judges/' . $judge->image) }}" alt="Judge Image"></div>
                    <div class="judge_text">
                        <h3>{{ $name }}</h3>
                        <p>{{ $short_description }} ...</p>
                        <a class="btn btn-primary btn-project" href="{{ route('councildetail', ['id'=>$judge->id]) }}">Read More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
@else
<div class="col-lg-6 col-sm-12" id="judgebottom">
                <div class="judgebox">
                    <div class="judge_img"><img src="{{ asset('uploads/judges/' . $judge->image) }}" alt="Judge Image"></div>
                    <div class="judge_text">
                        <h3>{{ $name }}</h3>
                        <p>{{ $short_description }}</p>
                        <a class="btn btn-primary btn-project" href="{{ route('councildetail', ['id'=>$judge->id]) }}">Read More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
@endif
            
            
            @endforeach
        </div>
    </div>
</div>
<!--Portfolio End-->
@endsection
