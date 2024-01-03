<?php
/**
 * Class that operate on table 'azienda'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
class AziendaMySqlDAO implements AziendaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AziendaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM azienda WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM azienda';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM azienda ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param azienda primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM azienda WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AziendaMySql azienda
 	 */
	public function insert($azienda){
		$sql = 'INSERT INTO azienda (idCitta, cap, ragioneSociale, denominazione, indirizzo, piva, codFisc, codiceUnivoco, telefono, telefono2, fax, cellulare, email, pec, sitoWeb, username, password, host, porta, dbname, lastaccess, tipoImmagine, logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($azienda->idCitta);
		$sqlQuery->set($azienda->cap);
		$sqlQuery->set($azienda->ragioneSociale);
		$sqlQuery->set($azienda->denominazione);
		$sqlQuery->set($azienda->indirizzo);
		$sqlQuery->set($azienda->piva);
		$sqlQuery->set($azienda->codFisc);
		$sqlQuery->set($azienda->codiceUnivoco);
		$sqlQuery->set($azienda->telefono);
		$sqlQuery->set($azienda->telefono2);
		$sqlQuery->set($azienda->fax);
		$sqlQuery->set($azienda->cellulare);
		$sqlQuery->set($azienda->email);
		$sqlQuery->set($azienda->pec);
		$sqlQuery->set($azienda->sitoWeb);
		$sqlQuery->set($azienda->username);
		$sqlQuery->set($azienda->password);
		$sqlQuery->set($azienda->host);
		$sqlQuery->setNumber($azienda->porta);
		$sqlQuery->set($azienda->dbname);
		$sqlQuery->set($azienda->lastaccess);
		$sqlQuery->set($azienda->tipoImmagine);
		$sqlQuery->set($azienda->logo);

		$id = $this->executeInsert($sqlQuery);	
		$azienda->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AziendaMySql azienda
 	 */
	public function update($azienda){
		$sql = 'UPDATE azienda SET idCitta = ?, cap = ?, ragioneSociale = ?, denominazione = ?, indirizzo = ?, piva = ?, codFisc = ?, codiceUnivoco = ?, telefono = ?, telefono2 = ?, fax = ?, cellulare = ?, email = ?, pec = ?, sitoWeb = ?, username = ?, password = ?, host = ?, porta = ?, dbname = ?, lastaccess = ?, tipoImmagine = ?, logo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($azienda->idCitta);
		$sqlQuery->set($azienda->cap);
		$sqlQuery->set($azienda->ragioneSociale);
		$sqlQuery->set($azienda->denominazione);
		$sqlQuery->set($azienda->indirizzo);
		$sqlQuery->set($azienda->piva);
		$sqlQuery->set($azienda->codFisc);
		$sqlQuery->set($azienda->codiceUnivoco);
		$sqlQuery->set($azienda->telefono);
		$sqlQuery->set($azienda->telefono2);
		$sqlQuery->set($azienda->fax);
		$sqlQuery->set($azienda->cellulare);
		$sqlQuery->set($azienda->email);
		$sqlQuery->set($azienda->pec);
		$sqlQuery->set($azienda->sitoWeb);
		$sqlQuery->set($azienda->username);
		$sqlQuery->set($azienda->password);
		$sqlQuery->set($azienda->host);
		$sqlQuery->setNumber($azienda->porta);
		$sqlQuery->set($azienda->dbname);
		$sqlQuery->set($azienda->lastaccess);
		$sqlQuery->set($azienda->tipoImmagine);
		$sqlQuery->set($azienda->logo);

		$sqlQuery->setNumber($azienda->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM azienda';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCitta($value){
		$sql = 'SELECT * FROM azienda WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCap($value){
		$sql = 'SELECT * FROM azienda WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRagioneSociale($value){
		$sql = 'SELECT * FROM azienda WHERE ragioneSociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDenominazione($value){
		$sql = 'SELECT * FROM azienda WHERE denominazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndirizzo($value){
		$sql = 'SELECT * FROM azienda WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPiva($value){
		$sql = 'SELECT * FROM azienda WHERE piva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodFisc($value){
		$sql = 'SELECT * FROM azienda WHERE codFisc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodiceUnivoco($value){
		$sql = 'SELECT * FROM azienda WHERE codiceUnivoco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM azienda WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono2($value){
		$sql = 'SELECT * FROM azienda WHERE telefono2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM azienda WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCellulare($value){
		$sql = 'SELECT * FROM azienda WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM azienda WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPec($value){
		$sql = 'SELECT * FROM azienda WHERE pec = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySitoWeb($value){
		$sql = 'SELECT * FROM azienda WHERE sitoWeb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM azienda WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM azienda WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHost($value){
		$sql = 'SELECT * FROM azienda WHERE host = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorta($value){
		$sql = 'SELECT * FROM azienda WHERE porta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDbname($value){
		$sql = 'SELECT * FROM azienda WHERE dbname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastaccess($value){
		$sql = 'SELECT * FROM azienda WHERE lastaccess = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoImmagine($value){
		$sql = 'SELECT * FROM azienda WHERE tipoImmagine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogo($value){
		$sql = 'SELECT * FROM azienda WHERE logo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCitta($value){
		$sql = 'DELETE FROM azienda WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCap($value){
		$sql = 'DELETE FROM azienda WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRagioneSociale($value){
		$sql = 'DELETE FROM azienda WHERE ragioneSociale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDenominazione($value){
		$sql = 'DELETE FROM azienda WHERE denominazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndirizzo($value){
		$sql = 'DELETE FROM azienda WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPiva($value){
		$sql = 'DELETE FROM azienda WHERE piva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodFisc($value){
		$sql = 'DELETE FROM azienda WHERE codFisc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodiceUnivoco($value){
		$sql = 'DELETE FROM azienda WHERE codiceUnivoco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM azienda WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono2($value){
		$sql = 'DELETE FROM azienda WHERE telefono2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM azienda WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCellulare($value){
		$sql = 'DELETE FROM azienda WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM azienda WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPec($value){
		$sql = 'DELETE FROM azienda WHERE pec = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySitoWeb($value){
		$sql = 'DELETE FROM azienda WHERE sitoWeb = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM azienda WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM azienda WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHost($value){
		$sql = 'DELETE FROM azienda WHERE host = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorta($value){
		$sql = 'DELETE FROM azienda WHERE porta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDbname($value){
		$sql = 'DELETE FROM azienda WHERE dbname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastaccess($value){
		$sql = 'DELETE FROM azienda WHERE lastaccess = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoImmagine($value){
		$sql = 'DELETE FROM azienda WHERE tipoImmagine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogo($value){
		$sql = 'DELETE FROM azienda WHERE logo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AziendaMySql 
	 */
	protected function readRow($row){
		$azienda = new Azienda();
		
		$azienda->id = $row['id'];
		$azienda->idCitta = $row['idCitta'];
		$azienda->cap = $row['cap'];
		$azienda->ragioneSociale = $row['ragioneSociale'];
		$azienda->denominazione = $row['denominazione'];
		$azienda->indirizzo = $row['indirizzo'];
		$azienda->piva = $row['piva'];
		$azienda->codFisc = $row['codFisc'];
		$azienda->codiceUnivoco = $row['codiceUnivoco'];
		$azienda->telefono = $row['telefono'];
		$azienda->telefono2 = $row['telefono2'];
		$azienda->fax = $row['fax'];
		$azienda->cellulare = $row['cellulare'];
		$azienda->email = $row['email'];
		$azienda->pec = $row['pec'];
		$azienda->sitoWeb = $row['sitoWeb'];
		$azienda->username = $row['username'];
		$azienda->password = $row['password'];
		$azienda->host = $row['host'];
		$azienda->porta = $row['porta'];
		$azienda->dbname = $row['dbname'];
		$azienda->lastaccess = $row['lastaccess'];
		$azienda->tipoImmagine = $row['tipoImmagine'];
		$azienda->logo = $row['logo'];

		return $azienda;
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
	 * @return AziendaMySql 
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