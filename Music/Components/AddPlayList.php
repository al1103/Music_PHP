<?php
echo '
<div class="input_add_playlist" id="input_add_playlist">
      <form action="index.php" method="post">
        <input type="text" name="playlist_name" />
        <div class="button">

        <button class="button-30" role="button" 
        onclick="document.getElementById(\'input_add_playlist\').style.display=\'none\'"
        >Cancel</button>
        <input
          type="submit"
          name="add_playlist"
          class="button-30"
          value="Add"
        />
    </div>

      </form>
    </div>

';
?>