<?php
include "../Models/Pouzivatel.php";

class DBPouzivatelia
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'messenger';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';
    private $db;

    /**
     * DBPouzivatelia constructor.
     * Plní funkciu pre počiatočné nastavenie objektu DBPouzivatelia
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    /**
     * @param Pouzivatel $pouzivatel
     * Funkcia uloží registrovaného používateľa do databázy
     */
    function Save(Pouzivatel $pouzivatel)
    {
        $sql = 'INSERT INTO vaiiko.pouzivatelia(username,password,isAdmin) VALUES (?,?,?)';
        $this->db->prepare($sql)->execute([$pouzivatel->getUsername(), $pouzivatel->getPassword(), $pouzivatel->getIsAdmin()]);

    }

    /**
     * @return array
     * Funkcia vráti pole používateľov
     */
    public function Load()
    {
        $pouzivatelia = [];
        $dbPouzivatelia = $this->db->query('SELECT * FROM vaiiko.pouzivatelia');

        foreach ($dbPouzivatelia as $pouzivatel) {
            $pouzivatelia[] = new Pouzivatel($pouzivatel['id_pouzivatela'],$pouzivatel['username'], $pouzivatel['password'], $pouzivatel['isAdmin']);
        }

        return $pouzivatelia;
    }

    /**
     * @param $id
     * @return string
     * Funkcia vráti meno používateľa
     */
    public function LoadNick($id)
    {
        $sql = 'SELECT username FROM vaiiko.pouzivatelia where id_pouzivatela=' . $id;

        return $sql;
    }

    /**
     * @param $id
     * Funkcia odstráni používateľa podľa id
     */
    function Delete($id)
    {
        $sql = 'DELETE FROM vaiiko.pouzivatelia where id_pouzivatela=' . $id;
        $this->db->query($sql);
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     * Funkcia umožní sa prihlásiť danému užívateľovi, ak má platné údaje, ktorými sa registroval
     */
    public function Login($username, $password)
    {
        $result = $this->Load();
        foreach ($result as $pouzivatel) {
            if ($username == $pouzivatel->getUsername() && password_verify($password, $pouzivatel->getPassword())) {
                $_SESSION["isAdmin"] = $pouzivatel->getIsAdmin();
                $_SESSION["username"] = $pouzivatel->getUsername();
                $_SESSION["id"] = $pouzivatel->getIdPouzivatela();
                return true;
            }
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @param $password_again
     * @return int
     * Funkcia umožní vytvoriť nového používateľa a zašifruje mu heslo
     * Funkcia ošetruje pridané dáta, ak je niečo zlé napríklad už existujúce meno sa nachádza v databáze
     * nemôže ho registrovať pod takýmto menom
     *  0 pre nesprávne meno/heslo
     * -1 ak používateľské meno už existuje
     * -2 ak sa heslá nezhodujú/nemajú dostatok znakov
     */
    public function Register($username, $password, $password_again)
    {
        $result = $this->Load();
        foreach ($result as $pouzivatel) {
            if($pouzivatel->getUsername() == $username) {
                return -1;
            }
        }
        if($password == $password_again && strlen($password) >= 8) {
            $hash_variable_salt = password_hash($password, PASSWORD_DEFAULT, array('cost' => 9));
            $pouzivatel = new Pouzivatel(0, $username, $hash_variable_salt, '0');
            $this->Save($pouzivatel);
            return 0;
        } else {
            return -2;
        }
    }

}