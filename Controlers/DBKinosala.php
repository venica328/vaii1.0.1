<?php


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
        $sql = 'INSERT INTO vaiiko.kinosala(id_sedadla) VALUES (?)';
        $this->db->prepare($sql)->execute([$sedacky->getIdSedadla()]);

    }

    public function Load()
    {
        $sedacky = [];
        $dbSedacky = $this->db->query('SELECT * FROM vaiiko.kinosala');

        foreach ($dbSedacky as $sedacka) {
            $sedacky[] = new Sedacky($sedacka['id'], $sedacka['id_sedadla']);
        }

        return $sedacky;
    }

    function Delete(Sedacky $sedacky)
    {
        $id=$sedacky->getId();
        $sql= 'DELETE FROM vaiiko.kinosala where id=' .$id;
        $this->db->query($sql);
    }






}