<?php

function sceltaQuestionario(){
    global $cliente;
    $id = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($id);
    
}

function nuovoAnamnesiCorpo() {
    //global $listaAnamnesi, $cliente, $anmnesiCorpo;
    global $listaAnamnesi, $cliente;
    


    //Carica Questionari
    $listaAnamnesi = DAOFactory::getAnamnesticoDAO()->queryAll();
    
    //$anmnesiCorpo = DAOFactory::getAnamnesticoDAO()->load("1"); //

    // carica info cliente
    $id = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($id);
}

function caricaListaAnamnesi() {
    global $listaAnamnesiPZ, $paziente;
    $id = getRequest("idCliente");
    $paziente = DAOFactory::getClientiDAO()->load($id);
    $listaAnamnesiPZ = DAOFactory::getAnmnesticoRisposteHeadDAO()->queryByPaziente($id);
}

function visualizzaQuestionario() {
    global $questionario;
    $idQuestionario = getRequest("id");
    //$questionario = DAOFactory::getAnamnesticoQuestionarioDAO()->queryByIdAnamnestico($idQuestionario);
    //$questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico($idQuestionario);
    // echo '<pre>';
    //include 'applicazione/amministrazione/anamnesi/anamnesiNew.php';
    //print_r($questionarioGruppo);
    // echo '</pre>';
    $questionario = DAOFactory::getAnmnesticoRisposteHeadDAO()->load($idQuestionario);
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
    
    

    /* 
     * CORPO  DETTAGLIO
     */
    
    $anamnesiCorpo[] = getRequest("anamnesiCorpo1");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo2");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo3");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo4");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo5");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo6");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo7");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo8");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo9");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo10");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo11");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo12");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo13");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo14");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo15");
    $anamnesiCorpo[] = getRequest("anamnesiCorpo16");

    for ($hh = 0; $hh < 16; $hh++) {
        $corpoAnamnesi = new AnamnesticoCorpo;
        $corpoAnamnesi->idAnamnestico = $idAnamnesi;
        $corpoAnamnesi->riga = $hh + 1;
        $corpoAnamnesi->descrizione = $anamnesiCorpo[$hh];
        DAOFactory::getAnamnesticoCorpoDAO()->insert($corpoAnamnesi);
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
