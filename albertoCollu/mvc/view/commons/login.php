<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);
?>

<div class="logIn">
    <form action="index.php" method="post">
        <br/>
        <label>Email</label>
        <input type="text" required="" name="email" value="">
        <label>Password</label>
        <input type="password" required="" name="password" value="">
        <input type="hidden" name="action" value="login">
        <button type="submit">Login</button>
    </form>
</div>

