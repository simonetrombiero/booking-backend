<?php
/**
 * Class that operate on table 'penotazioniDettaglio'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2022-07-14 12:26
 */
class PenotazioniDettaglioMySqlDAO implements PenotazioniDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PenotazioniDettaglioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM penotazioniDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM penotazioniDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM penotazioniDettaglio ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param penotazioniDettaglio primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM penotazioniDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PenotazioniDettaglioMySql penotazioniDettaglio
 	 */
	public function insert($penotazioniDettaglio){
		$sql = 'INSERT INTO penotazioniDettaglio (idTrattamento, trattamento, note) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($penotazioniDettaglio->idTrattamento);
		$sqlQuery->setNumber($penotazioniDettaglio->trattamento);
		$sqlQuery->set($penotazioniDettaglio->note);

		$id = $this->executeInsert($sqlQuery);	
		$penotazioniDettaglio->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PenotazioniDettaglioMySql penotazioniDettaglio
 	 */
	public function update($penotazioniDettaglio){
		$sql = 'UPDATE penotazioniDettaglio SET idTrattamento = ?, trattamento = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($penotazioniDettaglio->idTrattamento);
		$sqlQuery->setNumber($penotazioniDettaglio->trattamento);
		$sqlQuery->set($penotazioniDettaglio->note);

		$sqlQuery->setNumber($penotazioniDettaglio->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM penotazioniDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdTrattamento($value){
		$sql = 'SELECT * FROM penotazioniDettaglio WHERE idTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrattamento($value){
		$sql = 'SELECT * FROM penotazioniDettaglio WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM penotazioniDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdTrattamento($value){
		$sql = 'DELETE FROM penotazioniDettaglio WHERE idTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrattamento($value){
		$sql = 'DELETE FROM penotazioniDettaglio WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM penotazioniDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PenotazioniDettaglioMySql 
	 */
	protected function readRow($row){
		$penotazioniDettaglio = new PenotazioniDettaglio();
		
		$penotazioniDettaglio->id = $row['id'];
		$penotazioniDettaglio->idTrattamento = $row['idTrattamento'];
		$penotazioniDettaglio->trattamento = $row['trattamento'];
		$penotazioniDettaglio->note = $row['note'];

		return $penotazioniDettaglio;
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
	 * @return PenotazioniDettaglioMySql 
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