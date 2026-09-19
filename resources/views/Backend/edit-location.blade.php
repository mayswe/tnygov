@extends('Backend.dashboard')
@section('title')
Edit Location
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
=            Start post Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Location : {{ $page->title }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('locationspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Location List
                </a>
                <form action="{{ route('update.location', ['id'=>$page->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Location Title</label>
                        <input type="text" name="title" value="{{ $page->title }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="home-page-label">Location Title (EN)</label>
                        <input type="text" name="title_en" value="{{ $page->title_en }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="home-page-label">Location Content</label>
                        <textarea id="editpage" name="content" class="form-control">{{ $page->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="home-page-label">Location Content (EN)</label>
                        <textarea id="editpage_en" name="content_en" class="form-control">{{ $page->content_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Location Map</label>
                        <input type="text" name="map" value="{{ $page->map }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success ">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of post Section  ====-->
@endsection

@section('ckeditor')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'editpage' );
    CKEDITOR.replace( 'editpage_en' );
</script>
@endsection
