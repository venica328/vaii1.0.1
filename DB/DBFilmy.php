<?php

include (dirname(__DIR__)."..\Models\Film.php");
class DBFilmy
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'messenger';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';
    private $db;

    /**
     * DBFilmy constructor.
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
     * @param Film $film
     */
    function Save(Film $film)
    {
        $sql = 'INSERT INTO vaiiko.filmy(info, obsah, obrazok) VALUES (?,?,?)';
        $this->db->prepare($sql)->execute([$film->getInfo(), $film->getObsah(), $film->getObrazok()]);

    }

    /**
     * @return array
     */
    public function LoadAll()
    {
        $filmy = [];
        $dbFilmy = $this->db->query('SELECT * FROM vaiiko.filmy');

        foreach ($dbFilmy as $film) {
            $filmy[] = new Film($film['id_filmu'], $film['info'], $film['obsah'], $film['obrazok']);
        }

        return $filmy;
    }

    /**
     * Metoda ktora vrati vsetky filmy
     * @param $id
     * @return Film|mixed
     */
    public function Load($id)
    {
        $filmy = [];
        $dbFilmy = $this->db->query('SELECT * FROM vaiiko.filmy where id_filmu ='. $id);

        foreach ($dbFilmy as $film) {
            $filmy[] = new Film($film['id_filmu'], $film['info'], $film['obsah'], $film['obrazok']);
        }

        return $filmy[0];
    }

    function Delete($id)
    {
        $sql='DELETE FROM vaiiko.filmy where id_filmu=' .$id;
        $this->db->query($sql);
    }

    function Update(Film $film) {

        $sql= 'UPDATE vaiiko.filmy SET info = "'.$film->getInfo().'" , obsah = "'.$film->getObsah().'", obrazok = "'.$film->getObrazok().'" where id_filmu=' .$film->getIdFilmu();
        $this->db->query($sql);

    }
}