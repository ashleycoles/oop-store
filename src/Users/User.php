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

    // For Part five, this abstract method ensures that all our different types of user are polymorphic - they behave in
    // the exact same way. In the future, if we added more User types, this abstract method means they MUST all have a
    // consistent way to get their address
    abstract public function getAddress(): string;
}