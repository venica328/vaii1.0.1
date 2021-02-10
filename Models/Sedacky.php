<?php


class Sedacky implements \JsonSerializable
{
    private $id;
    private $id_sedadla;
    private $id_filmu;
    private $id_pouzivatela;

    /**
     * Sedacky constructor.
     * Plní funkciu pre počiatočné nastavenie objektu Sedacky
     */
    public function __construct($id, $id_sedadla, $id_filmu, $id_pouzivatela)
    {
        $this->id = $id;
        $this->id_sedadla = $id_sedadla;
        $this->id_filmu = $id_filmu;
        $this->id_pouzivatela = $id_pouzivatela;
    }

    /**
     * @return mixed
     * Funkcia vrati id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     * Funkcia vrati id sedadla
     */
    public function getIdSedadla()
    {
        return $this->id_sedadla;
    }

    /**
     * @return mixed
     * Funkcia vrati id filmu
     */
    public function getIdFilmu()
    {
        return $this->id_filmu;
    }

    /**
     * @return mixed
     * Funkcia vrati id pouzivatela
     */
    public function getIdPouzivatela()
    {
        return $this->id_pouzivatela;
    }

    /**
     * @param mixed $id
     * Funkcia umožní nastaviť id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $id_sedadla
     * Funkcia umožní nastaviť id sedadla
     */
    public function setIdSedadla($id_sedadla): void
    {
        $this->id_sedadla = $id_sedadla;
    }

    /**
     * @param mixed $id_filmu
     * Funkcia umožní nastaviť id filmu
     */
    public function setIdFilmu($id_filmu): void
    {
        $this->id_filmu = $id_filmu;
    }

    /**
     * @param mixed $id_pouzivatela
     * Funkcia umožní nastaviť id pouzivatela
     */
    public function setIdPouzivatela($id_pouzivatela): void
    {
        $this->id_pouzivatela = $id_pouzivatela;
    }

    /**
     * @return array|mixed
     * Metóda vráti dáta z poľa
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}