@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New dish</h1>
        </div>

        <div class="card-body">
          <ul>
            <form action="{{route('dishes-store')}}" method="post">
              <div class="form-group">
                <label for="color_title">Title</label>
                <input class="form-control" type="text" name="dish_title" value="{{old('create_color_input')}}">
                <label for="create_color_input">City</label>
                <input class="form-control" type="text" name="dish_city" value="{{old('color_title')}}">
                <label for="create_color_input">Address</label>
                <input class="form-control" type="text" name="dish_address" value="{{old('color_title')}}">
                <label for="create_color_input">Working time</label>
                <input class="form-control" type="text" name="dish_working_time" value="{{old('color_title')}}">

              </div>
              @csrf
              {{-- @method('post') --}}
              <button class="btn btn-outline-primary mt-4" type="submit">New restorant</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
