import './bootstrap';


import { createApp } from "vue";

import router from "./router";

import App from "./components/App"



createApp(App).use(router).mount("#app")

