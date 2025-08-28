<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class BaseController extends Controller
{
   public function  create(){
return view("register2");

   }
     public function  store(Request $request){
$user = User::create([
    "name"=> $request->name,
    "email"=> $request->email,
    "password"=> Hash::make($request->password),
]);
Auth::login($user);
return redirect("/dashboard2");

}
}
?>
