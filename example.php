<?php

use \ravisorg\BINCodesPHP\BinChecker;
use \ravisorg\BINCodesPHP\DirectoryCache;

$checker = new BINChecker(YOUR_API_KEY);
$checker->enableCache(new DirectoryCache(YOUR_CACHE_DIR,SECONDS_TO_CACHE_FOR));

$response = $checker->lookup(BIN_TO_CHECK);

var_dump($response);

