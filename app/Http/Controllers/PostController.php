<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use DB;

use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function indexPost(){
        $catagoryPublished=DB::table('catagories')
                ->where('publication_status',1)
                ->get();
        return view('Admin.Post.addPost',['catagoryPublished'=>$catagoryPublished]);
    }
    public function insertPost(Request $request) {
//        dd($request->all());
//        exit();
        $this->validate($request, ['post_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required'
        ]);
        $postImage = $request->file('post_image');
        $imageExtension = $postImage->getClientOriginalExtension();
        $imageName = strtolower($request->post_title) . '.' . $imageExtension;
        //return $imageName;
        $uploadPath = 'public/postImage/';
        $postImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->savePostInfo($request, $imageUrl);
        return redirect('/add-post')->with('message', 'Successfully Post Saved');
    }

    protected function savePostInfo($request, $imageUrl) {
        $postAll = new Post();
        $postAll->post_title = $request->post_title;
        $postAll->catagory_id = $request->catagory_id;
        $postAll->short_description = $request->short_description;
        $postAll->long_description = $request->long_description;
        $postAll->publication_statu = $request->publication_statu;
        $postAll->author_name = $request->author_name;
        $postAll->post_image = $imageUrl;
        $postAll->save();
    }
    public function managePost(){
        $managePost=Post::all();
        return view('Admin.Post.managePost',['managePost'=>$managePost]);
    }
    public function unpublishedPost($id){
        Post::where('post_id',$id)
                ->update(['publication_statu'=>0]);
            return redirect('/manage-post');
        
    }
    public function publishedPost($id){
        Post::where('post_id',$id)
                ->update(['publication_statu'=>1]);
          return redirect('/manage-post');
    }
    public function deletePost($id){
        $deletePost=Post::where('post_id',$id);
            $deletePost->delete();     
       return redirect('/manage-post')->with('message','Successfully Deleted Post');
        
    }
    public function showPost($id){
        $showPost = DB::table('posts')
                ->join('catagories', 'posts.catagory_id', '=', 'catagories.catagory_id')
                ->select('posts.*', 'catagories.catagory_name')
                 ->where('posts.post_id',$id)
                ->first();
        return view('Admin.Post.viewPost',['showPost'=>$showPost]);
    }
    public function postUpdate($id){
        $updatePostById=Post::where('post_id',$id)->first();
        return view('Admin.Post.postEdit',['updatePostById'=>'$updatePostById']);
        
    }
   
}
