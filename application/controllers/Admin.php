<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
					$data['judul']		 = "Welcome to Admin $ceks";
					$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');
					$data['v_berita']  = $this->Mcrud->get_data_join('tbl_berita','tbl_kat_berita','id_kat_berita');
					$data['v_galeri']  = $this->Mcrud->get_data('tbl_galeri');
					$data['v_web']  	 = $this->Mcrud->get_data('tbl_web')->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/beranda', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_web 	= htmlentities(strip_tags($_POST['nama_web']));
							$phone 		  = htmlentities(strip_tags($_POST['phone']));
							$website 		= htmlentities(strip_tags($_POST['website']));
							$email 		  = htmlentities(strip_tags($_POST['email']));
							$alamat 		= htmlentities(strip_tags($_POST['alamat']));
							$fb 		    = htmlentities(strip_tags($_POST['fb']));
							$twitter 		= htmlentities(strip_tags($_POST['twitter']));
							$instagram 	= htmlentities(strip_tags($_POST['instagram']));
							$youtube 		= htmlentities(strip_tags($_POST['youtube']));

									$data = array(
										'nama_web'		=> $nama_web,
										'phone'				=> $phone,
										'website'			=> $website,
										'email'				=> $email,
										'alamat'			=> $alamat,
										'fb'				  => $fb,
										'twitter'			=> $twitter,
										'instagram'		=> $instagram,
										'youtube'			=> $youtube
										);
									$this->Mcrud->update_data('tbl_web', array('id_web' => 1), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Pengaturan WEB berhasil diperbarui.
										 </div>'
									 );

							redirect('admin');
					}
		}
	}


	public function login()
	{
		$ceks = $this->session->userdata('username@2017');
		if(isset($ceks)) {
			redirect('');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						//  $pass	   = htmlentities(strip_tags(md5($_POST['password'])));
						 $pass	   = htmlentities(strip_tags($_POST['password']));

						 $query  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $username);
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('admin/login');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('admin/login');
										 } else {

																$this->session->set_userdata('username@2017', "$cekun");

																redirect('admin');
										 }
						 }
				}
		}
	}


	public function logout() {
     if ($this->session->has_userdata('username@2017')) {
         $this->session->sess_destroy();
         redirect('');
     }
     redirect('');
  }


	public function lupa_password()
	{
		$ceks = $this->session->userdata('kamar@2017');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/lupa_password');
			$this->load->view('admin/login/footer');
		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
				$data['judul'] 		 = "Profile $ceks";
				$data['v_admin']   = $this->Mcrud->get_data('tbl_admin');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$username 	= htmlentities(strip_tags($this->input->post('username')));
						$password 	= htmlentities(strip_tags($this->input->post('password')));

						$cek_data = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $username);
						if ($cek_data->num_rows() == 0) {
								$status = "update";
						}else{
								if ($username == $ceks) {
										$status = "update";
								}else{
										$status = "";
								}
						}

						if ($status == "update") {
								$data = array(
									'username'	=> $username,
									'password'	=> md5($password)
								);
								$this->Mcrud->update_data('tbl_admin', array('username' => $ceks), $data);
								$this->session->has_userdata('username@2017');
								$this->session->set_userdata('username@2017', "$username");
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
								);
						}else{
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Username '.$username.' sudah ada.
									</div>'
								);
						}

						redirect('admin/profile');
					}

		}
	}



	public function kat_berita()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['judul']				= "Kategori Berita";
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);

			$this->db->order_by('nama_kat_berita', 'ASC');
			$data['v_kat_berita'] = $this->Mcrud->get_data('tbl_kat_berita');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/berita/kat_berita', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kat_berita 		= htmlentities(strip_tags($_POST['nama_kat_berita']));

									$data = array(
										'nama_kat_berita'			=> $nama_kat_berita
										);
									$this->Mcrud->save_data('tbl_kat_berita', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Kategori Berita berhasil ditambahkan.
										 </div>'
									 );

							redirect('admin/kat_berita');
					}

		}
	}


	public function kat_berita_edit($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/kat_berita');
			}
			$data['judul']				= "Edit Kategori Berita";
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kat_berita'] = $this->Mcrud->get_data_by_pk('tbl_kat_berita', 'id_kat_berita', $id)->row();

				if ($data['v_kat_berita']->id_kat_berita == '') {
					redirect('admin/kat_berita');
				}

					$this->load->view('admin/header', $data);
					$this->load->view('admin/berita/kat_berita_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kat_berita 		= htmlentities(strip_tags($_POST['nama_kat_berita']));

									$data = array(
										'nama_kat_berita'			=> $nama_kat_berita
										);
									$this->Mcrud->update_data('tbl_kat_berita', array('id_kat_berita' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Kategori Berita berhasil diperbarui.
										 </div>'
									 );

							redirect('admin/kat_berita');
					}

		}
	}

	public function kat_berita_hapus($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/kat_berita');
			}

			$cek_kat =	$this->Mcrud->get_data_by_pk('tbl_berita', 'id_kat_berita', $id)->num_rows();
			if ($cek_kat != 0) {
				$this->session->set_flashdata('msg',
					 '
					 <div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times; &nbsp;</span>
							</button>
							<strong>Gagal!</strong> Kategori Berita tidak bisa dihapus, karna masih ada berita yang menggunakan kategori tersebut.
					 </div>'
				 );
			}else{

					$this->Mcrud->delete_data_by_pk('tbl_kat_berita', 'id_kat_berita', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Kategori Berita berhasil dihapus.
						 </div>'
					 );
			}
			redirect('admin/kat_berita');

		}
	}


	public function berita()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['judul']				= "Berita";
			$data['v_admin']  		= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kat_berita'] = $this->Mcrud->get_data('tbl_kat_berita');

			$this->db->order_by('tbl_berita.id_berita', 'DESC');
			$data['v_berita']   	= $this->Mcrud->get_data_join('tbl_berita', 'tbl_kat_berita', 'id_kat_berita');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/berita/berita', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$judul 						= htmlentities(strip_tags($_POST['judul']));
							$id_kat_berita 		= htmlentities(strip_tags($_POST['id_kat_berita']));
							$isi					    = $_POST['isi'];

							date_default_timezone_set('Asia/Jakarta');
							$tgl	 = date('Y-m-d H:i:s');

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/berita/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

			        if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
			        }
			         else
			        {
			              $gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/berita/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$data = array(
											'judul'						=> $judul,
											'id_kat_berita'		=> $id_kat_berita,
											'isi'							=> $isi,
											'foto_berita'	  	=> $foto,
											'tgl_berita'			=> $tgl,
											'dilihat'					=> 0
										);
										$this->Mcrud->save_data('tbl_berita', $data);

										$this->session->set_flashdata('msg',
											 '
											 <div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times; &nbsp;</span>
													</button>
													<strong>Sukses!</strong> Berita berhasil ditambahkan.
											 </div>'
										 );
			        }

							redirect('admin/berita');
					}

		}
	}



	public function berita_edit($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/berita');
			}
			$data['judul']				= "Edit Berita";
			$data['v_admin']  		= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kat_berita'] = $this->Mcrud->get_data('tbl_kat_berita');
			$data['v_berita']  	  = $this->db->query("SELECT * FROM tbl_berita
																								INNER JOIN tbl_kat_berita ON tbl_kat_berita.id_kat_berita=tbl_berita.id_kat_berita
																								WHERE tbl_berita.id_berita='$id'")->row();
			if ($data['v_berita']->id_berita == '') {
				redirect('admin/berita');
			}

					$this->load->view('admin/header', $data);
					$this->load->view('admin/berita/berita_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$judul 						= htmlentities(strip_tags($_POST['judul']));
							$id_kat_berita 		= htmlentities(strip_tags($_POST['id_kat_berita']));
							$isi					    = $_POST['isi'];

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/berita/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

							$cek_foto = $data['v_berita']->foto_berita;

					if ($_FILES['foto']['error'] <> 4) {
			        if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
			         else
			        {
										unlink("$cek_foto");
			              $gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/berita/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
			        }
					}else{
						$foto   = $cek_foto;
						$update = "yes";
					}

							if ($update = "yes") {
									$data = array(
										'judul'						=> $judul,
										'id_kat_berita'		=> $id_kat_berita,
										'isi'							=> $isi,
										'foto_berita'	  	=> $foto
									);
									$this->Mcrud->update_data('tbl_berita', array('id_berita' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Berita berhasil diperbarui.
										 </div>'
									 );
							}else{
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}
							redirect('admin/berita');
					}

		}
	}


	public function berita_hapus($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/berita');
			}
					$cek_data = $this->Mcrud->get_data_by_pk('tbl_berita', 'id_berita', $id)->row();

					unlink("$cek_data->foto_berita");
					$this->Mcrud->delete_data_by_pk('tbl_berita', 'id_berita', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Berita berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/berita');

		}
	}

	public function kat_galeri()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['judul']				= "Album Galeri";
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);

			$this->db->order_by('nama_kat_galeri', 'ASC');
			$data['v_kat_galeri'] = $this->Mcrud->get_data('tbl_kat_galeri');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/galeri/kat_galeri', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kat_galeri 		= htmlentities(strip_tags($_POST['nama_kat_galeri']));

									$data = array(
										'nama_kat_galeri'			=> $nama_kat_galeri
										);
									$this->Mcrud->save_data('tbl_kat_galeri', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Album berhasil ditambahkan.
										 </div>'
									 );

							redirect('admin/kat_galeri');
					}

		}
	}

	public function kat_galeri_edit($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/kat_galeri');
			}
			$data['judul']				= "Edit Kategori Berita";
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_kat_galeri'] = $this->Mcrud->get_data_by_pk('tbl_kat_galeri', 'id_kat_galeri', $id)->row();

				if ($data['v_kat_galeri']->id_kat_galeri == '') {
					redirect('admin/kat_galeri');
				}

					$this->load->view('admin/header', $data);
					$this->load->view('admin/galeri/kat_galeri_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_kat_galeri 		= htmlentities(strip_tags($_POST['nama_kat_galeri']));

									$data = array(
										'nama_kat_galeri'			=> $nama_kat_galeri
										);
									$this->Mcrud->update_data('tbl_kat_galeri', array('id_kat_galeri' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Album berhasil diperbarui.
										 </div>'
									 );

							redirect('admin/kat_galeri');
					}

		}
	}

	public function kat_galeri_hapus($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/kat_galeri');
			}

			$cek_kat =	$this->Mcrud->get_data_by_pk('tbl_galeri', 'id_kat_galeri', $id)->num_rows();
			if ($cek_kat != 0) {
				$this->session->set_flashdata('msg',
					 '
					 <div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times; &nbsp;</span>
							</button>
							<strong>Gagal!</strong> Album tidak bisa dihapus, karna masih ada galeri yang menggunakan album tersebut.
					 </div>'
				 );
			}else{

					$this->Mcrud->delete_data_by_pk('tbl_kat_galeri', 'id_kat_galeri', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Album berhasil dihapus.
						 </div>'
					 );
			}
			redirect('admin/kat_galeri');

		}
	}

	public function galeri()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['judul']		 = "Galeri";
			$data['v_admin']	 = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);

			$this->db->order_by('nama_kat_galeri', 'ASC');
			$data['v_kat_galeri']  = $this->Mcrud->get_data('tbl_kat_galeri');

			$this->db->join('tbl_kat_galeri', 'tbl_kat_galeri.id_kat_galeri=tbl_galeri.id_kat_galeri');
			$this->db->order_by('tbl_galeri.id_galeri', 'DESC');
			$data['v_galeri']  = $this->Mcrud->get_data('tbl_galeri');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/galeri/galeri', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_galeri 		= htmlentities(strip_tags($_POST['nama_galeri']));
							$id_kat_galeri 	= htmlentities(strip_tags($_POST['id_kat_galeri']));

							date_default_timezone_set('Asia/Jakarta');
							$tgl	 = date('Y-m-d H:i:s');

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/galeri/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

							$cek_foto = $data['v_galeri']->foto_galeri;

					    if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
			         else
			        {
										$gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/galeri/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
			        }

							if ($update = "yes") {
									$data = array(
										'nama_galeri'			=> $nama_galeri,
										'id_kat_galeri'		=> $id_kat_galeri,
										'foto_galeri'			=> $foto,
										'tgl_galeri'			=> $tgl
									);
									$this->Mcrud->save_data('tbl_galeri', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Galeri berhasil disimpan.
										 </div>'
									 );
							}else{
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}
							redirect('admin/galeri');
					}

		}
	}


	public function galeri_edit($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/galeri');
			}

			$data['judul']		  = "Edit Galeri";
			$data['v_admin']  	= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);

			$this->db->order_by('nama_kat_galeri', 'ASC');
			$data['v_kat_galeri']  = $this->Mcrud->get_data('tbl_kat_galeri');

			$data['v_galeri']   = $this->Mcrud->get_data_by_pk('tbl_galeri', 'id_galeri', $id)->row();

			if ($data['v_galeri']->id_galeri == "") {
				redirect('admin/galeri');
			}

					$this->load->view('admin/header', $data);
					$this->load->view('admin/galeri/galeri_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							$nama_galeri 		= htmlentities(strip_tags($_POST['nama_galeri']));
							$id_kat_galeri 	= htmlentities(strip_tags($_POST['id_kat_galeri']));

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/galeri/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

							$cek_foto = $data['v_galeri']->foto_galeri;

					if ($_FILES['foto']['error'] <> 4) {
			        if ( ! $this->upload->do_upload('foto'))
			        {
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
			         else
			        {
										unlink("$cek_foto");
			              $gbr = $this->upload->data();
			              $filename = $gbr['file_name'];
			              $filename = "img/galeri/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
			        }
					}else{
						$foto   = $cek_foto;
						$update = "yes";
					}

							if ($update = "yes") {
									$data = array(
										'nama_galeri'			=> $nama_galeri,
										'id_kat_galeri'		=> $id_kat_galeri,
										'foto_galeri'			=> $foto
									);
									$this->Mcrud->update_data('tbl_galeri', array('id_galeri' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Galeri berhasil diperbarui.
										 </div>'
									 );
							}else{
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}
							redirect('admin/galeri');
					}

		}
	}


	public function galeri_hapus($id)
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('');
			}
					$cek_data = $this->Mcrud->get_data_by_pk('tbl_galeri', 'id_galeri', $id)->row();

					unlink("$cek_data->foto_galeri");
					$this->Mcrud->delete_data_by_pk('tbl_galeri', 'id_galeri', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Galeri berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/galeri');

		}
	}

	public function slide()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['judul']		 = "Slide";
			$data['v_admin']	 = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);

			$this->db->order_by('id_slide', 'DESC');
			$data['v_slide']  = $this->Mcrud->get_data('tbl_slide');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/slide/slide', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							// $nama_galeri 		= htmlentities(strip_tags($_POST['nama_galeri']));

							date_default_timezone_set('Asia/Jakarta');
							$tgl	 = date('Y-m-d H:i:s');

							$file_size = 5500; //5 MB
							$this->upload->initialize(array(
								"upload_path"   => "./img/slide/",
								"allowed_types" => "jpg|jpeg|png|gif",
								"max_size" => "$file_size"
							));

							$cek_foto = $data['v_slide']->foto_slide;

							if ( ! $this->upload->do_upload('foto'))
							{
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
							 else
							{
										$gbr = $this->upload->data();
										$filename = $gbr['file_name'];
										$filename = "img/slide/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
							}

							if ($update = "yes") {
									$data = array(
										'foto_slide'		=> $foto,
										'tgl_slide'			=> $tgl
									);
									$this->Mcrud->save_data('tbl_slide', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Slide berhasil disimpan.
										 </div>'
									 );
							}else{
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}
							redirect('admin/slide');
					}

		}
	}


	public function slide_edit($id='')
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('admin/slide');
			}

			$data['judul']		  = "Edit slide";
			$data['v_admin']  	= $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);
			$data['v_slide']   = $this->Mcrud->get_data_by_pk('tbl_slide', 'id_slide', $id)->row();

			if ($data['v_slide']->id_slide == "") {
				redirect('admin/slide');
			}

					$this->load->view('admin/header', $data);
					$this->load->view('admin/slide/slide_edit', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnsimpan'])) {
							// $nama_galeri 		= htmlentities(strip_tags($_POST['nama_galeri']));

							$file_size = 5500; //5 MB
							$this->upload->initialize(array(
								"upload_path"   => "./img/slide/",
								"allowed_types" => "jpg|jpeg|png|gif",
								"max_size" => "$file_size"
							));

							$cek_foto = $data['v_slide']->foto_slide;

					if ($_FILES['foto']['error'] <> 4) {
							if ( ! $this->upload->do_upload('foto'))
							{
									$error = $this->upload->display_errors('<p>', '</p>');
									$update = "";
							}
							 else
							{
										unlink("$cek_foto");
										$gbr = $this->upload->data();
										$filename = $gbr['file_name'];
										$filename = "img/slide/".$filename;
										$foto 		= preg_replace('/ /', '_', $filename);

										$update = "yes";
							}
					}else{
						$foto   = $cek_foto;
						$update = "yes";
					}

							if ($update = "yes") {
									$data = array(
										'foto_slide'			=> $foto
									);
									$this->Mcrud->update_data('tbl_slide', array('id_slide' => $id), $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Slide berhasil diperbarui.
										 </div>'
									 );
							}else{
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}
							redirect('admin/slide');
					}

		}
	}


	public function slide_hapus($id)
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('');
			}
					$cek_data = $this->Mcrud->get_data_by_pk('tbl_slide', 'id_slide', $id)->row();

					unlink("$cek_data->foto_slide");
					$this->Mcrud->delete_data_by_pk('tbl_slide', 'id_slide', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Slide berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/slide');

		}
	}

	public function kontak()
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			$data['judul']				= "Kontak";
			$data['v_admin']  	  = $this->Mcrud->get_data_by_pk('tbl_admin', 'username', $ceks);

			$this->db->order_by('id_kontak', 'DESC');
			$data['v_kontak'] = $this->Mcrud->get_data('tbl_kontak');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/kontak', $data);
					$this->load->view('admin/footer');
		}
  }

	public function kontak_hapus($id)
	{
		$ceks = $this->session->userdata('username@2017');
		if(!isset($ceks)) {
			redirect('admin/login');
		}else{
			if ($id == '') {
				redirect('');
			}
					$this->Mcrud->delete_data_by_pk('tbl_kontak', 'id_kontak', $id);

					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Kontak berhasil dihapus.
						 </div>'
					 );
					 redirect('admin/kontak');

		}
	}

}
