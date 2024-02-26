<?php

require_once 'src/Users/User.php';

class Business extends User
{
    public string $businessName;
    public string $vatNumber;

    public function __construct(
        string $firstName,
        string $lastName,
        string $addressStreet,
        string $postcode,
        string $email,
        string $businessName,
        string $vatNumber
    ) {
        parent::__construct($firstName, $lastName, $addressStreet, $postcode, $email);
        $this->businessName = $businessName;
        $this->vatNumber = $vatNumber;
    }

    public function getAddress(): string
    {
        return "<p>
            $this->lastName, $this->firstName<br />
            $this->businessName<br />
            $this->addressStreet $this->postcode
        </p>";
    }
}