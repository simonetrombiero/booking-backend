<?php
/**
 * Class that operate on table 'prenotazioni_trattamenti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PrenotazioniTrattamentiMySqlDAO implements PrenotazioniTrattamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrenotazioniTrattamentiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prenotazioni_trattamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prenotazioni_trattamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prenotazioni_trattamenti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prenotazioniTrattamenti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM prenotazioni_trattamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioniTrattamentiMySql prenotazioniTrattamenti
 	 */
	public function insert($prenotazioniTrattamenti){
		$sql = 'INSERT INTO prenotazioni_trattamenti (idPrenotazione, idTrattamento) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prenotazioniTrattamenti->idPrenotazione);
		$sqlQuery->setNumber($prenotazioniTrattamenti->idTrattamento);

		$id = $this->executeInsert($sqlQuery);	
		$prenotazioniTrattamenti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioniTrattamentiMySql prenotazioniTrattamenti
 	 */
	public function update($prenotazioniTrattamenti){
		$sql = 'UPDATE prenotazioni_trattamenti SET idPrenotazione = ?, idTrattamento = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prenotazioniTrattamenti->idPrenotazione);
		$sqlQuery->setNumber($prenotazioniTrattamenti->idTrattamento);

		$sqlQuery->setNumber($prenotazioniTrattamenti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prenotazioni_trattamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPrenotazione($value){
		$sql = 'SELECT * FROM prenotazioni_trattamenti WHERE idPrenotazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdTrattamento($value){
		$sql = 'SELECT * FROM prenotazioni_trattamenti WHERE idTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPrenotazione($value){
		$sql = 'DELETE FROM prenotazioni_trattamenti WHERE idPrenotazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTrattamento($value){
		$sql = 'DELETE FROM prenotazioni_trattamenti WHERE idTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrenotazioniTrattamentiMySql 
	 */
	protected function readRow($row){
		$prenotazioniTrattamenti = new PrenotazioniTrattamenti();
		
		$prenotazioniTrattamenti->id = $row['id'];
		$prenotazioniTrattamenti->idPrenotazione = $row['idPrenotazione'];
		$prenotazioniTrattamenti->idTrattamento = $row['idTrattamento'];

		return $prenotazioniTrattamenti;
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
	 * @return PrenotazioniTrattamentiMySql 
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