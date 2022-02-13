<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function post_list(){
        $posts=Post::with('user')->OrderBy('id','desc')->get();
        return view('posts.post_list')->with('posts',$posts);  
    }

    public function post_details($encrypted_id){
        
        $id=\base64_decode($encrypted_id);
        $post=Post::where('id',$id)->with('user')->first();
        //Related posts
        $related_posts=Post::where('category',$post->category)->where('id','!=',$id)->limit(3)->inRandomOrder()->get(); 
        return view('posts.post_details')->with([
            'post'=>$post,
            'related_posts'=>$related_posts,
        ]);  
    }

    public function create_post(){
        if(Auth::check()){
            return view('posts.create_post');
        }
        else{
            return Redirect::Route('login')->with(
                'warning',
                'This page require Authentication'
            ); 
        }
    }

    public function post_submit(Request $post_data){
        if(Auth::check()){
            //validate data 
            $validated = $post_data->validate([
                'title' => 'required',
                'category' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            //----Store image----
            if ($post_data->hasFile('image')) {
                $random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
                $image_name=$random.$post_data->image->getClientOriginalName();
                $post_data->image->storeAs('img/posts',$image_name,'public');    
            }
            else{
                $image_name="general_image.png";
            }
            //-------------------
            $create_post=Post::create([
                'title'=>$post_data->title,
                'category'=>$post_data->category,
                'content'=>$post_data->content,
                'author'=>Auth::user()->id,
                'image'=>$image_name,
           ]);
           if($create_post){
                return Redirect::Route('post_list')->with(
                    'success',
                    'Post created successfully.'
                );  
           }
           else{
                return Redirect::Route('create_post')->with(
                    'fail',
                    'Operation failed, Please try again'
                );     
           }
        }
        else{
            return Redirect::Route('login')->with(
                'warning',
                'This page require Authentication'
            ); 
        }
    }

    public function edit_post($encrypted_id){
          
        $decrypted_id=\base64_decode($encrypted_id);
        $post=Post::where('id',$decrypted_id)->with('user')->first();
        return view('posts.edit_post')->with('post',$post);  
    }

    public function update_post_data(Request $request,$encrypted_id){
    if(Auth::check()){
        $validated = $request->validate([ //Validate post data first
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $id=\base64_decode($encrypted_id);
        $current_image=Post::where('id',$id)->pluck('image')->first(); //get name of current post image.

        if ($request->hasFile('image')) { //check if new image selected.
            $validated = $request->validate([ // validate image
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            //Delete old image--
            $delete_image=Storage::delete('/public/img/posts/'.$current_image);
            //Upload new image--
            $random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $image_name=$random.$request->image->getClientOriginalName();
            $request->image->storeAs('img/posts',$image_name,'public');    
        }
        else{
            //retain current image name if no new image selected.
            $image_name= $current_image;
        }
        
        $update=Post::find($id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'category'=>$request->category,
            'image'=>$image_name,
        
        ]);

        if($update){
            return Redirect::back()->with(
                'success',
                'Post updated successfully!'
            ); 
        }
        else{
            return Redirect::back()->with(
                'fail',
                'Something went wrong, please try again'
            );   
        } 
        
        }
    else{
            return Redirect::Route('login')->with('warning','This operation requires Authentication');   
        }    
    }

    public function delete_post($encrypted_id){
        if(Auth::check()){
        $id=\base64_decode($encrypted_id);
        //Delete post image on storage
        $image=Post::where('id',$id)->pluck('image')->first();
        Storage::delete('/public/img/posts/'.$image);
        Post::find($id)->delete();

        return Redirect::route('post_list')->with( 'success','Post deleted successfully!'); 
        }
        else{
            return Redirect::Route('login')->with('warning','This operation requires Authentication');   
        }

    }

    public function post_by_category($category){
        $posts=Post::with('user')->where('category',$category)->OrderBy('id','desc')->get();
        return view('posts.post_by_category')->with(['posts'=>$posts,'category'=>$category]);  
    }

    public function post_by_author($id,$author){
        $author_id=\base64_decode($id);
        $author_name=\base64_decode($author);
        $posts=Post::with('user')->where('author',$author_id)->OrderBy('id','desc')->get();
        return view('posts.post_by_author')->with(['posts'=>$posts,'author'=>$author_name]);  
    }





}
