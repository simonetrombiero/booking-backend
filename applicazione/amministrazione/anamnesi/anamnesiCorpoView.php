

<p>&nbsp;</p>

                    <table border="0" style="width: 100%">
<!--                        <tr>
                            <td>Data Misurazione</td>
                            <td>&nbsp;</td>
                            <td></td>
                        </tr>-->

                        <?php
                        for ($i = 0; $i < count($misurazioni); $i++) {
                            $misurazioneTMP = $misurazioni[$i];
                            ?>
                            <tr>
                                <td style="line-height: 35px; border-bottom: 1px dotted #366c88; width: 45%; text-align: left"><?php echo $misurazioneTMP->label; ?></td>
                                <td style="line-height: 35px; border-bottom: 1px dotted #366c88; width: 5%">&nbsp;</td>
                                <td style="line-height: 35px; border-bottom: 1px dotted #366c88; width: 50%; text-align: left;">
                            <?php echo $misurazioneTMP->descrizione; ?>
                                </td>
                            </tr>
<?php } ?>



                        <input type="hidden" name="numDomande" value="<?php echo count($arrayDomande); ?>">
                    </table>



