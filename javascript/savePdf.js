/* New functionality released 13/11/2014 */
/* Requires Blink Android app shell 1.1.0 or greater */
/* This is a message interaction example */



<p id="pdf">
  PDF content
</p>

<script>
/*jslint browser: true*/
/*global jsPDF, FileTransfer, $*/

var savePDF = function () {
    var pdf = new jsPDF();

    // Generate a PDF using the visible DOM elements
    pdf.addHTML($(':visible')[0], 0, 0, null, function () {
        var ft = new FileTransfer(),
            callback = function (result) { console.log(result); },
            data = null;

        // Extract Base64 of generated PDF from the data URL
        data = pdf.output('dataurlstring').split('base64,')[1];

        // Save PDF to Downloads folder.
        ft.saveToDownloadsDir(data, 'test.pdf', 'application/pdf', callback, callback, {
            'title': 'Test PDF',
            'description': 'Generated using jsPDF'
        });
    }); 

 };
</script>
<button onclick="savePDF();">Generate PDF</button>