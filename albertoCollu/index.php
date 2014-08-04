<?php

error_reporting(E_ALL);
ini_set('display_error', '1');

require_once 'config.php';
require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/Page.php';

$tecnoShopManager = new TecnoShopManager();
$tecnoShopManager->setActive();
$inputManager = $tecnoShopManager->getInputManager();
$tecnoShop = $tecnoShopManager->getTecnoShop();
$accessManager = $tecnoShopManager->getAccessManager();
$userManager = $tecnoShopManager->getUserManager();

echo $tecnoShop->getMsgError();
//echo $tecnoShop->getDebugErr();

$page = new Page();

//imposto i parametri dei vari tag dell'Head
$page->getHead()->setTitle("TecnoShop");
$page->getHead()->addMeta("Content-Type", "application/xhtml+xml; charset = UTF-8");
$page->getHead()->addLinkCss("css/Style.css");

$user = $accessManager->getUser();

if ($user) {
    $page->getSidebarLeft()->setShowLogin(FALSE);
} else {
    $page->getSidebarLeft()->setShowLogin();
}

$loginError = $accessManager->getMsgError();
echo $loginError;

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
    default :
        include 'welcome.php';
        break;
}

//stampo paginaBottom
echo $page->pageBottom();


