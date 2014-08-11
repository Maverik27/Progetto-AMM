<?php

error_reporting(E_ALL);
ini_set('display_error', '1');

require_once 'config.php';
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/Page.php';

/*
 * STEP 5:
 * Questo menu costituisce tutti gli elementi "dinamici" della sidebar, o almeno, di una parte della sidebar.
 * Sicomme lo stiamo creando per la prima volta qui nella index.php nessuno ci vieta di aggiungere un nuovo 
 * "campo" a ciascun array che compone il nostro menù. Questo campo sarà per l'appunto il livello d'accesso 
 * della pagine. Adesso di "default" li ho messi tutti public perché non mi ricordo come volevi impostare
 * l'homepage, ma il campo "accessLevel", che corrisponde alla variabile "$predeterminedAccessLevel" spiegato
 * nell' AccessManager, dovrà essere imposta con il permesso corretto.
 * 
 * ESEMPIO :
 * Ci aspettiamo che "Portatili" rimandi ad una pagina visibile solamente agli utenti "seller". Di conseguenza
 * questa pagina dovrà essere visibile solamente a loro e per riflesso agli utenti "admin". Motivo per cui il 
 * permesso adeguato sarà ACCESS_NOBUYER.
 * Ti ho fatto un esempio un po no sense ma è giusto per rendere bene il concetto.
 * 
 * 
 * N.B: Nella voce "accessori" ti ho messo permesso "NO_BUYER", per farti vedere come funzionano le cose. SE
 *      fai il login come "buyer" puoi notare che quella voce nella sidebar non è più presente. Poi ovviamente
 *      le cose si cambiano.
 * 
 * Lo STEP 5 continua giu
 */
$menu = Array(
    Array(
        "title" => "Desktop",
        "link" => "index.php?page=desktop",
        "img" => "css/img/Desktop.png",
        "accessLevel" => AccesManager::ACCESS_PUBLIC
    ),
    Array(
        "title" => "Portatili",
        "link" => "index.php?page=portatili",
        "img" => "css/img/pcPortatili.png",
        "accessLevel" => AccesManager::ACCESS_PUBLIC
    ),
    Array(
        "title" => "Monitor",
        "link" => "index.php?page=monitor",
        "img" => "css/img/Monitor.png",
        "accessLevel" => AccesManager::ACCESS_PUBLIC
    ),
    Array(
        "title" => "Accessori",
        "link" => "index.php?page=accessori",
        "img" => "css/img/Accessori.png",
        "accessLevel" => AccesManager::ACCESS_NOBUYER
    ),
);


$tecnoShopManager = new TecnoShopManager();
$tecnoShopManager->setActive();
$inputManager = $tecnoShopManager->getInputManager();
$tecnoShop = $tecnoShopManager->getTecnoShop();
$accessManager = $tecnoShopManager->getAccessManager();
$userManager = $tecnoShopManager->getUserManager();

//echo $tecnoShop->getMsgError();
//echo $tecnoShop->getDebugErr();

$page = new Page();

//imposto i parametri dei vari tag dell'Head
$page->getHead()->setTitle("TecnoShop");
$page->getHead()->addMeta("Content-Type", "application/xhtml+xml; charset = UTF-8");
$page->getHead()->addLinkCss("css/Style.css");

$user = $accessManager->getUser();
if ($user) {
    $page->getContent()->setShowLogin(FALSE);
} else {
    $page->getContent()->setShowLogin();
}

//$loginErr = $accessManager->getMsgError();
//echo $loginErr;
//
//if ($user) {
//    echo 'login effettuato!';
//} else {
//    echo 'non sei loggato!';
//}

/*
 * STEP 5
 * Siccome in questo for aggiungiamo gli elementi nella sidebar è qui che dobbiamo effettuare il controllo,
 * attraverso il metodo "checkAccess", per determinare quali utenti posso vedere cosa.
 * Di conseguenza, siccome ci serve il livello d'accesso, accediamo al nel menu proprio al campo "accessLevel".
 * Quest'ultimo corrisponde, se segui il flusso del programma, al parametro "$predeterminedAccessLevel" che
 * indica il livello d'accesso che abbiamo prestabilito.
 * 
 * N.B: Per lo STEP 6 vedi TecnoShopManager
 */
for ($i = 0; $i < count($menu); $i++) {
    if (AccesManager::checkAccess($menu[$i]["accessLevel"])) {
        $page->getSidebarLeft()->getProductsMenu()->addElement($menu[$i]["title"], $menu[$i]["link"], $menu[$i]["img"]);
    }
}

//###############################################################################################################################
//una volta fatto il login con qualsiasi utente se clicco su una pagina qualunque fa il logout e mi visualizza il content vuoto #
//###############################################################################################################################


//stampo paginaTop
echo $page->pageTop();

switch ($inputManager->getInput("page")) {
    case "login":
        include 'commons/login.php';
        break;
    case "chisiamo":
        include 'commons/chisiamo.php';
        break;
    case "contattaci":
        include 'commons/contattaci.php';
        break;
    case "desktop":
        include 'commons/desktop.php';
        break;
    case "portatili":
        include 'commons/portatili.php';
        break;
    case "monitor":
        include 'commons/monitor.php';
        break;
    case "accessori":
        include 'commons/accessori.php';
        break;
    case "cerca":
        include 'commons/cerca.php';
        break;
    default :
        include 'welcome.php';
        break;
}

//stampo paginaBottom
echo $page->pageBottom();


