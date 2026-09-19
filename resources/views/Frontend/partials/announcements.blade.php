<section id="team" class="pt_50 pb_40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{__('messages.announcements')}}</h2>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($announcements as $announcement)
            <div class="col-md-4 col-sm-12 blog-item">
                        <a href="{{ route('singleannouncement', ['id'=>$announcement->id]) }}">
                                     <div class="blog-image" style="background-image: url({{ asset('uploads/announcements/' . $announcement->cover) }})"></div>
       
                                    
                        </a>
                        <div class="blog-text">
                            <p><a href="{{ route('singleannouncement', ['id'=>$announcement->id]) }}">{{$announcement->name}}</a></p>
                            <a href="{{ route('singleannouncement', ['id'=>$announcement->id]) }}">{{__('messages.read_more')}} <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                      
                    </div>
            
            @endforeach
        </div>
    </div>
</section>