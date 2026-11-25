<?php
$visor = '0';
$num1 = $_GET['numero'] ?? '';
$num2 = $_GET['numero2'] ?? '';

if ($num1 !== '') {
    $n1 = (float)$num1;
    $n2 = ($num2 !== '') ? (float)$num2 : 0;

    if (isset($_GET['somar'])) {
        $res = $n1 + $n2;
        $visor = "$n1 + $n2 = $res";
    } elseif (isset($_GET['multiplicar'])) {
        $res = $n1 * $n2;
        $visor = "$n1 × $n2 = $res";
    } elseif (isset($_GET['subtrair'])) {
        $res = $n1 - $n2;
        $visor = "$n1 - $n2 = $res";
    } elseif (isset($_GET['dividir'])) {
        if ($n2 != 0) {
            $res = $n1 / $n2;
            $visor = "$n1 ÷ $n2 = $res";
        } else {
            $visor = "Erro: Divisão por zero";
        }
    } elseif (isset($_GET['raiz'])) {
        if ($n1 >= 0) {
            $res = sqrt($n1);
            $visor = "√$n1 = $res";
        } else {
            $visor = "Erro: Número negativo";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora do Ary</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #cfeef3;
    }
    .calc-container {
      max-width: 400px;
      margin: 40px auto;
    }
    .visor-box {
      border: 1px solid #fffbd5;
      border-radius: 12px;
      min-height: 60px;
      padding: 12px 16px;
      font-size: 1.35rem;
      font-weight: 500;
      background-color: #cbeecc;
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }
  </style>
</head>
<body>

  <div class="calc-container px-3">
    <h2 class="text-center mb-4">Calculadora do Ary</h2>

    <form action="" method="get">
      <!-- Visor -->
      <div class="visor-box mb-3">
        <?php echo htmlspecialchars($visor); ?>
      </div>

      <div class="mb-2">
        <label class="form-label mb-1">Digite o primeiro número</label>
        <input type="number" step="any" name="numero" value="<?php echo htmlspecialchars($num1); ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label mb-1">Digite o segundo número</label>
        <input type="number" step="any" name="numero2" value="<?php echo htmlspecialchars($num2); ?>" class="form-control">
      </div>

      
      <div class="d-grid gap-2">
        <button type="submit" name="somar" value="1" class="btn btn-primary">Somar (+)</button>
        <button type="submit" name="multiplicar" value="1" class="btn btn-primary">Multiplicar (x)</button>
        <button type="submit" name="subtrair" value="1" class="btn btn-primary">Subtrair (-)</button>
        <button type="submit" name="dividir" value="1" class="btn btn-primary">Dividir (÷)</button>
        <button type="submit" name="raiz" value="1" class="btn btn-success">Raiz quadrada (√)</button>
        <a href="index.php" class="btn btn-danger">Apagar</a>
      </div>
    </form>
  </div>

</body>
</html>