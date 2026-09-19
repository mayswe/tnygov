@extends('Frontend.Template.layout')
@section('title')
{{ $singlejudge->title }}
@endsection
@section('content')

<!--Single-Service Start-->
<div class="single-service-area pt_30 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="service-info">
                    <div class="single-ser-carousel owl-carousel">
                        <div class="event-photo-item">
                            <img src="{{ asset('uploads/judges/'.$singlejudge->image) }}" alt="Service Image">
                        </div>
                    </div>
           
                    
                </div>
            </div>
            <div class="col-lg-8">
                <div class="service-info">
                    
                    <h2>{{ $singlejudge->name }}</h2>
                    <p class="single-service-p">{!! $singlejudge->long_description !!}</p>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--Single-Service End-->
@endsection
