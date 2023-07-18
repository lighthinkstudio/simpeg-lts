<?php
use App\Models\Konfigurasi;


if(!function_exists('konfigurasi'))
{
	function konfigurasi($key=null)
	{
		$konfigurasi = Konfigurasi::select('nama', 'label', 'deskripsi')->where('nama', $key)->first();

		if(!empty($konfigurasi))
		{
			return $konfigurasi;
		}
		else
		{
			$konfigurasi = [
				'nama'		=> null,
				'label'		=> null,
				'deskripsi'	=> null,
			];
			return $konfigurasi;
		}
	}
}

if(!function_exists('tanggal'))
{
	// FUNGSI UNTUK MERUBAH TANGGAL INDONESIA
	function tanggal($date, $format=null)
	{
		// FORMAT ULANG TANGGAL
		$date = new DateTime($date);
		$date = $date->format('N-d-m-Y');

		// FORMAT NAMA HARI LENGKAP
		$L_ID = [
			1 => "SENIN",
			"SELASA",
			"RABU",
			"KAMIS",
			"JUM'AT",
			"SABTU",
			"MINGGU"
		];

		// FORMAT NAMA BULAN 3 KARAKTER
		$M_ID = [
			1 => "JAN",
			"FEB",
			"MAR",
			"APR",
			"MEI",
			"JUN",
			"JUL",
			"AGU",
			"SEP",
			"OKT",
			"NOV",
			"DES"
		];

		// FORMAT NAMA BULAN LENGKAP
		$F_ID = [
			1 => "JANUARI",
			"FEBRUARI",
			"MARET",
			"APRIL",
			"MEI",
			"JUNI",
			"JULI",
			"AGUSTUS",
			"SEPTEMBER",
			"OKTOBER",
			"NOVEMBER",
			"DESEMBER"
		];


		// MEMISAHKAN TANGGAL
		$pecah		= explode('-', $date);
		$hari		= $pecah[0];
		$tanggal	= $pecah[1]; 
		$bulan		= $pecah[2]; 
		$tahun		= $pecah[3];

		// MEMBUAT FORMAT TANGGAL BERDASARKAN PARAMETER $format
		switch($format) {

			// FORMAT TANGGAL -> Senin, 1 Jan 2023
			case 'L, j M Y';
				echo $L_ID[(int) $hari] .', '. (int) $tanggal .' '. $M_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> Senin, 01 Jan 2023
			case 'L, d M Y';
				echo $L_ID[(int) $hari] .', '. $tanggal .' '. $M_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> Senin, 1 Januari 2023
			case 'L, j F Y';
				echo $L_ID[(int) $hari] .', '. (int) $tanggal .' '. $F_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> Senin, 01 Januari 2023
			case 'L, d F Y';
				echo $L_ID[(int) $hari] .', '. $tanggal .' '. $F_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> 1 Jan 2023
			case 'j M Y';
				echo (int) $tanggal .' '. $M_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> 01 Jan 2023
			case 'd M Y';
				echo $tanggal .' '. $M_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> 1 Januari 2023
			case 'j F Y';
				echo (int) $tanggal .' '. $F_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> 01 Januari 2023
			case 'd F Y';
				echo $tanggal .' '. $F_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> 1 Jan
			case 'j M';
				echo (int) $tanggal .' '. $M_ID[(int) $bulan];
				break;

			// FORMAT TANGGAL -> 01 Jan
			case 'd M';
				echo $tanggal .' '. $M_ID[(int) $bulan];
				break;

			// FORMAT TANGGAL -> 1 Januari
			case 'j F';
				echo (int) $tanggal .' '. $F_ID[(int) $bulan];
				break;

			// FORMAT TANGGAL -> 01 Januari
			case 'd F';
				echo $tanggal .' '. $F_ID[(int) $bulan];
				break;

			// FORMAT TANGGAL -> Jan 2023
			case 'M Y';
				echo $M_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> Januari 2023
			case 'F Y';
				echo $F_ID[(int) $bulan] .' '. $tahun;
				break;

			// FORMAT TANGGAL -> 1
			case 'j';
				echo (int) $tanggal;
				break;

			// FORMAT TANGGAL -> 01
			case 'd';
				echo $tanggal;
				break;

			// FORMAT BULAN -> 1
			case 'n';
				echo (int) $bulan;
				break;

			// FORMAT BULAN -> 01
			case 'm';
				echo $bulan;
				break;

			// FORMAT BULAN -> Jan
			case 'M';
				echo $M_ID[(int) $bulan];
				break;

			// FORMAT BULAN -> Januari
			case 'F';
				echo $F_ID[(int) $bulan];
				break;

			// FORMAT TANGGAL DEFAULT -> 01-01-2023
			default:
				echo $tanggal .'-'. $bulan .'-'. $tahun;

		}
	}
}