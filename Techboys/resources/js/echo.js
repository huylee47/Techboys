import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? "127.0.0.1",
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: import.meta.env.VITE_PUSHER_SCHEME === "https",
    disableStats: true,
    enabledTransports: ["ws", "wss"],
});
