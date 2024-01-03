<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PagamentomodalitaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pagamentomodalita 
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
 	 * @param pagamentomodalita primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pagamentomodalita pagamentomodalita
 	 */
	public function insert($pagamentomodalita);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pagamentomodalita pagamentomodalita
 	 */
	public function update($pagamentomodalita);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);

	public function queryByPriorita($value);


	public function deleteByDescrizione($value);

	public function deleteByPriorita($value);


}
?>