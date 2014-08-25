<?php
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/commons/viewerMagazineProducts.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);

$type = "Desktop";
$desktop = TecnoShopManager::getInstance()->getGuestManager()->getGuestView($type);
?>

<?php
if (count($desktop)) {
    for ($i = 0; $i < count($desktop); $i++) {
        ?> 
        <br/>
        <div class="vetrina">
            <div class="template3">
                <div class="info3">
                    <fieldset>
                        <legend style="text-align: left">Dati prodotto</legend>
                        <ul>
                            <li class="riepilogo"><?php echo $desktop[$i]->getType() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getBrand() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getModel() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getInces() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getOs() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getRam() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getCpu() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getStorage() ?></li>
                            <li class="riepilogo"><?php echo $desktop[$i]->getGpu() ?></li>
                        </ul>
                    </fieldset>
                </div>
                <div class="photo3"><img src="css/img/code.jpg"></div>
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