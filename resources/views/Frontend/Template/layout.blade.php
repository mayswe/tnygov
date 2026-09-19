<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <title>{{ $metas->title }} - @yield('title')</title>
        <meta name="description" content="{{ $metas->description }}">
        <meta name="keywords" content="{{ $metas->keywords }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('uploads/' . $metas->favicon ) }}">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('Frontend/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/superfish.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/jcarousel.responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/css/colorbox.css') }}">

        <!-- Theme Color File -->
        <link rel="stylesheet" href="{{ asset('Frontend/css/colors/'.$color->color.'.css') }}">
        <script src="{{ asset('Frontend/js/jquery-2.2.4.min.js') }}"></script>
        
        <script src="{{ asset('Frontend/js/jquery.colorbox.js') }}"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        
    </head>
    <body>
        
        <!--Header Section Start-->
        <div class="header">
            <div class="container-fluid">
                
            <div  class="row" id="leaderboard">
               
                   <div class="container">
                       
                  <div id="topbar" class="col-12 text-right">
         <ul>
             <li><a href="/faq"> {{__('messages.faq')}} </a></li>
             <li><a href="/14/ဆိုက်အညွှန်း"> {{__('messages.sitemap')}} </a></li>
            <li><a href="{{ url('locale/en') }}">ENG</a></li>
             <li><a href="{{ url('locale/my') }}">မြန်မာ</a></li>
						</ul>
      
                </div>
      
                    </div>
            </div>
            
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-2" style="padding-left:15px; padding-right:0;">
                        <div class="infos">
                        <div class="logo flex">
                            
                            
                            
                            <a href="{{ route('/') }}" title="{{ $infos->name }}" ><img src="{{ asset('uploads/tnylogo.jpg') }}" alt="Home" ></a>
                           
                        </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="infos">
                        
                            <div class="d-none d-lg-block"><div class="logotext flex text-center"><h3>တနင်္သာရီတိုင်းဒေသကြီး အစိုးရအဖွဲ့</h3></div></div>
                        <div class="d-lg-none">
                            <div class="text-center" style="padding-top:10px;">
                                <p style="font-size:15px; padding:0; margin:0; font-weight:600; color:#fa8e1f;">တနင်္သာရီတိုင်းဒေသကြီး </p><p style="font-size:15px; padding:0; margin:0; font-weight:600; color:#fa8e1f;">အစိုးရအဖွဲ့</p>
                                </div>
                        
                        </div>
                        </div>
                    </div>
                    <div class="col-2" style="padding-left:0; padding-right:30px;">
                        <div class="infos">
                        <div class="logo flex text-right">
                            
                            <a href="{{ route('/') }}" title="{{ $infos->name }}" ><img src="{{ asset('uploads/state_seal.png') }}" alt="Home" ></a>
                           
                        </div>
                        </div>
                    </div>
                    
                    
                    
</div>
           
                    </div>
                </div>
          
       
        <!--Header Section End-->
        <!--Navbar Start-->
        <div id="strickymenu" class="menu">
            <div class="container">
                <div class="row">
       
                <div class="col-lg-12 col-12 main-menu">
                    
                        <div class="main-menu-item">
                         
                           

                            <ul class="sf-menu" id="topmenu">
                                
                            <li><a href="/">{{__('messages.home')}}</a></li>
                            <li>
                                    <a href="#">တနင်္သာရီတိုင်း</a>
                                    <ul>
                                 
					<li><a href="/41/နောက်ခံသမိုင်း">{{__('messages.history')}}</a></li>
                    <li><a href="/42/ခရီးသွားလမ်းညွှန်">{{__('messages.travel_guide')}}</a></li>
                    <li><a href="/43/ဌာနများ">{{__('messages.departments')}}</a></li>
                    
                    <li><a href="/44/မြို့နယ်များ">{{__('messages.townships')}}</a></li>
                            
						</ul>
					</li>
				 <li>
                         <a href="#">{{__('messages.news_media')}}</a>
                             <ul>
                                 
					<li><a href="/news">{{__('messages.news')}}</a>
                        
                    </li>
				
					<li><a href="/announcements">{{__('messages.announcement')}}</a></li>
                    
                        
						</ul>
                            
                            
                            
                            
                         </li>
                                <li><a href="/tender">{{__('messages.tender')}}</a></li>
                                 
                            
                            
 <li>
     <a href="/csrs">{{__('messages.benefit_people')}} </a>
                                </li>
 <li>
     <a href="/council">အစိုးရအဖွဲ့ </a>
     
                                </li>
                                <li>
     <a href="/13/ဆက်သွယ်ရန်">{{__('messages.contact')}} </a>
                                </li>
                                <li style="background:red;">
     <a href="/covid" style="font-weight:bold; color:white;">{{__('messages.covid')}} </a>
                                </li>
 
                                
                               
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--Navbar End-->
        <!--Content-->
        @yield('content')
        
        <!--End Content-->
        <!--Footer-Area Start-->
        <!--Partners Start-->
        
        <div id="footerbg" class="footer-bottom pt_35 pb_35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 pb_15">
                        <div class="copy-text">
                           
                        <p class="footer-header">{{__('messages.contact')}}</p>
                            <p>{{__('messages.add_phone')}}<br>
                                {{__('messages.add_email')}}<br>
                                {{__('messages.add_detail')}}<br>
</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3  pb_15">
                        <div class="copy-text">
                        <p class="footer-header">{{__('messages.general')}}</p>
                            <ul style="line-height:2em;text-align: left;list-style: none;">
            <li> <a href="https://www.tanintharyi.gov.mm/47/အစိုးရဝဘ်ဆိုက်များ" target="_blank">{{__('messages.govwebsite')}}</a></li>
            <li> <a href="https://www.tanintharyi.gov.mm/48/အရေးပေါ်ဖုန်းများ" target="_blank">{{__('messages.emergycall')}}</a></li>
           
        </ul>
                            
                        </div>
                        
                    </div>
                  
                    <div class="col-lg-3  pb_15">
                        <div class="copy-text">
                            
                        <p class="footer-header">{{__('messages.about_website')}}</p>
           
                           <a href="#"><p>{{__('messages.privacy')}}</p></a>
                        <a href="#"><p>{{__('messages.userto')}}</p></a>
                        <a href="#"><p>{{__('messages.sitemap')}}</p></a>
                        <a href="#"><p>{{__('messages.copyright')}}</p></a>
                        </div>
                        
                        </div>
                        <div class="col-lg-3  pb_15">
                        <div class="copy-text pt_15">
                        
                            <div class="footer-header text-center">{{__('messages.total_viewer')}}</div>
                            <div id="visits">{{ number_format($totalVisitors ?? 0) }}</div>
                         </div>
                        </div>
                   
                </div></div>
            </div>
        <div id="copybg" class="footer-bottom pt_5 pb_5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            {{__('messages.copy_right')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        
        <!--Footer End-->
        <!--Start Scroll-To-Top-->
        <div class="scroll-top">
            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
        </div>
        <!--End Scroll-To-Top-->
        <!--JavaScript Scripts Start -->
        <script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/jcarousel.responsive.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.jcarousel.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/hoverIntent.js') }}"></script>
        <script src="{{ asset('Frontend/js/superfish.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('Frontend/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('Frontend/js/viewportchecker.js') }}"></script>
        <script src="{{ asset('Frontend/js/custom.js') }}"></script>
		
        
        
        <!--JavaScript Scripts End -->
        <!-- initialise Superfish -->
<script>
  jQuery(document).ready(function(){
    jQuery('ul.sf-menu').superfish();
  });
    $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>
        </div>
    </body>
</html>
