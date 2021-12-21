@extends('layouts.admin')



@section('content')

 <h1>create users</h1>
    {!! Form::open(['method'=>'POST','action' => 'AdminUsersController@store' ,'files'=>true]) !!}
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
                                 {!! Form::select('is_active', ['0' => 'Non active', '1' => 'Active']); !!}
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
   @include('includes.form_error')
@stop