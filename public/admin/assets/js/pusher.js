 // Configurer le client Pusher avec vos clés d'accès
 const pusher = new Pusher('4e0f3d3642f3260aca5d', {
    cluster: 'ap2',
});

// Écouter l'événement 'message' sur le canal 'chat'
const channel = pusher.subscribe('chat');
channel.bind('message', function(data) {
    // Réagir à l'événement diffusé
    // Les données de l'événement sont disponibles dans 'data'
    console.log(data);
});
