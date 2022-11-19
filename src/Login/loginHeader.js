import './Login.css';
import {Link} from "react-router-dom";
import React from "react";
import { TextField } from "@mui/material";
import { red } from '@mui/material/colors';
import { createTheme } from "@mui/material/styles";
import { ThemeProvider } from '@mui/material/styles';
import { Button } from "@mui/material"


const theme = createTheme({
  palette: {
    primary: {
      main: '#7895B2'
    },
  },

  typography: {
    allVariants: {
      fontFamily: 'Source Code Pro',
      fontSize: 24,
    },
  },
});

export default function logoHeader() {

  return (
    <ThemeProvider theme={theme}>
      <div className="centerClass">
        <div className="logoHeader">
              <h1 className="logoText">Voci</h1>
        </div>

        <div className="textField">
          <TextField 
            id="filled-basic" 
            label="Email" 
            variant="filled"
            placeholder='example@gmail.com'
          />
          <TextField id="filled-basic" label="Password" variant="filled" />
          <Button variant="contained">Login</Button>
        </div>
      </div>
    </ThemeProvider>
  );
}