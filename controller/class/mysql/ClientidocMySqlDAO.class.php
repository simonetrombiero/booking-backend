<?php
/**
 * Class that operate on table 'clientidoc'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ClientidocMySqlDAO implements ClientidocDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ClientidocMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM clientidoc WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM clientidoc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM clientidoc ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param clientidoc primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM clientidoc WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ClientidocMySql clientidoc
 	 */
	public function insert($clientidoc){
		$sql = 'INSERT INTO clientidoc (idCliente, codice, nome, cognome, ragioneSociale, piva, idCitta, indirizzo, cap, codiceFiscale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($clientidoc->idCliente);
		$sqlQuery->set($clientidoc->codice);
		$sqlQuery->set($clientidoc->nome);
		$sqlQuery->set($clientidoc->cognome);
		$sqlQuery->set($clientidoc->ragioneSociale);
		$sqlQuery->set($clientidoc->piva);
		$sqlQuery->setNumber($clientidoc->idCitta);
		$sqlQuery->set($clientidoc->indirizzo);
		$sqlQuery->setNumber($clientidoc->cap);
		$sqlQuery->set($clientidoc->codiceFiscale);

		$id = $this->executeInsert($sqlQuery);	
		$clientidoc->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ClientidocMySql clientidoc
 	 */
	public function update($clientidoc){
		$sql = 'UPDATE clientidoc SET idCliente = ?, codice = ?, nome = ?, cognome = ?, ragioneSociale = ?, piva = ?, idCitta = ?, indirizzo = ?, cap = ?, codiceFiscale = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($clientidoc->idCliente);
		$sqlQuery->set($clientidoc->codice);
		$sqlQuery->set($clientidoc->nome);
		$sqlQuery->set($clientidoc->cognome);
		$sqlQuery->set($clientidoc->ragioneSociale);
		$sqlQuery->set($clientidoc->piva);
		$sqlQuery->setNumber($clientidoc->idCitta);
		$sqlQuery->set($clientidoc->indirizzo);
		$sqlQuery->setNumber($clientidoc->cap);
		$sqlQuery->set($clientidoc->codiceFiscale);

		$sqlQuery->setNumber($clientidoc->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM clientidoc';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM clientidoc WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM clientidoc WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM clientidoc WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCognome($value){
		$sql = 'SELECT * FROM clientidoc WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRagioneSociale($value){
		$sql = 'SELECT * FROM clientidoc WHERE ragioneSociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPiva($value){
		$sql = 'SELECT * FROM clientidoc WHERE piva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCitta($value){
		$sql = 'SELECT * FROM clientidoc WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndirizzo($value){
		$sql = 'SELECT * FROM clientidoc WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCap($value){
		$sql = 'SELECT * FROM clientidoc WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodiceFiscale($value){
		$sql = 'SELECT * FROM clientidoc WHERE codiceFiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM clientidoc WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodice($value){
		$sql = 'DELETE FROM clientidoc WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM clientidoc WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCognome($value){
		$sql = 'DELETE FROM clientidoc WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRagioneSociale($value){
		$sql = 'DELETE FROM clientidoc WHERE ragioneSociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPiva($value){
		$sql = 'DELETE FROM clientidoc WHERE piva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCitta($value){
		$sql = 'DELETE FROM clientidoc WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndirizzo($value){
		$sql = 'DELETE FROM clientidoc WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCap($value){
		$sql = 'DELETE FROM clientidoc WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodiceFiscale($value){
		$sql = 'DELETE FROM clientidoc WHERE codiceFiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ClientidocMySql 
	 */
	protected function readRow($row){
		$clientidoc = new Clientidoc();
		
		$clientidoc->id = $row['id'];
		$clientidoc->idCliente = $row['idCliente'];
		$clientidoc->codice = $row['codice'];
		$clientidoc->nome = $row['nome'];
		$clientidoc->cognome = $row['cognome'];
		$clientidoc->ragioneSociale = $row['ragioneSociale'];
		$clientidoc->piva = $row['piva'];
		$clientidoc->idCitta = $row['idCitta'];
		$clientidoc->indirizzo = $row['indirizzo'];
		$clientidoc->cap = $row['cap'];
		$clientidoc->codiceFiscale = $row['codiceFiscale'];

		return $clientidoc;
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
	 * @return ClientidocMySql 
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