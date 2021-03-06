@extends('layouts.admin')



@section('content')

    <h1>Edit users</h1>
    {!! Form::model($user,['method'=>'PATCH','action' => ['AdminUsersController@update',$user->id] ,'files'=>true]) !!}
    {{--                            <div class="form-group">--}}
    {{--                                {!! Form::file('file',['class'=>'form-control'] ) !!}--}}
    {{--                            </div>--}}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null ,['class'=>'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null ,['class'=>'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status','Status:') !!}
        {!! Form::select('Status', ['0' => 'Non active', '1' => 'Active'], 'S'); !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',$arrayOfRolesNames );!!}

    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',$arrayOfRolesNames );!!}

    </div>
    <div class="form-group">
        {!! Form::label('file','File') !!}
        {!! Form::file('photo_id',$arrayOfRolesNames );!!}

    </div>

    <div class="form-group">
        {!! Form::submit('Create User ',['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}
       {!! Form::open(['method'=>'DELETE','action' => ['AdminUsersController@destroy',$user->id] ,'files'=>true]) !!}

                       <div class="form-group">
                           {!! Form::submit('Delete User ',['class'=>'btn btn-danger']) !!}

                       </div>
    @include('includes.form_error')
@stop