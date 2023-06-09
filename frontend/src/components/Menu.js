import React, {useState} from 'react';
import { Link } from "react-router-dom";
import { FaShopify, FaCartPlus } from "react-icons/fa";


export default function Menu() {

    //const showSearch = this.props.showSearch;
    const [username, setUsername] = useState(sessionStorage.getItem('username'));
    const [token, setToken] = useState(sessionStorage.getItem('token'));
    
    function logout(){
      sessionStorage.removeItem('username');
      sessionStorage.removeItem('token');
      setUsername('');
      setToken('');
    }

    return (
      <div>
        <nav className="navbar navbar-expand-lg bg-primary">
          <div className="container-fluid">
            <Link to="/" style={{ color: 'white', marginRight:'40px' }}><FaShopify size={40}/></Link>
            <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarSupportedContent">
              {username?(
                <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                <li className="nav-item">
                  <h2>
                  <Link to="/user-profile" style={{ color: 'yellow', textDecoration: 'none', fontSize: '15px', marginRight:'20px'}}>{username}</Link>
                  </h2>
                </li>
                <li className="nav-item">
                  <h2>
                    <Link to="/user-shopping" style={{ color: 'white', textDecoration: 'none', fontSize: '15px', marginRight:'20px'}}>Purchases</Link>
                  </h2>
                </li>
                <li className="nav-item">
                  <h2>
                    <Link to="/" style={{ color: 'white', textDecoration: 'none', fontSize: '15px' }} onClick={() => logout()}>Logout</Link>
                  </h2>
                </li>
                </ul>
              ):(
                <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                <li className="nav-item">
                  <h2>
                    <Link to="/login" style={{ color: 'white', textDecoration: 'none', fontSize: '15px', marginRight:'20px'}}>Log in</Link>
                  </h2>
                </li>
                <li className="nav-item dropdown">
                  <h2>
                    <Link to="/create-account" style={{ color: 'white', textDecoration: 'none', fontSize: '15px' }}>Sign up</Link>
                  </h2>
                </li>
              </ul>
              )}

              <form className="d-flex" role="search">
                <input className="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button className="btn btn-warning" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>        
      </div>
    );

}