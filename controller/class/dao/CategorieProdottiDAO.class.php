<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface CategorieProdottiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CategorieProdotti 
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
 	 * @param categorieProdotti primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategorieProdotti categorieProdotti
 	 */
	public function insert($categorieProdotti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategorieProdotti categorieProdotti
 	 */
	public function update($categorieProdotti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategoria($value);

	public function queryByIsSospeso($value);


	public function deleteByCategoria($value);

	public function deleteByIsSospeso($value);


}
?>