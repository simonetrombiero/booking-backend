<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PagamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pagamenti 
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
 	 * @param pagamenti primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pagamenti pagamenti
 	 */
	public function insert($pagamenti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pagamenti pagamenti
 	 */
	public function update($pagamenti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCliente($value);

	public function queryByData($value);

	public function queryByImporto($value);

	public function queryByModalitaPagamento($value);

	public function queryByRiferimentoDoc($value);

	public function queryByPiano($value);


	public function deleteByCliente($value);

	public function deleteByData($value);

	public function deleteByImporto($value);

	public function deleteByModalitaPagamento($value);

	public function deleteByRiferimentoDoc($value);


}
?>