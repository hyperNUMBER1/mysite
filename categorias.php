<?php 
    require_once 'banco.php';
    $categorias = listarCategorias();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $nome=$_POST['txt_nome'];
    $descricao=$_POST['txt_descricao'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            max-width: 500px;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>
<body>
    <div class="container">
        <!-- Logo e Menu -->
        <div class="row py-3 align-items-center">
            <div class="col-md-2">
                <h1 class="h3"><img src="img/eto.webp" class="img-fluid w-100" alt="Banner" onclick="window.location.href='index.html';"></h1>
            </div>
            <div class="col-md-10 d-flex justify-content-end">
            </div>

            <div class="row my-3 card p-4 shadow" style="width: 100%; height: 500px; display: flex; justify-content: center; align-items: center;">
                <form method="post" action="adm_cat.php" style="width: 100%;">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="txt_nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" name="txt_descricao" class="form-control">
                    </div>
                    <input type="submit" value="Salvar" class="btn btn-primary mt-2">
                </form>

        </div>
    <div>
            <table class="table-responsive">
            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($categorias)): ?>
    <tr>
        <td colpan="3" class="text-center">Nenhuma categoria</td>
    </tr>
    <?php else: ?>
    <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?php echo $categoria['id']; ?></td>
            <td><?php echo $categoria['nome']; ?></td>
            <td><?php echo $categoria['descricao']; ?></td>
            <td><a href="adm_cat.php?id=<?php echo $categoria['id']; ?>" class="btn btn-danger">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
  </tbody>
</table>
            </table>
        </div>
        </div>
        
        <!-- Rodapé -->
        <footer class="row bg-white text-black text-center py-3">
            <div class="col-12">
                <p class="mb-0">&copy; 2024 Êto Gallery. Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>