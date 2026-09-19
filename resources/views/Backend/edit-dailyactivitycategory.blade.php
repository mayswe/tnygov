@extends('Backend.dashboard')
@section('title')
Edit Category
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
=            Start Category Section     =
======================================-->
<div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit Category :
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('dailyactivitiespage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Projects List
                </a>
                <form action="{{ route('update.activity-category',['id'=> $activity_cats->id]) }}" class="col-8 offset-2" method="post">
                    @csrf
                    <div  class="form-group">
                        <label>Edit Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $activity_cats->name }}">
                    </div>
                    <div  class="form-group">
                        <label>Edit Category Name (EN)</label>
                        <input type="text" class="form-control" name="name_en" value="{{ $activity_cats->name_en }}">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Package Section  ====-->
@endsection
