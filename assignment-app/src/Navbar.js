import {Link} from 'react-router-dom';

function Navbar() {
    return (
      <div className="Navbar">
        <ul>
          <li><Link to = "/">Home</Link></li>
          <li><Link to = "/Papers">Papers</Link></li>
          <li><Link to = "/Interactivity">Interactivity</Link></li>
          <li><Link to = "/Fullpapers">Fullpapers</Link></li>
          <li><Link to = "/Wip">Wip</Link></li>
          <li><Link to = "/Competition">Competition</Link></li>
          <li><Link to = "/Doctoral">Doctoral</Link></li>
          <li><Link to = "/Rapid">Rapid</Link></li>
        </ul>
      </div>
    );
  }
  
  export default Navbar;