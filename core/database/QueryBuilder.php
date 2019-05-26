<?php  

class QueryBuilder {

	protected $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function selectAll($table) {
		$statement = $this->pdo->prepare("SELECT * FROM ($table)");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function insert($table, $options) {

		$sql = sprintf(
			'insert into %s (%s) values (%s)',
		$table,
		implode(',  ', array_keys($options)),
		':' . implode(',  :', array_keys($options)));


		try {
			$statement = $this->pdo->prepare($sql);
			$statement->execute($options);
		}catch(Exception $e) {
			echo('Wants wrong');
		}
		

	}

}

?>