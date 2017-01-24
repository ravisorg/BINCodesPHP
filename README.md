# BINCodesPHP
A very simple PHP client for the bincodes.com API.

## Install

Install via Composer by adding the following to your composer.json file:

```json
{
   "require": {
      "ravisorg/bincodesphp": "0.*"
   }
}
```

## Example Use

A very simple directory cache is included, you can either use it or extend the Cache object to build 
your own (cache in database for example). It's highly recommended you cache the data somehow so you 
don't burden the API.

```php
use \ravisorg\BINCodesPHP\BinChecker;
use \ravisorg\BINCodesPHP\DirectoryCache;

$checker = new BINChecker(YOUR_API_KEY);
$checker->enableCache(new DirectoryCache(YOUR_CACHE_DIR,SECONDS_TO_CACHE_FOR));

$response = $checker->lookup(BIN_TO_CHECK);

var_dump($response);
```

##License

BINCodesPHP is licensed under the Modified BSD License (aka the 3 Clause BSD). Basically you can 
use it for any purpose, including commercial, so long as you leave the copyright notice intact and 
don't use my name or the names of any other contributors to promote products derived from 
BINCodesPHP.

	Copyright (c) 2012, ravisorg
	All rights reserved.
	
	Redistribution and use in source and binary forms, with or without
	modification, are permitted provided that the following conditions are met:
	    * Redistributions of source code must retain the above copyright
	      notice, this list of conditions and the following disclaimer.
	    * Redistributions in binary form must reproduce the above copyright
	      notice, this list of conditions and the following disclaimer in the
	      documentation and/or other materials provided with the distribution.
	    * Neither the name of the Travis Richardson nor the names of its 
	      contributors may be used to endorse or promote products derived 
	      from this software without specific prior written permission.
	
	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	DISCLAIMED. IN NO EVENT SHALL TRAVIS RICHARDSON BE LIABLE FOR ANY
	DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
	ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.