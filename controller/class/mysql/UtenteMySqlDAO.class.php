<?php
/**
 * Class that operate on table 'utente'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class UtenteMySqlDAO implements UtenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UtenteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM utente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM utente';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM utente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param utente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM utente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UtenteMySql utente
 	 */
	public function insert($utente){
		$sql = 'INSERT INTO utente (idRuolo, nome, cognome, username, password, isAdmin, isSospeso) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($utente->idRuolo);
		$sqlQuery->set($utente->nome);
		$sqlQuery->set($utente->cognome);
		$sqlQuery->set($utente->username);
		$sqlQuery->set($utente->password);
		$sqlQuery->setNumber($utente->isAdmin);
		$sqlQuery->setNumber($utente->isSospeso);

		$id = $this->executeInsert($sqlQuery);	
		$utente->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UtenteMySql utente
 	 */
	public function update($utente){
		$sql = 'UPDATE utente SET idRuolo = ?, nome = ?, cognome = ?, username = ?, password = ?, isAdmin = ?, isSospeso = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($utente->idRuolo);
		$sqlQuery->set($utente->nome);
		$sqlQuery->set($utente->cognome);
		$sqlQuery->set($utente->username);
		$sqlQuery->set($utente->password);
		$sqlQuery->setNumber($utente->isAdmin);
		$sqlQuery->setNumber($utente->isSospeso);

		$sqlQuery->setNumber($utente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM utente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdRuolo($value){
		$sql = 'SELECT * FROM utente WHERE idRuolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM utente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCognome($value){
		$sql = 'SELECT * FROM utente WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM utente WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM utente WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsAdmin($value){
		$sql = 'SELECT * FROM utente WHERE isAdmin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSospeso($value){
		$sql = 'SELECT * FROM utente WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRuolo($value){
		$sql = 'DELETE FROM utente WHERE idRuolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM utente WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCognome($value){
		$sql = 'DELETE FROM utente WHERE cognome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM utente WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM utente WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsAdmin($value){
		$sql = 'DELETE FROM utente WHERE isAdmin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSospeso($value){
		$sql = 'DELETE FROM utente WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UtenteMySql 
	 */
	protected function readRow($row){
		$utente = new Utente();
		
		$utente->id = $row['id'];
		$utente->idRuolo = $row['idRuolo'];
		$utente->nome = $row['nome'];
		$utente->cognome = $row['cognome'];
		$utente->username = $row['username'];
		$utente->password = $row['password'];
		$utente->isAdmin = $row['isAdmin'];
		$utente->isSospeso = $row['isSospeso'];

		return $utente;
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
	 * @return UtenteMySql 
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