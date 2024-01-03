
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link href="../../_firma/jqueryUI/css/jquery.signature.css" rel="stylesheet">
<style>
    .kbw-signature { width: 400px; height: 200px; }
</style>
<!--[if IE]>
<script src="excanvas.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="../../_firma/jqueryUI/js/jquery.signature.js"></script>

<h1>jQuery UI Signature</h1>
<p>This page demonstrates the very basics of the
    jQuery UI Signature plugin
    It contains the minimum requirements for using the plugin and
    can be used as the basis for your own experimentation.</p>
<p>For more detail see the page.</p>
<p>Default signature:</p>
<div id="sig"></div>
<div id="sig2"></div>
<p style="clear: both;">
    <button id="disable">Disable</button> 
    <button id="clear">Clear</button> 
    <button id="json">To JSON</button>
    <button id="svg">To SVG</button>
</p>


<script>
    $(function () {
        var sig = $('#sig').signature();
        var sig2 = $('#sig2').signature();
        $('#disable').click(function () {
            var disable = $(this).text() === 'Disable';
            $(this).text(disable ? 'Enable' : 'Disable');
            sig.signature(disable ? 'disable' : 'enable');
        });
        $('#clear').click(function () {
            sig.signature('clear');
        });
        $('#json').click(function () {
            alert(sig.signature('toJSON'));
        });
        $('#svg').click(function () {
            alert(sig.signature('toSVG'));
        });
    });
</script>
