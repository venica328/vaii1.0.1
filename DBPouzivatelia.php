<?php


class DBPouzivatelia
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

    function Save(Pouzivatel $pouzivatel)
    {
        $sql = 'INSERT INTO vaiiko.pouzivatelia(username,password) VALUES (?,?)';
        $this->db->prepare($sql)->execute([$pouzivatel->getUsername(), $pouzivatel->getPassword()]);

    }

    public function Load()
    {
        $pouzivatelia = [];
        $dbPouzivatelia = $this->db->query('SELECT * FROM vaiiko.pouzivatelia');

        foreach ($dbPouzivatelia as $pouzivatel) {
            $pouzivatelia[] = new Pouzivatel($pouzivatel['id_pouzivatela'], $pouzivatel['username'], $pouzivatel['password']);
        }

        return $pouzivatelia;
    }

    function Delete(Pouzivatel $pouzivatel)
    {
        $id=$pouzivatel->getId();
        $sql= 'DELETE FROM vaiiko.pouzivatelia where id_pouzivatela=' .$id;
        $this->db->query($sql);
    }
}