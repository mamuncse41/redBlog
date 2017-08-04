@extends('frontPage.layouts.master')
@section('title','redBlog-index')
@section('page_title','Home Page')
@section('content')

<div class="post_section">
            
            	<div class="post_date">
                	<span></span>
            	</div>
<div class="post_content">
                
                    <h3>{{$postDetailsById->post_title}}</h3>
                    <span style="color:red;font-size:15px">Like(<span id="res">{{$postDetailsById->like_count}}</span>)</span><button onclick="like_update({{$postDetailsById->post_id}},'res')">Like</button>
                    <strong>Author:</strong>{{$postDetailsById->author_name}} | <strong>Category:</strong> <a href="{{url('/catagory_view/'.$postDetailsById->catagory_id)}}">{{$postDetailsById->catagory_name}}</a>, <a href="#">{{$postDetailsById->created_at}}</a>
                    ||<strong>Total Hit:</strong>{{$postDetailsById->hit_count}}
                    <a href=""><img src="{{asset($postDetailsById->post_image)}}" alt="image" width="500" /></a>
                    
                        <p>{{$postDetailsById->long_description }}</p>
                        </div>
                <div class="cleaner"></div>
            </div>

<br/>
  @if (Auth::guest())
  <h3><a href="{{url('/login')}}">Please Register Or Login Your Comments</a></h3>
  @else
  <h2>
      <?php
      $message=Session::get('message');
      if('message'){
          echo $message;
          Session::put('message');
      }
      ?>
  </h2>
    <form method="POST" action="{{url('/save-comments')}}">
          {{ csrf_field() }}
          <table>
             
              <tr>
                  <td>Post Your Comments</td>
              </tr>
              <hr/>
              <tr>
                  <td>
                      <textarea name="comments" rows="6" cols="40"></textarea>
                      <input type="hidden" name="post_id" value="{{$postDetailsById->post_id}}">
                      <input type="hidden" name="user_name" value=" {{ Auth::user()->name }}">
                  </td>
              </tr>
              <tr>
                  <td>
                      <input type="submit" name="btn" value="post">
                  </td>
              </tr>
               
          </table>
        
    </form>
       
      @endif     

@endsection
