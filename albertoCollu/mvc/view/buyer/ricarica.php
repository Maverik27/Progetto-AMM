<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);
?>

<div class="titleReg"><h1>Ricarica Credito</h1></div>

<div class="credit">
    <form class="" action="index.php?page=ricarica&action=addCredit" method="post">
        <div>
            <label for="text">importo da ricaricare</label>
            <input class="inReg" type="text" name="name" placeholder="0.0" value="">
        </div>
        <br/>
        <button class="inReg" type="submit" name="action" value="addCredit">Ricarica</button>
    </form>
</div>