@extends('Admin.layouts.master')
@section('title','Show-Post')
@section('page_title','Show Post')
@section('content')
<div class="table-heading">
    <h2>Show POST</h2>
</div>
<div class="agile-tables">
    <div class="w3l-table-info">
       
        <table id="table">
            <thead>
                <tr>
                    <th width='5'>ID</th>
                    <th width='15'>Post Title</th>
                    <th width='40'>Catagory Name</th>
                    <th width='5'>short_description</th>
                    <th width='5'>Long_description</th>
                    <th width='5'>Author Name</th>
                    <th width='5'>Image</th>
                    <th width='5'>Publication Status</th>
              

                </tr>
            </thead>
            <tbody>
             
                <tr>
                    <td>{{$showPost->post_id}}</td>
                    <td>{{$showPost->post_title}}</td>
                    <td>{{$showPost->catagory_name}}</td>
                    <td>{{$showPost->short_description}}</td>
                    <td>{{$showPost->long_description}}</td>
                    <td>{{$showPost->author_name}}</td>
                    <td><img src="{{asset($showPost->post_image )}}" alt="{{$showPost->post_title}}" hight="150" width="150" ></td>
                    <td>{{$showPost->publication_statu==1?'published':'Unpublished'}}</td>
                
            </tbody>
        </table>
        <hr/>
        <div class="text-center">
            <a href="{{url('/manage-post')}}"><span style="color:blue;font-size: 20px;"class="glyphicon glyphicon-menu-left">Back</span></a>
        </div>

    </div>
</div>

@endsection





