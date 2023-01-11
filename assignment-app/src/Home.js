import Footer from './Footer';
import './Home.css';
import homeImage from './home-image.jpg';

function Home() {
  return (
    <div className="Home">
        <h1>CHI PLAY '21</h1>
        <img src = {homeImage} alt = "Conference hall"/>
        <p>Overview text goes here...</p>
        <Footer/>
    </div>
  );
}

export default Home;