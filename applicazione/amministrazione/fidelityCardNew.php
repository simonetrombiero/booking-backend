<?php
global $punti;


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
                                                <?php if(!isset($punti)){ echo "Genera Card"; }else { echo "Modifica Card"; } ?></h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=fidelityCard" class="btn btn-green" >Annulla</a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formFidelity" name="formFidelity">
                        <input type="hidden" name="action" value="generaCard"/>
                        
                        
                        
                                <table width="100%">
        <tr><td align="center">
        	<form action="#" method="post">
               <table align="center">
                   <tr style="height:40px;">
    <td width="20%">RICERCA CLIENTE</td>
    <td>&nbsp;</td>
    <td width="80%"><span style="color:#E5007D; font-weight:bold;">
      <input name="cliente" type="text" id="cliente" style="border: 1px solid #999; height:25px; padding:2px; width:80%">&nbsp;
      <input type="hidden" id="idCliente" name="idCliente">
    </span></td>
  </tr>
 
  <tr style="height:40px;">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Nome Cognome o  Cellulare o C. Fiscale</td>
  </tr>
  <tr style="height:30px;">
    <td colspan="3" style="color:#E5007D; font-weight:bold;">&nbsp;</td>
  </tr>
  <tr style="height:30px;">
    <td colspan="3" style="color:#E5007D; font-weight:bold;">&nbsp;</td>
  </tr>
    
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Genera Card" class="btn" style="width:200px"></td>
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
           
   
 <script type="text/javascript">
                 $(function () {
            $("#cliente").autocomplete({
                source: "index.php?action=searchClienteFidelity",
                minLength: 3,
                select: function (event, ui) {
                    //document.getElementById('id').value = '';

                    $("#idCliente").val(ui.item.id);
                    

                }
            });

        });
        
        </script>