<?php namespace ravisorg\BINCodesPHP;

class DirectoryCache extends Cache {

	protected $_directory = null;
	protected $_cacheTime = null;

	public function __construct($directory,$cacheTime=null) {
		if (!file_exists($directory) || !is_dir($directory) || !is_writeable($directory)) {
			throw new DirectoryCacheException('Directory does not exist or is not writable');
		}
		$this->_directory = $directory;
		$this->_cacheTime = $cacheTime;
	}

	protected function filename($key) {
		return $this->_directory.DIRECTORY_SEPARATOR.sha1($key);
	}
	protected function isFresh($filename) {
		if (!$this->_cacheTime) {
			return true;
		}
		$fileTime = filemtime($filename);
		$freshTime = time() - $this->_cacheTime;
		return ($fileTime>=$freshTime);
	}

	public function exists($key) {
		$filename = $this->filename($key);
		return file_exists($filename) && $this->isFresh($filename);
	}
	public function store($key,$value) {
		$filename = $this->filename($key);
		file_put_contents($filename,serialize($value));
		clearstatcache($filename);
		return $this->exists($key);
	}
	public function retrieve($key) {
		if (!$this->exists($key)) {
			throw new DirectoryCacheException('Key does not exist');
		}
		$filename = $this->filename($key);
		return unserialize(file_get_contents($filename));
	}
	public function delete($key) {
		if (!$this->exists($key)) {
			throw new DirectoryCacheException('Key does not exist');
		}
		$filename = $this->filename($key);
		unlink($filename);
		clearstatcache($filename);
		return !$this->exists($key);
	}

}
