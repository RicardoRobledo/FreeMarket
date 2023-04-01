import Menu from '../components/Menu';
import Card from '../components/Card';
import CartForm from '../components/CartForm';

import React, { Fragment } from 'react';


export default class Home extends React.Component {

  render(){
    return (
      <Fragment>
        <Menu showSearch={true}/>
        <Card/>
        <CartForm/>
      </Fragment>
    );
  }

}