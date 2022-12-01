@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Supplier Information</h4><hr>
                     
                            
                        <form action="{{ route('suppliers.update') }}" method="post"  id="myForm">
                           @csrf
                           <input type="hidden" name="id" value="{{ $supplier->id }}">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="name" type="text" 
                                    id="example-text-input" value="{{ $supplier->name }}">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Supplier Phone</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="phone" type="text" 
                                    id="example-text-input" value="{{ $supplier->phone }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Supplier Email</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="email" type="email" 
                                    id="example-text-input" value="{{ $supplier->email }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Supplier Address</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="address" type="text" 
                                    id="example-text-input" value="{{ $supplier->address }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Supplier" class="btn btn-info waves-effect waves-light">
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
                $(element).addClass('is-valid');
            },
        });
    });
</script>

@endsection