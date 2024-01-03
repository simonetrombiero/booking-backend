<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PianoTrattamentoDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PianoTrattamentoDettaglio 
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
 	 * @param pianoTrattamentoDettaglio primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoDettaglio pianoTrattamentoDettaglio
 	 */
	public function insert($pianoTrattamentoDettaglio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoDettaglio pianoTrattamentoDettaglio
 	 */
	public function update($pianoTrattamentoDettaglio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTrattamentoID($value);

	public function queryByProgressivo($value);

	public function queryByTrattamento($value);

	public function queryByZona($value);

	public function queryByData($value);

	public function queryByTempo($value);

	public function queryByOraInizio($value);

	public function queryByOreFine($value);

	public function queryByPostazione($value);

	public function queryByOperatore($value);

	public function queryByStatus($value);

	public function queryByNoShow($value);

	public function queryByNote($value);


	public function deleteByTrattamentoID($value);

	public function deleteByProgressivo($value);

	public function deleteByTrattamento($value);

	public function deleteByZona($value);

	public function deleteByData($value);

	public function deleteByTempo($value);

	public function deleteByOraInizio($value);

	public function deleteByOreFine($value);

	public function deleteByPostazione($value);

	public function deleteByOperatore($value);

	public function deleteByStatus($value);

	public function deleteByNoShow($value);

	public function deleteByNote($value);


}
?>