<div class="blog-area pt_30 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{__('messages.latest_news')}}</h2>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel owl-carousel">
                    
                    @foreach($posts as $post)
                    <div class="blog-item">
                        <a href="{{ route('singlepost',['id'=>$post->id]) }}">
                             <?php
        $results = DB::select('select * from news_images where news_id = :id', ['id' => $post->id]);
        foreach ($results as $user) {
    $image =  $user->name;
}
        if (empty($image)) {
            ?>
        <div class="blog-image" style="background-image: url({{ asset('uploads/news/noimage.jpg') }})"></div>
       
        <?php
        }else{
            ?>
        <div class="blog-image" style="background-image: url({{ asset('uploads/news/' . $image) }})"></div>
       
        <?php
        }
        ?>
                            
                        </a>
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
                        
                        <div class="blog-text">
                            <div class="datetime pt_5 pb_5">
                            <a href="{{ route('newsposition',['id'=>$postion_id]) }}" class="datetime">{{$postion_name}}</a>&nbsp;|&nbsp;
                            <a href="{{ route('newslocation',['id'=>$location_id]) }}" class="datetime">{{$location_name}}</a>
                        </div>
                            <p><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{ $post->name }}</a></p>
                            <!--<p style="text-transform: lowercase;">{!! substr($post->long_description, 0, 150) !!} ...</p>-->
                        </div>
                        <div class="blog-author">
                            <ul>
                                <?php
                                if($post->news_date == NULL){
                                    $news_date = $post->created_at;
                                }else{
                                    $news_date = $post->news_date;
                                }
                                ?>
                                
                                <li><i class="fa fa-calendar-o"></i>{{ date('M d, Y', strtotime($news_date)) }}</li>
                                <li class="blog-button"><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{__('messages.read_more')}} <i class="fa fa-chevron-circle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
