public function laporan_pdf(){

    $data = array(
        "dataku" => array(
            "nama" => "Petani Kode",
            "url" => "http://petanikode.com"
        )
    );

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-petanikode.pdf";
    $this->pdf->load_view('laporan_pdf', $data);


}