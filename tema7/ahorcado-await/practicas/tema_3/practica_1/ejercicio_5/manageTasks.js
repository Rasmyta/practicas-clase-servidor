taskList = document.getElementById("task-list");
taskInput = document.getElementById("task-input");
deleteButtons = document.querySelectorAll(".delete-task");

document.getElementById("add-task").addEventListener("submit", async (e) => {
  e.preventDefault();
  let data = await fetchData("addTask", new FormData(e.target));

  taskList.innerHTML = data;
  taskInput.value = "";
});

document.getElementById("clear-tasks").addEventListener("click", async () => {
  let data = await fetchData("clearTasks", new FormData());

  taskList.innerHTML = data;
});

taskList.addEventListener(
  "click",
  async (e) => {
    if (e.target.closest(".delete-task")) {
      let formData = new FormData();
      formData.append("id", e.target.closest(".delete-task").dataset.id);
      let data = await fetchData("deleteTask", formData);

      taskList.innerHTML = data;
    }
  },
  false
);

/**
 * Fetches HTML genereted text from the server 
 * @param {string} action Action to perform before getting the data back
 * @param {FormData} formData Data you want to send
 * @return {string} Returns the data in HTML form or  
 */
async function fetchData(action, formData) {
  formData.append("action", action);

  try {
    let res = await fetch("ejercicio_5/tasks.php", {
      method: "POST",
      body: formData,
    });

    if (res.ok) {
      let data = await res.text();
      return data;
    } else {
      console.log(err);
    }
  } catch (err) {
    console.log(err);
  }

  return "Something went wrong";
}
