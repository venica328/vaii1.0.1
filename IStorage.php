<?php


interface IStorage
{
    function Save(User $user);

    function Load();
}