<p>&nbsp;</p>
<input type="text" name="medicoCurante" placeholder="Medico Curante del Paziente">
<input type="hidden" name="idQuestionario" value="<?php 
                if (isset($anmnesiCorpo)) {
                    echo $anmnesiCorpo->id;
                }
                
                ?>">
<p>&nbsp;</p>

<?php

for ($g = 0; $g < count($questionarioGruppo); $g++) {
    $gruppo = $questionarioGruppo[$g];
    //print_r($gruppo);
    ?>
    <p>&nbsp;</p>


        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
            <thead>
                <tr>
                    <th colspan="3" style="height: 40px; line-height: 40px; background: #66AACC; text-align: left; padding: 0px 5px; color: #FFF;"><?php echo $gruppo->descrizione; ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $questionario = DAOFactory::getAnamnesticoQuestionarioDAO()->queryByIdGruppoOrderBy("1", $gruppo->id, "ordine");
                //print_r($questionario);

                for ($k = 0; $k < count($questionario); $k++) {
                    $domanda = $questionario[$k];
                    ?>

                    <tr style="height: 30px;">
                        <td style="border-bottom: 1px dotted #000;">
                            <?php echo $domanda->domanda; ?>
                             <input type="hidden" id="idDomanda" name="idDomanda<?php echo $g . $k; ?>" value="<?php echo $domanda->id; ?>">
                            <input type="hidden" id="domanda" name="domanda<?php echo $g . $k; ?>" value="<?php echo $domanda->domanda; ?>">
                        </td>
                        <td style="border-bottom: 1px dotted #000;"></td>
                        <?php if ($domanda->tipoRisposta == '1') { ?>
                            <td style="text-align: right; padding-right: 5px; border-bottom: 1px dotted #000;">
                                si<input id="risposta" name="risposta<?php echo $g . $k; ?>" type="radio" value="si">&nbsp;
                                no<input id="risposta" name="risposta<?php echo $g . $k; ?>" type="radio" value="no"> 
                            </td>
                            <?php } else if($domanda->tipoRisposta == '3') { ?>
                             <td style="border-bottom: 1px dotted #000;">
                                 <select id="risposta" name="risposta<?php echo $g . $k; ?>" type="text" style="width: 100%;">
                                     <option>-- Seleziona --</option>
                                     <?php 
                                     $arrayOpzioni = explode(",", $domanda->opzioneRisposta);
                                     for($kk=0; $kk<count($arrayOpzioni);$kk++){
                                         $opzione = $arrayOpzioni[$kk];                                         
                                     
                                     ?>
                                     <option value="<?php echo $opzione; ?>"><?php echo $opzione; ?></option>
                                     <?php } ?>
                                 </select>
                            </td>
                        <?php } else { ?>
                            <td style="border-bottom: 1px dotted #000;">
                                <input id="risposta" name="risposta<?php echo $g . $k; ?>" type="text" >
                            </td>
                        <?php } ?>
                    </tr>
                    <?php
                }
                ?>
            <input type="hidden" name="questionario[]" value="<?php echo $k; ?>">

            </tbody>
        </table>


    <?php
} //fine for 
?>
        <input type="hidden" name="gruppo" value="<?php echo $g; ?>">
       
   
