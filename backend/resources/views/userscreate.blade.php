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
          class="form-control"
          name="name"
          minlength="2"
          maxlength="5"
          pattern="^([A-Z][a-z]+)$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer02">Middle name</label>
        <input
          placeholder="Smith"
          type="text"
          class="form-control"
          name="middle_name"
          minlength="3"
          maxlength="20"
          pattern="^[A-Z][a-z]+(([\s]{0,1}([a-z]{2}))([\s]{0,1}[a-z]+){0,1}){0,1}$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer03" class="form-label">Last name</label>
        <input
          placeholder="Becker"
          type="text"
          class="form-control"
          name="last_name"
          minlength="3"
          maxlength="20"
          pattern="^[A-Z][a-z]+(([\s]{0,1}([a-z]{2}))([\s]{0,1}[a-z]+){0,1}){0,1}$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer04" class="form-label">Username</label>
        <input
          placeholder="Kirito_Dev4"
          type="text"
          class="form-control"
          name="username"
          minlength="5"
          maxlength="15"
          pattern="^[\S]+$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer04" class="form-label">Password</label>
        <input
          name="password"
          type="password"
          minlength="8"
          maxlength="30"
          class="form-control"
          pattern="^[\S]+$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer06" class="form-label">Email</label>
        <input
          placeholder="Nomercy@gmail.com"
          type="email"
          class="form-control"
          name="email"
          pattern="^([a-zA-z0-9]+)((\.|[0-9]+|[a-zA-z])+)*@gmail.com$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer07" class="form-label">Country</label>
        <input
          placeholder="Germany"
          type="text"
          class="form-control"
          name="country"
          pattern="^([A-Z][a-z]+)([\s][a-z]+)*$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer08" class="form-label">City</label>
        <input
          placeholder="Berlin"
          type="text"
          class="form-control"
          name="city"
          pattern="^([A-Z][a-z]+)([\s][a-z]+)*$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer09" class="form-label">State</label>
        <input
          placeholder="Belrock"
          name="state"
          type="text"
          class="form-control"
          pattern="^([A-Z][a-z]+)([\s][a-z]+)*$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer10" class="form-label">Street</label>
        <input
          placeholder="Yolerium"
          type="text"
          class="form-control"
          name="street"
          pattern="^([A-Z][a-z]+)([\s][a-z]+)*$"
          required
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer11" class="form-label">Neighborhood</label>
        <input
          placeholder="New angels"
          type="text"
          class="form-control"
          name="neighborhood"
          pattern="^([A-Z][a-z]+)([\s][a-z]+)*$"
          required
        />
      </div>
      <div class="col-md-6">
        <label htmlFor="validationServer12" class="form-label">Number</label>
        <input
          placeholder="27"
          type="number"
          name="number"
          class="form-control"
          pattern="^[0-9]{1,2}$"
          required
        />
      </div>
      <div class="col-md-6">
        <label htmlFor="validationServer13" class="form-label">Postal code</label>
        <input
          placeholder="23150"
          type="text"
          class="form-control"
          name="postal_code"
          maxlength="5"
          pattern="^[0-9]{5}$"
          required
        />
      </div>
      <div class="col-12 mt-5 text-center">
        <button class="btn btn-primary w-100" onclick="validarFormulario(e)" type="submit">Create</button>
      </div>
    </form>
  </div>
@stop

@section('css')
@stop

@section('js')
<script>
function validarFormulario(event) {
  event.preventDefault(); // Evitar el envío del formulario
  // Obtener referencia al formulario
  var form = document.getElementById("myForm");

  // Obtener los valores de los campos del formulario
  var name = document.getElementById("name").value;
  var middleName = document.getElementById("middle_name").value;
  var lastName = document.getElementById("last_name").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var country = document.getElementById("country").value;
  var city = document.getElementById("city").value;
  var state = document.getElementById("state").value;
  var street = document.getElementById("street").value;
  var neighborhood = document.getElementById("neighborhood").value;
  var postalCode = document.getElementById("postal_code").value;

  // Expresiones regulares para validar cada campo
  var nameRegex = /^[a-zA-Z0-9 ()]+$/;
  var middleNameRegex = /^[a-zA-Z]+$/;
  var lastNameRegex = /^[a-zA-Z]+$/;
  var usernameRegex = /^[\S]+$/;
  var passwordRegex = /^[\S]+$/;
  var countryRegex = /^([A-Z][a-z]+)([\s][a-z]+)*$/;
  var cityRegex = /^[a-zA-Z0-9 ()]+$/;
  var stateRegex = /^([A-Z][a-z]+)([\s][a-z]+)*$/;
  var streetRegex = /^([A-Z][a-z]+)([\s][a-z]+)*$/;
  var neighborhoodRegex = /^([A-Z][a-z]+)([\s][a-z]+)*$/;
  var postalCodeRegex = /^[0-9]$/;

  // Validar cada campo
  if (!name.match(nameRegex) ||
      !middleName.match(middleNameRegex) ||
      !lastName.match(lastNameRegex) ||
      !username.match(usernameRegex) ||
      !password.match(passwordRegex) ||
      !country.match(countryRegex) ||
      !city.match(cityRegex) ||
      !state.match(stateRegex) ||
      !street.match(streetRegex) ||
      !neighborhood.match(neighborhoodRegex) ||
      !postalCode.match(postalCodeRegex)) {
    alert("Alguno(s) de los campos tienen un formato incorrecto. Por favor, revisa los datos ingresados.");
  }
  event.currentTarget.submit();
}


</script>
@stop