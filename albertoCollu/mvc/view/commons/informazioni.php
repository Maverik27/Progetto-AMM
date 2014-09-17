<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_PUBLIC);
?>


<h1>Info Applicazione</h1>

<p class="description" style="text-align: justify;">
    L'applicazione vede l'utilizzo di due tipi di utente, il Buyer ed il Seller, come utenti principali, 
    oltre queste due tipologie di utente troviamo le figure dell'utente Guest (non viene contemplato come 
    un utente in sessione ma appunto come visitatore) che ha solo la possibilità di navigare nel sito senza
    poter acquistare dei prodotti; la seconda figura non gestita è l'utente Admin (non viene contemplato come 
    un utente in sessione) che ha la visibilità pressochè totale delle pagine e può effettuare operazioni sia 
    specifiche del Buyer che del Seller. 
    <br/>
    <br/>
    Se loggati come Buyer si ha la possibilità di ricaricare del credito, acquistare un prodotto (l'acquisto non è stato 
    implementato del tutto: "l'acquirente riceve un messaggio di avvenuto acquisto e viene rimandato ad una pagina con 
    informazioni varie"), visualizzare per tipologia i prodotti in vendita e modificare il proprio profilo utente.
    <br/>
    <br/>
    Se loggati come Seller si ha la possibilità di aggiungere un nuovo prodotto, visualizzare la PROPRIA vetrina prodotti
    (solo quelli in vendita per il seller loggato - vedere anche: 
    <br>seller2@gmail.com pw: seller2) e, anche per il seller, 
    modificare il profilo utente.
    <br/>
    <br/>
    Sono inoltre messe a disposizione delle pagine di contorno come la pagina welcome che contiene le informazioni "dell'Azienda" e 
    i link alle altre pagine di contorno come la pagina Contattaci e la pagina informazioni. 
    <br/>
    <br/>
<fieldset class="unfo">
    <legend>Credenziali per accedere al Sito</legend>
    <ul class="usersInfo">
        <h5>Buyer</h5>
        <ul class="usersInfo">
            <li>email: buyer@gmail.com</li>
            <li>password: buyer</li>
        </ul>
        <h5>Seller</h5>
        <ul class="usersInfo">
            <li>email: seller@gmail.com</li>
            <li>password: seller</li>
        </ul>
        <h5>Admin</h5>
        <ul class="usersInfo">
            <li>email: admin@gmail.com</li>
            <li>password: admin</li>
        </ul>
    </ul>
</fieldset>
</p>
<ul  class="requis1">
    <li>Utilizzo di HTML e CSS</li>
    <li>Utilizzo di PHP e MySQL</li>
    <li>Utilizzo del pattern MVC</li>
    <li>Almeno due ruoli [Buyer e Seller]</li>
</ul>
<ul  class="requis2"> 
    <li>Almeno una transazione [User "realUpdateCredit"]</li>
    <li>Almeno una funzionalità javascript [GuestButton]</li>
</ul>
<ul  class="ajax">
    <li>Almeno una funzionalità ajax</li> 
</ul>
