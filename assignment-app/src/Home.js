import Navbar from './Navbar';
import Footer from './Footer';
import homeImage from './home-image.jpg';

function Home() {
  return (
    <div className="Home">
        <h1>CHI PLAY '21</h1>
        <p>Overview text goes here...</p>
        <img src = {homeImage} alt = "Conference hall"/>
        <Footer/>
    </div>
  );
}

export default Home;