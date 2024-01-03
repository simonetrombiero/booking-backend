<?php
global $azienda;
?>


<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <link rel="stylesheet" href="style/jquery-ui-1.10.4.custom.css" media="all">
            <div class="sheet clearfix">
                <div class="layout-wrapper">
                    <div class="content-layout">
                        <div class="content-layout-row">
                            <div class="layout-cell content">
                                <article class="post article">                            
                                    <div class="postcontent postcontent-0 clearfix">
                                        <div class="content-layout">
                                            <div class="content-layout-row">
                                                <div class="layout-cell layout-item-0" style="width: 100%" >
                                                    <div style="width: 100%; background-color: #f3f3f3; padding: 4px;">
                                                        <h2 class="headerPage">
                                                            <?php
                                                            if (isset($azienda)) {
                                                                ?>
                                                                MODIFICA AZIENDA
                                                                <?php
                                                            } else {
                                                                ?>
                                                                REGISTRA AZIENDA
                                                                <?php
                                                            }
                                                            ?>
                                                        </h2>
                                                    </div>
                                                    <div style="margin: 20px auto; width: 530px">
                                                        <form action="index.php" method="post" id="formAzienda" enctype="multipart/form-data">
                                                            <input type="hidden" name="action" value="salvaAzienda"/>
                                                            <input type="hidden" id="idAzienda" name="idAzienda" value="<?php
                                                            if (isset($azienda)) {
                                                                echo $azienda->id;
                                                            }
                                                            ?>" />
                                                            <div style="display: table">
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Ragione Sociale: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="ragioneSocialeAzienda" type="text" name="ragioneSocialeAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->ragioneSociale;
                                                                        }
                                                                        ?>" />

                                                                    </div>
                                                                </div>
                                                                <!--                                                  <div style="display: table-row; height: 35px">
                                                                <div  style="display: table-cell; width: 150px">
                                                                                                                            Denominazione: 
                                                                                                                        </div>
                                                                                                                        <div  style="display: table-cell"><input id="denominazioneAzienda" type="text" name="denominazioneAzienda" style="width: 350px" value="<?php /* if (isset($azienda)) {
                                                                                                               echo $azienda->denominazione;
                                                                                                               } */ ?>" />
                                                                                                                            
                                                                                                                        </div>
                                                                                                                </div>-->
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Partita Iva: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="pivaAzienda" type="text" name="pivaAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->piva;
                                                                        }
                                                                        ?>" />

                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Codice Fiscale: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="codFiscAzienda" type="text" name="codFiscAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->codFisc;
                                                                        }
                                                                        ?>" />

                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Codice Univoco (SDI): 
                                                                    </div>
                                                                    <div  style="display: table-cell">
                                                                        <input id="codiceUnivocAzienda" type="text" name="codiceUnivocAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->codiceUnivoco;
                                                                        }
                                                                        ?>" />

                                                                    </div>
                                                                </div>


                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell">
                                                                        Indirizzo:
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="indirizzoAzienda" type="text" name="indirizzoAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->indirizzo;
                                                                        }
                                                                        ?>" />

                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell">
                                                                        Città:
                                                                    </div>
                                                                    <div  style="display: table-cell">
                                                                        <?php
                                                                        $citta = null;
                                                                        if (isset($azienda)) {
                                                                            if (!isBlankOrNull($azienda->idCitta)) {
                                                                                //$citta = DAOFactory::getComuniDAO()->loadById($azienda->idCitta);
                                                                                 $citta = DAOFactory::getComuniDAO()->load($azienda->idCitta);
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <input id="cittaAzienda" type="text" name="cittaAzienda" style="width: 350px" value="<?php
                                                                        if ($citta != null) {
                                                                            echo $citta->comune;
                                                                        }
                                                                        ?>" />
                                                                        <input id="idCittaAzienda" type="hidden" name="idCittaAzienda"  value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->idCitta;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell">
                                                                        Cap:
                                                                    </div>
                                                                    <div  style="display: table" id="divCap"><input id="capAzienda" type="text" name="capAzienda" style="width: 45px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->cap;
                                                                        }
                                                                        ?>" />
                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Telefono: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="telefonoAzienda" type="text" name="telefonoAzienda" style="width: 90px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->telefono;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Telefono 2: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="telefono2Azienda" type="text" name="telefono2Azienda" style="width: 90px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->telefono2;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Fax: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="faxAzienda" type="text" name="faxAzienda" style="width: 90px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->fax;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Cellulare: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="cellulareAzienda" type="text" name="cellulareAzienda" style="width: 90px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->email;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                                                               <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Cellulare: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="cellulareAzienda" type="text" name="cellulareAzienda" style="width: 90px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->email;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        PEC: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="pecAzienda" type="text" name="pecAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->pec;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Sito Web: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input id="sitoWebAzienda" type="text" name="sitoWebAzienda" style="width: 350px" value="<?php
                                                                        if (isset($azienda)) {
                                                                            echo $azienda->sitoWeb;
                                                                        }
                                                                        ?>" />


                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; height: 35px">
                                                                    <div  style="display: table-cell; width: 150px">
                                                                        Logo Azienda: 
                                                                    </div>
                                                                    <div  style="display: table-cell"><input type="file" name="logoAzienda" id="logoAzienda" style="margin-right: 5px"/>


                                                                    </div>
                                                                </div>

                                                            </div>



                                                        </form> 



                                                    </div>
                                                    <div style="float: right">


                                                        <div style="margin-top: 15px; text-align: right; float: left">
                                                            <a href="javascript: submit()" class="button" >Salva Azienda</a>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--FINE--->




        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>



    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript">
        $(function () {
            var cap = new Array();
            var citta = new Array();
            //var province = new Array();
            var capCitta = new Array();
            $.ajax({
                url: "index.php?action=caricaInfoRegione",
                dataType: "json",
                data: {},
                success: function (data) {
                    //                alert(data["province"][0]["provincia"]);

                    for (var i = 0; i < data["comuni"].length; i++) {
                        citta[i] = {id: "" + data["comuni"][i]["iDCM"] + "", label: "" + data["comuni"][i]["comune"] + "", provincia: "" + data["comuni"][i]["provincia"] + "", cap: "" + data["comuni"][i]["cap"] + "", idProvincia: "" + data["comuni"][i]["codProv"] + ""};
                    }
                    $("#cittaAzienda").autocomplete({
                        source: citta,
                        select: function (event, ui) {
                            document.getElementById('idCittaAzienda').value = '';
                            var option = "";
                            var listaCap = new Array();
                            var j = 0;
                            for (var i = 0; i < data["capComuni"].length; i++) {
                                if (ui.item.id == data["capComuni"][i]["comuni_ID_CM"]) {
                                    listaCap[j] = data["capComuni"][i]["CAP_ID_CAP"]
                                    j++;
                                }

                            }

                            for (var j = 0; j < data["cap"].length; j++) {
                                for (var i = 0; i < listaCap.length; i++) {
                                    if (data["cap"][j]["ID_CAP"] == listaCap[i]) {
                                        option += '<option value="' + listaCap[i] + '">' + data["cap"][j]["cap"] + '</option>';
                                    }
                                }
                            }

                            $("#capAzienda").val(ui.item.cap);
                            //$("#provinciaSede").val(ui.item.provincia);
                            //$("#idProvinciaSede").val(ui.item.idProvincia);
                            $("#idCittaAzienda").val(ui.item.id);
                            if (listaCap.length > 1) {
                                var select = '<select name="cap" id="cap" style="margin-right: 5px">';
                                select += option;
                                select += '</select>';
                                document.getElementById("divCap").innerHTML = select;
                            } else {
                                var input = '<input id="cap" type="text" size="5" style="margin-right: 5px" name="cap">';
                                document.getElementById("divCap").innerHTML = input;
                                $("#cap").val(ui.item.cap);
                            }
                        }
                    });
                },
                focus: function (event, ui) {
                    $("#cittaSede").val(ui.item.label);
                    return false;
                }

            });
        });


        function submit() {
            document.getElementById('formAzienda').submit();
        }
    </script>