@extends('Backend.dashboard')
@section('title')
Edit CSR
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
=            Start Announcement Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This CSR : {{ $activities->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('dailyactivitiespage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To CSR List
                </a>
                <form action="{{ route('update.activity',['id'=>$activities->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">CSR Name</label>
                        <input type="text" name="name" value="{{ $activities->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">CSR Name (EN)</label>
                        <input type="text" name="name_en" value="{{ $activities->name_en }}" class="form-control">
                    </div>
                     <div class="form-group">
                        <label class="home-page-label">Short Description</label>
                        
                        <textarea rows="5" name="short_description"  class="form-control">{{ $activities->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Short Description (EN)</label>
                        
                        <textarea rows="5" name="short_description_en"  class="form-control">{{ $activities->short_description_en }}</textarea>
                    </div>
                   <div class="form-group">
                        <label class="home-page-label">Body</label>
                        <textarea rows="5" name="body" id="addpage" class="form-control">{{ $activities->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Body (EN)</label>
                        <textarea rows="5" name="body_en" id="addpage_en" class="form-control">{{ $activities->body_en }}</textarea>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Announcement Section  ====-->
@endsection
@section('ckeditor')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
 <script>
CKEDITOR.replace( 'addpage', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace( 'addpage_en', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
@endsection