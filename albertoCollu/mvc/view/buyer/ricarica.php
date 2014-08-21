<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);

$credit = TecnoShopManager::getInstance()->getInputManager()->getInput("credit");
$total = TecnoShopManager::getInstance()->getAccessManager()->getUser()->getCredit();
?>

<div class="titleReg"><h1>Ricarica Credito</h1></div>

<div class="credit">
    <form class="" action="index.php?page=ricarica&action=addCredit" method="post">
        <fieldset><legend><h3>Il tuo credito è <?php echo $total; ?> &euro;</h3></legend>
            <br/>
            <div>
                <label for="credit"></label>
                <input class="inRegRic" type="text" name="credit" placeholder="inserisci credito" value="">
                <button class="inRegRica" type="submit" name="action" value="addCredit">Ricarica</button>
            </div>
        </fieldset>
    </form>
</div>

<?php
if ($credit) {
    echo "<div class=\"updateCredit\">"
    . "<li class=\"titleProfile\"><a class=\"linkAdd\" style=\"text-decoration: none\">Importo di " . $credit . " &euro; ricaricato correttamente!</a></li>"
    . "</div>";
}
?>
