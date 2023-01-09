import './App.css';
import Home from './Home';
import React from 'react';
import Interactivity from './Interactivity';
import Fullpapers from './Fullpapers';
import Wip from './Wip';
import Competition from './Competition';
import Doctoral from './Doctoral';
import Rapid from './Rapid';
import {BrowserRouter as Router, Route, Routes} from 'react-router-dom';

function App() {
  return (
    <div className="App">
      <Router>
        <Routes>
          <Route path ="/" element = {<Home/>}/>
          <Route path = "/Interactivity" element = {<Interactivity/>} />
          <Route path = "/Fullpapers" element = {<Fullpapers/>} />
          <Route path = "/Wip" element = {<Wip/>} />
          <Route path = "/Competition" element = {<Competition/>} />
          <Route path = "/Doctoral" element = {<Doctoral/>} />
          <Route path = "/Rapid" element = {<Rapid/>} />
        </Routes>
      </Router>
    </div>
  );
}

export default App;
