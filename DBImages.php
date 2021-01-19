<?php


class DBImages
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

    function Save(Image $image)
    {
        $sql = 'INSERT INTO vaiiko.images(nazov) VALUES (?)';
        $this->db->prepare($sql)->execute([$image->getNazov()]);

    }

    public function Load()
    {
        $images = [];
        $dbImages = $this->db->query('SELECT * FROM vaiiko.images where id_filmu = $id');

        foreach ($dbImages as $image) {
            $images[] = new Image($image['id'], $image['nazov']);
        }

        return $images;
    }

    function Delete(Image $image)
    {
        $id=$image->getId();
        $sql='DELETE FROM vaiiko.images where id='.$id;

        $this->db->query($sql);
    }

}