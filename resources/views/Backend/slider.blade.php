@extends('Backend.dashboard')
@section('title')
Slider
@endsection
@section('content')
<!--=====================================
=    Start Session & Errors Display     =
======================================-->
<!-- Session Alert Start -->
@if(Session::has('success'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(Session::has('danger'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
<!-- Session Alert End -->
<!-- Dislay Errors Start -->
@if(count($errors) > 0)
<div class="row">
    <div class="col-10 offset-1">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
<!-- Dislay Errors End -->
<!--====  End of Section Sessions & Errors Display  ====-->
<!--=====================================
=            Start Slider Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Manage Slider 
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-success add-new-slider" href="{{ route('create.slider') }}">
                    <i class="fas fa-plus-circle"></i>
                    Add New Slider
                </a>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Slider -->
                    @foreach($sliders as $slider)
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Slider {{ $slider->id }}
                            <a href="{{ route('edit.slider', ['id' => $slider->id]) }}" class="edit-slider badge-pill badge badge-primary">
                                <i class="fas fa-edit"></i>
                                Edit This Slider
                            </a>
                            <a href="{{ route('delete.slider', ['id' => $slider->id]) }}" class="delete-slider badge-pill badge badge-danger text-white btn-sm"><i class="fas fa-minus-circle"></i> Delete This Slider</a>
                        </div>
                        <img class="image-slider" src="{{ asset('uploads/slider/' . $slider->slide) }}">
                        <div class="card-body text-white card-body-bg">
                        </div>
                        <h4 class="card-text slider-title">{{ $slider->title }}</h4>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--====  End of Slider Section  ====-->
@endsection
