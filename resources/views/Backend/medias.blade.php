@extends('Backend.dashboard')
@section('title')
Media
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
=            Start Media Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-medias-tab" data-toggle="pill" href="#pills-medias" role="tab" aria-controls="pills-medias"><i class="fa fa-pencil"></i> Edit Your Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    id="pills-mediacategories-tab" data-toggle="pill" href="#pills-mediacategories" role="tab" aria-controls="pills-mediacategories"><i class="fa fa-pencil"></i> Edit Your Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addmedia-tab" data-toggle="pill" href="#pills-addmedia" role="tab" aria-controls="pills-addmedia"><i class="fa fa-plus"></i> Add New Media</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start PRoject Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-medias" role="tabpanel" aria-labelledby="pills-medias-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Media</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medias as $media)
                            <tr>
                                <th class="text-left">{{ $media->name }}</th>
                                <td class="text-center" style="width:136px;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.media', ['id'=>$media->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.media', ['id'=>$media->id]) }}" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End PRoject Tab -->
                <!-- Start Cat Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade"
                    id="pills-mediacategories" role="tabpanel" aria-labelledby="pills-mediacategories-tab">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                    <p class="heading-title">List Of Categories</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Categories</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($media_cats as $cat)
                            <tr>
                                <th class="text-center">{{ $cat->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.media-category', ['id'=>$cat->id]) }}">Edit Category</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.media-category', ['id'=>$cat->id]) }}" >Delete Category</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="col-lg-5 col-md-12">
                    <p class="heading-title">Add New Category</p>
                    <form action="{{ route('add.media-category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Category Name</label>
                            <input type="text" name="name" placeholder="Enter Your category name.." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Save Informations</button>
                    </form>
                    </div>
                     </div>
                </div>
                <!-- End Cat Tab -->
                <!-- Start Add Activity Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addmedia" role="tabpanel" aria-labelledby="pills-addmedia-tab">
                    <form action="{{ route('add.media') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Media Name</label>
                            <input type="text" name="name"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Media Name (EN)</label>
                            <input type="text" name="name_en"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Media Category</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($media_cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="home-page-label">Youtube Link</label>
                            <input name="media_file" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Youtube Link (EN)</label>
                            <input name="media_file_en" type="text" class="form-control">
                        </div>
                        
                        
                       
                       
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Add Package Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
@section('ckeditor')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'addpage' );
</script>
@endsection