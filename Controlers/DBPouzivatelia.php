<?php
include "../Models/Pouzivatel.php";

class DBPouzivatelia
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'messenger';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

    function Save(Pouzivatel $pouzivatel)
    {
        $sql = 'INSERT INTO vaiiko.pouzivatelia(username,password,isAdmin) VALUES (?,?,?)';
        $this->db->prepare($sql)->execute([$pouzivatel->getUsername(), $pouzivatel->getPassword(), $pouzivatel->getIsAdmin()]);

    }

    public function Load()
    {
        $pouzivatelia = [];
        $dbPouzivatelia = $this->db->query('SELECT * FROM vaiiko.pouzivatelia');

        foreach ($dbPouzivatelia as $pouzivatel) {
            $pouzivatelia[] = new Pouzivatel($pouzivatel['id_pouzivatela'], $pouzivatel['username'], $pouzivatel['password'], $pouzivatel['isAdmin']);
        }

        return $pouzivatelia;
    }

    function Delete(Pouzivatel $pouzivatel)
    {
        $id = $pouzivatel->getIdPouzivatela();
        $sql = 'DELETE FROM vaiiko.pouzivatelia where id_pouzivatela=' . $id;
        $this->db->query($sql);
    }

    public function Login($username, $password)
    {
        $result = $this->Load();

        $password = md5($password);
        foreach ($result as $pouzivatel) {
            if ($username == $pouzivatel->getUsername() && $password == $pouzivatel->getPassword()) {
                $_SESSION["isAdmin"] = $pouzivatel->getIsAdmin();
                $_SESSION["username"] = $pouzivatel->getUsername();
                $_SESSION["id"] = $pouzivatel->getIdPouzivatela();
                return true;
            }
        }
        return false;
    }
}