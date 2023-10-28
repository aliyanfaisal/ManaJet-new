<?php

return [

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Key and Organization
    |--------------------------------------------------------------------------
    |
    | Here you may specify your OpenAI API Key and organization. This will be
    | used to authenticate with the OpenAI API - you can find your API key
    | and organization on your OpenAI dashboard, at https://openai.com.
    */

    'api_key' => env('OPENAI_API_KEY',"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"),
    'organization' => env('OPENAI_ORGANIZATION',"org-dmZS8Rv1vbD9HlPC2HTaWOBV"),
    'api_url' => env('OPENAI_API_URL') !== null ? env('OPENAI_API_URL') : '/generate-result',
    'use_sanctum' => env('OPENAI_USE_SANCTUM') !== null ? env('OPENAI_USE_SANCTUM') == true : false

];
