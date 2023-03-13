import '../css/Card.css'

import React from 'react';


export default class Card extends React.Component{

  render(){
    return(
      <div className="card">
        <div>
          Product
        </div>
        <hr/>
        <div>
          Description
        </div>
      </div>
    );
  }

}