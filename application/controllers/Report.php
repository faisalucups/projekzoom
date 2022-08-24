<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
    $this->load->model('M_admin');
  }

  public function KeluarroomManual()
  {

    //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);//

    // document informasi
    //$pdf->SetCreator('Web Aplikasi Room');
    //$pdf->SetTitle('Laporan Data Room Keluar');
    //$pdf->SetSubject('Room Keluar');

    //header Data
    //$pdf->SetHeaderData('unsada.jpg',30,'Laporan Data','Room Keluar',array(203, 58, 44),array(0, 0, 0));
    //$pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


    //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    //$pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

    //$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    //$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
    //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    //$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    //$pdf->setFontSubsetting(true);

    //$pdf->SetFont('helvetica','',14,'',true);

    //$pdf->AddPage('L');

    $html =
      '<div>
        <h1 align="center">Invoice Bukti Aktivitas Zoom</h1>
        <p>No nama  :</p>
        <p>Ditunjukan Untuk :</p>
        <p>Tanggal          :</p>
        <p>Po.Customer      :</p>


        <table border="1">
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">Nama</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:130px" align="center">Cabang si</th>
            <th style="width:140px" align="center">Jam</th>
            <th style="width:140px" align="center">Selesai</th>
            <th style="width:140px" align="center">Topik</th>
            <th style="width:80px" align="center">Room</th>
            <th style="width:80px" align="center">Jumlah</th>
          </tr>';

    $html .= '<tr>
                    <td style="height:180px"></td>
                    <td  style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                    <td style="height:180px"></td>
                 </tr>
                 <tr>
                  <td align="center" colspan="8">Jumlah</td>
                  <td></td>
                 </tr>';



    $html .= '
            </table>
            <h6>Mengetahui</h6><br>
            <h6>Admin</h6>
          </div>';

    //$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

    //$pdf->Output('contoh_report.pdf','I');
  }

  //public function Keluarroom()
  //{
  //$id = $this->uri->segment(3);
  //$tgl1 = $this->uri->segment(4);
  //$tgl2 = $this->uri->segment(5);
  //$tgl3 = $this->uri->segment(6);
  //$ls   = array('id_nama' => $id, 'tanggal_keluar' => $tgl1 . '/' . $tgl2 . '/' . $tgl3);
  //$data = $this->M_admin->get_data('tb_keluar_room', $ls);

  //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // document informasi
  // $pdf->SetCreator('Web Aplikasi Room');
  //$pdf->SetTitle('Laporan Data Keluar Room');
  //$pdf->SetSubject('Keluar Room');

  //header Data
  //$pdf->SetHeaderData('unsada.jpg',30,'Laporan Data','Keluar Room',array(203, 58, 44),array(0, 0, 0));
  //$pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


  //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  //$pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

  //$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  //set margin
  //$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
  //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  //$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

  //SET Scaling ImagickPixel
  //$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  //FONT Subsetting
  //$pdf->setFontSubsetting(true);

  //$pdf->SetFont('helvetica','',14,'',true);

  //$pdf->AddPage('L');

  //$html =
  //'<div>
  //<h1 align="center">Invoice Bukti Aktivitas Zoom</h1><br>
  //<p>nama  : ' . $id . '</p>
  //<p>Ditunjukan Untuk :</p>
  //<p>Tanggal          : ' . $tgl1 . '/' . $tgl2 . '/' . $tgl3 . '</p>
  //<p>Po.Customer      :</p>


  //<table border="1">
  //<tr>
  //<th style="width:40px" align="center">No</th>
  //<th style="width:110px" align="center">nama</th>
  //<th style="width:110px" align="center">Tanggal Masuk</th>
  //<th style="width:110px" align="center">Tanggal Keluar</th>
  //<th style="width:130px" align="center">Cabang si</th>
  //<th style="width:140px" align="center">jam</th>
  //<th style="width:140px" align="center">Selesai</th>
  //<th style="width:140px" align="center">Topik</th>
  //<th style="width:80px" align="center">Room</th>
  //<th style="width:80px" align="center">Jumlah</th>
  //</tr>';


  //$no = 1;
  //foreach ($data as $d) {
  //$html .= '<tr>';
  //$html .= '<td align="center">' . $no . '</td>';
  //$html .= '<td align="center">' . $d->id . '</td>';
  //$html .= '<td align="center">' . $d->nama . '</td>';
  //$html .= '<td align="center">' . $d->tanggal_masuk . '</td>';
  //$html .= '<td align="center">' . $d->tanggal_keluar . '</td>';
  //$html .= '<td align="center">' . $d->cabang_si . '</td>';
  //$html .= '<td align="center">' . $d->jam . '</td>';
  //$html .= '<td align="center">' . $d->selesai . '</td>';
  //$html .= '<td align="center">' . $d->topik . '</td>';
  //$html .= '<td align="center">' . $d->room . '</td>';
  //$html .= '<td align="center">' . $d->jumlah . '</td>';
  //$html .= '</tr>';

  //$html .= '<tr>';
  //$html .= '<td align="center" colspan="8"><b>Jumlah</b></td>';
  //$html .= '<td align="center">' . $d->jumlah . '</td>';
  //$html .= '</tr>';
  //$no++;
  //}


  //$html .= '
  //</table><br>
  //<h6>Mengetahui</h6><br><br><br>
  //<h6>Admin</h6>
  //</div>';

  //$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

  //$pdf->Output('invoice_keluar_room.pdf','I');

  //}
}
