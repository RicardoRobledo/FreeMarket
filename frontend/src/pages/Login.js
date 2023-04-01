import Menu from '../components/Menu';
import LoginForm from '../components/LoginForm'

import React, { Fragment } from 'react';


export default class Login extends React.Component {

  render(){
    return (
      <Fragment>
        <Menu showSearch={false}/>
        <LoginForm/>
      </Fragment>
    );
  }

}