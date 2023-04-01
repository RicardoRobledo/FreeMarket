import '../css/CartForm.css'

import React from 'react';
import { Link } from 'react-router-dom';


export default class CartForm extends React.Component{

  render(){
    return(
      <div class="redirect-container">
        <div class="redirect-form text-center">
          <h4>Hello!, to add in the<br/>cart, log in into your account</h4>
          <div className="create-account-button">
            <Link style={{ textDecoration: 'none', textAlign: 'center', marginTop: '40px' }} to="/create-account/">
              <h6 className="create-account-font">Create account</h6>
            </Link>
          </div>
          <div className="login-button">
            <Link style={{ textDecoration: 'none', textAlign: 'center', marginTop: '30px'}} to="/login/">
              <h6 className="login-font">Log in</h6>
            </Link>
          </div>
        </div>
      </div>
    );
  }

}