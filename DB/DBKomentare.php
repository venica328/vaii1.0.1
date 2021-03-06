<?php

include "../Models/Komentar.php";

class DBKomentare
{

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'messenger';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';
    private $db;

    /**
     * DBKomentare constructor.
     * Plní funkciu pre počiatočné nastavenie objektu DBKomentare
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
     * @param Komentar $komentar
     * Funkcia uloží pridaný komentár
     */
    function Save(Komentar $komentar)
    {
        $sql = 'INSERT INTO vaiiko.komentare(nick,text) VALUES (?,?)';
        $this->db->prepare($sql)->execute([$komentar->getNick(), $komentar->getText()]);

    }

    /**
     * @return array
     * Funkcia vráti všetky komentáre z databázy
     */
    public function Load()
    {
        $komentare = [];
        $dbKomentare = $this->db->query('SELECT * FROM vaiiko.komentare');

            foreach ($dbKomentare as $komentar) {
                $komentare[] = new Komentar($komentar['id'], $komentar['nick'], $komentar['text']);
            }

        return $komentare;
    }

    /**
     * @param $id
     * Funkcia odstráni daný komentár podľa id
     */
    function Delete($id)
    {
        $sql= 'DELETE FROM vaiiko.komentare where id=' .$id;
        $this->db->query($sql);
    }



}