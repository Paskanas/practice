@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Edit restorant</h1>
        </div>

        <div class="card-body">
          <ul>
            <form action="{{route('restorants-update', $restorant)}}" method="post">
              {{-- <div class="form-group">
                <label>Pavadinimas</label>
                <input type="text" class="form-control">
                <small class="form-text text-muted">Kažkoks parašymas.</small>
              </div> --}}
              <div class="form-group">
                <label for="color_title">Title</label>
                <input class="form-control" type="text" name="restorant_title" value={{$restorant->title}}>
                <label for="create_color_input">City</label>
                <input class="form-control" type="text" name="restorant_city" value={{$restorant->city}}>
                <label for="create_color_input">Address</label>
                <input class="form-control" type="text" name="restorant_address" value={{$restorant->address}}>
                <label for="create_color_input">Working time</label>
                <input class="form-control" type="text" name="restorant_working_time" value={{$restorant->working_time}}>

              </div>
              @csrf
              @method('put')
              <button class="btn btn-outline-primary mt-4" type="submit">Save</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
