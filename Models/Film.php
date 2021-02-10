<?php


class Film
{
    private $id_filmu;
    private $info;
    private $obsah;
    private $obrazok;

    /**
     * Film constructor.
     * Plní funkciu pre počiatočné nastavenie objektu Film
     */
    public function __construct($id_filmu, $info, $obsah, $obrazok)
    {
        $this->id_filmu = $id_filmu;
        $this->info = $info;
        $this->obsah = $obsah;
        $this->obrazok = $obrazok;
    }

    /**
     * @return mixed
     * Funkcia vráti id filmu
     */
    public function getIdFilmu()
    {
        return $this->id_filmu;
    }

    /**
     * @return mixed
     * Funkcia vráti info(názov) filmu
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @return mixed
     * Funkcia vráti obsah filmu
     */
    public function getObsah()
    {
        return $this->obsah;
    }

    /**
     * @return mixed
     * Funkcia vráti obrázok filmu
     */
    public function getObrazok()
    {
        return $this->obrazok;
    }

    /**
     * @param mixed $id_filmu
     * Funkcia umožní pridať hodnotu id filmu
     */
    public function setIdFilmu($id_filmu): void
    {
        $this->id_filmu = $id_filmu;
    }

    /**
     * @param mixed $info
     * Funkcia umožní pridať hodnotu info filmu
     */
    public function setInfo($info): void
    {
        $this->info = $info;
    }

    /**
     * @param mixed $obsah
     * Funkcia umožní pridať hodnotu obsah filmu
     */
    public function setObsah($obsah): void
    {
        $this->obsah = $obsah;
    }

    /**
     * @param mixed $obrazok
     * Funkcia umožní pridať hodnotu obrazok filmu
     */
    public function setObrazok($obrazok): void
    {
        $this->obrazok = $obrazok;
    }
}