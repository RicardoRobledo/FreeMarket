import React, { useContext } from 'react';
import { useLocation, useNavigate } from "react-router-dom";
import axios from 'axios';
import { useForm } from "react-hook-form";
import {PathContext} from '../App';


function ProductShopping({ id_s, id, name, image, price }) {
  const navigate = useNavigate();
  const { handleSubmit } = useForm();
  const path = useContext(PathContext);
  
  const onSubmit = async () =>{
    const resp = await axios.delete(`${path}api/shopping/delete-shopping/${id_s}`,
      {
        headers:{
          Authorization: `Bearer ${localStorage.getItem('token')}`
        }
      }).then(
        response=>console.log(response.data)
      );
      window.location.reload();
  }
  
  return (
    <div className="card">
      <img src={image} className="card-img-top p-2" alt="..."/>
      <div className="card-body">
        <h5 className="card-title text-center">{name}</h5>
        <div className="text-center">
          <form onSubmit={handleSubmit(onSubmit)}>
            <button className="btn btn-danger">Remove</button>
          </form>
        </div>
      </div>
    </div>
);
}

export default ProductShopping;