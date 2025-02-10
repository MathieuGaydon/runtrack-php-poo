<?php
session_start();
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array(
        ['', '', ''],
        ['', '', ''],
        ['', '', '']
    );
    $_SESSION['turn'] = 'X';
}
function check_winner($board) {
    // Vérifier les lignes, les colonnes et les diagonales
    for ($i = 0; $i < 3; $i++) {
        if ($board[$i][0] === $board[$i][1] && $board[$i][1] === $board[$i][2] && $board[$i][0] !== '') {
            return $board[$i][0];
        }
        if ($board[0][$i] === $board[1][$i] && $board[1][$i] === $board[2][$i] && $board[0][$i] !== '') {
            return $board[0][$i];
        }
    }
    // Vérifier les diagonales
    if ($board[0][0] === $board[1][1] && $board[1][1] === $board[2][2] && $board[0][0] !== '') {
        return $board[0][0];
    }
    if ($board[0][2] === $board[1][1] && $board[1][1] === $board[2][0] && $board[0][2] !== '') {
        return $board[0][2];
    }
    return null;
}
// Gérer un clic sur une cellule
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['row']) && isset($_POST['col'])) {
    $row = $_POST['row'];
    $col = $_POST['col'];

    // Ne pas permettre de jouer sur une case déjà occupée
    if ($_SESSION['board'][$row][$col] === '') {
        $_SESSION['board'][$row][$col] = $_SESSION['turn'];

        
        $_SESSION['turn'] = ($_SESSION['turn'] === 'X') ? 'O' : 'X';
    }
}
$winner = check_winner($_SESSION['board']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <style>
        table {
            width: 300px;
            height: 300px;
            border: 1px solid #000;
            border-collapse: collapse;
        }
        td {
            width: 33%;
            height: 33%;
            text-align: center;
            font-size: 2rem;
            border: 1px solid #000;
            cursor: pointer;
            position: relative;
        }
        td button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background: transparent;
            border: none;
        }
        .winner {
            color: green;
            font-size: 2rem;
        }
    </style>
</head>
<body>

<h1>Tic-Tac-Toe</h1>

<?php if ($winner): ?>
    <p class="winner">Le joueur <?php echo $winner; ?> a gagné !</p>
<?php elseif (array_filter(array_map('implode', $_SESSION['board'])) === 9): ?>
    <p>Match nul !</p>
<?php else: ?>
    <p>C'est au tour de : <?php echo $_SESSION['turn']; ?></p>
<?php endif; ?>

<table>
    <?php for ($row = 0; $row < 3; $row++): ?>
        <tr>
            <?php for ($col = 0; $col < 3; $col++): ?>
                <td>
                    <?php if ($_SESSION['board'][$row][$col] === ''): ?>
                        <form method="POST">
                            <input type="hidden" name="row" value="<?php echo $row; ?>">
                            <input type="hidden" name="col" value="<?php echo $col; ?>">
                            <button type="submit"></button>
                        </form>
                    <?php else: ?>
                        <?php echo $_SESSION['board'][$row][$col]; ?>
                    <?php endif; ?>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>

<form method="POST">
    <button type="submit" name="reset" value="1">Réinitialiser le jeu</button>
</form>

<?php
// Réinitialiser le jeu si nécessaire
if (isset($_POST['reset'])) {
    $_SESSION['board'] = array(
        ['', '', ''],
        ['', '', ''],
        ['', '', '']
    );
    $_SESSION['turn'] = 'X';
}
?>

</body>
</html>
