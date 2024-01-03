<?php
/**
 * Class that operate on table 'clienti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ClientiMySqlDAO implements ClientiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ClientiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM clienti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM clienti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM clienti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param clienti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM clienti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ClientiMySql clienti
 	 */
	public function insert($clienti){
		$sql = 'INSERT INTO clienti (ragione_sociale, cognome, nome, sesso, indirizzo, civico, cap, regione, provincia, citta, telefono, cellulare, email, data_nascita, luogo, c_fiscale, partitaIva) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($clienti->ragioneSociale);
		$sqlQuery->set($clienti->cognome);
		$sqlQuery->set($clienti->nome);
		$sqlQuery->set($clienti->sesso);
		$sqlQuery->set($clienti->indirizzo);
		$sqlQuery->set($clienti->civico);
		$sqlQuery->set($clienti->cap);
		$sqlQuery->set($clienti->regione);
		$sqlQuery->set($clienti->provincia);
		$sqlQuery->set($clienti->citta);
		$sqlQuery->set($clienti->telefono);
		$sqlQuery->set($clienti->cellulare);
		$sqlQuery->set($clienti->email);
		$sqlQuery->set($clienti->dataNascita);
		$sqlQuery->set($clienti->luogo);
		$sqlQuery->set($clienti->cFiscale);
		$sqlQuery->set($clienti->partitaIva);

		$id = $this->executeInsert($sqlQuery);	
		$clienti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ClientiMySql clienti
 	 */
	public function update($clienti){
		$sql = 'UPDATE clienti SET ragione_sociale = ?, cognome = ?, nome = ?, sesso = ?, indirizzo = ?, civico = ?, cap = ?, regione = ?, provincia = ?, citta = ?, telefono = ?, cellulare = ?, email = ?, data_nascita = ?, luogo = ?, c_fiscale = ?, partitaIva = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($clienti->ragioneSociale);
		$sqlQuery->set($clienti->cognome);
		$sqlQuery->set($clienti->nome);
		$sqlQuery->set($clienti->sesso);
		$sqlQuery->set($clienti->indirizzo);
		$sqlQuery->set($clienti->civico);
		$sqlQuery->set($clienti->cap);
		$sqlQuery->set($clienti->regione);
		$sqlQuery->set($clienti->provincia);
		$sqlQuery->set($clienti->citta);
		$sqlQuery->set($clienti->telefono);
		$sqlQuery->set($clienti->cellulare);
		$sqlQuery->set($clienti->email);
		$sqlQuery->set($clienti->dataNascita);
		$sqlQuery->set($clienti->luogo);
		$sqlQuery->set($clienti->cFiscale);
		$sqlQuery->set($clienti->partitaIva);

		$sqlQuery->setNumber($clienti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM clienti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRagioneSociale($value){
		$sql = 'SELECT * FROM clienti WHERE ragione_sociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCognome($value){
		$sql = 'SELECT * FROM clienti WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM clienti WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySesso($value){
		$sql = 'SELECT * FROM clienti WHERE sesso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndirizzo($value){
		$sql = 'SELECT * FROM clienti WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCivico($value){
		$sql = 'SELECT * FROM clienti WHERE civico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCap($value){
		$sql = 'SELECT * FROM clienti WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegione($value){
		$sql = 'SELECT * FROM clienti WHERE regione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProvincia($value){
		$sql = 'SELECT * FROM clienti WHERE provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCitta($value){
		$sql = 'SELECT * FROM clienti WHERE citta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM clienti WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCellulare($value){
		$sql = 'SELECT * FROM clienti WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM clienti WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataNascita($value){
		$sql = 'SELECT * FROM clienti WHERE data_nascita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLuogo($value){
		$sql = 'SELECT * FROM clienti WHERE luogo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCFiscale($value){
		$sql = 'SELECT * FROM clienti WHERE c_fiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartitaIva($value){
		$sql = 'SELECT * FROM clienti WHERE partitaIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRagioneSociale($value){
		$sql = 'DELETE FROM clienti WHERE ragione_sociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCognome($value){
		$sql = 'DELETE FROM clienti WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM clienti WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySesso($value){
		$sql = 'DELETE FROM clienti WHERE sesso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndirizzo($value){
		$sql = 'DELETE FROM clienti WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCivico($value){
		$sql = 'DELETE FROM clienti WHERE civico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCap($value){
		$sql = 'DELETE FROM clienti WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegione($value){
		$sql = 'DELETE FROM clienti WHERE regione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProvincia($value){
		$sql = 'DELETE FROM clienti WHERE provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCitta($value){
		$sql = 'DELETE FROM clienti WHERE citta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM clienti WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCellulare($value){
		$sql = 'DELETE FROM clienti WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM clienti WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataNascita($value){
		$sql = 'DELETE FROM clienti WHERE data_nascita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLuogo($value){
		$sql = 'DELETE FROM clienti WHERE luogo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCFiscale($value){
		$sql = 'DELETE FROM clienti WHERE c_fiscale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartitaIva($value){
		$sql = 'DELETE FROM clienti WHERE partitaIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ClientiMySql 
	 */
	protected function readRow($row){
		$clienti = new Clienti();
		
		$clienti->id = $row['id'];
		$clienti->ragioneSociale = $row['ragione_sociale'];
		$clienti->cognome = $row['cognome'];
		$clienti->nome = $row['nome'];
		$clienti->sesso = $row['sesso'];
		$clienti->indirizzo = $row['indirizzo'];
		$clienti->civico = $row['civico'];
		$clienti->cap = $row['cap'];
		$clienti->regione = $row['regione'];
		$clienti->provincia = $row['provincia'];
		$clienti->citta = $row['citta'];
		$clienti->telefono = $row['telefono'];
		$clienti->cellulare = $row['cellulare'];
		$clienti->email = $row['email'];
		$clienti->dataNascita = $row['data_nascita'];
		$clienti->luogo = $row['luogo'];
		$clienti->cFiscale = $row['c_fiscale'];
		$clienti->partitaIva = $row['partitaIva'];

		return $clienti;
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
	 * @return ClientiMySql 
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