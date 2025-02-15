<?php

use Illuminate\Console\Scheduling\Schedule;

$schedule = new Schedule();
$schedule->command('command:generate')->everySixHours()->withoutOverlapping()->runInBackground();