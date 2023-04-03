import '../css/DetailCard.css';

import React from 'react';


export default class DetailCard extends React.Component{

  render(){
    return(
      <div>
        <h2>Fender guitar</h2>
        <h1>$4000</h1>
        <ul className="buttons-detail-container">
          <li className="btn btn-primary">Buy</li>
          <li className="btn btn-success">Add in cart</li>
        </ul>
      </div>
    );
  }

}