<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid">
    
    <div class="mdl-cell mdl-cell--6-col">
      <?php echo form_open("repos/add");?>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
          <input class="mdl-textfield__input" type="text" name="url"/>
          <label class="mdl-textfield__label" for="sample1">Repo URL</label>
        </div>
        <div>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            Add
          </button>
        </div>
      </form>
    </div>

    <div class="mdl-cell mdl-cell--6-col">
      <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
      <thead>
        <tr>
          <th class="mdl-data-table__cell">Username</th>
          <th>Repo</th>
          <th>Review</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($repos->result() as $row) {
            echo "<tr>";
            echo "<td>" . $row->username . "</td>";
            echo "<td>" . anchor($row->url, $row->repo, "target=_blank") 
                . "</td>";
            echo "<td>" . anchor("#", "See Review") . "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </div>
      
  </div>
</main>