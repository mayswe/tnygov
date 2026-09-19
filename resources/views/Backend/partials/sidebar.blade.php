<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardpage') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-cog"></i>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
        
      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if (\Request::is('admin/dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboardpage') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="sidebar-title">Dashboard</span></a>
      </li>
      <li class="nav-item @if (\Request::is('admin/pages/edit/*') || \Request::is('admin/lookups')) active @endif">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>တနင်္သာရီတိုင်း</span>
                </a>
                <div id="collapsePages" class="collapse @if (\Request::is('admin/pages/edit/*') || \Request::is('admin/lookups')) show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item @if (\Request::is('admin/pages/edit/1')) active @endif" href="/admin/pages/edit/41">နောက်ခံသမိုင်း</a>
                        <a class="collapse-item @if (\Request::is('admin/pages/edit/2')) active @endif" href="/admin/pages/edit/42">ခရီးသွားလမ်းညွှန်</a>
                       
                        
                        <a class="collapse-item @if (\Request::is('admin/department')) active @endif" href="{{ route('departmentpage') }}">ဌာနများ</a>
                        
                        <a class="collapse-item @if (\Request::is('admin/pages/edit/44')) active @endif" href="/admin/pages/edit/44">မြို့နယ်များ</a>
                        <a class="collapse-item @if (\Request::is('admin/lookups')) active @endif" href="{{ route('lookuppage') }}">ရာထူး / မြို့နယ် / ခရိုင်</a>
                    </div>
                </div>
            </li>
            <li class="nav-item @if (\Request::is('admin/news')) active @endif">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>သတင်းနှင့် မီဒီယာ</span>
                </a>
                <div id="collapsePages2" class="collapse @if (\Request::is('admin/news')) show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item @if (\Request::is('admin/news')) active @endif" href="{{ route('newspage') }}">သတင်းများ</a>
                       
                        <a class="collapse-item @if (\Request::is('admin/announcements')) active @endif" href="{{ route('announcementspage') }}">ကြေညာချက်</a>
                    </div>
                </div>
            </li>
            <li class="nav-item @if (\Request::is('admin/tenders')) active @endif">
            <a class="nav-link" href="{{ route('tenderspage') }}">
              <i class="fas fa-flag"></i>
              <span class="sidebar-title">တင်ဒါကိစ္စရပ်များ</span></a>
          </li>
          
        <li class="nav-item @if (\Request::is('admin/dailyactivities')) active @endif">
        <a class="nav-link" href="{{ route('dailyactivitiespage') }}">
          <i class="fas fa-flag"></i>
          <span class="sidebar-title">ပြည်သူ့အကျိုးပြု </span></a>
      </li>
      <li class="nav-item @if (\Request::is('admin/judges')) active @endif">
          <a class="nav-link" href="{{ route('judgespage') }}">
            <i class="fas fa-flag"></i>
            <span class="sidebar-title">အစိုးရအဖွဲ့</span></a>
        </li>
        <li class="nav-item @if (\Request::is('admin/pages/edit/13')) active @endif">
        <a class="nav-link" href="/admin/pages/edit/13">
          <i class="fas fa-question"></i>
            <span class="sidebar-title">ဆက်သွယ်ရန်</span></a>
      </li>
      
     
      <li class="nav-item @if (\Request::is('admin/covid')) active @endif">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>ကိုဗစ် ၁၉</span>
                </a>
                <div id="collapsePages1" class="collapse @if (\Request::is('admin/covid')) show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item @if (\Request::is('admin/covid')) active @endif" href="{{ route('covidpage') }}">သတင်းများ</a>
                       
                        <a class="collapse-item @if (\Request::is('admin/covidtopbox')) active @endif" href="{{ route('covidtopboxpage') }}">စောင့်ကြပ်ကြည့်ရှုမှု </a>
                    </div>
                </div>
            </li>
      <li class="nav-item @if (\Request::is('admin/footersliderblocks')) active @endif">
        <a class="nav-link" href="{{ route('footersliderblockspage') }}">
          <i class="fas fa-exclamation-circle"></i>
          <span class="sidebar-title">အရေးပေါ်ဖုန်းများ </span></a>
      </li>
        
       
        
      
      
        <li class="nav-item @if (\Request::is('admin/faqs')) active @endif">
        <a class="nav-link" href="{{ route('faqspage') }}">
          <i class="fas fa-question"></i>
          <span class="sidebar-title">အမေးအဖြေ</span></a>
      </li>
       
        
          
        
     
      
        
      
     
      <li class="nav-item @if (\Request::is('admin/slider')) active @endif">
        <a class="nav-link" href="{{ route('sliderpage') }}">
          <i class="fas fa-image"></i>
          <span class="sidebar-title">Slider</span></a>
      </li>
      
      
        <?php 
        $user = \Auth::user();
        if($user->role==1){
        ?>    
      
<li class="nav-item @if (\Request::is('admin/slider')) active @endif">
        <a class="nav-link" href="{{ route('settingspage') }}">
          <i class="fas fa-image"></i>
          <span class="sidebar-title">Setting</span></a>
      </li>
        <?php
  }
        ?>
      
        
        
          
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
