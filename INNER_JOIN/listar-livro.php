<h1>Listar Livro</h1>
<?php
$sql = "SELECT * FROM livro AS l INNER JOIN categoria AS c ON l.categoria_cod_categoria = c.cod_categoria";
$res = $conn->query($sql);
$qtd = $res->num_rows;
print "<p>Encontrou <strong>$qtd</strong> resultado(s)</p>";
if ($qtd > 0) {
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome da Categoria</th>";
    print "<th>Título</th>";
    print "<th>Autor</th>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->cod_livro . "</td>";
        print "<td>" . $row->nome_categoria . "</td>";
        print "<td>" . $row->titulo_livro . "</td>";
        print "<td>" . $row->autor_livro . "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p>Não encontrou resultados</p>";
}
