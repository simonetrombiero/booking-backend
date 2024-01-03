<?php
/**
 * Class that operate on table 'fidelityCard'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class FidelityCardMySqlDAO implements FidelityCardDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FidelityCardMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fidelityCard WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fidelityCard';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fidelityCard ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fidelityCard primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM fidelityCard WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCardMySql fidelityCard
 	 */
	public function insert($fidelityCard){
		$sql = 'INSERT INTO fidelityCard (codiceInterno, codiceBarre, dataEmissione, dataScadenza, dataSospensione, saldoPunti, note, ultimaModifica, isSospesa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fidelityCard->codiceInterno);
		$sqlQuery->set($fidelityCard->codiceBarre);
		$sqlQuery->set($fidelityCard->dataEmissione);
		$sqlQuery->set($fidelityCard->dataScadenza);
		$sqlQuery->set($fidelityCard->dataSospensione);
		$sqlQuery->set($fidelityCard->saldoPunti);
		$sqlQuery->set($fidelityCard->note);
		$sqlQuery->set($fidelityCard->ultimaModifica);
		$sqlQuery->setNumber($fidelityCard->isSospesa);

		$id = $this->executeInsert($sqlQuery);	
		$fidelityCard->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCardMySql fidelityCard
 	 */
	public function update($fidelityCard){
		$sql = 'UPDATE fidelityCard SET codiceInterno = ?, codiceBarre = ?, dataEmissione = ?, dataScadenza = ?, dataSospensione = ?, saldoPunti = ?, note = ?, ultimaModifica = ?, isSospesa = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fidelityCard->codiceInterno);
		$sqlQuery->set($fidelityCard->codiceBarre);
		$sqlQuery->set($fidelityCard->dataEmissione);
		$sqlQuery->set($fidelityCard->dataScadenza);
		$sqlQuery->set($fidelityCard->dataSospensione);
		$sqlQuery->set($fidelityCard->saldoPunti);
		$sqlQuery->set($fidelityCard->note);
		$sqlQuery->set($fidelityCard->ultimaModifica);
		$sqlQuery->setNumber($fidelityCard->isSospesa);

		$sqlQuery->setNumber($fidelityCard->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fidelityCard';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodiceInterno($value){
		$sql = 'SELECT * FROM fidelityCard WHERE codiceInterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodiceBarre($value){
		$sql = 'SELECT * FROM fidelityCard WHERE codiceBarre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEmissione($value){
		$sql = 'SELECT * FROM fidelityCard WHERE dataEmissione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataScadenza($value){
		$sql = 'SELECT * FROM fidelityCard WHERE dataScadenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataSospensione($value){
		$sql = 'SELECT * FROM fidelityCard WHERE dataSospensione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySaldoPunti($value){
		$sql = 'SELECT * FROM fidelityCard WHERE saldoPunti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM fidelityCard WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModifica($value){
		$sql = 'SELECT * FROM fidelityCard WHERE ultimaModifica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSospesa($value){
		$sql = 'SELECT * FROM fidelityCard WHERE isSospesa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodiceInterno($value){
		$sql = 'DELETE FROM fidelityCard WHERE codiceInterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodiceBarre($value){
		$sql = 'DELETE FROM fidelityCard WHERE codiceBarre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEmissione($value){
		$sql = 'DELETE FROM fidelityCard WHERE dataEmissione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataScadenza($value){
		$sql = 'DELETE FROM fidelityCard WHERE dataScadenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataSospensione($value){
		$sql = 'DELETE FROM fidelityCard WHERE dataSospensione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySaldoPunti($value){
		$sql = 'DELETE FROM fidelityCard WHERE saldoPunti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM fidelityCard WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModifica($value){
		$sql = 'DELETE FROM fidelityCard WHERE ultimaModifica = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSospesa($value){
		$sql = 'DELETE FROM fidelityCard WHERE isSospesa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FidelityCardMySql 
	 */
	protected function readRow($row){
		$fidelityCard = new FidelityCard();
		
		$fidelityCard->id = $row['id'];
		$fidelityCard->codiceInterno = $row['codiceInterno'];
		$fidelityCard->codiceBarre = $row['codiceBarre'];
		$fidelityCard->dataEmissione = $row['dataEmissione'];
		$fidelityCard->dataScadenza = $row['dataScadenza'];
		$fidelityCard->dataSospensione = $row['dataSospensione'];
		$fidelityCard->saldoPunti = $row['saldoPunti'];
		$fidelityCard->note = $row['note'];
		$fidelityCard->ultimaModifica = $row['ultimaModifica'];
		$fidelityCard->isSospesa = $row['isSospesa'];

		return $fidelityCard;
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
	 * @return FidelityCardMySql 
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