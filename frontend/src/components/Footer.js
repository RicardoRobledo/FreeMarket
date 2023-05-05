import React from 'react';

import { FaBootstrap, FaInstagram, FaTwitter, FaFacebook } from "react-icons/fa";


export default function Footer() {
  return (
    <div style={{ color:'white' }}>
      <footer className="d-flex flex-wrap justify-content-between align-items-center p-4 bg-primary">
        <div className="col-md-4 d-flex align-items-center">
          <span className="m-2 text-white">© 2023 FreeMarket, Inc</span>          
        </div>
        <div className="text-center">
          <FaBootstrap size={40}/>
        </div>
        <ul className="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li className="ms-3"><FaInstagram size={20}/></li>
          <li className="ms-3"><FaFacebook size={20}/></li>
          <li className="ms-3"><FaTwitter size={20}/></li>
        </ul>
      </footer>
    </div>
  );
}