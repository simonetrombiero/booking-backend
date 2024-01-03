<style type="text/css">
<!--

div.contenuto_scheda{
	position:relative;
	top:220px;
	left:0px;
	width:910px;
	height:460px;
	text-align:justify;
}
div.foto_principale{
	width:300px;
	height:250px;
	float: left;
	display: block;
	clear: left;
}
div.altre_foto{
	width:50px;
	height:250px;
	float: left;
	display: block;
}
div.intestazione{
	position:absolute;
	left:380px;
	height:60px;
	width:470px;
	padding:0px;
	float: left;
	display: block;
	clear:left;
	font-family:Arial;
	font-weight:bold;
	font-size:16px;
	color:#006799;
	text-align:justify;
}
div.status{
	position:absolute;
	left:860px;
	width:30px;
	height:30px;
	float: left;
	display: block;
}
div.dati_scheda{
	position:absolute;
	top:60px;
	left:380px;
	display: block;
	clear:left;
	float:left;
	width:510px;
	text-align:justify;
}


-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
<div><img src="img/logo.png" /></div>
<div style="clear: both;">&nbsp;</div>
<div class="foto_principale">
<?php echo "<img src='img/immobili/$foto->foto' height='250' width='298' >"; ?><img src="img/spacer.gif" height="250" width="2">
</div>

<div class="altre_foto">
<!--<a href="img/immobili/<?php //echo "$row_f->foto2"; ?>" rel="lightbox[holdingre]" ><img src="<?php //echo "img/immobili/$row_f->foto2"; ?>" height="48" width="50" ></a><img src="img/spacer.gif" height="2" width="50">
<a href="img/immobili/<?php //echo "$row_f->foto3"; ?>" rel="lightbox[holdingre]" ><img src="<?php //echo "img/immobili/$row_f->foto3" ?>" height="48" width="50" ></a><img src="img/spacer.gif" height="2" width="50">
<a href="img/immobili/<?php //echo "$row_f->foto4"; ?>" rel="lightbox[holdingre]" ><img src="<?php //echo "img/immobili/$row_f->foto4"; ?>" height="48" width="50" ></a><img src="img/spacer.gif" height="2" width="50">
<a href="img/immobili/<?php //echo "$row_f->foto5"; ?>" rel="lightbox[holdingre]" ><img src="<?php //echo "img/immobili/$row_f->foto5"; ?>" height="48" width="50" ></a><img src="img/spacer.gif" height="2" width="50">
<a href="img/immobili/<?php //echo "$row_f->foto6"; ?>" rel="lightbox[holdingre]" ><img src="<?php //echo "img/immobili/$row_f->foto6";  ?>" height="50" width="50" ></a>-->
</div>
<?php 

	//$query_sta= mysql_query("SELECT * FROM stato WHERE id='$immobile->status'");
	//$row_sta = mysql_fetch_object($query_sta);
?>
<div class="intestazione">
<table><tr><td>Riferimento codice n. <?php echo $immobile->codice; ?><br />
<p class="testo1_bold"><?php if($immobile->contratto==1){ echo "Prezzo"; }else { echo "Canone di locazione"; } ?><span class="testo2_bold">&nbsp; <?php if ($immobile->importo>0){ echo "&euro;&nbsp;".number_format($immobile->importo,2,',','.')."&nbsp;".$immobile->imp_dett; } else { echo "trattativa in sede"; } ?></span></p>
</td>
    <td valign="top" class="testo4">&nbsp;</td>
    <td valign="top" class="testo4">Riferimento: <?php echo $agenzia->ragioneSociale; ?><br>
  Tel <?php echo $agenzia->telefono; ?> - <?php echo $agenzia->email; ?></td>
</tr></table>
</div>
<div class="status">
    <!--<img src="<?php //echo "img/$row_sta->immagine"; ?>" >-->
</div>

<div class="dati_scheda">
<table class="scheda">
  <tr>
    <td width="70" class="testo1">Trattamento</td>
    <td class="testo2"><?php echo $contratto->descrizioneCt; ?></td>
    <td class="testo1">Tipologia</td>
    <td class="testo2"><?php echo $tipologia->descrizione; ?></td>
  </tr>
  <tr>
    <td width="70" class="testo1">Localit&agrave;</td>
    <td class="testo2"><?php echo $comune->comune; ?></td>
    <td width="70" class="testo1">Indirizzo</td>
    <td class="testo2"><?php echo $immobile->via." ".$immobile->civico; ?></td>
  </tr>
  <tr>
    <td width="70" class="testo1">Piano</td>
    <td class="testo2"><?php echo $immobile->livello; ?></td>
    <td width="70" class="testo1">Categoria</td>
    <td class="testo2"><?php echo $immobile->categoria; ?></td>
  </tr>
  <tr>
    <td class="testo1">Superficie</td>
    <td class="testo2"><?php echo $immobile->mq; ?> m.q.</td>
    <td class="testo1">Condominio</td>
    <td class="testo2"><?php echo $datispecifici->condominio; ?></td>
  </tr>
  <tr>
    <td class="testo1">Ascensore</td>
    <td class="testo2"><?php echo $datispecifici->ascensore; ?></td>
    <td class="testo1">Pertinenze</td>
    <td class="testo2"><?php echo $datispecifici->pertinenza; ?></td>
  </tr>
  <tr>
    <td class="testo1">Garage</td>
    <td class="testo2"><?php echo $datispecifici->garage; ?> m.q.</td>
    <td class="testo1">Balconi</td>
    <td class="testo2"><?php echo $datispecifici->balconi; ?> m.q. </td>
  </tr>
  <tr>
    <td class="testo1">Terrazzi</td>
    <td class="testo2"><?php echo $datispecifici->terrazzi; ?> m.q </td>
    <td class="testo1">Giardino</td>
    <td class="testo2"><?php echo $datispecifici->giardino; ?> m.q. </td>
  </tr>
  <tr>
    <td class="testo1">Portico</td>
    <td class="testo2"><?php echo $datispecifici->portico; ?> m.q. </td>
    <td class="testo1">Patio</td>
    <td class="testo2"><?php echo $datispecifici->patio; ?> m.q. </td>
  </tr>
  <tr>
    <td class="testo1">Pavimenti</td>
    <td class="testo2"><?php echo $rifiniture->pavimenti; ?></td>
    <td width="70" class="testo1">Rivestimenti</td>
    <td class="testo2"><?php echo $rifiniture->rivestimenti; ?></td>
  </tr>
  <tr>
    <td width="70" class="testo1">Infissi esterni </td>
    <td class="testo2"><?php echo $rifiniture->infissiEsterni; ?></td>
    <td class="testo1">Infissi interni </td>
    <td class="testo2"><?php echo $rifiniture->infissiInterni; ?></td>
  </tr>
  <tr>
    <td class="testo1">Servizi</td>
    <td class="testo2"><?php echo $rifiniture->servizi; ?></td>
    <td class="testo1">Riscaldamento</td>
    <td class="testo2"><?php echo $rifiniture->riscaldamento; ?></td>
  </tr>
  <tr>
    <td class="testo1">Anno Costr.</td>
    <td class="testo2"><?php echo $datispecifici->anno; ?></td>
    <td class="testo1">Cl. Energetica </td>
    <td class="testo2"><?php echo $datispecifici->classeEnergetica; ?></td>
  </tr>
</table>

</div>

<div class="form_scheda">
<p class="testo1"><span class="testo2">Composizione&nbsp;<br></span><?php echo $immobile->composizione; ?><br>
<br>
<?php echo $immobile->note; ?></p>

</div>

</page>
