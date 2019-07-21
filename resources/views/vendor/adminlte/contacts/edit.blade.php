@extends('adminlte::page')

@section('title', 'Kushim_Test')

@section('content_header')

@stop

@section('content')
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Contact</h3>
            </div>
              @include('layouts.messages')
              @include('layouts.errors')
            <!-- /.box-header -->
            <div class="box-body">

            <form contact="form" action="{{ route('contact.update',['id' => $contact->id]) }}" enctype="multipart/form-data" method="POST">
              <!-- text input -->
                
              <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="firstName" value ="{{$contact->firstName}}" placeholder="Provide new First Name">
            </div>

            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="lastName" value ="{{$contact->lastName}}" placeholder="Provide new Last Name">
            </div>

            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" class="form-control" name="address" value ="{{$contact->address}}" placeholder="Provide new Address">
            </div>

            <div class="form-group">
                <label for="name">City</label>
                <input type="text" class="form-control" name="city" value ="{{$contact->city}}" placeholder="Provide new City">
            </div>

            <div class="form-group">
                <label for="name">Zip</label>
                <input type="text" class="form-control" name="zip" value ="{{$contact->zip}}" placeholder="Provide new ZIP">
            </div>

            <div class="form-group">
                <label for="name">Country</label>
                <input type="text" class="form-control" name="country" value ="{{$contact->country}}" placeholder="Provide new Country">
            </div>

            <div class="form-group">
                <label for="name">E-mail</label>
                <input type="email" class="form-control" name="email" value ="{{$contact->email}}" placeholder="Provide new E-mail">
            </div>

            <div class="form-group">
                <label for="name">Phone</label>
                <input type="text" class="form-control" name="phone" value ="{{$contact->phone}}" placeholder="Provide new Phone">
            </div>

            <div class="form-group">
                <label for="name">Note (optional)</label>
                <input type="text" class="form-control" name="note" value ="{{$contact->note}}" placeholder="Provide new Note">
            </div>

            <div class="form-group">
                <label>Avatar (optional)</label>
                <input type="file" name="avatar" value ="{{$contact->avatar}}" >
            </div>

            <div class="form-group">
              <label>Select Group</label>
              <select class="form-control select2" name="group_id" data-placeholder="Select new Group" style="width: 100%;">
                  @foreach($groups as $group)
                        @if($contact->group_id == $group->id) 
                            <option value="{{ $group->id }}" selected="selected">{{ $group->name }}</option>
                        @else
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endif
                  @endforeach
                </select>
            </div>
              
            <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Update Contact">
            </div>

            {!! csrf_field() !!}
          </form>
        </div>
        <!-- /.box-body -->
      </div>
@stop
