<?php
/**
 * Class that operate on table 'prenotazioni'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PrenotazioniMySqlDAO implements PrenotazioniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrenotazioniMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prenotazioni WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prenotazioni';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prenotazioni ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prenotazioni primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM prenotazioni WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioniMySql prenotazioni
 	 */
	public function insert($prenotazioni){
		$sql = 'INSERT INTO prenotazioni (idPiano, idCliente, data, oraInizio, oraFine, note, status, noShow) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prenotazioni->idPiano);
		$sqlQuery->setNumber($prenotazioni->idCliente);
		$sqlQuery->set($prenotazioni->data);
		$sqlQuery->set($prenotazioni->oraInizio);
		$sqlQuery->set($prenotazioni->oraFine);
		$sqlQuery->set($prenotazioni->note);
		$sqlQuery->setNumber($prenotazioni->status);
		$sqlQuery->setNumber($prenotazioni->noShow);

		$id = $this->executeInsert($sqlQuery);	
		$prenotazioni->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioniMySql prenotazioni
 	 */
	public function update($prenotazioni){
		$sql = 'UPDATE prenotazioni SET idPiano = ?, idCliente = ?, data = ?, oraInizio = ?, oraFine = ?, note = ?, status = ?, noShow = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($prenotazioni->idPiano);
		$sqlQuery->setNumber($prenotazioni->idCliente);
		$sqlQuery->set($prenotazioni->data);
		$sqlQuery->set($prenotazioni->oraInizio);
		$sqlQuery->set($prenotazioni->oraFine);
		$sqlQuery->set($prenotazioni->note);
		$sqlQuery->setNumber($prenotazioni->status);
		$sqlQuery->setNumber($prenotazioni->noShow);

		$sqlQuery->setNumber($prenotazioni->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prenotazioni';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPiano($value){
		$sql = 'SELECT * FROM prenotazioni WHERE idPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM prenotazioni WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM prenotazioni WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraInizio($value){
		$sql = 'SELECT * FROM prenotazioni WHERE oraInizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraFine($value){
		$sql = 'SELECT * FROM prenotazioni WHERE oraFine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM prenotazioni WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM prenotazioni WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNoShow($value){
		$sql = 'SELECT * FROM prenotazioni WHERE noShow = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPiano($value){
		$sql = 'DELETE FROM prenotazioni WHERE idPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM prenotazioni WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM prenotazioni WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraInizio($value){
		$sql = 'DELETE FROM prenotazioni WHERE oraInizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraFine($value){
		$sql = 'DELETE FROM prenotazioni WHERE oraFine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM prenotazioni WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM prenotazioni WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNoShow($value){
		$sql = 'DELETE FROM prenotazioni WHERE noShow = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrenotazioniMySql 
	 */
	protected function readRow($row){
		$prenotazioni = new Prenotazioni();
		
		$prenotazioni->id = $row['id'];
		$prenotazioni->idPiano = $row['idPiano'];
		$prenotazioni->idCliente = $row['idCliente'];
		$prenotazioni->data = $row['data'];
		$prenotazioni->oraInizio = $row['oraInizio'];
		$prenotazioni->oraFine = $row['oraFine'];
		$prenotazioni->note = $row['note'];
		$prenotazioni->status = $row['status'];
		$prenotazioni->noShow = $row['noShow'];

		return $prenotazioni;
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
	 * @return PrenotazioniMySql 
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