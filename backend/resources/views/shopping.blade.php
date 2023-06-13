@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Shopping</h1>
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
    <use xlink:href="#exclamation-triangle-fill" />
  </svg>
  <div>
    <div>
      {{ session('error') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if (session('destroy'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div>
        <div>
          {{ session('destroy') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div>
        <div>
          {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session('edited'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
          </svg>
          <div>
            {{ session('edited') }}
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
@stop

@section('content')
<table id="shopping" class="table">
    <div class="text-right">
        <a href="{{ route('shopping.create') }}" class="btn btn-lg btn-success mb-2">Create</a>
    </div>
    <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>USER_ID</th>
            <th>PRODUCT_ID</th>
            <th>OPTIONS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shopping as $s)
        <tr>
            <td>{{ $s->id }}</td>
        @foreach ($us as $usuario)
            @if ($usuario->id == $s->user_id)
                <td>{{ $usuario->name }}</td>
            @endif
        @endforeach

        @foreach ($product as $producto)
            @if ($producto->id == $s->product_id)
                <td>{{ $producto->name }}</td>
            @endif
        @endforeach
           
            <td>
                <a href="{{ route('shopping.edit', $s->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('shopping.destroy', $s->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta compra?')">DESTROY</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script> console.log('Hi!'); </script>

    <script>
        $(document).ready(function () {
            $('#shopping').DataTable();
        });
    </script>
@stop