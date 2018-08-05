'use strict';

(function() {
  $('[name=data]').mask('99/99/9999');

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

  $('.btn-acao').click(function(event) {
    event.preventDefault();

    const button = $(this);
    const url = button.attr('href');

    $.get({
      url,
      dataType: 'json',
    })
      .done(onRequestSuccess)
      .fail(onRequestFail);
  });

  $('[name=sala_id]').change(function() {
    const selectSala = $(this);
    const form = selectSala.closest('form');

    if (selectSala.val().length) {
      form.submit();
    }
  });
})();