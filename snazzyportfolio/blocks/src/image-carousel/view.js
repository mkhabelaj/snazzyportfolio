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
        const glide = new Glide(ref, {
          autoplay: 3000,
          hoverpause: true,
        });
        glide.mount();
      }, []);
      document.querySelector(".glide");
    },
  },
});
