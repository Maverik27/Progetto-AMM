<?php

/**
 * Description of Depot
 *
 * @author Alberto
 */
class Depot {

    private $seller;
    private $computer;
    private $nItems;
    private $price;

    function __construct() {
        
    }

    public function getNItems() {
        return $this->nItems;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setNItems($nItems) {
        $this->nItems = $nItems;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getSeller() {
        return $this->seller;
    }

    public function getComputer() {
        return $this->computer;
    }

    public function setSeller($seller) {
        $this->seller = $seller;
    }

    public function setComputer($computer) {
        $this->computer = $computer;
    }

    public static function confirmToSell($depot) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }
        $depot->getSeller()->setId($db->escape_string($depot->getSeller()->getId()));
        $depot->setComputer($db->escape_string($depot->getComputer()));
        $depot->setNItems($db->escape_string($depot->getNItems()));
        $depot->setPrice($db->escape_string($depot->getPrice()));

        //query di inserimento all'interno della tabella depot
        $query = "";

        if ($db->getRowsAfterQuery($query) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
