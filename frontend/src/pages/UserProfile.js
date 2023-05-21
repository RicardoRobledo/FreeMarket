import Menu from '../components/Menu';
import UpdateUserForm from '../components/UpdateUserForm';

import React, { Fragment, useState, useEffect, useContext} from 'react';
import axios from 'axios';
import {PathContext} from '../App';


function UserProfile() {
  const [products, setProducts] = useState([]);
  const path = useContext(PathContext);

  useEffect(() => {
    getProducts();
  }, []);

  const getProducts = async () => {
    //console.log(response.data);
  };

  return (
    <>
      <Menu showSearch={true}/>
      <UpdateUserForm />
    </>
  );
}

export default UserProfile;