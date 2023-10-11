<?php

if (isset($_POST['submit'])) {
  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $bairro = $_POST['bairro'];
  $cep = $_POST['cep'];
  $cidade = $_POST['cidade'];
  $uf = $_POST['uf'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $tipo_revistinha = $_POST['tipo_revistinha'];
  $quantidade = $_POST['quantidade'];
  $atracoes = $_POST['atracoes'];

  // Verifica o campo "aceito_sugestoes"
  if (isset($_POST['aceito_sugestoes'])) {
      $aceito_sugestoes = $_POST['aceito_sugestoes'];
  } else {
      $aceito_sugestoes = 'Não';
  }

  // Exibir mensagem de sucesso na tela
  echo '<div class="success-message">Formulário enviado com sucesso!</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <div class="container">
    <h2>Formulário</h2>

    <form action="formulario.php" method="POST">
      <h3>Dados para entrega</h3>

      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required />

      <label for="endereco">Endereço:</label>
      <input type="text" id="endereco" name="endereco" />

      <label for="bairro">Bairro:</label>
      <input type="text" id="bairro" name="bairro" />

      <label for="cep">CEP:</label>
      <input type="text" id="cep" name="cep" />

      <label for="cidade">Cidade:</label>
      <input type="text" id="cidade" name="cidade" />

      <label for="uf">UF:</label>
      <input type="text" id="uf" name="uf" />

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">

      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" name="telefone" required>

      <br />
      <h3>Dados para produção</h3>

      <div class="radio-options">
        <label>Tipo Revistinha: </label>
        <label for="convite">
          <input
            type="radio"
            id="convite"
            name="tipo_revistinha"
            value="convite"
          />
          Convite
        </label>

        <label for="lembranca">
          <input
            type="radio"
            id="lembranca"
            name="tipo_revistinha"
            value="lembranca"
          />
          Lembrança
        </label>

        <label for="convite-lembranca">
          <input
            type="radio"
            id="convite-lembranca"
            name="tipo_revistinha"
            value="convite-lembranca"
          />
          Convite-Lembrança
        </label>
      </div>

      <label for="quantidade">Quantidade:</label>
      <input type="text" id="quantidade" name="quantidade" />

      <label for="atracoes">Atrações do evento:</label>
      <textarea id="atracoes" name="atracoes" rows="4" ></textarea>

      <label for="aceito_sugestoes">
        <input
          type="checkbox"
          id="aceito_sugestoes"
          name="aceito_sugestoes"
          value="sim"
        />
        Aceito sugestões de texto para a capa
      </label>

      <label for="imagens">Imagens:</label>
      <input
        type="file"
        id="imagens"
        name="imagens"
        accept="image/*"
        multiple
      />

      <button type="submit" name="submit" id="submit">CONTINUAR</button>
    </form>
  </div>

  <script>
    // Aplica máscara ao campo de telefone (xxx) xxxxx-xxxx
    document.getElementById('telefone').addEventListener('input', function (e) {
      var tel = e.target.value.replace(/\D/g, '');
      var match = tel.match(/^(\d{0,2})(\d{0,5})(\d{0,4})$/);
      if (match) {
        e.target.value = !match[2] ? match[1] : '(' + match[1] + ')' + match[2] + (match[3] ? '-' + match[3] : '');
      } else {
        e.target.value = '';
      }
    });

    // Valida o campo de e-mail usando uma expressão regular
    document.getElementById('email').addEventListener('change', function (e) {
      var email = e.target.value;
      var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
      if (!emailPattern.test(email)) {
        alert('Por favor, insira um e-mail válido.');
        e.target.value = '';
      }
    });
  </script>
</body>
</html>
