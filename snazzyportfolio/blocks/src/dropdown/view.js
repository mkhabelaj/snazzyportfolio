import { store, getContext } from "@wordpress/interactivity";
store("snazzyDropdown", {
  actions: {
    toggleNav() {
      const context = getContext();
      context.navIsOpen = !context.navIsOpen;
    },
  },
});
