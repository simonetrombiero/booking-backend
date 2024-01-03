<?php

function sceltaQuestionario() {
    global $cliente;
    $id = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($id);
}

function nuovoAnamnesiCorpo() {
    //global $listaAnamnesi, $cliente, $anmnesiCorpo;
    global $listaAnamnesi, $cliente, $clientePrivacy;



    //Carica Questionari
    $listaAnamnesi = DAOFactory::getAnamnesticoDAO()->queryAll();

    //$anmnesiCorpo = DAOFactory::getAnamnesticoDAO()->load("1"); //
    // carica info cliente
    $id = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($id);
    
    $privacy = DAOFactory::getConsensoPrivacyDAO()->queryByIdCliente($id);
    if(count($privacy)>0){
        $clientePrivacy = TRUE;
    } else {
        $clientePrivacy = FALSE;        
    }
    
    
}

function caricaListaAnamnesi() {
    global $listaAnamnesiPZ, $paziente;
    $id = getRequest("idCliente");
    $paziente = DAOFactory::getClientiDAO()->load($id);
    $listaAnamnesiPZ = DAOFactory::getAnmnesticoRisposteHeadDAO()->queryByPaziente($id);
}

function visualizzaQuestionario() {
    global $questionario, $misurazioni;
    $idQuestionario = getRequest("id");
    //$questionario = DAOFactory::getAnamnesticoQuestionarioDAO()->queryByIdAnamnestico($idQuestionario);
    //$questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico($idQuestionario);
    // echo '<pre>';
    //include 'applicazione/amministrazione/anamnesi/anamnesiNew.php';
    //print_r($questionarioGruppo);
    // echo '</pre>';
    $questionario = DAOFactory::getAnmnesticoRisposteHeadDAO()->load($idQuestionario);
    $dataOK = '';
    $datax = DAOFactory::getAnamnesticoCorpoHeadDAO()->queryByIdQuestionario($idQuestionario);
    
    for($r=0;$r<count($datax);$r++){
        if($r==0){$dataOK = $datax[$r]->data;}
        if($datax[$r]<$dataOK){$dataOK = $datax[$r]->data;}
    }
    
    if($dataOK!=''){
    //$misHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->queryByIdAnamnesticoByData($questionario->id, $questionario->dataCompilazione);
    $misHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->queryByIdAnamnesticoByData($questionario->id, $dataOK);
    } else {
        $misHead=NULL;
    }
    if (isset($misHead[0]->id)) {
        $misurazioni = DAOFactory::getAnamnesticoCorpoDAO()->queryByIdAnamnesticoOrderBy($misHead[0]->id, "ordine");
    } else {
        $misurazioni = NULL;
    }
}

function caricaInformazioniQuestionario() {
    $idQuestionario = getRequest("id");
    //$questionario = DAOFactory::getAnamnesticoQuestionarioDAO()->queryByIdAnamnestico($idQuestionario);
    $questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico($idQuestionario);
    // echo '<pre>';
    include 'applicazione/amministrazione/anamnesi/anamnesiNew.php';
    //print_r($questionarioGruppo);
    // echo '</pre>';
}

function salvaQuestionario() {

    /////////////////////
//    $dentiSelezionati = getRequestNT("dentiSelezionati");
//    echo $paperino = getRequestNT("paperino");
//    echo $dentiera = getRequestNT("dentiera");
//    print_r($dentiera);
//    echo '<br> dentiera';
//    var_dump($dentiera);
//    echo '<br> denti selezionati';
//    print_r($dentiSelezionati);
//    echo '<br> pap';
//    var_dump($paperino);
//    echo '<br> pap';
//    print_r($paperino);
//    /////////////////////////////
//    echo '<br><br>';
//    $abc = json_decode($paperino);
//    echo "tot: " . count($abc) . "<br>";
//    $aa = (array) $abc;
//    print_r($abc);
//    print_r($aa);
//    echo "<br>" . count($aa);
    
    exit;

    $idPaziente = getRequest("idCliente");
    $medicoCurante = getRequest("medicoCurante");
    $questionario = getRequest("idQuestionario");


    $oggi = date("Y-m-d");

    $gruppoCount = getRequest("gruppo");
    $questionarioCount = getRequestNT("questionario");

    /*
     * ANAMNESTICO RISPOSTE HEAD E DETTAGLIO
     */

    $anamnesi = new AnmnesticoRisposteHead();
    $anamnesi->idAnamnestico = $questionario;
    $anamnesi->dataCompilazione = $oggi;
    $anamnesi->paziente = $idPaziente;
    $anamnesi->note = $medicoCurante;

    $idAnamnesi = DAOFactory::getAnmnesticoRisposteHeadDAO()->insert($anamnesi);

    for ($k = 0; $k < $gruppoCount; $k++) {
        $numero = $questionarioCount[$k];
        for ($j = 0; $j < $numero; $j++) {
            $domanda = getRequest("domanda" . $k . $j);
            $idDomanda = getRequest("idDomanda" . $k . $j);
            $risposta = getRequest("risposta" . $k . $j);
            $anDett = new AnamnesticoRisposte();
            $anDett->idRisposta = $idAnamnesi;
            $anDett->idDomanda = $idDomanda;
            $anDett->domanda = $domanda;
            $anDett->risposta = $risposta;
            DAOFactory::getAnamnesticoRisposteDAO()->insert($anDett);
        }
    }

    /*
     * CORPO  HEAD
     */
    $corpoHead = new AnamnesticoCorpoHead();
    $corpoHead->idQuestionario = $idAnamnesi;
    $corpoHead->idCliente = $idPaziente;
    $corpoHead->data = $oggi;

    $idCorpoHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->insert($corpoHead);


    /*
     * CORPO  DETTAGLIO
     */

    $numDomande = getRequest("numDomande");
    for ($i = 0; $i < $numDomande; $i++) {

        $label = getRequest("label" . $i);
        $misura = getRequest("domanda" . $i);

        $misCorpo = new AnamnesticoCorpo();

        $misCorpo->idAnamnestico = $idCorpoHead;
        $misCorpo->label = $label;
        $misCorpo->descrizione = $misura;
        $misCorpo->ordine = $i + 1;

        DAOFactory::getAnamnesticoCorpoDAO()->insert($misCorpo);
    }




    /*
     *  CONSENSO
     */

    $trattamentoDati = getRequest("trattamentoDati");
    $consensoComunicazione = getRequest("consensoComunicazione");
    $consensoFidelity = getRequest("consensoFidelity");

    $consenso = new ConsensoPrivacy;
    $consenso->idQuestionario = $idAnamnesi;
    $consenso->trattamento = $trattamentoDati;
    $consenso->comunicazione = $consensoComunicazione;
    $consenso->fidelity = $consensoFidelity;
    
    /*
     *  NO CONSENSO PRIVACY, MA CONSENSO INFORMATIVO
     *  Privacy solo se non è stata compilata, legata al cliente 
     */


    DAOFactory::getConsensoPrivacyDAO()->insert($consenso);
    
    
    




    //Catella Clinica
    /*
      $cartellaClinica = new CartellaClinica();
      $cartellaClinica->idQuestionaro = $idAnamnesi;
      $cartellaClinica->dataComplilazione = $oggi;
      $cartellaClinica->note = $noteCarellaClinica;

      DAOFactory::getCartellaClinicaDAO()->insert($cartellaClinica);
     * 
     */

    //Consenso Informativo
    //Consenso privacy


    ob_clean();
    header("location: index.php?action=anamnesiList&idCliente=$idPaziente");
    exit;
}
