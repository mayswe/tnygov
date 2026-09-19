@extends('Backend.dashboard')
@section('title')
Edit Announcement
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
                Edit This Announcement : {{ $announcement->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('announcementspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Announcement List
                </a>
                <form action="{{ route('update.announcement',['id'=>$announcement->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Announcement Name</label>
                        <input type="text" name="name" value="{{ $announcement->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Announcement Name (EN)</label>
                        <input type="text" name="name_en" value="{{ $announcement->name_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Announcement Category</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach($announcement_cats as $cat)
                            <option @if($cat->id == $announcement->category_id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Long Description</label>
                        <textarea rows="5" name="long_description" id="addpage" class="form-control">{{ $announcement->long_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Long Description (EN)</label>
                        <textarea rows="5" name="long_description_en" id="addpage_en" class="form-control">{{ $announcement->long_description_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload A PDF</label>
                        <input name="pdf_file" type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <small style="font-weight: bold;" class="text-dark">Current PDF file :</small>
                        <span>{{$announcement->pdf_file}}</span>
                    </div>
                  
                  
                   
                    
                    <div class="form-group">
                        <label class="home-page-label">Cover Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                     <div class="mb-3">
                        <small style="font-weight: bold;" class="text-dark">Current Image file :</small>
                        <img src="{{ asset('uploads/announcements/' . $announcement->cover) }}" height="300px">
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