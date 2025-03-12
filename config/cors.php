<?php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
    'http://localhost:3000',  // Local dev URL
    'https://aazimtakk.vercel.app'  // Vercel frontend URL
],

    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Allow cookies
];