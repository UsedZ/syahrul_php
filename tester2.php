<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Form Entry Data Pengguna</h1>
    <form method="post" action="process.php">
        <!-- Input untuk Nama -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

        <!-- Input untuk Jenis Kelamin -->
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="" disabled selected>Pilih jenis kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <!-- Input untuk NIK -->
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" placeholder="Masukkan NIK" maxlength="16" required>

        <!-- Input untuk Tempat Lahir -->
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" required>

        <!-- Input untuk Tanggal Lahir -->
        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required>

        <!-- Input untuk Pertanyaan -->
        <label for="pertanyaan">Pertanyaan:</label>
        <textarea id="pertanyaan" name="pertanyaan" rows="4" placeholder="Tuliskan pertanyaan Anda" required></textarea>

        <!-- Tombol Submit -->
        <button type="submit">Submit</button>
    </form>

</body>
</html>
