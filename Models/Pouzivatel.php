<?php


class Pouzivatel
{
    private $id_pouzivatela;
    private $username;
    private $password;
    private $isAdmin;

    /**
     * Pouzivatel constructor.
     * Plní funkciu pre počiatočné nastavenie objektu Pouzivatel
     */
    public function __construct($id_pouzivatela, $username, $password, $isAdmin)
    {
        $this->id_pouzivatela = $id_pouzivatela;
        $this->username = $username;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     * Funkcia vráti id
     */
    public function getIdPouzivatela()
    {
        return $this->id_pouzivatela;
    }

    /**
     * @return mixed
     * Funkcia vráti meno
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     * Funkcia vráti heslo
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     * Funkcia vráti informáciu, či je daný používateľ adminom
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $id_pouzivatela
     * Funkcia umožní nastaviť id
     */
    public function setIdPouzivatela($id_pouzivatela): void
    {
        $this->id_pouzivatela = $id_pouzivatela;
    }

    /**
     * @param mixed $username
     * Funkcia umožní nastaviť meno
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     * Funkcia umožní nastaviť heslo
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $isAdmin
     * Funkcia umožní nastaviť hodnotu, či je používateľ admin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }
}