<?php

namespace Infrastructure\Customer;

use App\Domain\Repository\CustomerRepository;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;

class MysqlCustomerRepository implements CustomerRepository
{
    private $connectionParams = array(
        'dbname' => 'aboutdb',
        'user' => 'root',
        'password' => 'rootpass',
        'host' => 'mysqldb',
        'driver' => 'pdo_mysql',
    );

    public function getCustomer(int $id): ?array
    {
        $sql = "SELECT 
                    id, 
                    name, email, 
                    status, 
                    country, 
                    address, 
                    postal_code 
                FROM customer";
        $return = [];
        try {
            $conn = DriverManager::getConnection($this->connectionParams);
            $result = $conn->executeQuery($sql);
            return $result->fetch();
        } catch (DBALException $e) {
            $return = [$e->getMessage()];
        }

        return $return;
    }

    public function createCustomer($customer): bool
    {
        $sql = "INSERT INTO `customer` (`name`, `email`, `status`, `country`, `address`) 
                values (:name, :email, :status, :country, :address)";

        try {
            $conn = DriverManager::getConnection($this->connectionParams);
            $conn->executeQuery($sql, $customer);
            return true;
        } catch (DBALException $e) {
            $return = $e->getMessage();
        }

        return false;
    }

    public function updateCustomer($customer): bool
    {
        $sql = "UPDATE `customer` set 
                    name = :name, 
                    email = :email, 
                    status = :status, 
                    country = :country, 
                    address = :address
                WHERE id = :id";

        try {
            $conn = DriverManager::getConnection($this->connectionParams);
            $conn->executeQuery($sql, $customer);
            return true;
        } catch (DBALException $e) {
            $return = $e->getMessage();
        }

        return false;
    }

    public function deleteCustomer(int $id): bool
    {
        $sql = "DELETE FROM `customer`
                WHERE id = :id";

        try {
            $conn = DriverManager::getConnection($this->connectionParams);
            $conn->executeQuery($sql, ['id' => $id]);
            return true;
        } catch (DBALException $e) {
            $return = $e->getMessage();
        }

        return false;
    }
}