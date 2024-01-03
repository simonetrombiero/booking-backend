<?php
/**
 * Class that operate on table 'prenotazioniDettaglio'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PrenotazioniDettaglioMySqlDAO implements PrenotazioniDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrenotazioniDettaglioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prenotazioniDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prenotazioniDettaglio ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prenotazioniDettaglio primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioniDettaglioMySql prenotazioniDettaglio
 	 */
	public function insert($prenotazioniDettaglio){
		$sql = 'INSERT INTO prenotazioniDettaglio (prenotazione, idTrattamento, trattamento, idOperatore, idPostazione, note) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prenotazioniDettaglio->prenotazione);
		$sqlQuery->setNumber($prenotazioniDettaglio->idTrattamento);
		$sqlQuery->set($prenotazioniDettaglio->trattamento);
		$sqlQuery->setNumber($prenotazioniDettaglio->idOperatore);
		$sqlQuery->setNumber($prenotazioniDettaglio->idPostazione);
		$sqlQuery->set($prenotazioniDettaglio->note);

		$id = $this->executeInsert($sqlQuery);	
		$prenotazioniDettaglio->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioniDettaglioMySql prenotazioniDettaglio
 	 */
	public function update($prenotazioniDettaglio){
		$sql = 'UPDATE prenotazioniDettaglio SET prenotazione = ?, idTrattamento = ?, trattamento = ?, idOperatore = ?, idPostazione = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prenotazioniDettaglio->prenotazione);
		$sqlQuery->setNumber($prenotazioniDettaglio->idTrattamento);
		$sqlQuery->set($prenotazioniDettaglio->trattamento);
		$sqlQuery->setNumber($prenotazioniDettaglio->idOperatore);
		$sqlQuery->setNumber($prenotazioniDettaglio->idPostazione);
		$sqlQuery->set($prenotazioniDettaglio->note);

		$sqlQuery->setNumber($prenotazioniDettaglio->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prenotazioniDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPrenotazione($value){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE prenotazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdTrattamento($value){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE idTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrattamento($value){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdOperatore($value){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE idOperatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPostazione($value){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE idPostazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM prenotazioniDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPrenotazione($value){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE prenotazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTrattamento($value){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE idTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrattamento($value){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdOperatore($value){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE idOperatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPostazione($value){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE idPostazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM prenotazioniDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrenotazioniDettaglioMySql 
	 */
	protected function readRow($row){
		$prenotazioniDettaglio = new PrenotazioniDettaglio();
		
		$prenotazioniDettaglio->id = $row['id'];
		$prenotazioniDettaglio->prenotazione = $row['prenotazione'];
		$prenotazioniDettaglio->idTrattamento = $row['idTrattamento'];
		$prenotazioniDettaglio->trattamento = $row['trattamento'];
		$prenotazioniDettaglio->idOperatore = $row['idOperatore'];
		$prenotazioniDettaglio->idPostazione = $row['idPostazione'];
		$prenotazioniDettaglio->note = $row['note'];

		return $prenotazioniDettaglio;
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
	 * @return PrenotazioniDettaglioMySql 
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