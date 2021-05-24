@extends('layouts.master')
@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <br />
    <h3 class="display-5 text-center">Add New Cat Details</h3>
    <div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <br />
      @endif
      <form method="post" action="{{ route('cats.store') }}">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
          <label for="date_of_birth">Date</label>
          <input id="date" class="form-control
          datepicker" name="date_of_birth"/>
        </div>
        <div class="row justify-content-center">
          <a href="{{ route('cats.index')}}" class="btn btn-primary">
            Return</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary textcenter">
              Save Details</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection