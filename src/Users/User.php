<?php

abstract class User
{
    public string $firstName;
    public string $lastName;
    public string $addressStreet;
    public string $postcode;
    public string $email;

    public function __construct(string $firstName, string $lastName, string $addressStreet, string $postcode, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->addressStreet = $addressStreet;
        $this->postcode = $postcode;
        $this->email = $email;
    }
}