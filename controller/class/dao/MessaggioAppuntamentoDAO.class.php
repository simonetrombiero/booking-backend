<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface MessaggioAppuntamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MessaggioAppuntamento 
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
 	 * @param messaggioAppuntamento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessaggioAppuntamento messaggioAppuntamento
 	 */
	public function insert($messaggioAppuntamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessaggioAppuntamento messaggioAppuntamento
 	 */
	public function update($messaggioAppuntamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdAppuntamento($value);

	public function queryByDataContatto($value);


	public function deleteByIdAppuntamento($value);

	public function deleteByDataContatto($value);


}
?>