@extends('admin.layout.layout')

@section('content')

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mb-20">
			<h4>Images Gallery</h4>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Image</button>
		</div>
		<div class="card">
			<div class="card-body pa-0">
				<div class="table-wrap">
					<div class="table-responsive">
						<table class="table table-sm table-hover mb-0">
							<thead>
								<tr>
                    <th width="15%">Image</th>
                    <th width="15%">Title</th>
                    <th width="15%">Title in Arabic</th>
                    <th width="15%">Description</th>
                    <th width="15%">Description in Arabic</th>
                    <th width="25%" style="text-align:center;">Action</th>
								</tr>
							</thead>
              <tbody>
              @if(count($images))
                @foreach($images as $image)
                  <tr>
                    <td><img class="img-fluid rounded" width="75px" src="{{url('storage/images/galleryimages/'.$image->image)}}" alt="Client Logo"></td>
                    <td>{{$image->title}}</td>
                    <td>{{$image->title_ar}}</td>
                    <td>{{str_limit($image->des,20)}}</td>
                    <td>{{str_limit($image->des_ar,20)}}</td>
                    <td style="text-align:center;">
                        <button type="button" class="btn btn-info btn-sm editimage" data-action="{{route('updateimage',$image->id)}}" data-id="{{$image->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger btn-sm deleteimage" data-action="{{route('deleteimage',$image->id)}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr class="text-center">
                  <td colspan="6">No Images</td>
                </tr>
              @endif
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
              <h4>Video Gallery</h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalVid"><i class="fa fa-plus"></i> Add New Video</button>
          </div>
          <div class="card">
              <div class="card-body pa-0">
                  <div class="table-wrap">
                      <div class="table-responsive">
                          <table class="table table-sm table-hover mb-0">
                              <thead>
                                  <tr>
                                      <th width="75%">Video</th>
                                      <th width="25%" style="text-align:center;">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($videos as $video)
                                  <tr>
                                      <td>
                                          <video width="100px" controls>
                                              <source src="{{url('storage/videos/'.$video->video)}}" />
                                          </video>
                                      </td>
                                      <td style="text-align:center;">
                                          <button type="button" class="btn btn-info btn-sm editvideo" data-action="{{route('updatevideo',$video->id)}}" data-toggle="modal" data-target="#editModalVid"><i class="fa fa-edit"></i> Edit</button>
                                          <button type="button" class="btn btn-danger btn-sm deletevideo" data-action="{{route('deletevideo',$video->id)}}" data-toggle="modal" data-target="#deleteModalVid"><i class="fa fa-trash"></i> Delete</button>
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

@endsection


@section('modals')

        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Image Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('addimage')}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Title in English</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Title in Arabic</label>
                                <input type="text" name="title_ar" value="{{old('title_ar')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description in English</label>
                                <textarea name="des" class="form-control" rows="2">{{old('des')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description in Arabic</label>
                                <textarea name="des_ar" class="form-control" rows="2">{{old('des_ar')}}</textarea>
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
                        <h5 class="modal-title">Edit Image Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editimageform" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Title in English</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Title in Arabic</label>
                                <input type="text" name="title_ar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description in English</label>
                                <textarea name="des" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Description in Arabic</label>
                                <textarea name="des_ar" class="form-control" rows="2"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
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
                        <h5 class="modal-title">Delete Image Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center;">
                        <br />
                        <p style="color:red;">Are You Sure You Want to Delete This Image ?</p>
                        <hr />
                        <form id="deleteimageform" class="hidden" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <button type="submit" onclick="$('#deleteimageform').submit();" class="btn btn-danger">Delete</button>
                        <br />
                    </div>
                </div>
            </div>
        </div>


        <!-- Add Modal Videos -->
        <div class="modal fade" id="addModalVid" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('addvideo')}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group">
                                <label>Video</label>
                                <input type="file" name="video" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal Videos -->
        <div class="modal fade" id="editModalVid" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editvideoform" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Video</label>
                                <input type="file" name="video" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal Videos -->
        <div class="modal fade" id="deleteModalVid" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center;">
                        <br />
                        <p style="color:red;">Are You Sure You Want to Delete This Video ?</p>
                        <hr />
                        <form class="hidden" id="deletevideoform" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <button type="submit" onclick="$('#deletevideoform').submit();" class="btn btn-danger">Delete</button>
                        <br />
                    </div>
                </div>
            </div>
        </div>



@endsection



@push('scripts')

<script type="text/javascript">

$(document).ready(function(){


    $('.editimage').on('click',function(){
      var id=$(this).data('id');
      var action=$(this).data('action');
      $('#editimageform').attr('action',action);

      @foreach($images as $image)
      if(id == `{{$image->id}}`){
        $('#editimageform').find('input[name="title"]').val('{!!$image->title!!}');
        $('#editimageform').find('input[name="title_ar"]').val('{!!$image->title_ar!!}');
        $('#editimageform').find('textarea[name="des"]').html('{!!$image->des!!}');
        $('#editimageform').find('textarea[name="des_ar"]').html('{!!$image->des_ar!!}');
      }
      @endforeach

    });

    $('.deleteimage').on('click',function(){
      var action=$(this).data('action');
      $('#deleteimageform').attr('action',action);
    });

    $('.editvideo').on('click',function(){
      var action=$(this).data('action');
      $('#editvideoform').attr('action',action);
    });

    $('.deletevideo').on('click',function(){
      var action=$(this).data('action');
      $('#deletevideoform').attr('action',action);
    });

  });


</script>
@endpush
