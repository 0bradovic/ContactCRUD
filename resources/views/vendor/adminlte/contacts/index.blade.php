@extends('adminlte::page')

@section('title', 'Kushim_Test')

@section('content_header')

@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
            <div>{{ $contacts->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$contacts->firstItem()}} to {{$contacts->lastItem()}} contacts of {{$contacts->total()}}</div><br>
          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Contacts</h3>
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
                  <th>Avatar</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Zip</th>
                  <th>Country</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Note</th>
                  <th>Group</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($contacts as $contact)
                <tr>
                  <td>{{ $contact->id }}</td>
                  <td>@if($contact->avatar) <img src="{{$contact->avatar}}" style="width:50px;height:50px;"> @else <i>No avatar</i> @endif </td>
                  <td>{{ $contact->firstName }}</td>
                  <td>{{ $contact->lastName }}</td>
                  <td>{{ $contact->address }}</td>
                  <td>{{ $contact->city }}</td>
                  <td>{{ $contact->zip }}</td>
                  <td>{{ $contact->country }}</td>
                  <td>{{ $contact->email }}</td>
                  <td>{{ $contact->phone }}</td>
                  <td>{{ $contact->note }}</td>
                  <td>@if($contact->group) {{ $contact->group->name }} @else <i>No Group</i> @endif</td>
                  <td>{{ $contact->created_at->toFormattedDateString() }}</td>
                  <td>{{ $contact->updated_at->toFormattedDateString() }}</td>
                  <td><a href="{{ route('contact.edit',['id' => $contact->id]) }}"><i class="fa fa-pencil"></i></a></td>
                  <td><a href="{{ route('contact.delete',['id' => $contact->id]) }}"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>{{ $contacts->appends(Request::except('page'))->links() }}</div>
          <div>Shows {{$contacts->firstItem()}} to {{$contacts->lastItem()}} contacts of {{$contacts->total()}}</div>
          <!-- /.box -->
        </div>
@stop