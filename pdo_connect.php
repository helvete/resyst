<?php
/**
 * DBConnector class
 * TODO
 */
class DBConnector {

	// connection string config option names
	const DSN = 'db_dsn';
	const USER = 'db_user';
	const PASSWORD = 'db_password';

	/**
	 * PDO cache holder
	 * @var PDO
	 */
	static private $_pdo;

	/**
	 * Get PDO instance
	 *
	 * @return PDO
	 */
	static public function getPDO() {
		if (empty (self::$_pdo)) {
			self::$_pdo = new PDO(
				Conf::get(self::DSN),
				Conf::get(self::USER),
				Conf::get(self::PASSWORD)
			);
		}

		return self::$_pdo;
	}
}
