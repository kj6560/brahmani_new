<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
$schedule->command('sitemap:generate')->everySixHours()->withoutOverlapping()->runInBackground();