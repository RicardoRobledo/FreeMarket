import React from 'react';
import { useForm } from "react-hook-form";
import { Link } from "react-router-dom";


export default function Login() {
  const { register, reset, getValues, handleSubmit, watch, formState: { errors } } = useForm();
  const onSubmit = data => {
    console.log(data);
    reset();
  }
  console.log(errors);

  return (
    <div className="container col-9 mt-5 bg-white p-3 rounded">
      <div className="text-center p-3 bg-white rounded">
        <img className="rounded" width="100px" height="100px" src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" />
      </div>
      <form needs-validation onSubmit={handleSubmit(onSubmit)}>
        <div className="mb-3">
          <label htmlFor="validationServer01" className="form-label">Username</label>
          <input placeholder="Serial_Lain_20" type="text" className="form-control" id="validationServer01" {...register("Username", { required:true, minLength:5, maxLength:20, pattern:/^[\S]+$/ })} />
          {errors?.Username?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.Username?.type === "minLength" && <p className="text-danger">Minimum length '5'</p>}
          {errors?.Username?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.Username?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="mb-3">
          <label htmlFor="validationServer02" className="form-label">Password</label>
          <input type="password" className="form-control" id="validationServer02" {...register("Password", { required:true, minLength:8, maxLength:20, pattern:/^[\S]+$/ })} />
          {errors?.Password?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.Password?.type === "minLength" && <p className="text-danger">Minimum length '8'</p>}
          {errors?.Password?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.Password?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="mb-3 form-check">
          <input type="checkbox" className="form-check-input" id="exampleCheck1" />
          <label className="form-check-label" htmlFor="exampleCheck1">Are you an enterprise?</label>
        </div>
        <div className="text-center pt-3">
          <button type="submit" className="btn btn-primary">Log in</button>
        </div>
      </form>
    </div>
  );

}