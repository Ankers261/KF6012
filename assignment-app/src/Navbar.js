import {Link} from 'react-router-dom';
import './Navbar.css';

function Navbar() {

  /**
   * This function was required as the track pages were not refreshing the papers data when navigating between tracks.
   * 
   * @author sigmapi13 - stack overflow
   */
  function refreshPage() {
    setTimeout(() => {
        window.location.reload(false);
    }, 250);
}

  return (
    <div className="Navbar">
      <ul>
        <li><Link className = 'link' to = "/">Home</Link></li>
        <li><Link className = 'link' to = "/Admin">Admin</Link></li>
        <li><Link className = 'link' to = "/Papers">Papers</Link></li>
        <li><Link className = 'track' to = "/Interactivity"  onClick={refreshPage}>Interactivity</Link></li>
        <li><Link className = 'track' to = "/Fullpapers" onClick={refreshPage}>Fullpapers</Link></li>
        <li><Link className = 'track' to = "/Wip" onClick={refreshPage}>Wip</Link></li>
        <li><Link className = 'track' to = "/Competition" onClick={refreshPage}>Competition</Link></li>
        <li><Link className = 'track' to = "/Doctoral" onClick={refreshPage}>Doctoral</Link></li>
        <li><Link className = 'track' to = "/Rapid" onClick={refreshPage}>Rapid</Link></li>
      </ul>
    </div>
  );
  }
  
  export default Navbar;