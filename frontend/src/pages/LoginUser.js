import '../css/Error404.css'

import Menu from '../components/Menu';

import React from 'react';
import CartForm from '../components/CartForm';


export default function LoginUser(){

    return (
      <>
        <Menu showMenu={false}/>
        <div className="mt-5">
            <CartForm/>
        </div>
      </>
    );

}