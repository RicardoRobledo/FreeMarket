import React, { useRef, useEffect, useState, useContext } from 'react';
import { useForm } from "react-hook-form";
import { useNavigate } from 'react-router-dom';
import { Link } from "react-router-dom";
import HCaptcha from '@hcaptcha/react-hcaptcha';
import axios from 'axios';
import {PathContext} from '../App';


export default function Login() {
  const { register, reset, getValues, handleSubmit, watch, formState: { errors } } = useForm();
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [enterprise, setEnterprise] = useState(false);
  const [error, setError] = useState(false);
  const navigate = useNavigate();
  const [token, setToken] = useState(null);
  const captchaRef = useRef(null);
  const path = useContext(PathContext);
  
  const onSubmit = async () => {
    //const token = captchaRef.current.getValue();
    //captchaRef.current.reset();

    try{
      await axios.get(`${path}api/authentication/login?username=${username}&password=${password}&enterprise=${enterprise}`)
      .then(function (response) {

        if(response.status===200){
          let data = response.data;
          localStorage.setItem('username', data['username']);
          localStorage.setItem('token', data['token']);
          console.log(data['session']);
          navigate('/'); // go to home
        }

      });
    }catch(err){
      setError(true);
    }
    
    setUsername("");
    setPassword("");
    setEnterprise(false);
    reset();
  }

  useEffect(() => {
    if (token)
      console.log(`hCaptcha Token: ${token}`);
  }, [token]);

  const onLoad = () => {
    // this reaches out to the hCaptcha JS API and runs the
    // execute function on it. you can use other functions as
    // documented here:
    // https://docs.hcaptcha.com/configuration#jsapi
    captchaRef.current.execute();
  };

  return (
    <div className="container col-9 mt-5 bg-white p-3 rounded">
      <div className="text-center p-3 bg-white rounded">
        <img className="rounded" width="100px" height="100px" src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" />
      </div>
      {error ? <div className="alert alert-danger" role="alert">
        Nonexistent user
      </div>:<></>}
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
           {/*<HCaptcha
        sitekey={process.env.REACT_APP_SITE_KEY}
        onLoad={onLoad}
        onVerify={setToken}
        ref={captchaRef}
  />*/}
        </div>
        <div className="text-center pt-3">
          <button type="submit" className="btn btn-primary">Log in</button>
        </div>
      </form>
    </div>
  );

}