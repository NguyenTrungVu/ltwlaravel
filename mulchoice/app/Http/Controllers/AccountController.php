<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Category;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class AccountController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('account', compact('category'));
    }

    public function create(){
        return view('addaccount');
    }
    public function store(Request $request){
        $request-> validate([
           
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password'
        ]);
        $filename = Cloudinary::upload($request->file('avatar')->getRealPath())->getSecurePath();
        // $image = time() . '_avatar' . '.' . $request->avatar->extension();
        // $request->avatar->move(public_path('uploads'), $image);
        
        $role = "user";
        $act = true;
        $u = Account::create([
            'username' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'active' => $act,
            'avatar' => $filename, 
            'user_role' => $role
        ]);
        // return redirect()->action([AccountController::class, 'index']);
        echo "Record inserted successfully.<br/>";
        // $name = $request->input('name');
        
        // $data=array('name'=>$name);
        // DB::table('category')->insert($data);
        // echo "Record inserted successfully.<br/>";
    }
}
