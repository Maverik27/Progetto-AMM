<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);
?>
<div class="vetrina">
    <div class="template">
        <div class="info">
            <fieldset>
                <legend>Dati Prodotto</legend>
                <ul>
                    <li class="riepilogo"><text class="tx">Tablet</text></li>
                    <br/>
                    <li class="riepilogo"><text class="tx">Samsung</text></li>
                    <br/>
                    <li class="riepilogo"><text class="tx">Galaxy Note 10.1</text></li>
                    <br/>
                    <li class="riepilogo"><text class="tx">10</text></li>
                </ul>
            </fieldset>
        </div>
        <div class="photo">
            <img src="css/img/vetrina1.png">
        </div>
        <div class="price">
            Prezzo 499
        </div>                      
    </div>
</div>
<br/>