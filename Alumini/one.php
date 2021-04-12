<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Educational Qualification</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap"
      rel="stylesheet"
    />

    <style>
      body {
        font-family: "Roboto", sans-serif;
      }
      h1 {
        text-align: center;
      }
      table,
      form {
        width: 500px;
        margin: 20px auto;
      }
      table {
        border-collapse: collapse;
        text-align: center;
      }
      table td,
      table th {
        border: solid 1px black;
      }
      label,
      input {
        display: block;
        margin: 10px 0;
        font-size: 20px;
      }
      button {
        display: block;
      }
    </style>
  </head>
  <body>
    <h1>Educational Qualification</h1>
    <form>
      <div class="input-row">
        <label for="Text">School</label>
        <input type="text" name="school" id="school" />
      </div>
	  <div class="input-row">
        <label for="field of study">Field of study</label>
        <input type="text" name="field_of_study" id="field_of_study" />
      </div>
	  <div class="input-row">
        <label for="start_date">Start date</label>
        <input type="date" name="edu_start_date" id="edu_start_date" />
      </div>
      <div class="input-row">
        <label for="end_date">End Date</label>
        <input type="date" name="edu_end_date" id="edu_end_date" />
      </div>
      <button type="submit" class="btn" name="education_submit_btn">Submit</button>
      <button type="submit" class="btn" name="a">a</button>
    </form>
    <?php
    if(isset($_POST['a']))
    {
        //educationDetails();
        echo "hai";
        //header('location: login.php');
    }
    
    ?>
    
    <table>
      <thead>
        <tr>
          <th>School</th>
          <th>Field of study</th>
		  <th>Start date</th>
		  <th>End date</th>
          <th></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    <script>
      const formEl = document.querySelector("form");
      const tbodyEl = document.querySelector("tbody");
      const tableEl = document.querySelector("table");
      function onAddWebsite(e) {
        e.preventDefault();
        const school = document.getElementById("school").value;
        const field_of_study = document.getElementById("field_of_study").value;
		const edu_start_date = document.getElementById("edu_start_date").value;
		const edu_end_date = document.getElementById("edu_end_date").value;
        tbodyEl.innerHTML += `
            <tr>
                <td>${school}</td>
                <td>${field_of_study}</td>
				<td>${edu_start_date}</td>
				<td>${edu_end_date}</td>
                <td><button class="deleteBtn">Delete</button></td>
            </tr>
        `;
      }

      function onDeleteRow(e) {
        if (!e.target.classList.contains("deleteBtn")) {
          return;
        }

        const btn = e.target;
        btn.closest("tr").remove();
      }

      formEl.addEventListener("submit", onAddWebsite);
      tableEl.addEventListener("click", onDeleteRow);
    </script>
  </body>
</html>