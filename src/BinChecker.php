<?php namespace ravisorg\BINCodesPHP;

class BINChecker extends Client {

	protected $_apiPath = 'bin/';

	public function lookup($bin) {

		// Construct the request URL
		$url = $this->_apiUrl.$this->_apiPath.'?format=json&api_key='.urlencode($this->_apiKey).'&bin='.urlencode($bin);

		// if cache is enabled, check the cache first
		if ($this->_cache && $this->_cache->exists($url)) {
			return $this->_cache->retrieve($url);
		}

		// get live data
		try {
			$data = $this->request($url);
		}
		catch (Exception $e) {
			// bin not found - don't keep trying
			if ($e->getCode()==1007) {
				$this->_cache->store($url,null);
				return null;
			}
			throw $e;
		}

		// cache the response
		if ($this->_cache) {
			$this->_cache->store($url,$data);
		}

		// return it
		return $data;

	}

}
