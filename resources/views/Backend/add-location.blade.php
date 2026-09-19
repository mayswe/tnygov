@extends('Backend.dashboard')
@section('title')
Add Location
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
=            Start Page Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active" id="pills-addskill-tab" data-toggle="pill" href="#pills-addskill" role="tab" aria-controls="pills-addskill"><i class="fas fa-plus"></i> Add Page</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('locationspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Locations List
                </a>
                <!-- Start Add Page Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active" id="pills-addskill" role="tabpanel" aria-labelledby="pills-addskill-tab">
                    <form action="{{ route('add.location') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Add Location Title</label>
                            <input type="text" placeholder="Enter Page Title.." name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Add Location Title (EN)</label>
                            <input type="text" placeholder="Enter Page Title.." name="title_en" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Add Location Content</label>
                            <textarea name="content" id="addpage"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="home-page-label">Add Location Content (EN)</label>
                            <textarea name="content_en" id="addpage_en"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Add Location Map</label>
                            <input type="text"  name="map" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Save Page</button>
                    </form>
                </div>
                <!-- End Add Page Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section  ====-->
@endsection

@section('ckeditor')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'addpage' );
    CKEDITOR.replace( 'addpage_en' );
</script>
@endsection
