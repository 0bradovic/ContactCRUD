@extends('adminlte::page')

@section('title', 'Kushim_Test')

@section('content_header')

@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
            <div>{{ $groups->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$groups->firstItem()}} to {{$groups->lastItem()}} groups of {{$groups->total()}}</div><br>
          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Groups</h3>
              @include('layouts.messages')
              @include('layouts.errors')
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($groups as $group)
                <tr>
                  <td>{{ $group->id }}</td>
                  <td>{{ $group->name }}</td>
                  <td>{{ $group->created_at->toFormattedDateString() }}</td>
                  <td>{{ $group->updated_at->toFormattedDateString() }}</td>
                  <td><a href="{{ route('group.edit',['id' => $group->id]) }}"><i class="fa fa-pencil"></i></a></td>
                  <td><a href="{{ route('group.delete',['id' => $group->id]) }}"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>{{ $groups->appends(Request::except('page'))->links() }}</div>
          <div>Shows {{$groups->firstItem()}} to {{$groups->lastItem()}} groups of {{$groups->total()}}</div>
          <!-- /.box -->
        </div>
@stop