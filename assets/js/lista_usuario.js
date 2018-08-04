'use strict';

(function() {
  const onRequestSuccess = (response) => {
    $.toast(response.message);

    setTimeout(() => {
      location.reload();
    }, 1000);
  };

  const onRequestFail = (err) => {
    const message = err.responseJSON && err.responseJSON.message || 'Ocorreu um erro nesta requisição';
    console.log(err);
    $.toast(message);
  };

  $('.btn-remove').click(function(event) {
    event.preventDefault();

    const button = $(this);
    const url = button.attr('href');

    $.get({
      url,
      dataType: 'json',
    })
      .done(onRequestSuccess)
      .fail(onRequestFail);
  })
})();