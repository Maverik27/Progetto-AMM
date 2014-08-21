<?php
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/commons/viewerMagazineProducts.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);

for ($i = 0; $i < 4; $i++) {
    echo viewerMagazineProducts::viewerProductsToBy();
}
?>