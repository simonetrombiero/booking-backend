<?php
global $cliente;

        


?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 

<!--</div> NON CANCELLARE QUESTO TAG - l'apertura è nelle file header-->

<?php
global $cliente;
//$cliente = new Clienti;
?>

<form action="index.php" method="post" id="formCliente" name="formCliente">
    <input type="hidden" name="action" value="salvaCliente"/>
    <input type="hidden" name="idCliente" value="<?php if (isset($cliente)) { echo $cliente->id; } ?>"/>

<div class="grid grid-pad">
    <div class="col-1-1">
        <div class="content">
            <div style="width: 100%; height: 50px; background-color: #f3f3f3;"><h2 style="float: left; padding: 13px 15px; text-shadow: 2px 2px 3px rgba(150, 150, 150, 0.75);">SCHEDA CLIENTE</h2></div>
        </div>
    </div>
</div>

<div style="clear:left;">&nbsp;</div>

<div class="grid grid-pad">
    <div class="col-1-2">
        <div class="content">
            
            <fieldset class="border">
                <legend>Cliente</legend>
                
                <label>Tipo Cliente:</label><?php echo $cliente->ragioneSociale; ?><br />
                <label>Ragione Sociale:</label> <?php echo $cliente->ragioneSociale; ?><br />
                <label>Cognome:</label> <?php echo $cliente->cognome ?><br />
                <label>Nome:</label> <?php echo $cliente->nome;  ?><br />
                <label>Data:</label> <?php echo dateFromDb($cliente->dataNascita); ?><br />
                <label>Nazione:</label> <?php echo $cliente->nazioneNascita ?><br />
                <label>Città:</label> <?php echo $cliente->cittaNascita; ?>
                <label>Sesso:</label> <?php echo $cliente->sesso; ?><br />
                <label>Titolo:</label> <?php echo $cliente->titolo; ?><br />
                <label>Lingua:</label> <?php echo $cliente->lingua; ?><br />
                <label>Nazionalita:</label> <?php echo $cliente->nazionalita; ?><br />
                <label>Codice Fiscale:</label> <?php echo $cliente->codiceFiscale; ?><br />
                <label>Partita IVA:</label> <?php echo $cliente->partitaIVa; ?>
            </fieldset>
        </div>
    </div>
    
    <div class="col-1-2">
        <div class="content">
            <fieldset class="border">
                <legend>Residenza e Recapiti </legend>
               
                <label>Nazione:</label> <?php echo $cliente->nazioneResidenza; ?><br />
                <label>Città:</label> <?php echo $cliente->cittaResidenza; ?><br />
                <label>Cap:</label> <?php echo $cliente->cap; ?> <br>
                <label>Indirizzo:</label> <?php echo $cliente->indirizzo; ?><br>
                <label>telefono:</label> <?php echo $cliente->telefono; ?><br />
                <label>telefono 2:</label> <?php echo $cliente->telefono2; ?><br /> 
                <label>cellulare:</label> <?php echo $cliente->cellulare; ?><br />
                <label>fax:</label> <?php echo $cliente->fax; ?><br />
                <label>Email:</label> <?php echo $cliente->email; ?><br />
                
    </fieldset>
            
            <div style="clear:left;">&nbsp;</div>
            
            <fieldset class="border">
                <legend>Annotazioni</legend>
          
                <div style="min-height: 40px;"> <?php echo $cliente->note; ?></div>
            </fieldset>
        </div>
    </div>
</div>

<div style="clear:left;">&nbsp;</div>

<div class="grid grid-pad">
    <div class="col-1-2">
        <div class="content">
            <fieldset class="border">
                <legend>Documento di Riconoscimento</legend>
          
                <label>Numero:</label> <?php echo $cliente->documentoNumero; ?><br />
                <label>Scadenza:</label> <?php echo dateFromDb($cliente->scadenzaDocumento); ?><br />
                <label>Tipo:</label> <?php echo $cliente->tipoDocumento; ?><br /> 
                <label>Nazione:</label> <?php echo $cliente->nazioneDocumento; ?><br /> 
                <label>Città:</label> <?php echo $cliente->cittaDocumento; ?><br /> 
             
            </fieldset>
            
    </div>
    </div>
    <div class="col-1-2">
    <div class="content">
    <fieldset class="border">
       
     <legend>Scansione Documento</legend>
     
     <p>&nbsp;</p>
            
     <div style="height: 140px; width: 150px; background: #cccccc; border: 1px dotted #333;"></div>
     
    </fieldset>
       
    </div>
    </div>
    </div>
<div style="clear:left;">&nbsp;</div>
<div class="grid grid-pad">
    <div class="col-1-1">
        <div class="content" style="text-align: right;"><a href="javascript: submit()" class="bottone">Salva Cliente</a></div>
    </div>
</div>

</form>

<script type="text/javascript">
    
    function submit() {
        
        document.getElementById('formCliente').submit();
        
    }
    
</script>





<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                <!--INIZIO--->
  
  
                
        <div>
             <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                Scheda Cliente</h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=clientiList" class="btn btn-green" >Torna alla Lista</a>
                                            </div>
                                        </div></div>
                <div>
          
       
          <table style="margin-left:auto; margin-right:auto;">
              <tr>
                  <td>Cognome </td>
                   <td>&nbsp;</td>
                   <td><?php echo $cliente->cognome;?></td>
              </tr>
              <tr>
                  <td>Nome</td>
                  <td>&nbsp;</td>
                  <td><?php echo $cliente->nome;?></td>
              </tr>
              <tr>
                  <td>Telefono</td>
                  <td>&nbsp;</td>
                  <td><?php echo $cliente->telefono; ?></td>
              </tr>
              <tr>
                  <td>Cellulare</td>
                  <td>&nbsp;</td>
                  <td><?php echo $cliente->cellulare; ?></td>
              </tr>
              <tr>
                  <td>Email</td>
                  <td>&nbsp;</td>
                  <td><?php echo $cliente->email; ?></td>
              </tr>
              <tr>
                <td>Data Nascita</td>
                <td>&nbsp;</td>
                <td><?php if(isset($cliente->dataNascita)){ echo dateFromDb($cliente->dataNascita); } ?></td>
              </tr>
              <tr>
                <td>Codice Fiscale</td>
                <td>&nbsp;</td>
                <td><?php echo $cliente->cFiscale; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
</table>        
      




 </div>    
  
 
 
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           