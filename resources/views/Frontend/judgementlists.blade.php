@extends('Frontend.Template.layout')
@section('title')
Announcements
@endsection
@section('content')

<!--Portfolio Start-->
<div class="portfolio-area pt_40 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h4>{{__('messages.judgement_orderd')}}</h4>
                    <hr class="line">
                </div>
            </div>
            <div class="col-12">
                <div class="portfolio-menu">
                    <ul id="filtrnav">
                        <li class="filtr filtr-active" data-filter="all">All</li>
                        @foreach($cats as $cat)
                        <?php
            if (App::isLocale('en')) {
                $catname = $cat->name_en;
            }else{
                $catname = $cat->name;
            }
            ?>
                        <li class="filtr" data-filter="{{ $cat->id }}">{{ $catname }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row filtr-container">
            @foreach($news as $announcement)
            <?php
            if (App::isLocale('en')) {
                $name = $announcement->name_en;
            }else{

                $name = $announcement->name;
            }
            ?>
            <div class="col-lg-12 col-sm-12 filtr-item" data-category="{{ $announcement->category_id }}" data-sort="Menu">
                <div class="portfolio-group">
                    
                    <div class="portfolio-text">
                        <h3>{{ $name }}</h3>
                        <span><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="<?php echo e(asset('uploads/dailyactivities/' . $announcement->pdf_file)); ?>" type="application/pdf;">Download</a></span>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--Portfolio End-->
@endsection
