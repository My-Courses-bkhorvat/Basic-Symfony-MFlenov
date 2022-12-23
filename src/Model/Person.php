<?php

namespace App\Model;

class Person
{
    public $firstname;
    public $lastname;

    function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public static function CreateTestList()
    {
        return [
           new Person('Bohdan', 'Khorvat'),
           new Person('Islam', 'Khandurdyiev'),
           new Person('Nastya', 'Kovalenko')
        ];
    }
}