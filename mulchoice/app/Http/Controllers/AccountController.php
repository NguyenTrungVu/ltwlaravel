<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $filename = Cloudinary::upload($request->file('avatar')->getRealPath())->getSecurePath();
        dd($filename);
        $u = Account::create([
            'username' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'active' => true,
            'avatar'
        ]);
        return redirect()->action([AccountController::class, 'index']);
        // echo "Record inserted successfully.<br/>";
        // $name = $request->input('name');
        
        // $data=array('name'=>$name);
        // DB::table('category')->insert($data);
        // echo "Record inserted successfully.<br/>";
    }
}
