<?php

namespace App\Libraries;

class PdfGenerator
{
    public function generatePdf()
    {
        $pdf = new \TCPDF();

        // Atur konfigurasi PDF seperti margin, ukuran halaman, dll.
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetPageSize('A4');

        // Tulis konten PDF
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Hello, TCPDF!', 0, 1, 'C');

        // Simpan PDF ke file
        $pdf->Output('output.pdf', 'I');
    }
}
