<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface RuoloDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ruolo 
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
 	 * @param ruolo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ruolo ruolo
 	 */
	public function insert($ruolo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ruolo ruolo
 	 */
	public function update($ruolo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTipo($value);


	public function deleteByTipo($value);


}
?>