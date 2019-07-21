@extends('adminlte::page')

@section('title', 'Kushim_Test')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Group</h3>
        </div>
        @include('layouts.errors')
        @include('layouts.messages')
        <!-- /.box-header -->
        <!-- form start -->
        <form group="form" action="{{ route('group.store') }}" method="POST">
          <div class="box-body">
          
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Provide Name">
            </div>

          </div>
          {!! csrf_field() !!}
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Group</button>
          </div>
        </form>
      </div>
    </div>
    </div>
@stop