return << < 'EOF' < div id = "contactsList" > < /div>

<script>
/ / @sourceURL = contacts.js
if (navigator.contacts && navigator.contacts.find && document.createDocumentFragment) {
	navigator.contacts.find(["*"], function(contacts) {
		var frag = document.createDocumentFragment();
		$.each(contacts, function(index, contact) {
			var $div = $('<div></div>');
			$div.append('<span>' + contact.id + '</span>');
			$div.append(". <strong>");
			$div.append(contact.name.formatted);
			$div.append("</strong><br />");
			if (contact.phoneNumbers) {
				$div.append(contact.phoneNumbers[0].value);
				$div.append("<br />");
			}
			if (contact.addresses) {
				$div.append(contact.addresses[0].streetAddress + ", " + contact.addresses[0].locality + ", " + contact.addresses[0].region);
				$div.append("<br />");
			}
			$div.append("<br />");
			frag.appendChild($div[0]);
		});
		$("#contactsList")[0].appendChild(frag);
	}, function(contactError) {
		console.log(contactError);
	}, {
		filter: "",
		multiple: true
	});
} else {
	$("#contactsList").append("Your device does not support this feature.");
} < /script>
EOF;