<?php

error_reporting(E_ALL);
ini_set('display_error', '1');

require_once 'mvc/view/Page.php';

$page = new Page();

$page->getHeader()->setTitle("Tecno Shop");
$page->getHeader()->addLinkCss("css/Style.css");
$page->getHeader()->addMeta("Content-Type", "application/xhtml+xml; charset=UTF-8");
