import './bootstrap';
window.Echo.channel('chat')
    .listen('MessageSent', (e) => {
        console.log(e.message);
    });

