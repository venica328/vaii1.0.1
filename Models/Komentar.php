<?php

class Komentar implements \JsonSerializable
{
    private $id;
    private $nick;
    private $text;

    /**
     * Komentar constructor.
     * Plní funkciu pre počiatočné nastavenie objektu Komentar
     */
    public function __construct($id, $nick, $text)
    {
        $this->id = $id;
        $this->nick = $nick;
        $this->text = $text;
    }

    /**
     * @return mixed
     * Funkcia vráti id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     * Funkcia vráti nick
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * @param mixed $nick
     * Funkcia umožní pridať nick filmu
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * @return mixed
     * Funkcia vráti text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * Funkcia umožní pridať text
     */
    public function setText($text)
    {
        $this->text = $text;
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