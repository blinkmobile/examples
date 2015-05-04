<p id="message" style="max-width:100%;word-wrap:break-word">To scan an NFC tag, tap the back of your device against it.</p>

<script type="text/javascript">
 /*eslint-env browser*/
  /*eslint-disable no-console*/
  /*global nfc, $, htmlspecialchars*/

  // https://github.com/chariotsolutions/phonegap-nfc/blob/0.6.2/README.md
  document.addEventListener("deviceReady", function () {
    "use strict";

    var onTagDiscovered = function (nfcEvent) {
      var tagData = JSON.stringify(nfcEvent.tag);

      console.log("Found NFC tag: " + tagData);
      $("#message")[0].innerHTML = "Generic tag: <br />" +
        htmlspecialchars(tagData);
    };

    var onNdefFormatableDiscovered = function (nfcEvent) {
      var tagData = JSON.stringify(nfcEvent.tag);

      console.log("Found NFC NDef formatable tag: " + tagData);
      $("#message")[0].innerHTML = "NDef formattable tag: <br />" +
        htmlspecialchars(tagData);
    };

    var onNdefDiscovered = function (nfcEvent) {
      var ndefData = JSON.stringify(nfcEvent.tag.ndefMessage);

      console.log("Found NFC NDef tag: " + ndefData);
      $("#message")[0].innerHTML = "NDef tag: <br />" +
        htmlspecialchars(ndefData);
    };

    var onMimeTypeTagDiscovered = function (nfcEvent) {
      var ndefData = JSON.stringify(nfcEvent.tag.ndefMessage);

      console.log("Found NFC NDef tag: " + ndefData);
      $("#message")[0].innerHTML = "NDef tag: <br />" +
        htmlspecialchars(ndefData);
    };

    var fail = function (error) {
      console.log("Failed to attach NFC event handler: " + error);
    };

    var attachNfcEventHandlers = function () {
      if (typeof nfc === "object") {
          if (typeof nfc.addTagDiscoveredListener === "function") {
            nfc.addTagDiscoveredListener(onTagDiscovered, null, fail);
          }

          if (typeof nfc.addNdefFormatableListener === "function") {
            nfc.addNdefFormatableListener(onNdefFormatableDiscovered, null, fail);
          }

          if (typeof nfc.addNdefListener === "function") {
            nfc.addNdefListener(onNdefDiscovered, null, fail);
          }

          if (typeof nfc.addMimeTypeListener === "function") {
            nfc.addMimeTypeListener("text/json", onMimeTypeTagDiscovered, null, fail);
          }
      } else {
        window.setTimeout(function () {
          attachNfcEventHandlers();
        }, 1000);
      }
    };
    attachNfcEventHandlers();
  });
</script>