<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$worldsearch = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING); //get query and sanitize
$lookup = filter_input(INPUT_GET, "lookup", FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$worldsearch%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($lookup == "cities") {
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
	$stmt = $conn->query("SELECT cities.name,cities.district, cities.population FROM cities JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$worldsearch%'");

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>
	<table>
		<tr><th>Name</th><th>District</th><th>Population</th></tr>
	<?php foreach ($results as $row): ?>
		<tr><td><?= $row['name']?></td><td><?= $row['district']; ?></td><td><?= $row['population']; ?></td></tr>
	<?php endforeach; ?>
	</table>
	<?php
}
else {
	?>
	<table>
		<tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr>
	<?php foreach ($results as $row): ?>
		<tr><td><?= $row['name']?></td><td><?= $row['continent']; ?></td><td><?= $row['independence_year']; ?></td><td><?= $row['head_of_state']; ?></td></tr>
	<?php endforeach; ?>
	</table>

	<?php
}
?>
