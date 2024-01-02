<?php
include 'koneksi2.php';

// Load library TCPDF
require_once('tcpdf/tcpdf.php');

// Buat objek TCPDF
$pdf = new TCPDF();

// Tambahkan halaman
$pdf->AddPage();

// Query untuk mendapatkan data peminjaman
$sql = "SELECT * FROM kembali";
$result = $conn->query($sql);

// Tampilkan data dalam tabel pada PDF
$html = '<table border="1">
            <tr>
              <th>id pinjam</th>
              <th>nama buku</th>
              <th>nama anggota</th>
              <th>status</th>
              <th>tanggal pinjam</th>
              <th>lama pinjam</th>
              <th>tanggal kembali</th>
              <th>denda</th>
            </tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id_pinjam'] . '</td>
                <td>' . $row['nama_buku'] . '</td>
                <td>' . $row['nama_anggota'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>' . $row['tgl_pinjam'] . '</td>
                <td>' . $row['lama_pinjam'] . '</td>
                <td>' . $row['tgl_kembali'] . '</td>
                <td>' . $row['denda'] . '</td>
            </tr>';
}

$html .= '</table>';

// Tambahkan tabel ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF sebagai file untuk diunduh
$pdf->Output('data_pengembalian.pdf', 'D');

// Tutup koneksi database
$conn->close();
?>