<?php

class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getMahasiswaById($id)
	{
		// Query mysql select data mahasiswa berdasarkan id
		$query = "SELECT * FROM mahasiswa WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function insertMahasiswa($data)
	{
        $nim = $data['nim'];
		$nama = $data['nama'];
        $tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telepon'];
		
		// Query mysql insert data mahasiswa
		$query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$email', '$telepon')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function updateMahasiswa($data)
	{
		$id = $data['id'];
		$nim = $data['nim'];
		$nama = $data['nama'];
        $tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telepon'];

		// Query mysql update data mahasiswa
		$query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telepon' WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteMahasiswa($id)
	{
		// Query mysql delete data mahasiswa
		$query = "DELETE FROM mahasiswa WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
}