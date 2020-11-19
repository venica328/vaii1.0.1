<?php

abstract class AStorage
{

    /*
     * metoda ma zistit ci prisli data
     */
    public function processData()
    {
        if (isset($_POST['sent'])) {
            $this->Save(new User($_POST['nick'],DBStorage::words($_POST['text'])));

        }

    }

    abstract function Load();
    abstract function Save(User $user);
    abstract function Delete(User $user);


}