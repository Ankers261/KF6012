import './App.css';
import Home from './Home';
import React from 'react';
import {BrowserRouter as Router, Link, Route, Routes} from 'react-router-dom';

function App() {
  return (
    <div className="App">
      <Router>
        <Routes>
          <Route path ="/" element = {<Home/>}/>
        </Routes>
      </Router>
    </div>
  );
}

export default App;
