<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface RatapagamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ratapagamento 
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
 	 * @param ratapagamento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ratapagamento ratapagamento
 	 */
	public function insert($ratapagamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ratapagamento ratapagamento
 	 */
	public function update($ratapagamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPagamento($value);

	public function queryByGiorni($value);


	public function deleteByIdPagamento($value);

	public function deleteByGiorni($value);


}
?>