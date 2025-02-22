import {
  store,
  getContext,
  getElement,
  useEffect,
} from "@wordpress/interactivity";
import Glide from "@glidejs/glide";

store("imageGallery", {
  callbacks: {
    loadGlide() {
      useEffect(() => {
        const { ref } = getElement();
        const { config } = getContext();
        const glide = new Glide(ref, config);
        glide.mount();
      }, []);
      document.querySelector(".glide");
    },
  },
});
