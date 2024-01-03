<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PianoTrattamentoOLDDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PianoTrattamentoOLD 
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
 	 * @param pianoTrattamentoOLD primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoOLD pianoTrattamentoOLD
 	 */
	public function insert($pianoTrattamentoOLD);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoOLD pianoTrattamentoOLD
 	 */
	public function update($pianoTrattamentoOLD);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPaziente($value);

	public function queryByTitolo($value);

	public function queryByData($value);

	public function queryBySeduteNumero($value);

	public function queryByImponibile($value);

	public function queryByTotaleIva($value);

	public function queryByTotaleTrattamento($value);

	public function queryByTotaleSaldato($value);

	public function queryByTotaleDaSaldare($value);

	public function queryByAbbuono($value);

	public function queryByEccedenza($value);

	public function queryByStato($value);

	public function queryByNote($value);

	public function queryByIsChiuso($value);


	public function deleteByIdPaziente($value);

	public function deleteByTitolo($value);

	public function deleteByData($value);

	public function deleteBySeduteNumero($value);

	public function deleteByImponibile($value);

	public function deleteByTotaleIva($value);

	public function deleteByTotaleTrattamento($value);

	public function deleteByTotaleSaldato($value);

	public function deleteByTotaleDaSaldare($value);

	public function deleteByAbbuono($value);

	public function deleteByEccedenza($value);

	public function deleteByStato($value);

	public function deleteByNote($value);

	public function deleteByIsChiuso($value);


}
?>