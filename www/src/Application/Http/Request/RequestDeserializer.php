<?php

namespace Application\Http\Request;

use Symfony\Component\HttpFoundation\Request;

interface RequestDeserializer
{
    public function deserialize(Request $request);
}
