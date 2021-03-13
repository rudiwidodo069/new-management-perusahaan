<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dompdf
{

    public function print_pdf($html, $filename, $paper = 'A4', $orientation = "portrait")
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }
}
