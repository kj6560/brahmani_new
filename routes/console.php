<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('command:generate')->everyMinute()->withoutOverlapping()->runInBackground();