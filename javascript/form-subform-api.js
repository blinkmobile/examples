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
 * We'll add a (empty, only choice) new Passenger to our Car here ...
 */

subFormElement.add();

/**
 * Cars in our example only have 1 Passenger seat, so we get rid of the extra Passenger ...
 * NOTE: add() doesn't always finish right away, so we need to allow enough time to pass.
 */

setTimeout(function() {

  if (subFormElement.size() > 1) {
    subFormElement.remove(subFormElement.size() - 1);
  }

}, 1000);
