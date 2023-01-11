import {Link} from 'react-router-dom';
import './Navbar.css';

function Navbar() {
    return (
      <div className="Navbar">
        <ul>
          <li><Link className = 'link' to = "/">Home</Link></li>
          <li><Link className = 'link' to = "/Papers">Papers</Link></li>
          <li><Link className = 'track' to = "/Interactivity">Interactivity</Link></li>
          <li><Link className = 'track' to = "/Fullpapers">Fullpapers</Link></li>
          <li><Link className = 'track' to = "/Wip">Wip</Link></li>
          <li><Link className = 'track' to = "/Competition">Competition</Link></li>
          <li><Link className = 'track' to = "/Doctoral">Doctoral</Link></li>
          <li><Link className = 'track' to = "/Rapid">Rapid</Link></li>
        </ul>
      </div>
    );
  }
  
  export default Navbar;