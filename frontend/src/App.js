import './css/App.css';

import Home from './pages/Home';
import Login from './pages/Login';
import DetailProduct from './pages/DetailProduct';
import CreateAccount from './pages/CreateAccount';
import CreateUserPage from './pages/CreateUserPage';
import Error404 from './pages/Error404';

import { Routes, Route, BrowserRouter } from "react-router-dom";


function App() {

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/login" element={<Login />} />
          <Route path="/detail-product" element={<DetailProduct />} />
          <Route path="/create-account" element={<CreateAccount />} />
          <Route path="/create-user" element={<CreateUserPage />} />
          <Route path="*" element={<Error404 />} />
        </Routes>
      </BrowserRouter>
    </>
  );

}

export default App;