<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return PianoTrattamentoStatusDAO
	 */
	public static function getPianoTrattamentoStatusDAO(){
		return new PianoTrattamentoStatusMySqlExtDAO();
	}

	/**
	 * @return AliquotaDAO
	 */
	public static function getAliquotaDAO(){
		return new AliquotaMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoDAO
	 */
	public static function getAnamnesticoDAO(){
		return new AnamnesticoMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoCorpoDAO
	 */
	public static function getAnamnesticoCorpoDAO(){
		return new AnamnesticoCorpoMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoCorpoHeadDAO
	 */
	public static function getAnamnesticoCorpoHeadDAO(){
		return new AnamnesticoCorpoHeadMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoCorpoOldDAO
	 */
	public static function getAnamnesticoCorpoOldDAO(){
		return new AnamnesticoCorpoOldMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoQuestionarioDAO
	 */
	public static function getAnamnesticoQuestionarioDAO(){
		return new AnamnesticoQuestionarioMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoQuestionarioGruppoDAO
	 */
	public static function getAnamnesticoQuestionarioGruppoDAO(){
		return new AnamnesticoQuestionarioGruppoMySqlExtDAO();
	}

	/**
	 * @return AnamnesticoRisposteDAO
	 */
	public static function getAnamnesticoRisposteDAO(){
		return new AnamnesticoRisposteMySqlExtDAO();
	}

	/**
	 * @return AnmnesticoRisposteHeadDAO
	 */
	public static function getAnmnesticoRisposteHeadDAO(){
		return new AnmnesticoRisposteHeadMySqlExtDAO();
	}

	/**
	 * @return AziendaDAO
	 */
	public static function getAziendaDAO(){
		return new AziendaMySqlExtDAO();
	}

	/**
	 * @return CalendariDAO
	 */
	public static function getCalendariDAO(){
		return new CalendariMySqlExtDAO();
	}

	/**
	 * @return CartellaClinicaDAO
	 */
	public static function getCartellaClinicaDAO(){
		return new CartellaClinicaMySqlExtDAO();
	}

	/**
	 * @return CategorieProdottiDAO
	 */
	public static function getCategorieProdottiDAO(){
		return new CategorieProdottiMySqlExtDAO();
	}

	/**
	 * @return CategorieTattamentiDAO
	 */
	public static function getCategorieTattamentiDAO(){
		return new CategorieTattamentiMySqlExtDAO();
	}

	/**
	 * @return ClientiDAO
	 */
	public static function getClientiDAO(){
		return new ClientiMySqlExtDAO();
	}

	/**
	 * @return ClientidocDAO
	 */
	public static function getClientidocDAO(){
		return new ClientidocMySqlExtDAO();
	}

	/**
	 * @return ComuniDAO
	 */
	public static function getComuniDAO(){
		return new ComuniMySqlExtDAO();
	}

	/**
	 * @return ConsensoInformativoDAO
	 */
	public static function getConsensoInformativoDAO(){
		return new ConsensoInformativoMySqlExtDAO();
	}

	/**
	 * @return ConsensoPrivacyDAO
	 */
	public static function getConsensoPrivacyDAO(){
		return new ConsensoPrivacyMySqlExtDAO();
	}

	/**
	 * @return ConsensoPrivacyOLDDAO
	 */
	public static function getConsensoPrivacyOLDDAO(){
		return new ConsensoPrivacyOLDMySqlExtDAO();
	}

	/**
	 * @return DipendenteDAO
	 */
	public static function getDipendenteDAO(){
		return new DipendenteMySqlExtDAO();
	}

	/**
	 * @return DocumentazioneDAO
	 */
	public static function getDocumentazioneDAO(){
		return new DocumentazioneMySqlExtDAO();
	}

	/**
	 * @return DocumentazionePianoTrattamentoDAO
	 */
	public static function getDocumentazionePianoTrattamentoDAO(){
		return new DocumentazionePianoTrattamentoMySqlExtDAO();
	}

	/**
	 * @return DocumentoDAO
	 */
	public static function getDocumentoDAO(){
		return new DocumentoMySqlExtDAO();
	}

	/**
	 * @return DocumentoItemDAO
	 */
	public static function getDocumentoItemDAO(){
		return new DocumentoItemMySqlExtDAO();
	}

	/**
	 * @return DocumentoSasDAO
	 */
	public static function getDocumentoSasDAO(){
		return new DocumentoSasMySqlExtDAO();
	}

	/**
	 * @return FidelityCardDAO
	 */
	public static function getFidelityCardDAO(){
		return new FidelityCardMySqlExtDAO();
	}

	/**
	 * @return FidelityCardCatalogoPremiDAO
	 */
	public static function getFidelityCardCatalogoPremiDAO(){
		return new FidelityCardCatalogoPremiMySqlExtDAO();
	}

	/**
	 * @return FidelityCardDettaglioDAO
	 */
	public static function getFidelityCardDettaglioDAO(){
		return new FidelityCardDettaglioMySqlExtDAO();
	}

	/**
	 * @return FidelityClienteDAO
	 */
	public static function getFidelityClienteDAO(){
		return new FidelityClienteMySqlExtDAO();
	}

	/**
	 * @return FornitoreDAO
	 */
	public static function getFornitoreDAO(){
		return new FornitoreMySqlExtDAO();
	}

	/**
	 * @return IncaricoDAO
	 */
	public static function getIncaricoDAO(){
		return new IncaricoMySqlExtDAO();
	}

	/**
	 * @return IndicedocumentoDAO
	 */
	public static function getIndicedocumentoDAO(){
		return new IndicedocumentoMySqlExtDAO();
	}

	/**
	 * @return ItemdocumentoDAO
	 */
	public static function getItemdocumentoDAO(){
		return new ItemdocumentoMySqlExtDAO();
	}

	/**
	 * @return MarcheProdottiDAO
	 */
	public static function getMarcheProdottiDAO(){
		return new MarcheProdottiMySqlExtDAO();
	}

	/**
	 * @return MessaggioAppuntamentoDAO
	 */
	public static function getMessaggioAppuntamentoDAO(){
		return new MessaggioAppuntamentoMySqlExtDAO();
	}

	/**
	 * @return MessaggioCompleannoDAO
	 */
	public static function getMessaggioCompleannoDAO(){
		return new MessaggioCompleannoMySqlExtDAO();
	}

	/**
	 * @return PagamentiDAO
	 */
	public static function getPagamentiDAO(){
		return new PagamentiMySqlExtDAO();
	}

	/**
	 * @return PagamentoDAO
	 */
	public static function getPagamentoDAO(){
		return new PagamentoMySqlExtDAO();
	}

	/**
	 * @return PagamentodocDAO
	 */
	public static function getPagamentodocDAO(){
		return new PagamentodocMySqlExtDAO();
	}

	/**
	 * @return PagamentomodalitaDAO
	 */
	public static function getPagamentomodalitaDAO(){
		return new PagamentomodalitaMySqlExtDAO();
	}

	/**
	 * @return PianoTrattamentoDAO
	 */
	public static function getPianoTrattamentoDAO(){
		return new PianoTrattamentoMySqlExtDAO();
	}

	/**
	 * @return PianoTrattamentoDettaglioDAO
	 */
	public static function getPianoTrattamentoDettaglioDAO(){
		return new PianoTrattamentoDettaglioMySqlExtDAO();
	}

	/**
	 * @return PianoTrattamentoItemDAO
	 */
	public static function getPianoTrattamentoItemDAO(){
		return new PianoTrattamentoItemMySqlExtDAO();
	}

	/**
	 * @return PianoTrattamentoOLDDAO
	 */
	public static function getPianoTrattamentoOLDDAO(){
		return new PianoTrattamentoOLDMySqlExtDAO();
	}

	/**
	 * @return PostazioniDAO
	 */
	public static function getPostazioniDAO(){
		return new PostazioniMySqlExtDAO();
	}

	/**
	 * @return PrenotazioneStatusDAO
	 */
	public static function getPrenotazioneStatusDAO(){
		return new PrenotazioneStatusMySqlExtDAO();
	}

	/**
	 * @return PrenotazioniDAO
	 */
	public static function getPrenotazioniDAO(){
		return new PrenotazioniMySqlExtDAO();
	}

	/**
	 * @return PrenotazioniDettaglioDAO
	 */
	public static function getPrenotazioniDettaglioDAO(){
		return new PrenotazioniDettaglioMySqlExtDAO();
	}

	/**
	 * @return PrenotazioniTrattamentiDAO
	 */
	public static function getPrenotazioniTrattamentiDAO(){
		return new PrenotazioniTrattamentiMySqlExtDAO();
	}

	/**
	 * @return PrimaNotaDAO
	 */
	public static function getPrimaNotaDAO(){
		return new PrimaNotaMySqlExtDAO();
	}

	/**
	 * @return ProdottoDAO
	 */
	public static function getProdottoDAO(){
		return new ProdottoMySqlExtDAO();
	}

	/**
	 * @return ProvinceDAO
	 */
	public static function getProvinceDAO(){
		return new ProvinceMySqlExtDAO();
	}

	/**
	 * @return RatadocumentoDAO
	 */
	public static function getRatadocumentoDAO(){
		return new RatadocumentoMySqlExtDAO();
	}

	/**
	 * @return RatapagamentoDAO
	 */
	public static function getRatapagamentoDAO(){
		return new RatapagamentoMySqlExtDAO();
	}

	/**
	 * @return RatapagamentodocDAO
	 */
	public static function getRatapagamentodocDAO(){
		return new RatapagamentodocMySqlExtDAO();
	}

	/**
	 * @return RegioniDAO
	 */
	public static function getRegioniDAO(){
		return new RegioniMySqlExtDAO();
	}

	/**
	 * @return RichiamoDAO
	 */
	public static function getRichiamoDAO(){
		return new RichiamoMySqlExtDAO();
	}

	/**
	 * @return RichiamoStatoDAO
	 */
	public static function getRichiamoStatoDAO(){
		return new RichiamoStatoMySqlExtDAO();
	}

	/**
	 * @return RisorsapagamentoDAO
	 */
	public static function getRisorsapagamentoDAO(){
		return new RisorsapagamentoMySqlExtDAO();
	}

	/**
	 * @return RuoloDAO
	 */
	public static function getRuoloDAO(){
		return new RuoloMySqlExtDAO();
	}

	/**
	 * @return SedeDAO
	 */
	public static function getSedeDAO(){
		return new SedeMySqlExtDAO();
	}

	/**
	 * @return SezioneDAO
	 */
	public static function getSezioneDAO(){
		return new SezioneMySqlExtDAO();
	}

	/**
	 * @return TipoDAO
	 */
	public static function getTipoDAO(){
		return new TipoMySqlExtDAO();
	}

	/**
	 * @return TipodocumentoDAO
	 */
	public static function getTipodocumentoDAO(){
		return new TipodocumentoMySqlExtDAO();
	}

	/**
	 * @return TrattamentiDAO
	 */
	public static function getTrattamentiDAO(){
		return new TrattamentiMySqlExtDAO();
	}

	/**
	 * @return TrattamentiLaserDAO
	 */
	public static function getTrattamentiLaserDAO(){
		return new TrattamentiLaserMySqlExtDAO();
	}

	/**
	 * @return TrattamentiVisoCorpoDAO
	 */
	public static function getTrattamentiVisoCorpoDAO(){
		return new TrattamentiVisoCorpoMySqlExtDAO();
	}

	/**
	 * @return UtenteDAO
	 */
	public static function getUtenteDAO(){
		return new UtenteMySqlExtDAO();
	}


}
?>