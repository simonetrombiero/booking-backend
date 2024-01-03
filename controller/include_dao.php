<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/PianoTrattamentoStatusDAO.class.php');
	require_once('class/dto/PianoTrattamentoStatu.class.php');
	require_once('class/mysql/PianoTrattamentoStatusMySqlDAO.class.php');
	require_once('class/mysql/ext/PianoTrattamentoStatusMySqlExtDAO.class.php');
	require_once('class/dao/AliquotaDAO.class.php');
	require_once('class/dto/Aliquota.class.php');
	require_once('class/mysql/AliquotaMySqlDAO.class.php');
	require_once('class/mysql/ext/AliquotaMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoDAO.class.php');
	require_once('class/dto/Anamnestico.class.php');
	require_once('class/mysql/AnamnesticoMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoCorpoDAO.class.php');
	require_once('class/dto/AnamnesticoCorpo.class.php');
	require_once('class/mysql/AnamnesticoCorpoMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoCorpoMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoCorpoHeadDAO.class.php');
	require_once('class/dto/AnamnesticoCorpoHead.class.php');
	require_once('class/mysql/AnamnesticoCorpoHeadMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoCorpoHeadMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoCorpoOldDAO.class.php');
	require_once('class/dto/AnamnesticoCorpoOld.class.php');
	require_once('class/mysql/AnamnesticoCorpoOldMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoCorpoOldMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoQuestionarioDAO.class.php');
	require_once('class/dto/AnamnesticoQuestionario.class.php');
	require_once('class/mysql/AnamnesticoQuestionarioMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoQuestionarioMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoQuestionarioGruppoDAO.class.php');
	require_once('class/dto/AnamnesticoQuestionarioGruppo.class.php');
	require_once('class/mysql/AnamnesticoQuestionarioGruppoMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoQuestionarioGruppoMySqlExtDAO.class.php');
	require_once('class/dao/AnamnesticoRisposteDAO.class.php');
	require_once('class/dto/AnamnesticoRisposte.class.php');
	require_once('class/mysql/AnamnesticoRisposteMySqlDAO.class.php');
	require_once('class/mysql/ext/AnamnesticoRisposteMySqlExtDAO.class.php');
	require_once('class/dao/AnmnesticoRisposteHeadDAO.class.php');
	require_once('class/dto/AnmnesticoRisposteHead.class.php');
	require_once('class/mysql/AnmnesticoRisposteHeadMySqlDAO.class.php');
	require_once('class/mysql/ext/AnmnesticoRisposteHeadMySqlExtDAO.class.php');
	require_once('class/dao/AziendaDAO.class.php');
	require_once('class/dto/Azienda.class.php');
	require_once('class/mysql/AziendaMySqlDAO.class.php');
	require_once('class/mysql/ext/AziendaMySqlExtDAO.class.php');
	require_once('class/dao/CalendariDAO.class.php');
	require_once('class/dto/Calendari.class.php');
	require_once('class/mysql/CalendariMySqlDAO.class.php');
	require_once('class/mysql/ext/CalendariMySqlExtDAO.class.php');
	require_once('class/dao/CartellaClinicaDAO.class.php');
	require_once('class/dto/CartellaClinica.class.php');
	require_once('class/mysql/CartellaClinicaMySqlDAO.class.php');
	require_once('class/mysql/ext/CartellaClinicaMySqlExtDAO.class.php');
	require_once('class/dao/CategorieProdottiDAO.class.php');
	require_once('class/dto/CategorieProdotti.class.php');
	require_once('class/mysql/CategorieProdottiMySqlDAO.class.php');
	require_once('class/mysql/ext/CategorieProdottiMySqlExtDAO.class.php');
	require_once('class/dao/CategorieTattamentiDAO.class.php');
	require_once('class/dto/CategorieTattamenti.class.php');
	require_once('class/mysql/CategorieTattamentiMySqlDAO.class.php');
	require_once('class/mysql/ext/CategorieTattamentiMySqlExtDAO.class.php');
	require_once('class/dao/ClientiDAO.class.php');
	require_once('class/dto/Clienti.class.php');
	require_once('class/mysql/ClientiMySqlDAO.class.php');
	require_once('class/mysql/ext/ClientiMySqlExtDAO.class.php');
	require_once('class/dao/ClientidocDAO.class.php');
	require_once('class/dto/Clientidoc.class.php');
	require_once('class/mysql/ClientidocMySqlDAO.class.php');
	require_once('class/mysql/ext/ClientidocMySqlExtDAO.class.php');
	require_once('class/dao/ComuniDAO.class.php');
	require_once('class/dto/Comuni.class.php');
	require_once('class/mysql/ComuniMySqlDAO.class.php');
	require_once('class/mysql/ext/ComuniMySqlExtDAO.class.php');
	require_once('class/dao/ConsensoInformativoDAO.class.php');
	require_once('class/dto/ConsensoInformativo.class.php');
	require_once('class/mysql/ConsensoInformativoMySqlDAO.class.php');
	require_once('class/mysql/ext/ConsensoInformativoMySqlExtDAO.class.php');
	require_once('class/dao/ConsensoPrivacyDAO.class.php');
	require_once('class/dto/ConsensoPrivacy.class.php');
	require_once('class/mysql/ConsensoPrivacyMySqlDAO.class.php');
	require_once('class/mysql/ext/ConsensoPrivacyMySqlExtDAO.class.php');
	require_once('class/dao/ConsensoPrivacyOLDDAO.class.php');
	require_once('class/dto/ConsensoPrivacyOLD.class.php');
	require_once('class/mysql/ConsensoPrivacyOLDMySqlDAO.class.php');
	require_once('class/mysql/ext/ConsensoPrivacyOLDMySqlExtDAO.class.php');
	require_once('class/dao/DipendenteDAO.class.php');
	require_once('class/dto/Dipendente.class.php');
	require_once('class/mysql/DipendenteMySqlDAO.class.php');
	require_once('class/mysql/ext/DipendenteMySqlExtDAO.class.php');
	require_once('class/dao/DocumentazioneDAO.class.php');
	require_once('class/dto/Documentazione.class.php');
	require_once('class/mysql/DocumentazioneMySqlDAO.class.php');
	require_once('class/mysql/ext/DocumentazioneMySqlExtDAO.class.php');
	require_once('class/dao/DocumentazionePianoTrattamentoDAO.class.php');
	require_once('class/dto/DocumentazionePianoTrattamento.class.php');
	require_once('class/mysql/DocumentazionePianoTrattamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/DocumentazionePianoTrattamentoMySqlExtDAO.class.php');
	require_once('class/dao/DocumentoDAO.class.php');
	require_once('class/dto/Documento.class.php');
	require_once('class/mysql/DocumentoMySqlDAO.class.php');
	require_once('class/mysql/ext/DocumentoMySqlExtDAO.class.php');
	require_once('class/dao/DocumentoItemDAO.class.php');
	require_once('class/dto/DocumentoItem.class.php');
	require_once('class/mysql/DocumentoItemMySqlDAO.class.php');
	require_once('class/mysql/ext/DocumentoItemMySqlExtDAO.class.php');
	require_once('class/dao/DocumentoSasDAO.class.php');
	require_once('class/dto/DocumentoSa.class.php');
	require_once('class/mysql/DocumentoSasMySqlDAO.class.php');
	require_once('class/mysql/ext/DocumentoSasMySqlExtDAO.class.php');
	require_once('class/dao/FidelityCardDAO.class.php');
	require_once('class/dto/FidelityCard.class.php');
	require_once('class/mysql/FidelityCardMySqlDAO.class.php');
	require_once('class/mysql/ext/FidelityCardMySqlExtDAO.class.php');
	require_once('class/dao/FidelityCardCatalogoPremiDAO.class.php');
	require_once('class/dto/FidelityCardCatalogoPremi.class.php');
	require_once('class/mysql/FidelityCardCatalogoPremiMySqlDAO.class.php');
	require_once('class/mysql/ext/FidelityCardCatalogoPremiMySqlExtDAO.class.php');
	require_once('class/dao/FidelityCardDettaglioDAO.class.php');
	require_once('class/dto/FidelityCardDettaglio.class.php');
	require_once('class/mysql/FidelityCardDettaglioMySqlDAO.class.php');
	require_once('class/mysql/ext/FidelityCardDettaglioMySqlExtDAO.class.php');
	require_once('class/dao/FidelityClienteDAO.class.php');
	require_once('class/dto/FidelityCliente.class.php');
	require_once('class/mysql/FidelityClienteMySqlDAO.class.php');
	require_once('class/mysql/ext/FidelityClienteMySqlExtDAO.class.php');
	require_once('class/dao/FornitoreDAO.class.php');
	require_once('class/dto/Fornitore.class.php');
	require_once('class/mysql/FornitoreMySqlDAO.class.php');
	require_once('class/mysql/ext/FornitoreMySqlExtDAO.class.php');
	require_once('class/dao/IncaricoDAO.class.php');
	require_once('class/dto/Incarico.class.php');
	require_once('class/mysql/IncaricoMySqlDAO.class.php');
	require_once('class/mysql/ext/IncaricoMySqlExtDAO.class.php');
	require_once('class/dao/IndicedocumentoDAO.class.php');
	require_once('class/dto/Indicedocumento.class.php');
	require_once('class/mysql/IndicedocumentoMySqlDAO.class.php');
	require_once('class/mysql/ext/IndicedocumentoMySqlExtDAO.class.php');
	require_once('class/dao/ItemdocumentoDAO.class.php');
	require_once('class/dto/Itemdocumento.class.php');
	require_once('class/mysql/ItemdocumentoMySqlDAO.class.php');
	require_once('class/mysql/ext/ItemdocumentoMySqlExtDAO.class.php');
	require_once('class/dao/MarcheProdottiDAO.class.php');
	require_once('class/dto/MarcheProdotti.class.php');
	require_once('class/mysql/MarcheProdottiMySqlDAO.class.php');
	require_once('class/mysql/ext/MarcheProdottiMySqlExtDAO.class.php');
	require_once('class/dao/MessaggioAppuntamentoDAO.class.php');
	require_once('class/dto/MessaggioAppuntamento.class.php');
	require_once('class/mysql/MessaggioAppuntamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/MessaggioAppuntamentoMySqlExtDAO.class.php');
	require_once('class/dao/MessaggioCompleannoDAO.class.php');
	require_once('class/dto/MessaggioCompleanno.class.php');
	require_once('class/mysql/MessaggioCompleannoMySqlDAO.class.php');
	require_once('class/mysql/ext/MessaggioCompleannoMySqlExtDAO.class.php');
	require_once('class/dao/PagamentiDAO.class.php');
	require_once('class/dto/Pagamenti.class.php');
	require_once('class/mysql/PagamentiMySqlDAO.class.php');
	require_once('class/mysql/ext/PagamentiMySqlExtDAO.class.php');
	require_once('class/dao/PagamentoDAO.class.php');
	require_once('class/dto/Pagamento.class.php');
	require_once('class/mysql/PagamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/PagamentoMySqlExtDAO.class.php');
	require_once('class/dao/PagamentodocDAO.class.php');
	require_once('class/dto/Pagamentodoc.class.php');
	require_once('class/mysql/PagamentodocMySqlDAO.class.php');
	require_once('class/mysql/ext/PagamentodocMySqlExtDAO.class.php');
	require_once('class/dao/PagamentomodalitaDAO.class.php');
	require_once('class/dto/Pagamentomodalita.class.php');
	require_once('class/mysql/PagamentomodalitaMySqlDAO.class.php');
	require_once('class/mysql/ext/PagamentomodalitaMySqlExtDAO.class.php');
	require_once('class/dao/PianoTrattamentoDAO.class.php');
	require_once('class/dto/PianoTrattamento.class.php');
	require_once('class/mysql/PianoTrattamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/PianoTrattamentoMySqlExtDAO.class.php');
	require_once('class/dao/PianoTrattamentoDettaglioDAO.class.php');
	require_once('class/dto/PianoTrattamentoDettaglio.class.php');
	require_once('class/mysql/PianoTrattamentoDettaglioMySqlDAO.class.php');
	require_once('class/mysql/ext/PianoTrattamentoDettaglioMySqlExtDAO.class.php');
	require_once('class/dao/PianoTrattamentoItemDAO.class.php');
	require_once('class/dto/PianoTrattamentoItem.class.php');
	require_once('class/mysql/PianoTrattamentoItemMySqlDAO.class.php');
	require_once('class/mysql/ext/PianoTrattamentoItemMySqlExtDAO.class.php');
	require_once('class/dao/PianoTrattamentoOLDDAO.class.php');
	require_once('class/dto/PianoTrattamentoOLD.class.php');
	require_once('class/mysql/PianoTrattamentoOLDMySqlDAO.class.php');
	require_once('class/mysql/ext/PianoTrattamentoOLDMySqlExtDAO.class.php');
	require_once('class/dao/PostazioniDAO.class.php');
	require_once('class/dto/Postazioni.class.php');
	require_once('class/mysql/PostazioniMySqlDAO.class.php');
	require_once('class/mysql/ext/PostazioniMySqlExtDAO.class.php');
	require_once('class/dao/PrenotazioneStatusDAO.class.php');
	require_once('class/dto/PrenotazioneStatu.class.php');
	require_once('class/mysql/PrenotazioneStatusMySqlDAO.class.php');
	require_once('class/mysql/ext/PrenotazioneStatusMySqlExtDAO.class.php');
	require_once('class/dao/PrenotazioniDAO.class.php');
	require_once('class/dto/Prenotazioni.class.php');
	require_once('class/mysql/PrenotazioniMySqlDAO.class.php');
	require_once('class/mysql/ext/PrenotazioniMySqlExtDAO.class.php');
	require_once('class/dao/PrenotazioniDettaglioDAO.class.php');
	require_once('class/dto/PrenotazioniDettaglio.class.php');
	require_once('class/mysql/PrenotazioniDettaglioMySqlDAO.class.php');
	require_once('class/mysql/ext/PrenotazioniDettaglioMySqlExtDAO.class.php');
	require_once('class/dao/PrenotazioniTrattamentiDAO.class.php');
	require_once('class/dto/PrenotazioniTrattamenti.class.php');
	require_once('class/mysql/PrenotazioniTrattamentiMySqlDAO.class.php');
	require_once('class/mysql/ext/PrenotazioniTrattamentiMySqlExtDAO.class.php');
	require_once('class/dao/PrimaNotaDAO.class.php');
	require_once('class/dto/PrimaNota.class.php');
	require_once('class/mysql/PrimaNotaMySqlDAO.class.php');
	require_once('class/mysql/ext/PrimaNotaMySqlExtDAO.class.php');
	require_once('class/dao/ProdottoDAO.class.php');
	require_once('class/dto/Prodotto.class.php');
	require_once('class/mysql/ProdottoMySqlDAO.class.php');
	require_once('class/mysql/ext/ProdottoMySqlExtDAO.class.php');
	require_once('class/dao/ProvinceDAO.class.php');
	require_once('class/dto/Province.class.php');
	require_once('class/mysql/ProvinceMySqlDAO.class.php');
	require_once('class/mysql/ext/ProvinceMySqlExtDAO.class.php');
	require_once('class/dao/RatadocumentoDAO.class.php');
	require_once('class/dto/Ratadocumento.class.php');
	require_once('class/mysql/RatadocumentoMySqlDAO.class.php');
	require_once('class/mysql/ext/RatadocumentoMySqlExtDAO.class.php');
	require_once('class/dao/RatapagamentoDAO.class.php');
	require_once('class/dto/Ratapagamento.class.php');
	require_once('class/mysql/RatapagamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/RatapagamentoMySqlExtDAO.class.php');
	require_once('class/dao/RatapagamentodocDAO.class.php');
	require_once('class/dto/Ratapagamentodoc.class.php');
	require_once('class/mysql/RatapagamentodocMySqlDAO.class.php');
	require_once('class/mysql/ext/RatapagamentodocMySqlExtDAO.class.php');
	require_once('class/dao/RegioniDAO.class.php');
	require_once('class/dto/Regioni.class.php');
	require_once('class/mysql/RegioniMySqlDAO.class.php');
	require_once('class/mysql/ext/RegioniMySqlExtDAO.class.php');
	require_once('class/dao/RichiamoDAO.class.php');
	require_once('class/dto/Richiamo.class.php');
	require_once('class/mysql/RichiamoMySqlDAO.class.php');
	require_once('class/mysql/ext/RichiamoMySqlExtDAO.class.php');
	require_once('class/dao/RichiamoStatoDAO.class.php');
	require_once('class/dto/RichiamoStato.class.php');
	require_once('class/mysql/RichiamoStatoMySqlDAO.class.php');
	require_once('class/mysql/ext/RichiamoStatoMySqlExtDAO.class.php');
	require_once('class/dao/RisorsapagamentoDAO.class.php');
	require_once('class/dto/Risorsapagamento.class.php');
	require_once('class/mysql/RisorsapagamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/RisorsapagamentoMySqlExtDAO.class.php');
	require_once('class/dao/RuoloDAO.class.php');
	require_once('class/dto/Ruolo.class.php');
	require_once('class/mysql/RuoloMySqlDAO.class.php');
	require_once('class/mysql/ext/RuoloMySqlExtDAO.class.php');
	require_once('class/dao/SedeDAO.class.php');
	require_once('class/dto/Sede.class.php');
	require_once('class/mysql/SedeMySqlDAO.class.php');
	require_once('class/mysql/ext/SedeMySqlExtDAO.class.php');
	require_once('class/dao/SezioneDAO.class.php');
	require_once('class/dto/Sezione.class.php');
	require_once('class/mysql/SezioneMySqlDAO.class.php');
	require_once('class/mysql/ext/SezioneMySqlExtDAO.class.php');
	require_once('class/dao/TipoDAO.class.php');
	require_once('class/dto/Tipo.class.php');
	require_once('class/mysql/TipoMySqlDAO.class.php');
	require_once('class/mysql/ext/TipoMySqlExtDAO.class.php');
	require_once('class/dao/TipodocumentoDAO.class.php');
	require_once('class/dto/Tipodocumento.class.php');
	require_once('class/mysql/TipodocumentoMySqlDAO.class.php');
	require_once('class/mysql/ext/TipodocumentoMySqlExtDAO.class.php');
	require_once('class/dao/TrattamentiDAO.class.php');
	require_once('class/dto/Trattamenti.class.php');
	require_once('class/mysql/TrattamentiMySqlDAO.class.php');
	require_once('class/mysql/ext/TrattamentiMySqlExtDAO.class.php');
	require_once('class/dao/TrattamentiLaserDAO.class.php');
	require_once('class/dto/TrattamentiLaser.class.php');
	require_once('class/mysql/TrattamentiLaserMySqlDAO.class.php');
	require_once('class/mysql/ext/TrattamentiLaserMySqlExtDAO.class.php');
	require_once('class/dao/TrattamentiVisoCorpoDAO.class.php');
	require_once('class/dto/TrattamentiVisoCorpo.class.php');
	require_once('class/mysql/TrattamentiVisoCorpoMySqlDAO.class.php');
	require_once('class/mysql/ext/TrattamentiVisoCorpoMySqlExtDAO.class.php');
	require_once('class/dao/UtenteDAO.class.php');
	require_once('class/dto/Utente.class.php');
	require_once('class/mysql/UtenteMySqlDAO.class.php');
	require_once('class/mysql/ext/UtenteMySqlExtDAO.class.php');

?>