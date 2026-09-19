@extends('Frontend.Template.layout')
@section('title')
{{__('messages.announcement')}}
@endsection
@section('content')

<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
<!-- start breadcrumb -->
<div class="container">
    <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12">
<nav aria-label="breadcrumb" style="width:100%">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">{{__('messages.home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('messages.announcement')}}</li>
  </ol>
</nav>
</div>
        </div>
    </div>
<!-- end breadcrumb -->
    <div class="container">
<div class="row">
<!-- start left -->

           
            
            @foreach($announcements as $post)
            <?php
            if (App::isLocale('en')) {
                $name = $post->name_en;
                $cover = $post->cover;
            }else{

                $name = $post->name;
                $cover = $post->cover;
            }
            ?>
            <div class="col-lg-6">
                <div class="blog-item">
                    
                    <div class="blog-text" >
                        <h3><a  href="{{ route('singleannouncement',['id'=>$post->id]) }}">{{ $name }}</a></h3>
                        <?php 
                        if($cover){
                            ?>
                        <img height="201" src="{{ asset('uploads/announcements/' . $cover) }}" alt="{{ $name }}">
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="blog-author">
                        <ul>
                           
                            <li class="blog-button"><a href="{{ route('singleannouncement',['id'=>$post->id]) }}">{{__('messages.more')}} <i class="fa fa-chevron-circle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
    </div>
            @endforeach
            <div class="col-12 pt_10 text-center">
            {{ $announcements->links() }}
            </div>
            </div>
    
    
        </div>

        
        
    </div>
</div>
</div>
<!--Blog End-->
@endsection
