<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country=$_GET['country'];

//country lookup
if (isset($_GET['lookup']) && $_GET['lookup']== 'cities'){
  $stmt = $conn->query("SELECT * FROM countries cty join cities c on c.country_code=cty.code;");
}
else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
}
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  /*$stmt->close();
  $conn->close(); */

if (isset($_GET['lookup']) && $_GET['lookup']== 'cities'){
  echo '<table border>';
  echo '<thead><tr><th>Name</th><th>District</th><th>Population</th></tr></thead>';
  echo '<tbody>';
  foreach ($results as $row) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name']) . '</td>';
    echo "<td>" . htmlspecialchars($row['district']) . '</td>';
    echo "<td>" . htmlspecialchars($row['population']) . '</td>';
    echo "</tr>";
  }
  echo '</tbody></table>';
}
else{
  echo "<table border='1'>";
  echo "<thead><tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr></thead>";
  echo "<tbody>";
  foreach ($results as $row){
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name']) . '</td>';
    echo "<td>" . htmlspecialchars($row['continent']) . '</td>';
    echo "<td>" . htmlspecialchars($row['independence_year']) . '</td>';
    echo "<td>" . htmlspecialchars($row['head_of_state']) . '</td>';
    echo "</tr>";
  }
  echo '</tbody></table>';
}

/*
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
*/

?>
