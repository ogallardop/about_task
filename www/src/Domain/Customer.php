<?php

namespace App\Domain;

class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $customerName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $country;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postalCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->songDetails;
    }

}
