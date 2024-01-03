<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PagamentodocDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pagamentodoc 
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
 	 * @param pagamentodoc primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pagamentodoc pagamentodoc
 	 */
	public function insert($pagamentodoc);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pagamentodoc pagamentodoc
 	 */
	public function update($pagamentodoc);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByRisorsa($value);

	public function queryByIsFineMese($value);


	public function deleteByNome($value);

	public function deleteByRisorsa($value);

	public function deleteByIsFineMese($value);


}
?>