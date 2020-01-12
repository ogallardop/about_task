<?php

namespace src\Application\Http\Request;

use Application\Http\Request\RequestDeserializer;
use Application\Http\Response\CustomerSerializer;
use Domain\Service\CustomerService;
use Infrastructure\Customer\MysqlCustomerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerManager
{
    /**
     * @var RequestDeserializer $deserializer
     */
    private $deserializer;

    private $serializer;

    private $request;

    private $customerService;

    public function __construct(RequestDeserializer $deserializer, CustomerSerializer $serializer, Request $request)
    {
        $this->deserializer = $deserializer;
        $this->serializer = $serializer;
        $this->request = $request;
        $this->customerService = new CustomerService(new MysqlCustomerRepository());
    }

    public function processRequest()
    {
        switch ($this->request->getMethod()) {
            case 'GET' :
                return $this->getCustomer($this->request->attributes->get('id'));
            case 'POST' :
                return $this->createCustomer($this->request);
            case 'PUT' :
                return $this->updateCustomer($this->request);
            case 'DELETE' :
                return $this->delCustomer($this->request->attributes->get('id'));
        }
        return '';
    }

    public function getCustomer(int $customerId) : Response
    {
        $customer = $this->customerService->getCustomer($customerId);
        return $this->serializer->serialize($customer);
    }

    public function updateCustomer(Request $request) : Response
    {
        $customer = $this->deserializer->deserialize($request);
        if ($this->customerService->updateCustomer($customer)) {
            return $this->serializer->serialize(['status' => 'ok']);
        }

        return $this->serializer->serialize(['status' => 'failed']);
    }

    public function createCustomer(Request $request) : Response
    {
        $customer = $this->deserializer->deserialize($request);
        if ($this->customerService->createCustomer($customer)) {
            return $this->serializer->serialize(['status' => 'ok']);
        }

        return $this->serializer->serialize(['status' => 'failed']);
    }

    public function delCustomer(int $customerId)
    {
        if ($this->customerService->deleteCustomer($customerId)) {
            return $this->serializer->serialize(['status' => 'ok']);
        }

        return $this->serializer->serialize(['status' => 'failed']);
    }
}
