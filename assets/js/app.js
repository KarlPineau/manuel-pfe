document.addEventListener("DOMContentLoaded", function () {
  const burger = document.getElementById("burger-toggle");
  const sidebar = document.querySelector(".c-sidebar");

  burger.addEventListener("click", () => {
    sidebar.classList.toggle("is-open");
  });

  //------

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
});
