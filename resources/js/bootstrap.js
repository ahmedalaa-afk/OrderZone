/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: import.meta.env.VITE_PUSHER_APP_KEY,
  cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
  wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
  wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
  wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
  forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
  enabledTransports: ['ws', 'wss'],
});

window.Echo.channel("new_vendor").listen(
  "NewVendorRegisteredEvent", function (data) {
    $("#notification-item").load('#notification-item > *');
    Livewire.dispatch('refreshNotifications');
  }
);

window.Echo.channel("new_product").listen(
  "NewProductCreatedEvent", function (data) {
    $("#product-notification-item").load('#product-notification-item > *');
    Livewire.dispatch('refreshProducts');
  }
);
window.Echo.channel("accepted_product").listen(
  "ProductAcceptedNotification", function (data) {
    $("#notification-item").load('#notification-item > *');
    Livewire.dispatch('refreshProducts');

  }
);

window.Echo.channel("new-announcement-to-vendor").listen(
  "NewAnnouncementToVendorNotification", function (data) {
    $("#notification-item").load('#notification-item > *');
    Livewire.dispatch('refreshVendorAnnouncements');

  }
);
window.Echo.channel("user-send-contact-notification").listen(
  "UserSendContactNotification", function (data) {
    $("#notification-item").load('#notification-item > *');
    Livewire.dispatch('refreshContacts');

  }
);