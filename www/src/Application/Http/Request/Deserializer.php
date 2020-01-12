<?php

namespace src\Application\Http\Request;

use Application\Http\Request\RequestDeserializer;
use Symfony\Component\HttpFoundation\Request;

class Deserializer implements RequestDeserializer
{

    public function deserialize(Request $request)
    {
        $content = json_decode($request->getContent(), true);

        if ($request->getContentType() == 'json' && !empty($content)) {
            if (!empty($request->get('id'))) {
                $content['id'] =  $request->get('id');
            }

            return $content;
        }

        return [];
    }
}
