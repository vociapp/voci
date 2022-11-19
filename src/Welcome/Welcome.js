import './Welcome.css';
import {Link} from "react-router-dom";
import React from "react";

/**
 * Welcome is the welcoming screen for new users of VOCI.
 * @returns {JSX.Element}
 * @constructor
 */
function Welcome() {
    return (
        <div className="App">
            <h1>Welcome to VOCI</h1>
            <p>Temporary Navigation</p>
            <Link to="Login">Login</Link>
            <Link to="Register">Register</Link>
            <Link to="Settings">Settings</Link>
            <Link to="Cards">Cards</Link>
            <Link to="Home">Home</Link>
            <Link to="Welcome">Welcome (This Page)</Link>
        </div>
  );
}

export default Welcome;
