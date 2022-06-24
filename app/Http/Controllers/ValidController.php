<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class ValidController extends Controller
{
    //
    // public function home(){
    //     return view('Media.home');
    // }

    function create(Request $req){
        // return $req->input();
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'gender'=>'required',
            'dob'=>'required',
            'address'=>'required',
            'password'=>'required|min:6|max:12',
            'conf_password'=>'required|same:password'
        ]);

        $user= new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->dob = $req->dob;
        $user->address = $req->address;
        $user->password = Hash::make($req->password);

        $query = $user->save();
        if($query){
            return redirect('login')->with('success','You have been registered successfully.');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }
    function check(Request $req){
        // return $req->input();
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);

        $user = User::where('email','=', $req->email)->first();
        if($user){
            if(Hash::check($req->password, $user->password)){
                $req->session()->put('LoggedUser',$user->id);
                return redirect('home');
            }
            else{
                return back()->with('fail','Invalid password.');
            }
        }
        else{
            return back()->with('fail','This mail has not been registered.');
        }
    }

    //APICHECK
    function apiCheck(Request $req){
        $user = User::where('email','=',$req->email)->first();
        if (!$user || !Hash::check($req->password,$user->password)){
            return response([
                'message'=> ['These credentials do not match.']],404);

        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }

    //
    public function editdetail($id){
        //
        $data = User::find($id);
        return view('Media.editdetail')->with('data', $data);
    }

    public function updatedetail(Request $req, $id){
        //
        $data = User::find($id);
        $input = $req->all();
        $data->update($input);
        // $post->textpost = $req->textpost;
        // $post->imagepost = time().'.'.$req->imagepost->extension();
        // $post->save();
        return redirect('profile')->with('flash_message', 'Details are Updated!');
    }
    //

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            // return redirect('/');
            return redirect('/');
        }
    }
}
