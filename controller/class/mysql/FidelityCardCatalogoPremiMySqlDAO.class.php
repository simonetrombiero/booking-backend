<?php
/**
 * Class that operate on table 'fidelityCardCatalogoPremi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class FidelityCardCatalogoPremiMySqlDAO implements FidelityCardCatalogoPremiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FidelityCardCatalogoPremiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fidelityCardCatalogoPremi primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCardCatalogoPremiMySql fidelityCardCatalogoPremi
 	 */
	public function insert($fidelityCardCatalogoPremi){
		$sql = 'INSERT INTO fidelityCardCatalogoPremi (codice, titolo, descrizione, puntiRichiesti, validoDa, validoA, contributoEconomico) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fidelityCardCatalogoPremi->codice);
		$sqlQuery->set($fidelityCardCatalogoPremi->titolo);
		$sqlQuery->set($fidelityCardCatalogoPremi->descrizione);
		$sqlQuery->set($fidelityCardCatalogoPremi->puntiRichiesti);
		$sqlQuery->set($fidelityCardCatalogoPremi->validoDa);
		$sqlQuery->set($fidelityCardCatalogoPremi->validoA);
		$sqlQuery->set($fidelityCardCatalogoPremi->contributoEconomico);

		$id = $this->executeInsert($sqlQuery);	
		$fidelityCardCatalogoPremi->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCardCatalogoPremiMySql fidelityCardCatalogoPremi
 	 */
	public function update($fidelityCardCatalogoPremi){
		$sql = 'UPDATE fidelityCardCatalogoPremi SET codice = ?, titolo = ?, descrizione = ?, puntiRichiesti = ?, validoDa = ?, validoA = ?, contributoEconomico = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fidelityCardCatalogoPremi->codice);
		$sqlQuery->set($fidelityCardCatalogoPremi->titolo);
		$sqlQuery->set($fidelityCardCatalogoPremi->descrizione);
		$sqlQuery->set($fidelityCardCatalogoPremi->puntiRichiesti);
		$sqlQuery->set($fidelityCardCatalogoPremi->validoDa);
		$sqlQuery->set($fidelityCardCatalogoPremi->validoA);
		$sqlQuery->set($fidelityCardCatalogoPremi->contributoEconomico);

		$sqlQuery->setNumber($fidelityCardCatalogoPremi->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitolo($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPuntiRichiesti($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE puntiRichiesti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValidoDa($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE validoDa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValidoA($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE validoA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContributoEconomico($value){
		$sql = 'SELECT * FROM fidelityCardCatalogoPremi WHERE contributoEconomico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodice($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitolo($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPuntiRichiesti($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE puntiRichiesti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValidoDa($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE validoDa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValidoA($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE validoA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContributoEconomico($value){
		$sql = 'DELETE FROM fidelityCardCatalogoPremi WHERE contributoEconomico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FidelityCardCatalogoPremiMySql 
	 */
	protected function readRow($row){
		$fidelityCardCatalogoPremi = new FidelityCardCatalogoPremi();
		
		$fidelityCardCatalogoPremi->id = $row['id'];
		$fidelityCardCatalogoPremi->codice = $row['codice'];
		$fidelityCardCatalogoPremi->titolo = $row['titolo'];
		$fidelityCardCatalogoPremi->descrizione = $row['descrizione'];
		$fidelityCardCatalogoPremi->puntiRichiesti = $row['puntiRichiesti'];
		$fidelityCardCatalogoPremi->validoDa = $row['validoDa'];
		$fidelityCardCatalogoPremi->validoA = $row['validoA'];
		$fidelityCardCatalogoPremi->contributoEconomico = $row['contributoEconomico'];

		return $fidelityCardCatalogoPremi;
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
	 * @return FidelityCardCatalogoPremiMySql 
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