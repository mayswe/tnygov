@extends('Frontend.Template.layout')
@section('title')
News
@endsection
@section('content')

<!--Blog Start-->
<div class="blog-area pt_35 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h1>{{__('messages.criminal_cause')}}</h1>
                    <hr class="line">
                </div>
            </div>
            
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-item">
                    
                    <div class="blog-text">
                        <h3><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{ $name }}</a></h3>
                        <p style="text-transform: lowercase;">{{ substr($short_description, 0, 250) }} ...</p>
                    </div>
                    <div class="blog-author">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{ $post->created_at }}</li>
                            <li class="blog-button"><a href="{{ route('singlepost',['id'=>$post->id]) }}">Read more <i class="fa fa-chevron-circle-right"></i></a></li>
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
</div>
</div>
<!--Blog End-->
@endsection
