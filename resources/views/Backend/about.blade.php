@extends('Backend.dashboard')
@section('title')
About us
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
=            Start About Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-company-tab" data-toggle="pill" href="#pills-company" role="tab" aria-controls="pills-company"><i class="fas fa-building"></i> Company Infos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-logo-tab" data-toggle="pill" href="#pills-logo" role="tab" aria-controls="pills-logo"><i class="fas fa-image"></i> Company Logo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history"><i class="fas fa-history"></i> Our History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-mission-tab" data-toggle="pill" href="#pills-mission" role="tab" aria-controls="pills-mission"><i class="fas fa-briefcase"></i> Our Mission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-vision-tab" data-toggle="pill" href="#pills-vision" role="tab" aria-controls="pills-vision"><i class="fas fa-eye"></i> Our Vision</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills"><i class="fas fa-edit"></i> Edit Skills</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Company Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
                    <form method="POST" action="{{ route('update.company') }}">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Company Name</label>
                            <input type="text" name="name" value="{{ $info->name }}" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Email Address</label>
                                <input type="email" name="email" value="{{ $info->email }}" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Phone n°</label>
                                <input type="text" name="phone" value="{{ $info->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Professional Address</label>
                            <input type="text" name="address" value="{{ $info->address }}" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Country</label>
                                <input type="text" name="country" value="{{ $info->country }}" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">State / Province / Region</label>
                                <input type="text" name="state" value="{{ $info->state }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">City / Town</label>
                                <input type="text" name="city" value="{{ $info->city }}" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Zip/Postal Code</label>
                                <input type="text" name="zipcode" value="{{ $info->zipcode }}" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Company Tab -->
                <!-- Start Logo Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-logo" role="tabpanel" aria-labelledby="pills-logo-tab">
                    <form method="POST" action="{{ route('update.logo') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Upload A New Company Logo</label>
                            <input name="logo" type="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <small>Current Logo :</small>
                            <img src="{{ asset('uploads/' . $about->logo) }}" height="300px">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End logo Tab -->
                <!-- Start history Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                    <form action="{{ route('update.history') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Our History</label>
                            <textarea name="history" class="form-control" rows="15">{{ $about->history }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End history Tab -->
                <!-- Start Mission Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab">
                    <form action="{{ route('update.mission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Our Mission</label>
                            <textarea name="mission" class="form-control" rows="15">{{ $about->mission }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Mission Tab -->
                <!-- Start vision Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="pills-vision-tab">
                    <form action="{{ route('update.vision') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Our Vision</label>
                            <textarea name="vision" class="form-control" rows="15">{{ $about->vision }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End vision Tab -->
                <!-- Start Navbar Menu Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
                    <a href="{{ route('add.skill') }}" class=" col-10 offset-1 btn btn-success btn-block">Add New Skill</a>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Skill Name</th>
                                <th class="text-center">Skill Pourcentage %</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                            <tr>
                                <th class="text-center">{{ $skill->name }}</th>
                                <td class="text-center">{{ $skill->pourcentage }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.skill', ['id'=> $skill->id]) }}">Edit Skill</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.skill', ['id'=> $skill->id]) }}">Delete Skill</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
