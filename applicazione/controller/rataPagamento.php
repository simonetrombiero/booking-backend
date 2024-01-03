<?php

function eliminaRataPagamento(){
    $idRata = getRequest("idRata");
    DAOFactory::getRatapagamentoDAO()->delete($idRata);
    print_r(json_encode("ok"));
}

