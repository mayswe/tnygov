@extends('Frontend.Template.layout')
@section('title')
Video
@endsection
@section('content')
<!-- start banner -->
<div class="l-banner l-row">
  
  <div class="l-pr page__row pr-banner">
    <div class="l-rw regions container pr-banner__rw arc--1 hr--1" data-at-regions="">
      <div data-at-region="1" data-at-block-count="1" class="l-r region pr-banner__banner" id="rid-banner"><div id="block-aboutus" class="l-bl block block-config-provider--block-content block-plugin-id--block-content-1fd29712-bcec-428e-80c0-819b0be1b822 block--type-basic block--view-mode-full">
  <div class="block__inner">

    <div class="block__content">
    <div class="clearfix text-formatted field field-block-content--body field-formatter-text-default field-name-body field-type-text-with-summary field-label-hidden has-single"
    ><div class="field__items"
    ><div class="field__item">
    <h2 class="">{{__('messages.locations')}}</h2>
</div></div>
</div>
</div></div>
</div>
</div>
    </div>
  </div>
  
</div>
<!-- end banner -->
<!--Pricing Table Start-->
<div class="page blog-area pt_35 pb_90">
    <!-- start breadcrumb -->
<div class="container">
<div class="row" >
<nav aria-label="breadcrumb" style="width:100%">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">{{__('messages.home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('messages.locations')}}</li>
  </ol>
</nav>
</div>
</div>
<!-- end breadcrumb -->
<div class="container">
<!-- start left -->
<div class="row">    
<div class="col-8">
    <div class="blog-area pt_35 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h1>Tender</h1>
                    <hr class="line">
                </div>
            </div>
            @foreach($news as $package)
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="pricing-table table-left">
                    
                    <div class="pricing-details">
                        <p>{{ $package->name }}</p>
                        <iframe width="100%" height="315" src="{{ $package->media_file }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
     </div>
    </div>
    </div>
<!-- end left -->
<!-- start right -->
<div id ="rid-sidebar-first" class="col-4">
                <div id="rid-sidebar-first">
                  <div id="block-views-block-block-latest-news-block-2">
  <div class="block__inner">

    <h2 id="block-views-block-block-latest-news-block-2-title">
      <span>နောက်ဆုံးရ သတင်း</span>
    </h2>
      <div class="view-block-latest-news">
        
  
    <div class="views-row">
    <div class="views-field-title">
      <a href="/my/node/190" >ကချင်ပြည်နယ်တရားလွှတ်တော်အဆောက်အအုံသစ်မြေနေရာကိစ္စတင်ပြခြင်း</a>
    </div>
    <div class="views-field views-field-field-post-date">
    <time datetime="2021-01-25T05:18:29Z" class="datetime">2021-01-25</time>
</div>
  </div>
    <div class="views-row">
    <div class="views-field-title">
        <a href="/my/node/140" >ပြည်ထောင်စုတရားလွှတ်တော်ချုပ်နှင့် တိုင်းဒေသကြီး/ပြည်နယ်တရားလွှတ်တော်များ၏ (၁၉)ကြိမ်မြောက် လုပ်ငန်းညှိနှိုင်းအစည်းအဝေးမှာကြားချက်များ ထပ်ဆင့်ရှင်းလင်းသည့်အခမ်းအနားကျင်းပ</a></div>
        <div class="views-field views-field-field-post-date">
            <time datetime="2020-09-04T07:47:52Z" class="datetime">2020-09-04</time>
</div>
  </div>
    <div class="views-row">
    <div class="views-field-title"><a href="/my/node/130" >နောင်မွန်းမြို့နယ်တရားရုံးအဆောက်အအုံသစ် ဖွင့်လှစ်ခြင်း</a></div>
        <div class="views-field views-field-field-post-date"><time datetime="2020-08-20T09:34:10Z" class="datetime">2020-08-20</time>
</div>
  </div>
    <div class="views-row">
    <div class="views-field-title"><a href="/my/node/114" >ကချင်ပြည်နယ်တရားလွှတ်တော် တရားသူကြီးချုပ် မြစ်ကြီးနား အကျဉ်းထောင်အား ကြည့်ရှုစစ်ဆေး</a></div>
        <div class="views-field views-field-field-post-date"><time datetime="2020-08-18T05:27:36Z" class="datetime">2020-08-18</time>
</div>
  </div>

    </div>
  
          </div>
</div>

<div id="block-blockannualreports">
  <div class="block__inner">

    <h2 id="block-blockannualreports-title">
      
      <span>နှစ်စဉ် အစီအရင်ခံစာ</span>
    </h2>
      <div class="block__content">
        <div>
          <div class="field__items">
        <div class="field__item">
          <p>
            <img height="472" src="https://kachin.hc.gov.mm/sites/default/files/2019%20annual%20report(cuted)_0.jpg" width="338">
          </p>

<p>
  <a href="https://kachin.hc.gov.mm/my/annual-reports">၂၀၁၉ နှစ်စဉ် အစီအရင်ခံစာ</a>
</p>
</div>
</div>
</div>
</div></div>
</div>
</div>
            </div>
    </div>
</div>
<!-- end right -->
</div>
<!--Pricing Table End-->
@endsection
