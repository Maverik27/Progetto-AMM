<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_EVERYBODY);
$user= TecnoShopManager::getInstance()->getAccessManager()->getUser();
?>

<div class="titleReg"><h1>Modifica i tuoi dati</h1></div>

<div class="changeProfile">
    <form class="" action="index.php?page=profile&action=changeData" method="post">
        <div>
            <label for="email">email</label>
            <input class="inReg" type="text" name="email" placeholder="<?php echo $user->getEmail();?>" value="">
        </div>
        <br/>
        <div>
            <label for="text">nome</label>
            <input class="inReg" type="text" name="name" placeholder="<?php echo $user->getName();?>" value="">
        </div>
        <br/>
        <div>
            <label for="text">cognome</label>
            <input class="inReg" type="text" name="surname" placeholder="<?php echo $user->getSurname();?>" value="">
        </div>
        <br/>
        <div>
            <label for="text">tipologia utente</label>
            <select class="inReg" name="identity">
                <option value="<?php echo User::IDENTITY_BUYER?>" selected="selected">Compratore</option>
                <option value="<?php echo User::IDENTITY_SELLER?>">Venditore</option>
            </select>           
        </div>    
        <br/>
        <div>
            <label for="text">indirizzo</label>
            <input class="inReg" type="text" name="address" placeholder="<?php echo $user->getAddress();?>" value="">
        </div>
        <br/>
        <button class="inReg" type="submit" name="action" value="changeData">Conferma modifiche</button>
    </form>
</div>