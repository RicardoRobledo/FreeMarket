import '../css/DetailCard.css';

import React, {useContext} from 'react';
import { useLocation } from "react-router-dom";
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import { useForm } from "react-hook-form";
import {PathContext} from '../App';


export default function DetailCard(){
    let { state } = useLocation();
    const { handleSubmit } = useForm();
    const navigate = useNavigate();
    const path = useContext(PathContext);

    const onSubmit = async () => {
      if(!(sessionStorage.getItem('token') && sessionStorage.getItem('username'))){
        navigate('/login-user');
      }

      await axios.post(`${path}api/shopping/create-shopping`, {
        username: sessionStorage.getItem('username'),
        product_id: state.id
      },{
        headers: { Authorization: `Bearer ${sessionStorage.getItem('token')}`}
      }).then(
        resp=>console.log(resp.data)
      );

      navigate('/user-shopping');
    };

    return(
      <div>
        <h6>{state.name}</h6>
        <h5>${state.price}</h5>
        <ul className="buttons-detail-container">
          <form onSubmit={handleSubmit(onSubmit)}>
            <button className="btn btn-success" type="submit">Buy</button>
          </form>
          {/*<li className="btn btn-success">Add in cart</li>*/}
        </ul>
      </div>
    );

}