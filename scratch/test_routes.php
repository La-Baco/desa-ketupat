<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$res = $kernel->handle(Illuminate\Http\Request::create('/berita?search=pembangunan', 'GET'));
echo "Search berita status: " . $res->getStatusCode() . "\n";
