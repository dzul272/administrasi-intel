<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function aw()
	{
		$data = $this->m_data->getData("desa")->result();
		die(json_encode($data));
	}

	public function sani($nik = NULL)
	{
		$data = json_decode(urlNik($nik));
		if ($data->respon_code == 1) {
			echo json_encode($data->content[0]);
		} else {
			echo "data ga ketemu";
		}

		// echo cariNik($nik);
	}

	public function wkwk()
	{
		$url = "http://durenmas.banjarnegarakab.go.id:8081/ws_server/get_json/10_wanadadi/carinik?USER_ID=PRATAMAYUDHASANTOSA&PASSWORD=10_wanadadi&NIK=3304121310730002";
		// $json = file_get_contents($url);
		// echo $json;
		// die();

		// $ch = curl_init();        
		// curl_setopt($ch, CURLOPT_URL, $url);              
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);     
		// $result = curl_exec($ch);    
		// curl_close($ch);

		// echo $result;


		$client = new \GuzzleHttp\Client();
		$response = $client->request(
			"GET",
			$url
		);
		echo ($response->getBody());
	}


	public function jajal_slur()
	{
		echo "aw";
	}

	public function wa()
	{
		// echo md5("ultranesia.com");
		// echo $this->encryption->encrypt("1");		
		// echo $this->encryption->decrypt(DESA_ID);		

	}

	public function ip()
	{
		echo get_external_ip();
	}

	public function coba()
	{
		$file = "assets/surat/template/surat_pengantar.rtf";
		if (is_file($file)) {
			$handleFile = fopen($file, 'r');
			$bufferFile = stream_get_contents($handleFile);
			$bufferFile = str_replace("[pamong]", "Rafli Firdausy Irawan", $bufferFile);
			fclose($handleFile);

			$path_arsip = "assets/surat/arsip/";
			$berkas_arsip = $path_arsip . date("Y_M_d_H_i_s") . ".rtf";
			$handle = fopen($berkas_arsip, 'w+');
			fwrite($handle, $bufferFile);
			fclose($handle);
		}
	}
}
