<?php

if(env('APP_ENV') == 'prod'){
  return [
      'supportsCredentials' => true,
      'allowedOrigins' => ['https://filipigustavo.github.io/cadastros-consumer'],
      'allowedHeaders' => ['*'],
      'allowedMethods' => ['*'],
      'exposedHeaders' => [],
      'maxAge' => 0,
  ];
}

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |
     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
     | to accept any value.
     |
     */
    'supportsCredentials' => true,
    'allowedOrigins' => ['http://localhost:4200'],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,
];
