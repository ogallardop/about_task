<?php

namespace App\Domain\Repository;

interface CustomerRepository
{
    public function getCustomer(int $id): ?array;

    public function createCustomer($customer): bool;

    public function updateCustomer($customer): bool;

    public function deleteCustomer(int $id): bool;
}