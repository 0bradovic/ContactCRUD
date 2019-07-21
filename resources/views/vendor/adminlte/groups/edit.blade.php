@extends('adminlte::page')

@section('title', 'Kushim_Test')

@section('content_header')

@stop

@section('content')
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Group</h3>
            </div>
              @include('layouts.messages')
              @include('layouts.errors')
            <!-- /.box-header -->
            <div class="box-body">

            <form group="form" action="{{ route('group.update',['id' => $group->id]) }}" method="POST">
              <!-- text input -->
                
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value ="{{$group->name}}" placeholder="Provide new Name">
            </div>
              
            <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Update Group">
            </div>

            {!! csrf_field() !!}
          </form>
        </div>
        <!-- /.box-body -->
      </div>
@stop
