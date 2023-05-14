@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2 class="text-center">Type user data</h2>
@stop

@section('content')
<div class="container rounded p-3">
    <form action="{{ route('users.store') }}" class="row g-3 p-3" method="POST">
      @csrf
      @method('POST')
      <div class="col-md-4">
        <label htmlFor="validationServer01">Name</label>
        <input type="text"
          placeholder="Albert"
          class="form-control is-valid"
          name="name"
          pattern="^([A-Z][a-z]+)"
        />
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer02">Middle name</label>
        <input
          placeholder="Smith"
          type="text"
          class="form-control"
          name="middle_name"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer03" class="form-label">Last name</label>
        <input
          placeholder="Becker"
          type="text"
          name="last_name"
          class="form-control"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer04" class="form-label">Username</label>
        <input
          placeholder="Kirito_Dev4"
          type="text"
          class="form-control"
          name="username"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer04" class="form-label">Password</label>
        <input
          name="password"
          type="password"
          class="form-control"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer06" class="form-label">Email</label>
        <input
          placeholder="Nomercy@gmail.com"
          type="email"
          class="form-control"
          name="email"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer07" class="form-label">Country</label>
        <input
          placeholder="Germany"
          type="text"
          class="form-control"
          name="country"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer08" class="form-label">City</label>
        <input
          placeholder="Berlin"
          type="text"
          class="form-control"
          name="city"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer09" class="form-label">State</label>
        <input
          placeholder="Belrock"
          name="state"
          type="text"
          class="form-control"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer10" class="form-label">Street</label>
        <input
          placeholder="Yolerium"
          type="text"
          class="form-control"
          name="street"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer11" class="form-label">Neighborhood</label>
        <input
          placeholder="New angels"
          type="text"
          class="form-control"
          name="neighborhood"
        />
      </div>
      <div class="col-md-6">
        <label htmlFor="validationServer12" class="form-label">Number</label>
        <input
          placeholder="27"
          type="number"
          name="number"
          class="form-control"
        />
      </div>
      <div class="col-md-6">
        <label htmlFor="validationServer13" class="form-label">Postal code</label>
        <input
          placeholder="23150"
          type="text"
          class="form-control"
          name="postal_code"
        />
      </div>
      <div class="col-12 mt-5 text-center">
        <button class="btn btn-primary w-100" type="submit">Create</button>
      </div>
    </form>
  </div>
@stop

@section('css')
@stop

@section('js')
@stop