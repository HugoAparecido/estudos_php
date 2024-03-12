<h1>Cadastrar Livro</h1>
<form action="?page=salvar-livro" method="post">
    <div class="mb-3"><label for="categoria_cod_categoria">Categoria</label>
        <select name="categoria_cod_categoria" id="categoria_cod_categoria" class="form-control">
            <option>-=Escolha a Categoria=-</option>
            <?php
            $sql = "SELECT * FROM categoria";
            $res = $conn->query($sql);
            while ($row = $res->fetch_object()) {
                print "<option value='" . $row->cod_categoria . "'>";
                print $row->nome_categoria . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="titulo_livro">Título</label>
        <input type="text" name="titulo_livro" id="titulo_livro" class="form-control">
    </div>
    <div class="mb-3">
        <label for="autor_livro">Autor</label>
        <input type="text" name="autor_livro" id="autor_livro" class="form-control">
    </div>
    <div class="mb-3"><button class="btn btn-primary">Enviar</button></div>
</form>