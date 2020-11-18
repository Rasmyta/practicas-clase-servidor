<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-2 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>

  <?php
  include('ejercicio_5/createTasksHTML.php');

  if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
  }

  // echo '<pre>' . print_r($_SESSION['tasks'], true) . '</pre>';
  ?>
  <div class="box">
    <div class="level is-mobile">
      <div class="level-left">
        <h2 class="title is-4">Tasks</h2>
      </div>
      <div class="level-right">
        <button id="clear-tasks" class="ml-6 button is-danger is-light">
          <span>Clear all tasks</span>
          <span class="icon">
            <i class="fas fa-trash"></i>
          </span>
        </button>
      </div>
    </div>
    <form id="add-task" action="" method="POST" style="max-width: 600px;">
      <div class="field has-addons">
        <div class="control">
          <span class="select">
            <select name="priority">
              <option disabled>- Priority -</option>
              <option value="3"><span class="has-text-primary">High</span></option>
              <option value="2" selected>Medium</option>
              <option value="1">Low</option>
            </select>
          </span>
        </div>
        <div class="control is-expanded has-icons-left">
          <input id="task-input" required name="desc" class="input" type="text" placeholder="Add task">
          <span class="icon is-small is-left">
            <i class="fas fa-tasks"></i>
          </span>
        </div>
        <div class="control">
          <button id="add-task-btn" type="submit" class="button is-primary" type="submit">Add task</button>
        </div>
      </div>

      <input name="due-date" type="date">
    </form>
    <hr>
    <div id="task-list">
      <?php

      echo createTasksHTML();
      ?>
    </div>
  </div>
</div>


<script src="ejercicio_5/manageTasks.js"></script>
<script src="ejercicio_5/bulma-calendar-extension/js/bulma-calendar.min.js"></script>
<script>
  const calendars = bulmaCalendar.attach('[type="date"]', {
    type: 'date',
    dateFormat: 'DD/MM/YYYY',
    startDate: new Date()
  });

  // Loop on each calendar initialized
  calendars.forEach(calendar => {
    // Add listener to date:selected event
    calendar.on('date:selected', date => {
      console.log(date);
    });
  });

  // To access to bulmaCalendar instance of an element
  const element = document.querySelector('#my-element');
  if (element) {
    // bulmaCalendar instance is available as element.bulmaCalendar
    element.bulmaCalendar.on('select', datepicker => {
      console.log(datepicker.data.value());
    });
  }
</script>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>