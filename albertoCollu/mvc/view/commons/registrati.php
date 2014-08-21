<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_PUBLIC);

$isRegistered = TecnoShopManager::getInstance()->getAccessManager()->isRegistered();
?>

<?php
if (!$isRegistered) {
    ?>

    <div class="titleReg"><h1>Inserisci i tuoi dati e completa la Registrazione</h1></div>

    <div class="registration">
        <form class="" action="index.php?page=registrati&action=register" method="post">
            <fieldset><legend><h3>Scheda dati Utente</h3></legend>
                <br/>
                <div>
                    <label for="email">email</label>
                    <input class="inReg" type="text" name="email" value="">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="password">password</label>
                    <input class="inReg" type="password" name="password" value="">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="password">ripeti password</label>
                    <input class="inReg" type="password" name="repeatPassword" value="">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="text">nome</label>
                    <input class="inReg" type="text" name="name" value="">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="text">cognome</label>
                    <input class="inReg" type="text" name="surname" value="">
                </div>
                <br/>
                <br/>
                <div>
                    <label for="text">tipologia utente</label>
                    <select class="inReg" name="identity">
                        <option value="<?php echo User::IDENTITY_BUYER ?>" selected="selected">Compratore</option>
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
    <?php
} else {
    echo "<div class=\"updateCredit\">"
    . "<li class=\"titleProfile\"><a class=\"linkAdd\" style=\"text-decoration: none\">Grazie per esserti registrato!</a></li>"
    . "</div>";
}?>