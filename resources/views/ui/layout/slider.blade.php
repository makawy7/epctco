<!-- BANNER -->
<div id="oc-fullslider" class="banner owl-carousel">
    @foreach($sliders as $slider)
      <div class="owl-slide">
          <div class="item">
              <img src="{{url('storage/images/sliders/'.$slider->image)}}" alt="Slider">
          </div>
      </div>
    @endforeach
  </div>

<div class="clearfix"></div>
