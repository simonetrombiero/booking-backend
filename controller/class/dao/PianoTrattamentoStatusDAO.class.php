<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PianoTrattamentoStatusDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PianoTrattamentoStatus 
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
 	 * @param pianoTrattamentoStatu primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoStatus pianoTrattamentoStatu
 	 */
	public function insert($pianoTrattamentoStatu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoStatus pianoTrattamentoStatu
 	 */
	public function update($pianoTrattamentoStatu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);


	public function deleteByDescrizione($value);


}
?>