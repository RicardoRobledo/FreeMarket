import {React, useContext, Fragment, useState, useEffect,} from 'react';
import Menu from '../components/Menu';
import ProductShopping from '../components/ProductShopping';
import {PathContext} from '../App';
import { useNavigate } from 'react-router-dom';
import CartForm from '../components/CartForm';

import axios from 'axios';


export default function UserShopping() {

  const navigate = useNavigate();
  const [products, setProducts] = useState([]);
  const path = useContext(PathContext);

  useEffect(() => {
    getProducts();
  }, []);

  const getProducts = async () => {
    const response = await axios({
      url:`${path}api/shopping/obtain-user-shopping?username=${localStorage.getItem('username')}`,
      method:'get',
      headers:{
        Authorization: `Bearer ${localStorage.getItem('token')}`
      }
    });
    /*<div key={Math.random()} className="col-md-3 mb-4">
          <ProductShopping id={product.id} name={product.name} price={product.price} image={product.image}/>
        </div>*/
    console.log(response.data);
    setProducts(response.data['shopping']);
  };

  return (
    <Fragment>
      <Menu showSearch={false}/>
      {
        localStorage.getItem('token') && localStorage.getItem('username')?(
          <div className="row m-4">
      <h1 className="text-center mb-4">Your purchases</h1>
      {products.map((product) => (
        <div key={Math.random()} className="col-md-2 mb-4">
          <ProductShopping id_s={product[0]} id={product[1].id} name={product[1].name} price={product[1].price} image={product[1].image} />
        </div>
      ))}
      </div>
        ):(
          <div className="mt-5">
            <CartForm/>
          </div>
        )
      }
    </Fragment>
  );

}