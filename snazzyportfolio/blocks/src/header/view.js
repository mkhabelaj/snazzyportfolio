import { store, getContext } from "@wordpress/interactivity";

store("navbarPlugin", {
  actions: {
    toggleMobileNav() {
      const context = getContext();
      console.log("toggleMobileNav");
      context.isMobileNavOpen = !context.isMobileNavOpen;
      if (context.isMobileNavOpen) {
        document.body.style.overflow = "hidden";
        return;
      }
      document.body.style.overflow = "unset";
    },
  },
});
