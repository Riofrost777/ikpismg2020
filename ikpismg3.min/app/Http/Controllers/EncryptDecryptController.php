<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptDecryptController extends Controller
{
    public function encrypt(){
		$encrypted = Crypt::encryptString('Belajar Laravel Di malasngoding.com');
		$decrypted = Crypt::decryptString($encrypted);
 
		echo "Hasil Enkripsi : " . $encrypted;
		echo "<br/>";
		echo "<br/>";
		echo "Hasil Dekripsi : " . $decrypted;
	}

	public function data(){
		
		$parameter =[
			'nama' => 'Rio Rizki Rahardjo',
			'pekerjaan' => 'Programmer',
		];
		$enkripsi= Crypt::encrypt($parameter);
		echo "<a href='/data/".$enkripsi."'>Klik</a>";
	}
 
	public function data_proses($data){
		$data = Crypt::decrypt($data);
 
		echo "Nama : " . $data['nama'];
		echo "<br/>";
		echo "Pekerjaan : " . $data['pekerjaan'];
	}
}
