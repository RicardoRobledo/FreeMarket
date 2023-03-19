import '../css/CreateAccount.css';

import Menu from '../components/Menu';
import {FaAddressCard} from 'react-icons/fa';

import React from 'react';


export default class CreateAccount extends React.Component {

  render () {
    return(
      <>
        <Menu showSearch={false}/>
        <div className="select-register-container">
          <div className="select-register">
            <FaAddressCard size={120} style={{color:'#FFD333'}}/>
            <h2>To create your account we need<br/>to validate your information</h2>
            <p>It only take a few minutes</p>
            <a className="create-personal-account-button">Create personal account</a>
            <a className="create-enterprise-account-button">Create enterprise account</a>
          </div>
        </div>
      </>
    );
  }

}