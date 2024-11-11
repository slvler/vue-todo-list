import './bootstrap';
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";


import { createApp } from "vue";
import router from "./router";
import App from "./components/App"

createApp(App)
    .use(router)
    .use(Toast)
    .mount("#app")

