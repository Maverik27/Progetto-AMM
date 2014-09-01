<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);

$type = "Tablet";
$tablet = TecnoShopManager::getInstance()->getGuestManager()->getGuestView($type);
?>

<?php
if (count($tablet)) {
    for ($i = 0; $i < count($tablet); $i++) {
        ?> 
        <br/>
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
                <div class="photo3"><img src="css/img/tablet.png"></div>
                <div class="price3">Prezzo non visibile per utenti Guest</div>
                <script>
                    function guestCantBay() {
                        alert("Non puoi acquistare se non sei registrato. Registrati oppure effettua il login al nostro sito.");
                    }
                </script>
                <button class="bayProdGuest" onclick="guestCantBay()">Compra</button>
            </div>
        </div>
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