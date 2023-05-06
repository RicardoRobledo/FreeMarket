@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
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
            <td>{{ $s->user_id }}</td>
            <td>{{ $s->product_id }}</td>
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