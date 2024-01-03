<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PianoTrattamentoItemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PianoTrattamentoItem 
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
 	 * @param pianoTrattamentoItem primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoItem pianoTrattamentoItem
 	 */
	public function insert($pianoTrattamentoItem);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoItem pianoTrattamentoItem
 	 */
	public function update($pianoTrattamentoItem);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPiano($value);

	public function queryByIdTrattamentoPiano($value);

	public function queryByNumeroRiga($value);

	public function queryByQta($value);

	public function queryByTrattamento($value);

	public function queryByPrezzoUnitario($value);

	public function queryByTotaleRiga($value);

	public function queryByStatus($value);

	public function queryByNote($value);


	public function deleteByIdPiano($value);

	public function deleteByIdTrattamentoPiano($value);

	public function deleteByNumeroRiga($value);

	public function deleteByQta($value);

	public function deleteByTrattamento($value);

	public function deleteByPrezzoUnitario($value);

	public function deleteByTotaleRiga($value);

	public function deleteByStatus($value);

	public function deleteByNote($value);


}
?>