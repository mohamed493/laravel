@extends('layouts.admin')


<h1>Create Posts</h1>

   {!! Form::open(['method'=>'POST','action' => 'AdminPostsController@store' ,'files'=>true]) !!}

                           <div class="form-group">
                               {!! Form::label('title','Title:') !!}
                               {!! Form::text('title',null ,['class'=>'form-control'] ) !!}
                           </div>
                            <div class="form-group">
                                {!! Form::label('category_id','Category:') !!}
                                {!! Form::select('category_id', $categories); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('file','File') !!}
                                {!! Form::file('photo_id' );!!}
                </div>
                            <div class="form-group">
                                {!! Form::label('description','Description:') !!}
                                {!! Form::textarea('body',null ,['class'=>'form-control' ] ) !!}
                            </div>
                   <div class="form-group">
                       {!! Form::submit('Create Post ',['class'=>'btn btn-primary']) !!}
                   </div>



    @include('includes.form_error')
