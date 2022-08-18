@extends('admin.layout.layout')

@section('content')

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
<div class="d-flex align-items-center justify-content-between mb-20">
<h4>Services</h4>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Service</button>
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
                                    <th width="15%">Details</th>
                                    <th width="15%">Details in Arabic</th>
                                    <th width="25%" style="text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($services))
            @foreach($services as $service)
            <tr>
              <td><img class="img-fluid rounded" width="75px" src="{{url('storage/images/services/'.$service->image)}}" alt="Client Logo"></td>
              <td>{{$service->title}}</td>
              <td>{{$service->title_ar}}</td>
              <td>{{str_limit($service->details,20)}}</td>
              <td>{{str_limit($service->details_ar,20)}}</td>
              <td style="text-align:center;">
                  <button type="button" data-id="{{$service->id}}"  data-action="{{route('updateservice',$service->id)}}" class="btn btn-info btn-sm editservice" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                  <button type="button" data-id="{{$service->id}}"  data-action="{{route('deleteservice',$service->id)}}" class="btn btn-danger btn-sm deleteservice" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
              </td>
            </tr>
            @endforeach
        @else
          <tr class="text-center">
            <td colspan="6">No Services</td>
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

@endsection

@section('modals')

        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('addservice')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Service Image</label>
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
                                <label>Details in English</label>
                                <textarea name="details" class="form-control" rows="5">{{old('details')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Details in Arabic</label>
                                <textarea name="details_ar" class="form-control" rows="5">{{old('details_ar')}}</textarea>
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
                        <h5 class="modal-title">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editserviceform" method="post" enctype="multipart/form-data">
                          @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Service Image</label>
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
                                <label>Details in English</label>
                                <textarea name="details" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Details in Arabic</label>
                                <textarea name="details_ar" class="form-control" rows="5"></textarea>
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
                        <h5 class="modal-title">Delete Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center;">
                        <br />
                        <p style="color:red;">Are You Sure You Want to Delete This Service ?</p>
                        <hr />
                        <form class="hidden" method="post" id="deleteserviceform">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">

                        </form>
                        <button type="submit" onclick="$('#deleteserviceform').submit();" class="btn btn-danger">Delete</button>
                        <br />
                    </div>
                </div>
            </div>
        </div>
@endsection


@push('scripts')

<script type="text/javascript">

$(document).ready(function(){


    $('.editservice').on('click',function(){
      var id=$(this).data('id');
      var action=$(this).data('action');
      $('#editserviceform').attr('action',action);

      @foreach($services as $service)
      if(id == `{{$service->id}}`){
        $('#editserviceform').find('input[name="title"]').val('{!!$service->title!!}');
        $('#editserviceform').find('input[name="title_ar"]').val('{!!$service->title_ar!!}');
        $('#editserviceform').find('textarea[name="details"]').html('{!!$service->details!!}');
        $('#editserviceform').find('textarea[name="details_ar"]').html('{!!$service->details_ar!!}');
      }
      @endforeach

    });

    $('.deleteservice').on('click',function(){
      var action=$(this).data('action');
      $('#deleteserviceform').attr('action',action);
    });

  });


</script>
@endpush
