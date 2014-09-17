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
    <div class="profileImg">
        <img src="css/img/companyprofile.png" height="650" width="560">
        <div class="changeProfile">
            <fieldset><legend>I miei Dati</legend>
                <br/>
                <form class="" action="index.php?page=profile&action=changeData" method="post">
                    <div>
                        <label for="email">email</label>
                        <input class="inReg" type="text" required="" name="email" value="<?php echo $user->getEmail(); ?>">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="name">nome</label>
                        <input class="inReg" type="text" required="" name="name" value="<?php echo $user->getName(); ?>">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="surname">cognome</label>
                        <input class="inReg" type="text" required="" name="surname" value="<?php echo $user->getSurname(); ?>">
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
    </div>
    <div class="profilePen">
        <img src="css/img/pen.png">
    </div>
    <?php
} else {
    echo "<div class=\"changeData\">"
    . "<li class=\"titleProfile\"><a class=\"linkAdd\" style=\"text-decoration: none\">Modifiche avvenute con successo! Torna alla "
    . "<a class=\"linkAdd\" href=\"http://spano.sc.unica.it/colluAlberto/progetto/index.php?page=welcome\">HomePage!</a></a></li>"
    . "</div>"
    . "<img class=\"ingran\" src=\"css/img/ingra1.gif\">";
}
?>