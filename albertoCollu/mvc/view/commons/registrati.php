<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);

$isRegistered = TecnoShopManager::getInstance()->getAccessManager()->isRegistered();
?>

<?php
if (!$isRegistered) {
    ?>

    <div class="titleReg"><h1>Inserisci i tuoi dati e completa la Registrazione</h1></div>
    <div class="profileImg2">
        <img src="css/img/companyprofile.png" height="650" width="560">
        <div class="registration">
            <form class="" action="index.php?page=registrati&action=register" method="post">
                <fieldset><legend><h3>Scheda dati Utente</h3></legend>
                    <br/>
                    <div>
                        <label for="email">email</label>
                        <input class="inReg" type="text" name="email" required="" value="">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="password">password</label>
                        <input class="inReg" type="password" required="" name="password" value="">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="password">ripeti password</label>
                        <input class="inReg" type="password" required="" name="repeatPassword" value="">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="text">nome</label>
                        <input class="inReg" type="text" required="" name="name" value="">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="text">cognome</label>
                        <input class="inReg" type="text" required="" name="surname" value="">
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <label for="text">tipologia utente</label>
                        <select class="inReg" name="identity">
                            <option value="<?php echo User::IDENTITY_BUYER ?>" selected="selected">Acquirente</option>
                            <option value="<?php echo User::IDENTITY_SELLER ?>">Venditore</option>
                        </select>           
                    </div>    
                    <br/>
                    <br/>
                    <div>
                        <label for="text">indirizzo</label>
                        <input class="inReg" type="text" name="address" value="">
                    </div>
                    <br/>
                    <br/>
                    <button class="inReg" type="submit" name="action" value="register">Registrati</button>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="profilePen2">
        <img src="css/img/pen.png">
    </div>
    <?php
} else {
    echo "<div class=\"changeData\">"
    . "<li class=\"titleProfile\"><a class=\"linkAdd\" style=\"text-decoration: none\">Grazie per esserti registrato! Torna alla "
    . "<a class=\"linkAdd\" href=\"http://localhost/Prove-SitoWeb/albertoCollu/index.php?page=welcome\">HomePage!</a></a></li>"
    . "</div>"
    . "<img class=\"mano\" src=\"css/img/mano.gif\">";
}?>