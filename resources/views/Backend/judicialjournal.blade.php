@extends('Backend.dashboard')
@section('title')
Judicial Journal
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
                    id="pills-annualreports-tab" data-toggle="pill" href="#pills-annualreports" role="tab" aria-controls="pills-annualreports"><i class="fa fa-pencil"></i> Edit Your Judicial Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addannualreport-tab" data-toggle="pill" href="#pills-addannualreport" role="tab" aria-controls="pills-addannualreport"><i class="fa fa-plus"></i> Add New Judicial Journal</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Annual Report Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-annualreports" role="tabpanel" aria-labelledby="pills-annualreports-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Judicial Journal</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($annualreports as $annualreport)
                            <tr>
                                <th class="text-left">{{ $annualreport->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.annualreport', ['id'=>$annualreport->id]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.annualreport', ['id'=>$annualreport->id]) }}" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Annual Reports Tab -->
                <!-- Start Add Annual Report Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addannualreport" role="tabpanel" aria-labelledby="pills-addannualreport-tab">
                    <form action="{{ route('add.annualreport') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Judicial Journal Name</label>
                            <input type="text" name="name"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Judicial Journal Name (EN)</label>
                            <input type="text" name="name_en"  class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label class="home-page-label">Upload An PDF file</label>
                            <input name="pdf_file" type="file" class="form-control">
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