<?php

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../../bootstrap/app.php';

use Illuminate\Support\Facades\DB;
use App\Models\Person;

DB::enableQueryLog();
$timestart = microtime(true);
$person = Person::findOrFail(84);
$degree = $person->getDegreeWith(1265);
var_dump([
    "degree" => $degree,
    "time" => microtime(true) - $timestart,
    "nb_queries" => count(DB::getQueryLog())
]);