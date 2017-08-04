@extends('Admin.layouts.master')
@section('title','manage-Post')
@section('page_title','Manage Post')
@section('content')
<div class="table-heading">
    <h2>Manage POST</h2>
</div>
<div class="agile-tables">
    <div class="w3l-table-info">
        <h3 style="color:red; text-align: center">{{Session::get('message')}}</h3>
        <table id="table">
            <thead>
                <tr>
                    <th width='5'>ID</th>
                    <th width='15'>Post Title</th>
                 
                    <th width='5'>Publication Status</th>
                   <th width='35'>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($managePost as $postList)
                <tr>
                    <td>{{$postList->post_id}}</td>
                    <td>{{$postList->post_title}}</td>
                   
                    <td>{{$postList->publication_statu==1?'published':'Unpublished'}}</td>
                
        
                    <td>
                        <?php if ($postList->publication_statu== 1) { ?>
                            <a href="{{url('/unpublished-post/'.$postList->post_id)}}"class="btn btn-danger">
                                <span class="glyphicon glyphicon-thumbs-down" title="Unpublished"></span>
                            </a>
                        <?php } else { ?>
                            <a href="{{url('/published-post/'.$postList->post_id)}}"class="btn btn-success">
                                <span class="glyphicon glyphicon-thumbs-up" title="published"></span>
                            </a>
                        <?php } ?>
                         <a href="{{url('/show-post/'.$postList->post_id)}}"class="btn btn-info">
                            <span class="glyphicon glyphicon-eye-open" title="Show"></span>
                        </a>

                        <a href="{{url('/update-post/'.$postList->post_id)}}"class="btn btn-info">
                            <span class="glyphicon glyphicon-edit" title="Update"></span>
                        </a>
                        <a onclick="return confirm('Are you sure to Delete!!')"; href="{{url('/delete-post/'.$postList->post_id)}}"class="btn btn-danger"/>
                        <span class="glyphicon glyphicon-trash" title="Delete"></span>
                        </a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="text-center">
           
        </div>

    </div>
</div>

@endsection



