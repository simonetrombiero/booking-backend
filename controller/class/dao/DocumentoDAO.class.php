<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface DocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Documento 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param documento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Documento documento
 	 */
	public function insert($documento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Documento documento
 	 */
	public function update($documento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdIndiceDocumento($value);

	public function queryByIdTipoDocumento($value);

	public function queryByIdClienteDoc($value);

	public function queryByIdFornitoreDoc($value);

	public function queryByIdDestinazioneDoc($value);

	public function queryByIdPagamentoDoc($value);

	public function queryByProgressivo($value);

	public function queryByAnno($value);

	public function queryByData($value);

	public function queryByTotaleIva($value);

	public function queryByImponibile($value);

	public function queryByTotaleDocumento($value);

	public function queryByTotaleDaSaldare($value);

	public function queryByTotaleSaldato($value);

	public function queryByAbbuono($value);

	public function queryByEccedenza($value);

	public function queryByCausale($value);

	public function queryByAspetto($value);

	public function queryByDataConsegna($value);

	public function queryByOraConsegna($value);

	public function queryByPorto($value);

	public function queryByColli($value);

	public function queryByPesoNetto($value);

	public function queryByPesoLordo($value);

	public function queryByNote($value);

	public function queryByIsDefinitivo($value);


	public function deleteByIdIndiceDocumento($value);

	public function deleteByIdTipoDocumento($value);

	public function deleteByIdClienteDoc($value);

	public function deleteByIdFornitoreDoc($value);

	public function deleteByIdDestinazioneDoc($value);

	public function deleteByIdPagamentoDoc($value);

	public function deleteByProgressivo($value);

	public function deleteByAnno($value);

	public function deleteByData($value);

	public function deleteByTotaleIva($value);

	public function deleteByImponibile($value);

	public function deleteByTotaleDocumento($value);

	public function deleteByTotaleDaSaldare($value);

	public function deleteByTotaleSaldato($value);

	public function deleteByAbbuono($value);

	public function deleteByEccedenza($value);

	public function deleteByCausale($value);

	public function deleteByAspetto($value);

	public function deleteByDataConsegna($value);

	public function deleteByOraConsegna($value);

	public function deleteByPorto($value);

	public function deleteByColli($value);

	public function deleteByPesoNetto($value);

	public function deleteByPesoLordo($value);

	public function deleteByNote($value);

	public function deleteByIsDefinitivo($value);


}
?>