<?php
/**
 * Class that operate on table 'consensoPrivacy'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ConsensoPrivacyMySqlDAO implements ConsensoPrivacyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ConsensoPrivacyMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM consensoPrivacy WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM consensoPrivacy';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM consensoPrivacy ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param consensoPrivacy primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM consensoPrivacy WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsensoPrivacyMySql consensoPrivacy
 	 */
	public function insert($consensoPrivacy){
		$sql = 'INSERT INTO consensoPrivacy (idCliente, dataCompilazione, trattamento, firmaTrattamento, comunicazione, firmaComunicazione, fidelity, firmaFidelity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($consensoPrivacy->idCliente);
		$sqlQuery->set($consensoPrivacy->dataCompilazione);
		$sqlQuery->set($consensoPrivacy->trattamento);
		$sqlQuery->set($consensoPrivacy->firmaTrattamento);
		$sqlQuery->set($consensoPrivacy->comunicazione);
		$sqlQuery->set($consensoPrivacy->firmaComunicazione);
		$sqlQuery->set($consensoPrivacy->fidelity);
		$sqlQuery->set($consensoPrivacy->firmaFidelity);

		$id = $this->executeInsert($sqlQuery);	
		$consensoPrivacy->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsensoPrivacyMySql consensoPrivacy
 	 */
	public function update($consensoPrivacy){
		$sql = 'UPDATE consensoPrivacy SET idCliente = ?, dataCompilazione = ?, trattamento = ?, firmaTrattamento = ?, comunicazione = ?, firmaComunicazione = ?, fidelity = ?, firmaFidelity = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($consensoPrivacy->idCliente);
		$sqlQuery->set($consensoPrivacy->dataCompilazione);
		$sqlQuery->set($consensoPrivacy->trattamento);
		$sqlQuery->set($consensoPrivacy->firmaTrattamento);
		$sqlQuery->set($consensoPrivacy->comunicazione);
		$sqlQuery->set($consensoPrivacy->firmaComunicazione);
		$sqlQuery->set($consensoPrivacy->fidelity);
		$sqlQuery->set($consensoPrivacy->firmaFidelity);

		$sqlQuery->setNumber($consensoPrivacy->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM consensoPrivacy';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCompilazione($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrattamento($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirmaTrattamento($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE firmaTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComunicazione($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE comunicazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirmaComunicazione($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE firmaComunicazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFidelity($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE fidelity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirmaFidelity($value){
		$sql = 'SELECT * FROM consensoPrivacy WHERE firmaFidelity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCompilazione($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrattamento($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirmaTrattamento($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE firmaTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComunicazione($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE comunicazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirmaComunicazione($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE firmaComunicazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFidelity($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE fidelity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirmaFidelity($value){
		$sql = 'DELETE FROM consensoPrivacy WHERE firmaFidelity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ConsensoPrivacyMySql 
	 */
	protected function readRow($row){
		$consensoPrivacy = new ConsensoPrivacy();
		
		$consensoPrivacy->id = $row['id'];
		$consensoPrivacy->idCliente = $row['idCliente'];
		$consensoPrivacy->dataCompilazione = $row['dataCompilazione'];
		$consensoPrivacy->trattamento = $row['trattamento'];
		$consensoPrivacy->firmaTrattamento = $row['firmaTrattamento'];
		$consensoPrivacy->comunicazione = $row['comunicazione'];
		$consensoPrivacy->firmaComunicazione = $row['firmaComunicazione'];
		$consensoPrivacy->fidelity = $row['fidelity'];
		$consensoPrivacy->firmaFidelity = $row['firmaFidelity'];

		return $consensoPrivacy;
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
	 * @return ConsensoPrivacyMySql 
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