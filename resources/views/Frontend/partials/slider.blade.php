<!--Slider Start-->
<div class="slider">
    <div class="slide-carousel slider-one owl-carousel">
        @foreach($sliders as $slider)
        <div class="slider-item flex" style="background-image:url({{ asset('uploads/slider/' . $slider->slide) }});">
        <?php
            if (App::isLocale('en')){
                $title = $slider->title_en;
            }else{
                $title = $slider->title;
            }
            ?>
        <a href="{{ route('singleslider', ['id'=>$slider->id]) }}" class="card-text slider-title">{{ $title }}</a>
            
        </div>
        @endforeach
    </div>
</div>
<!--Slider End-->
