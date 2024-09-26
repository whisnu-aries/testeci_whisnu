import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import Layout from "./Layouts/Layout.vue";
import TitleText from "./Components/Text/TitleText.vue";
import DescriptionText from "./Components/Text/DescriptionText.vue";
import PrimaryButton from "./Components/Button/PrimaryButton.vue";

createInertiaApp({
  resolve: (name) => {
    const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
    let page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || Layout;

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Head", Head)
      .component("Link", Link)
      .component("TitleText", TitleText)
      .component("DescriptionText", DescriptionText)
      .component("PrimaryButton", PrimaryButton)
      .mount(el);
  },
});
