<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PrimaNotaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrimaNota 
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
 	 * @param primaNota primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrimaNota primaNota
 	 */
	public function insert($primaNota);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrimaNota primaNota
 	 */
	public function update($primaNota);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByData($value);

	public function queryByDescrizione($value);

	public function queryByMovimento($value);

	public function queryByImporto($value);

	public function queryByModalitaPagamento($value);

	public function queryByNote($value);


	public function deleteByData($value);

	public function deleteByDescrizione($value);

	public function deleteByMovimento($value);

	public function deleteByImporto($value);

	public function deleteByModalitaPagamento($value);

	public function deleteByNote($value);


}
?>