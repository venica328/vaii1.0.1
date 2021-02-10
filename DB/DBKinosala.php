<?php

include (dirname(__DIR__)."..\Models\Sedacky.php");

class DBKinosala
{

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'messenger';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';
    private $db;

    /**
     * DBKinosala constructor.
     * Plní funkciu pre počiatočné nastavenie objektu DBKinosala
     */
    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:dbname=' .self::DB_NAME.';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' .$e->getMessage();
        }

    }

    /**
     * @param Sedacky $sedacky
     * Funkcia, ktorá priradí sedadlo konkrétnemu používateľovi, ktorý je prihlásený
     */
    function Save(Sedacky $sedacky)
    {
        $sql = 'INSERT INTO vaiiko.kinosala(id_filmu, id_pouzivatela, id_sedadla) VALUES (?,?,?)';
        $this->db->prepare($sql)->execute([$sedacky->getIdFilmu(), $sedacky->getIdPouzivatela(), $sedacky->getIdSedadla()]);

    }

    /**
     * @return array
     * Funkcia vráti všetky sedačky
     */
    public function Load()
    {
        $sedacky = [];
        $dbSedacky = $this->db->query('SELECT * FROM vaiiko.kinosala');

        foreach ($dbSedacky as $sedacka) {
            $sedacky[] = new Sedacky($sedacka['id'], $sedacka['id_sedadla'], $sedacka['id_filmu'], $sedacka['id_pouzivatela']);
        }

        return $sedacky;
    }

    /**
     * @param $id_filmu
     * Funkcia odstráni celú kinosálu rezervovaných sedadiel a nechá ich nerezervované
     */
    function Delete($id_filmu)
    {
        $sql= 'DELETE FROM vaiiko.kinosala where id_filmu=' .$id_filmu;
        $this->db->query($sql);
    }

    /**
     * @param $id_filmu
     * @param $id_sedadla
     * Funkcia odstráni rezervované sedadlo daným používateľom
     */
    function DeleteStolickuPreFilm($id_filmu,$id_sedadla) {

        $sql= 'DELETE FROM vaiiko.kinosala where id_filmu=' .$id_filmu. ' AND id_sedadla='.$id_sedadla;
        $this->db->query($sql);
    }

    /**
     * @param $id
     * @return array
     * Funkcia vráti zarezervované stoličky
     */
    function LoadStolickaPreFilm($id) {
        $stolicky = [];
        $dbStolicky = $this->db->query('SELECT * FROM vaiiko.kinosala where id_filmu ='. $id);

        foreach ($dbStolicky as $stolicka) {
            $stolicky[] = new Sedacky($stolicka['id'], $stolicka['id_sedadla'], $stolicka['id_filmu'], $stolicka['id_pouzivatela']);
        }

        return $stolicky;
    }






}