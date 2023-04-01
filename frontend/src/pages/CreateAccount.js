import '../css/CreateAccount.css';

import Menu from '../components/Menu';
import {FaAddressCard} from 'react-icons/fa';

import { Link } from "react-router-dom";

import React from 'react';


export default class CreateAccount extends React.Component {

  render () {
    return(
      <>
        <Menu showSearch={false}/>
        <div className="select-register-container">
          <div className="select-register">
            <FaAddressCard size={120} style={{color:'#FFD333'}}/>
            <h3>To create your account we need<br/>to validate your information</h3>
            <p>It only takes a few minutes</p>
            <div className="create-personal-account-button">
              <Link to="/create-user" style={{ textDecoration: 'none' }}>
                <h4>Create personal account</h4>
              </Link>
            </div>
            <div className="create-enterprise-account-button">
              <Link to="/" style={{ textDecoration: 'none'}}>
                <h4>Create enterprise account</h4>
              </Link>
            </div>
          </div>
        </div>
      </>
    );
  }

}