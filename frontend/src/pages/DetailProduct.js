import '../css/DetailProduct.css';

import React from 'react';
import DetailCard from '../components/DetailCard'
import Footer from '../components/Footer';
import Menu from '../components/Menu';


export default class DetailProduct extends React.Component{

  render(){
    return (
      <>
        <Menu showSearch={true}/> 
        <div className="container col-12 mb-5 mt-5">
          <div className="detail-product">
            <div className="detail-container">
              <img src="https://http2.mlstatic.com/D_NQ_NP_967424-CBT52437292155_112022-O.webp"/>
              <DetailCard/>
            </div>
            <hr/>
            <h3>Description</h3>
            <p>
              Guitarra buena con un gran acabado y sonido
            </p>
          </div>
        </div>
        <Footer/>
      </>
    );
  }

}