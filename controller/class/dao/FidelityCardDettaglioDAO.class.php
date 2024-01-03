<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface FidelityCardDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FidelityCardDettaglio 
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
 	 * @param fidelityCardDettaglio primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCardDettaglio fidelityCardDettaglio
 	 */
	public function insert($fidelityCardDettaglio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCardDettaglio fidelityCardDettaglio
 	 */
	public function update($fidelityCardDettaglio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCard($value);

	public function queryByData($value);

	public function queryByDescrizione($value);

	public function queryByImporto($value);

	public function queryByPunti($value);

	public function queryByConcorso($value);

	public function queryByNote($value);


	public function deleteByIdCard($value);

	public function deleteByData($value);

	public function deleteByDescrizione($value);

	public function deleteByImporto($value);

	public function deleteByPunti($value);

	public function deleteByConcorso($value);

	public function deleteByNote($value);


}
?>