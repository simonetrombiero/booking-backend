<?php if (isAdmin()) { ?>
    <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>


        <div class="grid grid-pad">
            <div class="col-1-3">
                <a href="index.php?action=visualizzaAzienda">
                <div class="box textCenter">

                    <p><img src="img/azienda.png"></p>
                    <span class="titleTasti">AZIENDA</span>


                </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=aliquoteList">
                    <div class="box textCenter">
                        <p><img src="img/aliquota.png"></p>
                        <span class="titleTasti">ALIQUOTE</span>
                    </div>
                </a>
            </div>
            <div class="col-1-3">
                <!--<a href="index.php?action=utentiList">-->
                <div class="box textCenter">
                    <p><img src="img/utenti.png"></p>
                    <span class="titleTasti">GESTIONE UTENTI</span>
                </div>
                <!--</a>-->
            </div>
        </div>

        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
          
            <div class="col-1-3">
                <a href="index.php?action=trattamentiList">
                    <div class="box textCenter">
                        <p><img src="img/trattamenti.png"></p>
                        <span class="titleTasti">GESTIONE TRATTAMENTI</span>


                    </div>
                </a>  
            </div>
            
            <div class="col-1-3">
                <a href="index.php?action=categorieList">
                    <div class="box textCenter">
                        <p><img src="img/trattamenti.png"></p>
                        <span class="titleTasti">CATEGORIE TRATTAMENTI</span>


                    </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=calendariList">
                    <div class="box textCenter">
                        <p><img src="img/calendari.png"></p>
                        <span class="titleTasti">GESTIONE CALENDARI</span>
                    </div>
                </a>

            </div>
            <div class="col-1-3">
                <!--                <div class="box textCenter">
                                    <p><img src="img/shop.png"></p>
                                    <span class="titleTasti">MARKETING & SHOP</span>
                                </div>-->
            </div>
        </div>



        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="col-1-3">
                <a href="index.php?action=postazioniList">
                    <div class="box textCenter">
                        <p><img src="img/trattamenti.png"></p>
                        <span class="titleTasti">GESTIONE POSTAZIONI</span>


                    </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=incarichiList">
                    <div class="box textCenter">
                        <p><img src="img/cliente.png"></p>
                        <span class="titleTasti">GESTIONE INCARICHI</span>

                    </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=dipendentiList">
                    <div class="box textCenter">
                        <p><img src="img/dipendenti.png"></p>
                        <span class="titleTasti">GESTIONE DIPENDENTI</span>


                    </div>
                </a>
            </div>
        </div>

        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
          <div class="col-1-3">
                <div class="box textCenter">
                    <p><img src="img/prodotti.png"></p>
                    <span class="titleTasti">GESTIONE PRODOTTI</span>


                </div>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=categorieProdottiList">
                    <div class="box textCenter">
                        <p><img src="img/prodotti.png"></p>
                        <span class="titleTasti">CATEGORIE PRODOTTI</span>

                    </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="">
                    <div class="box textCenter">
                        <p><img src="img/prodotti.png"></p>
                        <span class="titleTasti">MARCHE PRODOTTI</span>


                    </div>
                </a>
            </div>
        </div>
        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="col-1-3">
                <a href="index.php?action=categorieList">
                    <div class="box textCenter">
                        <p><img src="img/prodotti.png"></p>
                        <span class="titleTasti">TIPOLOGIE PRODOTTI</span>

                    </div>
                </a>
            </div>
            <div class="col-1-3">
                <a href="index.php?action=listaFornitori">
                    <div class="box textCenter">
                        <p><img src="img/dipendenti.png"></p>
                        <span class="titleTasti">GESTIONE FORNITORI</span>

                    </div>
                </a>
            </div>
                        <div class="col-1-3">
            <a href="index.php?action=fidelityCard">
                            <div class="box textCenter">
                                <p><img src="img/card.png"></p>
                                <span class="titleTasti">FIDELITY CARD</span>
            
            
                            </div>
                            </a>
                        </div>
        </div>
    <?php } ?>
