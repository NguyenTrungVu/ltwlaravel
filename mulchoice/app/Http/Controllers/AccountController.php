<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
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
           
            'email' => 'required|email|unique:tb_user,email',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password'
        ]);
        $filename = Cloudinary::upload($request->file('avatar')->getRealPath())->getSecurePath();
        // $image = time() . '_avatar' . '.' . $request->avatar->extension();
        // $request->avatar->move(public_path('uploads'), $image);
        
        $role = "user";
        $act = true;
        $u = new User([
            'username' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'active' => $act,
            'avatar' => $filename, 
            'user_role' => $role,
            'created_date' => time(),
        ]);
        $u->save();
        return redirect()->action([AccountController::class, 'loginform']);
        // echo "Record inserted successfully.<br/>";
        // $name = $request->input('name');
        
        // $data=array('name'=>$name);
        // DB::table('category')->insert($data);
        // echo "Record inserted successfully.<br/>";
    }

    public function loginform(){
        return view('login');
    }
    public function login(Request $request){
        $request-> validate([
           'username'=>'required',
           'password'=>'required'
        ]);
        // $login = DB::table('onlinepractice.user')->where('username', $request->username)->where('password', md5($password))->first();
        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
        return back()->withErrors('password', 'Wrong username or password');
    }

}
