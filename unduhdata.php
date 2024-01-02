<?php
include 'koneksi2.php';

// Load library TCPDF
require_once('tcpdf/tcpdf.php');

// Buat objek TCPDF
$pdf = new TCPDF();

// Tambahkan halaman
$pdf->AddPage();

// Query untuk mendapatkan data mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

// Tampilkan data dalam tabel pada PDF
$html = '<table border="1">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>No HP</th>
                <th>Kelas</th>
            </tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['nim'] . '</td>
                <td>' . $row['nama'] . '</td>
                <td>' . $row['alamat'] . '</td>
                <td>' . $row['jenis_kelamin'] . '</td>
                <td>' . $row['tanggal_lahir'] . '</td>
                <td>' . $row['jurusan'] . '</td>
                <td>' . $row['no_hp'] . '</td>
                <td>' . $row['kelas'] . '</td>
            </tr>';
}

$html .= '</table>';

// Tambahkan tabel ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF sebagai file untuk diunduh
$pdf->Output('data_mahasiswa.pdf', 'D');

// Tutup koneksi database
$conn->close();
?>