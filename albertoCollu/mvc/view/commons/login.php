<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_GUEST);
?>
<div class="logImg">
    <img src="css/img/bakLogin.png" height="80" width="200">
    <img class="freccia" src="css/img/arrow.gif">
</div>
<div class="logIn">
    <img src="css/img/cornice.png" height="150" width="210">
    <form action="index.php" method="post">
        <br/>
        <label class="textLog">Email</label>
        <input class="textLog2" type="text" required="" name="email" value="">
        <br>
        <label class="textLog">Password</label>
        <input class="textLog2" type="password" required="" name="password" value="">
        <br>
        <input class="textLog2" type="hidden" name="action" value="login">
        <button class="textLog" type="submit">Login</button>
    </form>
</div>
<font face="Comic Sans ms"><i><h3 class="generali" style="text-align: center">Condizioni Generali di Uso e Vendita</h3></i></font>
<div class="condizioni">
    <ul>
        <li style="text-align: left; list-style-image: url(css/img/cond.png)">Condizioni generali d'uso</li>
        <ul>
            <li class="left" style="text-align: left; list-style-type: none; text-align: justify;">
                <br>
                Ti invitiamo a leggere con attenzione le presenti condizioni generali d'uso ("Condizioni Generali d'Uso") prima 
                di utilizzare i Servizi TecnoShop. Utilizzando i Servizi TecnoShop accetti integralmente le presenti Condizioni 
                Generali d'Uso. Offriamo un'ampia gamma di Servizi e talvolta potresti essere soggetto a termini e condizioni ulteriori. 
                In caso di utilizzo di un Servizio TecnoShop (ad esempio: Il Tuo Profilo, i Buoni Regalo o le applicazioni per dispositivi 
                mobili), sarai anche soggetto ai termini, alle linee guida e alle condizioni generali applicabili a quel determinato Servizio
                ("Termini del Servizio"). In caso di conflitto tra le presenti Condizioni Generali d'Uso e i Termini del Servizio, i Termini 
                del Servizio prevarranno.
            </li>
        </ul>
    </ul>
</div>
<div class="condizioni2">
    <ul>
        <li style="text-align: left; list-style-image: url(css/img/cond.png)">Condizioni generali di vendita</li>
        <ul>
            <li class="left" style="text-align: left; list-style-type: none; text-align: justify;">
                <br>
                Le presenti condizioni generali di vendita disciplinano la vendita di prodotti e, ove applicabili, 
                di servizi tramite il sito quando TecnoShop s.p.a. opera come venditore ("Condizioni Generali di Vendita"). 
                La vendita di prodotti da parte di venditori terzi sarà regolata dai termini e dalle condizioni di vendita 
                di volta in volta applicabili.
            </li>
        </ul>
    </ul>
</div>
<div class="volFirstVisit">
    <font face="Comic Sans ms"><i><h3>Prima volta su TecnoShop? Inizia Ora!</h3></i></font>
    <a href="http://spano.sc.unica.it/colluAlberto/progetto/index.php?page=registrati"><img src="css/img/regImg.png"></a>
</div>
