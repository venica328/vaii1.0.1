<?php


class Film
{
    private $id_filmu;
    private $info;
    private $obsah;
    private $obrazok;

    public function __construct($id_filmu, $info, $obsah, $obrazok)
    {
        $this->id_filmu = $id_filmu;
        $this->info = $info;
        $this->obsah = $obsah;
        $this->obrazok = $obrazok;
    }

    /**
     * @return mixed
     */
    public function getIdFilmu()
    {
        return $this->id_filmu;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @return mixed
     */
    public function getObsah()
    {
        return $this->obsah;
    }

    /**
     * @return mixed
     */
    public function getObrazok()
    {
        return $this->obrazok;
    }

    /**
     * @param mixed $id_filmu
     */
    public function setIdFilmu($id_filmu): void
    {
        $this->id_filmu = $id_filmu;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info): void
    {
        $this->info = $info;
    }

    /**
     * @param mixed $obsah
     */
    public function setObsah($obsah): void
    {
        $this->obsah = $obsah;
    }

    /**
     * @param mixed $obrazok
     */
    public function setObrazok($obrazok): void
    {
        $this->obrazok = $obrazok;
    }
}