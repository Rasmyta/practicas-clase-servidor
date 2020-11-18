let showModalBtn = document.getElementById("show-modal-btn");
let modal = document.getElementById("add-word-modal");
let modalBackground = document.querySelector(
  "#add-word-modal .modal-background"
);
let closeModalBtn = document.querySelector("#add-word-modal .modal-close");

showModalBtn.addEventListener("click", openModal);
closeModalBtn.addEventListener("click", closeModal);

function openModal() {
  modal.classList.add("is-active");
  modalBackground.addEventListener("click", closeModal, true);
}

function closeModal(e) {
  if (e.target == modalBackground || e.target == closeModalBtn) {
    modal.classList.remove("is-active");
    modalBackground.removeEventListener("click", closeModal, true);
  }
}
