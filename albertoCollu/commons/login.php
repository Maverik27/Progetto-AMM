<?php 
/*
 * STEP 7:
 * 
 * Incluso il nostro controller principale e invoco il metodo "protect" che ci protegge le 
 * pagine.
 * 
 * Nota due cose:
 * 
 * 1) Includendo "TecnoShopManager", che a sua volta include "AccessManager", posso accedere
 *    tranquillamente alle costanti, dichiarate in "AccessManager", utili per proteggere le pagine
 * 
 * 2) Il livello d'accesso che passo come paramente DEVE essere lo stesso che ho dato nell'array $menu
 *    nella index.php, perché queste sono pagine raggiungili per l'appunto dalla sidebar.
 */
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_PUBLIC);
?>

<div class="logIn">
    
    <form action="index.php" method="post">
        <label>Email</label>
        <input type="text" name="email" value="">
        <label>Password</label>
        <input type="password" name="password" value="">
        <input type="hidden" name="action" value="login">
        <button type="submit">Login</button>
    </form>
    
</div>

