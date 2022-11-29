@extends('admin.admin_master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center>
                        <img class="rounded-circle avatar-xl" 
                        src="{{ (!empty($admin_profile->profile_image)? url('uploads/admin_images/'. $admin_profile->profile_image): url('uploads/no_image.jpg')) }}" 
                        alt="Card image cap">
                    </center>
                    
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $admin_profile->name }}</h4><hr>
                        <h4 class="card-title">Username: {{ $admin_profile->username }}</h4><hr>
                        <h4 class="card-title">Email: {{ $admin_profile->email }}</h4><hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection