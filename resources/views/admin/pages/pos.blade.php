@extends('admin.layout.layout')

@section('content')



          <!-- Row -->
          <div class="row">
              <div class="col-xl-12">
			<div class="d-flex align-items-center justify-content-between mb-20">
				<h4>Pos Data</h4>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New POS</button>
			</div>
			<div class="card">
				<div class="card-body pa-0">
					<div class="table-wrap">
						<div class="table-responsive">
							<table class="table table-sm table-hover mb-0">
								<thead>
									<tr>
                    <th width="20%">Pos Name</th>
                    <th width="20%">Pos Name in Arabic</th>
                    <th width="15%">Pos Phone</th>
                    <th width="20%">Pos Location</th>
                    <th width="25%" style="text-align:center;">Action</th>
									</tr>
								</thead>
								<tbody>
                  @foreach($points as $point)
                  <tr>
                      <td>{{$point->name}}</td>
                      <td>{{$point->name_ar}}</td>
                      <td>{{$point->phone}}</td>
                      <td> <a href="{{$point->url}}">URL</a> </td>
                      <td style="text-align:center;">
                          <button type="button" class="btn btn-info btn-sm editpos" data-action="{{route('updatepos',$point->id)}}" data-id="{{$point->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                          <button type="button" class="btn btn-danger btn-sm deletepos" data-action="{{route('deletepos',$point->id)}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
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

@endsection





@section('modals')

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New POS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addpos')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Pos Name in English</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pos Name in Arabic</label>
                        <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pos Phone</label>
                        <input type="tel" name="phone" value="{{old('phone')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pos Location URL</label>
                        <input type="url" name="url" value="{{old('url')}}" class="form-control">
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
                <h5 class="modal-title">Edit POS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editposform" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Pos Name in English</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pos Name in Arabic</label>
                        <input type="text" name="name_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pos Phone</label>
                        <input type="tel" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pos Location URL</label>
                        <input type="url" name="url" class="form-control">
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
                <h5 class="modal-title">Delete POS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <br />
                <p style="color:red;">Are You Sure You Want to Delete This POS ?</p>
                <hr />
                <form class="hidden" id="deleteposform" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                </form>
                <button type="submit" onclick="$('#deleteposform').submit();" class="btn btn-danger">Delete</button>
                <br />
            </div>
        </div>
    </div>
</div>


@endsection



@push('scripts')
<script type="text/javascript">

$(document).ready(function(){

  $('.editpos').on('click',function(){
    var id=$(this).data('id');
    var action=$(this).data('action');
    $('#editposform').attr('action',action);

    @foreach($points as $point)
    if(id == `{{$point->id}}`){
      $('#editposform').find('input[name="name"]').val('{!!$point->name!!}');
      $('#editposform').find('input[name="name_ar"]').val('{!!$point->name_ar!!}');
      $('#editposform').find('input[name="phone"]').val('{!!$point->phone!!}');
      $('#editposform').find('input[name="url"]').val('{!!$point->url!!}');
    }
    @endforeach

  });

  $('.deletepos').on('click',function(){
    var action=$(this).data('action');
    $('#deleteposform').attr('action',action);
  });


});

</script>
@endpush
