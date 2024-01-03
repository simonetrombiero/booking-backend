<?php
/**
 * Class that operate on table 'itemdocumento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ItemdocumentoMySqlDAO implements ItemdocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ItemdocumentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM itemdocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM itemdocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM itemdocumento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param itemdocumento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM itemdocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ItemdocumentoMySql itemdocumento
 	 */
	public function insert($itemdocumento){
		$sql = 'INSERT INTO itemdocumento (idDocumento, qta, descrizione, codice, um, prezzoUnitario, sconto1, sconto2, sconto3, totaleRiga, valoreIva, percentualeIva, posizione) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($itemdocumento->idDocumento);
		$sqlQuery->setNumber($itemdocumento->qta);
		$sqlQuery->set($itemdocumento->descrizione);
		$sqlQuery->set($itemdocumento->codice);
		$sqlQuery->set($itemdocumento->um);
		$sqlQuery->set($itemdocumento->prezzoUnitario);
		$sqlQuery->set($itemdocumento->sconto1);
		$sqlQuery->set($itemdocumento->sconto2);
		$sqlQuery->set($itemdocumento->sconto3);
		$sqlQuery->set($itemdocumento->totaleRiga);
		$sqlQuery->set($itemdocumento->valoreIva);
		$sqlQuery->set($itemdocumento->percentualeIva);
		$sqlQuery->setNumber($itemdocumento->posizione);

		$id = $this->executeInsert($sqlQuery);	
		$itemdocumento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ItemdocumentoMySql itemdocumento
 	 */
	public function update($itemdocumento){
		$sql = 'UPDATE itemdocumento SET idDocumento = ?, qta = ?, descrizione = ?, codice = ?, um = ?, prezzoUnitario = ?, sconto1 = ?, sconto2 = ?, sconto3 = ?, totaleRiga = ?, valoreIva = ?, percentualeIva = ?, posizione = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($itemdocumento->idDocumento);
		$sqlQuery->setNumber($itemdocumento->qta);
		$sqlQuery->set($itemdocumento->descrizione);
		$sqlQuery->set($itemdocumento->codice);
		$sqlQuery->set($itemdocumento->um);
		$sqlQuery->set($itemdocumento->prezzoUnitario);
		$sqlQuery->set($itemdocumento->sconto1);
		$sqlQuery->set($itemdocumento->sconto2);
		$sqlQuery->set($itemdocumento->sconto3);
		$sqlQuery->set($itemdocumento->totaleRiga);
		$sqlQuery->set($itemdocumento->valoreIva);
		$sqlQuery->set($itemdocumento->percentualeIva);
		$sqlQuery->setNumber($itemdocumento->posizione);

		$sqlQuery->setNumber($itemdocumento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM itemdocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdDocumento($value){
		$sql = 'SELECT * FROM itemdocumento WHERE idDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQta($value){
		$sql = 'SELECT * FROM itemdocumento WHERE qta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM itemdocumento WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM itemdocumento WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUm($value){
		$sql = 'SELECT * FROM itemdocumento WHERE um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrezzoUnitario($value){
		$sql = 'SELECT * FROM itemdocumento WHERE prezzoUnitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySconto1($value){
		$sql = 'SELECT * FROM itemdocumento WHERE sconto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySconto2($value){
		$sql = 'SELECT * FROM itemdocumento WHERE sconto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySconto3($value){
		$sql = 'SELECT * FROM itemdocumento WHERE sconto3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleRiga($value){
		$sql = 'SELECT * FROM itemdocumento WHERE totaleRiga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValoreIva($value){
		$sql = 'SELECT * FROM itemdocumento WHERE valoreIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPercentualeIva($value){
		$sql = 'SELECT * FROM itemdocumento WHERE percentualeIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosizione($value){
		$sql = 'SELECT * FROM itemdocumento WHERE posizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdDocumento($value){
		$sql = 'DELETE FROM itemdocumento WHERE idDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQta($value){
		$sql = 'DELETE FROM itemdocumento WHERE qta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM itemdocumento WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodice($value){
		$sql = 'DELETE FROM itemdocumento WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUm($value){
		$sql = 'DELETE FROM itemdocumento WHERE um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrezzoUnitario($value){
		$sql = 'DELETE FROM itemdocumento WHERE prezzoUnitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySconto1($value){
		$sql = 'DELETE FROM itemdocumento WHERE sconto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySconto2($value){
		$sql = 'DELETE FROM itemdocumento WHERE sconto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySconto3($value){
		$sql = 'DELETE FROM itemdocumento WHERE sconto3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleRiga($value){
		$sql = 'DELETE FROM itemdocumento WHERE totaleRiga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValoreIva($value){
		$sql = 'DELETE FROM itemdocumento WHERE valoreIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPercentualeIva($value){
		$sql = 'DELETE FROM itemdocumento WHERE percentualeIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosizione($value){
		$sql = 'DELETE FROM itemdocumento WHERE posizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ItemdocumentoMySql 
	 */
	protected function readRow($row){
		$itemdocumento = new Itemdocumento();
		
		$itemdocumento->id = $row['id'];
		$itemdocumento->idDocumento = $row['idDocumento'];
		$itemdocumento->qta = $row['qta'];
		$itemdocumento->descrizione = $row['descrizione'];
		$itemdocumento->codice = $row['codice'];
		$itemdocumento->um = $row['um'];
		$itemdocumento->prezzoUnitario = $row['prezzoUnitario'];
		$itemdocumento->sconto1 = $row['sconto1'];
		$itemdocumento->sconto2 = $row['sconto2'];
		$itemdocumento->sconto3 = $row['sconto3'];
		$itemdocumento->totaleRiga = $row['totaleRiga'];
		$itemdocumento->valoreIva = $row['valoreIva'];
		$itemdocumento->percentualeIva = $row['percentualeIva'];
		$itemdocumento->posizione = $row['posizione'];

		return $itemdocumento;
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
	 * @return ItemdocumentoMySql 
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