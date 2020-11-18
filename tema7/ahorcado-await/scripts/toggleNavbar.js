let navbar = document.getElementById("navbar");
let fakeNavbar = document.getElementById("fake-navbar");
let toggleBtn = document.getElementById("toggle-navbar");
let mediaQueryDesktop = window.matchMedia(
  "only screen and (min-width: 1024px)"
);

let isNavbarClosed = sessionStorage.getItem("isNavbarClosed");

if (!mediaQueryDesktop.matches) {
  sessionStorage.setItem("isNavbarClosed", true);
  isNavbarClosed = true;
} else {
  if (isNavbarClosed == null) {
    sessionStorage.setItem("isNavbarClosed", false);
    isNavbarClosed = false;
  } else {
    // if it exists check if the value is true or false
    isNavbarClosed = isNavbarClosed == "true";
  }
}

// toggle the navbar based on session on first time visit
if (isNavbarClosed) {
  closeNavbar(toggleBtn.querySelector(".icon i"));
} else {
  openNavbar(toggleBtn.querySelector(".icon i"));
}

mediaQueryDesktop.addEventListener("change", (e) => {
  if (e.matches) {
    openNavbar(toggleBtn.querySelector(".icon svg"));
  } else {
    closeNavbar(toggleBtn.querySelector(".icon svg"));
  }
});

// toggle the navbar on button click
document.getElementById("toggle-navbar").addEventListener("click", () => {
  isNavbarClosed = sessionStorage.getItem("isNavbarClosed") == "true";
  if (isNavbarClosed) {
    openNavbar(toggleBtn.querySelector(".icon svg"));
  } else {
    closeNavbar(toggleBtn.querySelector(".icon svg"));
  }
  sessionStorage.setItem("isNavbarClosed", !isNavbarClosed);
});

function openNavbar(iconEl) {
  navbar.classList.remove("is-hidden");
  fakeNavbar.classList.remove("is-hidden");
  iconEl.classList.add("fa-times");
  iconEl.classList.remove("fa-bars");
  if (mediaQueryDesktop.matches) {
    document
      .getElementById("main-container")
      .classList.remove("is-fullview-width");
  } else {
    document
      .getElementById("main-container")
      .classList.add("is-fullview-width");
  }
  sessionStorage.setItem("isNavbarClosed", false);
}

function closeNavbar(iconEl) {
  navbar.classList.add("is-hidden");
  fakeNavbar.classList.add("is-hidden");
  if (mediaQueryDesktop.matches) {
    document
      .getElementById("main-container")
      .classList.add("is-fullview-width");
  }
  document.getElementById("main-container").classList.add("is-fullview-width");
  iconEl.classList.remove("fa-times");
  iconEl.classList.add("fa-bars");
  sessionStorage.setItem("isNavbarClosed", true);
}
