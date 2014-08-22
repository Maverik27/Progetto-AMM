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

        $depot->getSeller()->setId($db->getDatabase()->escape_string($depot->getSeller()->getId()));
        $depot->setComputer($db->getDatabase()->escape_string($depot->getComputer()));
        $depot->setNItems($db->getDatabase()->escape_string($depot->getNItems()));
        $depot->setPrice($db->getDatabase()->escape_string($depot->getPrice()));

        //query di inserimento all'interno della tabella depot
        $query = "INSERT INTO `" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["depotTable"] . "` (`"
                . ModelDb::$mapperDb["depotTable"]["uid"] . "`, `"
                . ModelDb::$mapperDb["depotTable"]["cid"] . "`, `"
                . ModelDb::$mapperDb["depotTable"]["nitems"] . "`, `"
                . ModelDb::$mapperDb["depotTable"]["price"] . "`) VALUES ('"
                . $depot->getSeller()->getId() . "', '"
                . $depot->getComputer() . "', '"
                . $depot->getNItems() . "', '"
                . $depot->getPrice() . "');";

        var_dump($query);

        if ($db->getRowsAfterQuery($query) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function getSellerView($idSeller, $from, $to) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }

        $idSeller = $db->getDatabase()->escape_string($idSeller);

        $depotT = "`" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["depotTable"] . "`";
        $computerT = "`" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["computersTable"] . "`";
        $userT = "`" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["usersTable"] . "`";

        $query = "SELECT * FROM $depotT,$computerT,$userT WHERE "
                . $depotT . ".`" . ModelDb::$mapperDb["depotTable"]["cid"] . "`=" . $computerT . ".`" . ModelDb::$mapperDb["computersTable"]["id"] . "` AND "
                . $depotT . ".`" . ModelDb::$mapperDb["depotTable"]["uid"] . "`=" . $userT . ".`" . ModelDb::$mapperDb["usersTable"]["id"] . "` AND "
                . $depotT . ".`" . ModelDb::$mapperDb["depotTable"]["uid"] . "`='" . $idSeller . "' limit $from,$to;";

        $productSeller = $db->query($query);
        $resultSellerProducts = array();

        if (count($productSeller) > 0) {
            for ($i = 0; $i < count($productSeller); $i++) {
                $computer = new Computer();
                $computer->setId($productSeller[$i][ModelDb::$mapperDb["computersTable"]["id"]]);
                $computer->setType($productSeller[$i][ModelDb::$mapperDb["computersTable"]["type"]]);
                $computer->setBrand($productSeller[$i][ModelDb::$mapperDb["computersTable"]["brand"]]);
                $computer->setModel($productSeller[$i][ModelDb::$mapperDb["computersTable"]["model"]]);
                $computer->setInces($productSeller[$i][ModelDb::$mapperDb["computersTable"]["inces"]]);
                $computer->setOs($productSeller[$i][ModelDb::$mapperDb["computersTable"]["os"]]);
                $computer->setCpu($productSeller[$i][ModelDb::$mapperDb["computersTable"]["cpu"]]);
                $computer->setRam($productSeller[$i][ModelDb::$mapperDb["computersTable"]["ram"]]);
                $computer->setStorage($productSeller[$i][ModelDb::$mapperDb["computersTable"]["storage"]]);
                $computer->setGpu($productSeller[$i][ModelDb::$mapperDb["computersTable"]["gpu"]]);
                $computer->setDescription($productSeller[$i][ModelDb::$mapperDb["computersTable"]["description"]]);

                $depot = new Depot();
                $depot->setNItems($productSeller[$i][ModelDb::$mapperDb["depotTable"]["nitems"]]);
                $depot->setPrice($productSeller[$i][ModelDb::$mapperDb["depotTable"]["price"]]);
                $depot->setSeller(new User());
                $depot->getSeller()->setId($idSeller);

                $computer->addDepotSeller($depot);
                array_push($computer->addInfo, $depot->getNItems(), $depot->getPrice());
                //var_dump($computer->getAddInfo());

                array_push($resultSellerProducts, $computer);
            }
            return $resultSellerProducts;
        }
    }

}
