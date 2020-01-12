<?php

namespace Domain\Service;

use App\Domain\Repository\CustomerRepository;

class CustomerService
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomer(int $customerId): array
    {
        return $this->customerRepository->getCustomer($customerId);;
    }

    public function createCustomer($customer): bool
    {
        return $this->customerRepository->createCustomer($customer);
    }

    public function updateCustomer($customer): bool
    {
        return $this->customerRepository->updateCustomer($customer);
    }

    public function deleteCustomer(int $id): bool
    {
        return $this->customerRepository->deleteCustomer($id);
    }

}