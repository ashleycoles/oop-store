<?php

require_once 'src/Users/User.php';

class Customer extends User
{
    public function getAddress(): string
    {
        return "<p>
            $this->lastName, $this->firstName<br />
            $this->addressStreet $this->postcode
        </p>";
    }
}