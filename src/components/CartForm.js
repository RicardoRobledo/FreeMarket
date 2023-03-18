import '../css/CartForm.css'

import React from 'react';


export default class CartForm extends React.Component{

  render(){
    return(
      <div class="redirect-container">
        <div class="redirect-form">
          <h2>Hello!, to add in the<br/>cart, log in into your account</h2>
          <a href="" className="create-account-button">Create account</a>
          <a href="" className="login-button">Log in</a>
        </div>
      </div>
    );
  }

}