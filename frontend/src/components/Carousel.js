import React from 'react';


export default class Carousel extends React.Component {

  render() {
    return (
        <div id="carouselExampleAutoplaying" className="carousel slide" data-bs-ride="carousel">
        <div className="carousel-inner">
          <div className="carousel-item active">
            <img src="http://wallpapers.net/xbox-one-custom-background-wallpaper-for-desktop-mobiles/download/1500x500.jpg" className="d-block w-100"/>
          </div>
          <div className="carousel-item">
            <img src="https://cdn.shopify.com/s/files/1/2284/9471/collections/Liberties_aren_t_given_they_are_taken.__Aldous_Huxley_2_9b8d9316-c819-4a24-b59c-c66e57be2baf.png?v=1516136818" className="d-block w-100"/>
          </div>
          <div className="carousel-item">
            <img src="https://www.enter.co/wp-content/uploads/2021/11/letsgo-1500x500.jpg" className="d-block w-100"/>
          </div>
        </div>
        <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span className="carousel-control-prev-icon" aria-hidden="true"></span>
          <span className="visually-hidden">Previous</span>
        </button>
        <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span className="carousel-control-next-icon" aria-hidden="true"></span>
          <span className="visually-hidden">Next</span>
        </button>
      </div>
    );
  }

}