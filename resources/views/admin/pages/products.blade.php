@extends('admin.layout.layout')

@section('content')



                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
						<div class="d-flex align-items-center justify-content-between mb-20">
							<h4>Products Categories</h4>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Category</button>
						</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
                              <th width="35%">Category Name</th>
                              <th width="35%">Category Name in Arabic</th>
                              <th width="30%" style="text-align:center;">Action</th>
												</tr>
											</thead>
											<tbody>
                        @if(count($categories))
                          @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->name_ar}}</td>
                                <td style="text-align:center;">
                                    <button type="button" class="btn btn-info btn-sm editcategory" data-action="{{route('updatecategory',$category->id)}}" data-id="{{$category->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm deletecategory" data-action="{{route('deletecategory',$category->id)}}" data-id="{{$category->id}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                          @endforeach
                        @else
                          <tr class="text-center">
                            <td colspan="3">No Categories</td>
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
                            <h4>Products</h4>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalProduct"><i class="fa fa-plus"></i> Add New Product</button>
                        </div>
                        <div class="card">
                            <div class="card-body pa-0">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Product Image</th>
                                                    <th width="20%">Product Title</th>
                                                    <th width="20%">Product Title In Arabic</th>
                                                    <th width="20%">Product Category</th>
                                                    <th width="25%" style="text-align:center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @if(count($products))
                                                @foreach($products as $product)
                                                  <tr>
                                                      <td><img class="img-fluid rounded" width="75px" src="{{url('storage/images/products/'.$product->image)}}" alt="Client Logo"></td>
                                                      <td>{{$product->category->getname()}}</td>
                                                      <td>{{$product->title}}</td>
                                                      <td>{{$product->title_ar}}</td>
                                                      <td style="text-align:center;">
                                                          <button type="button" class="btn btn-info btn-sm editproduct" data-action="{{route('updateproduct',$product->id)}}" data-id="{{$product->id}}" data-toggle="modal" data-target="#EditModalProduct"><i class="fa fa-edit"></i> Edit</button>
                                                          <button type="button" class="btn btn-danger btn-sm deleteproduct" data-action="{{route('deleteproduct',$product->id)}}" data-toggle="modal" data-target="#deleteModalProduct"><i class="fa fa-trash"></i> Delete</button>
                                                      </td>
                                                  </tr>
                                                @endforeach
                                              @else
                                                <tr class="text-center">
                                                  <td colspan="3">No Products</td>
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
                        <h5 class="modal-title">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('addcategory')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name in English</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category Name in Arabic</label>
                                <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Add Product Modal -->
        <div class="modal fade" id="addModalProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('addproduct')}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Title In English</label>
                                <input type="text" name="title"  value="{{old('title')}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Title In Arabic</label>
                                <input type="text" name="title_ar"  value="{{old('title_ar')}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="category_id" class="form-control">
                                  @foreach($categories as $category)
                                    <option {{old('category_id')==$category->id?'selected':''}} value="{{$category->id}}">{{$category->getname()}}</option>
                                  @endforeach
                                </select>
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
                        <form id="editcategoryform" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Category Name in English</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category Name in Arabic</label>
                                <input type="text" name="name_ar" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <div class="modal fade" id="EditModalProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editproductform" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Title In English</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Title In Arabic</label>
                                <input type="text" name="title_ar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="category_id" class="form-control">
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->getname()}}</option>
                                  @endforeach
                                </select>
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
                        <h5 class="modal-title">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center;">
                        <br />
                        <p style="color:red;">Are You Sure You Want to Delete This Category ?</p>
                        <hr />
                        <form class="hidden" id="deletecategoryform" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <button type="submit" onclick="$('#deletecategoryform').submit();" class="btn btn-danger">Delete</button>
                        <br />
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal Product -->
        <div class="modal fade" id="deleteModalProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align:center;">
                        <br />
                        <p style="color:red;">Are You Sure You Want to Delete This Product ?</p>
                        <hr />
                        <form id="deleteproductform" class="hidden" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <button type="submit" onclick="$('#deleteproductform').submit();" class="btn btn-danger">Delete</button>
                        <br />
                    </div>
                </div>
            </div>
        </div>

@endsection


@push('scripts')
<script type="text/javascript">

$(document).ready(function(){

  //Categories
  $('.editcategory').on('click',function(){
    var id=$(this).data('id');
    var action=$(this).data('action');
    $('#editcategoryform').attr('action',action);

    @foreach($categories as $category)
    if(id == `{{$category->id}}`){
      $('#editcategoryform').find('input[name="name"]').val('{!!$category->name!!}');
      $('#editcategoryform').find('input[name="name_ar"]').val('{!!$category->name_ar!!}');
    }
    @endforeach

  });

  $('.deletecategory').on('click',function(){
    var action=$(this).data('action');
    $('#deletecategoryform').attr('action',action);
  });

  //Products
  $('.editproduct').on('click',function(){
    var id=$(this).data('id');
    var action=$(this).data('action');
    $('#editproductform').attr('action',action);

    @foreach($products as $product)
    if(id == `{{$product->id}}`){
      $('#editproductform').find('input[name="title"]').val('{!!$product->title!!}');
      $('#editproductform').find('input[name="title_ar"]').val('{!!$product->title_ar!!}');
      $('#editproductform').find('select option[value="{{$product->category_id}}"]').prop("selected",true);
    }
    @endforeach

  });

  $('.deleteproduct').on('click',function(){
    var action=$(this).data('action');
    $('#deleteproductform').attr('action',action);
  });

});

</script>
@endpush
