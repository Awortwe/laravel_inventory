@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile</h4>
                            
                        <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{ $edit_profile->name }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="username" type="text" value="{{ $edit_profile->username }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
    
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" value="{{ $edit_profile->email }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
    
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="profile_image" type="file"  id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label"></label>
                                <img class="rounded avatar-lg" 
                                src="{{ (!empty($edit_profile->profile_image)? url('uploads/admin_images/'. $edit_profile->profile_image): url('uploads/no_image')) }}" 
                                alt="" id="showImage">
                            </div>
                            <!-- end row -->
                            <input type="submit" value="Update Profile" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection