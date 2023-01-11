import './App.css';
import Home from './Home';
import React, { useState } from 'react';
import Papers from './Papers';
import Track from './Track';
import Navbar from './Navbar';
import Admin from './Admin';
import {Route, Routes} from 'react-router-dom';

function App() {

  const [authenticated, setAuthenticated] = useState(false);

  const handleAuthenticated = (isAuthenticated) => {setAuthenticated(isAuthenticated)};

  return (
    <div className="App">
      <div className='navbar'>
        <Navbar/>
      </div>
        <Routes>
          <Route path ="/" element = {<Home/>}/>
          <Route path = "/Papers" element = {<Papers/>} />
          <Route path = "/Admin" element = {<Admin authenticated = {authenticated} handleAuthenticated = {handleAuthenticated} />} />
          <Route path = "/Interactivity" element = {<Track sName = "Interactivity"/>} />
          <Route path = "/Fullpapers" element = {<Track sName = "fullpapers"/>} />
          <Route path = "/Wip" element = {<Track sName = "wip"/>} />
          <Route path = "/Competition" element = {<Track sName = "competition"/>} />
          <Route path = "/Doctoral" element = {<Track sName = "doctoral"/>} />
          <Route path = "/Rapid" element = {<Track sName = "rapid"/>} />
        </Routes>
    </div>
  );
}

export default App;
