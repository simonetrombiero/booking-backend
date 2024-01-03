<?php
global $trattamento;
?>
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

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
<?php if (!isset($trattamento)) {
    echo "Nuovo Trattamento";
} else {
    echo "Modifica Trattamento";
} ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=trattamentiList" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formDipendente" name="formDipendente">
                    <input type="hidden" name="action" value="salvaTrattamento"/>
                    <input type="hidden" name="idTrattamento" value="<?php if (isset($trattamento)) {
    echo $trattamento->id;
} ?>"/>


                    <table style="margin-left:auto; margin-right:auto;">
                        <tr>
                            <td>Trattamento</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="nomeTrattamento" id="nomeTrattamento" value="<?php if (isset($trattamento)) {
    echo $trattamento->trattamento;
} ?>"></td>
                        </tr>
                                    <?php $listaCategorie = DAOFactory::getCategorieTattamentiDAO()->queryAll(); ?>
                        <tr>
                            <td>Categoria</td>
                            <td>&nbsp;</td>
                            <td><select name="categoriaTrattameno" id="categoriaTrattamento">
                                    <?php
                                    for ($i = 0; $i < count($listaCategorie); $i++) {
                                        $categoria = $listaCategorie[$i];
                                        ?>
                                        <option value="<?php echo $categoria->id; ?>" <?php if (isset($trattamento)) {
                                            if ($categoria->id == $trattamento->categoria) {
                                                echo 'selected=""';
                                            }
                                        } ?>><?php echo $categoria->categoria; ?></option>
<?php } ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Classificazione</td>
                            <td>&nbsp;</td>
                            <td><select name="classificazioneTrattameno" id="classificazioneTrattamento">
                                    <option value="0">-- Seleziona --</option>
                                    <option value="G" <?php if (isset($trattamento)) {
    if ($trattamento->classificazione == 'G') {
        echo "selected=''";
    }
} ?>>Generico</option>
                                    <option value="F" <?php if (isset($trattamento)) {
    if ($trattamento->classificazione == 'F') {
        echo "selected=''";
    }
} ?>>Donna</option>
                                    <option value="M" <?php if (isset($trattamento)) {
    if ($trattamento->classificazione == 'M') {
        echo "selected=''";
    }
} ?>>Uomo</option>  
                                </select></td>
                        </tr>
                        <tr>
                            <td>Tempo</td>
                            <td>&nbsp;</td>
                            <td>


                                <select name="tempoTrattamento" id="tempoTrattamento">
                                    <option value="0">-- Seleziona --</option>
                                    <option value="00:05" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:05:00') {
        echo "selected=''";
    }
} ?>>00:05</option>
                                    <option value="00:10" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:10:00') {
        echo "selected=''";
    }
} ?>>00:10</option>
                                    <option value="00:15" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:15:00') {
        echo "selected=''";
    }
} ?>>00:15</option>
                                    <option value="00:20" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:20:00') {
        echo "selected=''";
    }
} ?>>00:20</option>
                                    <option value="00:25" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:25:00') {
        echo "selected=''";
    }
} ?>>00:25</option>
                                    <option value="00:30" <?php if (isset($trattamento)) {
                                if ($trattamento->tempo == '00:30:00') {
                                    echo "selected=''";
                                }
                            } ?>>00:30</option>
                                    <option value="00:35" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:35:00') {
        echo "selected=''";
    }
} ?>>00:35</option>
                                    <option value="00:40" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:40:00') {
        echo "selected=''";
    }
} ?>>00:40</option>
                                    <option value="00:45" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '00:45:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>00:45</option>
                                    <option value="00:50" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:50:00') {
        echo "selected=''";
    }
} ?>>00:50</option>
                                    <option value="00:55" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '00:55:00') {
        echo "selected=''";
    }
} ?>>00:55</option>
                                    <option value="01:00" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '01:00:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>01:00</option>
                                    <option value="01:05" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:05:00') {
        echo "selected=''";
    }
} ?>>01:05</option>
                                    <option value="01:10" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:10:00') {
        echo "selected=''";
    }
} ?>>01:10</option>
                                    <option value="01:15" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '01:15:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>01:15</option>
                                    <option value="01:20" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:20:00') {
        echo "selected=''";
    }
} ?>>01:20</option>
                                    <option value="01:25" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:25:00') {
        echo "selected=''";
    }
} ?>>01:25</option>
                                    <option value="01:30" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '01:30:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>01:30</option>
                                    <option value="01:35" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:35:00') {
        echo "selected=''";
    }
} ?>>01:35</option>
                                    <option value="01:40" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:40:00') {
        echo "selected=''";
    }
} ?>>01:40</option>
                                    <option value="01:45" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '01:45:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>01:45</option>
                                    <option value="01:50" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:50:00') {
        echo "selected=''";
    }
} ?>>01:50</option>
                                    <option value="01:55" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '01:55:00') {
        echo "selected=''";
    }
} ?>>01:55</option>
                                    <option value="02:00" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '02:00:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>02:00</option>
                                    <option value="02:05" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:05:00') {
        echo "selected=''";
    }
} ?>>02:05</option>
                                    <option value="02:10" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:10:00') {
        echo "selected=''";
    }
} ?>>02:10</option>
                                    <option value="02:15" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '02:15:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>02:15</option>
                                    <option value="02:20" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:20:00') {
        echo "selected=''";
    }
} ?>>02:20</option>
                                    <option value="02:25" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:25:00') {
        echo "selected=''";
    }
} ?>>02:25</option>
                                    <option value="02:30" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '02:30:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>02:30</option>
                                    <option value="02:35" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:35:00') {
        echo "selected=''";
    }
} ?>>02:35</option>
                                    <option value="02:40" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:40:00') {
        echo "selected=''";
    }
} ?>>02:40</option>
                                    <option value="02:45" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '02:45:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>02:45</option>
                                    <option value="02:50" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:50:00') {
        echo "selected=''";
    }
} ?>>02:50</option>
                                    <option value="02:55" <?php if (isset($trattamento)) {
    if ($trattamento->tempo == '02:55:00') {
        echo "selected=''";
    }
} ?>>02:55</option>
                                    <option value="03:00" <?php if (isset($trattamento)) {
                                        if ($trattamento->tempo == '03:00:00') {
                                            echo "selected=''";
                                        }
                                    } ?>>03:00</option>
                                </select>

                                
                            </td>
                        </tr>
                        <tr>
                            <td>Tariffa&nbsp;&euro;</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="costoTrattamento" id="costoTrattamento" value="<?php if (isset($trattamento)) {
                                        echo $trattamento->costo;
                                    } ?>"></td>
                        </tr>
                        <tr>
                            <td>Iva</td>
                            <td>&nbsp;</td>
<?php $aliquote = DAOFactory::getAliquotaDAO()->queryAllInCorso(); ?>

                            <td>
                                <select name="ivaTrattamento" id="ivaTrattamento">
                                    <!--<option>------</option>-->
<?php
for ($i = 0; $i < count($aliquote); $i++) {
    $aliquota = $aliquote[$i];
    ?>

                                        <option value="<?php echo $aliquota->id; ?>" <?php if (isset($trattamento)) {
        if ($aliquota->id == $trattamento->idAliquota) {
            echo 'selected=""';
        }
    } ?>><?php echo $aliquota->descrizione; ?></option>

<?php } ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" class="btn btn-green" value="Salva"></td>
                        </tr>


                    </table>        

                </form>


            </div>    





        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>


