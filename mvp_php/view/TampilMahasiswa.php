<?php

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa;
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td> 
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td> 
			<td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
			<td>
				<a href='index.php?id=" . $this->prosesmahasiswa->getId($i) . "' 
	   				style='padding: 6px 12px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; margin-right: 5px;'>Edit</a>
	   
				<a href='javascript:void(0)' onclick='confirmDelete(" . $this->prosesmahasiswa->getId($i) . ", \"" . $this->prosesmahasiswa->getNama($i) . "\")' 
	  				style='padding: 6px 12px; background-color: #f44336; color: white; text-decoration: none; border-radius: 4px;'>Delete</a>
			</td>
			</tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/indextable.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function directAdd()
	{
		$this->tpl = new Template("templates/form.html");
		
		$this->tpl->replace("DATA_JUDUL", "Tambah Mahasiswa");
		$this->tpl->replace("DATA_ID", "");
		$this->tpl->replace("DATA_NIM", "");
		$this->tpl->replace("DATA_NAMA", "");
		$this->tpl->replace("DATA_TEMPAT", "");
		$this->tpl->replace("DATA_TL", "");
		$this->tpl->replace("DATA_EMAIL", "");
		$this->tpl->replace("DATA_TELEPON", "");
		$this->tpl->replace("DATA_SELECTED_LAKI", "");
		$this->tpl->replace("DATA_SELECTED_PEREMPUAN", "");

		$this->tpl->write();
	}

	function addToDB($data){
		$result = $this->prosesmahasiswa->addMahasiswa($data);
		header("Location: index.php?status=success");
		exit;	
	}

	function directEdit($id)
	{
		$this->tpl = new Template("templates/form.html");
		
		$this->tpl->replace("DATA_JUDUL", "Edit Mahasiswa");

		// Mengambil data mahasiswa dari presenter
		$row = $this->prosesmahasiswa->getMahasiswaById($id);

		$this->tpl->replace("DATA_ID", $row['id']);
		$this->tpl->replace("DATA_NIM", $row['nim']);
		$this->tpl->replace("DATA_NAMA", $row['nama']);
		$this->tpl->replace("DATA_TEMPAT", $row['tempat']);
		$this->tpl->replace("DATA_TL", $row['tl']);
		$this->tpl->replace("DATA_EMAIL", $row['email']);
		$this->tpl->replace("DATA_TELEPON", $row['telp']);

		if ($row['gender'] == "Laki-laki") {
			$this->tpl->replace("DATA_SELECTED_LAKI", "selected");
			$this->tpl->replace("DATA_SELECTED_PEREMPUAN", "");
		} else {
			$this->tpl->replace("DATA_SELECTED_LAKI", "");
			$this->tpl->replace("DATA_SELECTED_PEREMPUAN", "selected");
		}

		$this->tpl->write();
	}

	function editAtDB($data){
		$this->prosesmahasiswa->updateMahasiswa($data);
		header("Location: index.php?status=edited");
	}
	
	function deleteAtDB($id){
		$this->prosesmahasiswa->deleteMahasiswa($id);
		header("Location: index.php");
	}
}