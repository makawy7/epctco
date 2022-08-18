@extends('admin.layout.layout')

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-20">
            <h4>Change Admin Password</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                          <form class="" action="{{route('change_password')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
