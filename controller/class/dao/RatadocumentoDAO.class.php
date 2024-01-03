<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface RatadocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ratadocumento 
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
 	 * @param ratadocumento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ratadocumento ratadocumento
 	 */
	public function insert($ratadocumento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ratadocumento ratadocumento
 	 */
	public function update($ratadocumento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPagamentoDoc($value);

	public function queryByImporto($value);

	public function queryByDataScadenza($value);


	public function deleteByIdPagamentoDoc($value);

	public function deleteByImporto($value);

	public function deleteByDataScadenza($value);


}
?>