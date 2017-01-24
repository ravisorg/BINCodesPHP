<?php namespace ravisorg\BINCodesPHP;

abstract class Cache {

	abstract function exists($key);
	abstract function store($key,$value);
	abstract function retrieve($key);
	abstract function delete($key);

}
