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
        "accessLevel" => AccesManager::ACCESS_NOSELLER
    ),
    Array(
        "title" => "Portatili",
        "link" => "index.php?page=portatili",
        "img" => "css/img/pcPortatili.png",
        "accessLevel" => AccesManager::ACCESS_NOSELLER
    ),
    Array(
        "title" => "Accessori",
        "link" => "index.php?page=accessori",
        "img" => "css/img/Accessori.png",
        "accessLevel" => AccesManager::ACCESS_NOSELLER
    ),
    Array(
        "title" => "Nuovo Prodotto",
        "link" => "index.php?page=nuovoProdotto",
        "img" => "css/img/addPc.png",
        "accessLevel" => AccesManager::ACCESS_NOBUYER
    ),
    Array(
        "title" => "Vetrina Prodotti",
        "link" => "index.php?page=vetrina",
        "img" => "css/img/vetrina.png",
        "accessLevel" => AccesManager::ACCESS_NOBUYER
    ),
    //solo per il guest
    Array(
        "title" => "Desktop",
        "link" => "index.php?page=desktopGuest",
        "img" => "css/img/Desktop.png",
        "accessLevel" => AccesManager::ACCESS_GUEST
    ),
    Array(
        "title" => "Portatili",
        "link" => "index.php?page=portatiliGuest",
        "img" => "css/img/pcPortatili.png",
        "accessLevel" => AccesManager::ACCESS_GUEST
    ),
    Array(
        "title" => "Accessori",
        "link" => "index.php?page=accessoriGuest",
        "img" => "css/img/Accessori.png",
        "accessLevel" => AccesManager::ACCESS_GUEST
    ),
);

$additionalMenu = Array(
    Array(
        "title" => "Modifica Profilo",
        "link" => "index.php?page=profile",
        "class" => "dataChange",
        "accessLevel" => AccesManager::ACCESS_NOADMIN
    ),
    Array(
        "title" => "Ricarica Credito",
        "link" => "index.php?page=ricarica",
        "class" => "chargeCredit",
        "accessLevel" => AccesManager::ACCESS_NOSELLER
    )
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

for ($i = 0; $i < count($menu); $i++) {
    if (AccesManager::checkAccess($menu[$i]["accessLevel"])) {
        $page->getSidebarLeft()->getProductsMenu()->addElement($menu[$i]["title"], $menu[$i]["link"], $menu[$i]["img"]);
    }
}
for ($i = 0; $i < count($additionalMenu); $i++) {
    if (AccesManager::checkAccess($additionalMenu[$i]["accessLevel"])) {
        $page->getSidebarLeft()->getAdditionalMenu()->addElement($additionalMenu[$i]["title"], $additionalMenu[$i]["link"], $additionalMenu[$i]["class"]);
    }
}

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


//stampo paginaTop
echo $page->pageTop();

switch ($inputManager->getInput("page")) {
    //COMMONS
    case "login":
        include 'mvc/view/commons/login.php';
        break;
    case "registrati":
        include 'mvc/view/commons/registrati.php';
        break;
    case "chisiamo":
        include 'mvc/view/commons/chisiamo.php';
        break;
    case "profile":
        include 'mvc/view/commons/profile.php';
        break;
    case "cerca":
        include 'mvc/view/commons/cerca.php';
        break;
    case "contattaci":
        include 'mvc/view/commons/contattaci.php';
        break;
    //FINE COMMONS
    //BUYER
    case "desktop":
        include 'mvc/view/buyer/desktop.php';
        break;
    case "portatili":
        include 'mvc/view/buyer/portatili.php';
        break;
    case "accessori":
        include 'mvc/view/buyer/accessori.php';
        break;
    case "ricarica":
        include 'mvc/view/buyer/ricarica.php';
        break;
    //FINE BUYER
    //SOLOGUEST
    case "desktopGuest":
        include 'mvc/view/guest/desktopGuest.php';
        break;
    case "portatiliGuest":
        include 'mvc/view/guest/portatiliGuest.php';
        break;
    case "accessoriGuest":
        include 'mvc/view/guest/accessoriGuest.php';
        break;
    //FINE GUEST
    //SELLER
    case "vetrina":
        include 'mvc/view/seller/vetrina.php';
        break;
    case "nuovoProdotto":
        include 'mvc/view/seller/nuovoProdotto.php';
        break;
    //FINE SELLER
    default :
        include 'welcome.php';
        break;
}

//stampo paginaBottom
echo $page->pageBottom();


