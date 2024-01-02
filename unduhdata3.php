<?php
include 'koneksi2.php';

// Load library TCPDF
require_once('tcpdf/tcpdf.php');

// Buat objek TCPDF
$pdf = new TCPDF();

// Tambahkan halaman
$pdf->AddPage();

// Query untuk mendapatkan data peminjaman
$sql = "SELECT * FROM pinjam";
$result = $conn->query($sql);

// Tampilkan data dalam tabel pada PDF
$html = '<table border="1">
            <tr>
              <th>Id Peminjaman</th>
              <th>Nama anggota</th>
              <th>Status</th>
              <th>Tanggal pinjam</th>
              <th>Lama pinjam</th>
              <th>Tanggal balik</th>
            </tr>';

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $row['id_pinjam'] . '</td>
                <td>' . $row['nama_anggota'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>' . $row['tgl_pinjam'] . '</td>
                <td>' . $row['lama_pinjam'] . '</td>
                <td>' . $row['tgl_balik'] . '</td>
            </tr>';
}

$html .= '</table>';

// Tambahkan tabel ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF sebagai file untuk diunduh
$pdf->Output('data_peminjaman.pdf', 'D');

// Tutup koneksi database
$conn->close();
?>