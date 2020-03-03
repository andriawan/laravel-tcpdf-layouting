<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf', function () {
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetMargins(10, 0, 15, true);
		$pdf->SetAuthor('TEST');
		$pdf->SetTitle('DATA TEST');
		$pdf->SetSubject('REPORT');
		$pdf->SetCellPadding(0);

		$pdf->AddPage();
        $view = view('pdf')->render();
        // $view = '<h1>test</h1>';
		$pdf->writeHTML($view, true, 0, true, 0);
		$pdf->Output('report.pdf', 'I');
});
