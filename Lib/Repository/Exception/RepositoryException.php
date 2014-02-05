<?php
App::uses('CakeException', 'Error');

class RepositoryException extends CakeException {

	protected $_messageTemplate = 'Repository for model %s was not found.';
}