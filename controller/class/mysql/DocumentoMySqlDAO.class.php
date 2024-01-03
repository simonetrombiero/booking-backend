<?php
/**
 * Class that operate on table 'documento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class DocumentoMySqlDAO implements DocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DocumentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM documento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM documento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM documento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param documento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM documento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentoMySql documento
 	 */
	public function insert($documento){
		$sql = 'INSERT INTO documento (idIndiceDocumento, idTipoDocumento, idClienteDoc, idFornitoreDoc, idDestinazioneDoc, idPagamentoDoc, progressivo, anno, data, totaleIva, imponibile, totaleDocumento, totaleDaSaldare, totaleSaldato, abbuono, eccedenza, causale, aspetto, dataConsegna, oraConsegna, porto, colli, pesoNetto, pesoLordo, note, isDefinitivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documento->idIndiceDocumento);
		$sqlQuery->setNumber($documento->idTipoDocumento);
		$sqlQuery->setNumber($documento->idClienteDoc);
		$sqlQuery->setNumber($documento->idFornitoreDoc);
		$sqlQuery->setNumber($documento->idDestinazioneDoc);
		$sqlQuery->setNumber($documento->idPagamentoDoc);
		$sqlQuery->setNumber($documento->progressivo);
		$sqlQuery->setNumber($documento->anno);
		$sqlQuery->set($documento->data);
		$sqlQuery->set($documento->totaleIva);
		$sqlQuery->set($documento->imponibile);
		$sqlQuery->set($documento->totaleDocumento);
		$sqlQuery->set($documento->totaleDaSaldare);
		$sqlQuery->set($documento->totaleSaldato);
		$sqlQuery->set($documento->abbuono);
		$sqlQuery->set($documento->eccedenza);
		$sqlQuery->set($documento->causale);
		$sqlQuery->set($documento->aspetto);
		$sqlQuery->set($documento->dataConsegna);
		$sqlQuery->set($documento->oraConsegna);
		$sqlQuery->set($documento->porto);
		$sqlQuery->setNumber($documento->colli);
		$sqlQuery->set($documento->pesoNetto);
		$sqlQuery->set($documento->pesoLordo);
		$sqlQuery->set($documento->note);
		$sqlQuery->setNumber($documento->isDefinitivo);

		$id = $this->executeInsert($sqlQuery);	
		$documento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentoMySql documento
 	 */
	public function update($documento){
		$sql = 'UPDATE documento SET idIndiceDocumento = ?, idTipoDocumento = ?, idClienteDoc = ?, idFornitoreDoc = ?, idDestinazioneDoc = ?, idPagamentoDoc = ?, progressivo = ?, anno = ?, data = ?, totaleIva = ?, imponibile = ?, totaleDocumento = ?, totaleDaSaldare = ?, totaleSaldato = ?, abbuono = ?, eccedenza = ?, causale = ?, aspetto = ?, dataConsegna = ?, oraConsegna = ?, porto = ?, colli = ?, pesoNetto = ?, pesoLordo = ?, note = ?, isDefinitivo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documento->idIndiceDocumento);
		$sqlQuery->setNumber($documento->idTipoDocumento);
		$sqlQuery->setNumber($documento->idClienteDoc);
		$sqlQuery->setNumber($documento->idFornitoreDoc);
		$sqlQuery->setNumber($documento->idDestinazioneDoc);
		$sqlQuery->setNumber($documento->idPagamentoDoc);
		$sqlQuery->setNumber($documento->progressivo);
		$sqlQuery->setNumber($documento->anno);
		$sqlQuery->set($documento->data);
		$sqlQuery->set($documento->totaleIva);
		$sqlQuery->set($documento->imponibile);
		$sqlQuery->set($documento->totaleDocumento);
		$sqlQuery->set($documento->totaleDaSaldare);
		$sqlQuery->set($documento->totaleSaldato);
		$sqlQuery->set($documento->abbuono);
		$sqlQuery->set($documento->eccedenza);
		$sqlQuery->set($documento->causale);
		$sqlQuery->set($documento->aspetto);
		$sqlQuery->set($documento->dataConsegna);
		$sqlQuery->set($documento->oraConsegna);
		$sqlQuery->set($documento->porto);
		$sqlQuery->setNumber($documento->colli);
		$sqlQuery->set($documento->pesoNetto);
		$sqlQuery->set($documento->pesoLordo);
		$sqlQuery->set($documento->note);
		$sqlQuery->setNumber($documento->isDefinitivo);

		$sqlQuery->setNumber($documento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM documento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdIndiceDocumento($value){
		$sql = 'SELECT * FROM documento WHERE idIndiceDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdTipoDocumento($value){
		$sql = 'SELECT * FROM documento WHERE idTipoDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdClienteDoc($value){
		$sql = 'SELECT * FROM documento WHERE idClienteDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdFornitoreDoc($value){
		$sql = 'SELECT * FROM documento WHERE idFornitoreDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDestinazioneDoc($value){
		$sql = 'SELECT * FROM documento WHERE idDestinazioneDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPagamentoDoc($value){
		$sql = 'SELECT * FROM documento WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProgressivo($value){
		$sql = 'SELECT * FROM documento WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnno($value){
		$sql = 'SELECT * FROM documento WHERE anno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM documento WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleIva($value){
		$sql = 'SELECT * FROM documento WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImponibile($value){
		$sql = 'SELECT * FROM documento WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleDocumento($value){
		$sql = 'SELECT * FROM documento WHERE totaleDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleDaSaldare($value){
		$sql = 'SELECT * FROM documento WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleSaldato($value){
		$sql = 'SELECT * FROM documento WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbuono($value){
		$sql = 'SELECT * FROM documento WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEccedenza($value){
		$sql = 'SELECT * FROM documento WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCausale($value){
		$sql = 'SELECT * FROM documento WHERE causale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAspetto($value){
		$sql = 'SELECT * FROM documento WHERE aspetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataConsegna($value){
		$sql = 'SELECT * FROM documento WHERE dataConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraConsegna($value){
		$sql = 'SELECT * FROM documento WHERE oraConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorto($value){
		$sql = 'SELECT * FROM documento WHERE porto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColli($value){
		$sql = 'SELECT * FROM documento WHERE colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPesoNetto($value){
		$sql = 'SELECT * FROM documento WHERE pesoNetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPesoLordo($value){
		$sql = 'SELECT * FROM documento WHERE pesoLordo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM documento WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsDefinitivo($value){
		$sql = 'SELECT * FROM documento WHERE isDefinitivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdIndiceDocumento($value){
		$sql = 'DELETE FROM documento WHERE idIndiceDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTipoDocumento($value){
		$sql = 'DELETE FROM documento WHERE idTipoDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdClienteDoc($value){
		$sql = 'DELETE FROM documento WHERE idClienteDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFornitoreDoc($value){
		$sql = 'DELETE FROM documento WHERE idFornitoreDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDestinazioneDoc($value){
		$sql = 'DELETE FROM documento WHERE idDestinazioneDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPagamentoDoc($value){
		$sql = 'DELETE FROM documento WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProgressivo($value){
		$sql = 'DELETE FROM documento WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnno($value){
		$sql = 'DELETE FROM documento WHERE anno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM documento WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleIva($value){
		$sql = 'DELETE FROM documento WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImponibile($value){
		$sql = 'DELETE FROM documento WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleDocumento($value){
		$sql = 'DELETE FROM documento WHERE totaleDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleDaSaldare($value){
		$sql = 'DELETE FROM documento WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleSaldato($value){
		$sql = 'DELETE FROM documento WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbuono($value){
		$sql = 'DELETE FROM documento WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEccedenza($value){
		$sql = 'DELETE FROM documento WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCausale($value){
		$sql = 'DELETE FROM documento WHERE causale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAspetto($value){
		$sql = 'DELETE FROM documento WHERE aspetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataConsegna($value){
		$sql = 'DELETE FROM documento WHERE dataConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraConsegna($value){
		$sql = 'DELETE FROM documento WHERE oraConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorto($value){
		$sql = 'DELETE FROM documento WHERE porto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColli($value){
		$sql = 'DELETE FROM documento WHERE colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPesoNetto($value){
		$sql = 'DELETE FROM documento WHERE pesoNetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPesoLordo($value){
		$sql = 'DELETE FROM documento WHERE pesoLordo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM documento WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsDefinitivo($value){
		$sql = 'DELETE FROM documento WHERE isDefinitivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DocumentoMySql 
	 */
	protected function readRow($row){
		$documento = new Documento();
		
		$documento->id = $row['id'];
		$documento->idIndiceDocumento = $row['idIndiceDocumento'];
		$documento->idTipoDocumento = $row['idTipoDocumento'];
		$documento->idClienteDoc = $row['idClienteDoc'];
		$documento->idFornitoreDoc = $row['idFornitoreDoc'];
		$documento->idDestinazioneDoc = $row['idDestinazioneDoc'];
		$documento->idPagamentoDoc = $row['idPagamentoDoc'];
		$documento->progressivo = $row['progressivo'];
		$documento->anno = $row['anno'];
		$documento->data = $row['data'];
		$documento->totaleIva = $row['totaleIva'];
		$documento->imponibile = $row['imponibile'];
		$documento->totaleDocumento = $row['totaleDocumento'];
		$documento->totaleDaSaldare = $row['totaleDaSaldare'];
		$documento->totaleSaldato = $row['totaleSaldato'];
		$documento->abbuono = $row['abbuono'];
		$documento->eccedenza = $row['eccedenza'];
		$documento->causale = $row['causale'];
		$documento->aspetto = $row['aspetto'];
		$documento->dataConsegna = $row['dataConsegna'];
		$documento->oraConsegna = $row['oraConsegna'];
		$documento->porto = $row['porto'];
		$documento->colli = $row['colli'];
		$documento->pesoNetto = $row['pesoNetto'];
		$documento->pesoLordo = $row['pesoLordo'];
		$documento->note = $row['note'];
		$documento->isDefinitivo = $row['isDefinitivo'];

		return $documento;
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
	 * @return DocumentoMySql 
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