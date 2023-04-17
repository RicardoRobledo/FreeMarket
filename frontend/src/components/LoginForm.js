import React, { useRef, useState } from 'react';
import { useForm } from "react-hook-form";
import { Link } from "react-router-dom";
import ReCAPTCHA from "react-google-recaptcha";
import axios from 'axios';


export default function Login() {
  const { register, reset, getValues, handleSubmit, watch, formState: { errors } } = useForm();
  const captchaRef = useRef(null);
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [enterprise, setEnterprise] = useState(false);
  
  const onSubmit = async () => {
    //const token = captchaRef.current.getValue();
    //captchaRef.current.reset();

    let response = await axios.get(`http://127.0.0.1:8000/api/login?username=${username}&password=${password}&enterprise=${enterprise}`)
    .then(function (response) {
      return response.data
    })
    
    localStorage.setItem('username', response['username']);

    setUsername("");
    setPassword("");
    setEnterprise(false);
    reset();
  }

  return (
    <div className="container col-9 mt-5 bg-white p-3 rounded">
      <div className="text-center p-3 bg-white rounded">
        <img className="rounded" width="100px" height="100px" src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" />
      </div>
      <form onSubmit={handleSubmit(onSubmit)}>
        <div className="mb-3" >
          <label htmlFor="validationServer01" className="form-label">Username</label>
          <input placeholder="Serial_Lain_20" type="text" className="form-control" id="validationServer01" {...register("Username", { required:true, minLength:5, maxLength:20, pattern:/^[\S]+$/ })} onChange={e=>setUsername(e.target.value)} />
          {errors?.Username?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.Username?.type === "minLength" && <p className="text-danger">Minimum length '5'</p>}
          {errors?.Username?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.Username?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="mb-3">
          <label htmlFor="validationServer02" className="form-label">Password</label>
          <input type="password" className="form-control" id="validationServer02" {...register("Password", { required:true, minLength:8, maxLength:20, pattern:/^[\S]+$/ })} onChange={e=>setPassword(e.target.value)}/>
          {errors?.Password?.type === "required" && <p className="text-warning">This field is required</p>}
          {errors?.Password?.type === "minLength" && <p className="text-danger">Minimum length '8'</p>}
          {errors?.Password?.type === "maxLength" && <p className="text-danger">Maximum length '20'</p>}
          {errors?.Password?.type === "pattern" && <p className="text-danger">Invalid format, no spaces</p>}
        </div>
        <div className="mb-3 form-check">
          <input type="checkbox" className="form-check-input" id="exampleCheck1" onClick={e=>setEnterprise(e.target.checked)}/>
          <label className="form-check-label" htmlFor="exampleCheck1">Are you an enterprise?</label>
        </div>
        <div className="mb-3">
          {/*<ReCAPTCHA
            sitekey={process.env.REACT_APP_SITE_KEY}
            ref={captchaRef}
            onChange={on}
          />*/}
        </div>
        <div className="text-center pt-3">
          <button type="submit" className="btn btn-primary">Log in</button>
        </div>
      </form>
    </div>
  );

}