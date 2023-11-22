<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AuthController extends Controller {
    
   public function __construct() {
       $this->middleware('auth:api', ['except' => ['login', 'register']]);
   }
   
   public function login(Request $request){
    $rule = [
        'username' => 'required|string|max:255',
        'password' => 'required|string|min:6',
    ];
    $message = [
        'username.required' => 'Tên đăng nhập là bắt buộc.',
        'password.required'=> 'Mật khẩu là bắt buộc.',
    ];
    $validator = Validator::make($request->all(), $rule, $message );

    if ($validator->fails()) {
        return response()->json($validator->errors(), 404);
    }

    if (!$token = auth('api')->attempt($validator->validated())) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

       return $this->createNewToken($token);
   }
   public function register(Request $request) {
    $rule = [
        'name' => 'required|string|between:2,100',
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:100|unique:users',
        'password' => 'required|string|confirmed|min:6',
        'gender' => 'required|in:Male,Female,Other',
        'phoneNumber' => 'required|numeric|max|10|unique:users',
        'active_status'=> 'required|in:Active,Inactive',
        'roles' => 'required'
    ];
    $message = [
        'name.required' => 'Tên  là bắt buộc.',
        'username.required' => 'Tên đăng nhập là bắt buộc.',
        'email.required'=> 'Email là bắt buộc.',
        'password.required'=> 'Mật khẩu là bắt buộc.',
        'gender.required'=> 'Giới tính là bắt buộc.',
        'phoneNumber.required'=> 'Số điện thoại là bắt buộc.',
        'active_status.required'=> 'Trạng thái hoạt động là bắt buộc.',
        'roles.required'=> 'Chức vụ là bắt buộc.',
    ];

    $validator = Validator::make($request->all(), $rule, $message );

    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 404);
    }

    $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
    $user->syncRoles($request->input('roles'));

    return response()->json([
        'message' => 'User successfully registered',
        'user' => $user,
        'role' => $user->getRoleNames()
    ], 201);
   }

   public function logout() {
       auth('api')->logout();

       return response()->json(['message' => 'User successfully signed out']);
   }

   public function userProfile() {
       return response()->json(auth('api')->user());
   }



   public function userList(){
    $user= User::with('roles')->get();
    // $userRoles = $user->getRoleNames();
    
    if(auth('api')->user()){
        return response()-> json([
            'user' => $user,
            // 'roles' => $userRoles
        ]);
    } 
    abort(403, 'Unauthorized');
//     if(auth('api')->user()->hasRole('admin')){
//         return response()-> json($user);
//     } 
//     abort(403, 'Unauthorized');

   }
   protected function createNewToken($token){   
       return response()->json([
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth('api')->factory()->getTTL() * 60,
           'user' =>auth('api')->user()->load('roles')
       ]);
   }

   public function changePassWord(Request $request) {
       $validator = Validator::make($request->all(), [
           'old_password' => 'required|string|min:6',
           'new_password' => 'required|string|confirmed|min:6',
       ]);

       if($validator->fails()){
           return response()->json($validator->errors()->toJson(), 400);
       }
       $userId =auth('api')->user()->id;

       $user = User::where('id', $userId)->update(
                   ['password' => bcrypt($request->new_password)]
               );

       return response()->json([
           'message' => 'User successfully changed password',
           'user' => $user,
       ], 201);
   }

   public function destroy($id){
        $user = User::findOrDail($id);
        $user->delete();

        if(auth('api')->user()){
            return response()->json([
                'message'=> 'Xóa dự án thành công!!'
            ], 201);
        } 
        abort(403, 'Unauthorized');   

   }
}
