import './Login.css';
import {Link} from "react-router-dom";
import React from "react";
import { TextField } from "@mui/material"

function logoHeader() {
  return (
    <div className="centerClass">
      <div className="logoHeader">
            <h1 className="logoText">Voci</h1>
      </div>

      <div className="textField">
        <TextField id="filled-basic" label="Email" variant="filled" />
        <TextField id="filled-basic" label="Password" variant="filled" />
      </div>
    </div>
  );
}

export default logoHeader;