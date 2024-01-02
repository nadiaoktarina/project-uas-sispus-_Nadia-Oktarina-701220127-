<?php
include 'koneksi2.php';

// Load library TCPDF
require_once('tcpdf/tcpdf.php');

// Buat objek TCPDF
$pdf = new TCPDF();

// Tambahkan halaman
$pdf->AddPage();

// Query untuk mendapatkan data peminjaman
$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

// Tampilkan data dalam tabel pada PDF
$html = '<table border="1">
            <tr>
              <th>id buku</th>
              <th>judul buku</th>
              <th>isbn</th>
              <th>penerbit</th>
              <th>tahun terbit</th>
              <th>stok buku</th>
              <th>dipinjam</th>
              <th>tanggal masuk</th>
            </tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id_buku'] . '</td>
                <td>' . $row['title'] . '</td>
                <td>' . $row['isbn'] . '</td>
                <td>' . $row['penerbit'] . '</td>
                <td>' . $row['tahunterbit'] . '</td>
                <td>' . $row['stokbuku'] . '</td>
                <td>' . $row['dipinjam'] . '</td>
                <td>' . $row['tanggalmasuk'] . '</td>
            </tr>';
}

$html .= '</table>';

// Tambahkan tabel ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF sebagai file untuk diunduh
$pdf->Output('data_buku.pdf', 'D');

// Tutup koneksi database
$conn->close();
?>