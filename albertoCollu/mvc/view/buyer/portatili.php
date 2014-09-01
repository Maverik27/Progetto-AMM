<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);

$type = "Notebook";
$tablet = Depot::getBuyerProduct($type);
?>

<?php
if (count($tablet)) {
    for ($i = 0; $i < count($tablet); $i++) {
        ?> 
        <br/>
        <form action="index.php?page=comprato" method="post">
            <div class="vetrina">
                <div class="template3">
                    <div class="info3">
                        <fieldset>
                            <legend style="text-align: left">Dati prodotto</legend>
                            <ul>
                                <li class="riepilogo"><?php echo $tablet[$i]->getType() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getBrand() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getModel() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getInces() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getOs() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getRam() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getCpu() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getStorage() ?></li>
                                <li class="riepilogo"><?php echo $tablet[$i]->getGpu() ?></li>
                            </ul>
                        </fieldset>
                    </div>

                    <div class="photo3"><img src="css/img/pcPortatili.png"></div>
                    <?php
                    for ($j = 0; $j < $tablet[$i]->depotSize(); $j++) {
                        $name = $tablet[$i]->getAllDepots($j)->getSeller()->getName();
                        $surname = $tablet[$i]->getAllDepots($j)->getSeller()->getSurname();
                        $nitems = $tablet[$i]->getAllDepots($j)->getNItems();
                        $price = $tablet[$i]->getAllDepots($j)->getPrice();
                        ?>
                        <div class="price3"><?php echo 'Venduto da: ' . $name . " " . $surname ?></div>
                        <div class="price3"><?php echo $nitems . "    " . $price ?>&euro;</div>
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