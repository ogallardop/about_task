<?php

namespace Application\Http\Response;

use Symfony\Component\HttpFoundation\Response;

interface CustomerSerializer
{
    public function serialize($result) : Response;
}