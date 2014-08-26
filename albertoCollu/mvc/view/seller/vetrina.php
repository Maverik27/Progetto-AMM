<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);
$viewSellerProducts = TecnoShopManager::getInstance()->getDepotManager()->getSellerView();
?>

<?php if (count($viewSellerProducts) <= 0) { ?>
    <div class="updateCredit">
        <li class="noProducts"><a class="linkAdd" style="text-decoration: none">Non ci sono prodotti in magazzino</a></li>
    </div>

    <?php
} else {
    for ($i = 0; $i < count($viewSellerProducts); $i++) {
        ?>
        <br>
        <div class="vetrina">
            <div class="template1">
                <div class="info1">
                    <fieldset>
                        <legend style="text-align: left">Dati prodotto</legend>
                        <ul>
                            <li class="riepilogo"><?php echo $viewSellerProducts[$i]->getType() ?></li>
                            <li class="riepilogo"><?php echo $viewSellerProducts[$i]->getBrand() ?></li>
                            <li class="riepilogo"><?php echo $viewSellerProducts[$i]->getModel() ?></li>
                            <li class="riepilogo"><?php echo $viewSellerProducts[$i]->getAddInfo(0) ?></li>
                        </ul>
                    </fieldset>
                </div>
                <div class="photo1">
                    <?php
                    $temp = $viewSellerProducts[$i]->getType();
                    if ($temp == "Desktop") {
                        ?>
                        <img src="css/img/Desktop.png">
                    <?php } elseif ($temp == "Notebook") {
                        ?>
                        <img src="css/img/pcPortatili.png">
                    <?php } else {
                        ?>
                        <img src="css/img/tablet.png">
                    <?php }
                    ?>
                </div>
                <div class="price1"><?php echo $viewSellerProducts[$i]->getAddInfo(1) ?> &euro;</div>
            </div>
        </div>
        <?php
    }
}
?>