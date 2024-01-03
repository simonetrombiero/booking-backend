<?php if (isAdmin()) { ?>
    <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>


        <div class="grid grid-pad">
            <div class="col-1-3">
                <a href="index.php?action=nuovaFidelityCard">
                <div class="box textCenter">

                    <p><img src="img/card.png"></p>
                    <span class="titleTasti">NUOVA TESSERA</span>


                </div>
                </a>
            </div>
             <div class="col-1-3">
                <a href="index.php?action=caricaPuntiFidelityCard">
                <div class="box textCenter">
                    <p><img src="img/card.png"></p>
                    <span class="titleTasti">CARICA PUNTI</span>
                </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=listaFidelityCard">
                    <div class="box textCenter">
                        <p><img src="img/card.png"></p>
                        <span class="titleTasti">ELENCO TESSERE</span>
                    </div>
                </a>
            </div>
           
        </div>

        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            
            <div class="col-1-3">
                <a href="index.php?action=listaMovimentiFidelityCard">
                    <div class="box textCenter">
                        <p><img src="img/card.png"></p>
                        <span class="titleTasti">LISTA MOVIMENTI</span>


                    </div>
                </a>
            </div>
      
            
            <div class="col-1-3">
                <a href="index.php?action=catalogoPremiFidelity">
                    <div class="box textCenter">
                        <p><img src="img/card.png"></p>
                        <span class="titleTasti">CATALOGO PREMI</span>


                    </div>
                </a>
            </div>
            
                <div class="col-1-3">
                <a href="index.php?action=settingFidelityCard">
                    <div class="box textCenter">
                        <p><img src="img/impostazioni.png"></p>
                        <span class="titleTasti">SETTING</span>


                    </div>
                </a>  
            </div>
        </div>



      
       
    <?php } ?>
