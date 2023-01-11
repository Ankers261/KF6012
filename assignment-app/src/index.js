import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import { BrowserRouter } from 'react-router-dom';

/**
 * 
 * index component that wraps the rest of the app in a browser router
 * 
 * @author Jason Ankers
 */

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <BrowserRouter basename='/webYear3/assignment/app'>
      <App />
    </BrowserRouter>
  </React.StrictMode>
);


