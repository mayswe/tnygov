@extends('Backend.dashboard')
@section('title')
Edit Footer
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
=            Start Footer Slider Block Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Footer Slider Block : {{ $footers->name }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('covidtopboxpage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Footer List
                </a>
                <form action="{{ route('update.covidtopbox',['id'=>$footers->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="home-page-label">Date (Month/Date/Year)</label>
                            <input type="date" name="news_date" value="{{ $footers->date }}" class="form-control">
                        </div>
                    
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                <?php
                                $type1 = NULL;
                                $type2 = NULL;
                                $type3 = NULL;
                                $type4 = NULL;
                                if($footers->type==1){
                                    $type1 = 'checked';
                                }else if($footers->type==2){
                                    $type2 = 'checked';
                                }else if($footers->type==3){
                                  $type3 = 'checked';
                                }else if($footers->type==4){
                                   $type4 = 'checked';
                                }   ?>
                                <option <?php echo $type1;?> value="1">ဓာတ်ခွဲစစ်ဆေးသူစုစုပေါင်း</option>
                                <option <?php echo $type2;?> value="2">ပိုးတွေ့</option>
                                <option <?php echo $type3;?> value="3">ပိုးတွေ့သေဆုံးလူနာ</option>
                                <option <?php echo $type4;?> value="4">ပိုးတွေ့ပြန်လည်သက်သာ</option>
                               
                            </select>
                        </div>
                  <div class="form-group">
                        <label class="home-page-label">Total</label>
                        <input type="number" name="people" value="{{ $footers->people }}" class="form-control">
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
    CKEDITOR.replace( 'addpage' );
</script>
@endsection