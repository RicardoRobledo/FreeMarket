import React, { useState } from 'react';
import { useForm } from "react-hook-form";


export default function RegisterUserForm() {
    const { register, reset, getValues, handleSubmit, watch, formState: { errors } } = useForm();
    const onSubmit = data => {
      console.log(data);
      reset();
    }
    console.log(errors);

    return (
      <div className="container bg-white mt-5 mb-5 rounded p-3">
        <div className="text-center p-3 bg-secondary rounded">
          <img className="rounded" width="300px" height="300px" src="https://i.pinimg.com/originals/6f/f5/42/6ff542d576e86d21af43d6cf3f3b89a1.jpg"/>
        </div>
        <form className="row g-3 p-3" onSubmit={handleSubmit(onSubmit)}>
          <div className="col-12 bg-info rounded">
            <h2 className="text-center">Type your data</h2>
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer01" className="form-label">Name</label>
              <input type="text" className="form-control" id="validationServer01" placeholder="Albert" {...register("Name", { required:true, minLength:2, maxLength:15, pattern:/^([A-Z][a-z]+)/ })} />
              {errors?.Name?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Name?.type === "minLength" && <p className="text-danger">Minimum length '2'</p>}
              {errors?.Name?.type === "maxLength" && <p className="text-danger">Maximum length '15'</p>}
              {errors?.Name?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer02" className="form-label">Middle name</label>
              <input placeholder="Smith" type="text" className="form-control" id="validationServer02" {...register("MiddleName", { required:true, minLength:3, maxLength:20, pattern:/^[A-Z][a-z]+(([\s]{0,1}([a-z]{2}))([\s]{0,1}[a-z]+){0,1}){0,1}$/ })} />
              {errors?.MiddleName?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.MiddleName?.type === "minLength" && <p className="text-danger">Minimum length '3'</p>}
              {errors?.MiddleName?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
              {errors?.MiddleName?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer03" className="form-label">Last name</label>
              <input placeholder="Becker" type="text" className="form-control" id="validationServer03" {...register("LastName", { required:true, minLength:3, maxLength:20, pattern:/^[A-Z][a-z]+(([\s]{0,1}([a-z]{2}))([\s]{0,1}[a-z]+){0,1}){0,1}$/ })} />
              {errors?.LastName?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.LastName?.type === "minLength" && <p className="text-danger">Minimum length '3'</p>}
              {errors?.LastName?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
              {errors?.LastName?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer04" className="form-label">Username</label>
              <input placeholder="Kirito_Dev4" type="text" className="form-control" id="validationServer03" {...register("Username", { required:true, minLength:5, maxLength:20, pattern:/^[\S]+$/ })} />
              {errors?.Username?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Username?.type === "minLength" && <p className="text-danger">Minimum length '5'</p>}
              {errors?.Username?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
              {errors?.Username?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer04" className="form-label">Password</label>
              <input type="password" className="form-control" id="validationServer04" {...register("Password", { required:true, minLength:8, maxLength:20, pattern:/^[\S]+$/ })} />
              {errors?.Password?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Password?.type === "minLength" && <p className="text-danger">Minimum length '8'</p>}
              {errors?.Password?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
              {errors?.Password?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer05" className="form-label">Confirm password</label>
              <input type="password" className="form-control" id="validationServer05" {...register("ConfirmPassword", { required:true, minLength:8, maxLength:20, pattern:/^[\S]+$/ })} />
              {errors?.ConfirmPassword?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.ConfirmPassword?.type === "minLength" && <p className="text-danger">Minimum length '8'</p>}
              {errors?.ConfirmPassword?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
              {errors?.ConfirmPassword?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer06" className="form-label">Email</label>
              <input placeholder="Nomercy@gmail.com" type="email" className="form-control" id="validationServer06" {...register("Email", { required:true, pattern:/^([a-zA-z0-9]+)((\.|[0-9]+|[a-zA-z])+)*@gmail.com$/ })} />
              {errors?.Email?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Email?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer07" className="form-label">Country</label>
              <input placeholder="Germany" type="text" className="form-control" id="validationServer07" {...register("Country", { required: true, pattern:/^([A-Z][a-z]+)([\s][a-z]+)*$/ })}/>
              {errors?.Country?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Country?.type === "pattern" && <p className="text-danger">Invali format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer08" className="form-label">City</label>
              <input placeholder="Berlin" type="text" className="form-control" id="validationServer08" {...register("City", { required:true, pattern:/^([A-Z][a-z]+)([\s][a-z]+)*$/ })}/>
              {errors?.City?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.City?.type === "pattern" && <p className="text-danger">Invali format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer09" className="form-label">State</label>
              <input placeholder="Belrock" type="text" className="form-control" id="validationServer09" {...register("State", { required:true, pattern:/^([A-Z][a-z]+)([\s][a-z]+)*$/ })}/>
              {errors?.State?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.State?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer10" className="form-label">Street</label>
              <input placeholder="Yolerium" type="text" className="form-control" id="validationServer10" {...register("Street", { required:true, pattern:/^([A-Z][a-z]+)([\s][a-z]+)*$/ })}/>
              {errors?.Street?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Street?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-4">
              <label htmlFor="validationServer11" className="form-label">Neighborhood</label>
              <input placeholder="New angels" type="text" className="form-control" id="validationServer11" {...register("Neighborhood", { required:true, pattern:/^([A-Z][a-z]+)([\s][a-z]+)*$/ })}/>
              {errors?.Neighborhood?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.Neighborhood?.type === "pattern" && <p className="text-danger">Invalid format</p>}
            </div>
            <div className="col-md-6">
              <label htmlFor="validationServer12" className="form-label">Number</label>
              <input placeholder="27" type="number" className="form-control" id="validationServer12" {...register("Number", { required:true })}/>
              {errors?.Number?.type === "required" && <p className="text-warning">This field is required</p>}
            </div>
            <div className="col-md-6">
              <label htmlFor="validationServer12" className="form-label">Postal code</label>
              <input placeholder="23150" type="text" className="form-control" id="validationServer12" {...register("PostalCode", { required:true, pattern:/^[0-9]{5}$/ })}/>
              {errors?.PostalCode?.type === "required" && <p className="text-warning">This field is required</p>}
              {errors?.PostalCode?.type === "pattern" && <p className="text-danger">Postal code must contain only 5 digits</p>}
            </div>
            <div className="col-12 mt-5 text-center">
              <button className="btn btn-primary w-100" type="submit">Register</button>
          </div>
        </form>
      </div>
    );

}