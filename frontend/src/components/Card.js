import React from 'react';

import { Link } from "react-router-dom";


export default class Card extends React.Component{

  render(){
    const { id, name, image, price, description } = this.props;

    return(
      <div className="card">
        <img src={image} className="card-img-top" alt="..." />
          <hr></hr>
          <div className="card-body">
          <h5 className="card-title">{name}</h5>
          <p className="card-text text-success">${price}</p>
          <div className="text-center">
          <Link to='/detail-product' state={{ id:id, name:name, image:image, price:price, description:description }}
          style={{ color: 'white', textDecoration: 'none', fontSize: '15px', marginRight:'20px'}}>
            <button className="btn btn-primary">See</button>
          </Link>
          </div>
        </div>
      </div>

    );
  }

}