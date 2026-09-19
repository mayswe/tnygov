@extends('Backend.dashboard')
@section('title')
Announcements
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
=            Start Pricing Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-announcements-tab" data-toggle="pill" href="#pills-announcements" role="tab" aria-controls="pills-announcements"><i class="fa fa-pencil"></i> Edit Your Announcements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    id="pills-announcementcategories-tab" data-toggle="pill" href="#pills-announcementcategories" role="tab" aria-controls="pills-announcementcategories"><i class="fa fa-pencil"></i> Edit Your Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addannouncement-tab" data-toggle="pill" href="#pills-addannouncement" role="tab" aria-controls="pills-addannouncement"><i class="fa fa-plus"></i> Add New Announcement</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start PRoject Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-announcements" role="tabpanel" aria-labelledby="pills-announcements-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Announcements</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($announcements as $announcement)
                            <tr>
                                <th class="text-left">{{ $announcement->name }}</th>
                                <td class="text-center" style="width: 186px;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.announcement', ['id'=>$announcement->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.announcement', ['id'=>$announcement->id]) }}" >Delete</a>
                                    <a target="_blank" class="btn btn-info btn-sm" href="{{ route('singleannouncement', ['id'=>$announcement->id]) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End PRoject Tab -->
                <!-- Start Cat Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade"
                    id="pills-announcementcategories" role="tabpanel" aria-labelledby="pills-announcementcategories-tab">
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
                            @foreach($announcement_cats as $cat)
                            <tr>
                                <th class="text-left">{{ $cat->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.announcement-category', ['id'=>$cat->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.announcement-category', ['id'=>$cat->id]) }}" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="col-lg-5 col-md-12">
                    <p class="heading-title">Add New Category</p>
                    <form action="{{ route('add.announcement-category') }}" method="POST" enctype="multipart/form-data">
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
                <!-- Start Add Project Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addannouncement" role="tabpanel" aria-labelledby="pills-addannouncement-tab">
                    <form action="{{ route('add.announcement') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Announcement Name</label>
                            <input type="text" name="name" placeholder="Enter Your Announcement name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Announcement Name (EN)</label>
                            <input type="text" name="name_en" placeholder="Enter Your Announcement name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Announcement Category</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($announcement_cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Body</label>
                            <textarea rows="5" name="long_description" class="form-control" id="addpage" placeholder="Enter Long Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Body (EN)</label>
                            <textarea rows="5" name="long_description_en" class="form-control" id="addpage_en" placeholder="Enter Long Description ..."></textarea>
                        </div>
                       
                        <div class="form-group">
                            <label class="home-page-label">Upload An PDF</label>
                            <input name="pdf_file" type="file" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label class="home-page-label">Cover Image</label>
                            <input name="image" type="file" class="form-control">
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