<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface TipodocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tipodocumento 
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
 	 * @param tipodocumento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tipodocumento tipodocumento
 	 */
	public function insert($tipodocumento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tipodocumento tipodocumento
 	 */
	public function update($tipodocumento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByIdTipo($value);

	public function queryByIdSezione($value);


	public function deleteByNome($value);

	public function deleteByIdTipo($value);

	public function deleteByIdSezione($value);


}
?>