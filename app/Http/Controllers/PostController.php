<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\About;
use App\Models\Like;
use Illuminate\Support\Facades\Hash;
// use App\Http\Middleware\Authenticate;

use App\Http\Controllers\ValidController;

class PostController extends ValidController
{
    //For home page
    public function home(){
            $posts = Post::all()->sortByDesc('updated_at');
            $data = array();
            if(session()->has('LoggedUser')){
                $data = User::where('id','=',session()->get('LoggedUser'))->first();
                // $posts = Post::where('user_id','=',$data->email)->get();
            // return view('Media.profile', ['posts' => $posts,'data' => $data]);
            return view('Media.home', ['posts' => $posts,'data' => $data]);
        }
    }

    //For about page
    public function about(){
        $data = array();
        if(session()->has('LoggedUser')){
            $data = User::where('id','=',session()->get('LoggedUser'))->first();
            $about = About::where('user_id','=',$data->id)->get();
            // if($about){}
            return view('Media.about', ['data' => $data, 'about'=>$about]);
        }
    }

    //For contact page
    public function contact(){
        $data = array();
        if(session()->has('LoggedUser')){
            $data = User::where('id','=',session()->get('LoggedUser'))->first();
            $about = About::where('email','=',$data->email)->get();
            return view('Media.contact', ['data' => $data, 'about'=>$about]);
        }
    }

    //For setting page
    public function setting(){
        $data = array();
        if(session()->has('LoggedUser')){
            $data = User::where('id','=',session()->get('LoggedUser'))->first();
        return view('Media.setting', ['data' => $data]);
        }
    }

    //For input validation and store in database
    function post(Request $req){

        $req->validate([
            'imagepost'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post= new Post;
        $post->textpost = $req->textpost;
        if($req->imagepost){
            $post->imagepost = time().'.'.$req->imagepost->extension();
            $req->imagepost->move(public_path('postedImg'),time().'.'.$req->imagepost->extension());
        }

        // $post->imagepost = $req->imagepost;
        // if($req->imagepost){
        //     $req->imagepost->store('PostedImg');
        // }
        $data = array();
        if(session()->has('LoggedUser')){
            $data = User::where('id','=',session()->get('LoggedUser'))->first();
            $post->user_id = $data->id;
        }

        $query = $post->save();

        if($query){
            return redirect('home')->with('success','Your post has been successfully created.');
            // return redirect('login');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }

    //for profile page
    public function profile(){
        $data = array();
        if(session()->has('LoggedUser')){
            $data = User::where('id','=',session()->get('LoggedUser'))->first();
            $posts = Post::where('user_id','=',$data->id)->get()->sortByDesc('updated_at');
            return view('Media.profile', ['posts' => $posts,'data' => $data]);
        }
    }

    public function xprofile($id){
        $data = User::where('id','=',$id)->first();
        $posts = Post::where('user_id','=',$id)->get()->sortByDesc('updated_at');
        $owndata = array();
        if(session()->has('LoggedUser')){
            $owndata = User::where('id','=',session()->get('LoggedUser'))->first();
            // $posts = Post::where('user_id','=',$data->email)->get();'
            if($owndata->id == $id){
                return view('Media.profile', ['posts' => $posts,'data' => $data]);
            }
        }
        return view('Media.xprofile', ['posts' => $posts,'data' => $data]);
    }

    public function editpost($id)
    {
        //
        $post = Post::find($id);
        return view('Media.editpost')->with('post', $post);
    }
    public function updatepost(Request $req,$id){
        //
        $post = Post::find($id);
        // $input = $request->all();
        // $post->update($input);
        $post->textpost = $req->textpost;
        // $post->imagepost = time().'.'.$req->imagepost->extension();
        $post->imagepost = $req->imagepost;
        $post->save();
        return redirect('profile')->with('flash_message', 'Post Updated!');
    }

    //To delete the post
    public function delete($id){
        Post::destroy($id);
        return redirect('profile')->with('flash_message', 'Post is deleted!');
    }

    //To add like
    public function like($id){
        // $data = array();
        // if(session()->has('LoggedUser')){
        //     $data = User::where('id','=',session()->get('LoggedUser'))->first();
        // }

        $post = Post::find($id);
        $post->likes = ($post->likes) + 1;
        $post->save();
        return redirect('home');
        // $user = $data->email;
        // $likes = array();
        // if($post->likes == null){
        //     array_push($likes,$user);
        //     $post->likes = $likes;
        // }
        // else{
        //     $list = $post->likes;
        //     $len = count($list);
        //     for ($i=0; $i < $len; $i++) {
        //         # code...
        //         if($user == $list[$i]){
        //             return $likes;//$post->like;
        //         }
        //         else{
        //             array_push($likes,$list[$i]);
        //             continue;
        //         }
        //     }
        //     array_push($likes,$user);
        //     $post->likes = $likes;//array_unique($likes);
        // }
        // $post->save();
        // return $likes;//$post->likes;
    }
    //To add dislike
    public function dislike($id){
        $post = Post::find($id);
        $post->dislikes = ($post->dislikes) + 1;
        $post->save();


        return redirect('home');

    }
}
