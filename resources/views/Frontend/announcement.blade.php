@extends('Frontend.Template.layout')
@section('title')
{{ $singlejudge->title }}
@endsection
@section('content')

<!--Single-Service Start-->
<div class="single-service-area pt_30 pb_50">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="service-info">
                    <?php
                    $pdf_file = "1691132486အဂတိလျှောက်လွှာ.pdf";
                    ?>
                    <h2>{{ $singlejudge->name }}</h2>
                    <p class="single-service-p">{!! $singlejudge->long_description !!}</p>
                   
                     <span><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="<?php echo e(asset('uploads/announcements/' . $singlejudge->pdf_file)); ?>" type="application/pdf;">Download</a></span>
                    
                    
                </div>
            </div>
           
        </div>
    </div>
</div>
<!--Single-Service End-->
@endsection
