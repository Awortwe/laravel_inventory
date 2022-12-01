@extends('admin.admin_master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Customer</h4><hr>
                     
                            
                        <form action="" method="post" enctype="multipart/form-data" id="myForm">
                           @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="name" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Phone</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="phone" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Email</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="email" type="email" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Address</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="address" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Image</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="customer_image" 
                                    type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label"></label>
                                <div class="form-group col-sm-10">
                                    <img class="rounded me-2" alt="200x200" width="100" id="showImage"
                                    src="{{ asset('uploads/no_image.jpg') }}" 
                                    data-holder-rendered="true">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Add Customer" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                },
                address: {
                    required: true,
                },
                customer_image: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Please enter the supplier name',
                },
                phone: {
                    required: 'Please enter the supplier phone number',
                },
                email: {
                    required: 'Please enter supplier email address',
                },
                address: {
                    required: 'Please enter the supplier address',
                },
                customer_image: {
                    required: 'Please select one image',
                },
            },
            errorElement : 'span',
            errorPlacement : function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

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