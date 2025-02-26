import { store, getContext, getElement } from "@wordpress/interactivity";
import Glide from "@glidejs/glide";

store("imageGallery", {
  callbacks: {
    loadGlide() {
      const { config } = getContext();
      const { ref } = getElement();
      // let firstLoad = false;

      function onVisibilityChange(entries) {
        entries.forEach((entry) => {
          // if (entry.isIntersecting && !firstLoad) {
          if (entry.isIntersecting) {
            new Glide(ref, config).mount();
            console.log("mounted");
            // firstLoad = true;
          }
        });
      }

      new IntersectionObserver(onVisibilityChange, {
        root: null, // observes in relation to the viewport
        threshold: 0.1, // triggers when at least 10% of the element is visible
      }).observe(ref);
    },
  },
});
