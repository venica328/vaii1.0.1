<?php


class Sedacky
{
    private $id;
    private $id_sedadla;

    public function __construct($id, $id_sedadla)
    {
        $this->id = $id;
        $this->id_sedadla = $id_sedadla;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdSedadla()
    {
        return $this->id_sedadla;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $id_sedadla
     */
    public function setIdSedadla($id_sedadla): void
    {
        $this->id_sedadla = $id_sedadla;
    }
}