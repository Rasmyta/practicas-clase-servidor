document.addEventListener("DOMContentLoaded", async () => {
  document.getElementById("new-game-btn").addEventListener("click", newGame);
});

async function newGame() {
  document
    .getElementById("letters-container")
    .addEventListener("click", checkLetterInPuzzledWord);

  document.getElementById("status").innerHTML = "";
  document.getElementById("fails").textContent = 0;
  let letterBtns = document.getElementById("letters-container").children;

  //resets the disabled property of all letters
  for (let i = 0; i < letterBtns.length; i++) {
    letterBtns[i].disabled = false;
  }

  // resets body parts of hangman
  let bodyParts = document.querySelectorAll(".body-part");
  bodyParts.forEach((bodyPart) => bodyPart.classList.add("is-invisible"));

  await getPuzzledWord();
  await debug();
}

async function getPuzzledWord() {
  let formData = new FormData();
  formData.append("action", "getPuzzledWord");
  let res = await fetch("hangman/hangmanController.php", {
    method: "POST",
    body: formData,
  });

  let word = await res.text();

  let letterBtns = document.getElementById("letters-container").children;

  // add disable property for letters that exist in the word already
  for (let i = 0; i < letterBtns.length; i++) {
    if (word.includes(letterBtns[i].textContent.toLowerCase())) {
      letterBtns[i].disabled = true;
    }
  }

  document.getElementById(
    "puzzled-word"
  ).textContent = word.toUpperCase().split("").join(" ");
}

async function checkLetterInPuzzledWord(e) {
  let btn = e.target.closest("button");

  if (btn) {
    let formData = new FormData();
    formData.append("action", "checkLetterInPuzzledWord");
    formData.append("letter", btn.textContent);

    let res = await fetch("hangman/hangmanController.php", {
      method: "POST",
      body: formData,
    });
    let data = await res.text();

    if (data == "letterNotFound") {
      let fails = await getFails();
      let bodyParts = document.querySelectorAll(".body-part");

      bodyParts.forEach((bodyPart) => {
        if (bodyPart.dataset.order == fails) {
          bodyPart.classList.remove("is-invisible");
        }
      });

      document.getElementById("fails").textContent = fails;

      if (fails == 6) {
        document.getElementById("status").innerHTML =
          '<p class="has-text-danger">You Lost!</p>';
        document
          .getElementById("letters-container")
          .removeEventListener("click", checkLetterInPuzzledWord);
      }
    } else {
      let hasWon = await checkHasWon();

      document.getElementById(
        "puzzled-word"
      ).textContent = data.toUpperCase().split("").join(" ");
      btn.disabled = true;

      if (hasWon) {
        document.getElementById("status").innerHTML =
          '<p class="has-text-success">You Won!</p>';

        document
          .getElementById("letters-container")
          .removeEventListener("click", checkLetterInPuzzledWord);
      }
    }
  }
}

async function getFails() {
  let formData = new FormData();
  formData.append("action", "getFails");
  let res = await fetch("hangman/hangmanController.php", {
    method: "POST",
    body: formData,
  });

  let data = await res.text();

  return data;
  // show body part
}

async function checkHasWon() {
  let formData = new FormData();
  formData.append("action", "checkHasWon");
  let res = await fetch("hangman/hangmanController.php", {
    method: "POST",
    body: formData,
  });

  let data = await res.text();

  return data;
}

async function debug() {
  let formData = new FormData();
  formData.append("action", "debug");
  let res = await fetch("hangman/hangmanController.php", {
    method: "POST",
    body: formData,
  });

  let data = await res.text();

  document.getElementById("debug").innerHTML = data;
}
