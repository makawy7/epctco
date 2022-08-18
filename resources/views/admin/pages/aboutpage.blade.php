@extends('admin.layout.layout')

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>About, Vision and Mission Section</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                          <form  action="{{route('updateabout')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                      <label>About Us in English</label>
                                      <textarea name="about" class="form-control" rows="5">{{setting()->about_content}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>About Us in Arabic</label>
                                      <textarea name="about_ar" class="form-control" rows="5">{{setting()->about_content_ar}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>About Image</label>
                                      <input type="file" name="image" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label>Our Vision in English</label>
                                      <textarea name="vision" class="form-control" rows="2">{{setting()->about_vision}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Our Vision in Arabic</label>
                                      <textarea name="vision_ar" class="form-control" rows="2">{{setting()->about_vision_ar}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Our Mission in English</label>
                                      <textarea name="mission" class="form-control" rows="2">{{setting()->about_mission}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Our Mission in Arabic</label>
                                      <textarea name="mission_ar" class="form-control" rows="2">{{setting()->about_mission_ar}}</textarea>
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
<h4>Team Members</h4>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Member</button>
</div>
<div class="card">
<div class="card-body pa-0">
<div class="table-wrap">
  <div class="table-responsive">
    <table class="table table-sm table-hover mb-0">
      <thead>
        <tr>
              <th width="15%">Image</th>
              <th width="15%">Name</th>
              <th width="15%">Name in Arabic</th>
              <th width="15%">Role</th>
              <th width="15%">Role in Arabic</th>
              <th width="25%" style="text-align:center;">Action</th>
        </tr>
      </thead>
      <tbody>
          @if(count($members))
                @foreach($members as $member)
                <tr>
                  <td><img class="img-fluid rounded" width="75px" src="{{url('storage/images/members/'.$member->image)}}" alt="Client Logo"></td>
                  <td>{{$member->name}}</td>
                  <td>{{$member->name_ar}}</td>
                  <td>{{$member->role}}</td>
                  <td>{{$member->role_ar}}</td>
                  <td style="text-align:center;">
                      <button type="button" class="btn btn-info btn-sm editmember" data-id="{{$member->id}}"  data-action="{{route('updatemember',$member->id)}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                      <button type="button" class="btn btn-danger btn-sm deletemember" data-id="{{$member->id}}" data-action="{{route('deletemember',$member->id)}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
                  </td>
                </tr>
                @endforeach
          @else
            <tr class="text-center">
              <td colspan="6">No Members</td>
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
                <h5 class="modal-title">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addmember')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Member Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Member Name in English</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Member Name in Arabic</label>
                        <input type="text" value="{{old('name_ar')}}" name="name_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Member Role in English</label>
                        <input type="text" value="{{old('role')}}" name="role" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Member Role in Arabic</label>
                        <input type="text" value="{{old('role_ar')}}" name="role_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Member Description in English</label>
                        <textarea name="des" class="form-control" rows="5">{{old('des')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Member Description in Arabic</label>
                        <textarea name="des_ar" class="form-control" rows="5">{{old('des_ar')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="url" value="{{old('facebook')}}" name="facebook" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Instagram Link</label>
                        <input type="url" value="{{old('instagram')}}" name="instagram" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>LinkedIN Link</label>
                        <input type="url" value="{{old('linkedin')}}" name="linkedin" class="form-control">
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
                <h5 class="modal-title">Edit Member Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editmemberform" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <div class="form-group">
                      <label>Member Image</label>
                      <input type="file" name="image" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Member Name in English</label>
                      <input type="text" value="" name="name" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Member Name in Arabic</label>
                      <input type="text" value="" name="name_ar" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Member Role in English</label>
                      <input type="text" value="" name="role" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Member Role in Arabic</label>
                      <input type="text" value="" name="role_ar" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Member Description in English</label>
                      <textarea name="des" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Member Description in Arabic</label>
                      <textarea name="des_ar" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Facebook Link</label>
                      <input type="url" value="" name="facebook" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Instagram Link</label>
                      <input type="url" value="" name="instagram" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>LinkedIN Link</label>
                      <input type="url" value="" name="linkedin" class="form-control">
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
                <h5 class="modal-title">Delete Member Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <br />
                <p style="color:red;">Are You Sure You Want to Delete This Team Member ?</p>
                <hr />
                <form id="deletememberform" class="hidden" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                </form>
                <button type="submit" onclick="$('#deletememberform').submit();" class="btn btn-danger">Delete</button>
                <br />
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">

$(document).ready(function(){

  $('.editmember').on('click',function(){
    var id=$(this).data('id');
    var action=$(this).data('action');
    $('#editmemberform').attr('action',action);

    @foreach($members as $member)
    if(id == `{{$member->id}}`){
      $('#editmemberform').find('input[name="name"]').val('{!!$member->name!!}');
      $('#editmemberform').find('input[name="name_ar"]').val('{!!$member->name_ar!!}');
      $('#editmemberform').find('input[name="role"]').val('{!!$member->role!!}');
      $('#editmemberform').find('input[name="role_ar"]').val('{!!$member->role_ar!!}');
      $('#editmemberform').find('input[name="des"]').val('{!!$member->des!!}');
      $('#editmemberform').find('textarea[name="des"]').html('{!!$member->des!!}');
      $('#editmemberform').find('textarea[name="des_ar"]').html('{!!$member->des_ar!!}');
      $('#editmemberform').find('input[name="facebook"]').val('{!!$member->facebook!!}');
      $('#editmemberform').find('input[name="instagram"]').val('{!!$member->instagram!!}');
      $('#editmemberform').find('input[name="linkedin"]').val('{!!$member->linkedin!!}');
    }
    @endforeach

  });

  $('.deletemember').on('click',function(){
    var action=$(this).data('action');
    $('#deletememberform').attr('action',action);
  });

});

</script>
@endpush
