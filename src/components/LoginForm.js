import '../css/LoginForm.css';

import React from 'react';

import { FaGuitar, FaXbox, FaDrum, FaFootballBall } from "react-icons/fa";


export default class Login extends React.Component {

  render(){
    return (
      <div class="login-container">
        <div className="announcement-card">
          <h2>Welcome to FreeMarket<br/></h2>
          <hr/>
          <p>
            Find all what you need by reachable prices<br/>
            from videogames to instruments
          </p>
          <div className="icons-container">
            <ul>
              <li><FaGuitar color="brown"/></li>
              <li><FaXbox color="green"/></li>
              <li><FaDrum color="gray"/></li>
              <li><FaFootballBall color="red"/></li>
            </ul>
          </div>
        </div>
        <form className="login-form">
          <ul>
            <li><label>Username</label></li>
            <li><input className="login-input" type="text field"></input></li>
            <li><label>Password</label></li>
            <li><input className="login-input" type="text field"></input></li>
            <li>
              <div className="buttons">
                <button className="button-login-form">Log in</button>
                <a className="signup-login-form">Sign up</a>
              </div>
            </li>
          </ul>
        </form>
      </div>
    );
  }

}