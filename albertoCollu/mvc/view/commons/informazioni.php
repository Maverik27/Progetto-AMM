<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_PUBLIC);
?>


<h1>Info Applicazione</h1>

<p class="description">
    L'applicazione vede l'utilizzo di due tipi di utente, il Buyer ed il Seller, come utenti principali, 
    oltre queste due tipologie di utente troviamo le figure dell'utente Guest (non viene contemplato come 
    un utente in sessione ma appunto come visitatore) che ha solo la possibilità di navigare nel sito senza
    poter acquistare dei prodotti; la seconda figura non gestita è l'utente Admin (non viene contemplato come 
    un utente in sessione) che ha la visibilità pressochè totale delle pagine e può effettuare operazioni sia 
    specifiche del Buyer che del Seller. 
    <br/>
    <br/>
    Se loggati come Buyer si ha la possibilità di ricaricare del credito, acquistare un prodotto, visualizzare per
    tipologia i prodotti in vendita, modificare il proprio profilo utente ed effetuare una ricerca per marca e modello 
    dei prodotti presenti nel "Magazzino".
    <br/>
    <br/>
    Se loggati come Seller si ha la possibilità di aggiungere un nuovo prodotto, visualizzare la PROPRIA vetrina prodotti
    (solo quelli in vendita per il seller loggato) e, anche per il seller, modificare il profilo utente.
    <br/>
    <br/>
    Sono inoltre messe a disposizione delle pagine di contorno come la pagina welcome che contiene le informazioni del sito e 
    i link alle altre pagine di contorno come la pagina per la registrazione la pagina per il login e la pagina per la ricerca. 
    <br/>
    <br/>
<ul class="requisiti">
    <li>Utilizzo di HTML e CSS [SI]</li>
    <li>Utilizzo di PHP e MySQL [SI]</li>
    <li>Utilizzo del pattern MVC [SI]</li>
    <li>Almeno due ruoli [Buyer e Seller]</li>
    <li>Almeno una transazione [SI - User "realUpdateCredit"]</li>
    <li>Almeno una funzionalità ajax [NO]</li>
</ul> 
</p>
<h3 class="users">Credenziali per accedere al Sito:</h3>
<ul class="usersInfo">
    <h5 class="users">Buyer:</h5>
    <ul class="usersInfo">
        <li>email: buyer@gmail.com</li>
        <li>password: buyer</li>
    </ul>
    <h5 class="users">Seller:</h5>
    <ul class="usersInfo">
        <li>email: seller@gmail.com</li>
        <li>password: seller</li>
    </ul>
    <h5 class="users">*Admin:</h5>
    <ul class="usersInfo">
        <li>email: admin@gmail.com</li>
        <li>password: admin</li>
    </ul>
</ul>
<h6 class="asterisco">* Le funzioni admin non sono state contemplate!</h6>