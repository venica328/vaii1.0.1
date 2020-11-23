<?php

class DBStorage extends AStorage
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


    function Save(User $user)
    {
        $sql = 'INSERT INTO vaiiko.userovia(nick,text) VALUES (?,?)';
        $this->db->prepare($sql)->execute([$user->getNick(), $user->getText()]);

    }


    public function Load()
    {
        $users = [];

        $dbUsers = $this->db->query('SELECT * FROM vaiiko.userovia');

            foreach ($dbUsers as $user) {
                $users[] = new User($user['id'], $user['nick'], $user['text']);
            }

        return $users;
    }


    function Delete(User $user)
    {
        $id=$user->getId();
        $sql='DELETE FROM vaiiko.userovia where id='.$id;

            $this->db->query($sql);
    }

    public static function words($string) {
        $words = explode(' ', $string);
        $mad = self::getData();
        $new = [];

        foreach ($words as $word) {
            if (in_array(strtolower($word), $mad)) {
                $new[] = str_ireplace(['a', 'e', 'i', 'o', 'u', 'y'], '*', $word);
            }
            else {
                $new[] = $word;
            }
        }
        return implode(' ', $new);
    }

    public static function getData() {
        $data = file_get_contents('bad.txt');
        $words = [];
        foreach (explode(PHP_EOL, $data) as $lines) {
            $items = explode(' ', $lines);
            $words[] = new Words($items[0]);
        }
        return $words;
    }
}