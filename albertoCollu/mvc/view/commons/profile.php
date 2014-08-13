<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_EVERYBODY);
$user = TecnoShopManager::getInstance()->getAccessManager()->getUser();
$isChange = TecnoShopManager::getInstance()->getUserManager()->isChange();
?>

<?php
if (!$isChange) {
    ?>
    <div class="titleReg"><h1>Modifica i tuoi dati</h1></div>

    <div class="changeProfile">
        <fieldset><legend>I miei Dati</legend>
            <br/>
            <form class="" action="index.php?page=profile&action=changeData" method="post">
                <div>
                    <label for="email">email</label>
                    <input class="inReg" type="text" name="email" value="<?php echo $user->getEmail(); ?>">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="name">nome</label>
                    <input class="inReg" type="text" name="name" value="<?php echo $user->getName(); ?>">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="surname">cognome</label>
                    <input class="inReg" type="text" name="surname" value="<?php echo $user->getSurname(); ?>">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="address">indirizzo</label>
                    <input class="inReg" type="text" name="address" value="<?php echo $user->getAddress(); ?>">
                </div>
                <br/>
                <br/>
                <button class="inReg" type="submit" name="action" value="changeData">Conferma modifiche</button>
        </fieldset>
    </form>
    </div>

    <?php
} else {
    echo "<div class=\"changeData\">"
    . "<li class=\"titleProfile\"><a class=\"linkAdd\" style=\"text-decoration: none\">Modifiche avvenute con successo!</a></li>"
    . "</div>";
}
?>