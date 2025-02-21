<?php
// save_note.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['note'])) {
        $note = $_POST['note'];
        // Simpan catatan ke file note.txt
        file_put_contents("note.txt", $note);
        echo "Success";
    } else {
        echo "No note provided";
    }
} else {
    echo "Invalid request method.";
}
?>
