'use strict';

(function() {
  const onRequestSuccess = (response) => {
    $.toast(response.message);

    setTimeout(() => {
      location.href = response.redirectUrl;
    }, 1000);
  };

  const onRequestFail = (err) => {
    const message = err.responseJSON && err.responseJSON.message || 'Ocorreu um erro nesta requisição';
    console.log(err);
    $.toast(message);
  };

  $('form').submit(function(event) {
    event.preventDefault();

    const form = $(this);
    const url = form.attr('action');
    const data = form.serialize();

    $.post({
      url,
      data,
      dataType: 'json',
    })
      .done(onRequestSuccess)
      .fail(onRequestFail);
  })
})();