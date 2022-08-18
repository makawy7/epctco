@extends('admin.layout.layout')

@section('content')

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
<div class="d-flex align-items-center justify-content-between mb-20">
<h4>Agents</h4>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Agent</button>
</div>
<div class="card">
<div class="card-body pa-0">
<div class="table-wrap">
  <div class="table-responsive">
    <table class="table table-sm table-hover mb-0">
      <thead>
        <tr>
            <th width="10%">Image</th>
            <th width="10%">Name</th>
            <th width="10%">Name in Arabic</th>
            <th width="10%">Location</th>
            <th width="10%">Location in Arabic</th>
            <th width="15%">Details</th>
            <th width="15%">Details in Arabic</th>
            <th width="20%" style="text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($agents))
          @foreach($agents as $agent)
            <tr>
                <td><img class="img-fluid rounded" width="75px" src="{{url('storage/images/agents/'.$agent->image)}}" alt="Client Logo"></td>
                <td>{{$agent->name}}</td>
                <td>{{$agent->name_ar}}</td>
                <td>{{$agent->location}}</td>
                <td>{{$agent->location_ar}}</td>
                <td>{{str_limit($agent->details,20)}}</td>
                <td>{{str_limit($agent->details_ar,20)}}</td>
                <td style="text-align:center;">
                    <button type="button" class="btn btn-info btn-sm editagent" data-toggle="modal" data-action="{{route('updateagent',$agent->id)}}" data-id="{{$agent->id}}" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm deleteagent" data-toggle="modal" data-action="{{route('deleteagent',$agent->id)}}" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
                </td>
            </tr>
          @endforeach
        @else
          <tr class="text-center">
            <td colspan="8">No Services</td>
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
                <h5 class="modal-title">Add New Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addagent')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Agent Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Name in English</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Name in Arabic</label>
                        <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Location in English</label>
                        <input type="text" name="location" value="{{old('location')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Location in Arabic</label>
                        <input type="text" name="location_ar" value="{{old('location_ar')}}" class="form-control">
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
                <h5 class="modal-title">Edit Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editagentform" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                          <label>Agent Image</label>
                          <input type="file" name="image" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Name in English</label>
                          <input type="text" name="name" value="{{old('name')}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Name in Arabic</label>
                          <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Location in English</label>
                          <input type="text" name="location" value="{{old('location')}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Location in Arabic</label>
                          <input type="text" name="location_ar" value="{{old('location_ar')}}" class="form-control">
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


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <br />
                <p style="color:red;">Are You Sure You Want to Delete This Agent ?</p>
                <hr />
                <form class="hidden" id="deleteagentform" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                </form>
                <button type="submit" onclick="$('#deleteagentform').submit();" class="btn btn-danger">Delete</button>
                <br />
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')

<script type="text/javascript">

$(document).ready(function(){


    $('.editagent').on('click',function(){
      var id=$(this).data('id');
      var action=$(this).data('action');
      $('#editagentform').attr('action',action);

      @foreach($agents as $agent)
      if(id == `{{$agent->id}}`){
        $('#editagentform').find('input[name="name"]').val('{!!$agent->name!!}');
        $('#editagentform').find('input[name="name_ar"]').val('{!!$agent->name_ar!!}');
        $('#editagentform').find('input[name="location"]').val('{!!$agent->location!!}');
        $('#editagentform').find('input[name="location_ar"]').val('{!!$agent->location_ar!!}');
        $('#editagentform').find('textarea[name="details"]').html('{!!$agent->details!!}');
        $('#editagentform').find('textarea[name="details_ar"]').html('{!!$agent->details_ar!!}');
      }
      @endforeach

    });

    $('.deleteagent').on('click',function(){
      var action=$(this).data('action');
      $('#deleteagentform').attr('action',action);
    });

  });


</script>
@endpush
