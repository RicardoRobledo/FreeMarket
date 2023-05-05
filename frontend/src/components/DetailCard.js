import '../css/DetailCard.css';

import React from 'react';
import { useLocation } from "react-router-dom";
import { useNavigate } from 'react-router-dom';


export default function DetailCard(){
    let { state } = useLocation();
    const navigate = useNavigate();

    const submit = async () => {
      if(!(localStorage.getItem('token') && localStorage.getItem('username'))){
        navigate('/login-user');
      }
    };

    return(
      <div>
        <h6>{state.name}</h6>
        <h5>${state.price}</h5>
        <ul className="buttons-detail-container">
          <form onSubmit={submit}>
            <button className="btn btn-success" type="submit">Buy</button>
          </form>
          {/*<li className="btn btn-success">Add in cart</li>*/}
        </ul>
      </div>
    );

}