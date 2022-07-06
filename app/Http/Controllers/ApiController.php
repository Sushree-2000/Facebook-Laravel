<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\About;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class ApiController extends Controller
{
    //GET DATAS
    //Data from user table
    function getUsers($id = null){
        return $id?User::find($id):User::all();
    }
    //Data from post table
    function getPosts($id = null){
        return $id?Post::find($id):Post::all();
    }
    // // get data by mail id
    // function getPosts($email = null){
    //     $posts = Post::where('user_id','like','%'.$email.'%')->get();
    //     return $email?$posts:Post::all();
    // }
    //Data from about table
    function getAbouts($id = null){
        return $id?About::find($id):About::all();
    }


    //SEARCH DATA
    //Search in User
    function searchUser($email){
        return User::where('email','like','%'.$email.'%')->get(); //Character search
    }
    //Search in Post
    function searchPost($user_id){
        return Post::where('user_id','like','%'.$user_id.'%')->get(); //Character search

    }
    //Search in About
    function searchAbout($user_id){
        return About::where('user_id','like','%'.$user_id.'%')->get(); //Character search

    }

    //ADD DATA
    //Add in User
    function addUser(Request $req){
        //
        $validation = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'gender'=>'required',
            'dob'=>'required',
            'address'=>'required',
            'password'=>'required|min:6|max:12',
            'conf_password'=>'required|same:password'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(),201);
        }
        $user= new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->gender = $req->gender;
        $user->dob = $req->dob;
        $user->address = $req->address;
        $user->password = Hash::make($req->password);
        $query = $user->save();
        $token = $user->createToken('API Token')->accessToken;
        if($query){
            return response([ 'user' => $user, 'token' => $token]);
            // return ['success'=>'You have been registered successfully.'];
            // return redirect('login');
        }
        else{
            return ['fail'=>'Something went wrong'];
        }
    }

    //Login User
    public function loginUser(Request $req){
        if(Auth::attempt([
            'email'=> $req->email,
            'password'=> $req->password
        ])){
            $user = Auth::user();
            $token = $user->createToken('API Token')->accessToken;

            return response([ 'user' => $user->email, 'userId' => $user->id, 'token' => $token]);
        }
        else{
            return response()->json(['error'=>'Unauthorized Access'],202);
        }
    }


    //Logout User
    public function logoutUser(Request $req){
        $token = $req->user()->token();
        $token->revoke();
        return ['message'=> 'You have successfully logout!!'];
    }


    //Add in Post
    function addPost(Request $req){
        $req->validate([
            'imagepost'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $post= new Post;
        $post->textpost = $req->textpost;
        if($req->imagepost){
            $post->imagepost = time().'.'.$req->imagepost->extension();
            $req->imagepost->move(public_path('postedImg'),time().'.'.$req->imagepost->extension());
        }

        // if (Auth::check()){
        //     $user = Auth::user();
        //     $post->user_id = $user->id;
        // }

        // $user = Auth::user();
        // $post->user_id = $user->id;

        $post->user_id = Auth::user()->id;
        $post->email = Auth::user()->email;

        $query = $post->save();
        return $post;
    }
    //Add in About
    function addAbout(Request $req){
        //
        $user = Auth::user();

        $about= new About;
        $about->fullname = $req->fullname;
        $about->email = $user->email;
        $about->number = $req->number;
        $about->dob = $user->dob;
        $about->gender = $user->gender;
        $about->address = $user->address;
        $about->work = $req->work;
        $about->education = $req->education;
        $about->college = $req->college;
        $about->passout = $req->passout;

        $about->user_id = $user->id;

        $query = $about->save();
        if($query){
            return ['Your details have been saved.',$about];
        }
        else{
            return ['fail'=>'Something went wrong'];
        }
    }

    //UPDATE DATAS
    //Update User
    function updateUser(Request $req){
        $user = User::find($req->id);
        $loggedUser = Auth::user();
        if($loggedUser->id == $user->id){
            $input = $req->all();
            $user->update($input);
            return [$user,'Your details have been updated successfully'];
        }
        else{
            return [$loggedUser->email,"Sorry!!You can't edit another one's details"];
        }
    }
    //Update Post
    // function updatePost(Request $req){
    //     $post = Post::find($req->id);
    function updatePost(Request $req,$id){
        $post = Post::find($id);
        $loggedUser = Auth::user();
        if($loggedUser->id == $post->user_id){
            // $input = $req->all();
            // $post->update($input);
            $post->textpost = $req->textpost;
            if($req->imagepost){
                $post->imagepost = time().'.'.$req->imagepost->extension();
                $req->imagepost->move(public_path('postedImg'),time().'.'.$req->imagepost->extension());
            }
            $post->save();
            return [$post,'Your posts have been updated successfully'];
        }
        else{
            return [$loggedUser->email,"Sorry!!You can't edit another one's post"];
        }

        // $input = $req->all();
        // $post->update($input);
        // return $post;
    }

    // Update About
    function updateAbout(Request $req, $id){
        // $about = About::find($req->id);
        $about = About::find($id);

        $loggedUser = Auth::user();
        if($loggedUser->id == $about->user_id){
            // $input = $req->all();
            // $about->update($input);

            // $about->fullname = $req->fullname;
            $req->fullname ? $about->fullname = $req->fullname : $about->fullname = $about->fullname;
            $req->email ? $about->email = $req->email : $about->email = $about->email;
            $req->number ? $about->number = $req->number : $about->number = $about->number;
            $req->dob ? $about->dob = $req->dob : $about->dob = $about->dob;
            $req->gender ? $about->gender = $req->gender : $about->gender = $about->gender;
            $req->address ? $about->address = $req->address : $about->address = $about->address;
            $req->work ? $about->work = $req->work : $about->work = $about->work;
            $req->education ? $about->education = $req->education : $about->education = $about->education;
            $req->college ? $about->college = $req->college : $about->college = $about->college;
            $req->passout ? $about->passout = $req->passout : $about->passout = $about->passout;

            $about->save();

            return [$about,'Your details have been updated successfully'];
        }
        else{
            return [$loggedUser->email,"Sorry!!You can't edit another one's details"];
        }
    }

    // function updateAbout(Request $req, $id){
    //     $about = About::find($id);
    //     $loggedUser = Auth::user();
    //     if($loggedUser->id == $about->user_id){
    //         $about->fullname = $req->fullname;
    //         $about->email = $req->email;
    //         $about->number = $req->number;
    //         $about->dob = $req->dob;
    //         $about->gender = $req->gender;
    //         $about->address = $req->address;
    //         $about->work = $req->work;
    //         $about->education = $req->education;
    //         $about->college = $req->college;
    //         $about->passout = $req->passout;

    //         // $about->user_id = $user->id;

    //         $about->save();
    //         return [$about,'Your details have been updated successfully'];
    //     }
    //     else{
    //         return [$loggedUser->email,"Sorry!!You can't edit another one's details"];
    //     }
    // }

    //DELETE DATAS
    //Delete Post
    function deletePost($id){
        $post = Post::find($id);
        $loggedUser = Auth::user();
        if($loggedUser->id == $post->user_id){
            $result = $post->delete();
            return ['result'=>'Your post has been deleted'];
        }
        else{
            return ['result'=>"You can't delete other's post"];
        }
    }
    //Delete About
    function deleteAbout($email){
        $about = About::find($email);
        $loggedUser = Auth::user();
        if($loggedUser->id == $about->user_id){
            $result = $about->delete();
            return ['result'=>'Your about has been deleted'];
        }
        else{
            return ['result'=>"You can't delete other's details"];
        }
    }
}
