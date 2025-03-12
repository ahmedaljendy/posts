import "./bootstrap";

import { createApp } from "vue";
import IncrementCounter from "./components/IncrementCounter.vue";
import ViewAjaxComponent from "./components/ViewAjaxComponent.vue";
createApp({}).component("ViewAjax", ViewAjaxComponent).mount("#app");
