@extends('Frontend.Template.layout')
@section('title')
News
@endsection
@section('content')


<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
<!-- start breadcrumb -->
<div class="container">
    <div class="row" >
        
<div class="col-12 pt_10">
                <div class="headline">
                    <h1>{{__('messages.public_service')}}</h1>
                    <hr class="line">
                </div>
           
</div>
        </div>
    </div>
<!-- end breadcrumb -->
    <div class="container">
        <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
            @foreach($news as $post)
            <?php
            if (App::isLocale('en')) {
                $name = $post->name_en;
                $body = $post->short_description_en;
            }else{

                $name = $post->name;
                $body = $post->short_description;
            }
            ?>
                
                <div class="col-md-4" style="padding-top:20px;">
                <div class="card-content" style="min-height:300px;">
                    
                    <div class="card-desc">
                        
                        <h2><a href="{{ route('singlecsr',['id'=>$post->id]) }}">{{ $name }}</a></h2>
                        <div class="card-body" style="padding-left:0; padding-right:0; min-height:112px;">{!! $body !!}</div>
                        
                        
					<div class="post hid blog-author" style="width:100%">
                        <ul>
                            
                            <li class="blog-button">
                                <a href="{{ route('singlecsr',['id'=>$post->id]) }}">{{__('messages.more')}} <i class="fa fa-chevron-circle-right"></i></a></li>
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
           

        </div>
        
    </div>
</div>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-m-d'
     });  
</script> 
<!--Blog End-->
@endsection

