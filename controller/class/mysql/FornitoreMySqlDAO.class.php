<?php
/**
 * Class that operate on table 'fornitore'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class FornitoreMySqlDAO implements FornitoreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FornitoreMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM fornitore WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM fornitore';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM fornitore ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param fornitore primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM fornitore WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FornitoreMySql fornitore
 	 */
	public function insert($fornitore){
		$sql = 'INSERT INTO fornitore (codice, ragioneSociale, piva, fiscale, indirizzo, cap, idCitta, telefono, fax, cellulare, email, sitoweb) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fornitore->codice);
		$sqlQuery->set($fornitore->ragioneSociale);
		$sqlQuery->set($fornitore->piva);
		$sqlQuery->set($fornitore->fiscale);
		$sqlQuery->set($fornitore->indirizzo);
		$sqlQuery->set($fornitore->cap);
		$sqlQuery->setNumber($fornitore->idCitta);
		$sqlQuery->set($fornitore->telefono);
		$sqlQuery->set($fornitore->fax);
		$sqlQuery->set($fornitore->cellulare);
		$sqlQuery->set($fornitore->email);
		$sqlQuery->set($fornitore->sitoweb);

		$id = $this->executeInsert($sqlQuery);	
		$fornitore->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FornitoreMySql fornitore
 	 */
	public function update($fornitore){
		$sql = 'UPDATE fornitore SET codice = ?, ragioneSociale = ?, piva = ?, fiscale = ?, indirizzo = ?, cap = ?, idCitta = ?, telefono = ?, fax = ?, cellulare = ?, email = ?, sitoweb = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($fornitore->codice);
		$sqlQuery->set($fornitore->ragioneSociale);
		$sqlQuery->set($fornitore->piva);
		$sqlQuery->set($fornitore->fiscale);
		$sqlQuery->set($fornitore->indirizzo);
		$sqlQuery->set($fornitore->cap);
		$sqlQuery->setNumber($fornitore->idCitta);
		$sqlQuery->set($fornitore->telefono);
		$sqlQuery->set($fornitore->fax);
		$sqlQuery->set($fornitore->cellulare);
		$sqlQuery->set($fornitore->email);
		$sqlQuery->set($fornitore->sitoweb);

		$sqlQuery->setNumber($fornitore->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM fornitore';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM fornitore WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRagioneSociale($value){
		$sql = 'SELECT * FROM fornitore WHERE ragioneSociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPiva($value){
		$sql = 'SELECT * FROM fornitore WHERE piva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFiscale($value){
		$sql = 'SELECT * FROM fornitore WHERE fiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndirizzo($value){
		$sql = 'SELECT * FROM fornitore WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCap($value){
		$sql = 'SELECT * FROM fornitore WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCitta($value){
		$sql = 'SELECT * FROM fornitore WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM fornitore WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM fornitore WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCellulare($value){
		$sql = 'SELECT * FROM fornitore WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM fornitore WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySitoweb($value){
		$sql = 'SELECT * FROM fornitore WHERE sitoweb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodice($value){
		$sql = 'DELETE FROM fornitore WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRagioneSociale($value){
		$sql = 'DELETE FROM fornitore WHERE ragioneSociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPiva($value){
		$sql = 'DELETE FROM fornitore WHERE piva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFiscale($value){
		$sql = 'DELETE FROM fornitore WHERE fiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndirizzo($value){
		$sql = 'DELETE FROM fornitore WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCap($value){
		$sql = 'DELETE FROM fornitore WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCitta($value){
		$sql = 'DELETE FROM fornitore WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM fornitore WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM fornitore WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCellulare($value){
		$sql = 'DELETE FROM fornitore WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM fornitore WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySitoweb($value){
		$sql = 'DELETE FROM fornitore WHERE sitoweb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FornitoreMySql 
	 */
	protected function readRow($row){
		$fornitore = new Fornitore();
		
		$fornitore->id = $row['id'];
		$fornitore->codice = $row['codice'];
		$fornitore->ragioneSociale = $row['ragioneSociale'];
		$fornitore->piva = $row['piva'];
		$fornitore->fiscale = $row['fiscale'];
		$fornitore->indirizzo = $row['indirizzo'];
		$fornitore->cap = $row['cap'];
		$fornitore->idCitta = $row['idCitta'];
		$fornitore->telefono = $row['telefono'];
		$fornitore->fax = $row['fax'];
		$fornitore->cellulare = $row['cellulare'];
		$fornitore->email = $row['email'];
		$fornitore->sitoweb = $row['sitoweb'];

		return $fornitore;
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
	 * @return FornitoreMySql 
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