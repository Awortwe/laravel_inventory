@extends('admin.admin_master')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Customers</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('customers.create') }}" 
                        class="btn btn-dark btn-rounded waves-effect waves-light" 
                        style="float: right;">
                            Add Customer</a><br><br>
                        <h4 class="card-title">Customers</h4>
                       

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S1</th>
                                <th>Name</th>
                                <th>Customer Image</th>
                                <th>Mobile Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($customers as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset($item->customer_image) }}" 
                                   style="width: 60px; height= 50px" alt=""></td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $item->id) }}" 
                                        class="btn btn-info sm" 
                                    title="Edit Supplier"> <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('customers.delete', $item->id) }}" 
                                        class="btn btn-danger sm" id="delete"
                                    title="Delete Supplier"> <i class="fas fa-trash-alt" ></i></a>
                                </td>
                            </tr>
                            @endforeach
                          
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        
    </div> <!-- container-fluid -->
</div>
@endsection