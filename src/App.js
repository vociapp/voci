import React from 'react';
import { Routes, Route } from "react-router-dom"

import Welcome from './Welcome/Welcome'
import Login from './Login/loginHeader'
import Register from './Register/Register'
import Cards from './Cards/Cards'
import Home from './Home/Home'
import Settings from './Settings/Settings'

/**
 * App is used as a means to route to all other React components. It initially redirects the user to Welcome()
 * @author Jon Steele jonwhsteele@gmail.com
 */
function App(){
    return(
        <Routes>
            <Route path={"/"} element={ <Welcome/>}></Route>
            <Route path={"Login"} element={ <Login/>}></Route>
            <Route path={"Register"} element={ <Register/>}></Route>
            <Route path={"Cards"} element={ <Cards/>}></Route>
            <Route path={"Home"} element={ <Home/>}></Route>
            <Route path={"Settings"} element={ <Settings/>}></Route>
        </Routes>
    );
}

export default App;