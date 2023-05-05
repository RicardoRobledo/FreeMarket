import '../css/DetailProduct.css';

import React from 'react';
import DetailCard from '../components/DetailCard'
import Footer from '../components/Footer';
import Menu from '../components/Menu';
import { useLocation } from "react-router-dom";
import axios from 'axios';


export default function DetailProduct(){

    let { state } = useLocation();

    return (
      <>
        <Menu showSearch={true}/> 
        <div className="container col-12 mb-5 mt-5">
          <div className="detail-product">
            <div className="detail-container">
              <img src={state.image} style={{width:'350px', height:'350px'}}/>
              <DetailCard name={state.name} price={state.price}/>
            </div>
            <hr/>
            <h3>Description</h3>
            <p>
              {state.description}
            </p>
          </div>
        </div>
        <Footer/>
      </>
    );

}