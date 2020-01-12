<?php

namespace Application\Http\Response;

use \Symfony\Component\HttpFoundation\Response;

class Serializer implements CustomerSerializer
{
    public function serialize($result) : Response
    {
        $headers = ['Content-Type' => 'application/json'];
        return new Response(json_encode($result), 200, $headers);
    }
}