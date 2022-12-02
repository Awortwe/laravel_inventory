<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('backend.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.customers.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('customer_image');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('uploads/customers/'. $imageName);
        $save_url = 'uploads/customers/'. $imageName;

        Customer::insert([
            'name' => $request->name,
            'customer_image' => $save_url,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Customer added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customers.index')->with($notification);
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customers.edit', compact('customer'));
    }

    public function update(Request $request)
    {
      $customer_id = $request->id;

      if($request->file('customer_image'))
      {
        $image = $request->file('customer_image');
        $imageName = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('uploads/customers/'. $imageName);
        $save_url = 'uploads/customers/'. $imageName;

        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'customer_image' => $save_url,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Customer updated successfully with image',
            'alert-type' => 'success'
        );

        return redirect()->route('customers.index')->with($notification);
      }

      else{
        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Customer updated successfully without image',
            'alert-type' => 'success'
        );

        return redirect()->route('customers.index')->with($notification);
      }
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $img = $customer->customer_image;
        unlink($img);
        Customer::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Customer deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
