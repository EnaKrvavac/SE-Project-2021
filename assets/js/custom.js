$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize


  app.route({
    view: 'home',
    load: 'home.html'
  });

  app.route({
    view: 'flight',
    load: 'flight.html'
  });

  app.route({
    view: 'departure',
    load: 'departure.html'
  });

  app.route({
    view: 'reserve',
    load: 'reserve.html'

  });

  app.route({
    view: 'ex2',
    load: 'ex2.html'
  });
  



  // run app
  app.run();

});
