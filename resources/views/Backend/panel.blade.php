@extends('Backend.dashboard')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Announcements</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('announcementspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Cabinet</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('judgespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">CSR</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('dailyactivitiespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">FAQ's</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('faqspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Media</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('mediaspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">News</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('postspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Pages</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('pagespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25"  style="margin-top: 20px;">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Slider</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('sliderpage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25"  style="margin-top: 20px;">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Tender</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('tenderspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
@endsection
