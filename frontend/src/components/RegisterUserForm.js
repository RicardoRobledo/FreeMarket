import React, { useState } from 'react';
import { useForm } from "react-hook-form";
import axios from 'axios';


const initialForm = {
  name: '',
  middle_name: '',
  last_name: '',
  username: '',
  password: '',
  email: '',
  country: '',
  city: '',
  state: '',
  street: '',
  neighborhood: '',
  number: '',
  postal_code: '',
}

export default function RegisterUserForm() {
  const { register, reset, getValues, handleSubmit, watch, formState: { errors } } = useForm();
  const [form, setForm] = useState(initialForm);

  const onSubmit = data => {
    setForm(initialForm);
    reset();
  }

  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name]: e.target.value
    });
  };

  return (
    <div className="container bg-white mt-5 mb-5 rounded p-3">
      <div className="text-center p-3 bg-secondary rounded">
        <img className="rounded" width="300px" height="300px" src="https://i.pinimg.com/originals/6f/f5/42/6ff542d576e86d21af43d6cf3f3b89a1.jpg" />
      </div>
      <form className="row g-3 p-3" onSubmit={handleSubmit(onSubmit)}>
        <div className="col-12 bg-info rounded">
          <h2 className="text-center">Type your data</h2>
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer01" className="form-label">Name</label>
          <input type="text"
            className="form-control"
            placeholder="Albert"
            {...register("name", { required: true, minLength: 2, maxLength: 15, pattern: /^([A-Z][a-z]+)/ })}
            onChange={handleChange}
          />
          {errors?.name?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.name?.type === "minLength" && <p className="text-danger">Minimum length '2'</p>}
          {errors?.name?.type === "maxLength" && <p className="text-danger">Maximum length '15'</p>}
          {errors?.name?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer02" className="form-label">Middle name</label>
          <input
            placeholder="Smith"
            type="text"
            className="form-control"
            {...register("middle_name", { required: true, minLength: 3, maxLength: 20, pattern: /^[A-Z][a-z]+(([\s]{0,1}([a-z]{2}))([\s]{0,1}[a-z]+){0,1}){0,1}$/ })}
            onChange={handleChange}
          />
          {errors?.middle_name?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.middle_name?.type === "minLength" && <p className="text-danger">Minimum length '3'</p>}
          {errors?.middle_name?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.middle_name?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer03" className="form-label">Last name</label>
          <input
            placeholder="Becker"
            type="text"
            className="form-control"
            {...register("last_name", { required: true, minLength: 3, maxLength: 20, pattern: /^[A-Z][a-z]+(([\s]{0,1}([a-z]{2}))([\s]{0,1}[a-z]+){0,1}){0,1}$/ })}
            onChange={handleChange}
          />
          {errors?.last_name?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.last_name?.type === "minLength" && <p className="text-danger">Minimum length '3'</p>}
          {errors?.last_name?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.last_name?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer04" className="form-label">Username</label>
          <input
            placeholder="Kirito_Dev4"
            type="text"
            className="form-control"
            {...register("username", { required: true, minLength: 5, maxLength: 20, pattern: /^[\S]+$/ })}
            onChange={handleChange}
          />
          {errors?.username?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.username?.type === "minLength" && <p className="text-danger">Minimum length '5'</p>}
          {errors?.username?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.username?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer04" className="form-label">Password</label>
          <input
            type="password"
            className="form-control"
            {...register("password", { required: true, minLength: 8, maxLength: 20, pattern: /^[\S]+$/ })}
            onChange={handleChange}
          />
          {errors?.password?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.password?.type === "minLength" && <p className="text-danger">Minimum length '8'</p>}
          {errors?.password?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.password?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer05" className="form-label">Confirm password</label>
          <input
            type="password"
            className="form-control"
            {...register("confirm_password", { required: true, minLength: 8, maxLength: 20, pattern: /^[\S]+$/ })}
            onChange={handleChange}
          />
          {errors?.confirm_password?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.confirm_password?.type === "minLength" && <p className="text-danger">Minimum length '8'</p>}
          {errors?.confirm_password?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.confirm_password?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer06" className="form-label">Email</label>
          <input
            placeholder="Nomercy@gmail.com"
            type="email"
            className="form-control"
            {...register("email", { required: true, pattern: /^([a-zA-z0-9]+)((\.|[0-9]+|[a-zA-z])+)*@gmail.com$/ })}
            onChange={handleChange}
          />
          {errors?.email?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.email?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer07" className="form-label">Country</label>
          <input
            placeholder="Germany"
            type="text"
            className="form-control"
            {...register("country", { required: true, pattern: /^([A-Z][a-z]+)([\s][a-z]+)*$/ })}
            onChange={handleChange}
          />
          {errors?.country?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.country?.type === "pattern" && <p className="text-danger">Invali format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer08" className="form-label">City</label>
          <input
            placeholder="Berlin"
            type="text"
            className="form-control"
            {...register("city", { required: true, pattern: /^([A-Z][a-z]+)([\s][a-z]+)*$/ })}
            onChange={handleChange}
          />
          {errors?.city?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.city?.type === "pattern" && <p className="text-danger">Invali format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer09" className="form-label">State</label>
          <input
            placeholder="Belrock"
            type="text"
            className="form-control"
            {...register("state", { required: true, pattern: /^([A-Z][a-z]+)([\s][a-z]+)*$/ })}
            onChange={handleChange}
          />
          {errors?.state?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.state?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer10" className="form-label">Street</label>
          <input
            placeholder="Yolerium"
            type="text"
            className="form-control"
            {...register("street", { required: true, pattern: /^([A-Z][a-z]+)([\s][a-z]+)*$/ })}
            onChange={handleChange}
          />
          {errors?.street?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.street?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-4">
          <label htmlFor="validationServer11" className="form-label">Neighborhood</label>
          <input
            placeholder="New angels"
            type="text"
            className="form-control"
            {...register("neighborhood", { required: true, pattern: /^([A-Z][a-z]+)([\s][a-z]+)*$/ })}
            onChange={handleChange}
          />
          {errors?.neighborhood?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.neighborhood?.type === "pattern" && <p className="text-danger">Invalid format</p>}
        </div>
        <div className="col-md-6">
          <label htmlFor="validationServer12" className="form-label">Number</label>
          <input
            placeholder="27"
            type="number"
            className="form-control"
            {...register("number", { required: true })}
            onChange={handleChange}
          />
          {errors?.number?.type === "required" && <p className="text-warning">This field is required</p>}
        </div>
        <div className="col-md-6">
          <label htmlFor="validationServer13" className="form-label">Postal code</label>
          <input
            placeholder="23150"
            type="text"
            className="form-control"
            {...register("postal_code", { required: true, pattern: /^[0-9]{5}$/ })}
            onChange={handleChange}
          />
          {errors?.postal_code?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.postal_code?.type === "pattern" && <p className="text-danger">Postal code must contain only 5 digits</p>}
        </div>
        <div className="col-12 mt-5 text-center">
          <button className="btn btn-primary w-100" type="submit">Register</button>
        </div>
      </form>
    </div>
  );

}