@extends('Backend.dashboard')
@section('title')
Edit Tender
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
=            Start Tender Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Tender : {{ $tenders->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('tenderspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Tender List
                </a>
                <form action="{{ route('update.tender',['id'=>$tenders->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Tender Name</label>
                        <input type="text" name="name" value="{{ $tenders->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Tender Name (EN)</label>
                        <input type="text" name="name_en" value="{{ $tenders->name_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Short Description</label>
                        <textarea rows="5" name="short_description" id="addpage" class="form-control">{{ $tenders->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Short Description (EN)</label>
                        <textarea rows="5" name="short_description_en" id="addpage_en" class="form-control">{{ $tenders->short_description_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Budget Year</label>
                        <input type="text" name="budget_year" value="{{ $tenders->budget_year }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Budget Year (EN)</label>
                        <input type="text" name="budget_year_en" value="{{ $tenders->budget_year_en }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload A PDF file For Your Tender</label>
                        <input name="pdf_file" type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <small style="font-weight: bold;" class="text-dark">Current PDF file :</small>
                        <img src="{{ asset('uploads/tenders/' . $tenders->pdf_file) }}" height="300px">
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