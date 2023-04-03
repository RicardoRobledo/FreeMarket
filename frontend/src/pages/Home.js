import Menu from '../components/Menu';
import Card from '../components/Card';
import CartForm from '../components/CartForm';
import Carousel from '../components/Carousel'

import React, { Fragment } from 'react';


export default class Home extends React.Component {

  render(){
    return (
      <Fragment>
        <Menu showSearch={true}/>
        <Carousel/>
        <Card/>
        <CartForm/>
      </Fragment>
    );
  }

}