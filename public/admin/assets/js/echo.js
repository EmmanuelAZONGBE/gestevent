import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '4e0f3d3642f3260aca5d', // Remplacez 'YOUR_PUSHER_APP_KEY' par votre clé Pusher réelle
    cluster: 'ap2', // Remplacez 'YOUR_PUSHER_APP_CLUSTER' par votre cluster Pusher réel
    forceTLS: true
});
