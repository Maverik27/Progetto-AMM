<?php

/**
 * Description of ModelDb
 *
 * @author Alberto
 */
class ModelDb {
    /*
     * inizializzo l'array mapperDb con i campi delle rispettive 
     * tabelle del database creato
     */

    static $mapperDb = Array(
        "tables" => Array(
            "usersTable" => "users",
            "computersTable" => "computer",
            "depotTable" => "depot",
        ),
        "usersTable" => Array(
            "id" => "id",
            "email" => "email",
            "password" => "password",
            "name" => "name",
            "surname" => "surname",
            "address" => "address",
            "identity" => "identity",
            "credit" => "credit",
        ),
            "computersTable" => Array(
            "id" => "id",
            "type" => "type",
            "brand" => "brand",
            "model" => "model",
            "inces" => "inces",
            "ram" => "ram",
            "os" => "os",
            "cpu" => "cpu",
            "storage" => "storage",
            "gpu" => "gpu",
            "description" => "description",
        ),
        "depotTable" => Array(
            "uid" => "id_u",
            "cid" => "id_c",
            "nitems" => "nitems",
            "price" => "price",
        )
    );

}
