<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>


    <div class="login-box">
    <img src="webroot/img/avatar.png" class="avatar">
        <img src="webroot/img/Tunstall.png" class="logo">
            <form action="home/login" method="POST" id="login">
                <p>Username</p>
                <input type="text" name="username" id="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" id="password" placeholder="Enter Password">
                <input type="submit" name="submit" value="Login" class="btn_submit">
                <span id="Mensaje"></span>    
            </form>
        
        
        </div>
    

