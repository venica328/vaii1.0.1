<?php


class DBFilmy
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

    function Save(Film $film)
    {
        $sql = 'INSERT INTO vaiiko.filmy(info, obsah, obrazok) VALUES (?,?,?)';
        $this->db->prepare($sql)->execute([$film->getInfo(), $film->getObsah(), $film->getObrazok()]);

    }

    public function LoadAll()
    {
        $filmy = [];
        $dbFilmy = $this->db->query('SELECT * FROM vaiiko.filmy');

        foreach ($dbFilmy as $film) {
            $filmy[] = new Film($film['id_filmu'], $film['info'], $film['obsah'], $film['obrazok']);
        }

        return $filmy;
    }

    public function Load($id)
    {
        $filmy = [];
        $dbFilmy = $this->db->query('SELECT * FROM vaiiko.filmy where id_filmu ='. $id);

        foreach ($dbFilmy as $film) {
            $filmy[] = new Film($film['id_filmu'], $film['info'], $film['obsah'], $film['obrazok']);
        }

        return $filmy[0];
    }

    function Delete(Film $film)
    {
        $id=$film->getIdFilmu();
        $sql='DELETE FROM vaiiko.filmy where id_filmu='.$id;

        $this->db->query($sql);
    }

    function Update(Film $film) {

        $id=$film->getIdFilmu();
        $sql= 'UPDATE vaiiko.filmy SET info = info , obsah where id_filmu=' .$id;
        $this->db->query($sql);

    }
}