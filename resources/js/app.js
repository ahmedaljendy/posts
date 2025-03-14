import "./bootstrap";

import { createApp } from "vue";
import { createPinia } from "pinia";
import ViewAjaxComponent from "./components/ViewAjaxComponent.vue";
import axios from "axios";
import ModalComponent from "./components/ModalComponent.vue";

// Set Axios defaults (optional)
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const app = createApp({});
const pinia = createPinia();

app.component("view-ajax", ViewAjaxComponent);
app.component("post-modal", ModalComponent);

app.use(pinia);
app.mount("#app");

window.axios = axios;
