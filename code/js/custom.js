$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize


  app.route({
    view: 'home',
    load: 'home.html'
  });

  app.route({
    view: 'services',
    load: 'services.html'
  });

  app.route({
    view: 'doctors',
    load: 'doctors.html'
  });

  app.route({
    view: 'make_appointment',
    load: 'make_appointment.html'
  });

  app.route({
    view: 'contact',
    load: 'contact.html'
  });

  

  // run app
  app.run();

});
