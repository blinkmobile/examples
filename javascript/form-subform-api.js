/**
 * Availability: 2012W14
 *
 * This can be used anywhere JavaScript is accepted (e.g. custom code in form calculations).
 *
 * NOTE: For form calculations, take care to use block-comments like this, rather than
 * per-line comments (//), as they tend to cause issues.
 */

/**
 * For this example, our top-most form is "Car", containing a "Passenger" field that
 * associates this particular Car record with one or more "Person" form records.
 */

var formObject = BlinkForms.currentFormObject;

var subFormElement = formObject.getElement('Passenger');

/**
 * We'll add 2 (empty, only choice) new Passengers to our Car here ...
 */

subFormElement.add();
subFormElement.add();

/**
 * Cars in our example only have 2 seats, so if we get rid of the extra Passengers ...
 * NOTE: add() doesn't already finish right away, so we need to allow enough time to pass.
 */

setTimeout(function() {

  while (subFormElement.size() > 2) {
    subFormElement.remove(subFormElement.size() - 1);
  }

}, 1000);
