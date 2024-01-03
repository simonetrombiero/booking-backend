<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ConsensoInformativoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ConsensoInformativo 
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
 	 * @param consensoInformativo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsensoInformativo consensoInformativo
 	 */
	public function insert($consensoInformativo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsensoInformativo consensoInformativo
 	 */
	public function update($consensoInformativo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdQuestionario($value);

	public function queryByDataCompilazione($value);

	public function queryByFirmaConsenso($value);

	public function queryByFirmaStrumenti($value);


	public function deleteByIdQuestionario($value);

	public function deleteByDataCompilazione($value);

	public function deleteByFirmaConsenso($value);

	public function deleteByFirmaStrumenti($value);


}
?>