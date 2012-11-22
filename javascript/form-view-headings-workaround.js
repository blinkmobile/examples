/**
 * This is a work-around for an issue where Form Heading Elements do not appear
 * in View forms and Delete forms. Before deploying this code in your
 * answerSpace, be sure to change the values in the "headings" variable.
 *
 * It may be convenient to combine this with:
 * https://github.com/blinkmobile/snippets/blob/master/madl/host-external-javascript.php
 *
 * In any case, insert this into your answerSpace such that it is only run once.
 */
// wrap all of our work in a closure to help prevent global leakage
(function() {
  // convention: variables starting with $ are jQuery objects
  // tip: for speed, use jQuery to find items with IDs first, then traverse
  var $stackLayout = $('#stackLayout'),
      // tip: save jQuery results for multiple uses to avoid re-traversal
      $view,
      // TODO:
      // headings: a map of form names to (ordered) lists of headings
      headings = {
        'HeadingTest': [
          '<h3>heading1</h3>',
          '<h3>heading2</h3>'
        ],
        'SubHeadingTest': [
          '<h3>subheading1</h3>',
          '<h3>subheading2</h3>'
        ]
      },
      $table,
      // each...: this is for use with jQuery.each
      eachHeading = function(index, heading) {
        var num = index + 1,
            $heading = $table.children('tr[data-name="_heading_' + num + '"]');
        $heading.children('td').html(heading);
      },
      // each...: this is for use with jQuery.each
      eachForm = function(form, list) {
        var $form;
        // grabs the TBODY element, doesn't matter if it is a form or a subForm
        $form = $view.find('form[data-object-name="' + form + '"]');
        $form = $form.add('tr[data-name="' + form + '"]');
        $table = $form.children('td').children('table');
        $table = $table.add($form.children('table'));
        $table = $table.children('tbody');
        $.each(list, eachHeading);
      };

  $(document).on('viewReady', function(event) {
    var action;
    // tip: using jQuery.children is way more efficient than jQuery.find
    $view = $stackLayout.children('.view[data-type=form]');
    action = $view.children('.box').children('form').data('action');
    if (action !== 'view' && action !== 'delete') {
      // exit early, not the kind of form that needs fixing
      return;
    }
    $.each(headings, eachForm);
  });

}());
