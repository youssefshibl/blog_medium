window._ = require('lodash');

try {

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

 import Echo from 'laravel-echo';

 window.Pusher = require('pusher-js');

 // let token = $('meta[name=csrf-token]').attr('content');

 window.Echo = new Echo({
     broadcaster: 'pusher',
     key: '1ceb116a2e8f6f775957',
     cluster: 'mt1',
     forceTLS: true,
 });

