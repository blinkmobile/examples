// When adding javascript code not declared in a module to BIC-JQM ( BIC3)
// You need to register your code with require.js 
// This file should be added to the answerSpace setup ->Load external javascript

// This example will load and register "Itemslide"  http://itemslide.github.io/docs/index.html library stored in the assets manager.

require.config({
  paths: {
    // tell Require.js where to find itemslide
    itemslide: 'https://d2g691qpj752hh.cloudfront.net/cre8/ontelecom/itemslide.min'
    // note: Require.js adds a ".js" to the end for us
  },
  shim: {
    // tell Require.js that itemslide needs jQuery
    itemslide: {
      deps: ['jquery'],
      exports: '$.fn.itemslide'
    }
    // note: this is only needed because itemslide is not a module
  }
});

