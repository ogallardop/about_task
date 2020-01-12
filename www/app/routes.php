<?php
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use src\Application\Http\Request\CustomerManager;
use src\Application\Http\Request\Deserializer;
use Application\Http\Response\Serializer;

include_once '../src/Bundle.php';

$getCustomerRoute = new Routing\Route('/customer/{id}',
    ['_controller' => function (Request $request) {

        $customer = new CustomerManager(new Deserializer(), new Serializer(), $request);
        return $customer->processRequest();
    }]
);
$getCustomerRoute->setMethods(['GET', 'PUT', 'DELETE']);

$postCustomerRoute = new Routing\Route('/customer',
    ['_controller' => function (Request $request) {
        $customer = new CustomerManager(new Deserializer(), new Serializer(), $request);
        return $customer->processRequest();
    }]
);
$postCustomerRoute->setMethods('POST');

$routes = new Routing\RouteCollection();
$routes->add('getCustomer', $getCustomerRoute);
$routes->add('postCustomer', $postCustomerRoute);

return $routes;