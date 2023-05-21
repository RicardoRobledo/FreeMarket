import './css/App.css';

import { createContext } from "react";

import Home from './pages/Home';
import Login from './pages/Login';
import DetailProduct from './pages/DetailProduct';
import CreateAccount from './pages/CreateAccount';
import CreateUserPage from './pages/CreateUserPage';
import UserShopping from './pages/UserShopping';
import UserProfile from './pages/UserProfile';
import Error404 from './pages/Error404';

import { Routes, Route, BrowserRouter } from "react-router-dom";
import LoginUser from './pages/LoginUser';


export const PathContext = createContext();


function App() {

  return (
    <>
    <PathContext.Provider value={'http://127.0.0.1:8000/'}>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/login" element={<Login />} />
          <Route path="/detail-product" element={<DetailProduct />} />
          <Route path="/create-account" element={<CreateAccount />} />
          <Route path="/create-user" element={<CreateUserPage />} />
          <Route path="/login-user" element={<LoginUser />} />
          <Route path="/user-shopping" element={<UserShopping />} />
          <Route path="/user-profile" element={<UserProfile />} />
          <Route path="*" element={<Error404 />} />
        </Routes>
      </BrowserRouter>
    </PathContext.Provider>
    </>
  );

}

export default App;