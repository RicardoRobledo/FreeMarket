import './css/App.css';

import Home from './pages/Home';
import Login from './pages/Login';
import DetailProduct from './pages/DetailProduct';
import Error404 from './pages/Error404'

import { Routes, Route, BrowserRouter } from "react-router-dom";


function App() {

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/login" element={<Login />} />
          <Route path="/detail-product" element={<DetailProduct />} />
          <Route path="*" element={<Error404 />} />
        </Routes>
      </BrowserRouter>
    </>
  );

}

export default App;