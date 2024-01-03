<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface MarcheProdottiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MarcheProdotti 
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
 	 * @param marcheProdotti primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MarcheProdotti marcheProdotti
 	 */
	public function insert($marcheProdotti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MarcheProdotti marcheProdotti
 	 */
	public function update($marcheProdotti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMarca($value);

	public function queryByIsSospeso($value);


	public function deleteByMarca($value);

	public function deleteByIsSospeso($value);


}
?>