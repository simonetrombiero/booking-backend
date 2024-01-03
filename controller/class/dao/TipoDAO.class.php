<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface TipoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tipo 
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
 	 * @param tipo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tipo tipo
 	 */
	public function insert($tipo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tipo tipo
 	 */
	public function update($tipo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNomeTipo($value);


	public function deleteByNomeTipo($value);


}
?>