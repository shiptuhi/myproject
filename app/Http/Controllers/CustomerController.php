<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:api');
      
    } 

    public function index(){
        $customer = Customer::all();
        return response()-> json($customer);
    }

    public function filter() {
        return 0;
    }

    public function store(Request $request){

        $rules = [
            'username' => 'required|string|max:255',
            'name' => 'required|max:255',
            'email' =>'required|string|email|max:100',
            'phoneNumber' => 'required|numeric|max:10',
            'company' =>  'required|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'active_status' => 'required|in:Active,Inactive',
            'note' => 'max:255'
            
        ];

        $message = [
            'name.required' => 'Tên  là bắt buộc.',
            'username.required' => 'Tên đăng nhập là bắt buộc.',
            'email.required'=> 'Email là bắt buộc.',
            'phoneNumber.required'=> 'Số điện thoại là bắt buộc.',
            'company.required'=> 'Tên công ty là bắt buộc.',
            'gender.required'=> 'Giới tính là bắt buộc.',
            'active_status.required'=> 'Trạng thái hoạt động là bắt buộc.',
        ];

        $validator  = Validator::make($request->all(), $rules, $message);
        
        if($validator ->fails()){
            return response()->json($validator->errors(),404);
        }
 
        $customer = Customer::create(array_merge($validator->validated()));

        if(auth('api')->user()){
            return response()->json([
                'message' => 'Thêm khách hàng thành công',
                'customer' => $customer
            ], 201);
        }
        abort(403, 'Unauthorized'); 
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function update(Request $request, $id){

        $customer = Customer::findOrFail($id);

        $rules = [
            'username' => 'required|string|max:255',
            'name' => 'required|max:255',
            'email' =>'required|string|email|max:100',
            'phoneNumber' => 'required|numeric|max:10',
            'company' =>  'required|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'active_status' => 'required|in:Active,Inactive',
            'note' => 'max:255'
            
        ];

        $message = [
            'name.required' => 'Tên  là bắt buộc.',
            'username.required' => 'Tên đăng nhập là bắt buộc.',
            'email.required'=> 'Email là bắt buộc.',
            'phoneNumber.required'=> 'Số điện thoại là bắt buộc.',
            'company.required'=> 'Tên công ty là bắt buộc.',
            'gender.required'=> 'Giới tính là bắt buộc.',
            'active_status.required'=> 'Trạng thái hoạt động là bắt buộc.',
        ];

        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json($validator->errors(),404);
        }

        $customer->update(array_merge($validator->validated()));

        if(auth('api')->user()){
            return response()->json([
                'message' => 'Sửa khách hàng thành công',
                'customer' => $customer
            ], 201);
        }
        abort(403, 'Unauthorized'); 


    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        if(auth('api')->user()){
            return response()->json([
                'message'=> 'Xóa khách hàng thành công!!'
            ], 201);
        } 
        abort(403, 'Unauthorized');   
    }
}
