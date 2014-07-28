<?php

require_once 'Content.php';
require_once 'Footer.php';
require_once 'Header.php';
require_once 'SidebarLeft.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author Banana Joe
 */
class Page {

    private $header;
    private $siderLeft;
    private $content;
    private $footer;

    public function __construct() {
        $this->header = new Header();
        $this->siderLeft = new SidebarLeft();
        $this->content = new Content();
        $this->footer = new Footer();
    }

    public function pageTop() {
        $html = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
        $html.= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"it\">\n";
        $html .= $this->header;
        $html .= "<body>\n";
    }

    public function getHeader() {
        return $this->header;
    }

    public function getSiderLeft() {
        return $this->siderLeft;
    }

    public function getContent() {
        return $this->content;
    }

    public function getFooter() {
        return $this->footer;
    }

}
