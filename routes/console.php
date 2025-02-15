<?php

use Illuminate\Console\Scheduling\Schedule;

$schedule = new Schedule();
$schedule->command('sitemap:generate')->everySixHours()->withoutOverlapping()->runInBackground();