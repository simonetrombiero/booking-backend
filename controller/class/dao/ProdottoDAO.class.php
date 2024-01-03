<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ProdottoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Prodotto 
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
 	 * @param prodotto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Prodotto prodotto
 	 */
	public function insert($prodotto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Prodotto prodotto
 	 */
	public function update($prodotto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodice($value);

	public function queryByBarcode($value);

	public function queryByDescrizione($value);

	public function queryByIdCategoria($value);

	public function queryByIdFornitore($value);

	public function queryByPrezzoAcquisto($value);

	public function queryByPrezzoVendita($value);

	public function queryByRicaricoPerc($value);

	public function queryByRicarico($value);

	public function queryByUtilePerc($value);

	public function queryByUtile($value);

	public function queryByIdAliquota($value);

	public function queryByImmagine($value);

	public function queryByTipoImmagine($value);

	public function queryByUm($value);

	public function queryByScaffale($value);

	public function queryByPiano($value);

	public function queryByPosizione($value);

	public function queryByQta($value);


	public function deleteByCodice($value);

	public function deleteByBarcode($value);

	public function deleteByDescrizione($value);

	public function deleteByIdCategoria($value);

	public function deleteByIdFornitore($value);

	public function deleteByPrezzoAcquisto($value);

	public function deleteByPrezzoVendita($value);

	public function deleteByRicaricoPerc($value);

	public function deleteByRicarico($value);

	public function deleteByUtilePerc($value);

	public function deleteByUtile($value);

	public function deleteByIdAliquota($value);

	public function deleteByImmagine($value);

	public function deleteByTipoImmagine($value);

	public function deleteByUm($value);

	public function deleteByScaffale($value);

	public function deleteByPiano($value);

	public function deleteByPosizione($value);

	public function deleteByQta($value);


}
?>