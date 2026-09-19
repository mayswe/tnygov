@extends('Frontend.Template.layout')
@section('title')
Covid
@endsection
@section('content')


<div>
 <img width="100%" src="https://magway.gov.mm/storage/uploads/COVID-19-banner_1625760899.jpg">
</div>




<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
<!-- start breadcrumb -->
<div class="container">
    <div class="row" >
     <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row" >
            <table class="table table-borderless" style="color:white; font-weight:bold;">
                
                <tr><td class="bg-primary text-center">
                    <p>ဓာတ်ခွဲစစ်ဆေးသူစုစုပေါင်း</p>
                    <p style="font-size:40px">@foreach($ctype1 as $ctype1s)
                        {{ $ctype1s->people }}
                         @endforeach
                    </p>
                    <p>(Total Specimens Tested)</p></td>
                <td class="bg-warning text-center">
                    <p>ပိုးတွေ့</p>
                    <p style="font-size:40px">@foreach($ctype2 as $ctype2s)
                        {{ $ctype2s->people }}
                         @endforeach</p>
                    <p>(Lab Confirmed)</p>
                    </td>
                <td class="bg-danger text-center"><p>ပိုးတွေ့သေဆုံးလူနာ</p>
                    <p style="font-size:40px">@foreach($ctype3 as $ctype3s)
                        {{ $ctype3s->people }}
                         @endforeach</p>
                    <p>(Death among Lab Confirmed)</p></td>
                <td class="bg-success text-center">
                    <p>ပိုးတွေ့ပြန်လည်သက်သာ</p>
                    <p style="font-size:40px">@foreach($ctype4 as $ctype4s)
                        {{ $ctype4s->people }}
                         @endforeach</p>
                    <p>(Recovered)</p></td></tr>
                
                    </table></div></div>   
<div class="col-12 pt_10">
                <div class="headline">
                    <h1>ဆောင်ရွက်နေမှုများ</h1> 
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
                $cover = $post->image;
            }else{

                $name = $post->name;
                $short_description = $post->short_description;
                $cover = $post->image;
            }
            ?>
                
                <div class="col-lg-6">
                <div class="blog-item">
                    
                    <div class="blog-text" >
                        
                        <?php 
                        if($cover){
                            ?>
                        <img height="201" src="{{ asset('uploads/covid/' . $cover) }}" alt="{{ $name }}">
                        <?php
                        }
                        ?>
                        <h3><a  href="{{ route('singlecovid',['id'=>$post->id]) }}">{{ $name }}</a></h3>
                    </div>
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
                            <li class="blog-button"><a href="{{ route('singlecovid',['id'=>$post->id]) }}">{{__('messages.more')}} <i class="fa fa-chevron-circle-right"></i></a></li>
                        </ul>
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
                    
                <div class="portlet-body" style="padding-top:30px;">

    <h3>{{__('messages.emergency_calls')}}</h3>
                <hr style="height: 4px; background: #fed23e">
	
        
      @foreach($rightblock as $block)
            <li style="list-style: none;
    line-height:17px; padding-left:20px">
			    <p style="font-weight:bold;">{{$block->name}}</p>
			    <p style="font-size:14px;" class="text-left">{!! $block->body !!}</p>
			
			
		</li>
            @endforeach
        
	</div>
                </div>
                <div class="col-lg-12 pt_15">
                    <a target="_blank" href="https://mohs.gov.mm/Main/content/publication/2019-ncov"><img width="100%" src="https://magway.gov.mm/storage/uploads/Screen Shot 2021-07-08 at 11.28.43 PM_1625763531.png"></a>
                    </div>
                 

</div>
                <div class="col-lg-12 pt_15">
                <h3>လိုက်နာရမည့်အချက်များ</h3>
                <hr style="height: 4px; background: #fed23e">
                
                <div>
                <p><img width="100%"alt="" src="https://magway.gov.mm/storage/uploads/covid3_1625761897.jpg"  /></p>

<p><img width="100%"alt="" src="https://magway.gov.mm/storage/uploads/covid2_1625761911.jpg"  /></p>

<p><img width="100%" alt="" src="https://magway.gov.mm/storage/uploads/covid1_1625761922.jpg"  /></p>    
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