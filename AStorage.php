<?php

abstract class AStorage
{

    /*
     * metoda ma zistit ci prisli data
     */
    public function processData()
    {
        if (isset($_POST['sent'])) {
            $this->Save(new User(0,$_POST['nick'],$_POST['text']));

        }

        if (isset($_GET['delete'])) {
            $this->Delete(new User($_GET['delete'],'',''));

        }

    }

    abstract function Load();
    abstract function Save(User $user);
    abstract function Delete(User $user);


}