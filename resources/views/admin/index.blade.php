@extends('admin.layout.layout')


@section('content')

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
<div class="d-flex align-items-center justify-content-between mb-20">
<h4>Sliders</h4>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Slider</button>
</div>
<div class="card">
<div class="card-body pa-0">
<div class="table-wrap">
  <div class="table-responsive">
    <table class="table table-sm table-hover mb-0">
      <thead>
        <tr>
          <th width="25%">Image</th>
          <th width="25%" style="text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sliders as $slider)
          <tr>
              <td><img class="img-fluid rounded" width="75px" src="{{url('storage/images/sliders/'.$slider->image)}}" alt="Client Logo"></td>
              <td style="text-align:center;">
                  <button type="button" class="btn btn-info btn-sm editslider" data-action="{{route('editslider',$slider->id)}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" class="btn btn-danger btn-sm deleteslider" data-action="{{route('destroyslider',$slider->id)}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
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
            <h4>About Section</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                  <form id="aboutsection" action="{{route('updateabout')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Content in English</label>
                                        <textarea name="content" class="form-control" rows="5">{{old('content')?old('content'):setting()->home_content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Content in Arabic</label>
                                        <textarea name="content_ar" class="form-control" rows="5">{{old('content_ar')?old('content_ar'):setting()->home_content_ar}}</textarea>
                                    </div>
                                  </form>
                                </div>
                                <button type="submit" onclick="$('#aboutsection').submit();" class="btn btn-success">Save</button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->


@endsection



@section('modals')

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addslider')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Slider Image</label>
                        <input type="file" name="slider" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editsliderform" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Slider Image</label>
                        <input name="slider" type="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit About Modal -->
<div class="modal fade" id="editAbout" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>English Content</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Arabic Content</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <br />
                <p style="color:red;">Are You Sure You Want to Delete This Slider ?</p>
                <hr />
                <form id="deletesliderform" class="hidden" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="delete">
                </form>
                <button type="submit" onclick="$('#deletesliderform').submit();" class="btn btn-danger">Delete</button>
                <br />
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">

$(document).ready(function(){
  $('.editslider').on('click',function(){
    var action=$(this).data('action');
    $('#editsliderform').attr('action',action);
  });

  $('.deleteslider').on('click',function(){
    var action=$(this).data('action');
    $('#deletesliderform').attr('action',action);
  });

});

</script>

@endpush
