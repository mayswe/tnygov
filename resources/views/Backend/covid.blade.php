@extends('Backend.dashboard')
@section('title')
Covid
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
=            Start AnnucalReport Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-news-tab" data-toggle="pill" href="#pills-judges" role="tab" aria-controls="pills-news"><i class="fa fa-pencil"></i> Edit Your Covid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-news-tab" data-toggle="pill" href="#pills-addnews" role="tab" aria-controls="pills-addnews"><i class="fa fa-plus"></i> Add Covid</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Annual Report Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Covid</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($covid as $new)
                            <tr>
                                <th class="text-left">{{ $new->name }}</th>
                                <td class="text-center" style="width: 186px;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.covid', ['id'=>$new->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.covid', ['id'=>$new->id]) }}" >Delete</a>
                                    <a target="_blank" class="btn btn-info btn-sm" href="{{ route('singlepost',['id'=>$new->id]) }}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 pt_10 text-center">
 {{$covid->links()}}
 </div>
                </div>
                <!-- End Annual Reports Tab -->
                <!-- Start Add Annual Report Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addnews" role="tabpanel" aria-labelledby="pills-addnews-tab">
                    <form class="form-horizontal" action="{{ route('add.covid') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Covid Date</label>
                            <input type="date" name="news_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Covid Title</label>
                            <input type="text" name="name" placeholder="Enter Your Covid Title.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Covid Title (EN)</label>
                            <input type="text" name="name_en" placeholder="Enter Your Covid Title.." class="form-control">
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
                        <div class="form-group">
                            <label class="home-page-label">Upload Images</label>
                            <!-- <input name="image" type="file" class="form-control"> -->
                            <input type="file" class="form-control" name="image" placeholder="image" multiple>
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
