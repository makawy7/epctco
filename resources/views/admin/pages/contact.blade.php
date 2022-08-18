@extends('admin.layout.layout')

@section('content')

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>Administrative Office Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                          <form class="" action="{{route('updateadministrative')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address in English</label>
                                        <textarea class="form-control" name="address" rows="2">{{setting()->adminoffice_address}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Address in Arabic</label>
                                        <textarea class="form-control" name="address_ar" rows="2">{{setting()->adminoffice_address_ar}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Emails</label>
                                        <textarea class="form-control" name="emails" rows="2">{{setting()->adminoffice_email}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phones</label>
                                        <textarea class="form-control" name="phones" name="" rows="2">{{setting()->adminoffice_phone}}</textarea>
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
            <h4>Main Store Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                          <form class="" action="{{route('updatemainstore')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address in English</label>
                                        <textarea class="form-control" name="address" rows="2">{{setting()->mainstore_address}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Address in Arabic</label>
                                        <textarea class="form-control" name="address_ar" rows="2">{{setting()->mainstore_address_ar}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Emails</label>
                                        <textarea class="form-control" name="emails" rows="2">{{setting()->mainstore_email}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phones</label>
                                        <textarea class="form-control" name="phones" rows="2">{{setting()->mainstore_phone}}</textarea>
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
