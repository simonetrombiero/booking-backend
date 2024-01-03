<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
<table style="width: 190mm;">
    <tr>
        <td style="width:50%;"><img src="img/logo.png" /></td>
        <td>&nbsp;</td>
        <td><h1>Foglio di Visita</h1></td>
    </tr>
    
    <tr>
      <td valign="top">Riferimento: <?php echo $agenzia->ragioneSociale; ?><br />
        Tel <?php echo $agenzia->telefono; ?> - <?php echo $agenzia->email; ?></td>
        <td>&nbsp;</td>
        <td style="width: 50%;"><strong>Riferimento Immobile codice n. <?php echo $immobile->codice; ?></strong>
          <p>
            <?php if($immobile->contratto==1){ echo "Prezzo"; }else { echo "Canone di locazione"; } ?>
            <span>&nbsp;
              <?php if ($immobile->importo>0){ echo "&euro;&nbsp;".number_format($immobile->importo,2,',','.')."&nbsp;".$immobile->imp_dett; } else { echo "trattativa in sede"; } ?>
            </span></p></td>
    </tr>
    <tr>
        <td colspan="3" style="width:190mm; height:3mm; border-top:1px dotted #333;">&nbsp;</td>
    </tr>
</table>
<table style="width: 190mm; font-size:9pt;">

  <tr>
    <td width="70" rowspan="13" valign="top"><?php echo "<img src='img/immobili/$foto->foto' height='250' width='298' >"; ?></td>
    <td width="2" rowspan="13" valign="top"><img src="img/spacer.gif" height="250" width="2">
</td>
    <td colspan="4">
        
    </td>
  </tr>
  <tr>
    <td width="70">Trattamento</td>
    <td><?php echo $contratto->descrizioneCt; ?></td>
    <td>Tipologia</td>
    <td><?php echo $tipologia->descrizione; ?></td>
  </tr>
  <tr>
    <td width="70">Localit&agrave;</td>
    <td><?php echo $comune->comune; ?></td>
    <td width="70">Indirizzo</td>
    <td><?php echo $immobile->via." ".$immobile->civico; ?></td>
  </tr>
  <tr>
    <td width="70">Piano</td>
    <td><?php echo $immobile->livello; ?></td>
    <td width="70">Categoria</td>
    <td><?php echo $immobile->categoria; ?></td>
  </tr>
  <tr>
    <td>Superficie</td>
    <td><?php echo $immobile->mq; ?> m.q.</td>
    <td>Condominio</td>
    <td><?php echo $datispecifici->condominio; ?></td>
  </tr>
  <tr>
    <td>Ascensore</td>
    <td><?php echo $datispecifici->ascensore; ?></td>
    <td>Pertinenze</td>
    <td><?php echo $datispecifici->pertinenza; ?></td>
  </tr>
  <tr>
    <td>Garage</td>
    <td><?php echo $datispecifici->garage; ?> m.q.</td>
    <td>Balconi</td>
    <td><?php echo $datispecifici->balconi; ?> m.q. </td>
  </tr>
  <tr>
    <td>Terrazzi</td>
    <td><?php echo $datispecifici->terrazzi; ?> m.q </td>
    <td>Giardino</td>
    <td><?php echo $datispecifici->giardino; ?> m.q. </td>
  </tr>
  <tr>
    <td>Portico</td>
    <td><?php echo $datispecifici->portico; ?> m.q. </td>
    <td>Patio</td>
    <td><?php echo $datispecifici->patio; ?> m.q. </td>
  </tr>
  <tr>
    <td>Pavimenti</td>
    <td><?php echo $rifiniture->pavimenti; ?></td>
    <td width="70">Rivestimenti</td>
    <td><?php echo $rifiniture->rivestimenti; ?></td>
  </tr>
  <tr>
    <td width="70">Infissi esterni </td>
    <td><?php echo $rifiniture->infissiEsterni; ?></td>
    <td>Infissi interni </td>
    <td><?php echo $rifiniture->infissiInterni; ?></td>
  </tr>
  <tr>
    <td>Servizi</td>
    <td><?php echo $rifiniture->servizi; ?></td>
    <td>Riscaldamento</td>
    <td><?php echo $rifiniture->riscaldamento; ?></td>
  </tr>
  <tr>
    <td>Anno Costr.</td>
    <td><?php echo $datispecifici->anno; ?></td>
    <td>Cl. Energetica </td>
    <td><?php echo $datispecifici->classeEnergetica; ?></td>
  </tr>
  <tr>
    <td colspan="6" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" valign="top"><strong>Composizione</strong></td>
    </tr>
  <tr>
    <td colspan="6" valign="top"><p><?php echo $immobile->composizione; ?><br>
<br>
<?php echo $immobile->note; ?></p></td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div style="width:190mm; font-size:9pt; line-height:20px;">
<table style="width:190mm;">
<tr> <td>Il/La sottoscritto/a</td>
    <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td> <td>residente a</td>
    <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td></tr>
<tr>
  <td> Recapito</td>
  <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td>
  <td>Email</td>
  <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td>
</tr>
<tr>
  <td colspan="4" align="center"><strong>Dichiara</strong></td>
  </tr>
<tr>
  <td colspan="4" style="text-align:justify;">con la sottoscrizione del presente foglio di visita, di aver acquisito informazioni e/o visionato per la prima volta, tramite <b><?php echo $agenzia->codice." - ".$agenzia->ragioneSociale; ?> l'immobile con Riferimento codice n. <?php echo $immobile->codice; ?>.</b><br />
Nel caso di acquisto o locazione, di quanto sopra menzionato, Il/La visionante si impegna a riconoscere alla RE Agency s.r.l. il compenso pari al tre (3) % in caso di acquisto; una mensilità in caso di locazione.<br />
Si autorizza quanto previsto dalla legge 196 sulla privacy.</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
</div>
<div style="font-size:9pt; line-height:20px;">

    <table  style="width:190mm;">
      <tr>
        <td style="width:12mm;">Luogo</td>
        <td style="border-bottom:1px dotted #333; width:30mm;">&nbsp;</td>
        <td style="width:5mm;">&nbsp;</td>
        <td style="width:8mm;">Data</td>
        <td style="border-bottom:1px dotted #333; width:30mm;">&nbsp;</td>
        <td style="width:5mm;">&nbsp;</td>
         <td style="width:8mm;">Ore</td>
        <td style="border-bottom:1px dotted #333; width:10mm;">&nbsp;</td>
        <td style="width:5mm;">&nbsp;</td>
        <td style="width:10mm;">Firma</td>
        <td style="border-bottom:1px dotted #333; width:45mm;">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
</div>
<div style="width:185mm; font-size:9pt; line-height:20px; border-top:3px dotted #333;">
<p style="text-align:right; font-size:7pt; width:185mm;">copia per il Cliente</p>
</div>
<div style="width:190mm; font-size:9pt; line-height:20px; ">
<table style="width: 190mm;">
<tr> <td>Il/La sottoscritto/a</td>
    <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td> <td>residente a</td>
    <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td></tr>
<tr>
  <td> Recapito</td>
  <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td>
  <td>Email</td>
  <td style="border-bottom:1px dotted #333; width:30%;">&nbsp;</td>
</tr>
<tr>
  <td colspan="4" align="center"><strong>Dichiara</strong></td>
  </tr>
<tr>
  <td colspan="4" style="text-align:justify;">con la sottoscrizione del presente foglio di visita, di aver acquisito informazioni e/o visionato per la prima volta, tramite <b><?php echo $agenzia->codice." - ".$agenzia->ragioneSociale; ?> l'immobile con Riferimento codice n. <?php echo $immobile->codice; ?>.</b><br />
Nel caso di acquisto o locazione, di quanto sopra menzionato, Il/La visionante si impegna a riconoscere alla RE Agency s.r.l. il compenso pari al tre (3) % in caso di acquisto; una mensilità in caso di locazione.<br />
Si autorizza quanto previsto dalla legge 196 sulla privacy.</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
</div>
<div style="font-size:9pt; line-height:20px;">
  <table  style="width:190mm;">
    <tr>
      <td style="width:12mm;">Luogo</td>
      <td style="border-bottom:1px dotted #333; width:30mm;">&nbsp;</td>
      <td style="width:5mm;">&nbsp;</td>
      <td style="width:8mm;">Data</td>
      <td style="border-bottom:1px dotted #333; width:30mm;">&nbsp;</td>
      <td style="width:5mm;">&nbsp;</td>
      <td style="width:8mm;">Ore</td>
      <td style="border-bottom:1px dotted #333; width:10mm;">&nbsp;</td>
      <td style="width:5mm;">&nbsp;</td>
      <td style="width:10mm;">Firma</td>
      <td style="border-bottom:1px dotted #333; width:45mm;">&nbsp;</td>
    </tr>
    </table>
</div>
</page>
