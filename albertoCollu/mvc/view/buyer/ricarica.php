<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOSELLER);

$credit = TecnoShopManager::getInstance()->getInputManager()->getInput("credit");
$total = TecnoShopManager::getInstance()->getAccessManager()->getUser()->getCredit();
?>
<div class="titleRic"><h1>Ricarica Credito</h1></div>

<div class="credit">
    <form class="" action="index.php?page=ricarica&action=addCredit" method="post">
        <fieldset><legend><h3>Il tuo credito è <?php echo $total; ?> &euro;</h3></legend>
            <br/>
            <div>
                <label for="credit"></label>
                <input class="inRegRic" type="text" required="" name="credit" placeholder="inserisci credito" value="">
                <button class="inRegRica" type="submit" name="action" value="addCredit">Ricarica</button>
            </div>
        </fieldset>
    </form>
</div>
<font face="Comic Sans ms"><i><h3 class="ricorda" style="text-align: center">Metodi di pagamento sicuri</h3></i></font>
<div class="comprato">
    <ul>
        <li style="text-align: left; list-style-image: url(css/img/paypal.png)">Affidati a PayPal</li>
        <ul>
            <li class="left" style="text-align: left; list-style-type: none; text-align: justify;">
                <br>
                Se fornire i dati della carta di credito ti genera apprensione, abbiamo la cura che fa per te e si chiama PayPal. 
                Una volta che ti sei registrato gratis, non devi fare altro che conoscere l'indirizzo email del destinatario. 
                Niente più condivisione di informazioni finanziarie con altre persone, niente più reinserimento ogni volta dei dati 
                della carta di credito. Pochi clic e il gioco è fatto. E se sfortuna vuole che l'oggetto non è quello che avevi scelto, 
                o non ricevi nulla, il Programma PayPal per la protezione degli acquirenti ti copre fino all'intero importo dell'acquisto.
            </li>
        </ul>
    </ul>
</div>
<div class="comprato2">
    <ul>
        <li style="text-align: left; list-style-image: url(css/img/creditcard.png)">Utilizza le carte prepagate con la giusta attenzione</li>
        <ul>
            <li class="left" style="text-align: left; list-style-type: none; text-align: justify;">
                <br>
                Quando si tratta di pagare l'oggetto acquistato, la carta prepagata è sicuramente un'ottima alternativa alla carta di credito 
                tradizionale. Con le dovute cautele. Non ricaricare la carta di sconosciuti. Ricaricare la carta a destinatari di cui non si 
                conosce l'effettiva identità è un comportamento altamente rischioso perché, una volta effettuata la ricarica, non è più possibile 
                recuperare il pagamento. Inoltre, per effettuare l'operazione, bisogna comunicare il numero della propria carta e i dati personali. 
                In mano alla persona sbagliata, queste informazioni possono essere utilizzate per fare acquisti online (con conseguente danno economico) 
                o altre attività fraudolente.
            </li>
        </ul>
    </ul>
</div>
<div class="card">
    <img src="css/img/card5.png" width="680" height="90">
</div>
<img class="money" src="css/img/money.gif">
<?php
if ($credit) {
    echo "<div class=\"updateCredit\">"
    . "<li class=\"titleRic\"><a class=\"linkAdd\" style=\"text-decoration: none\">Importo di " . $credit . " &euro; ricaricato correttamente! Torna alla "
    . "<a class=\"linkAdd\" href=\"http://spano.sc.unica.it/colluAlberto/progetto/index.php?page=welcome\">HomePage!</a></a></li>"
    . "</div>";
}
?>
