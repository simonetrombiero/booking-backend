<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface RatapagamentodocDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ratapagamentodoc 
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
 	 * @param ratapagamentodoc primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ratapagamentodoc ratapagamentodoc
 	 */
	public function insert($ratapagamentodoc);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ratapagamentodoc ratapagamentodoc
 	 */
	public function update($ratapagamentodoc);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPagamentoDoc($value);

	public function queryByGiorni($value);

	public function queryByImporto($value);

	public function queryByIsPagato($value);


	public function deleteByIdPagamentoDoc($value);

	public function deleteByGiorni($value);

	public function deleteByImporto($value);

	public function deleteByIsPagato($value);


}
?>