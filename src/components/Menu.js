import '../css/Header.css'

import React from 'react';

import { FaShopify, FaSearch } from "react-icons/fa";


export default class Menu extends React.Component{

  render() {
    return (
      <div className="container">
        
        {/*Icon*/}
        <FaShopify size={40}/>

        {/*Search bar*/}
        <div>
          <form>
            <input type="text" placeholder="Search" className="search-input"></input>
            <button type="submit" className="search-button">
              <FaSearch size={20}/>
            </button>
          </form>
        </div>

        {/*Announcement*/}
        <h1>Save money here</h1>
     
      </div>
    );
  }

}