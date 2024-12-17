// src/pages/_app.js
import React from 'react';
import '../styles/Main.css';  // Import your global CSS here

function MyApp({ Component, pageProps }) {
  return (
    <Component {...pageProps} />
  );
}

export default MyApp;
