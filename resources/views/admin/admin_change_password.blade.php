@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Pssword</h4><hr>
                        @if (count($errors))
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                            
                        <form action="{{ route('update.password') }}" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="oldpassword" type="password" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="newpassword" type="password" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="confirmpassword" type="password" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Password" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection