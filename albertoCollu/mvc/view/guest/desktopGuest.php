<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);

$type = "Desktop";
$arrayTypeRequest = TecnoShopManager::getInstance()->getGuestManager()->getGuestView($type);
?>

<?php
if (count($arrayTypeRequest)) {
    for ($i = 0; $i < count($arrayTypeRequest); $i++) {
        ?> 
        <br/>
        <div class="vetrina">
            <div class="template3">
                <div class="info3">
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
                
                <div class="photo3"><img src="css/img/Desktop.png"></div>
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