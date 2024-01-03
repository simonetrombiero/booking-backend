<?php
global $questionario;
//print_r($questionarioGruppo);
?>

<div class="grid grid-pad">

    <div class="content">

        <p>&nbsp;</p>


        <p>
            

            Questionario del <b><?php echo dateFromDb($questionario->dataCompilazione); ?></b><br>
            Medico Curante: <b><?php echo $questionario->note; ?></b></p>



        <p>&nbsp;</p>

        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
            <thead>
                <tr>
                    <th colspan="3" style="height: 40px; line-height: 40px; background: #66AACC; text-align: left; padding: 0px 5px; color: #FFF;"></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $questionarioDett = DAOFactory::getAnamnesticoRisposteDAO()->queryByRispostaOrderByID($questionario->id);
//                print_r($questionarioDett);
//                echo $questionario->id;
                for ($k = 0; $k < count($questionarioDett); $k++) {
                    $domanda = $questionarioDett[$k];
                    ?>

                    <tr style="height: 30px;">
                        <td style="border-bottom: 1px dotted #000;">
    <?php echo $domanda->domanda; ?>

                        </td>
                        <td style="border-bottom: 1px dotted #000;"></td>

                        <td style="text-align: right; padding-right: 5px; border-bottom: 1px dotted #000;">
    <?php echo $domanda->risposta; ?>
                        </td>

                    </tr>
                    <?php
                }
                ?>


            </tbody>
        </table>


    </div></div>