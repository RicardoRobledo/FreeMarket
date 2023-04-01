import '../css/Error404.css'

import Menu from '../components/Menu';

import React from 'react';


export default class Error404 extends React.Component {

  render() {
      return (
        <>
          <Menu showMenu={false}/>
          <div className="container-404">
            <div className="container-message-404">
              <h1>Oops!, Error 404</h1><br/>That page does not exist
            </div>
          </div>
        </>
      );
    }

}