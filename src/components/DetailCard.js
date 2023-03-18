import '../css/DetailCard.css';

import React from 'react';


export default class DetailCard extends React.Component{

  render(){
    return(
      <div>
        <div className="card-detail-container">
          <h2>Fender guitar jhjhjhjhklkllhjh</h2>
          <h1>$4000</h1>
          <a href="" className="buy-button">Buy</a>
          <a href="" className="add-in-cart-button">Add in cart</a>
        </div>
      </div>
    );
  }

}