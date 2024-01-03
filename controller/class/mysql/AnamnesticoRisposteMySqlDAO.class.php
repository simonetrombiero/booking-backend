<?php
/**
 * Class that operate on table 'anamnesticoRisposte'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnamnesticoRisposteMySqlDAO implements AnamnesticoRisposteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnamnesticoRisposteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anamnesticoRisposte WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anamnesticoRisposte';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anamnesticoRisposte ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoRisposte primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anamnesticoRisposte WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoRisposteMySql anamnesticoRisposte
 	 */
	public function insert($anamnesticoRisposte){
		$sql = 'INSERT INTO anamnesticoRisposte (idRisposta, idDomanda, domanda, risposta) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoRisposte->idRisposta);
		$sqlQuery->setNumber($anamnesticoRisposte->idDomanda);
		$sqlQuery->set($anamnesticoRisposte->domanda);
		$sqlQuery->set($anamnesticoRisposte->risposta);

		$id = $this->executeInsert($sqlQuery);	
		$anamnesticoRisposte->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoRisposteMySql anamnesticoRisposte
 	 */
	public function update($anamnesticoRisposte){
		$sql = 'UPDATE anamnesticoRisposte SET idRisposta = ?, idDomanda = ?, domanda = ?, risposta = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoRisposte->idRisposta);
		$sqlQuery->setNumber($anamnesticoRisposte->idDomanda);
		$sqlQuery->set($anamnesticoRisposte->domanda);
		$sqlQuery->set($anamnesticoRisposte->risposta);

		$sqlQuery->setNumber($anamnesticoRisposte->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anamnesticoRisposte';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdRisposta($value){
		$sql = 'SELECT * FROM anamnesticoRisposte WHERE idRisposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDomanda($value){
		$sql = 'SELECT * FROM anamnesticoRisposte WHERE idDomanda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDomanda($value){
		$sql = 'SELECT * FROM anamnesticoRisposte WHERE domanda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRisposta($value){
		$sql = 'SELECT * FROM anamnesticoRisposte WHERE risposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRisposta($value){
		$sql = 'DELETE FROM anamnesticoRisposte WHERE idRisposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDomanda($value){
		$sql = 'DELETE FROM anamnesticoRisposte WHERE idDomanda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDomanda($value){
		$sql = 'DELETE FROM anamnesticoRisposte WHERE domanda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRisposta($value){
		$sql = 'DELETE FROM anamnesticoRisposte WHERE risposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnamnesticoRisposteMySql 
	 */
	protected function readRow($row){
		$anamnesticoRisposte = new AnamnesticoRisposte();
		
		$anamnesticoRisposte->id = $row['id'];
		$anamnesticoRisposte->idRisposta = $row['idRisposta'];
		$anamnesticoRisposte->idDomanda = $row['idDomanda'];
		$anamnesticoRisposte->domanda = $row['domanda'];
		$anamnesticoRisposte->risposta = $row['risposta'];

		return $anamnesticoRisposte;
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
	 * @return AnamnesticoRisposteMySql 
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