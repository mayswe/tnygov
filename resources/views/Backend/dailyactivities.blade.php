@extends('Backend.dashboard')
@section('title')
CSR
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
=            Start Daily Activity Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-activities-tab" data-toggle="pill" href="#pills-activities" role="tab" aria-controls="pills-activities"><i class="fa fa-pencil"></i> Edit Your CSR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    id="pills-activitycategories-tab" data-toggle="pill" href="#pills-activitycategories" role="tab" aria-controls="pills-activitycategories"><i class="fa fa-pencil"></i> Edit Your Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addactivity-tab" data-toggle="pill" href="#pills-addactivity" role="tab" aria-controls="pills-addactivity"><i class="fa fa-plus"></i> Add New CSR</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start PRoject Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-activities" role="tabpanel" aria-labelledby="pills-activities-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">CSR</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <th class="text-left">{{ $activity->name }}</th>
                                <td class="text-center" style="width: 186px;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.activity', ['id'=>$activity->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.activity', ['id'=>$activity->id]) }}" >Delete</a>
                                    <a target="_blank" class="btn btn-info btn-sm" href="{{ route('singleannouncement', ['id'=>$activity->id]) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End PRoject Tab -->
                <!-- Start Cat Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade"
                    id="pills-activitycategories" role="tabpanel" aria-labelledby="pills-activitycategories-tab">
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
                            @foreach($activity_cats as $cat)
                            <tr>
                                <th class="text-left">{{ $cat->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.activity-category', ['id'=>$cat->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.activity-category', ['id'=>$cat->id]) }}" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="col-lg-5 col-md-12">
                    <p class="heading-title">Add New Category</p>
                    <form action="{{ route('add.activity-category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Category Name</label>
                            <input type="text" name="name" placeholder="Enter Your category name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Category Name (EN)</label>
                            <input type="text" name="name_en" placeholder="Enter Your category name.." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Save Informations</button>
                    </form>
                    </div>
                     </div>
                </div>
                <!-- End Cat Tab -->
                <!-- Start Add Activity Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addactivity" role="tabpanel" aria-labelledby="pills-addactivity-tab">
                    <form action="{{ route('add.activity') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">CSR Name</label>
                            <input type="text" name="name" placeholder="Enter Your CSR name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">CSR Name (EN)</label>
                            <input type="text" name="name_en" placeholder="Enter Your CSR name.." class="form-control">
                        </div>
                         <div class="form-group">
                            <label class="home-page-label">Short Description</label>
                            
                            <textarea rows="5" name="short_description" class="form-control" placeholder="Enter Short Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Short Description (EN)</label>
                            
                            <textarea rows="5" name="short_description_en" class="form-control" placeholder="Enter Short Description ..."></textarea>
                        </div>
                         <div class="form-group">
                            <label class="home-page-label">Body</label>
                            <textarea rows="5" name="body" class="form-control" id="addpage" placeholder="Enter Body ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Body (EN)</label>
                            <textarea rows="5" name="body_en" class="form-control" id="addpage_en" placeholder="Enter Body ..."></textarea>
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