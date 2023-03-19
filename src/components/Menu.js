import '../css/Header.css'

import React from 'react';

import { Link } from "react-router-dom";

import { FaShopify, FaSearch, FaSearchLocation, FaCartPlus } from "react-icons/fa";
import CategoriesDropdownMenu from './CategoriesDropdownMenu';


export default class Menu extends React.Component {

  render() {

    const showSearch = this.props.showSearch

    return (
      <div>
        <div className="container">
          {/*Icon*/}
          <Link to="/" style={{color: 'black'}}><FaShopify size={40}/></Link>

          {showSearch ? <div>
            {/*Search bar*/}
            <form>
              <input type="text" placeholder="Search" className="search-input"></input>
              <button type="submit" className="search-button">
                <FaSearch size={20} />
              </button>
            </form>

            {/*Announcement*/}
            <h1>Save money here</h1></div>:<div></div>}
      </div>
      {showSearch?
        <div className="container">
          <h4><FaSearchLocation/>Enter your address</h4>

          <ul>
            <h4>
              <CategoriesDropdownMenu/>
            </h4>
            <h4>Sale</h4>
            <h4>Historic</h4>
            <h4>Supermarket</h4>
            <h4>Fashion</h4>
            <h4>Sell</h4>
            <h4>Help</h4>
          </ul>

          <ul>
          <Link to="/create-account/" style={{ textDecoration: 'none' }}><h4>Sign in</h4></Link>
            <Link to="/login/" style={{ textDecoration: 'none' }}><h4>Log in</h4></Link>
            <h4>My sales</h4>
            <FaCartPlus className="cart"/>
          </ul>
        </div>:<div></div>}
      </div>
    );
  }

}