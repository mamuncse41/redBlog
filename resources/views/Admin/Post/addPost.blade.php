@extends('Admin.layouts.master')
@section('post_add','active')
@section('title','add-post')
@section('page_title','Add POST')
@section('content')
<div class="panel panel-widget forms-panel">
    <div class="forms">
        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
                <h4>POST Add :</h4>
                <h3 style="color:green; text-align: center;">{{Session::get('message')}}</h3>
            </div>
            <div class="form-body">
                {!! Form::open(['url'=>'/post/insert','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                <div class="form-group"> 
                    <label for="exampleInputEmail1">POST Title</label> 
                    <input type="text" name="post_title" class="form-control" id="exampleInputEmail1">
                    <span class="text-danger">{{$errors->has('post_title')? $errors->first('post_title'):''}}</span>
                </div>
                <div class="form-group"> 
                    <label for="exampleInputEmail1">Catagory</label> 

                    <select name="catagory_id">

                        <option>Select Catagory Status</option>
                        @foreach($catagoryPublished as $catagory)
                        <option value="{{$catagory->catagory_id}}">{{$catagory->catagory_name}}</option>
                        @endforeach
                    </select>

                </div> 
                                <div class="form-group">
                                    <label for="txtarea1" class="col-sm-2 control-label">Short Description</label>
                                    <textarea name="short_description" id="txtarea1" cols="30" rows="5" ></textarea>
                                    <span class="text-danger">{{$errors->has('short_description')? $errors->first('short_description'):''}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="txtarea1" class="col-sm-2 control-label">Long Description</label>
                                    <textarea name="long_description" id="txtarea1" cols="30" rows="5" ></textarea>
                                    <span class="text-danger">{{$errors->has('long_description')? $errors->first('long_description'):''}}</span>
                                </div>

                                <div class="form-group"> 
                               
                                    <select name="publication_statu">
                                        <option>Select publication Status</option>
                                        <option value="1">published</option>
                                        <option value="0">unpublished</option>

                                    </select>

                                </div> 
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Author Name</label> 
                                    <input type="text" name="author_name" class="form-control" id="exampleInputEmail1">

                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Image </label> 
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                   
                                </div>

                                <button type="submit" class="btn btn-default w3ls-button">Submit</button> 
                                {!! Form::close() !!}
                                </div>
                                </div>
                                </div>
                                </div>

                                @endsection

