@extends('Backend.dashboard')
@section('title')
Cabinet
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
                    id="pills-judges-tab" data-toggle="pill" href="#pills-judges" role="tab" aria-controls="pills-judges"><i class="fa fa-pencil"></i> Edit Your Cabinet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-judge-tab" data-toggle="pill" href="#pills-judge" role="tab" aria-controls="pills-addjudge"><i class="fa fa-plus"></i> Add New Cabinet</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Annual Report Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-judges" role="tabpanel" aria-labelledby="pills-judges-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Cabinet</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($judges as $judge)
                            <tr>
                                <th class="text-left">{{ $judge->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.judge', ['id'=>$judge->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.judge', ['id'=>$judge->id]) }}" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Annual Reports Tab -->
                <!-- Start Add Annual Report Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-judge" role="tabpanel" aria-labelledby="pills-addjudge-tab">
                    <form action="{{ route('add.judge') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Name</label>
                            <input type="text" name="name" placeholder="Enter Your Judge name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Name (EN)</label>
                            <input type="text" name="name_en" placeholder="Enter Your Judge name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Position</label>
                            <textarea rows="5" name="short_description" class="form-control" placeholder="Enter Short Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Position (EN)</label>
                            <textarea rows="5" name="short_description_en" class="form-control" placeholder="Enter Short Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Long Description</label>
                            <textarea rows="5" name="long_description" class="form-control" id="addpage" placeholder="Enter Long Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Long Description (EN)</label>
                            <textarea rows="5" name="long_description_en" class="form-control" id="addpage_en" placeholder="Enter Long Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Upload An Image file For Your Member</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Sort Order</label>
                            <input type="text" name="order" placeholder="Enter Order No." class="form-control">
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
    CKEDITOR.replace( 'addpage_en' );
</script>
@endsection