import '../css/CategoriesDropdownMenu.css';

import React from 'react';


export default class CategoriesDropdownMenu extends React.Component {

  render() {
    return (
      <>
			  <nav> 
				  <li><a href="">Categories</a>
					  <ul>
						  <li><a href="">Vehicles</a></li>
						  <li><a href="">Supermarket</a></li>
              <li><a href="">Technology</a></li>
              <li><a href="">Home and forniture</a></li>
              <li><a href="">Home appliances</a></li>
              <li><a href="">Fashion</a></li>
              <li><a href="">Sports and fitness</a></li>
					    <li><a href="">Tools</a></li>
              <li><a href="">Construction</a></li>
            </ul>
				  </li>
        </nav>
      </>
    );
  }

}