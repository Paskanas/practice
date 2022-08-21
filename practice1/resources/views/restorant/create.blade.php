@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New restorant</h1>
        </div>
        <div class="card-body">
          <ul>
            <form action="{{route('restorants-store')}}" method="post">
              <label for="restorant_title">Title</label>
              <input class="form-control" type="text" required name="restorant_title">
              <label for="restorant_city">City</label>
              <input class="form-control" type="text" required name="restorant_city">
              <label for="restorant_address">Address</label>
              <input class="form-control" type="text" required name="restorant_address">
              <label for="restorant_working_time">Working time</label>
              <input class="form-control" type="text" required name="restorant_working_time">
              @csrf
              <button class="btn btn-outline-primary mt-4" type="submit">New restorant</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
