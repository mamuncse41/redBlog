@extends('Admin.layouts.master')
@section('catagory_Edit','active')
@section('title','edit-catagory')
@section('page_title','Update Catagory')
@section('content')
<div class="panel panel-widget forms-panel">
    <div class="forms">
        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
                <h4>Catagory Add :</h4>
                <h3 style="color:green; text-align: center;">{{Session::get('message')}}</h3>
            </div>
            <div class="form-body">
                {!! Form::open(['url'=>'/catagory/update','method'=>'post','name'=>'publishedUpdate'])!!}
                    <div class="form-group"> 
                        <label for="exampleInputEmail1">Catagory Name</label> 
                        <input type="text" name="catagory_name" class="form-control" id="exampleInputEmail1" value="{{$catagoryById->catagory_name}}">
                        <input type="hidden" name="catagory_id" class="form-control"  value="{{$catagoryById->catagory_id}}">
             
                    </div> 
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Catagory Description</label>
                        <textarea name="catagory_description" id="txtarea1" cols="30" rows="5" >{{$catagoryById->catagory_description}}</textarea>
                       
                    </div>

                    <div class="form-group"> 

                        <select name="publication_status">
                            <option>Select publication Status</option>
                            <option value="1">published</option>
                            <option value="0">Unpublished</option>
                        </select>

                    </div> 

                    <button type="submit" class="btn btn-default w3ls-button">Update</button> 
          {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['publishedUpdate'].elements['publication_status'].value={{$catagoryById->publication_status}}
 </script>
@endsection

