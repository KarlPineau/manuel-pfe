document.addEventListener("DOMContentLoaded", function () {
  const burger = document.getElementById("burger-toggle");
  const sidebar = document.querySelector(".c-sidebar");

  if (burger && sidebar) {
    burger.addEventListener("click", () => {
      sidebar.classList.toggle("is-open");
    });
  }

  const toggles = document.querySelectorAll(".c-sidebar__chevron-toggle");
  toggles.forEach((toggleBtn) => {
    toggleBtn.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();

      const item = toggleBtn.closest(".c-sidebar__item");
      const subnav = item.querySelector(".c-sidebar__sections");

      if (subnav) {
        subnav.style.display = subnav.style.display === "block" ? "none" : "block";
        item.classList.toggle("is-open");
      }
    });
  });

  const header = document.getElementById("site-header");
  const progressBar = document.getElementById("progress-bar");
  const progressWrapper = document.querySelector(".l-progress");

  let lastScrollY = 0;

  const updateProgressOffset = () => {
    if (progressWrapper && header) {
      const headerHeight = header.offsetHeight;
      progressWrapper.style.top = `${headerHeight}px`;
      console.log(progressWrapper.style.top);
      console.log(header.style.top);
    }
  };

  const scrollContainer = document.scrollingElement || document.documentElement;

  const handleScroll = () => {
    const scrollTop = scrollContainer.scrollTop;
    const scrollHeight = scrollContainer.scrollHeight - scrollContainer.clientHeight;
    const progress = (scrollTop / scrollHeight) * 100;

    // Mise à jour largeur de la barre
    if (progressBar) {
      progressBar.style.width = progress + "%";
    }

    // Réduction du header
    if (header) {
      if (scrollTop > 100 && scrollTop > lastScrollY) {
        header.classList.add("is-minimized");
      } else if (scrollTop < lastScrollY) {
        header.classList.remove("is-minimized");
      }
    }

    lastScrollY = scrollTop;

    // Mise à jour du top dynamique
    updateProgressOffset();
  };

  window.addEventListener("scroll", handleScroll);
  scrollContainer.addEventListener("scroll", handleScroll);
  window.addEventListener("resize", updateProgressOffset);

  // Initialisation au chargement
  updateProgressOffset();

});
