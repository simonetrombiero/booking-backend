<?php
/**
 * Class that operate on table 'trattamentiVisoCorpo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class TrattamentiVisoCorpoMySqlDAO implements TrattamentiVisoCorpoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TrattamentiVisoCorpoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM trattamentiVisoCorpo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM trattamentiVisoCorpo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param trattamentiVisoCorpo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TrattamentiVisoCorpoMySql trattamentiVisoCorpo
 	 */
	public function insert($trattamentiVisoCorpo){
		$sql = 'INSERT INTO trattamentiVisoCorpo (idCliente, data, zonaTrattata, durata, misurazioni, pesoCorporeo, annotazioni, foto1, foto2, foto3, foto4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($trattamentiVisoCorpo->idCliente);
		$sqlQuery->set($trattamentiVisoCorpo->data);
		$sqlQuery->set($trattamentiVisoCorpo->zonaTrattata);
		$sqlQuery->set($trattamentiVisoCorpo->durata);
		$sqlQuery->set($trattamentiVisoCorpo->misurazioni);
		$sqlQuery->set($trattamentiVisoCorpo->pesoCorporeo);
		$sqlQuery->set($trattamentiVisoCorpo->annotazioni);
		$sqlQuery->set($trattamentiVisoCorpo->foto1);
		$sqlQuery->set($trattamentiVisoCorpo->foto2);
		$sqlQuery->set($trattamentiVisoCorpo->foto3);
		$sqlQuery->set($trattamentiVisoCorpo->foto4);

		$id = $this->executeInsert($sqlQuery);	
		$trattamentiVisoCorpo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TrattamentiVisoCorpoMySql trattamentiVisoCorpo
 	 */
	public function update($trattamentiVisoCorpo){
		$sql = 'UPDATE trattamentiVisoCorpo SET idCliente = ?, data = ?, zonaTrattata = ?, durata = ?, misurazioni = ?, pesoCorporeo = ?, annotazioni = ?, foto1 = ?, foto2 = ?, foto3 = ?, foto4 = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($trattamentiVisoCorpo->idCliente);
		$sqlQuery->set($trattamentiVisoCorpo->data);
		$sqlQuery->set($trattamentiVisoCorpo->zonaTrattata);
		$sqlQuery->set($trattamentiVisoCorpo->durata);
		$sqlQuery->set($trattamentiVisoCorpo->misurazioni);
		$sqlQuery->set($trattamentiVisoCorpo->pesoCorporeo);
		$sqlQuery->set($trattamentiVisoCorpo->annotazioni);
		$sqlQuery->set($trattamentiVisoCorpo->foto1);
		$sqlQuery->set($trattamentiVisoCorpo->foto2);
		$sqlQuery->set($trattamentiVisoCorpo->foto3);
		$sqlQuery->set($trattamentiVisoCorpo->foto4);

		$sqlQuery->setNumber($trattamentiVisoCorpo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM trattamentiVisoCorpo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZonaTrattata($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE zonaTrattata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDurata($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE durata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMisurazioni($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE misurazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPesoCorporeo($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE pesoCorporeo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnnotazioni($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE annotazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto1($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE foto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto2($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE foto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto3($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE foto3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto4($value){
		$sql = 'SELECT * FROM trattamentiVisoCorpo WHERE foto4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZonaTrattata($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE zonaTrattata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDurata($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE durata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMisurazioni($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE misurazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPesoCorporeo($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE pesoCorporeo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnnotazioni($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE annotazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto1($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE foto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto2($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE foto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto3($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE foto3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto4($value){
		$sql = 'DELETE FROM trattamentiVisoCorpo WHERE foto4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TrattamentiVisoCorpoMySql 
	 */
	protected function readRow($row){
		$trattamentiVisoCorpo = new TrattamentiVisoCorpo();
		
		$trattamentiVisoCorpo->id = $row['id'];
		$trattamentiVisoCorpo->idCliente = $row['idCliente'];
		$trattamentiVisoCorpo->data = $row['data'];
		$trattamentiVisoCorpo->zonaTrattata = $row['zonaTrattata'];
		$trattamentiVisoCorpo->durata = $row['durata'];
		$trattamentiVisoCorpo->misurazioni = $row['misurazioni'];
		$trattamentiVisoCorpo->pesoCorporeo = $row['pesoCorporeo'];
		$trattamentiVisoCorpo->annotazioni = $row['annotazioni'];
		$trattamentiVisoCorpo->foto1 = $row['foto1'];
		$trattamentiVisoCorpo->foto2 = $row['foto2'];
		$trattamentiVisoCorpo->foto3 = $row['foto3'];
		$trattamentiVisoCorpo->foto4 = $row['foto4'];

		return $trattamentiVisoCorpo;
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
	 * @return TrattamentiVisoCorpoMySql 
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