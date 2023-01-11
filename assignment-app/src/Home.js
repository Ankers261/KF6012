import Footer from './Footer';
import './Home.css';
import homeImage from './home-image.jpg';


/**
 * Home component that holds simple information. This is the base component so this is the first place that the user lands.
 * 
 * @author Jason Ankers
 */

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