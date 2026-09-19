@extends('Backend.dashboard')
@section('title')
Add New Slider
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
                Add A New Slider
            </div>
            <div class="card-body">
                <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Title (EN)</label>
                        <input type="text" name="title_en" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Description</label>
                        <textarea name="description" id="addpage"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Description (EN)</label>
                        <textarea name="description_en" id="addpage_en"></textarea>
                    </div>
                    <div class="form-group">
                       <label class="home-page-label">Slider Image</label>
                        <input required type="file" class="form-control" name="image" placeholder="image" multiple>
                    </div>
                    <div class="form-group">
                       <label class="home-page-label">News Image</label>
                        <input required type="file" class="form-control" name="images[]" placeholder="image" multiple>
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
    CKEDITOR.replace( 'addpage' );
    CKEDITOR.replace( 'addpage_en' );
</script>
@endsection
