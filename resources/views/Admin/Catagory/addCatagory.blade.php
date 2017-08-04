@extends('Admin.layouts.master')
@section('catagory_add','active')
@section('title','add-catagory')
@section('page_title','Add Catagory')
@section('content')
<div class="panel panel-widget forms-panel">
    <div class="forms">
        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
                <h4>Catagory Add :</h4>
                <h3 style="color:green; text-align: center;">{{Session::get('message')}}</h3>
            </div>
            <div class="form-body">
                {!! Form::open(['url'=>'/catagory/insert','method'=>'post'])!!}
                    <div class="form-group"> 
                        <label for="exampleInputEmail1">Catagory Name</label> 
                        <input type="text" name="catagory_name" class="form-control" id="exampleInputEmail1">
                        <span class="text-danger">{{$errors->has('catagory_name')? $errors->first('catagory_name'):''}}</span>
                    </div> 
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Catagory Description</label>
                        <textarea name="catagory_description" id="txtarea1" cols="30" rows="5" ></textarea>
                        <span class="text-danger">{{$errors->has('catagory_description')? $errors->first('catagory_description'):''}}</span>
                    </div>

                    <div class="form-group"> 

                        <select name="publication_status">
                            <option>Select publication Status</option>
                            <option value="1">published</option>
                            <option value="0">Unpublished</option>
                        </select>

                    </div> 

                    <button type="submit" class="btn btn-default w3ls-button">Submit</button> 
          {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection