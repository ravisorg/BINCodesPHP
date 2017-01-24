<?php namespace ravisorg\BINCodesPHP;

class Client {

	protected $_apiKey = null;
	protected $_cache = null;
	protected $_apiUrl = 'https://api.bincodes.com/';

	public function __construct($apiKey) {
		$this->_apiKey = $apiKey;
	}

	public function enableCache(Cache $cache) {
		$this->_cache = $cache;
	}
	public function disableCache() {
		$this->_cache = null;
	}

	protected function request($url) {
		$temp = file_get_contents($url);
		if (!$temp) {
			throw new BinCodesException('Empty response received from API');
		}

		$json = json_decode($temp);
		if (!$json) {
			throw new BinCodesException("Invalid JSON returned from API");
		}

		if (isset($json->error)) {
			throw new BinCodesException($json->message,$json->error);
		}

		return $json;
	}

}
