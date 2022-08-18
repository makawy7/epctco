@extends('admin.layout.layout')

@section('content')

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>Footer Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                          <form class="" action="{{route('updatefooter')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Footer Text in English</label>
                                        <textarea class="form-control" name="des" rows="4">{{setting()->contactinfo_des}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Text in Arabic</label>
                                        <textarea class="form-control" name="des_ar" rows="4">{{setting()->contactinfo_des_ar}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Address in English</label>
                                        <textarea class="form-control" name="address" rows="2">{{setting()->contactinfo_address}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Address in Arabic</label>
                                        <textarea class="form-control" name="address_ar" rows="2">{{setting()->contactinfo_address_ar}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Phone</label>
                                        <input type="tel" class="form-control" value="{{setting()->contactinfo_phone}}" name="phone" />
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Email</label>
                                        <input type="email" class="form-control" value="{{setting()->contactinfo_email}}" name="email" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                          </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
<br /><hr /><br />

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>Email For Website Messages</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Main Email</label>
                                        <input type="email" class="form-control" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
<br /><hr /><br />

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>Location</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="map" style="height: 300px;"></div>
                                </div>
                            </div>
                        </section>
                        <form class="hidden" id="locationform" action="{{route('updatelocation')}}" method="post">
                          @csrf
                          <input type="hidden" id="lat" name="lat">
                          <input type="hidden" id="lng" name="lng">
                        </form>
                        <button id="savelocation" type="button" class="btn btn-success" name="button">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
<br /><hr /><br />


<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>Social Media Links</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                          <form class="" action="{{route('updatesocial')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="url" name="facebook" value="{{setting()->facebook}}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="url" name="twitter" value="{{setting()->twitter}}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="url" name="instagram" value="{{setting()->instagram}}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Pinterest</label>
                                        <input type="url" name="pinterest" value="{{setting()->pinterest}}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIN</label>
                                        <input type="url" name="linkedin" value="{{setting()->linkedin}}" class="form-control" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                          </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->

@endsection


@push('scripts')

<script>


    var marker;

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: {{setting()->lat}}, lng: {{setting()->lng}}},
        gestureHandling: 'greedy'
      });

      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: {lat: {{setting()->lat}}, lng: {{setting()->lng}}},

      });
      marker.addListener('click', toggleBounce);
    }

    function toggleBounce() {
      if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
      } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
    }

    $('#savelocation').on('click',function(){
        var lat=marker.getPosition().lat();
        var lng=marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
        $('#locationform').submit();
    });
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap">
  </script>

@endpush
