import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();


Echo.private('classroom.' + classroomId)
    .listen('.classwork-created', function (event) {
        alert(event.title);
    });
