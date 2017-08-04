@extends('frontPage.layouts.master')
@section('title','redBlog-index')
@section('page_title','Home Page')
@section('content')
@foreach($allPublishedPost as $post)
<div class="post_section">
            
            	<div class="post_date">
                	<span></span>
            	</div>
<div class="post_content">
                
                    <h3><a href="{{url('/post_details/'.$post->post_id)}}">{{$post->post_title}}</a></h3>

                    <strong>Author:</strong>{{$post->author_name}} | <strong>Category:</strong> <a href="{{url('/catagory_view/'.$post->catagory_id)}}">{{$post->catagory_name}}</a>, <a href="#">{{$post->created_at}}</a>
                    
                    <a href="{{url('/post_details/'.$post->post_id)}}"><img src="{{asset($post->post_image)}}" alt="image" width="500" /></a>
                    
                        <p>{{$post->short_description}}</p>
                    <p><a href="blog_post.html">24 Comments</a> | <a href="{{url('/post_details/'.$post->post_id)}}">Continue reading...</a></p>
</div>
                <div class="cleaner"></div>
               
            </div>
                
           
@endforeach
@endsection