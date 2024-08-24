<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h3 class="text-2xl font-bold mb-4">Daftar Pemasukan</h3>

    <!-- Tabel untuk Daftar Pemasukan -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi database
            include 'koneksi.php';

            // Query untuk Pemasukan
            $sql_income = "SELECT * FROM transactions WHERE type = 'income' ORDER BY date DESC";
            $result_income = $conn->query($sql_income);

            if ($result_income->num_rows > 0) {
                while($row = $result_income->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['category'] . "</td>
                            <td class='text-green-600'>+$" . $row['amount'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No income records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h3 class="text-2xl font-bold mb-4">Daftar Pengeluaran</h3>

    <!-- Tabel untuk Daftar Pengeluaran -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Category</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk Pengeluaran
            $sql_expense = "SELECT * FROM transactions WHERE type = 'expense' ORDER BY date DESC";
            $result_expense = $conn->query($sql_expense);

            if ($result_expense->num_rows > 0) {
                while($row = $result_expense->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['category'] . "</td>
                            <td class='text-red-600'>-$" . $row['amount'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No expense records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <h2 class="text-3xl font-bold mb-4">Daftar Pemasukan</h2>
    <!-- Tabel Pemasukan -->
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query untuk mengambil data pemasukan
            $sql_income = "SELECT * FROM transactions WHERE type = 'income' ORDER BY date DESC";
            $result_income = $conn->query($sql_income);

            if ($result_income->num_rows > 0) {
                // Output data untuk setiap baris
                while($row = $result_income->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['category'] . "</td>
                            <td class='text-success'>+" . $row['amount'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data pemasukan</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 class="text-3xl font-bold mt-5 mb-4">Daftar Pengeluaran</h2>
    <!-- Tabel Pengeluaran -->
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mengambil data pengeluaran
            $sql_expense = "SELECT * FROM transactions WHERE type = 'expense' ORDER BY date DESC";
            $result_expense = $conn->query($sql_expense);

            if ($result_expense->num_rows > 0) {
                // Output data untuk setiap baris
                while($row = $result_expense->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['category'] . "</td>
                            <td class='text-danger'>-" . $row['amount'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data pengeluaran</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>


