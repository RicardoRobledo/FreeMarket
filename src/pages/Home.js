import Menu from '../components/Menu';
import Card from '../components/Card';

import React, { Fragment } from 'react';


export default class Home extends React.Component {

  render(){
    return (
      <Fragment>
        <Menu/>
        <Card/>
      </Fragment>
    );
  }

}