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
// Cria uma instância da classe SQLite3 com o banco de dados do arquivo 
//banco_de_dados.db
$db = new SQLite3('banco_de_dados.db');
// Tenta criar a tabela caso não exista. Para acessar atributos e métodos de um 
//objeto no PHP use ->
$db->query('CREATE TABLE IF NOT EXISTS itens (chave varchar(100), valor varchar(100))');

// Testa se na váriavel global $_SERVER o item da lista referente ao método HTTP
//usado está definido como POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Recupera os dados transferidos via formulário
	$chave = $_POST['chave'];
	$valor = $_POST['valor'];
	// Prepara uma string para ser enviada ao banco de dados, protegendo contra
	//SQLInjection e outras falhas comuns ao concatenar strings
	$inserir = $db->prepare('INSERT INTO itens (chave, valor) VALUES (:chave, :valor)');
	// Define os valores a serem usados na string preparada
	$inserir->bindParam(':chave', $chave);
	$inserir->bindParam(':valor', $valor);
	// Envia e executa a string preparada no banco de dados
	$inserir->execute();
}

// Retorna todos os itens cadastrados no banco de dados
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

