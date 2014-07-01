<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP</title>
	<style>
	td {
		border: solid 1px #ddd;
	}
	</style>
</head>

<body>

<?php

$db = new SQLite3('banco_de_dados.db');
$db->query('CREATE TABLE IF NOT EXISTS itens (chave varchar(100), valor varchar(100))');
#$db::query

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$chave = $_POST['chave'];
	$valor = $_POST['valor'];
	$inserir = $db->prepare('INSERT INTO itens (chave, valor) VALUES (:chave, :valor)');
	$inserir->bindParam(':chave', $chave);
	$inserir->bindParam(':valor', $valor);
	$inserir->execute();
}

$itens = $db->query('SELECT * FROM itens');

?>
<form method="POST">
	<input type="text" name="chave" id="chave" autofocus required maxlength="100" placeholder="Chave">
	<input type="text" name="valor" id="valor" required maxlength="100" placeholder="Valor">
	<button type="submit">Criar</button>
</form>
<table cellspacing="2" cellpadding="2">
	<thead>
	<tr>
		<th width="200">Chave</th>
		<th width="200">Valor</th>
	</tr>
	</thead>
	<tbody>
	<?php while ($row = $itens->fetchArray()): ?>
	<tr>
		<td><?php echo $row['chave']; ?></td>
		<td><?= $row['valor'] ?></td>
	</tr>
	<?php endwhile ?>
	</tbody>
</table>

</body>

</html>

