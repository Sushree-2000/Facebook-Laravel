<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\About;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\ValidController;
use App\Http\Controllers\PostController;

class AboutController extends Controller
{
    //
    function storeabout(Request $req){
        $req->validate([
            // 'fullname'=>'required',
            // 'email'=>'required|unique:abouts',
            // 'number'=>'digits:10|numeric',
            // 'dob'=>'required',
            // 'gender'=>'required',
            // 'address'=>'required',
            // 'work'=>'required',
            // 'education'=>'required',
            // 'college'=>'required',
            // 'passout'=>'required',
            'email'=>'unique:abouts',
            'number'=>'digits:10|numeric',
        ]);

        $about= new About;
        $about->fullname = $req->fullname;
        $about->email = $req->email;
        $about->number = $req->number;
        $about->dob = $req->dob;
        $about->gender = $req->gender;
        $about->address = $req->address;
        $about->work = $req->work;
        $about->education = $req->education;
        $about->college = $req->college;
        $about->passout = $req->passout;

        $data = array();
        if(session()->has('LoggedUser')){
            $data = User::where('id','=',session()->get('LoggedUser'))->first();
            $about->user_id = $data->id;
        }
        // $data = array();
        // if(session()->has('LoggedUser')){
        //     $data = User::where('id','=',session()->get('LoggedUser'))->first();
        //     if($about->email == $data->email){
                $query = $about->save();
            //     }
            // }
            if($query){
                return redirect('about')->with('success','Your details have been saved.');
            }
            else{
                return back()->with('fail','Something went wrong');
            }
    }

    public function updateabout(Request $req,$id){
        $about = About::find($id);
        $input = $req->all();
        $about -> update($input);
        return redirect('about')->with('flash message','About updated');
    }

    public function deleteabout($id){
        About::destroy($id);
        return redirect('about')->with('flash message','About deleted');
    }
}
