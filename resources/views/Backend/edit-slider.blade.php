@extends('Backend.dashboard')
@section('title')
Edit Slider
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
                Edit This Slider
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('sliderpage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Sliders List
                </a>
                <form action="{{ route('update.slider', ['id' => $slider->id]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Edit Title</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Title (EN)</label>
                        <input type="text" name="title_en" value="{{ $slider->title_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Description</label>
                        
                        <textarea id="editpage" name="description" class="form-control">{{ $slider->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Description (EN)</label>
                        
                        <textarea id="editpage_en" name="description_en" class="form-control">{{ $slider->description_en }}</textarea>
                    </div>
                    <div class="form-group">
                            <label class="home-page-label">Change Slider Image</label>
                            <input type="file" class="form-control" name="image" placeholder="image">
                        </div>
                    <div class="form-group">
                            <label class="home-page-label">Change News Images</label>
                            <input type="file" class="form-control" name="images[]" placeholder="image" multiple>
                        </div>
                        <div class="mb-3">
                            
                            <?php $images = explode("|", $slider->image);
                        foreach($images as $image){
                            ?>
                            <img src="{{ asset('uploads/slider/' . $image) }}" height="300px">
                            <?php
                        }
                         ?>
                            
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Slider Section  ====-->
@endsection

@section('ckeditor')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'editpage' );
    CKEDITOR.replace( 'editpage_en' );
</script>
@endsection
