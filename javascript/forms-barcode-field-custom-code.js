//
// Step 3 custom code for reading Barcodes into a form field (native apps only).
// To be added as manual calculation code for Calculation fields.
//

function() {
    var barcodereader = window.cordova.require(
            'cordova/plugin/BGBarcodeReader'),
        bfo = this;

    //
    // Function to be called after successfully reading a barcode.
    //
    var onSuccess = function(message) {
        bfo.setFieldValue("BarcodeValue", message);
        // Please replace 'BarcodeValue' with the name of the target field
        // in the form.

        bfo.setFieldValue("readBarcode", "");
        // Please replace 'readBarCode' with the name of the Calculation
        // field where the custom code will be inserted.

        console.log(message);
    };
        
    //
    // Function to be called after an error.
    //
    var onError = function(message) {
        console.log(message);
        navigator.notification.alert(message);
    };

    barcodereader.getBarcode(onSuccess, onError, []);
    return 'Scanning...';
}
