@extends('adminlte::page')

@section('title', 'Kushim_Test')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Contact</h3>
        </div>
        @include('layouts.errors')
        @include('layouts.messages')
        <!-- /.box-header -->
        <!-- form start -->
        <form contact="form" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
          <div class="box-body">
          
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="firstName" placeholder="Provide First Name">
            </div>

            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Provide Last Name">
            </div>

            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Provide Address">
            </div>

            <div class="form-group">
                <label for="name">City</label>
                <input type="text" class="form-control" name="city" placeholder="Provide city">
            </div>

            <div class="form-group">
                <label for="name">Zip</label>
                <input type="text" class="form-control" name="zip" placeholder="Provide ZIP">
            </div>

            <div class="form-group">
                <label for="name">Country</label>
                <input type="text" class="form-control" name="country" placeholder="Provide Country">
            </div>

            <div class="form-group">
                <label for="name">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Provide E-mail">
            </div>

            <div class="form-group">
                <label for="name">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Provide Phone">
            </div>

            <div class="form-group">
                <label for="name">Note</label>
                <input type="text" class="form-control" name="note" placeholder="Provide Note (optional)">
            </div>

            <div class="form-group">
                <label>Avatar</label>
                <input type="file" name="avatar">
            </div>

            <div class="form-group">
              <label>Select Group</label>
              <select class="form-control select2" name="group_id" data-placeholder="Select Group" style="width: 100%;">
                  @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                  @endforeach
                </select>
            </div>
       
          </div>

          {!! csrf_field() !!}
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Contact</button>
          </div>
        </form>
      </div>
    </div>
    </div>
@stop