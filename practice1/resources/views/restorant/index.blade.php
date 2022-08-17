@extends('Layouts.app')


@section('content')
<div class="container mt-4 w-80">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Restorants</h1>
          {{-- <div>
            <a class="btn btn-outline-primary m-2" href="{{route('restorant-index', ['sort'=>'asc'])}}">A_Z</a>
          <a class="btn btn-outline-primary m-2" href="{{route('restorant-index', ['sort'=>'desc'])}}">Z_A</a>
          <a class="btn btn-outline-primary m-2" href="{{route('restorant-index')}}">Reset</a>
        </div> --}}
      </div>

      <div class="card-body">

        <ul class="list-group">
          @forelse($restorants as $restorant)
          <li class="list-group-item">
            <div class="color-bin">
              <div class="color-box" {{-- style="background: {{$color->color}};" --}}>
                {{-- {{$color->color}} --}}
                <h2>{{$restorant->title}}</h2>
              </div>

              <div class="controls">
                <a class="btn btn-outline-primary m-2" href="{{route('restorants-show', $restorant->id)}}">SHOW</a>
                @if(Auth::user()->role >9)
                <a class="btn btn-outline-success m-2" href="{{route('restorants-edit', $restorant)}}">EDIT</a>
                <form class="delete" action="{{route('restorants-delete', $restorant)}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-outline-primary m-2" type="submit">Destroy</button>
                </form>
                @endif
              </div>
            </div>
          </li>
          @empty
          <li class="list-group-item">No colors, no life in color world</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
