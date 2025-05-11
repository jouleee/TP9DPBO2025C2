<?php

interface KontrakView{
	public function tampil();
	public function directAdd();
	public function directEdit($id);
	public function addToDB($data);
	public function editAtDB($data);
	public function deleteAtDB($id);
}
?>