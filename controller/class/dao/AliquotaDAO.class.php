<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AliquotaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Aliquota 
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
 	 * @param aliquota primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Aliquota aliquota
 	 */
	public function insert($aliquota);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Aliquota aliquota
 	 */
	public function update($aliquota);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);

	public function queryByAliquota($value);

	public function queryByNaturaFAE($value);

	public function queryByIsSospeso($value);


	public function deleteByDescrizione($value);

	public function deleteByAliquota($value);

	public function deleteByNaturaFAE($value);

	public function deleteByIsSospeso($value);


}
?>