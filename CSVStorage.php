<?php

include "AStorage.php";


class CSVStorage extends AStorage
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    function Save(User $user)
    {
        file_put_contents($this->filename, PHP_EOL . $user->getNick() . ';' .$user->getDate() . ';' . $user->getText(), FILE_APPEND);
    }

    /**
     * @return User[]
     * funkcia na nahratie dat
     */
    function Load()
    {
        $data = file_get_contents($this->filename);
        $users = [];
        foreach (explode(PHP_EOL, $data) as $line) {
            $items = explode(';', $line);
            $users[] = new User($items[0], $items[1]);
        }
        return $users;

    }


    function Delete(User $user)
    {
        // TODO: Implement Delete() method.
    }
}