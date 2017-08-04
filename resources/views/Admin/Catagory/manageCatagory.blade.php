@extends('Admin.layouts.master')
@section('title','manage-catagory')
@section('page_title','Manage Catagory')
@section('content')
<div class="table-heading">
    <h2>Manage Catagory</h2>
</div>
<div class="agile-tables">
    <div class="w3l-table-info">
        <h3 style="color:red; text-align: center">{{Session::get('message')}}</h3>
        <table id="table">
            <thead>
                <tr>
                    <th width='5'>ID</th>
                    <th width='15'>Catagory Name</th>
                    <th width='40'>Catagory Description</th>
                    <th width='5'>Publication Status</th>
                    <th width='35'>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($catagories as $catagory)
                <tr>
                    <td>{{$catagory->id}}</td>
                    <td>{{$catagory->catagory_name}}</td>
                    <td>{{$catagory->catagory_description}}</td>
                    <td>{{$catagory->publication_status==1?'published':'Unpublished'}}</td>
                    <td>
                        <?php if ($catagory->publication_status == 1) { ?>
                            <a href="{{url('/unpublished-catagory/'.$catagory->catagory_id)}}"class="btn btn-danger">
                                <span class="glyphicon glyphicon-thumbs-down" title="Unpublished"></span>
                            </a>
                        <?php } else { ?>
                            <a href="{{url('/published-catagory/'.$catagory->catagory_id)}}"class="btn btn-success">
                                <span class="glyphicon glyphicon-thumbs-up" title="published"></span>
                            </a>
                        <?php } ?>

                        <a href="{{url('/update-catagory/'.$catagory->catagory_id)}}"class="btn btn-info">
                            <span class="glyphicon glyphicon-edit" title="Update"></span>
                        </a>
                        <?php
                        $access_label=Session::get('access_label');
                        if($access_label==1){ 
                        ?>
                        <a onclick="return confirm('Are you sure to Delete!!')"; href="{{url('/delete-catagory/'.$catagory->catagory_id)}}"class="btn btn-danger"/>
                        <span class="glyphicon glyphicon-trash" title="Delete"></span>
                        </a>
                        <?php } ?>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <small style="color:brown; font-size:20">{{$catagories->links()}}</small>
        </div>

    </div>
</div>

@endsection

