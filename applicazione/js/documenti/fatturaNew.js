var modificato = false; 
                            
var qtaTmp = 0;
var importoTmp = 0;
var rowOld = -1;
var arrayProdotti = [];
var clienteSelezionato = null;

function selectNuovaDestinazione(check){
    if(check.checked){
        if(null == document.getElementById("divNuovaDestinazione")){
            var intestazioneCliente = '<div id="divNuovaDestinazione"><br/><select name="destinazioniCliente" id="selectDestinazione" onchange="cambiaDestinazione(this)">';
            //        var destinazioni = JSON.parse(_destinazioni);
            intestazioneCliente += '<option value="">------</option>';
            if(destinazioni != null){
                for(var i=0; i<destinazioni.length; i++){
                    var destinazione = destinazioni[i];
                    intestazioneCliente += '<option value="'+destinazione.id+'">'+destinazione.indirizzo+'</option>';
                }
            }
            intestazioneCliente += '</select>';
            intestazioneCliente += '<div style="margin-top: 5px">';
            intestazioneCliente += '<input type="button" class="art-button" onclick="nuovaDestinazione()" value="Aggiungi Destinazione"><br/>';
            intestazioneCliente += '</div>'
            intestazioneCliente += '</div>'
            $('#divDatiClienteFattura').append(intestazioneCliente);
        }else{
            $("#divNuovaDestinazione").css("display", "block");
        }
    }else{
        $("#divNuovaDestinazione").css("display", "none");
    }
}
    
function cambiaDestinazione(select){
    var idDestinazione = select.value;
    var destinazioneTrovata = false;
    if(destinazioni != null){
        for(var i=0; i<destinazioni.length; i++){
            var destinazione = destinazioni[i];
            if(idDestinazione == destinazione.id){
                var destinazioneCliente = '';
                destinazioneTrovata = true;
                destinazioneCliente += '<div style="font-size: 16px; font-weight: bold">';
                destinazioneCliente += destinazione.destinazione;                 
                destinazioneCliente += "<br/>Cap: "+destinazione.cap;
                destinazioneCliente += "<br/>Indirizzo: "+destinazione.indirizzo;
                destinazioneCliente += "</div>";
                
                //                    destinazioni = ui.item.destinazioni;
                //                var destinazioni = ui.item.destinazioni;
                
                destinazioneCliente += '<div style="margin-top: 5px"><input type="checkbox" id="checkCambioDestinazione" onclick="selectNuovaDestinazione(this)" style="margin-top: 0" ><label style="padding-top: 3px">Cambia Destinazione</label></div>';
                
                document.getElementById("divDatiDestinazioneCliente").innerHTML = destinazioneCliente;
            }
        }
        if(!destinazioneTrovata){
            var primaDestinazioneCliente = '';
            primaDestinazioneCliente += '<div style="font-size: 16px; font-weight: bold">';
            primaDestinazioneCliente += clienteSelezionato.destinazione;                 
            primaDestinazioneCliente += "<br/>Cap: "+clienteSelezionato.cap;
            primaDestinazioneCliente += "<br/>Indirizzo: "+clienteSelezionato.indirizzo;
            primaDestinazioneCliente += "</div>";
                
            //                    destinazioni = ui.item.destinazioni;
            //                var destinazioni = ui.item.destinazioni;
                
            primaDestinazioneCliente += '<div style="margin-top: 5px"><input type="checkbox" id="checkCambioDestinazione" onclick="selectNuovaDestinazione(this)" style="margin-top: 0" ><label style="padding-top: 3px">Cambia Destinazione</label></div>';
                
            document.getElementById("divDatiDestinazioneCliente").innerHTML = primaDestinazioneCliente;
        }
        $("#divNuovaDestinazione").css("display", "none");
    }
}
    
function nuovaDestinazione(){
    $( "#dialog-nuovaDestinazione" ).attr("title","Nuova Destinazione");
    $( "#dialog-nuovaDestinazione" ).dialog({
        open: function() {                         // open event handler
            $(this)                                // the element being dialogged
            .parent()                          // get the dialog widget element
            .find(".ui-dialog-titlebar-close") // find the close button for this dialog
            .hide();                           // hide it
        },
        modal: true,
        width: 600,
        buttons: {
            "Salva": function() {
                var id = document.getElementById('cliente_id').value;
                var destinazione = document.getElementById('destinazioneNuovaDestinazione').value;
                var indirizzo = document.getElementById('indirizzoNuovaDestinazione').value;
                var cap = document.getElementById('capNuovaDestinazione').value;
                var citta = document.getElementById('cittaNuovaDestinazione').value;
                var provincia = document.getElementById('provinciaNuovaDestinazione').value;
                var presso = document.getElementById('pressoNuovaDestinazione').value;
                    
                var nuovaDestinazione = new Array();
                    
                $.ajax({
                    url: 'index.php?action=salvaNuovaDestinazione',
                    dataType: "json",
                    data: {
                        idCliente: id,
                        destinazione: destinazione,
                        indirizzo: indirizzo,
                        cap: cap,
                        citta: citta,
                        provincia: provincia,
                        presso: presso
                    },
                    success: function(data) {
                        if(data == null || data.legth == 0){
                            return;
                        }
                        nuovaDestinazione["id"] = data.id;
                        nuovaDestinazione["destinazione"] = data.destinazione;
                        nuovaDestinazione["indirizzo"] = data.indirizzo;
                        nuovaDestinazione["cap"] = data.cap;
                        nuovaDestinazione["citta"] = data.citta;
                        nuovaDestinazione["provincia"] = data.provincia;
                        nuovaDestinazione["presso"] = data.presso;
                        if(destinazioni == null){
                            destinazioni = new Array();
                        }
                        destinazioni.push(nuovaDestinazione);
                        $('#selectDestinazione').append($('<option>', {
                            value: data.id,
                            text: data.indirizzo
                        }));
                            
                        $("#dialog-nuovaDestinazione").dialog( "close" );
                        document.getElementById('destinazioneNuovaDestinazione').value = "";
                        document.getElementById('indirizzoNuovaDestinazione').value = "";
                        document.getElementById('capNuovaDestinazione').value = "";
                        document.getElementById('cittaNuovaDestinazione').value = "";
                        document.getElementById('provinciaNuovaDestinazione').value = "";
                        document.getElementById('pressoNuovaDestinazione').value = "";
                    }
                });                    
            },
            "Annulla": function() {
                $( this ).dialog( "close" );
                document.getElementById('destinazioneNuovaDestinazione').value = "";
                document.getElementById('indirizzoNuovaDestinazione').value = "";
                document.getElementById('capNuovaDestinazione').value = "";
                document.getElementById('cittaNuovaDestinazione').value = "";
                document.getElementById('provinciaNuovaDestinazione').value = "";
                document.getElementById('pressoNuovaDestinazione').value = "";
            }
        }
    });
}
    
function modificaPagamento(riga){
    var idRiga = riga.id;
    var tabellaPagamenti = document.getElementById('tabellaPagamentiFattura');
    //        var rowCount = tabellaPagamenti.rows.length;
    var trs = tabellaPagamenti.rows;
    var tds = trs[parseInt(idRiga)+1].cells;
        
    document.getElementById("importoPagamento").value = tds[2].innerHTML;
    document.getElementById("dataPagamento").value = tds[1].innerHTML;
        
    $( "#importoPagamento" ).focus();
    $( "#dataPagamento" ).datepicker();
                
    $( "#dialog-modificaPagamento" ).attr("title","Modifica Pagamento");
    $( "#dialog-modificaPagamento" ).dialog({
        open: function() {                         // open event handler
            $(this)                                // the element being dialogged
            .parent()                          // get the dialog widget element
            .find(".ui-dialog-titlebar-close") // find the close button for this dialog
            .hide();                           // hide it
        },
        modal: true,
        width: 400,
        buttons: {
            "Modifica": function() {
                tds[1].innerHTML = document.getElementById("dataPagamento").value;
                tds[2].innerHTML = document.getElementById("importoPagamento").value;
                $( this ).dialog( "close" );
                document.getElementById("dataPagamento").value = '';
                document.getElementById("importoPagamento").value = '';
                modificaSaldo();
            },
            "Annulla": function() {
                document.getElementById("dataPagamento").value = '';
                document.getElementById("importoPagamento").value = '';
                $( this ).dialog( "close" );
            }
        }
    });
}
    
var arrayIdAcconto = new Array();
var vettorePagamenti = new Array();
function aggiungiPagamento(tipo){
    $( "#dataNuovoPagamento" ).datepicker();
    
    if(tipo == 'Acconto'){
        $( "#dialog-aggiungiPagamento" ).attr("title","Inserimento Acconto");
    }else{
        $( "#dialog-aggiungiPagamento" ).attr("title","Inserimento Nuovo Pagamento");
    }
    $( "#dialog-aggiungiPagamento" ).dialog({
        open: function() {                         // open event handler
            $(this)                                // the element being dialogged
            .parent()                          // get the dialog widget element
            .find(".ui-dialog-titlebar-close") // find the close button for this dialog
            .hide();                           // hide it
        },
        modal: true,
        width: 400,
        buttons: {
            "Salva": function() {
                var importo = document.getElementById('importoNuovoPagamento').value;
                var data = document.getElementById('dataNuovoPagamento').value;
                var saldo = document.getElementById('saldoNuovoPagamento');
                var saldato = false;
                var isAcconto = false;
                if(saldo.checked){
                    saldato = true;
                }
                var risorsa = document.getElementById('risorsaNuovoPagamento').value;
                var tabellaPagamenti = document.getElementById('tabellaPagamentiFattura');
                var rowCount = tabellaPagamenti.rows.length-1;
                
                var dataPagamento = data;
                var importoPagamento = number_format(importo, 2, ".", "");
                var isSaldato = false;
                var idPagamento = '';
                
                if(saldato){
                    isSaldato = true;
                }
                
                var risorsaPagamento = risorsa;
                
                if(tipo == 'Acconto'){
                    isAcconto = true;
                }
                
                var rigaTabella = new RigaPagamento(dataPagamento, importoPagamento, isSaldato, risorsaPagamento, isAcconto, idPagamento);
                vettorePagamenti.push(rigaTabella);
                
                document.getElementById('importoNuovoPagamento').value = '';
                document.getElementById('dataNuovoPagamento').value = '';
                document.getElementById('saldoNuovoPagamento');
                document.getElementById('risorsaNuovoPagamento').value = '';
                
                var selezione = document.getElementById("pagamenti").value;

                eliminaPagamentoArray(selezione, null);
                
                if(tipo == 'Acconto'){
                    applicaPagamento(document.getElementById("pagamenti"));
                }
                
                caricaTabella();
                    
                //                var rigaTabella = '<tr id="trPagamento_'+rowCount+'">';
                //                rigaTabella += '<td style="display: none"></td>';
                //                rigaTabella += '<td style="text-align: center">'+data+'</td>';
                //                rigaTabella += '<td style="text-align: right">'+number_format(importo, 2, ".", "")+' €</td>';
                //                    
                //                    
                //                if(saldato){
                //                    //                    rigaTabella += '<td style="text-align: center" ><input type="checkbox" id="pagamento_'+rowCount+'" checked="checked" onclick="modificaSaldoPagamenti()"></td>';
                //                    rigaTabella += '<td style="text-align: center" ><input type="checkbox" id="pagamento_'+rowCount+'" checked="checked" onclick="modificaSaldo()"></td>';
                //                }else{
                //                    //                    rigaTabella += '<td style="text-align: center" ><input type="checkbox" id="pagamento_'+rowCount+'" onclick="modificaSaldoPagamenti()"></td>';
                //                    rigaTabella += '<td style="text-align: center" ><input type="checkbox" id="pagamento_'+rowCount+'" onclick="modificaSaldo()"></td>';
                //                }
                //                if(tipo == 'Acconto'){
                //                    isAcconto = true;
                //                    arrayIdAcconto.push(rowCount);
                //                    rigaTabella += '<td>'+risorsa+' (Acc.)</td>';
                //                }else{
                //                    rigaTabella += '<td>'+risorsa+'</td>';
                //                }
                //                    
                //                rigaTabella +='<td style="text-align: center" ><label style="cursor: pointer; margin-right: 5px" onclick="modificaPagamento(this)" id="'+(rowCount-1)+'">Modifica</label><label style="cursor: pointer" onclick="eliminaPagamento(this)" id="'+(rowCount-1)+'">Elimina</label></td>';
                //                if(isAcconto){
                //                    rigaTabella +='<td style="display: none" >true</td>';
                //                }else{
                //                    rigaTabella +='<td style="display: none" >false</td>';
                //                }
                //                
                //                rigaTabella += '</tr>';
                    
                //                var tabellaPagamenti = document.getElementById('tabellaPagamentiFattura');
                //                modificaSaldo();
                
                //                var rowCount = tabellaPagamenti.rows.length;
                //                var trs = tabellaPagamenti.rows;
                //                var trovataPosizione = false;
                
                //                for(var j=1; j<rowCount; j++){
                //                    var tds = trs[j].cells;
                //                    //                        str_replace("/", "-", tds[1].innerHTML)
                //                    var dateExplode = tds[1].innerHTML.split("/");
                //                    var mkDate = mktime(0, 0, 0, dateExplode[1], parseInt(dateExplode[0]), dateExplode[2]);
                //                        
                //                    var dataAccontoSplit = data.split("/");
                //                    var mkDateAcconto = mktime(0, 0, 0, dataAccontoSplit[1], parseInt(dataAccontoSplit[0]), dataAccontoSplit[2]);
                //                        
                //                    if(mkDateAcconto <= mkDate){
                //                        $("#trPagamento_"+(j-1)).last().before(rigaTabella);
                //                        $( this ).dialog( "destroy" );
                //                        document.getElementById('importoNuovoPagamento').value = '';
                //                        document.getElementById('dataNuovoPagamento').value = '';
                //                        document.getElementById('saldoNuovoPagamento');
                //                        document.getElementById('risorsaNuovoPagamento').value = '';
                //                        //                        modificaSaldoPagamenti();
                //                        modificaSaldo();
                //                        return;
                //                    }
                //                }
                //                $("#tabellaPagamentiFattura").append(rigaTabella);
                //                document.getElementById('importoNuovoPagamento').value = '';
                //                document.getElementById('dataNuovoPagamento').value = '';
                //                document.getElementById('saldoNuovoPagamento');
                //                document.getElementById('risorsaNuovoPagamento').value = '';
                $( this ).dialog( "destroy" );
            //                //                modificaSaldoPagamenti();
            //                modificaSaldo();
            },
            "Annulla": function() {
                $( this ).dialog( "destroy" );
            }
        }
    });
}

var destinazioni = null;
$(function(){
    $("#cliente").autocomplete({
        source: function( request, response ) {
            
            $.ajax({
                url: "index.php?action=autocompleteCliente&type=denominazione",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    //                        alert(data)
                    if(data == null || data == 'null'){
                        document.getElementById("cliente_id").value = '';
                        document.getElementById("divDatiCliente").innerHTML = '';
                        document.getElementById("divDatiDestinazioneCliente").innerHTML = '';
                        $("#cliente").removeClass( "ac_loading" );
                        return;
                    }
                    response($.map(data, function(item) {
                        var label = '';
                        if(item.ragioneSociale == ''){
                            if(item.denominazione == ''){
                                label = item.cognome + " " + item.nome;
                            }else{
                                label = item.denominazione;
                            }                            
                        }else{
                            label = item.ragioneSociale;
                        }
                        return {
                            label: label,
                            id: item.id,
                            denominazione: item.denominazione,
                            codiceFiscale: item.codiceFiscale,
                            cap: item.cap,
                            destinazioni: item.destinazioni
                        };
                    }));
                }
                    
            });
        },
        select: function( event, ui ) {
            var intestazioneCliente = '';
            var destinazioneCliente = '';
                
            intestazioneCliente += '<div style="font-size: 16px; font-weight: bold">';
            intestazioneCliente += ui.item.denominazione;                 
            intestazioneCliente += "<br/>CF: "+ui.item.codiceFiscale;
            intestazioneCliente += "</div>";
                
            destinazioneCliente += '<div style="font-size: 16px; font-weight: bold">';
            destinazioneCliente += "<br/>Cap: "+ui.item.cap;
            destinazioneCliente += "<br/>Indirizzo: "+ui.item.indirizzo;
            destinazioneCliente += '</div>';
            
            clienteSelezionato = ui.item;
                
            destinazioni = ui.item.destinazioni;
            //                var destinazioni = ui.item.destinazioni;
                
            destinazioneCliente += '<div style="margin-top: 5px"><input type="checkbox" id="checkCambioDestinazione" onclick="selectNuovaDestinazione(this)" style="margin-top: 0" ><label style="padding-top: 3px">Cambia Destinazione</label></div>';
                
            document.getElementById("divDatiCliente").innerHTML = intestazioneCliente;
            document.getElementById("divDatiDestinazioneCliente").innerHTML = destinazioneCliente;
            document.getElementById("cliente_id").value = ui.item.id;
        },
        width: 200,
        max: 10
    });
    
    //FORNITORE
    $("#fornitore").autocomplete({
        source: function( request, response ) {
            
            $.ajax({
                url: "index.php?action=autocompleteFornitore&type=denominazione",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    //                        alert(data)
                    if(data == null || data == 'null'){
                        document.getElementById("fornitore_id").value = '';
                        document.getElementById("divDatiFornitore").innerHTML = '';
                        document.getElementById("divDatiDestinazioneFornitore").innerHTML = '';
                        $("#fornitore").removeClass( "ac_loading" );
                        return;
                    }
                    response($.map(data, function(item) {
                        var label = '';
                        if(item.ragioneSociale == ''){
                            if(item.denominazione == ''){
                                label = item.cognome + " " + item.nome;
                            }else{
                                label = item.denominazione;
                            }                            
                        }else{
                            label = item.ragioneSociale;
                        }
                        return {
                            label: label,
                            id: item.id,
                            denominazione: item.ragioneSociale,
                            codiceFiscale: item.fiscale,
                            cap: item.cap,
                            indirizzo: item.indirizzo
                        };
                    }));
                }
                    
            });
        },
        select: function( event, ui ) {
            var intestazioneCliente = '';
            var destinazioneCliente = '';
                
            intestazioneCliente += '<div style="font-size: 16px; font-weight: bold">';
            intestazioneCliente += ui.item.denominazione;                 
            intestazioneCliente += "<br/>CF: "+ui.item.codiceFiscale;
            intestazioneCliente += "</div>";
                
            destinazioneCliente += '<div style="font-size: 16px; font-weight: bold">';
            destinazioneCliente += "<br/>Cap: "+ui.item.cap;
            destinazioneCliente += "<br/>Indirizzo: "+ui.item.indirizzo;
            destinazioneCliente += '</div>';
            
            clienteSelezionato = ui.item;
                
            destinazioni = ui.item.indirizzo;
            //                var destinazioni = ui.item.destinazioni;
                
            //            destinazioneCliente += '<div style="margin-top: 5px"><input type="checkbox" id="checkCambioDestinazione" onclick="selectNuovaDestinazione(this)" style="margin-top: 0" ><label style="padding-top: 3px">Cambia Destinazione</label></div>';
                
            document.getElementById("divDatiFornitore").innerHTML = intestazioneCliente;
            document.getElementById("divDatiDestinazioneFornitore").innerHTML = destinazioneCliente;
            document.getElementById("fornitore_id").value = ui.item.id;
        },
        width: 200,
        max: 10
    });
});
    
function controllaCliente(input){
    var value = input.value;
    if(value == ''){
        document.getElementById("cliente_id").value = '';
        document.getElementById("divDatiCliente").innerHTML = '';
        document.getElementById("divDatiDestinazioneCliente").innerHTML = '';
    }
}
    
function controllaFornitore(input){
    var value = input.value;
    if(value == ''){
        document.getElementById("fornitore_id").value = '';
        document.getElementById("divDatiFornitore").innerHTML = '';
        document.getElementById("divDatiDestinazioneFornitore").innerHTML = '';
    }
}
function eliminaPagamento(riga){
        
    $( "#dialog-eliminaPagamento" ).attr("title","Elimina Pagamento");
    $( "#dialog-eliminaPagamento" ).dialog({
        open: function() {                         // open event handler
            $(this)                                // the element being dialogged
            .parent()                          // get the dialog widget element
            .find(".ui-dialog-titlebar-close") // find the close button for this dialog
            .hide();                           // hide it
        },
        modal: true,
        width: 600,
        buttons: {
            "Elimina": function() {
                var idRiga = riga.id;
//                $("#trPagamento_"+idRiga).remove();
//                vettorePagamenti.splice(idRiga,1);
                eliminaPagamentoArray(null, idRiga);
                $( this ).dialog( "close" );
                
                modificaSaldo();
            },
            "Annulla": function() {
                $( this ).dialog( "close" );
            }
        }
    });
}

function RigaPagamento(data, importo, isSaldato, risorsa, isAcconto, idPagamento){
    var dateExplode = data.split("/");
    var mkDate = mktime(0, 0, 0, dateExplode[1], parseInt(dateExplode[0]), dateExplode[2]);
    this.data = mkDate;
    this.importo = importo;
    this.isSaldato = isSaldato;
    this.risorsa = risorsa;
    this.isAcconto = isAcconto;
    this.idPagamento = idPagamento;
}

//Array.prototype.removeEl = function(el) {
//    this.splice(vettorePagamenti.indexOf(el), 1);
//};

function confronta(a,b){
    if (a.data > b.data) {
        return 1;
    }
    else {
        if (a.data < b.data) {
            return -1;
        }
        else {
            return 0;
        }
    }
}

function eliminaPagamentoArray(idPagamento, indice){
    if(idPagamento != null){
        for(var i=0; i<vettorePagamenti.length; i++) {
            var pagamento = vettorePagamenti[i];
            if(idPagamento == pagamento.idPagamento){
                //                        alert("trovata occorrenza");
                //                        delete vettorePagamenti[i];
                vettorePagamenti.splice(i,1);
                i--;
            }
        }
    }else if(indice != null){
        vettorePagamenti.splice(indice,1);
    }    
}

function caricaTabella(){
    var tabellaPagamenti = document.getElementById('tabellaPagamentiFattura');
    var rowCount = tabellaPagamenti.rows.length;
    
    for(var i = 1; i<rowCount; i++) {
        tabellaPagamenti.deleteRow(i);                        
        rowCount--;
        i--;
    }
    
    vettorePagamenti.sort(confronta); 
    
    for(i = 0; i < vettorePagamenti.length; i++ ){
        var pagamento = vettorePagamenti[i];
        var rigaTabella = '<tr id="trPagamento_'+i+'">';
        rigaTabella += '<td style="display: none">'+pagamento.idPagamento+'</td>';
        rigaTabella += '<td style="text-align: center">'+date("d/m/Y", pagamento.data)+'</td>';
        rigaTabella += '<td style="text-align: right">'+pagamento.importo+' €</td>';
        if(pagamento.isSaldato){
            rigaTabella += '<td style="text-align: center" ><input type="checkbox" id="pagamento_'+i+'" checked="checked" onclick="saldaPagamento('+i+')"></td>';
        }else{
            rigaTabella += '<td style="text-align: center" ><input type="checkbox" id="pagamento_'+i+'" onclick="saldaPagamento('+i+')"></td>';
        }
        if(pagamento.isAcconto){
            //                    isAcconto = true;
            //                    arrayIdAcconto.push(rowCount);
            rigaTabella += '<td>'+pagamento.risorsa+' (Acc.)</td>';
        }else{
            rigaTabella += '<td>'+pagamento.risorsa+'</td>';
        }
        
        rigaTabella +='<td style="text-align: center" ><label style="cursor: pointer; margin-right: 5px" onclick="modificaPagamento(this)" id="'+i+'">Modifica</label><label style="cursor: pointer" onclick="eliminaPagamento(this)" id="'+i+'">Elimina</label></td>';
        if(pagamento.isAcconto){
            rigaTabella +='<td style="display: none" >true</td>';
        }else{
            rigaTabella +='<td style="display: none" >false</td>';
        }
        
        rigaTabella += '</tr>';
        $("#tabellaPagamentiFattura").append(rigaTabella);
    }
    
    modificaSaldo();
}

function saldaPagamento(numeroPagamento){
    for(i = 0; i < vettorePagamenti.length; i++ ){
        if(numeroPagamento == i){
            var pagamento = vettorePagamenti[i];
            if(pagamento.isSaldato){
                pagamento.isSaldato = false;
            }else{
                pagamento.isSaldato = true;
            }            
        }
    }
    modificaSaldo();
}

function modificaSaldo(){
    var importoPagamenti = 0;
    var saldato = 0;
    var importoDaSaldare = number_format(parseFloat(getDataCell()), 2, ".", "");
    var testoDifferenza = "";
    
    if(null != document.getElementById('testoDifferenza')){
        $('#testoDifferenza').remove();
    }
    
    for(var i = 0; i < vettorePagamenti.length; i++ ){
        var pagamento = vettorePagamenti[i];
        importoPagamenti += parseFloat(pagamento.importo);
        if(pagamento.isSaldato){
            saldato += parseFloat(pagamento.importo);
        }
    }
        
    document.getElementById('importoSaldato').innerHTML = number_format(saldato, 2, ".", "");
        
    var differenza = number_format((importoDaSaldare - saldato), 2, ".", "");
        
    if(differenza < 0){
        document.getElementById('importoDaSaldare').innerHTML = number_format(0, 2, ".", "");
    }else{
        document.getElementById('importoDaSaldare').innerHTML = number_format(differenza, 2, ".", "");
    }
    
    importoPagamenti = number_format(importoPagamenti, 2, ".", "");
    
    
    if(importoPagamenti > importoDaSaldare && (importoPagamenti - importoDaSaldare) != 0){
        var eccedenza = importoPagamenti - importoDaSaldare;
        testoDifferenza += '<div id="testoDifferenza">';
        testoDifferenza += '<div class="cleared"></div>';
        testoDifferenza += '<div style="font-weight: bold; margin-top: 5px">'
        testoDifferenza += '<div>';
        testoDifferenza += '<div style="width: 130px; float: left; color: green">';
        testoDifferenza += 'Eccedenza';
        testoDifferenza += '</div>';
        testoDifferenza += '<div style="width: 50px; float: left; text-align: right; color: green" id="importoEccedenza">';
        testoDifferenza += number_format(eccedenza, 2, ".", "");
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
    }else if(importoPagamenti < importoDaSaldare && (importoPagamenti - importoDaSaldare)){
        var abbuono = importoDaSaldare - importoPagamenti;
        testoDifferenza += '<div id="testoDifferenza">';
        testoDifferenza += '<div class="cleared"></div>';
        testoDifferenza += '<div style="font-weight: bold; margin-top: 5px">'
        testoDifferenza += '<div>';
        testoDifferenza += '<div style="width: 130px; float: left; color: red">';
        testoDifferenza += 'Abbuono';
        testoDifferenza += '</div>';
        testoDifferenza += '<div style="width: 50px; float: left; text-align: right; color: red" id="importoAbbuono">';
        testoDifferenza += number_format(abbuono, 2, ".", "");
        testoDifferenza += '</div>';          
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
    }
    
    $('#importiFattura').append(testoDifferenza);
    
}
    
function modificaSaldo2(){
    var tabellaPagamenti = document.getElementById('tabellaPagamentiFattura');
    var rowCount = tabellaPagamenti.rows.length;
    var celle = tabellaPagamenti.getElementsByTagName('td');
    var trs = tabellaPagamenti.rows;
    var saldato = 0;
    var totaleSaldato = 0;
    var importoDaSaldare = number_format(parseFloat(getDataCell()), 2, ".", "");
        
    var sommaPagamenti = 0;
    if(null != document.getElementById('testoDifferenza')){
        $('#testoDifferenza').remove();
    }
    
    var importoAcconto = 0;
    var arraySaldato = new Array();
    
    //    alert(rowCount);
    
    for(var i=0; i<rowCount-1; i++) {
        var idCheck = trs[(i+1)].id.split("_");
        var check = document.getElementById("pagamento_"+idCheck[1]);
        var tds = trs[(i+1)].cells;
        if(check.checked){
            if(in_array(idCheck[1], arrayIdAcconto) || tds[6].innerHTML == "true"){
                importoAcconto += parseFloat(tds[2].innerHTML);
            }else{
                arraySaldato.push(idCheck[1]);
                saldato += parseFloat(tds[2].innerHTML);
            }
            
        }
        //        alert(tds[2].innerHTML);
        sommaPagamenti += parseFloat(tds[2].innerHTML);
    }
    
    totaleSaldato = number_format(saldato+importoAcconto, 2, ".", "");
    
    sommaPagamenti = number_format(sommaPagamenti-importoAcconto, 2, ".", "");
    
    applicaPagamento(document.getElementById("pagamenti"), number_format((importoDaSaldare-importoAcconto), 2, ".", ""), arraySaldato);
    //    if(importoAcconto > 0){
    //        number_format((importoDaSaldare-importoAcconto), 2, ".", "");
    //    }
    
    document.getElementById('importoSaldato').innerHTML = number_format(totaleSaldato, 2, ".", "");
        
    var differenza = number_format((importoDaSaldare - totaleSaldato), 2, ".", "");
        
    if(differenza < 0){
        document.getElementById('importoDaSaldare').innerHTML = number_format(0, 2, ".", "");
    }else{
        document.getElementById('importoDaSaldare').innerHTML = number_format(differenza, 2, ".", "");
    }
    
    var testoDifferenza = '';
    
    //    alert("importo Acconto = "+importoAcconto+"; somma pagamenti = "+sommaPagamenti+"; importo da saldare = "+importoDaSaldare);
        
    if(sommaPagamenti > importoDaSaldare && (sommaPagamenti - importoDaSaldare) != 0){
        var eccedenza = sommaPagamenti - importoDaSaldare;
        testoDifferenza += '<div id="testoDifferenza">';
        testoDifferenza += '<div class="cleared"></div>';
        testoDifferenza += '<div style="font-weight: bold; margin-top: 5px">'
        testoDifferenza += '<div>';
        testoDifferenza += '<div style="width: 130px; float: left; color: green">';
        testoDifferenza += 'Eccedenza';
        testoDifferenza += '</div>';
        testoDifferenza += '<div style="width: 50px; float: left; text-align: right; color: green" id="importoEccedenza">';
        testoDifferenza += number_format(eccedenza, 2, ".", "");
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
    }else if(sommaPagamenti < importoDaSaldare && (sommaPagamenti - importoDaSaldare) != 0){
        var abbuono = importoDaSaldare - sommaPagamenti;
        testoDifferenza += '<div id="testoDifferenza">';
        testoDifferenza += '<div class="cleared"></div>';
        testoDifferenza += '<div style="font-weight: bold; margin-top: 5px">'
        testoDifferenza += '<div>';
        testoDifferenza += '<div style="width: 130px; float: left; color: red">';
        testoDifferenza += 'Abbuono';
        testoDifferenza += '</div>';
        testoDifferenza += '<div style="width: 50px; float: left; text-align: right; color: red" id="importoAbbuono">';
        testoDifferenza += number_format(abbuono, 2, ".", "");
        testoDifferenza += '</div>';          
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
        testoDifferenza += '</div>';
    }
    if(testoDifferenza != ''){
        $('#importiFattura').append(testoDifferenza);
    }   
}
                                                        
var container = $("#dataTable");

container.handsontable({
    startRows: 1,
    startCols: 1,
    minSpareRows: 1,
    autoWrapRow: true,
    //    colHeaders: true,
    contextMenu: true,
    currentRowClassName: 'currentRow',
    currentColClassName: 'currentCol',
    colWidths: [65, 250, 20, 20, 40, 40, 40, 40, 50, 50, 5],
    colHeaders: ['Codice', 'Descrizione', 'UM', 'Qta', 'Prezzo Uni', 'Sconto 1', 'Sconto 2', 'Sconto 3', 'Totale', 'Iva', 'id'],
    removeRowPlugin: true,
    
    columns: [
    {
        type: {
            editor: Handsontable.AutocompleteEditor
        },
        options: {
            items: 10
        }, //`options` overrides `defaults` defined in bootstrap typeahead
        source: function (query, process) {
            $.ajax({
                url: 'index.php?action=autocompleteProdotto',
                dataType: 'json',
                data: {
                    term: query,
                    type: 'codice'                                                    
                },
                success: function (response) {
                    arrayProdotti = response;
                    var arraytmp = [];
                    if(response != null){
                        for(var i = 0; i<response.length; i++){
                            arraytmp[i] = response[i].codice;
                        }
                    }
                    process(arraytmp);
                }
            });
        },
        strict: false
    },
    {},
    {},
    {
        renderer: numberValidator, 
        allowInvalid: false
    },

    {
        renderer: numberValidator, 
        allowInvalid: false
    },

    {
        renderer: numberValidator, 
        allowInvalid: false
    },

    {
        renderer: numberValidator, 
        allowInvalid: false
    },

    {
        renderer: numberValidator, 
        allowInvalid: false
    },

    {
        readOnly: true
    },
    {
    //        type: 'handsontable',
    //        handsontable: {
    //            colHeaders: false,
    //            data: arrayTmpValore,
    //            renderer: selectRenderer
    //        }        
    },

    {
        renderer: hideRenderer
    }
    ],
    onBeforeChange: function (data, source) {
        var instance = container.data('handsontable')
        , i
        , ilen = data.length
        , c
        , clen = instance.colCount
        , rowColumnSeen = {}
        , rowsToFill = {};
            
                                    
        var rowTmp = data[0][0];
        if(rowOld != rowTmp){
            qtaTmp = 0;
            importoTmp = 0;
            rowOld = rowTmp;
        }
                                    
        for (var i = 0, ilen = data.length; i < ilen; i++) {
                                        
            if(data[i][1] == 0){
                var codiceProdotto = data[i][3];
                if(null != arrayProdotti){
                    for(var j=0; j<arrayProdotti.length; j++){
                        if(arrayProdotti[j].codice == codiceProdotto){
                            data.push([data[i][0], 1, null, arrayProdotti[j].descrizione]);
                            data.push([data[i][0], 2, null, arrayProdotti[j].um]);
                            data.push([data[i][0], 3, null, 1]);
                            if(null != document.getElementById('cliente_id')){
                                data.push([data[i][0], 4, null, arrayProdotti[j].prezzoVendita]);
                            }else if(null != document.getElementById('fornitore_id')){
                                data.push([data[i][0], 4, null, arrayProdotti[j].prezzoAcquisto]);
                            }
                            
                            data.push([data[i][0], 5, null, "0"]);
                            data.push([data[i][0], 6, null, "0"]);
                            data.push([data[i][0], 7, null, "0"]);
                            if(null != document.getElementById('cliente_id')){
                                data.push([data[i][0], 8, null, arrayProdotti[j].prezzoVendita]);
                            }else if(null != document.getElementById('fornitore_id')){
                                data.push([data[i][0], 8, null, arrayProdotti[j].prezzoAcquisto]);
                            }
                            for(var k=0; k<arrayTmp.length; k++){
                                if(arrayTmp[k].id == arrayProdotti[j].idAliquota){
                                    data.push([data[i][0], 9, null, parseInt(arrayTmp[k].valore)]);
                                }
                                                        
                            }
                            data.push([data[i][0], 10, null, arrayProdotti[j].id]);
                        }
                    }    
                }
            }                                    
                                        
            if(data[i][1] == 3){
                if(importoTmp != 0){
                    importoTmp = 0;
                }
                                            
                qtaTmp = 0;
                if (isNaN(data[i][3])) {
                    data[i][2] = 0;                                               
                }else{
                    qtaTmp = data[i][3];
                }
            }
            if(data[i][1] == 4){
                importoTmp = 0;
                                            
                if (isNaN(data[i][3])) {
                    data[i][2] = 0;                                                   
                }else{
                    importoTmp = data[i][3];
                }
            }
                                            
        }                                    
    },
    afterChange: function (data, source) {
        if(data != null){
            var instance = container.data('handsontable')
            , i
            , ilen = data.length
            , c
            , clen = instance.colCount
            , rowColumnSeen = {}
            , rowsToFill = {};
                
                                            
            if(data[0][1] == 3 || data[0][1] == 4){
                var rowTot = parseFloat(instance.getDataAtCell(data[0][0], 3)) * parseFloat(instance.getDataAtCell(data[0][0], 4));
                if(isNaN(rowTot)){
                    rowTot = 0;
                }
                instance.setDataAtCell(data[0][0], 8, rowTot);
            }
                                        
            if(data[0][1] == 5 || data[0][1] == 6 || data[0][1] == 7){
                var sconto = parseFloat(data[0][3]);
                var totale = parseFloat(instance.getDataAtCell(data[0][0], 8));
                                            
                if(isNaN(sconto)){
                    var col = -1;
                    var rowTot = parseFloat(instance.getDataAtCell(data[0][0], 3)) * parseFloat(instance.getDataAtCell(data[0][0], 4));
                    if(isNaN(rowTot)){
                        rowTot = 0;
                    }
                    instance.setDataAtCell(data[0][0], 8, rowTot);
                                                
                    if(data[0][1] == 5){
                        col = 5;
                    }else if(data[0][1] == 6){
                        col = 6;
                    }else if(data[0][1] == 7){
                        col = 7;
                    }
                    instance.setDataAtCell(data[0][0], col, 0);
                }else{
                    var importoScontato = totale * (1-(sconto/100));
                    instance.setDataAtCell(data[0][0], 8, importoScontato);
                }
            }
        }
    }
});
                            
function myAutocompleteRenderer(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.AutocompleteCell.renderer.apply(this, arguments);
    td.style.fontStyle = 'italic';
    td.title = 'Type to show the list of options';
}
                            
function numberValidator(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.TextCell.renderer.apply(this, arguments);
    if(isNaN(value)){
        $(td).attr("class","htInvalid");
        $(td).css("color","#ffffff");
    }else{
        getDataCell();   
    }
};

function selectRenderer(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.TextCell.renderer.apply(this, arguments);
    $('#dataTable td:nth-child(10)').css("width","100px");
//    $('#dataTable td:nth-child(11),th:nth-child(11)').hide();
    
};
    
function hideRenderer(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.TextCell.renderer.apply(this, arguments);
    $('#dataTable td:nth-child(12),th:nth-child(12)').hide();
};
                            
function totaleRenderer(instance, td, row, col, prop, value, cellProperties) {
    if(!modificato){
                                    
        var ht = $('#dataTable').handsontable('getInstance');
                                    
        if(instance.getDataAtCell(row, 3) != null && instance.getDataAtCell(row, 3) != '' && !isNaN(instance.getDataAtCell(row, 3))){
            if(instance.getDataAtCell(row, 4) != null && instance.getDataAtCell(row, 4) != '' && !isNaN(instance.getDataAtCell(row, 4))){
                var totaleRiga = parseInt(instance.getDataAtCell(row, 3)) * parseInt(instance.getDataAtCell(row, 4));
                                            
                arguments[5] = totaleRiga;
                                            
                instance.setDataAtCell(row, col, totaleRiga);
                getDataCell();
            }
                                    
        }
        Handsontable.TextCell.renderer.apply(this, arguments);
    }
                                
                                
};
                            
function getDataCell(){
    var ht = $('#dataTable').data('handsontable');
    var imponibile = 0;
    var totaleIva = 0;
    for(var i =0 ; i < ht.getDataAtCol(8).length; i++){
        if(ht.getDataAtCell(i, 8) != null && ht.getDataAtCell(i, 8) != '' && !isNaN(ht.getDataAtCell(i, 8))){
            var valoreIva = ht.getDataAtCell(i, 9);
            var ivaTmp = parseFloat(ht.getDataAtCell(i, 8)) * (valoreIva/100);
            imponibile = imponibile + parseFloat(ht.getDataAtCell(i, 8));
            totaleIva = totaleIva + parseFloat(ivaTmp);
        }
                            
    }
    document.getElementById('imponibile').value = imponibile.toFixed(2);
    document.getElementById('totaleIva').value = totaleIva.toFixed(2);
    var totaleFattura = imponibile + totaleIva;
    document.getElementById('totaleFattura').value = totaleFattura.toFixed(2);
        
    document.getElementById('importoDaSaldare').innerHTML = totaleFattura.toFixed(2);
    document.getElementById('importoSaldato').innerHTML = "0.00";
        
    aggiornaTabellaRiepilogoIva()
    return totaleFattura;
}
            
    
function aggiornaTabellaRiepilogoIva(){
    var arrayTabellaIva = [];
    var tabella = document.getElementById('tabellaRiepilogoIva');
    var rowCount = tabella.rows.length;
    for(var i=1; i<rowCount; i++) {
        tabella.deleteRow(i);
        rowCount--;
        i--;
    }
    var numRows = $('#dataTable').handsontable('countRows');
    var ht = $('#dataTable').data('handsontable');
        
    for(var i = 0; i<numRows-1; i++){
        var imponibile = parseFloat(ht.getDataAtCell(i, 8));
        var aliquota = parseFloat(ht.getDataAtCell(i, 9));
        if(!isNaN(imponibile) || !isNaN(aliquota)){
            if(arrayTabellaIva[aliquota] != null){
                var imponibileTmp = arrayTabellaIva[aliquota].imponibile; 
                var nuovoImponibile = imponibileTmp+imponibile;
                var importoIva = nuovoImponibile * (aliquota/100);
                arrayTabellaIva[aliquota].aliquotaIva = aliquota;
                arrayTabellaIva[aliquota].imponibile = nuovoImponibile;
                arrayTabellaIva[aliquota].importoIva = importoIva;
            }else{
                var importoIva = imponibile * (aliquota/100);
                arrayTabellaIva[aliquota] = {
                    aliquotaIva : aliquota, 
                    imponibile : imponibile, 
                    importoIva : importoIva
                };
            }
        }
    }
            
    for (var key in arrayTabellaIva) {
        var rigaTabella = '<tr><td style="text-align: right">'+arrayTabellaIva[key].aliquotaIva+' %</td><td style="text-align: right">'+arrayTabellaIva[key].imponibile.toFixed(2)+' &euro;</td><td style="text-align: right">'+arrayTabellaIva[key].importoIva.toFixed(2)+' &euro;</td></tr>'
        $('#tabellaRiepilogoIva').append(rigaTabella);
    }        
}
    
var parent = container.parent();
var handsontable = container.data('handsontable');
parent.find('button[name=save]').click(function () {
    var messaggio = '';
    if(handsontable.getData().length > 1){
        for(var t=0; t<handsontable.getData().length-1; t++){
            var riga = handsontable.getData()[t]
            for(var k=0; k<riga.length-2; k++){
                var cella = riga[k];
                if(cella == ''){
                    messaggio = "La riga "+(t+1)+" presenta dati incompleti!";
                    visualizzaMessaggioErrore(messaggio);
                    return;
                }
            }
        }
        var numero = document.getElementById('numeroFattura').value;
        var numerazioneFattura = document.getElementById('numerazioneFattura').value;
        
        var idSoggetto = null
        var isCliente = false;
        if(null != document.getElementById('cliente_id')){
            idSoggetto = document.getElementById('cliente_id').value;
            isCliente = true;
        }else if(null != document.getElementById('fornitore_id')){
            idSoggetto = document.getElementById('fornitore_id').value;
        }
                
        if(numerazioneFattura == ''){
            messaggio = "Inserire una numerazione valida per il documento";
            visualizzaMessaggioErrore(messaggio);
            return;
        }
        
        if(idSoggetto == '' && isCliente){
            messaggio = "Nessun cliente selezionato!";
            visualizzaMessaggioErrore(messaggio);
            return;
        }else if(idSoggetto == '' && !isCliente){
            messaggio = "Nessun fornitore selezionato!";
            visualizzaMessaggioErrore(messaggio);
            return;
        }
        
        var pagamentiFattura = document.getElementById("pagamenti").value;
        
        if(pagamentiFattura == ''){
            messaggio = "Nessun pagamento selezionato!";
            visualizzaMessaggioErrore(messaggio);
            return;
        }
        
        var dataFattura = document.getElementById('dataFattura').value;
        var tabellaPagamenti = document.getElementById('tabellaPagamentiFattura');
        var imponibileFattura = document.getElementById('imponibile').value;
        var totaleIva = document.getElementById('totaleIva').value;
        var totaleFattura = document.getElementById('totaleFattura').value;
        var note = document.getElementById('note').value;
        
        var rowCount = tabellaPagamenti.rows.length;
        var righeTabella = '';
        var arrayTabella = {};
        for(var i=1; i<rowCount; i++) {
            var arrayTabellaTmp = {};
            var riga = tabellaPagamenti.rows[i]
            var celleRiga = riga.cells;// tabellaPagamenti.getElementsByTagName('td');
            
            arrayTabellaTmp["id"] = celleRiga[0].innerHTML;
            arrayTabellaTmp["data"] = celleRiga[1].innerHTML;
            arrayTabellaTmp["importo"] = celleRiga[2].innerHTML;
            var check = document.getElementById('pagamento_'+(i-1));
            if(check.checked){
                arrayTabellaTmp["saldato"] = 1;
            }else{
                arrayTabellaTmp["saldato"] = 0;
            }
            
            arrayTabellaTmp["risorsa"] = celleRiga[4].innerHTML;
            arrayTabella[(i-1)] = arrayTabellaTmp;
        }
        var selectDestinazione = '';
        if(null != document.getElementById('selectDestinazione')){
            selectDestinazione = document.getElementById('selectDestinazione').value;    
        }
        
        var abbuono = 0;
        var eccedenza = 0;
        if(null != document.getElementById("importoEccedenza")){
            eccedenza = parseFloat(document.getElementById("importoEccedenza").innerHTML);
        }
        if(null != document.getElementById("importoAbbuono")){
            abbuono = parseFloat(document.getElementById("importoAbbuono").innerHTML);
        }
        
        //        var jsonArray = json_encode(arrayTabella);
        $.ajax({
            url: "index.php?action=salvaFattura",
            data: {
                "pagamento": json_encode(arrayTabella),
                "numero": numero,
                "numerazioneFattura": numerazioneFattura,
                "dataFattura": dataFattura,
                "idSoggetto": idSoggetto,
                "isCliente": isCliente,
                "tipoDocumento": tipoDocumento,
                "imponibileFattura": imponibileFattura,
                "totaleIva": totaleIva,
                "totaleFattura": totaleFattura,
                "idPagamento": document.getElementById("pagamenti").value,
                "totaleDaSaldare": parseFloat(document.getElementById("importoDaSaldare").innerHTML),
                "totaleSaldato": parseFloat(document.getElementById("importoSaldato").innerHTML),
                "eccedenza": eccedenza,
                "abbuono": abbuono,
                "note": note,
                //                "nuovaDestinazione": document.getElementById('checkCambioDestinazione').checked,
                //                "destinazioneNuovaDestinazione": document.getElementById('destinazioneNuovaDestinazione').value,
                //                "indirizzoNuovaDestinazione": document.getElementById('indirizzoNuovaDestinazione').value,
                //                "capNuovaDestinazione": document.getElementById('capNuovaDestinazione').value,
                //                "cittaNuovaDestinazione": document.getElementById('cittaNuovaDestinazione').value,
                //                "provinciaNuovaDestinazione": document.getElementById('provinciaNuovaDestinazione').value,
                //                "pressoNuovaDestinazione": document.getElementById('pressoNuovaDestinazione').value,
                "selectDestinazione": selectDestinazione,
                "data": handsontable.getData()
            }, //returns all cells' data
            dataType: 'json',
            type: 'POST',
            success: function (res) {
                window.location.href="index.php?action=listaFatture&tipo="+tipoDocumento;
            },
            error: function () {
                   
            }
        });
    }else{
        messaggio = "Impossibile salvare il documento! Nessun prodotto inserito";
        visualizzaMessaggioErrore(messaggio);
    }
});

function visualizzaMessaggioErrore(messaggio){
    document.getElementById("messageErrorDialog").innerHTML = messaggio;
    
    $( "#messageErrorDialog" ).dialog({
        open: function() {                         // open event handler
            $(this)                                // the element being dialogged
            .parent()                          // get the dialog widget element
            .find(".ui-dialog-titlebar-close") // find the close button for this dialog
            .hide();                           // hide it
        },
        modal: true,
        width: 600,
        buttons: {
            "Ok": function() {
                $( this ).dialog( "close" );
            }
        }
    });
}