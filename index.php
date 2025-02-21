<?php
// index.php

// Baca isi catatan dari file note.txt (jika ada)
$noteContent = "";
$file = "note.txt";
if (file_exists($file)) {
    $noteContent = file_get_contents($file);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Notepad Online</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    textarea {
      width: 100%;
      height: 300px;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Notepad Online</h1>
  <textarea id="note" placeholder="Tulis catatanmu di sini..."><?php echo htmlspecialchars($noteContent); ?></textarea>
  <br>
  <button id="saveBtn">Simpan Catatan</button>

  <script>
    // Menggunakan AJAX untuk mengirim data ke save_note.php
    document.getElementById("saveBtn").addEventListener("click", function(){
      var noteContent = document.getElementById("note").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "save_note.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert("Catatan berhasil disimpan!");
        }
      };
      xhr.send("note=" + encodeURIComponent(noteContent));
    });
  </script>
</body>
</html>
