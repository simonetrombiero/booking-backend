<?php
global $card, $cliente;


?>
<script language="JavaScript">

/*FORMATTAZIONE NUMERO*/
function numbersOnly(oMyField1, oKeyEvent) {
	var nChar = (oKeyEvent || window.event || { charCode: 0 }).charCode, sChar =
String.fromCharCode(nChar), rSeparator = /,/;
	return nChar === 0 || /\d/.test(sChar) || (rSeparator.test(sChar) &&
!rSeparator.test(oMyField1.value));
}

function formatNumber(oMyField2) {
	var aFragms = parseFloat("0" +
oMyField2.value.replace(/\./g, "").replace(",",".")).toFixed(2).split(".");
	oMyField2.value = aFragms[0].replace(/(\d{3})+$/g, ".$&").replace(/^\./,
"").replace(/\d{3}(?!$)/g, "$&.") + "," + aFragms[1];
}

function unformatNumber(oMyField3) {
	oMyField3.value =
oMyField3.value.replace(/\.|(?:^0)?,00|(,\d)0/g, "$1");
}

</script>

<!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 -->
 
<!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--  <script type="text/javascript" src="applicazione/js/jquery-ui_completo.js"></script>
  <link rel="stylesheet" href="applicazione/css/jquery-ui_completo.css" media="all">-->
 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
    <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

   <script src="applicazione/js/jscolor.js"></script>
   
   <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                <!--INIZIO--->
  
  
                
        <div>
            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                <?php if(!isset($punti)){ echo "Eroga Punti"; }else { echo "Modifica Dipendente"; } ?></h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=fidelityCard" class="btn btn-green" >Annulla</a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formDipendente" name="formDipendente">
                        <input type="hidden" name="action" value="salvaPunti"/>
                        <input type="hidden" name="idCard" value="<?php if (isset($card)) { echo $card->id; } ?>"/>
                        
                        
                                <table width="100%">
        <tr><td align="center">
        
               <table align="center">
                   <tr style="height:40px;">
    <td width="20%">Cliente</td>
    <td>&nbsp;</td>
    <td width="80%"><span style="color:#E5007D; font-weight:bold;">
            <input name="clienteRicerca" type="text" id="clienteRicerca" style="border: 1px solid #999; height:25px; padding:2px;" value="<?php echo $cliente->nome.' '.$cliente->cognome; ?>">&nbsp;
    </span></td>
  </tr>
   <tr style="height:40px;">
    <td>Importo</td>
    <td>&nbsp;</td>
    <td><input name="importo" type="text" id="importo" style="border: 1px solid #999; height:25px; padding:2px" onfocus="unformatNumber(this);" onblur="formatNumber(this);" onkeypress="return numbersOnly(this, event);" value="0,00" onpaste="return true;" required /></td>
<!--  </tr>
  <tr style="height:40px;">
    <td>PIN</td>
    <td>&nbsp;</td>
    <td><input name="pin" type="password" id="pin" style="border: 1px solid #999; height:25px; padding:2px" required></td>
  </tr>-->
   <tr style="height:40px;">
    <td>Card N.</td>
    <td>&nbsp;</td>
    <td><input name="card" type="text" id="card" style="border: 1px solid #999; height:25px; padding:2px" value="<?php echo $card->codiceBarre; ?>" required></td>
  </tr>
   <tr style="height:30px;">
      <td colspan="3" style="color:#E5007D; font-weight:bold;">&nbsp;</td>
    </tr>
    
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Accredita" class="btn" style="width:200px"></td>
  </tr>
  <tr style="height:30px;">
      <td colspan="3">&nbsp;</td>
    </tr>
</table>


      
</form>

           
       </div>    
  
 
 
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
   
