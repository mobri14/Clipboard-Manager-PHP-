<?php
$file = "notes.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = trim($_POST["note"]);

    if (!empty($note)) {
        file_put_contents(
            $file,
            $note . PHP_EOL,
            FILE_APPEND
        );
    }
}

$notes = [];

if (file_exists($file)) {
    $notes = file($file, FILE_IGNORE_NEW_LINES);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clipboard Manager</title>
</head>
<body>

<h2>Clipboard Manager</h2>

<form method="POST">
    <textarea
        name="note"
        rows="5"
        cols="50"
        placeholder="Paste text here..."
    ></textarea>

    <br><br>

    <button type="submit">
        Save
    </button>
</form>

<hr>

<h3>Saved Notes</h3>

<?php foreach ($notes as $note): ?>
    <div>
        <?php echo htmlspecialchars($note); ?>
    </div>
    <hr>
<?php endforeach; ?>

</body>
</html>
