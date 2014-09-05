<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);

echo "<div class=\"changeData\">"
    . "<li class=\"titleProfile\"><a class=\"linkAdd\" style=\"text-decoration: none\">Prodotto Acquistato Correttamente</a></li>"
    . "</div>";