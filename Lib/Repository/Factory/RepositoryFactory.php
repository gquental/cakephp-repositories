<?php
App::uses('RepositoryException', 'Repositories.Lib/Repository/Exception');

class RepositoryFactory {

	public static function getRepository($name) {
		$repositoryName = $name . 'Repository';
		$repositoryPath = ROOT . DS . APP_DIR . DS . 'Repository' . DS . $repositoryName . '.php';

		if (!file_exists($repositoryPath)) {
			throw new RepositoryException(array($name));
		}

		App::uses($repositoryName, 'Repository');

		return new $repositoryName;
	}
}