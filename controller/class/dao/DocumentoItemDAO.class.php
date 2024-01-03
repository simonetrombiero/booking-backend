<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface DocumentoItemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DocumentoItem 
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
 	 * @param documentoItem primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentoItem documentoItem
 	 */
	public function insert($documentoItem);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentoItem documentoItem
 	 */
	public function update($documentoItem);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdDocumento($value);

	public function queryByIdItem($value);


	public function deleteByIdDocumento($value);

	public function deleteByIdItem($value);


}
?>