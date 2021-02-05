<?php

include "../Models/Sedacky.php";

class DBKinosala
{

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'messenger';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';
    private $db;

    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:dbname=' .self::DB_NAME.';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' .$e->getMessage();
        }

    }

    function Save(Sedacky $sedacky)
    {
        $sql = 'INSERT INTO vaiiko.kinosala(id_filmu, id_pouzivatela, id_sedadla) VALUES (?,?,?)';
        $this->db->prepare($sql)->execute([$sedacky->getIdFilmu(), $sedacky->getIdPouzivatela(), $sedacky->getIdSedadla()]);

    }

    public function Load()
    {
        $sedacky = [];
        $dbSedacky = $this->db->query('SELECT * FROM vaiiko.kinosala');

        foreach ($dbSedacky as $sedacka) {
            $sedacky[] = new Sedacky($sedacka['id'], $sedacka['id_sedadla'], $sedacka['id_filmu'], $sedacka['id_pouzivatela']);
        }

        return $sedacky;
    }

    function Delete($id_filmu)
    {
        $sql= 'DELETE FROM vaiiko.kinosala where id_filmu=' .$id_filmu;
        $this->db->query($sql);
    }

    function LoadStolickaPreFilm($id) {
        $stolicky = [];
        $dbStolicky = $this->db->query('SELECT * FROM vaiiko.kinosala where id_filmu ='. $id);

        foreach ($dbStolicky as $stolicka) {
            $stolicky[] = new Sedacky($stolicka['id'], $stolicka['id_sedadla'], $stolicka['id_filmu'], $stolicka['id_pouzivatela']);
        }

        return $stolicky;
    }






}