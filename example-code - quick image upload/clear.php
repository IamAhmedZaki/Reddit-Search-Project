<?php

// clear.php – upload to your root Laravel folder and visit in browser

use Illuminate\Support\Facades\Artisan;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

Artisan::call('config:clear');
Artisan::call('route:clear');
Artisan::call('cache:clear');
Artisan::call('view:clear');
Artisan::call('clear-compiled');

echo "Cleared all Laravel caches. You can now delete this file.";