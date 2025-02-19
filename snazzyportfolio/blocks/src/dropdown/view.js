import { store, getContext } from "@wordpress/interactivity";
store("snazzyDropdown", {
  actions: {
    toggleNav() {
      console.log("toggleNav");
      const context = getContext();
      context.navIsOpen = !context.navIsOpen;
    },
  },
});
