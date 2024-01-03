<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface SezioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Sezione 
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
 	 * @param sezione primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Sezione sezione
 	 */
	public function insert($sezione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Sezione sezione
 	 */
	public function update($sezione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNomeSezione($value);


	public function deleteByNomeSezione($value);


}
?>