<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\Post;
use DB;
use Session;

class WellcomeController extends Controller
{
 
    public function index(){
       $allPublishedPost = DB::table('posts')
 
                ->join('catagories', 'posts.catagory_id', '=', 'catagories.catagory_id')
               
                ->where('posts.publication_statu', 1)
                ->orderBy('post_id', 'desc')
                ->select('posts.*', 'catagories.catagory_name')
                ->take(7)
                ->get();
      
       
        return view('frontPage.index',['allPublishedPost'=>$allPublishedPost]);
  
    }
    public function createProtfolios(){
           return view('frontPage.Portfolio.portfolio');
    }
      public function createServices(){
           return view('frontPage.Services.services');
    }
       public function createContact(){
           return view('frontPage.Contact.Contact');
    }
    public function catagoryView($catagory_id){
        $catagoryById=DB::table('posts')
                ->join('catagories', 'posts.catagory_id', '=', 'catagories.catagory_id')
                ->where('posts.catagory_id',$catagory_id)
                   ->where('posts.publication_statu',1)
                ->orderBy('post_id','desc')
                 ->select('posts.*', 'catagories.catagory_name')
                ->get();
               return view('frontPage.Catagory.catagoryContent',['catagoryById'=>$catagoryById]);
    }
    public function postDetails($post_id){
        $post_info = DB::table('posts')
                ->where('post_id', $post_id)
                ->first();
        $updateData = array();
        $updateData['hit_count'] = $post_info->hit_count + 1;
        DB::table('posts')
                ->where('post_id', $post_id)
                ->update($updateData);
        $postDetailsById=DB::table('posts')
                   ->join('catagories', 'posts.catagory_id', '=', 'catagories.catagory_id')
                    ->where('posts.post_id',$post_id)
                    ->select('posts.*', 'catagories.catagory_name')
                 ->first();
             return view('frontPage.PostDetails.PostDetails',['postDetailsById'=>$postDetailsById]);
    }
    public function ajax_like($post_id){
        $post_like = DB::table('posts')
                ->where('post_id', $post_id)
                ->first();
        $updateLike = array();
        $updateLike['like_count'] = $post_like->like_count + 1;
        DB::table('posts')
                ->where('post_id', $post_id)
                ->update($updateLike);
         $post_like = DB::table('posts')
                ->where('post_id', $post_id)
                ->first();
         echo $post_like->like_count;
    }
    public function saveComments(Request $request){
        $data = array();
        $data['post_id'] = $request->post_id;
        $data['user_name'] = $request->user_name;
        $data['comments'] = $request->comments;
        $data['approval_status'] = $request->approval_status;
        $data['created_at'] = date('Y-m-d h:i:s');
        DB::table('comments')
                ->insert($data);
        Session::put('message', 'send your comments to admin for approval!!');
        return Redirect::to('/post_details/'.$data['post_id']);
    }
}
