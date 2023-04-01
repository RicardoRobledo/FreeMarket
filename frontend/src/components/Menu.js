import React from 'react';

import { Link } from "react-router-dom";

import { FaShopify, FaCartPlus } from "react-icons/fa";


export default class Menu extends React.Component {

  render() {

    const showSearch = this.props.showSearch

    return (
      <div>
        <nav class="navbar navbar-expand-lg bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <Link to="/" style={{ color: 'black' }}><FaShopify size={40} /></Link>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="navbar-brand" href="#">
                    <Link to="/login" style={{ color: 'black', textDecoration: 'none', fontSize: '15px' }}>Login</Link>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="navbar-brand" href="#">
                    <Link to="/create-account" style={{ color: 'black', textDecoration: 'none', fontSize: '15px' }}>Sign up</Link>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>

        <ul>
                <li><h3>Address</h3></li>
                <li><label>Country:</label><input type="text"/></li>
                <li><label>State:</label><input type="text"/></li>
                <li><label>City:</label><input type="text"/></li>
                <li><label>Postal code:</label><input type="number"/></li>
                <li><label>Street:</label><input type="text"/></li>
                <li><label>Neighborhood:</label><input type="text"/></li>
                <li><label>Number:</label><input type="text"/></li>
              </ul>
      </div>
    );
  }

}