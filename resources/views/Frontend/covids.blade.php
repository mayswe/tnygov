@extends('Frontend.Template.layout')
@section('title')
{{ $singlejudge->name }}
@endsection
@section('content')
<div>
 <img width="100%" src="https://magway.gov.mm/storage/uploads/COVID-19-banner_1625760899.jpg">

  </div>
<!--Single-Service Start-->
<div class="single-service-area pt_30 pb_50">
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
                
                    </table>
                </div></div>
         <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row">
                    
                    <h4 style="line-height:normal">{{ $singlejudge->name }}</h4>
                    
                    <img src="{{ asset('uploads/covid/' . $singlejudge->image) }}" class="img-fluid" alt="{{$singlejudge->name }}">
                    <p class="single-service-p">{!! $singlejudge->body !!}</p>
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
                <h3>လိုက်နာရမည့်အချက်များ</h3>
                <hr style="height: 4px; background: #fed23e">
                
                <div>
                <p><img alt="" src="https://magway.gov.mm/storage/uploads/covid3_1625761897.jpg" style="width: 293px; height: 187px;" /></p>

<p><img alt="" src="https://magway.gov.mm/storage/uploads/covid2_1625761911.jpg" style="width: 293px; height: 187px;" /></p>

<p><img alt="" src="https://magway.gov.mm/storage/uploads/covid1_1625761922.jpg" style="width: 293px; height: 187px;" /></p>    
                </div>
    

  
          
</div>
                 

</div>
            </div>
        </div>
    </div>
</div>
<!--Single-Service End-->
@endsection
