import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

$(document).ready(function() {
    $('#messageForm').submit(function(event) {
      event.preventDefault();

      let firstName = $('#first_name').val();
      let lastName = $('#last_name').val();
      let message = $('#message').val();

      if (firstName === '' || lastName === '' || message === '') {
        alert('Veuillez entrer un prénom, un nom et un message');
        return false;
      }

      $.ajax({
        url: '/send-message',
        method: 'POST',
        data: {
          first_name: firstName,
          last_name: lastName,
          message: message
        },
        success: function(response) {
          console.log('Message envoyé avec succès');
          $('#first_name').val('');
          $('#last_name').val('');
          $('#message').val('');
        },
        error: function(xhr, status, error) {
          console.error('Une erreur s\'est produite lors de l\'envoi du message');
          console.log(xhr.responseText);
        }
      });
    });
  });

  window.Echo.channel('chat')
  .listen('.message', (event) => {
      $('#messages').append('<p><strong>' + event.first_name + ' ' + event.last_name + '</strong> : ' + event.message + '</p>');
      $('#message').val('');
  });
