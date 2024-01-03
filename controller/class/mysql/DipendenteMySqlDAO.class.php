<?php
/**
 * Class that operate on table 'dipendente'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class DipendenteMySqlDAO implements DipendenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DipendenteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM dipendente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM dipendente';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM dipendente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param dipendente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM dipendente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DipendenteMySql dipendente
 	 */
	public function insert($dipendente){
		$sql = 'INSERT INTO dipendente (idSede, idIncarico, nome, cognome, backgroundColor) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($dipendente->idSede);
		$sqlQuery->setNumber($dipendente->idIncarico);
		$sqlQuery->set($dipendente->nome);
		$sqlQuery->set($dipendente->cognome);
		$sqlQuery->set($dipendente->backgroundColor);

		$id = $this->executeInsert($sqlQuery);	
		$dipendente->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DipendenteMySql dipendente
 	 */
	public function update($dipendente){
		$sql = 'UPDATE dipendente SET idSede = ?, idIncarico = ?, nome = ?, cognome = ?, backgroundColor = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($dipendente->idSede);
		$sqlQuery->setNumber($dipendente->idIncarico);
		$sqlQuery->set($dipendente->nome);
		$sqlQuery->set($dipendente->cognome);
		$sqlQuery->set($dipendente->backgroundColor);

		$sqlQuery->setNumber($dipendente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM dipendente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdSede($value){
		$sql = 'SELECT * FROM dipendente WHERE idSede = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdIncarico($value){
		$sql = 'SELECT * FROM dipendente WHERE idIncarico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM dipendente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCognome($value){
		$sql = 'SELECT * FROM dipendente WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBackgroundColor($value){
		$sql = 'SELECT * FROM dipendente WHERE backgroundColor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSede($value){
		$sql = 'DELETE FROM dipendente WHERE idSede = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdIncarico($value){
		$sql = 'DELETE FROM dipendente WHERE idIncarico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM dipendente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCognome($value){
		$sql = 'DELETE FROM dipendente WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBackgroundColor($value){
		$sql = 'DELETE FROM dipendente WHERE backgroundColor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DipendenteMySql 
	 */
	protected function readRow($row){
		$dipendente = new Dipendente();
		
		$dipendente->id = $row['id'];
		$dipendente->idSede = $row['idSede'];
		$dipendente->idIncarico = $row['idIncarico'];
		$dipendente->nome = $row['nome'];
		$dipendente->cognome = $row['cognome'];
		$dipendente->backgroundColor = $row['backgroundColor'];

		return $dipendente;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return DipendenteMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>