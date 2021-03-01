<?php  
  sleep(1);
  include_once "../connection.php";
  $search = $_POST["search"];
  $sql = "SELECT * FROM account WHERE name LIKE '%".$search."%'";
  $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
      while($row = $result->fetch_assoc())
      {
        $username = $row['username'];
        $name = $row['name'];
?>
    <div class="uk-container">

    <article class="uk-comment uk-comment-primary uk-margin-remove-bottom">
        <header class="uk-comment-header uk-margin-remove-bottom">
            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="uk-comment-avatar" src="img/avatar.jpg" width="80" height="80" alt="">
                </div>
                <div class="uk-width-expand">
                <a class="uk-link-reset" href="Confess-<?php echo $username;?>">
                    <h4 class="uk-comment-title uk-margin-remove"><?php echo $name; ?></h4>
                    <p class="uk-margin-remove"><?php echo $username;?></p>
                    </a>
                </div>
            </div>
        </header>
    </article>
    <br>

    </div>
<?php
      }
    }
    else 
    {
        echo "<div class='uk-container'><h3 style='text-align: center;'>No results</h3></div>";
    } 
?>
