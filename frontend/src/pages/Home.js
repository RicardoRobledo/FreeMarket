import Menu from '../components/Menu';
import Card from '../components/Card';
import CartForm from '../components/CartForm';
import Carousel from '../components/Carousel'
import Footer from '../components/Footer';

import React, { Fragment, useState, useEffect, useContext} from 'react';
import axios from 'axios';
import {PathContext} from '../App';


function Home() {
  const [products, setProducts] = useState([]);
  const path = useContext(PathContext);

  useEffect(() => {
    getProducts();
  }, []);

  const getProducts = async () => {
    const response = await axios.get(`${path}api/products/retrieve-products`);
    setProducts(response.data);
    //console.log(response.data);
  };

  return (
    <>
      <Menu showSearch={true}/>
      <Carousel/>

      <div className="container">
        <div className="row mt-4 mb-4">
          {products.map((product) => (
            <div key={product.id} className="col-md-3 mb-4">
              <Card id={product.id} name={product.name} image={product.image} price={product.price} description={product.description}/>
            </div>
          ))}
        </div>
      </div>

      <div className="text-center mb-2">
        <img src="https://www.pikpng.com/pngl/m/321-3212187_http-i-imgur-com-8lugk7m-sora-no-otoshimono.png" className="card-img-top rounded" style={{width: '400px', height: '300px'}}/>
      </div>
      <h4 className='text-center mb-4'>More products soon</h4>

      {/*<CartForm/>*/}
      <Footer/>
    </>
  );
}

export default Home;