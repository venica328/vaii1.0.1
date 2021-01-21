<?php


class Pouzivatel
{
    private $id_pouzivatela;
    private $username;
    private $password;
    private $isAdmin;

    public function __construct($id_pouzivatela, $username, $password, $isAdmin)
    {
        $this->id_pouzivatela = $id_pouzivatela;
        $this->username = $username;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getIdPouzivatela()
    {
        return $this->id_pouzivatela;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $id_pouzivatela
     */
    public function setIdPouzivatela($id_pouzivatela): void
    {
        $this->id_pouzivatela = $id_pouzivatela;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }
}