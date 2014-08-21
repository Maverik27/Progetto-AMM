<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_PUBLIC);
?>

<div class="contattaci">
    <div class="contTitle">
        <h2>Serve aiuto? Contattaci!</h2>
    </div>
    <div class="secText"><h4>Inviaci un' email:</h4></div>
    <a href="mailto:albe.collu@gmail.com"><img class="mail" src="css/img/email.png"></a>    
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="secText"><h4>Oppure chiama i numeri gratuiti:</h4></div>
    <ul class="phonefax">
        <li style="list-style-image: url(css/img/tel.png)">Telefono 1: 06-7951254</li>
        <li style="list-style-image: url(css/img/tel.png)">Telefono 2: 06-2459157</li>
    </ul>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="secText"><h4>Oppure inviaci un Fax ai numeri:</h4></div>
    <ul class="phonefax">
        <li style="list-style-image: url(css/img/fax.png)">Fax 1:      06-4982573</li>
        <li style="list-style-image: url(css/img/fax.png)">Fax 2:      06-9757642</li>
    </ul>
</div>