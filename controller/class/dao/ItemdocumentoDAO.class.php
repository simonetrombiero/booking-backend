<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ItemdocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Itemdocumento 
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
 	 * @param itemdocumento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Itemdocumento itemdocumento
 	 */
	public function insert($itemdocumento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Itemdocumento itemdocumento
 	 */
	public function update($itemdocumento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdDocumento($value);

	public function queryByQta($value);

	public function queryByDescrizione($value);

	public function queryByCodice($value);

	public function queryByUm($value);

	public function queryByPrezzoUnitario($value);

	public function queryBySconto1($value);

	public function queryBySconto2($value);

	public function queryBySconto3($value);

	public function queryByTotaleRiga($value);

	public function queryByValoreIva($value);

	public function queryByPercentualeIva($value);

	public function queryByPosizione($value);


	public function deleteByIdDocumento($value);

	public function deleteByQta($value);

	public function deleteByDescrizione($value);

	public function deleteByCodice($value);

	public function deleteByUm($value);

	public function deleteByPrezzoUnitario($value);

	public function deleteBySconto1($value);

	public function deleteBySconto2($value);

	public function deleteBySconto3($value);

	public function deleteByTotaleRiga($value);

	public function deleteByValoreIva($value);

	public function deleteByPercentualeIva($value);

	public function deleteByPosizione($value);


}
?>