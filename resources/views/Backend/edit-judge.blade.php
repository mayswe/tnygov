@extends('Backend.dashboard')
@section('title')
Edit Cabinet
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
=            Start Judge Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Member : {{ $judges->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('judgespage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Cabinet List
                </a>
                <form action="{{ route('update.judge',['id'=>$judges->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label"> Name</label>
                        <input type="text" name="name" value="{{ $judges->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label"> Name (EN)</label>
                        <input type="text" name="name_en" value="{{ $judges->name_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Position</label>
                        <textarea rows="5" name="short_description" class="form-control">{{ $judges->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Position (EN)</label>
                        <textarea rows="5" name="short_description_en" class="form-control">{{ $judges->short_description_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Long Description</label>
                        <textarea rows="5" name="long_description" id="addpage" class="form-control">{{ $judges->long_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Long Description (EN)</label>
                        <textarea rows="5" name="long_description_en" id="addpage_en" class="form-control">{{ $judges->long_description_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload An Image For Your Member</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <small style="font-weight: bold;" class="text-dark">Current Image file :</small>
                        <img src="{{ asset('uploads/judges/' . $judges->image) }}" height="300px">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Sort Order</label>
                        <input type="text" name="order" value="{{ $judges->order }}" class="form-control">
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
    CKEDITOR.replace( 'addpage' );
    CKEDITOR.replace( 'addpage_en' );
</script>
@endsection