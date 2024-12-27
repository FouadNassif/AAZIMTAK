<?php

return [

    /*
    |----------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |----------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', "*"],  // Allowing API and CSRF cookie routes

    'allowed_methods' => ['*'],  // Allow all methods (GET, POST, etc.)

    'allowed_origins' => [
        'http://localhost:3000',  // Your frontend's origin (replace with your frontend's URL)
        // You can add more origins if needed, like:
        // 'https://example.com',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Allow all headers

    'exposed_headers' => [],  // You can specify which headers to expose, leave empty if not needed

    'max_age' => 0,  // Cache duration for preflight requests

    'supports_credentials' => true,  // Allow cookies to be sent

];
