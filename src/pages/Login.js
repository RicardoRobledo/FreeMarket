import Menu from '../components/Menu';

import React, { Fragment } from 'react';


export default class Login extends React.Component {

  render(){
    return (
      <Fragment>
        <Menu showSearch={true}/>
      </Fragment>
    );
  }

}