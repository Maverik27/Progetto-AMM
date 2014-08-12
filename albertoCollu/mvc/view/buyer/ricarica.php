<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);

$credit = TecnoShopManager::getInstance()->getInputManager()->getInput("credit");
$total= TecnoShopManager::getInstance()->getAccessManager()->getUser()->getCredit();
?>

<div class="titleReg"><h1>Ricarica Credito</h1></div>

<div class="credit">
    <div><h3>Il tuo credito è <?php echo $total; ?> &euro;</h3></div>
    <form class="" action="index.php?page=ricarica&action=addCredit" method="post">
        <div>
            <label for="credit">importo da ricaricare</label>
            <input class="inReg" type="text" name="credit" placeholder="inserisci credito" value="">
        </div>
        <br/>
        <button class="inReg" type="submit" name="action" value="addCredit">Ricarica</button>
    </form>
</div>

<?php
if($credit){
    echo "<div><h3>Importo di ". $credit . " &euro; ricaricato correttamente!</h3></div>";
}
?>