<?php
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/commons/viewerMagazineProducts.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);

for($i=0; $i<5 ; $i++){
echo viewerMagazineProducts::viewerMagazine();
}
?>
