<?php
App::uses('ClassRegistry', 'Utility');

class AbstractRepository {

	protected $_modelName;
	protected $_model;

	public function __construct() {
		$this->_modelName = $this->__getModelName();

		$this->__createModel();
	}

	public function __call($method, $args) {

		if (is_callable(array($this->getModel(), $method))) {
			return call_user_func_array(
				array($this->getModel(), $method),
				$args
			);
		}

		throw new BadMethodCallException();
	}

	public function getModel() {
		return $this->_model;
	}

	private function __getModelName() {
		return str_replace('Repository', '', get_class($this));
	}

	private function __createModel() {
		$this->_model = ClassRegistry::init($this->_modelName);
	}
}