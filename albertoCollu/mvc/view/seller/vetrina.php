<?php

require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/commons/viewerMagazineProducts.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);
$viewSellerProducts = TecnoShopManager::getInstance()->getDepotManager()->getSellerView();

if (count($viewSellerProducts) <= 0) {
        echo "<div class=\"updateCredit\">"
    . "<li class=\"noProducts\"><a class=\"linkAdd\" style=\"text-decoration: none\"> Non ci sono prodotti in Magazzino!</a></li>"
    . "</div>";
} else {
        echo viewerMagazineProducts::viewerMagazine($viewSellerProducts[0]);
}
?>
