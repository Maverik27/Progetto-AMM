<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);

$type = "Desktop";
$arrayTypeRequest = Depot::getBuyerProduct($type);
?>

<?php
if (count($arrayTypeRequest)) {
    for ($i = 0; $i < count($arrayTypeRequest); $i++) {
        ?> 
        <br/>
        <form action="index.php?page=comprato" method="post">
            <div class="vetrina">
                <div class="template2">
                    <div class="info2">
                        <fieldset>
                            <legend style="text-align: left">Dati prodotto</legend>
                            <ul>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getType() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getBrand() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getModel() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getInces() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getOs() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getRam() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getCpu() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getStorage() ?></li>
                                <li class="riepilogo"><?php echo $arrayTypeRequest[$i]->getGpu() ?></li>
                            </ul>
                        </fieldset>
                    </div>

                    <div class="photo2"><img src="css/img/Desktop.png"></div>
                    <?php
                    for ($j = 0; $j < $arrayTypeRequest[$i]->depotSize(); $j++) {
                        $name = $arrayTypeRequest[$i]->getAllDepots($j)->getSeller()->getName();
                        $surname = $arrayTypeRequest[$i]->getAllDepots($j)->getSeller()->getSurname();
                        $nitems = $arrayTypeRequest[$i]->getAllDepots($j)->getNItems();
                        $price = $arrayTypeRequest[$i]->getAllDepots($j)->getPrice();
                        ?>
                        <ul style="list-style-type: none;">
                            <li class="sellerInfo"><?php echo 'Venduto da: ' . $name . " " . $surname ?></li>
                            <li class="price2"><?php echo $price ?>&euro;</li>
                            <li class="items">Solo #<?php echo $nitems ?> disponibili!!</li>
                        </ul>
                    <?php } ?>
                    <button class="bayProd" action="submit">Compra</button>
                </div>
            </div>
        </form>
        <?php
    }
} else {
    ?>
    <div class="updateCredit">
        <li class="noProducts"><a class="linkAdd" style="text-decoration: none">Non ci sono prodotti in magazzino</a></li>
    </div>
    <?php
}
?>