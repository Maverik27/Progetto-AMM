<?php

error_reporting(E_ALL);
ini_set('display_error', '1');

require_once 'config.php';
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/Page.php';

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
        "title" => "Tablet",
        "link" => "index.php?page=tablet",
        "img" => "css/img/tablet.png",
        "accessLevel" => AccesManager::ACCESS_NOSELLER
    ),
    Array(
        "title" => "Nuovo Prodotto",
        "link" => "index.php?page=nuovoProdotto",
        "img" => "css/img/addPc.png",
        "accessLevel" => AccesManager::ACCESS_NOBUYER
    ),
    Array(
        "title" => "Magazzino Prodotti",
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
        "title" => "Tablet",
        "link" => "index.php?page=tabletGuest",
        "img" => "css/img/tablet.png",
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

$startMenu = Array(
    Array(
        "title" => "Informazioni",
        "link" => "index.php?page=informazioni",
        "class" => "weLink",
        "accessLevel" => AccesManager::ACCESS_PUBLIC
    ),
    Array(
        "title" => "Registrati",
        "link" => "index.php?page=registrati",
        "class" => "registerLink",
        "accessLevel" => AccesManager::ACCESS_GUEST
    ),
);

$tecnoShopManager = new TecnoShopManager();
$tecnoShopManager->setActive();
$inputManager = $tecnoShopManager->getInputManager();
$tecnoShop = $tecnoShopManager->getTecnoShop();
$accessManager = $tecnoShopManager->getAccessManager();
$userManager = $tecnoShopManager->getUserManager();

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

for ($i = 0; $i < count($startMenu); $i++) {
    if (AccesManager::checkAccess($startMenu[$i]["accessLevel"])) {
        $page->getSidebarLeft()->getStartMenu()->addElement($startMenu[$i]["title"], $startMenu[$i]["link"], $startMenu[$i]["class"]);
    }
}

if ($user) {
    $page->getContent()->setShowLogin(FALSE);
} else {
    $page->getContent()->setShowLogin();
}

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
    case "informazioni":
        include 'mvc/view/commons/informazioni.php';
        break;
    case "profile":
        include 'mvc/view/commons/profile.php';
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
    case "tablet":
        include 'mvc/view/buyer/tablet.php';
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
    case "tabletGuest":
        include 'mvc/view/guest/tabletGuest.php';
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
    case "comprato":
        include 'mvc/view/buyer/comprato.php';
        break;
    default :
        include 'welcome.php';
        break;
}

//stampo paginaBottom
echo $page->pageBottom();


