<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../../applicazione/js/sign.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    

    <script>
        $(document).ready(function()
        {
            $('#myCanvas').sign({
                resetButton: $('#resetSign'),
                lineWidth: 5,
                height:300,
                width:400
            });
        });
    </script>
    <style>
    
        #myCanvas {
            border:4px solid #444;
            border-radius: 15px;
            background-color: #fafafa;
        }
    
    </style>
    <p>&nbsp;</p>


        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
<!--            <thead>
                <tr>
                    <th style="height: 40px; line-height: 40px; background: #66AACC; text-align: left; padding: 0px 5px; color: #FFF;">Dati Paziente</th>

                </tr>
               
            </thead>-->
            <tbody>
                
                 <tr>
                     <td>Dichiaro di esser stato correttamente informato circa il piano di trattamento proposto, il preventivo di spese e modalità di pagamento, i rischi connessi alla terapia e quelli da mancata terapia.<br>
                         In particolare mi è stato spiegato che eventuali modifiche in corso d'esecuzione mi verranno sottoposte, di volta in volta, per approvazione.<br>
                         Ho chiaramente compreso le finalità del trattamento cui verrò sottoposto/a, le eventuali scelte terapeutiche percorribili nel mio caso i rischi impliciti nel trattamento, le principali caratteristiche funzionali ed estetiche dei manufatti che mi verranno applicati.<br>
                         Sono stato altresì informato/a che per la conservazione nel tempo di una buona salute dentale sono opporture sedute periodiche di controllo clinico/igiene <br>
                         (secondo le istruzioni che ho ricevuto).<br>
                         Pertanto, avendo discusso e compreso il tutto, accetto e autorizzo la Dott.ssa DE LUNA PAOLA al trattamento proposto.
                     </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>Data: <?php echo date("d/m/Y"); ?></td>
                </tr>   
                <tr>
                    <td style="text-align: right">Firma del paziente<br>
                    <canvas id="myCanvas"></canvas>
<input type="button" value="Annulla" id='resetSign'></td>
                </tr>   
            

            </tbody>
        </table>
    
    