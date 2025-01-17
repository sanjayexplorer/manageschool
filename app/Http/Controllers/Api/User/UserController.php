<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

 public function list(){
        if (auth()->user()->can('view user')) {
            return response()->json(['success'=>true,'error'=>false,'msg'=>'fetch successfully']);
        } 
       return response()->json(['success'=>false,'error'=>true,'msg'=>'something went successfully']);
    }
}