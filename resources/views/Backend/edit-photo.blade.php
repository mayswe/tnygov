@extends('Backend.dashboard')
@section('title')
Edit News
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
=            Start Annual Report Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This News : {{ $news->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('photopage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To News List
                </a>
                <form action="{{ route('update.photo',['id'=>$news->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Photo Title</label>
                        <input type="text" name="name" value="{{ $news->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Photo Title (EN)</label>
                        <input type="text" name="name_en" value="{{ $news->name_en }}" class="form-control">
                    </div>
                   <div class="form-group">
                        <label class="home-page-label">Show Date</label>
                        <input type="text" name="show_date" value="{{ $news->show_date }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload Images</label>
                        
                        <input required type="file" class="form-control" value="{{ $news->image }}"  name="images[]" placeholder="image" multiple>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload Images (EN)</label>
                        
                        <input required type="file" class="form-control" value="{{ $news->image_en }}"  name="images_en[]" placeholder="image" multiple>
                    </div>
                    <div class="mb-3">
                        <small style="font-weight: bold;" class="text-dark">Current Image file :</small>
                        <?php $images = explode("|", $news->image);
                        foreach($images as $image){
                            ?>
                            <img src="{{ asset('uploads/photo/' . $image) }}" height="300px">
                            <?php
                        }
                         ?>
                        
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