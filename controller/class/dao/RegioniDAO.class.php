<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface RegioniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Regioni 
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
 	 * @param regioni primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Regioni regioni
 	 */
	public function insert($regioni);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Regioni regioni
 	 */
	public function update($regioni);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRegione($value);


	public function deleteByRegione($value);


}
?>