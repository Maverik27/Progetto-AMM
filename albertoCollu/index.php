<?php

error_reporting(E_ALL);
ini_set('display_error', '1');

require_once 'mvc/controller/TecnoShopManager.php';
require_once 'mvc/view/Page.php';

$tecnoShopManager = new TecnoShopManager();
$tecnoShopManager->setActive();
$inputManager = $tecnoShopManager->getInputManager();

$page = new Page();

//imposto i parametri dei vari tag dell'Head
$page->getHead()->setTitle("TecnoShop");
$page->getHead()->addMeta("Content-Type", "application/xhtml+xml; charset = UTF-8");
$page->getHead()->addLinkCss("css/Style.css");


//stampo paginaTop
echo $page->pageTop();

switch ($inputManager->getInput("page")){
    case "login":
        include 'commons/login.php';
        break;
    case "chisiamo": 
        include 'commons/chisiamo.php';
        break;
    case "contattaci": 
        include 'commons/contattaci.php';
        break;
    default :
        include 'welcome.php';
        break;
}

//stampo paginaBottom
echo $page->pageBottom();


