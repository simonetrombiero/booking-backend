<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ComuniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Comuni 
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
 	 * @param comuni primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Comuni comuni
 	 */
	public function insert($comuni);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Comuni comuni
 	 */
	public function update($comuni);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdRegione($value);

	public function queryByIdProvincia($value);

	public function queryByComune($value);


	public function deleteByIdRegione($value);

	public function deleteByIdProvincia($value);

	public function deleteByComune($value);


}
?>