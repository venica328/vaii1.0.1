<?php


class Film
{
    private $id_filmu;
    private $info;
    private $obsah;

    public function __construct($id_filmu, $info, $obsah)
    {
        $this->id_filmu = $id_filmu;
        $this->info = $info;
        $this->obsah = $obsah;
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
}