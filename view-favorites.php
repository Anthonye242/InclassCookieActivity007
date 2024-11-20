<?php
session_start();

// Retrieve favorites from the session
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
  
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
    
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main class="ui container">
    
    <section class="ui basic segment ">
      <h2>Favorites</h2>
        <table class="ui basic collapsing table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Title</th>
              <th>Action</th>
          </tr></thead>
          <tbody>
                <?php foreach ($favorites as $favorite): ?>
                  <tr>
                      <td>
                        <img src="images/art/square-medium/<?php echo htmlspecialchars($favorite['ImageFileName']); ?>.jpg" alt="<?php echo htmlspecialchars($favorite['Title']); ?>">
                      </td>
                      <td>
                        <a href="single-painting.php?id=<?php echo htmlspecialchars($favorite['PaintingID']); ?>">
                            <?php echo htmlspecialchars($favorite['Title']); ?>
                        </a>
                      </td>
                      <td>
                        <a class="ui small button" href="remove-favorites.php?PaintingID=<?php echo htmlspecialchars($favorite['PaintingID']); ?>">
                            Remove
                        </a>
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
          <tfoot class="full-width">
              <th colspan="3">
                <a class="ui left floated small primary labeled icon button" href="remove-favorites.php?clear=true">
                    <i class="remove circle icon"></i> Remove All Favorites
                </a>               
              </th>
          </tfoot>
         </table>
    </section>

</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>    