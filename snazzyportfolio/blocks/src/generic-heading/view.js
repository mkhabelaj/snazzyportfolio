import { store, getContext } from "@wordpress/interactivity";
const { state } = store("overview", {
  actions: {
    loadHeaders() {
      const { tag, text, identifier, href, classes } = getContext();
      state.headers.push({ tag, text, identifier, href, class: classes });
    },
  },
});
