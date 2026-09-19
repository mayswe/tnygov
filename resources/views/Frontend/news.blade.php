@extends('Frontend.Template.layout')
@section('title')
News
@endsection
@section('content')


<div class="l-banner l-row" style="display:none;" >
  
  <div class="l-pr page__row pr-banner">
    <div class="l-rw regions container pr-banner__rw arc--1 hr--1" data-at-regions="">
      <div data-at-region="1" data-at-block-count="1" class="l-r region pr-banner__banner" id="rid-banner"><div id="block-aboutus" class="l-bl block block-config-provider--block-content block-plugin-id--block-content-1fd29712-bcec-428e-80c0-819b0be1b822 block--type-basic block--view-mode-full">
  <div class="block__inner">

    <div class="block__content">
        <div class="clearfix text-formatted field field-block-content--body field-formatter-text-default field-name-body field-type-text-with-summary field-label-hidden has-single">
            <div class="field__items">
                    <section class="search-sec">
                    <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Hide':'သတင်းများ ရှာရန်နှိပ်ပါ');});">သတင်းများ ရှာရန်နှိပ်ပါ
                    </a>
                    <div class="container details"  style="display:none;">
    <form action="search" name="yourForm" id="theForm" method="get">    
           {{csrf_field()}}
            <div class="row">
               
                        <div class="col-lg-3 col-md-3 col-sm-12 pb_10">
                           
                            <select id="district" name="district" class="form-control search-slt">
        <option value="">Select District</option>
        @foreach ($districts as $key => $value)
            <option value="{{ $value->id }}" {{ $district == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
        @endforeach
    </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 pb_10">
                           
 
                            <select name="township" class="form-control search-slt" id="township">
                                    <option value="">Select Township</option>
                                    @foreach($townships as $township)
                                    
                                    <option value="{{ $township->id }}" {{ $tsp == $township->id ? 'selected' : ''}}>{{ $township->name }}</option>
                                    @endforeach
                                    </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 pb_10">
                            <select name="department" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $dept == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>
                                    @endforeach
                                    </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 pb_10">
                            <select name="position" class="form-control search-slt" id="exampleFormControlSelect1">
                                <option value="">Select Position</option>
                                    @foreach($positions as $position)
                                    <option value="{{ $position->id }}" {{ $posi == $position->id ? 'selected' : ''}}>{{ $position->name }}</option>
                                    @endforeach
                                    </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12  pb_10">
                        <input class="date form-control search-slt"  value="{{ $start_date }}" name="start_date" placeholder="Start Date" type="text">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12  pb_10">
                        <input class="date form-control search-slt" value="{{ $end_date }}" name="end_date" placeholder="End Date" type="text">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12  pb_10">
                            <input type="text" value="{{ $search }}" class="form-control search-slt" name="search" placeholder="Any Text">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12  pb_10">
                            
                            <input type="submit" value="submit" class="btn btn-danger wrn-btn"/>
                        </div>
                
                    
            </div>
        </form>
    </div>
                    </section>
                    
    

    

</div>
</div>
</div>
</div>
</div>
</div>
    </div>
  </div>
  
</div>




<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
<!-- start breadcrumb -->
<div class="container">
    <div class="row" >
        
<div class="col-12 pt_10">
                <div class="headline">
                    <h1>{{__('messages.news')}}</h1>
                    <hr class="line">
                </div>
           
</div>
        </div>
    </div>
<!-- end breadcrumb -->
    <div class="container">
        <div class="row">
         <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row">
            @foreach($news as $post)
            <?php
            if (App::isLocale('en')) {
                $name = $post->name_en;
                $short_description = $post->short_description_en;
            }else{

                $name = $post->name;
                $short_description = $post->short_description;
            }
            ?>
                
                <div class="col-md-6" style="padding-top:20px;">
                <div class="card-content">
                    <div class="card-img">
                        <a href="{{ route('singlepost',['id'=>$post->id]) }}">
                        <?php
        $results = DB::select('select * from news_images where news_id = :id', ['id' => $post->id]);
        foreach ($results as $user) {
    $image =  $user->name;
           
}
        if (empty($image)) {
            ?>
        <img src="{{ asset('uploads/news/noimage.jpg') }}" class="img-fluid" alt="{{$post->name }}">
        <?php
        }else{
            ?>
        <img src="{{ asset('uploads/news/' . $image) }}" class="img-fluid" alt="{{$post->name }}">
        <?php
        }
        ?>    </a>
                        
                    </div>
                    <div class="card-desc">
                        <?php
        $postion_results = DB::select('select * from positions where id = :position', ['position' => $post->position]);
        foreach ($postion_results as $postion){
        $postion_name =  $postion->name;
        $postion_id =  $postion->id;
        }
        
        ?>
        <?php
        $location_results = DB::select('select * from townships where id = :tsp', ['tsp' => $post->tsp]);
        foreach ($location_results as $location){
        $location_name =  $location->name;
        $location_id =  $location->id;
        }
        
        ?>  
                        <div class="datetime pt_5 pb_5">
                            <a href="{{ route('newsposition',['id'=>$postion_id]) }}" class="datetime">{{$postion_name}}</a>&nbsp;|&nbsp;
                            <a href="{{ route('newslocation',['id'=>$location_id]) }}" class="datetime">{{$location_name}}</a>
                        </div>
                        <h3><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{ $name }}</a></h3>
                       
                        
                        
					<div class="post hid blog-author" style="width:100%">
                        <ul>
                            <?php
                                if($post->news_date == NULL){
                                    $news_date = $post->created_at;
                                }else{
                                    $news_date = $post->news_date;
                                }
                                ?>
                            <li><i class="fa fa-calendar-o"></i>{{ date('d-m-Y', strtotime($news_date)) }}</li>
                            <li class="blog-button"><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{__('messages.more')}} <i class="fa fa-chevron-circle-right"></i></a></li>
                        </ul>
                    </div>
				
                    </div>
                </div>
            </div>
                @endforeach
          
            

            <div class="col-12 pt_10 text-center">
            {{ $news->links() }}
            </div>
        
            </div>
            </div>
            <div id ="rid-sidebar-first" class="col-lg-4 pb_15">
                <div id="row">
                <div class="col-lg-12">
                <h3>အစိုးရအဖွဲ့ သတင်းများ</h3>
      <hr style="height: 4px; background: #fed23e">
      <ul style="list-style-type: none;">
   @foreach($positions as $page)
      <li style="padding:5px 0;">
      <a href="{{ route('newsposition',['id'=>$page->id]) }}" >{{$page->name}}</a>
      </li>
   @endforeach 
    </ul>
                </div>
<div class="col-lg-12 pt_15">
                <h3>ခရိုင်/မြို့နယ်သတင်းများ</h3>
      <hr style="height: 4px; background: #fed23e">
                  
    <ul style="list-style-type: none;">
    @foreach($townships as $township)
    
    <li style="padding:5px 0;">
      <a href="{{ route('newslocation',['id'=>$township->id]) }}">{{$township->name}}</a>
                        </li>
      @endforeach 
      <ul>
    </div>
                <div class="col-lg-12 pt_15">
                <h3>Archive</h3>
                <hr style="height: 4px; background: #fed23e">
             
    @foreach($archive as $year => $months)
    <div>
       
                <ul style="list-style-type: none;">
                    @foreach($months as $month => $posts)
                        <li style="padding:5px 0;">
                            <?php
                            $date = date_parse($month);
                            $monthname = $date['month'];
                            $numlength = mb_strlen($monthname);
                            if ($numlength==1){
                                $date = '0'.$monthname;
                            }else{
                                $date = $monthname;
                            }
                            $id = $year.'-'.$date;
                            ?>
                            <a href="{{ route('newsarchive',['id'=>$id]) }}" > {{ $month }} {{ $year }} ( {{ count($posts) }} )</a>
                        </li>

                    @endforeach
                </ul>
          
    </div>
@endforeach
    

  
          
</div>

    
  
   
    

    </div>
  
          </div>
</div>
                    <div class="row pt_15" style="display:none;">
  <div class="block__inner">

    <h2 id="block-views-block-block-latest-news-block-2-title">
      <span>ဌာနသတင်းများ</span>
    </h2>
      <div class="view-block-latest-news">
        
   @foreach($departments as $page)
    <div class="views-row">
    <div class="views-field-title">
      <a href="{{ route('news') }}" >{{$page->name}}</a>
    </div>
    
  </div>
   @endforeach 
    

    </div>
  
          </div>
</div>
                

</div>
            </div>

        </div>
        
    </div>
</div>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-m-d'
     });  
</script> 
<script>
         $(document).ready(function() {
        $('#district').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/findCityWithStateID/'+stateID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#township').empty();
                        $('#township').focus;
                        $('#township').append('<option value="">-- Select Township --</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="township"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                    });
                  }else{
                    $('#city').empty();
                  }
                  }
                });
            }else{
              $('#city').empty();
            }
        });
    });
    </script>
<!--Blog End-->
@endsection