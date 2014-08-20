<?php
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'ViewerMagazine.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);

for($i=0; $i<3 ; $i++){
echo ViewerMagazine::viewerMagazine();
}
?>
