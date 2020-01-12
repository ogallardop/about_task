<?php

namespace App\Test\Unit;

use App\Domain\Customer;
use Domain\Service\CustomerService;
use Infrastructure\Customer\MysqlCustomerRepository;
use PHPUnit\Framework\TestCase;

include __DIR__ . '/../../Bundle.php';

class CustomerServiceTest extends TestCase
{
    public function testAdd()
    {
        $customer = new CustomerService(new MysqlCustomerRepository());
        $content = $customer->getCustomer(1);

        $this->assertEquals($content['name'], 'Oscar');
        $this->assertEquals($content['email'], 'oscar.gallardo@outlook.com');
        $this->assertEquals($content['status'], 'Registered');
        $this->assertEquals($content['country'], 'Germany');
        $this->assertEquals($content['address'], 'Osloer 57');
    }
}