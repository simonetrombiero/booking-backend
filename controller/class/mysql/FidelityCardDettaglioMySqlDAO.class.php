<?php
/**
 * Class that operate on table 'fidelityCardDettaglio'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class FidelityCardDettaglioMySqlDAO implements FidelityCardDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FidelityCardDettaglioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fidelityCardDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fidelityCardDettaglio ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fidelityCardDettaglio primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCardDettaglioMySql fidelityCardDettaglio
 	 */
	public function insert($fidelityCardDettaglio){
		$sql = 'INSERT INTO fidelityCardDettaglio (idCard, data, descrizione, importo, punti, concorso, note) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fidelityCardDettaglio->idCard);
		$sqlQuery->set($fidelityCardDettaglio->data);
		$sqlQuery->set($fidelityCardDettaglio->descrizione);
		$sqlQuery->set($fidelityCardDettaglio->importo);
		$sqlQuery->set($fidelityCardDettaglio->punti);
		$sqlQuery->set($fidelityCardDettaglio->concorso);
		$sqlQuery->set($fidelityCardDettaglio->note);

		$id = $this->executeInsert($sqlQuery);	
		$fidelityCardDettaglio->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCardDettaglioMySql fidelityCardDettaglio
 	 */
	public function update($fidelityCardDettaglio){
		$sql = 'UPDATE fidelityCardDettaglio SET idCard = ?, data = ?, descrizione = ?, importo = ?, punti = ?, concorso = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($fidelityCardDettaglio->idCard);
		$sqlQuery->set($fidelityCardDettaglio->data);
		$sqlQuery->set($fidelityCardDettaglio->descrizione);
		$sqlQuery->set($fidelityCardDettaglio->importo);
		$sqlQuery->set($fidelityCardDettaglio->punti);
		$sqlQuery->set($fidelityCardDettaglio->concorso);
		$sqlQuery->set($fidelityCardDettaglio->note);

		$sqlQuery->setNumber($fidelityCardDettaglio->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fidelityCardDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCard($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE idCard = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporto($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPunti($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE punti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConcorso($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE concorso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM fidelityCardDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCard($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE idCard = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporto($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPunti($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE punti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConcorso($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE concorso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM fidelityCardDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FidelityCardDettaglioMySql 
	 */
	protected function readRow($row){
		$fidelityCardDettaglio = new FidelityCardDettaglio();
		
		$fidelityCardDettaglio->id = $row['id'];
		$fidelityCardDettaglio->idCard = $row['idCard'];
		$fidelityCardDettaglio->data = $row['data'];
		$fidelityCardDettaglio->descrizione = $row['descrizione'];
		$fidelityCardDettaglio->importo = $row['importo'];
		$fidelityCardDettaglio->punti = $row['punti'];
		$fidelityCardDettaglio->concorso = $row['concorso'];
		$fidelityCardDettaglio->note = $row['note'];

		return $fidelityCardDettaglio;
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
	 * @return FidelityCardDettaglioMySql 
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