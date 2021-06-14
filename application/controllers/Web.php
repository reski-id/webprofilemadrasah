<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index($offset = 0)
	{

		$jml = $this->db->get('tbl_berita');

			 $config['base_url'] = base_url().'artikel';

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 3*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['halaman'] = $this->pagination->create_links();
			 /*membuat variable halaman untuk dipanggil di view nantinya*/
			 $data['offset'] = $offset;
			 $data['berita'] = $this->Mcrud->view_berita($config['per_page'], $offset);
			 $data['popular'] = $this->Mcrud->berita_popular_limit();
			 $data['web']	 	 = $this->db->get('tbl_web')->row();
			 $data['judul']   = $data['web']->nama_web;

			$this->load->view('web/header', $data);
			$this->load->view('web/slide');
			$this->load->view('web/beranda', $data);
			$this->load->view('web/footer');
	}

	public function detail($id = '')
	{
		if ($id == '') {
			redirect('404_override');
		}

		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$this->db->where('tbl_berita.id_berita', $id);
		$data['v_detail'] 		 = $this->Mcrud->get_data_join('tbl_berita', 'tbl_kat_berita', 'id_kat_berita')->row();
		$data['judul']   			 = $data['v_detail']->judul;

		if ($data['v_detail']->id_berita == "") {
			redirect('404_override');
		}
		$data2 = array(
			'dilihat'	=> $data['v_detail']->dilihat + 1
		);
		$this->Mcrud->update_data('tbl_berita', array('id_berita' => $data['v_detail']->id_berita), $data2);

		$this->load->view('web/header', $data);
		$this->load->view('web/detail_berita', $data);
		$this->load->view('web/footer');
	}

	function error_not_found(){
		$this->load->view('404_content');
	}


	public function vm()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Visi, Misi, Motto dan Tujuan";

		$this->load->view('web/header', $data);
		$this->load->view('web/visi_misi', $data);
		$this->load->view('web/footer');
	}

	public function sejarah()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Sejarah";

		$this->load->view('web/header', $data);
		$this->load->view('web/sejarah', $data);
		$this->load->view('web/footer');
	}

	public function fasilitas()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Fasilitas Sekolah";

		$this->load->view('web/header', $data);
		$this->load->view('web/fasilitas', $data);
		$this->load->view('web/footer');
	}

	public function prestasi()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Prestasi";

		$this->load->view('web/header', $data);
		$this->load->view('web/prestasi', $data);
		$this->load->view('web/footer');
	}

	public function kegiatan()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Kegiatan";

		$this->load->view('web/header', $data);
		$this->load->view('web/kegiatan', $data);
		$this->load->view('web/footer');
	}

	public function ppdb()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "PPDB";

		$this->load->view('web/header', $data);
		$this->load->view('web/ppdb', $data);
		$this->load->view('web/footer');
	}

	public function galeri($offset=0)
	{

		$jml = $this->db->get('tbl_kat_galeri');

			 $config['base_url'] = base_url().'galeri';

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 12; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 3*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['halaman'] = $this->pagination->create_links();
			 /*membuat variable halaman untuk dipanggil di view nantinya*/
			 $data['offset'] = $offset;
			 $data['galeri'] = $this->Mcrud->view_kat_galeri($config['per_page'], $offset);

		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Album Galeri";
		// $this->db->order_by('id_galeri', 'DESC');
		// $data['galeri']	 = $this->db->get('tbl_galeri');

		$this->load->view('web/header', $data);
		$this->load->view('web/galeri', $data);
		$this->load->view('web/footer');
	}

	public function galeri_d($id='',$offset=0)
	{
		if ($id=='') {
			redirect('galeri');
		}

		if ($this->Mcrud->get_data_by_pk('tbl_galeri', 'id_kat_galeri', $id)->num_rows() == 0) {
			redirect('galeri');
		}
		$jml = $this->db->get('tbl_galeri');

			 $config['base_url'] = base_url().'galeri_d/'.$id;

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 12; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['halaman'] = $this->pagination->create_links();
			 /*membuat variable halaman untuk dipanggil di view nantinya*/
			 $data['offset'] = $offset;
			 $data['galeri'] = $this->Mcrud->view_galeri($config['per_page'], $offset, $id);

		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = ucwords($data['galeri']->row()->nama_kat_galeri);
		// $this->db->order_by('id_galeri', 'DESC');
		// $data['galeri']	 = $this->db->get('tbl_galeri');

		$this->load->view('web/header', $data);
		$this->load->view('web/galeri_d', $data);
		$this->load->view('web/footer');
	}


	public function kat($id='', $offset=0)
	{
		if ($id == '') {
			redirect('404_override');
		}

		$this->db->where('id_kat_berita', $id);
		$jml = $this->db->get('tbl_berita');

			 $config['base_url'] = base_url().'kat/'.$id;

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['halaman'] = $this->pagination->create_links();
			 /*membuat variable halaman untuk dipanggil di view nantinya*/
			 $data['offset'] = $offset;

			 $data['berita'] = $this->Mcrud->view_berita_cari_kat($config['per_page'], $offset, $id);

		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['v_kat'] 	 = $this->Mcrud->get_data_by_pk('tbl_kat_berita', 'id_kat_berita', $id);

		$data['judul']   = $data['v_kat']->row()->nama_kat_berita;

		if ($data['v_kat']->num_rows() == 0) {
			redirect('404_override');
		}

		$this->load->view('web/header', $data);
		$this->load->view('web/kat', $data);
		$this->load->view('web/footer');
	}

	public function kontak()
	{
		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = "Kontak";

		$this->load->view('web/header', $data);
		$this->load->view('web/kontak', $data);
		$this->load->view('web/footer');

		if (isset($_POST['btnkirim'])) {
				$nama 		= htmlentities(strip_tags($_POST['nama']));
				$email 		= htmlentities(strip_tags($_POST['email']));
				$pesan 		= htmlentities(strip_tags($_POST['pesan']));

				date_default_timezone_set('Asia/Jakarta');
				$tgl	 = date('Y-m-d H:i:s');

						$data = array(
							'nama'			=> $nama,
							'email'			=> $email,
							'pesan'			=> $pesan,
							'tgl'				=> $tgl
							);
						$this->Mcrud->save_data('tbl_kontak', $data);

						$this->session->set_flashdata('msg',
							 '
							 <div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> Pesan berhasil dikirim.
							 </div>'
						 );

				redirect('kontak');
		}

	}

	public function cari($id='',$offset=0)
	{
		if (isset($_POST['q'])) {
			$q = preg_replace('/ /', '_', $_POST['q']);
			redirect("cari/$q");
		}

		if ($id == '') {
			redirect('');
		}

		$id = preg_replace('/_/', ' ', $id);

		$this->db->like('tbl_berita.judul', $id);
		$this->db->or_like('tbl_kat_berita.nama_kat_berita', $id);
		$jml = $this->Mcrud->get_data_join('tbl_berita', 'tbl_kat_berita', 'id_kat_berita');

			 $config['base_url'] = base_url().'cari/'.$id;

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['halaman'] = $this->pagination->create_links();
			 /*membuat variable halaman untuk dipanggil di view nantinya*/
			 $data['offset'] = $offset;

			 $data['berita'] = $this->Mcrud->view_berita_cari($config['per_page'], $offset, $id);

		$data['popular'] = $this->Mcrud->berita_popular_limit();
		$data['web']	 	 = $this->db->get('tbl_web')->row();

		$data['judul']   = $id;


		$this->load->view('web/header', $data);
		$this->load->view('web/cari', $data);
		$this->load->view('web/footer');
	}

}
