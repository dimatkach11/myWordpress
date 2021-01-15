$(document).ready(function () {

  const form = $('#contactForm');
  const action = form.attr('action');

  form.on('submit', function(event) {

    event.preventDefault();

    const formData = {
      contactName: $('contactName').val(),
      contactEmail: $('contactEmail').val(),
      contactSubject: $('contactSubject').val(),
      contactMessage: $('contactMessage').val()
    }

    $.ajax({
      method: "POST",
      url: action,
      data: formData,
      error: function(request, txtstatus, errorthrown) {
        console.log(request);
        console.log(txtstatus);
        console.log(errorthrown);
      },
      success: function() {
        form.html('operazione andata a buon fine')
      }
    });

  });

});