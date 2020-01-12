<?php

$includes = [
    'Domain/Customer.php',
    'Domain/CustomerService.php',
    'Domain/CustomerRepository.php',
    'Application/Http/Request/RequestDeserializer.php',
    'Application/Http/Request/Deserializer.php',
    'Application/Http/Request/CustomerManager.php',
    'Application/Http/Response/CustomerSerializer.php',
    'Application/Http/Response/Serializer.php',
    'Infrastructure/MysqlCustomerRepository.php',
    'Infrastructure/CustomerData.php',
];

foreach($includes as $file) {
    include_once $file;
}

