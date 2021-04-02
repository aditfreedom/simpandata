



<?php 

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "simpandata";
	$db_lokasi ="Bireuen";


session_start();
date_default_timezone_set("Asia/Jakarta");

$database = new mysqli($db_host, $db_user, $db_pass, $db_name);


function format_angka($angka)
{
	return number_format($angka, 0, ',', '.');
}

function tanggal_indo($tanggal)
{
	$tgl = explode("-", $tanggal);
	$bln["01"]="Januari";
	$bln["02"]="Februari";
	$bln["03"]="Maret";
	$bln["04"]="April";
	$bln["05"]="Mei";
	$bln["06"]="Juni";
	$bln["07"]="Juli";
	$bln["08"]="Agustus";
	$bln["09"]="September";
	$bln["10"]="Oktober";
	$bln["11"]="November";
	$bln["12"]="Desember";
	if ($tgl[0]=="0000") 
	{
		return $tanggal;
	}
	else
	{
		return $tgl[2]." ".$bln[$tgl[1]]." ".$tgl[0];
	}
}


function waktu()
{
	$jam = date("H");
	if ($jam >= 00 AND $jam <=10)
	{
		echo "Selamat Pagi";
	}
	elseif ($jam >= 11 AND $jam <=13)
	{
		echo "Selamat Siang";
	}
	elseif ($jam >= 14 AND $jam <=18) 
	{
		echo "Selamat Sore";
	}
	elseif ($jam >=19) 
	{
		echo " Selamat Malam";
	}
}


class admin
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}


	function ubah_foto($foto, $id_admin)
	{
		// echo "<pre>";
		// print_r($foto);
		// echo "</pre>";

		$type_file = $foto['type']	;
		$id_diijinkan = array ('image/jpeg', 'image/png');
		if (in_array($type_file, $id_diijinkan))
		{
			$lokasi_sementara = $foto['tmp_name'];

			$nama_file = $foto['name'];
			$waktu = date("Y-m-d-H-i-s");
			$rename = $waktu."_".$nama_file;

			move_uploaded_file($lokasi_sementara, "../assets/img/user/$rename");

			$data_admin = $this->ambil_admin($id_admin);
			$foto_lama = $data_admin ['foto_admin'];

			if ($foto_lama == "default.png") 
			{
				$this->koneksi->query("UPDATE admin SET foto_admin='$rename' WHERE id_admin='$id_admin'");

				
			} 
			else 
			{
				if (file_exists("../assets/img/user/$foto_lama")) 
				{
					unlink("../assets/img/user/$foto_lama");
				}

				$this->koneksi->query("UPDATE admin SET foto_admin='$rename' WHERE id_admin='$id_admin'");					
				
			}
			echo "<script>alert('Foto Profil Berhasil Diubah')</script>";
			echo "<script>location='index.php'</script>";

		}
		else
		{
			echo "<script>alert('Ekstensi file foto harus jpg dan png!')</script>";
			echo "<script>location='index.php'</script>";
		}
	}


	function ambil_admin($id_admin)
	{
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
		$data_array = $ambil->fetch_assoc(); 
		
		return $data_array;
	}

	function login($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_admin = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['admin'] = $data_admin;
			return "admin";

		} else {
			return "gagal";
		}
		

		
	}
	
}


$admin = new admin($database);

// ******************************************************************************************************
// aplikasi ini merupakan hak cipta dari Adhi Lesmana 
// dilarang memberikan codingan aplikasi ini ke pihak lain tanpa konfirmasi kepada pemegang hak cipta
// email: adhilesmana@yahoo.com, lesmanadhi@gmail.com
// untuk konfirmasi penggunaan harap menghubungi email diatas 
// ******************************************************************************************************

class manajemen
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

function login_manajemen($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM manajemen WHERE username_manajemen='$username' AND password_manajemen='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_manajemen = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['manajemen'] = $data_manajemen;
			return "manajemen";

		} else {
			return "gagal";
		}
		

		
	}

}

$manajemen = new manajemen($database);

class konselor
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

function login_konselor($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM konselor WHERE username_konselor='$username' AND password_konselor='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_konselor = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['konselor'] = $data_konselor;
			return "konselor";

		} else {
			return "gagal";
		}
		

		
	}

}

$konselor = new konselor($database);

class project
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function cek_periodeproject_sd($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project 
			LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	
			 WHERE project.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_class_project_periode_sd($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project
			 LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester on project.id_semester = semester.id_semester
			 WHERE project.id_semester ='$id_semester' AND project.id_jenjang = '1' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function cek_periodeproject_smp($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project 
			LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	
			 WHERE project.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}


		function tampil_class_project_periode_smp($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project
			 LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester on project.id_semester = semester.id_semester
			 WHERE project.id_semester ='$id_semester' AND project.id_jenjang = '2' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	function cek_periodeproject_sma($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project 
			LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	
			 WHERE project.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}


		function tampil_class_project_periode_sma($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project
			 LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester on project.id_semester = semester.id_semester
			 WHERE project.id_semester ='$id_semester' AND project.id_jenjang = '3' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodeproject($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project 
			LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	
			WHERE id_semester='$id_semester' ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_project($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project 
			LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	
			WHERE id_semester='$id_semester'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}


	
	function tampil_class_project_periode($id_semester)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM project 
			LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester on project.id_semester = semester.id_semester

			WHERE project.id_semester='$id_semester' AND project.id_jenjang='$id_jenjang' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	

	function simpan_class_project($id_jenjang, $id_semester, $id_kelas, $id_kelas2, $id_kelas3, $id_kelas4, $id_guru, $tema_project, $waktu_1, $waktu_2, $id_mapel1, $id_mapel2, $id_mapel3, $id_mapel4, $hasil_project, $biaya_project)
	{ 
	$this->koneksi->query("INSERT INTO project (id_jenjang, id_semester, id_kelas, id_kelas2, id_kelas3, id_kelas4, id_guru, tema_project, waktu_1, waktu_2, id_mapel1, id_mapel2, id_mapel3, id_mapel4, hasil_project, biaya_project) VALUES ('$id_jenjang', '$id_semester', '$id_kelas', '$id_kelas2', '$id_kelas3', '$id_kelas4', '$id_guru', '$tema_project', '$waktu_1', '$waktu_2', '$id_mapel1', '$id_mapel2', '$id_mapel3', '$id_mapel4', '$hasil_project', '$biaya_project') ");
	}

	function simpan_lainnya($jenis, $no_kartu, $nama, $nama2)
	{ 
	$this->koneksi->query("INSERT INTO lainnya (jenis,no_kartu,nama,laporan) VALUES ('$jenis', '$no_kartu', '$nama', '$nama2') ");
	}

	function tampil_project()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		
		 $ambil = $this->koneksi->query("SELECT * FROM project
		 	LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester ON project.id_semester = semester.id_semester
		 	
		 	WHERE project.id_jenjang = $id_jenjang ORDER BY project.id_semester, project.waktu_1 ");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_project_only()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_guru'];
		
		 $ambil = $this->koneksi->query("SELECT * FROM project
		 	LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester ON project.id_semester = semester.id_semester
		 	
		 	WHERE project.id_guru = $id_jenjang ORDER BY project.id_semester, project.waktu_1 ");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	


	function tampil_project_admin()
	{
		$semua_data = array();
		
		
		 $ambil = $this->koneksi->query("SELECT * FROM project
		 	LEFT JOIN mapel1 ON project.id_mapel1 = mapel1.id_mapel1
		 	LEFT JOIN mapel2 ON project.id_mapel2 = mapel2.id_mapel2
		 	LEFT JOIN mapel3 ON project.id_mapel3 = mapel3.id_mapel3
		 	LEFT JOIN mapel4 ON project.id_mapel4 = mapel4.id_mapel4
		 	LEFT JOIN kelas ON project.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON project.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON project.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON project.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON project.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON project.id_guru = guru.id_guru
		 	LEFT JOIN semester ON project.id_semester = semester.id_semester
		 	ORDER BY id_project DESC
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_lainnya()
	{
		$semua_data = array();
		
		
		 $ambil = $this->koneksi->query("SELECT * FROM lainnya

		 	ORDER BY id desc;
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_lainnya_only()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_guru'];
		
		 $ambil = $this->koneksi->query("SELECT * FROM lainnya
		 	LEFT JOIN guru ON lainnya.nama_guru = guru.id_guru
		 	
		 	WHERE lainnya.nama_guru = $id_jenjang ORDER BY semester DESC ");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	
	function ambil_project($id_project)
	{
		$ambil = $this->koneksi->query("SELECT * FROM project 
			WHERE id_project='$id_project'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}


	function ubah_class_project($id_jenjang, $id_semester, $id_kelas, $id_kelas2, $id_kelas3, $id_kelas4, $id_guru,  $tema_project, $waktu_1, $waktu_2, $id_mapel1, $id_mapel2, $id_mapel3, $id_mapel4, $hasil_project, $biaya_project, $id_project)
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("UPDATE project SET id_jenjang='$id_jenjang', id_semester='$id_semester', id_kelas='$id_kelas', id_kelas2='$id_kelas2', id_kelas3='$id_kelas3', id_kelas4='$id_kelas4', id_guru= '$id_guru', tema_project='$tema_project', waktu_1='$waktu_1', waktu_2='$waktu_2', id_mapel1='$id_mapel1', id_mapel2='$id_mapel2', id_mapel3='$id_mapel3', id_mapel4='$id_mapel4', hasil_project='$hasil_project', biaya_project='$biaya_project' WHERE id_project='$id_project' AND id_guru = '$id_guru' ");
	}

	// function ubah_lap_class_project($nama, $id_project)
	// {
	// 	$this->koneksi->query("UPDATE project SET laporan = '$nama' WHERE id_project='$id_project'");
	// }

	
	function upload_file_class_project($file_scan, $id_project)
	// {
	// 	function upload_tanda_tangan($file_scan, $id_user)	
	{
		$type_file = $file_scan['type']	;
		$id_diijinkan = array ('docx', 'doc', 'pdf');
		if (in_array($type_file, $id_diijinkan))
		{
			$lokasi_sementara = $file_scan['tmp_name'];

			$nama_file = $file_scan['name'];
			$waktu = date("Y-m-d-H-i-s");
			$rename = $waktu."_".$nama_file;

			

			$detail_project = $this->ambil_project($id_project);
			$laporan_lama = $detail_project ['laporan'];

			if (empty($laporan_lama)) 
			{
				move_uploaded_file($lokasi_sementara, "../laporan/$rename");
				$this->koneksi->query("UPDATE project SET laporan='$rename' WHERE id_project='$id_project'");

				
			} 
			else 
			{
				if (file_exists("../laporan/$laporan_lama")) 
				{
					unlink("../laporan/$laporan_lama");
					move_uploaded_file($lokasi_sementara, "../laporan/$rename");
				}

				$this->koneksi->query("UPDATE project SET laporan='$rename' WHERE id_project='$id_project'");					
				
			}
			echo "<script>alert('Upload berhasil')</script>";
			echo "<script>location='index.php'</script>";

		}
		else
		{
			echo "<script>alert('Laporan berhasil diupload')</script>";
			echo "<script>location='index.php'</script>";
		}		
	}
		/*$this->koneksi->query("UPDATE project SET laporan ='$lporan' WHERE id_project='$id_project'");
	}
*/

	function hapus_class_project($id_project, $id_guru)
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("DELETE FROM project WHERE id_project = '$id_project' AND id_guru = '$id_guru' ");
	}

}
 $project = new project($database);


class guest
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function grafiksd_guest_admin()
	{
		$ambil = $this->koneksi->query("SELECT * FROM gt_sd");
			return $ambil;
	}

	function grafiksmp_guest_admin()
	{
		$ambil = $this->koneksi->query("SELECT * FROM gt_smp");
			return $ambil;
	}

	function grafiksma_guest_admin()
	{
		$ambil = $this->koneksi->query("SELECT * FROM gt_sma");
			return $ambil;
	}



	function cek_periodeguest_sd($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	
			 WHERE guest.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

	function cek_periodekelas_sd($id_kelas)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM siswa
		LEFT JOIN kelas on siswa.id_kelas = kelas.id_kelas
		LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang
		WHERE kelas.id_kelas=$id_kelas");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_kelas = $data_array['id_kelas'];
		return $id_kelas;
		}
		else
		{
			return "kosong";
		}

	}

	function cek_periodekelas_smp($id_kelas)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM siswa
		LEFT JOIN kelas on siswa.id_kelas = kelas.id_kelas
		LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang
		WHERE kelas.id_kelas=$id_kelas");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_kelas = $data_array['id_kelas'];
		return $id_kelas;
		}
		else
		{
			return "kosong";
		}

	}

	function cek_periodekelas_sma($id_kelas)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM siswa
		LEFT JOIN kelas on siswa.id_kelas = kelas.id_kelas
		LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang
		WHERE kelas.id_kelas=$id_kelas");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_kelas = $data_array['id_kelas'];
		return $id_kelas;
		}
		else
		{
			return "kosong";
		}

	}


	function tampil_siswa_kelas_sd($id_kelas)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM siswa
			LEFT JOIN kelas on siswa.id_kelas = kelas.id_kelas
			LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang
			WHERE kelas.id_kelas=$id_kelas");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		
		function tampil_guest_periode_sd($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang

			 WHERE guest.id_semester ='$id_semester' AND guest.id_jenjang = '1' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	function cek_periodeguest_smp($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	
			 WHERE guest.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_guest_periode_smp($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang

			 WHERE guest.id_semester ='$id_semester' AND guest.id_jenjang = '2' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodeguest_sma($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	
			 WHERE guest.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_guest_periode_sma($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang

			 WHERE guest.id_semester ='$id_semester' AND guest.id_jenjang = '3' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	

	function cek_periodeguest($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	
			WHERE id_semester='$id_semester' ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_guest($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	
			WHERE id_semester='$id_semester'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}


	
	function tampil_guest_periode($id_semester)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang

			WHERE guest.id_semester='$id_semester' AND guest.id_jenjang='$id_jenjang' ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	


	function simpan_guest($id_jenjang, $id_semester, $id_kelas, $id_kelas2, $id_kelas3, $id_kelas4, $id_mapel1, $id_guru, $tema_guest, $nama_guest, $hasil_guest,  $waktu_1, $waktu_2, $biaya_guest)	
	{ 
	$this->koneksi->query("INSERT INTO guest (id_jenjang, id_semester, id_kelas, id_kelas2, id_kelas3, id_kelas4, id_mapel1, id_guru, tema_guest, nama_guest, hasil_guest,  waktu_1, waktu_2, biaya_guest) VALUES ('$id_jenjang', '$id_semester', '$id_kelas', '$id_kelas2', '$id_kelas3', '$id_kelas4', '$id_mapel1', '$id_guru', '$tema_guest', '$nama_guest', '$hasil_guest',  '$waktu_1', '$waktu_2', '$biaya_guest')");
	}

	function tampil_guest()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		 $ambil = $this->koneksi->query("SELECT * FROM guest
		 	LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	WHERE guest.id_jenjang = $id_jenjang ORDER BY guest.id_semester, guest.waktu_1");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_guest_only()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_guru'];
		 $ambil = $this->koneksi->query("SELECT * FROM guest
		 	LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN semester on guest.id_semester = semester.id_semester
		 	WHERE guest.id_guru = $id_jenjang ORDER BY guest.id_semester, guest.waktu_1");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_guest_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM guest
		 	LEFT JOIN mapel1 ON guest.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN kelas ON guest.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON guest.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON guest.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON guest.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON guest.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON guest.id_guru = guru.id_guru
		 	LEFT JOIN semester ON guest.id_semester = semester.id_semester ORDER BY id_guest DESC
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function ambil_guest($id_guest)
	{
		$ambil = $this->koneksi->query("SELECT * FROM guest 
			WHERE id_guest='$id_guest'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}



	function ubah_guest($id_jenjang, $id_semester, $id_kelas, $id_kelas2, $id_kelas3, $id_kelas4, $id_mapel1, $tema_guest, $id_guru,  $nama_guest, $hasil_guest, $waktu_1, $waktu_2, $biaya_guest, $id_guest)	
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("UPDATE guest SET id_jenjang='$id_jenjang', id_semester='$id_semester', id_kelas='$id_kelas', id_kelas2='$id_kelas2', id_kelas3='$id_kelas3', id_kelas4='$id_kelas4', id_mapel1='$id_mapel1', id_guru= '$id_guru', tema_guest='$tema_guest',  nama_guest='$nama_guest', hasil_guest='$hasil_guest', waktu_1='$waktu_1', waktu_2='$waktu_2',  biaya_guest='$biaya_guest' WHERE id_guest='$id_guest' AND id_guru = '$id_guru' ");
	}

	function hapus_guest($id_guest, $id_guru)
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("DELETE FROM guest WHERE id_guest = '$id_guest' AND id_guru='$id_guru' ");
	}


	


}
 $guest = new guest($database);


 class visit
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function cek_periodevisit_sd($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	
			 WHERE visit.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_visit_periode_sd($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	

			 WHERE visit.id_semester ='$id_semester' AND visit.id_jenjang = '1' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function cek_periodevisit_smp($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	
			 WHERE visit.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_visit_periode_smp($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	

			 WHERE visit.id_semester ='$id_semester' AND visit.id_jenjang = '2' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function cek_periodevisit_sma($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	
			 WHERE visit.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_visit_periode_sma($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	

			 WHERE visit.id_semester ='$id_semester' AND visit.id_jenjang = '3' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	

	function cek_periodevisit($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	
		 	
			WHERE id_semester='$id_semester' ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_visit($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	
			WHERE id_semester='$id_semester'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}


	
	function tampil_class_visit_periode($id_semester)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	

			WHERE visit.id_semester='$id_semester' AND visit.id_jenjang='$id_jenjang' ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	function simpan_visit($id_jenjang, $id_semester, $id_kelas, $id_kelas2, $id_kelas3, $id_kelas4, $id_guru, $tema_visit, $hasil_visit, $lokasi_visit, $waktu_1, $waktu_2, $id_mapel1, $id_mapel2, $id_mapel3, $id_mapel4, $biaya_visit)
	{ 
	$this->koneksi->query("INSERT INTO visit (id_jenjang, id_semester, id_kelas, id_kelas2, id_kelas3, id_kelas4, id_guru, tema_visit, hasil_visit, lokasi_visit,  waktu_1, waktu_2, id_mapel1, id_mapel2, id_mapel3, id_mapel4, biaya_visit) VALUES ('$id_jenjang', '$id_semester', '$id_kelas', '$id_kelas2', '$id_kelas3', '$id_kelas4', '$id_guru', '$tema_visit', '$hasil_visit', '$lokasi_visit',  '$waktu_1', '$waktu_2', '$id_mapel1', '$id_mapel2', '$id_mapel3', '$id_mapel4', '$biaya_visit')");
	}

	function tampil_visit()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		 $ambil = $this->koneksi->query("SELECT * FROM visit
		 	LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	 
		 	WHERE visit.id_jenjang = $id_jenjang ORDER BY visit.id_semester, visit.waktu_1
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_visit_only()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_guru'];
		 $ambil = $this->koneksi->query("SELECT * FROM visit
		 	LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	 
		 	WHERE visit.id_guru = $id_jenjang ORDER BY visit.id_semester, visit.waktu_1
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	


	function tampil_visit_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM visit
		 	LEFT JOIN mapel1 ON visit.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON visit.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON visit.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON visit.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON visit.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON visit.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON visit.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON visit.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON visit.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit.id_semester = semester.id_semester	 

		 	ORDER BY id_visit DESC
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	

	function ambil_visit($id_visit)
	{
		$ambil = $this->koneksi->query("SELECT * FROM visit 
			WHERE id_visit='$id_visit'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}

	
	function ambil_supervisi($id_supervisi)
	{
		$ambil = $this->koneksi->query("SELECT * FROM supervisi 
			WHERE id_supervisi='$id_supervisi'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}


	function ubah_visit($id_jenjang, $id_semester, $id_kelas, $id_kelas2, $id_kelas3, $id_kelas4, $id_guru, $tema_visit, $hasil_visit, $lokasi_visit, $waktu_1, $waktu_2, $id_mapel1, $id_mapel2, $id_mapel3, $id_mapel4, $biaya_visit, $id_visit)	
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("UPDATE visit SET id_jenjang= '$id_jenjang', id_semester='$id_semester', id_kelas='$id_kelas', id_kelas2= '$id_kelas2', id_kelas3= '$id_kelas3', id_kelas4= '$id_kelas4', id_guru= '$id_guru', tema_visit= '$tema_visit', hasil_visit='$hasil_visit', lokasi_visit= '$lokasi_visit', waktu_1=  '$waktu_1', waktu_2= '$waktu_2', id_mapel1='$id_mapel1', id_mapel2= '$id_mapel2', id_mapel3= '$id_mapel3', id_mapel4= '$id_mapel4', biaya_visit= '$biaya_visit' WHERE id_visit='$id_visit' AND id_guru = '$id_guru'");
	}

	function hapus_visit($id_visit, $id_guru)
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("DELETE FROM visit 
			

			 WHERE id_visit = '$id_visit'  AND id_guru = '$id_guru' ");
	}


	


}
 $visit = new visit($database);


class visit_home
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}


	function cek_periodevisit_home_sd($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	  
		 	
			 WHERE visit_home.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_visit_home_periode_sd($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	 	

			 WHERE visit_home.id_semester ='$id_semester' AND visit_home.id_jenjang = '1' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodevisit_home_smp($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	  
		 	
			 WHERE visit_home.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_visit_home_periode_smp($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 	
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	 	

			 WHERE visit_home.id_semester ='$id_semester' AND visit_home.id_jenjang = '2' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodevisit_home_sma($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 	
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	  
		 	
			 WHERE visit_home.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_visit_home_periode_sma($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 	
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	 	

			 WHERE visit_home.id_semester ='$id_semester' AND visit_home.id_jenjang = '3' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function simpan_visit_home($id_jenjang, $id_semester, $id_kelas, $id_guru, $id_siswa, $ortu, $waktu_1, $tujuan_visit_home, $hasil_visit_home, $lanjutan_visit_home)
	{ 
	$this->koneksi->query("INSERT INTO visit_home (id_jenjang, id_semester, id_kelas, id_guru, id_siswa, ortu, waktu_1, tujuan_visit_home, hasil_visit_home, lanjutan_visit_home, laporan) VALUES ('$id_jenjang', '$id_semester', '$id_kelas', '$id_guru', '$id_siswa', '$ortu', '$waktu_1', '$tujuan_visit_home', '$hasil_visit_home', '$lanjutan_visit_home', '')");
	}

	function simpan_supervisi($id_jenjang, $id_semester, $mapel, $koordinator_supervisi, $nama_guru, $waktu_1, $nilai_akhir, $kriteria)
	{ 
	$this->koneksi->query("INSERT INTO supervisi (id_jenjang, id_semester, mapel, koordinator_supervisi, nama_guru, waktu, nilai_akhir, kriteria, laporan) VALUES ('$id_jenjang', '$id_semester', '$mapel', '$koordinator_supervisi', '$nama_guru', '$waktu_1', '$nilai_akhir','$kriteria','')");
	}

	function tampil_visit_home()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		 $ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	 
		 	WHERE visit_home.id_jenjang = $id_jenjang ORDER BY visit_home.id_semester, visit_home.waktu_1
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_visit_home_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM visit_home
		 	LEFT JOIN kelas ON visit_home.id_kelas = kelas.id_kelas
		 	
		 	LEFT JOIN jenjang ON visit_home.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON visit_home.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON visit_home.id_semester = semester.id_semester	 
		 	ORDER BY id_visit_home DESC

		 	
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_supervisi()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM supervisi		 	
		 	LEFT JOIN jenjang ON supervisi.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON supervisi.id_semester = semester.id_semester	 
		 	ORDER BY waktu DESC;

		 	
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	

	function ambil_visit_home($id_visit_home)
	{
		$ambil = $this->koneksi->query("SELECT * FROM visit_home 
			WHERE id_visit_home='$id_visit_home'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}


	function ambil_supervisi($id_supervisi)
	{
		$ambil = $this->koneksi->query("SELECT * FROM supervisi 
		WHERE id_supervisi='$id_supervisi'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}

	

	function ubah_visit_home($id_jenjang, $id_semester, $id_kelas, $id_guru, $id_siswa, $ortu, $waktu_1, $tujuan_visit_home, $hasil_visit_home, $lanjutan_visit_home, $id_visit_home)	
	{
		$this->koneksi->query("UPDATE visit_home SET id_jenjang= '$id_jenjang', id_semester='$id_semester', id_kelas='$id_kelas', id_guru= '$id_guru', id_siswa= '$id_siswa',  ortu = '$ortu', waktu_1= '$waktu_1', tujuan_visit_home= '$tujuan_visit_home', hasil_visit_home= '$hasil_visit_home', lanjutan_visit_home='$lanjutan_visit_home' WHERE id_visit_home='$id_visit_home'");
	}

	function ubah_supervisi($id_jenjang, $id_semester, $mapel, $koordinator_supervisi, $nama_guru, $waktu, $nilai_akhir, $kriteria, $id_supervisi)	
	{
		$this->koneksi->query("UPDATE supervisi SET id_jenjang= '$id_jenjang', id_semester='$id_semester', mapel='$mapel', koordinator_supervisi= '$koordinator_supervisi', nama_guru= '$nama_guru', waktu= '$waktu', nilai_akhir= '$nilai_akhir', kriteria= '$kriteria' WHERE id_supervisi='$id_supervisi'");
	}

	function hapus_visit_home($id_visit_home)
	{
		$this->koneksi->query("DELETE FROM visit_home WHERE id_visit_home = '$id_visit_home'");
	}

	function hapus_supervisi($id_supervisi)
	{
		$this->koneksi->query("DELETE FROM supervisi WHERE id_supervisi = '$id_supervisi'");
	}

	


}
 $visit_home = new visit_home($database);

// class mapel
// {
// 	public $koneksi;
	
// 	function __construct($database)
// 	{
// 		$this->koneksi = $database;
// 	}

// 	function tampil_mapel()
// 	{
// 		$ambil = $this->koneksi->query("SELECT * FROM mapel");
// 		while ($data_array = $ambil->fetch_assoc()) 
// 		{
// 			$semua_data[] = $data_array;
// 		}
// 		return $semua_data;
// 	}

// }
// $mapel = new mapel($database);


class mapel
{
	public $koneksi;
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_mapel()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel
			LEFT JOIN jenjang ON mapel.id_jenjang = jenjang.id_jenjang
			LEFT JOIN mapel1 ON mapel.id_mapel = mapel1.id_mapel1
			LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4
			/*LEFT JOIN kelas ON mapel.id_kelas = kelas.id_kelas*/
			
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function ambil_mapel($id_mapel)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel 
			/*LEFT JOIN mapel1 ON mapel.id_mapel = mapel1.id_mapel1
			LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			LEFT JOIN jenjang ON mapel.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel = '$id_mapel' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_mapel( $id_jenjang, $nama_mapel, $id_mapel)
	{
		
		$this->koneksi->query("UPDATE mapel SET  id_jenjang = '$id_jenjang', 
			nama_mapel = '$nama_mapel' 
			WHERE id_mapel='$id_mapel' ");

	}

	function hapus_mapel($id_mapel)
	{
		$this->koneksi->query("DELETE FROM mapel WHERE id_mapel ='$id_mapel' ");
	}

	function simpan_mapel($id_jenjang, $nama_mapel)
	{
				
		$this->koneksi->query("INSERT INTO mapel (id_jenjang, nama_mapel) 
			VALUES ('$id_jenjang', '$nama_mapel')");
		
	}
	

}
$mapel = new mapel($database);

class mapel1
{
	public $koneksi;
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_mapel1()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mapel1
			LEFT JOIN jenjang ON mapel1.id_jenjang = jenjang.id_jenjang
			WHERE mapel1.id_jenjang = $id_jenjang");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	

	function tampil_mapel1_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel1
			LEFT JOIN jenjang ON mapel1.id_jenjang = jenjang.id_jenjang
			/*LEFT JOIN mapel ON mapel1.id_mapel = mapel.id_mapel1
			LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function ubah_mapel1( $id_jenjang, $nama_mapel1, $id_mapel1)
	{
		
		$this->koneksi->query("UPDATE mapel1 SET  id_jenjang = '$id_jenjang', nama_mapel1 = '$nama_mapel1' WHERE id_mapel1 ='$id_mapel1' ");

	}

	function hapus_mapel1($id_mapel1)
	{
		$this->koneksi->query("DELETE FROM mapel1 WHERE id_mapel1 ='$id_mapel1' ");
	}

	function simpan_mapel1($id_jenjang, $nama_mapel1)
	{
				
		$this->koneksi->query("INSERT INTO mapel1 (id_jenjang, nama_mapel1) VALUES ('$id_jenjang', '$nama_mapel1')");
		
	}

	function ambil_mapel1($id_mapel1)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel1 
			
			LEFT JOIN jenjang ON mapel1.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel1 = '$id_mapel1' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_mapel1_admin($id_mapel1)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel1 
			/*LEFT JOIN mapel1 ON mapel.id_mapel = mapel1.id_mapel1
			LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			LEFT JOIN jenjang ON mapel1.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel1 = '$id_mapel1' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

}
$mapel1 = new mapel1($database);


class mapel2
{
	public $koneksi;
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_mapel2()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mapel2
			LEFT JOIN jenjang ON mapel2.id_jenjang = jenjang.id_jenjang
			WHERE mapel2.id_jenjang = $id_jenjang");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	

	function tampil_mapel2_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel2
			LEFT JOIN jenjang ON mapel2.id_jenjang = jenjang.id_jenjang
			/*LEFT JOIN mapel ON mapel2.id_mapel = mapel.id_mapel2
			LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function ubah_mapel2( $id_jenjang, $nama_mapel2, $id_mapel2)
	{
		
		$this->koneksi->query("UPDATE mapel2 SET  id_jenjang = '$id_jenjang', nama_mapel2 = '$nama_mapel2' WHERE id_mapel2 ='$id_mapel2' ");

	}

	function hapus_mapel2($id_mapel2)
	{
		$this->koneksi->query("DELETE FROM mapel2 WHERE id_mapel2 ='$id_mapel2' ");
	}

	function simpan_mapel2($id_jenjang, $nama_mapel2)
	{
				
		$this->koneksi->query("INSERT INTO mapel2 (id_jenjang, nama_mapel2) VALUES ('$id_jenjang', '$nama_mapel2')");
		
	}

	function ambil_mapel2($id_mapel2)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel2 
			
			LEFT JOIN jenjang ON mapel2.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel2 = '$id_mapel2' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_mapel2_admin($id_mapel2)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel2 
			/*LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel2 ON mapel.id_mapel = mapel2.id_mapel2
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			LEFT JOIN jenjang ON mapel2.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel2 = '$id_mapel2' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

}
$mapel2 = new mapel2($database);


class mapel3
{
	public $koneksi;
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_mapel3()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mapel3
			LEFT JOIN jenjang ON mapel3.id_jenjang = jenjang.id_jenjang
			WHERE mapel3.id_jenjang = $id_jenjang");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	

	function tampil_mapel3_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel3
			LEFT JOIN jenjang ON mapel3.id_jenjang = jenjang.id_jenjang
			/*LEFT JOIN mapel ON mapel3.id_mapel = mapel.id_mapel3
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function ubah_mapel3( $id_jenjang, $nama_mapel3, $id_mapel3)
	{
		
		$this->koneksi->query("UPDATE mapel3 SET  id_jenjang = '$id_jenjang', nama_mapel3 = '$nama_mapel3' WHERE id_mapel3 ='$id_mapel3' ");

	}

	function hapus_mapel3($id_mapel3)
	{
		$this->koneksi->query("DELETE FROM mapel3 WHERE id_mapel3 ='$id_mapel3' ");
	}

	function simpan_mapel3($id_jenjang, $nama_mapel3)
	{
				
		$this->koneksi->query("INSERT INTO mapel3 (id_jenjang, nama_mapel3) VALUES ('$id_jenjang', '$nama_mapel3')");
		
	}

	function ambil_mapel3($id_mapel3)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel3 
			
			LEFT JOIN jenjang ON mapel3.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel3 = '$id_mapel3' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_mapel3_admin($id_mapel3)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel3 
			/*LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			LEFT JOIN jenjang ON mapel3.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel3 = '$id_mapel3' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

}
$mapel3 = new mapel3($database);


class mapel4
{
	public $koneksi;
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_mapel4()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mapel4
			LEFT JOIN jenjang ON mapel4.id_jenjang = jenjang.id_jenjang
			WHERE mapel4.id_jenjang = $id_jenjang");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	

	function tampil_mapel4_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel4
			LEFT JOIN jenjang ON mapel4.id_jenjang = jenjang.id_jenjang
			/*LEFT JOIN mapel ON mapel4.id_mapel = mapel.id_mapel4
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function ubah_mapel4( $id_jenjang, $nama_mapel4, $id_mapel4)
	{
		
		$this->koneksi->query("UPDATE mapel4 SET  id_jenjang = '$id_jenjang', nama_mapel4 = '$nama_mapel4' WHERE id_mapel4 ='$id_mapel4' ");

	}

	function hapus_mapel4($id_mapel4)
	{
		$this->koneksi->query("DELETE FROM mapel4 WHERE id_mapel4 ='$id_mapel4' ");
	}

	function simpan_mapel4($id_jenjang, $nama_mapel4)
	{
				
		$this->koneksi->query("INSERT INTO mapel4 (id_jenjang, nama_mapel4) VALUES ('$id_jenjang', '$nama_mapel4')");
		
	}

	function ambil_mapel4($id_mapel4)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel4 
			
			LEFT JOIN jenjang ON mapel4.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel4 = '$id_mapel4' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_mapel4_admin($id_mapel4)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM mapel4 
			/*LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4
			LEFT JOIN mapel3 ON mapel.id_mapel = mapel3.id_mapel3
			LEFT JOIN mapel4 ON mapel.id_mapel = mapel4.id_mapel4*/
			LEFT JOIN jenjang ON mapel4.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_mapel4 = '$id_mapel4' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

}
$mapel4 = new mapel4($database);



class jenjang
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_jenjang()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM jenjang
			/*LEFT JOIN pengguna ON jenjang.id_jenjang = pengguna.id_jenjang*/
			WHERE jenjang.id_jenjang = $id_jenjang");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function tampil_jenjang_pjruangan()
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM jenjang
			");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	


	function tampil_jenjang_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM jenjang
			
			
			");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}



}
$jenjang = new jenjang($database);

class guru
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_guru_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM guru
			LEFT JOIN jenjang ON guru.id_jenjang = jenjang.id_jenjang WHERE NOT status_guru='NON SDK' ");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function rekapsiswa_sd()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM rekapsiswasd");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function rekapsiswa_smp()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM rekapsiswasmp");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function rekapsiswa_sma()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM rekapsiswasma");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function tampil_guru_admin2()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM guru
			LEFT JOIN jenjang ON guru.id_jenjang = jenjang.id_jenjang");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	
	function tampil_kepegawaian()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kepegawaian");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
		
	}

	function tampil_event()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM event ORDER BY id_event ASC");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_guru()
	{
		$semua_data = array();
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guru
			-- LEFT JOIN pengguna ON guru.id_guru = guru.id_guru
			LEFT JOIN jenjang ON guru.id_jenjang = jenjang.id_jenjang
			WHERE jenjang.id_jenjang = $id_jenjang AND guru.id_guru = $id_guru
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_guru_only()
	{
		$semua_data = array();
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guru
			-- LEFT JOIN pengguna ON guru.id_guru = guru.id_guru
			LEFT JOIN jenjang ON guru.id_jenjang = jenjang.id_jenjang
			WHERE jenjang.id_jenjang = $id_jenjang AND guru.id_guru = $id_guru
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function tampil_guru_pjruangan()
	{
		//$id_guru = $_SESSION['pengguna']['id_guru'];
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM guru
			
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_guru_admin($id_guru)
	{
		$ambil = $this->koneksi->query("SELECT * FROM guru 
			 LEFT JOIN jenjang ON guru.id_jenjang = jenjang.id_jenjang
			 
			 
			 WHERE id_guru = '$id_guru' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_kepegawaian($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kepegawaian		 
			 
			 WHERE id = '$id' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_rekapsiswasd($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM rekapsiswasd		 
			 
			 WHERE id = '$id' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_rekapsiswasmp($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM rekapsiswasmp		 
			 
			 WHERE id = '$id' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_rekapsiswasma($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM rekapsiswasma
			 
			 WHERE id = '$id' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ambil_event($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM event		 
			 
			 WHERE id_event = '$id' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}


	function ubah_guru($id_jenjang,  $nama_guru, $nip_guru,  $id_guru, $status_guru)
	{
		$detail_guru = $this->ambil_guru_admin($id_guru);
		$this->koneksi->query("UPDATE guru SET id_jenjang='$id_jenjang',  nama_guru='$nama_guru', nip_guru='$nip_guru', status_guru='$status_guru'  WHERE id_guru='$id_guru' ");
	}

	function ubah_kepegawaian($nama_pegawai, $jenis_kelamin, $nip, $pendidikan, $lulus, $status, $id)
	{
		$detail_guru = $this->ambil_kepegawaian($id);
		$this->koneksi->query("UPDATE kepegawaian SET nama_pegawai='$nama_pegawai',  jk='$jenis_kelamin', nip='$nip', pendidikan='$pendidikan', lulus='$lulus', status='$status'  WHERE id='$id' ");
	}

	function ubah_event($tahun, $nama_event, $keterangan, $id)
	{
		$detail_guru = $this->ambil_event($id);
		$this->koneksi->query("UPDATE event SET tahun='$tahun',  nama_event='$nama_event', keterangan='$keterangan'  WHERE id_event='$id' ");
	}

	function hapus_guru($id_guru)
	{
		$this->koneksi->query("DELETE FROM guru WHERE id_guru='$id_guru' ");
	}

	
	function hapus_lainnya($id)
	{
		$this->koneksi->query("DELETE FROM lainnya WHERE id='$id' ");
	}

	function hapus_kepegawaian($id)
	{
		$this->koneksi->query("DELETE FROM kepegawaian WHERE id='$id' ");
	}

	function hapus_rekapsd($id)
	{
		$this->koneksi->query("DELETE FROM rekapsiswasd WHERE id='$id' ");
	}

	function hapus_rekapsmp($id)
	{
		$this->koneksi->query("DELETE FROM rekapsiswasmp WHERE id='$id' ");
	}

	function hapus_rekapsma($id)
	{
		$this->koneksi->query("DELETE FROM rekapsiswasma WHERE id='$id' ");
	}

	function hapus_event($id)
	{
		$this->koneksi->query("DELETE FROM event WHERE id_event='$id' ");
	}

	function simpan_guru($id_jenjang, $nama_guru, $nip_guru, $status_guru)
	{
		
		$this->koneksi->query("INSERT INTO guru (id_jenjang, nama_guru, nip_guru, status_guru) VALUES ('$id_jenjang', '$nama_guru', '$nip_guru', '$status_guru')");
	}

	function simpan_kepegawaian($nama_pegawai, $jenis_kelamin, $nip, $pendidikan, $lulus, $status)
	{
		
		$this->koneksi->query("INSERT INTO kepegawaian (nama_pegawai, jk, nip, pendidikan, lulus, status) VALUES ('$nama_pegawai', '$jenis_kelamin', '$nip', '$pendidikan', '$lulus', '$status')");
	}

	function simpan_rekapsd($tahun_ajaran, $lk1, $pr1, $lk2, $pr2, $lk3, $pr3, $lk4, $pr4, $lk5, $pr5, $lk6, $pr6)
	{
		
		$this->koneksi->query("INSERT INTO rekapsiswasd (tahun_ajaran, lk1, pr1, lk2, pr2, lk3, pr3, lk4, pr4, lk5, pr5, lk6, pr6 ) VALUES ('$tahun_ajaran', '$lk1', '$pr1', '$lk2', '$pr2', '$lk3', '$pr3', '$lk4', '$pr4', '$lk5', '$pr5', '$lk6', '$pr6')");
	}

	function simpan_rekapsmp($tahun_ajaran, $lk1, $pr1, $lk2, $pr2, $lk3, $pr3)
	{
		
		$this->koneksi->query("INSERT INTO rekapsiswasmp (tahun_ajaran, lk1, pr1, lk2, pr2, lk3, pr3) VALUES ('$tahun_ajaran', '$lk1', '$pr1', '$lk2', '$pr2', '$lk3', '$pr3')");
	}

	function simpan_rekapsma($tahun_ajaran, $lk1, $pr1, $lk2, $pr2, $lk3, $pr3)
	{
		
		$this->koneksi->query("INSERT INTO rekapsiswasma (tahun_ajaran, lk1, pr1, lk2, pr2, lk3, pr3) VALUES ('$tahun_ajaran', '$lk1', '$pr1', '$lk2', '$pr2', '$lk3', '$pr3')");
	}

	function ubah_rekapsd($tahun_ajaran, $lk1, $pr1, $lk2, $pr2, $lk3, $pr3, $lk4, $pr4, $lk5, $pr5, $lk6, $pr6, $id)
	{
		$this->koneksi->query("UPDATE rekapsiswasd SET tahun_ajaran='$tahun_ajaran', lk1='$lk1', pr1='$pr1', lk2='$lk2', pr2='$pr2', lk3='$lk3', pr3='$pr3', lk4='$lk4', pr4='$pr4', lk5='$lk5', pr5='$pr5', lk6='$lk6', pr6='$pr6' WHERE id='$id' ");
	}

	function ubah_rekapsmp($tahun_ajaran, $lk1, $pr1, $lk2, $pr2, $lk3, $pr3, $id)
	{
		$this->koneksi->query("UPDATE rekapsiswasmp SET tahun_ajaran='$tahun_ajaran', lk1='$lk1', pr1='$pr1', lk2='$lk2', pr2='$pr2', lk3='$lk3', pr3='$pr3' WHERE id='$id' ");
	}
	function ubah_rekapsma($tahun_ajaran, $lk1, $pr1, $lk2, $pr2, $lk3, $pr3, $id)
	{
		$this->koneksi->query("UPDATE rekapsiswasma SET tahun_ajaran='$tahun_ajaran', lk1='$lk1', pr1='$pr1', lk2='$lk2', pr2='$pr2', lk3='$lk3', pr3='$pr3' WHERE id='$id' ");
	}

	function simpan_event($tahun, $nama_event, $keterangan)
	{
		
		$this->koneksi->query("INSERT INTO event (tahun, nama_event, keterangan) VALUES ('$tahun', '$nama_event', '$keterangan')");
	}


}
$guru = new guru($database);

class siswa
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_siswa_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM siswa
			LEFT JOIN kelas on siswa.id_kelas = kelas.id_kelas
			LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function tampil_siswa()
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM siswa
			LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
			LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang
			WHERE jenjang.id_jenjang = $id_jenjang
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function ambil_siswa_admin($id_siswa)
	{
		$ambil = $this->koneksi->query("SELECT * FROM siswa 
			LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
			 LEFT JOIN jenjang ON siswa.id_jenjang = jenjang.id_jenjang
			 
			 
			 WHERE id_siswa = '$id_siswa' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_siswa($id_jenjang, $id_kelas, $nis_siswa,  $nama_siswa, $jk_siswa, $alamat_siswa, $ayah_siswa, $ibu_siswa, $hp_siswa, $kerja_siswa,  $id_siswa)
	{
		$detail_siswa = $this->ambil_siswa_admin($id_siswa);
		$this->koneksi->query("UPDATE siswa SET id_jenjang='$id_jenjang',  id_kelas='$id_kelas', nis_siswa='$nis_siswa', nama_siswa='$nama_siswa', jk_siswa='$jk_siswa', alamat_siswa='$alamat_siswa',  ayah_siswa='$ayah_siswa', ibu_siswa='$ibu_siswa', hp_siswa='$hp_siswa', kerja_siswa='$kerja_siswa' WHERE id_siswa='$id_siswa' ");
	}

	function hapus_siswa($id_siswa)
	{
		$this->koneksi->query("DELETE FROM siswa WHERE id_siswa='$id_siswa' ");
	}

	function simpan_siswa($id_jenjang, $id_kelas, $nis_siswa,  $nama_siswa, $jk_siswa, $alamat_siswa, $ayah_siswa, $ibu_siswa, $hp_siswa, $kerja_siswa)
	{
		
		$this->koneksi->query("INSERT INTO siswa (id_jenjang, id_kelas, nis_siswa,  nama_siswa, jk_siswa, alamat_siswa, ayah_siswa, ibu_siswa, hp_siswa, kerja_siswa) VALUES ('$id_jenjang', '$id_kelas', '$nis_siswa', '$nama_siswa', '$jk_siswa', '$alamat_siswa', '$ayah_siswa', '$ibu_siswa', '$hp_siswa', '$kerja_siswa'   )");
	}



}
$siswa = new siswa($database);

class kelas
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_kelas()
	{
		
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas
			LEFT JOIN jenjang ON kelas.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif' AND kelas.id_jenjang = $id_jenjang ORDER BY nama_kelas ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function tampil_kelas_sd()
	{
		
		// $id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas WHERE status='Aktif' AND id_jenjang ='1' ORDER BY nama_kelas ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_kelas_smp()
	{
		
		// $id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas WHERE status='Aktif' AND id_jenjang ='2' ORDER BY nama_kelas ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_kelas_sma()
	{
		
		// $id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas WHERE status='Aktif' AND id_jenjang ='3' ORDER BY nama_kelas ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}



		function tampil_kelas_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kelas
			
			LEFT JOIN jenjang ON kelas.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif' ORDER BY nama_kelas ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_kelas_admin_ubah()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kelas
			
			LEFT JOIN jenjang ON kelas.id_jenjang = jenjang.id_jenjang
			 WHERE status='Aktif' OR status='Alumni' ORDER BY nama_kelas ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_kelas_admin2()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kelas
			
			LEFT JOIN jenjang ON kelas.id_jenjang = jenjang.id_jenjang ORDER BY status ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function ambil_kelas($id_kelas)
	{

		$ambil = $this->koneksi->query("SELECT * FROM kelas 
			/* LEFT Join siswa ON kelas.id_kelas = siswa.id_kelas */
			 LEFT JOIN jenjang ON kelas.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_kelas = '$id_kelas' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_kelas($nama_kelas, $id_jenjang, $id_kelas,$status)
	{
		
		$this->koneksi->query("UPDATE kelas SET nama_kelas = '$nama_kelas', id_jenjang = '$id_jenjang', status = '$status' WHERE id_kelas='$id_kelas' ");

	}

	function hapus_kelas($id_kelas)
	{
		$this->koneksi->query("DELETE FROM kelas WHERE id_kelas ='$id_kelas' ");
	}

	function simpan_kelas($nama_kelas, $id_jenjang,$status)
	{
				
		$this->koneksi->query("INSERT INTO kelas (nama_kelas, id_jenjang, status ) VALUES ('$nama_kelas', '$id_jenjang', '$status')");
	}
	
	
}
$kelas = new kelas($database);

class kelas2
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_kelas2()
	{
		
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas2
			LEFT JOIN jenjang ON kelas2.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif' AND kelas2.id_jenjang = $id_jenjang");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		function tampil_kelas2_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kelas2
			LEFT JOIN jenjang ON kelas2.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif'");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_kelas2($id_kelas2)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kelas2 
			 LEFT JOIN jenjang ON kelas2.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_kelas2 = '$id_kelas2' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_kelas2($nama_kelas2, $id_jenjang, $id_kelas2)
	{
		
		$this->koneksi->query("UPDATE kelas2 SET nama_kelas2 = '$nama_kelas2', id_jenjang = '$id_jenjang' WHERE id_kelas2='$id_kelas2' ");

	}

	function hapus_kelas2($id_kelas2)
	{
		$this->koneksi->query("DELETE FROM kelas2 WHERE id_kelas2 ='$id_kelas2' ");
	}

	function simpan_kelas2($nama_kelas2, $id_jenjang)
	{
				
		$this->koneksi->query("INSERT INTO kelas2 (nama_kelas2, id_jenjang) VALUES ('$nama_kelas2', '$id_jenjang')");
	}
	
	
}
$kelas2 = new kelas2($database);


class kelas3
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_kelas3()
	{
		
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas3
			LEFT JOIN jenjang ON kelas3.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif' AND kelas3.id_jenjang = $id_jenjang");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		function tampil_kelas3_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kelas3
			LEFT JOIN jenjang ON kelas3.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif'");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_kelas3($id_kelas3)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kelas3 
			 LEFT JOIN jenjang ON kelas3.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_kelas3 = '$id_kelas3' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_kelas3($nama_kelas3, $id_jenjang, $id_kelas3)
	{
		
		$this->koneksi->query("UPDATE kelas3 SET nama_kelas3 = '$nama_kelas3', id_jenjang = '$id_jenjang' WHERE id_kelas3='$id_kelas3' ");

	}

	function hapus_kelas3($id_kelas3)
	{
		$this->koneksi->query("DELETE FROM kelas3 WHERE id_kelas3 ='$id_kelas3' ");
	}

	function simpan_kelas3($nama_kelas3, $id_jenjang)
	{
				
		$this->koneksi->query("INSERT INTO kelas3 (nama_kelas3, id_jenjang) VALUES ('$nama_kelas3', '$id_jenjang')");
	}
	
	
}
$kelas3 = new kelas3($database);


class kelas4
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_kelas4()
	{
		
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kelas4
			LEFT JOIN jenjang ON kelas4.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif' AND kelas4.id_jenjang = $id_jenjang");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		function tampil_kelas4_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM kelas4
			LEFT JOIN jenjang ON kelas4.id_jenjang = jenjang.id_jenjang
			WHERE status='Aktif'");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_kelas4($id_kelas4)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kelas4 
			 LEFT JOIN jenjang ON kelas4.id_jenjang = jenjang.id_jenjang
			
			 WHERE id_kelas4 = '$id_kelas4' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_kelas4($nama_kelas4, $id_jenjang, $id_kelas4)
	{
		
		$this->koneksi->query("UPDATE kelas4 SET nama_kelas4 = '$nama_kelas4', id_jenjang = '$id_jenjang' WHERE id_kelas4='$id_kelas4' ");

	}

	function hapus_kelas4($id_kelas4)
	{
		$this->koneksi->query("DELETE FROM kelas4 WHERE id_kelas4 ='$id_kelas4' ");
	}

	function simpan_kelas4($nama_kelas4, $id_jenjang)
	{
				
		$this->koneksi->query("INSERT INTO kelas4 (nama_kelas4, id_jenjang) VALUES ('$nama_kelas4', '$id_jenjang')");
	}
	
	
}
$kelas4 = new kelas4($database);


class semester
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

		function tampil_semester_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM semester where status='Aktif'");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_supervisi_admin($id_supervisi)
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM supervisi where id_supervisi='$id_supervisi'");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_semester_admin2()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM semester");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	


	function simpan_semester($nama_semester)
	{
				
		$this->koneksi->query("INSERT INTO semester (nama_semester) VALUES ('$nama_semester')");
	}

	function ambil_semester($id_semester)
	{
		
		 $ambil = $this->koneksi->query("SELECT * FROM semester
		 	WHERE id_semester = $id_semester
			 ");
			 		$data_array = $ambil->fetch_assoc();
					 return $data_array;
		
		
	}

	function ubah_semester($nama_semester, $id_semester,$status)
	{
		
		$this->koneksi->query("UPDATE semester SET nama_semester = '$nama_semester',status = '$status' WHERE id_semester='$id_semester' ");

	}

	function hapus_semester($id_semester)
	{
		$this->koneksi->query("DELETE FROM semester WHERE id_semester ='$id_semester' ");
	}
	
	
}
$semester = new semester($database);



class pengguna
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function login($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM pengguna 
			LEFT JOIN guru ON pengguna.id_guru = guru.id_guru
			LEFT JOIN jenjang ON pengguna.id_jenjang = jenjang.id_jenjang WHERE username_pengguna='$username' AND password_pengguna='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_pengguna = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['pengguna'] = $data_pengguna;
			return "pengguna";

		} else {
			return "gagal";
		}
	}

	function tampil_pengguna()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM pengguna 
			 LEFT JOIN jenjang ON pengguna.id_jenjang = jenjang.id_jenjang
			 LEFT JOIN guru ON pengguna.id_guru = guru.id_guru
			 -- LEFT JOIN mapel ON Pengguna.id_mapel = mapel.id_mapel
			 -- LEFT JOIN mapel1 ON pengguna.id_mapel = mapel1.id_mapel1
			 -- LEFT JOIN mapel2 ON pengguna.id_mapel = mapel2.id_mapel2
			 -- LEFT JOIN mapel3 ON pengguna.id_mapel = mapel3.id_mapel3
			 -- LEFT JOIN mapel4 ON pengguna.id_mapel = mapel4.id_mapel4
			");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
		
	}


	
	function ambil_pengguna($id_pengguna)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pengguna 
			 LEFT JOIN jenjang ON pengguna.id_jenjang = jenjang.id_jenjang
			 LEFT JOIN guru ON Pengguna.id_guru = guru.id_guru
			 
			 WHERE id_pengguna = '$id_pengguna' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_password_pengguna($password, $id_pengguna)
	{
		// variabel didalam fungsi diambil dari parameter
		$pass_enkripsi = md5(($password));
		$this->koneksi->query("UPDATE pengguna SET password_pengguna = '$pass_enkripsi' WHERE id_pengguna='$id_pengguna' ");

	}

	function hapus_pengguna($id_pengguna)
	{
		$this->koneksi->query("DELETE FROM pengguna WHERE id_pengguna ='$id_pengguna' ");
	}

	function simpan_pengguna($id_jenjang, $id_guru, $username_pengguna, $password_pengguna)
	{
		// $nama_foto = $foto_user['name'];
		// $lokasifoto = $foto_user['tmp_name'];
		// $nama_tanda_tangan = $tanda_tangan['name'];
		// $lokasittd = $tanda_tangan['tmp_name'];
		// move_uploaded_file($lokasi_foto, "../assets/img/user");
		$pass_enkripsi = md5($password_pengguna);
		$this->koneksi->query("INSERT INTO pengguna (id_jenjang, id_guru, username_pengguna, password_pengguna) VALUES ('$id_jenjang', '$id_guru', '$username_pengguna', '$pass_enkripsi')");
	}
	
	function ubah_pengguna($id_jenjang, $id_guru, $username_pengguna, $id_pengguna)
	{
		$detail_pengguna = $this->ambil_pengguna($id_pengguna);
		$this->koneksi->query("UPDATE pengguna SET id_jenjang='$id_jenjang', id_guru='$id_guru', username_pengguna='$username_pengguna'  WHERE id_pengguna='$id_pengguna' ");
	}

}

$pengguna = new pengguna($database);


class user
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}


	function upload_tanda_tangan($file_scan, $id_user)	
	{
		$type_file = $file_scan['type']	;
		$id_diijinkan = array ('image/jpeg', 'image/png');
		if (in_array($type_file, $id_diijinkan))
		{
			$lokasi_sementara = $file_scan['tmp_name'];

			$nama_file = $file_scan['name'];
			$waktu = date("Y-m-d-H-i-s");
			$rename = $waktu."_".$nama_file;

			

			$data_user = $this->ambil_user($id_user);
			$foto_lama = $data_user ['tanda_tangan'];

			if (empty($foto_lama)) 
			{
				move_uploaded_file($lokasi_sementara, "../../assets/img/tanda_tangan/$rename");
				$this->koneksi->query("UPDATE user SET tanda_tangan='$rename' WHERE id_user='$id_user'");

				
			} 
			else 
			{
				if (file_exists("../../assets/img/tanda_tangan/$foto_lama")) 
				{
					unlink("../../assets/img/tanda_tangan/$foto_lama");
					move_uploaded_file($lokasi_sementara, "../../assets/img/tanda_tangan/$rename");
				}

				$this->koneksi->query("UPDATE user SET tanda_tangan='$rename' WHERE id_user='$id_user'");					
				
			}
			echo "<script>alert('Upload berhasil')</script>";
			echo "<script>location='index.php'</script>";

		}
		else
		{
			echo "<script>alert('Tanda tangan berhasil diupload')</script>";
			echo "<script>location='index.php'</script>";
		}		
	}

	function ubah_foto($foto, $id_user)
	{
		// echo "<pre>";
		// print_r($foto);
		// echo "</pre>";

		$type_file = $foto['type']	;
		$id_diijinkan = array ('image/jpeg', 'image/png');
		if (in_array($type_file, $id_diijinkan))
		{
			$lokasi_sementara = $foto['tmp_name'];

			$nama_file = $foto['name'];
			$waktu = date("Y-m-d-H-i-s");
			$rename = $waktu."_".$nama_file;

			move_uploaded_file($lokasi_sementara, "../../assets/img/user/$rename");

			$data_user = $this->ambil_user($id_user);
			$foto_lama = $data_user ['foto_user'];

			if ($foto_lama == "default.png") 
			{
				$this->koneksi->query("UPDATE user SET foto_user='$rename' WHERE id_user='$id_user'");

				
			} 
			else 
			{
				if (file_exists("../../assets/img/user/$foto_lama")) 
				{
					unlink("../../assets/img/user/$foto_lama");
				}

				$this->koneksi->query("UPDATE user SET foto_user='$rename' WHERE id_user='$id_user'");					
				
			}
			echo "<script>alert('Foto Profil Berhasil Diubah')</script>";
			echo "<script>location='index.php'</script>";

		}
		else
		{
			echo "<script>alert('Ekstensi file foto harus jpg dan png!')</script>";
			echo "<script>location='index.php'</script>";
		}
	}


	function login($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM user JOIN jenjang ON user.id_level = jenjang.id_jenjang WHERE username_user='$username' AND password_user='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_user = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['user'] = $data_user;
			return "user";

		} else {
			return "gagal";
		}
	}

	function tampil_user()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM user JOIN level ON user.id_level = level.id_level") or die (mysqli_error($this->koneksi));
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		// mengoutputkan data user
		return $semua_data;
	}

	function ambil_user($id_user)
	{
		$ambil = $this->koneksi->query("SELECT * FROM user JOIN level ON user.id_level = level.id_level WHERE id_user='$id_user'");
		$data_array = $ambil->fetch_assoc(); 
		
		return $data_array;
	}
	

	function hapus_user($id_user)
	{
		//query hapus data pada tabel user berdasarkan id_user
		$this->koneksi->query("DELETE FROM user WHERE id_user = '$id_user' ");
	}

	function simpan_user($nama_user, $nip_user, $level_user, $username_user, $password_user)
	{
		$pass_enkripsi = md5($password_user);
		$this->koneksi->query("INSERT INTO user (nama_user, nip_user, level_user, username_user, password_user) VALUES ('$nama_user', '$nip_user', '$level_user', '$username_user', '$pass_enkripsi')");
	}

	// penamaan parameter bebas, contoh dibawah adalah $password
	function  ubah_password($password, $id_user)
	{
		// variabel didalam fungsi diambil dari parameter
		$pass_enkripsi = md5(($password));
		$this->koneksi->query("UPDATE user SET password_user = '$pass_enkripsi' WHERE id_user='$id_user' ");

	}
}

$user = new user($database);

 class kegiatan
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function cek_periodekegiatan_sd($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE kegiatan.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_kegiatan_periode_sd($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	

			 WHERE kegiatan.id_semester ='$id_semester' AND kegiatan.id_jenjang = '1' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function cek_periodekegiatan_smp($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE kegiatan.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_kegiatan_periode_smp($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	

			 WHERE kegiatan.id_semester ='$id_semester' AND kegiatan.id_jenjang = '2' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function cek_periodekegiatan_sma($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE kegiatan.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_kegiatan_periode_sma($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	

			 WHERE kegiatan.id_semester ='$id_semester' AND kegiatan.id_jenjang = '3' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	

	function cek_periodekegiatan($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
		 	
			WHERE id_semester='$id_semester' ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_kegiatan($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		  
		 	
			WHERE id_semester='$id_semester'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}


	
	function tampil_class_kegiatan_periode($id_semester)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
			
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		  
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	

			WHERE kegiatan.id_semester='$id_semester' AND kegiatan.id_jenjang='$id_jenjang' ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	function simpan_kegiatan($id_jenjang, $id_semester, $nama, $topik, $bentuk, $waktu_1, $waktu_2, $biaya)
	{ 
	$this->koneksi->query("INSERT INTO kegiatan (id_jenjang, id_semester, nama, topik, bentuk, waktu_1, waktu_2, biaya, laporan ) VALUES ('$id_jenjang', '$id_semester', '$nama', '$topik', '$bentuk', '$waktu_1', '$waktu_2',  '$biaya', '')");
	}

	function tampil_kegiatan()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		 $ambil = $this->koneksi->query("SELECT * FROM kegiatan
		 	
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	 
		 	WHERE kegiatan.id_jenjang = $id_jenjang ORDER BY kegiatan.id_semester, kegiatan.waktu_1
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_kegiatan_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM kegiatan
		 	
		 	LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	 
		 	

		 	ORDER BY kegiatan.id_jenjang, kegiatan.id_semester, kegiatan.waktu_1
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	

	function ambil_kegiatan($id_kegiatan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kegiatan 
				LEFT JOIN jenjang ON kegiatan.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON kegiatan.id_semester = semester.id_semester	 
			WHERE id_kegiatan='$id_kegiatan'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}


	function ubah_kegiatan($id_jenjang, $id_semester, $nama, $topik, $bentuk, $waktu_1, $waktu_2, $biaya,  $id_kegiatan)	
	{
		$this->koneksi->query("UPDATE kegiatan SET id_jenjang= '$id_jenjang', id_semester='$id_semester', nama= '$nama', topik= '$topik', bentuk='$bentuk',  waktu_1=  '$waktu_1', waktu_2=  '$waktu_2', biaya= '$biaya' WHERE id_kegiatan='$id_kegiatan'");
	}

	function hapus_kegiatan($id_kegiatan)
	{
		$this->koneksi->query("DELETE FROM kegiatan 
			

			 WHERE id_kegiatan = '$id_kegiatan'  ");
	}


	


}
 $kegiatan = new kegiatan($database);




class bulan
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}
	function tampil_bulan()
	{
		$ambil = $this->koneksi->query("SELECT * FROM bulan");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
}
$bulan = new bulan($database);



class periodeguest
{
		public $koneksi;
		function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_periode_guest_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM guest
		 	
		 	WHERE id_jenjang = '$id_jenjang' AND id_semester = '$id_semester'

		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	


	function cek_periodeguest($id_semester)
	{
		$ambil = $this->koneksi->query("SELECT * FROM periodeguest WHERE id_semester='$id_semester' ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_periodeguest = $data_array['id_periodeguest'];
		return $id_periodeguest;
		}
		else
		{
			return "kosong";
		}

	}

		function ambil_periodeguest($id_periodeguest)
	{
		$ambil = $this->koneksi->query("SELECT * FROM periodeguest JOIN semester ON periodeguest.id_semester = semester.id_semester WHERE id_periodeguest='$id_periodeguest'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}

	

		function tampil_periodeguest($id_periodeguest)
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM periodeguest JOIN jenjang ON periodeguest.id_jenjang = jenjang.id_jenjang  WHERE id_periodeguest='$id_periodeguest' ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	



}
$periodeguest = new periodeguest($database);


class mitra
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	
		function tampil_mitra_sd()
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mitra 
				LEFT JOIN jenjang ON mitra.id_jenjang = jenjang.id_jenjang
			
		 	
			 WHERE mitra.id_jenjang = '1'  ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}


		function tampil_mitra_smp()
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mitra 
				LEFT JOIN jenjang ON mitra.id_jenjang = jenjang.id_jenjang
			
		 	
			 WHERE mitra.id_jenjang = '2'  ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	


		function tampil_mitra_sma()
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mitra 
				LEFT JOIN jenjang ON mitra.id_jenjang = jenjang.id_jenjang
			
		 	
			 WHERE mitra.id_jenjang = '3'  ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	
	function ambil_periode_mitra($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mitra 
			
		 	LEFT JOIN jenjang ON mitra.id_jenjang = jenjang.id_jenjang
		  
		 	
			WHERE id_semester='$id_semester'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}


	
	function tampil_class_mitra_periode($id_semester)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM mitra 
			
		 	LEFT JOIN jenjang ON mitra.id_jenjang = jenjang.id_jenjang
		  
		 	LEFT JOIN semester ON mitra.id_semester = semester.id_semester	

			WHERE mitra.id_semester='$id_semester' AND mitra.id_jenjang='$id_jenjang' ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	function simpan_mitra($id_jenjang, $bidang, $nama_mitra, $bentuk, $waktu_1, $waktu_2)
	{ 
	$this->koneksi->query("INSERT INTO mitra (id_jenjang, bidang, nama_mitra, bentuk, waktu_1, waktu_2, laporan ) VALUES ('$id_jenjang', '$bidang', '$nama_mitra', '$bentuk', '$waktu_1', '$waktu_2',  '')");
	}

	function tampil_mitra()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		 $ambil = $this->koneksi->query("SELECT * FROM mitra

		 	
		 	
		 	 ORDER BY  mitra.waktu_1
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_mitra_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM mitra
		 	LEFT JOIN jenjang ON mitra.id_jenjang = jenjang.id_jenjang 	
		 	

		 	ORDER BY  id_mitra DESC
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	

	

	function ambil_mitra($id_mitra)
	{
		$ambil = $this->koneksi->query("SELECT * FROM mitra 
				 
			WHERE id_mitra='$id_mitra'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}


	function ubah_mitra($id_jenjang, $bidang, $nama_mitra, $bentuk, $waktu_1, $waktu_2,  $id_mitra)	
	{
		$this->koneksi->query("UPDATE mitra SET id_jenjang= '$id_jenjang', bidang = '$bidang', nama_mitra='$nama_mitra', bentuk= '$bentuk', waktu_1= '$waktu_1', waktu_2= '$waktu_2' WHERE id_mitra='$id_mitra'");
	}

	function hapus_mitra($id_mitra)
	{
		$this->koneksi->query("DELETE FROM mitra 
			

			 WHERE id_mitra = '$id_mitra'  ");
	}


	


}
 $mitra = new mitra($database);





class peminjaman
{



	public $koneksi;

	function __construct($database)
	{
		$this->koneksi = $database;
	}





		function simpan_peminjaman($id_ruang, $id_status, $id_jenjang, $id_guru, $waktu_1, $jam, $keperluan)
	{ 
	$this->koneksi->query("INSERT INTO peminjaman (id_ruang, id_status, id_status_final, id_jenjang, id_guru, waktu_1, jam, keperluan, keterangan) 
		VALUES ('$id_ruang', '$id_status', '', '$id_jenjang', '$id_guru', '$waktu_1', '$jam', '$keperluan',  '')");
	}

	
	function tampil_peminjaman_admin()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		
		 $ambil = $this->koneksi->query("SELECT * FROM peminjaman
		 	
		 	LEFT JOIN guru ON peminjaman.id_guru = guru.id_guru	 
		 	LEFT JOIN ruang ON peminjaman.id_ruang = ruang.id_ruang	
		 	LEFT JOIN jenjang ON peminjaman.id_jenjang = jenjang.id_jenjang 
		 	LEFT JOIN status ON peminjaman.id_status = status.id_status
		 	LEFT JOIN status_final ON peminjaman.id_status_final = status_final.id_status_final


		 	ORDER BY peminjaman.id_status_final, peminjaman.waktu_1 ASC
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_peminjaman_admin3()
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_guru'];
		
		 $ambil = $this->koneksi->query("SELECT * FROM peminjaman
		 	
		 	LEFT JOIN guru ON peminjaman.id_guru = guru.id_guru	 
		 	LEFT JOIN ruang ON peminjaman.id_ruang = ruang.id_ruang	
		 	LEFT JOIN jenjang ON peminjaman.id_jenjang = jenjang.id_jenjang 
		 	LEFT JOIN status ON peminjaman.id_status = status.id_status
		 	LEFT JOIN status_final ON peminjaman.id_status_final = status_final.id_status_final
			 WHERE peminjaman.id_guru = $id_jenjang

		 	ORDER BY peminjaman.id_status_final, peminjaman.waktu_1 ASC
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	
	function tampil_peminjaman_pjruangan()
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		
		 $ambil = $this->koneksi->query("SELECT * FROM peminjaman
		 	
		 	LEFT JOIN guru ON peminjaman.id_guru = guru.id_guru	 
		 	LEFT JOIN ruang ON peminjaman.id_ruang = ruang.id_ruang	
		 	LEFT JOIN jenjang ON peminjaman.id_jenjang = jenjang.id_jenjang 
		 	LEFT JOIN status ON peminjaman.id_status = status.id_status
		 	LEFT JOIN status_final ON peminjaman.id_status_final = status_final.id_status_final


		 	ORDER BY  peminjaman.waktu_1 DESC
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	


	function ambil_peminjaman($id_peminjaman)
	{
		$ambil = $this->koneksi->query("SELECT * FROM peminjaman 
			WHERE id_peminjaman='$id_peminjaman'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}

	


	function ubah_peminjaman($id_ruang, $id_status, $id_jenjang, $id_guru, $waktu_1, $jam, $keperluan, $id_peminjaman)	
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("UPDATE peminjaman SET id_ruang= '$id_ruang', id_status='$id_status', id_jenjang='$id_jenjang', id_guru= '$id_guru', waktu_1=  '$waktu_1', jam='$jam', keperluan= '$keperluan' WHERE id_peminjaman='$id_peminjaman' AND id_guru = '$id_guru' ");
	}

	function ubah_peminjaman_pjruangan($id_guru, $id_jenjang, $id_ruang, $waktu_1, $jam, $keperluan, $id_status, $id_status_final, $keterangan, 

	  $id_peminjaman)
	{
		//$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("UPDATE peminjaman SET id_ruang='$id_ruang',  id_status='$id_status', id_status_final = '$id_status_final', id_jenjang='$id_jenjang', id_guru='$id_guru',  waktu_1='$waktu_1', jam='$jam', keperluan='$keperluan',  keterangan= '$keterangan' WHERE id_peminjaman='$id_peminjaman'  ");
	}

	function hapus_peminjaman($id_peminjaman, $id_guru)
	{
		$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("DELETE FROM peminjaman 
			

			 WHERE id_peminjaman = '$id_peminjaman'  AND id_guru = '$id_guru' ");
	}

	function hapus_peminjaman_pjruangan($id_peminjaman)
	{
		//$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("DELETE FROM peminjaman 
			

			 WHERE id_peminjaman = '$id_peminjaman'   ");
	}


}

$peminjaman = new peminjaman($database);




class ruang
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_ruang()
	{
		
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM ruang

			
			
		");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		function tampil_ruang_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM ruang
			
			
			");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswa()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasd()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE id_jenjang='1' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasdlaki()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE jk_siswa='Laki-Laki' AND id_jenjang='1' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasdpr()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE jk_siswa='Perempuan' AND id_jenjang='1' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}


	function hitung_jumlahsiswasmp()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE id_jenjang='2' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasmplaki()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE jk_siswa='Laki-Laki' AND id_jenjang='2' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasmppr()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE jk_siswa='Perempuan' AND id_jenjang='2' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasma()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE id_jenjang='3' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasmalaki()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE jk_siswa='Laki-Laki' AND id_jenjang='3' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswasmapr()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE jk_siswa='Perempuan' AND id_jenjang='3' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitungalumni()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa WHERE id_kelas='52' OR id_kelas='53' OR id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswaperempuan()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa where jk_siswa='Perempuan' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsiswalaki()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM siswa where jk_siswa='Laki-Laki' AND NOT id_kelas='52' AND NOT id_kelas='53' AND NOT id_kelas='54'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsdk()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM guru where NOT status_guru='TIDAK AKTIF' AND NOT status_guru='NON SDK'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsdkhonorer()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM guru where status_guru='SDK HONORER' AND NOT status_guru='TIDAK AKTIF'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsdkojt()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM guru where status_guru='OJT' AND NOT status_guru='TIDAK AKTIF'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahsdktetap()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM guru where status_guru='SDK' AND NOT status_guru='TIDAK AKTIF'
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahnonsdk()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM guru where status_guru='NON SDK' AND NOT status_guru='TIDAK AKTIF' 
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function hitung_jumlahruangan()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT COUNT(*) FROM ruang
			
			
			");

		while ($data_array = $ambil->fetch_row()) 
		{
			$semua_data = $data_array;
		}
		return $semua_data;	
	}

	function ambil_ruang($id_ruang)
	{

		$ambil = $this->koneksi->query("SELECT * FROM ruang 
			
			
			 WHERE id_ruang = '$id_ruang' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_ruang($nama_ruang, $id_ruang)
	{
		
		$this->koneksi->query("UPDATE ruang SET nama_ruang = '$nama_ruang' WHERE id_ruang='$id_ruang' ");

	}

	function hapus_ruang($id_ruang)
	{
		$this->koneksi->query("DELETE FROM ruang WHERE id_ruang ='$id_ruang' ");
	}

	function simpan_ruang($nama_ruang)
	{
				
		$this->koneksi->query("INSERT INTO ruang (nama_ruang) VALUES ('$nama_ruang')");
	}
	
	
}
$ruang = new ruang($database);



class status
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_status()
	{
		
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM status
			
			
			ORDER BY nama_status DESC;
		");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		function tampil_status_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM status
			
			");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_status($id_status)
	{

		$ambil = $this->koneksi->query("SELECT * FROM status 
			/* LEFT Join siswa ON status.id_status = siswa.id_status */
			 
			
			 WHERE id_status = '$id_status' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_status($nama_status, $id_status)
	{
		
		$this->koneksi->query("UPDATE status SET nama_status = '$nama_status' WHERE id_status='$id_status' ");

	}

	function hapus_status($id_status)
	{
		$this->koneksi->query("DELETE FROM status WHERE id_status ='$id_status' ");
	}

	function simpan_status($nama_status)
	{
				
		$this->koneksi->query("INSERT INTO status (nama_status) VALUES ('$nama_status', '$id_jenjang')");
	}
	
	
}
$status = new status($database);


class status_final
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_status_final()
	{
		
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM status_final
			
			
			ORDER BY nama_status_final DESC;
		");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		function tampil_status_final_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM status_final
			
			");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_status_final($id_status_final)
	{

		$ambil = $this->koneksi->query("SELECT * FROM status_final 
			/* LEFT Join siswa ON status_final.id_status_final = siswa.id_status_final */
			 
			
			 WHERE id_status_final = '$id_status_final' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_status_final($nama_status_final, $id_status_final)
	{
		
		$this->koneksi->query("UPDATE status_final SET nama_status_final = '$nama_status_final' WHERE id_status_final='$id_status_final' ");

	}

	function hapus_status_final($id_status_final)
	{
		$this->koneksi->query("DELETE FROM status_final WHERE id_status_final ='$id_status_final' ");
	}

	function simpan_status_final($nama_status_final)
	{
				
		$this->koneksi->query("INSERT INTO status_final (nama_status_final) VALUES ('$nama_status_final', '$id_jenjang')");
	}
	
	
}
$status_final = new status_final($database);

class pjruangan
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

function login_pjruangan($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM pjruangan WHERE username_pjruangan='$username' AND password_pjruangan='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_pjruangan = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['pjruangan'] = $data_pjruangan;
			return "pjruangan";

		} else {
			return "gagal";
		}
		

		
	}

}

$pjruangan = new pjruangan($database);


class hari
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_hari()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM hari
			");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		

	function ambil_hari($id_hari)
	{

		$ambil = $this->koneksi->query("SELECT * FROM hari  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_hari($hari, $id_hari)
	{
		
		$this->koneksi->query("UPDATE hari SET hari = '$hari' WHERE id_hari='$id_hari' ");

	}

	function hapus_hari($id_hari)
	{
		$this->koneksi->query("DELETE FROM hari WHERE id_hari ='$id_hari' ");
	}

	function simpan_hari($hari)
	{
				
		$this->koneksi->query("INSERT INTO hari (hari) VALUES ('$hari')");
	}
	
	
}
$hari = new hari($database);

class jadwal
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_jadwal()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM jadwal

		LEFT JOIN hari ON jadwal.id_hari = hari.id_hari
		
		LEFT JOIN ruang ON jadwal.id_ruang = ruang.id_ruang
		LEFT JOIN jenjang ON jadwal.id_jenjang = jenjang.id_jenjang	
		ORDER BY jadwal.id_hari, jadwal.id_jam DESC
		");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

		

	function ambil_jadwal($id_jadwal)
	{

		$ambil = $this->koneksi->query("SELECT * FROM jadwal
		WHERE id_jadwal = '$id_jadwal' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}




	function ubah_jadwal($id_jenjang, $id_hari, $id_jam, $id_ruang, $keperluan, $id_jadwal)
	{
		
		$this->koneksi->query("UPDATE jadwal SET id_jenjang = '$id_jenjang', id_hari = '$id_hari', id_jam = '$id_jam', id_ruang = '$id_ruang', keperluan = '$keperluan' WHERE id_jadwal='$id_jadwal' ");

	}

	function hapus_jadwal($id_jadwal)
	{
		$this->koneksi->query("DELETE FROM jadwal WHERE id_jadwal ='$id_jadwal' ");
	}

	function simpan_jadwal($id_jenjang, $id_hari, $id_jam, $id_ruang, $keperluan)
	{
				
		$this->koneksi->query("INSERT INTO jadwal (id_jenjang, id_hari, id_jam, id_ruang, keperluan) VALUES ('$id_jenjang', '$id_hari', '$id_jam', '$id_ruang', '$keperluan')");
	}
	
	
}
$jadwal = new jadwal($database);



class pustaka
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

function login_pustaka($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM pustaka WHERE username_pustaka='$username' AND password_pustaka='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_pustaka = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['pustaka'] = $data_pustaka;
			return "pustaka";

		} else {
			return "gagal";
		}
		

		
	}

}

$pustaka = new pustaka($database);




 class datapustaka
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function cek_periodedatapustaka_sd($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester	 
		 	
			 WHERE datapustaka.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_datapustaka_periode_sd($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester

			 WHERE datapustaka.id_semester ='$id_semester' AND datapustaka.id_jenjang = '1' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodedatapustaka_smp($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester	 
		 	
			 WHERE datapustaka.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_datapustaka_periode_smp($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester

			 WHERE datapustaka.id_semester ='$id_semester' AND datapustaka.id_jenjang = '2' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	

	function cek_periodedatapustaka_sma($id_semester)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester	 
		 	
			 WHERE datapustaka.id_semester='$id_semester'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

		
		function tampil_datapustaka_periode_sma($id_semester)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester

			 WHERE datapustaka.id_semester ='$id_semester' AND datapustaka.id_jenjang = '3' ORDER BY waktu_1 ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	

	function cek_periodedatapustaka($id_semester)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			LEFT JOIN mapel1 ON datapustaka.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON datapustaka.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON datapustaka.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON datapustaka.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON datapustaka.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON datapustaka.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON datapustaka.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON datapustaka.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON datapustaka.id_guru = guru.id_guru	 
		 	
		 	
			WHERE id_semester='$id_semester' ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_semester = $data_array['id_semester'];
		return $id_semester;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_datapustaka($id_semester)
	{
	//	$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON datapustaka.id_guru = guru.id_guru	 
		 	
			WHERE id_semester='$id_semester'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}


	
	function tampil_class_datapustaka_periode($id_semester)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			LEFT JOIN mapel1 ON datapustaka.id_mapel1 = mapel1.id_mapel1		 	
		 	LEFT JOIN mapel2 ON datapustaka.id_mapel2 = mapel2.id_mapel2	 	
		 	LEFT JOIN mapel3 ON datapustaka.id_mapel3 = mapel3.id_mapel3		 	
		 	LEFT JOIN mapel4 ON datapustaka.id_mapel4 = mapel4.id_mapel4		 	
		 	LEFT JOIN kelas ON datapustaka.id_kelas = kelas.id_kelas
		 	LEFT JOIN kelas2 ON datapustaka.id_kelas2 = kelas2.id_kelas2
		 	LEFT JOIN kelas3 ON datapustaka.id_kelas3 = kelas3.id_kelas3
		 	LEFT JOIN kelas4 ON datapustaka.id_kelas4 = kelas4.id_kelas4
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	LEFT JOIN guru ON datapustaka.id_guru = guru.id_guru	 
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester	

			WHERE datapustaka.id_semester='$id_semester' AND datapustaka.id_jenjang='$id_jenjang' ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	
	function simpan_datapustaka( $id_semester, $id_jenjang, $kegiatan, $waktu_1, $waktu_2, $tujuan,  $sasaran, $biaya)
	{ 
	$this->koneksi->query("INSERT INTO datapustaka ( id_semester, id_jenjang, kegiatan, waktu_1, waktu_2, tujuan, sasaran, biaya, laporan) VALUES ( '$id_semester', '$id_jenjang', '$kegiatan',  '$waktu_1', '$waktu_2', '$tujuan', '$sasaran', '$biaya', ' ')");
	}

	function tampil_datapustaka()
	{
		$semua_data = array();
	//	$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		 $ambil = $this->koneksi->query("SELECT * FROM datapustaka
		 	
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester	 
		 	WHERE datapustaka.id_jenjang = $id_jenjang ORDER BY datapustaka.id_semester, datapustaka.waktu_1
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	function tampil_datapustaka_admin()
	{
		$semua_data = array();
		
		 $ambil = $this->koneksi->query("SELECT * FROM datapustaka
		 	
		 	LEFT JOIN jenjang ON datapustaka.id_jenjang = jenjang.id_jenjang
		 	
		 	LEFT JOIN semester ON datapustaka.id_semester = semester.id_semester	 

		 	ORDER BY datapustaka.id_jenjang, datapustaka.id_semester, datapustaka.waktu_1
		 	
		 	");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	
	

	function ambil_datapustaka($id_datapustaka)
	{
		$ambil = $this->koneksi->query("SELECT * FROM datapustaka 
			WHERE id_datapustaka='$id_datapustaka'");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
	}


	function ubah_datapustaka($id_semester, $id_jenjang,  $kegiatan, $waktu_1, $waktu_2, $tujuan, $sasaran, $biaya, $id_datapustaka)	
	{
		//$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("UPDATE datapustaka SET id_semester='$id_semester', id_jenjang= '$id_jenjang',  kegiatan='$kegiatan',  waktu_1=  '$waktu_1', waktu_2=  '$waktu_2', tujuan='$tujuan',  sasaran= '$sasaran', biaya='$biaya' WHERE id_datapustaka='$id_datapustaka' ");
	}

	function hapus_datapustaka($id_datapustaka)
	{
		//$id_guru = $_SESSION['pengguna']['id_guru'];
		$this->koneksi->query("DELETE FROM datapustaka 
			

			 WHERE id_datapustaka = '$id_datapustaka'   ");
	}


	


}
 $datapustaka = new datapustaka($database);

class tp

{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

		function tampil_tp_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM tp ORDER BY nama_tp ASC");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function ambil_tp_admin($id_tp)
	{
		
		$ambil = $this->koneksi->query("SELECT * FROM tp where id_tp=$id_tp");

		while ($data_array = $ambil->fetch_assoc()) 
		
		return $data_array;	
	}



	

	function simpan_tp($nama_tp)
	{
				
		$this->koneksi->query("INSERT INTO tp (nama_tp) VALUES ('$nama_tp')");
	}

	

	function ubah_tp($nama_tp, $id_tp)
	{
		
		$this->koneksi->query("UPDATE tp SET nama_tp = '$nama_tp' WHERE id_tp='$id_tp' ");

	}

	function hapus_tp($id_tp)
	{
		$this->koneksi->query("DELETE FROM tp WHERE id_tp ='$id_tp' ");
	}
	
	
}
$tp = new tp($database);

class jk

{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

		function tampil_jk_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM jk");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	

	function simpan_jk($nama_jk)
	{
				
		$this->koneksi->query("INSERT INTO jk (nama_jk) VALUES ('$nama_jk')");
	}

	

	function ubah_jk($nama_jk, $id_jk)
	{
		
		$this->koneksi->query("UPDATE jk SET nama_jk = '$nama_jk' WHERE id_jk='$id_jk' ");

	}

	function hapus_jk($id_jk)
	{
		$this->koneksi->query("DELETE FROM jk WHERE id_jk ='$id_jk' ");
	}
	
	
}
$jk = new jk($database);

class statuspt

{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

		function tampil_statuspt_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM statuspt");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	

	function simpan_statuspt($nama_statuspt)
	{
				
		$this->koneksi->query("INSERT INTO statuspt (nama_statuspt) VALUES ('$nama_statuspt')");
	}

	

	function ubah_statuspt($nama_statuspt, $id_statuspt)
	{
		
		$this->koneksi->query("UPDATE statuspt SET nama_statuspt = '$nama_statuspt' WHERE id_statuspt='$id_statuspt' ");

	}

	function hapus_statuspt($id_statuspt)
	{
		$this->koneksi->query("DELETE FROM statuspt WHERE id_statuspt ='$id_statuspt' ");
	}
	
	
}
$statuspt = new statuspt($database);

class lulusan
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

		function cek_periodelulusan_sma($id_tp)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt
		 	
			 WHERE lulusan.id_tp='$id_tp'  ORDER BY tp.nama_tp ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_tp = $data_array['id_tp'];
		return $id_tp;
		}
		else
		{
			return "kosong";
		}

	}

	function tampil_periode_lulusan_sma($id_tp)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt

			 WHERE lulusan.id_tp = '$id_tp'  ORDER BY tp.nama_tp ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function cek_periodelulusan($id_tp)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt
		 	
			 WHERE lulusan.id_tp='$id_tp'  ORDER BY tp.nama_tp ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_tp = $data_array['id_tp'];
		return $id_tp;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_lulusan($id_tp)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt
		 	
			WHERE lulusan.id_tp='$id_tp'  ORDER BY tp.nama_tp ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}

		
		function tampil_periode_lulusan($id_tp)
	{
		$semua_data = array();
	//	$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt

			 WHERE lulusan.id_tp = '$id_tp'  ORDER BY tp.nama_tp ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	

	function tampil_lulusan_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan on lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_lulusan()
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lulusan
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function ambil_lulusan_admin($id_lulusan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM lulusan 
			LEFT JOIN jurusan ON lulusan.id_jurusan = jurusan.id_jurusan
			LEFT JOIN tp on lulusan.id_tp = tp.id_tp
			LEFT JOIN jk on lulusan.id_jk = jk.id_jk
			LEFT JOIN statuspt on lulusan.id_statuspt = statuspt.id_statuspt		 
			 WHERE id_lulusan = '$id_lulusan' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_lulusan($id_jurusan, $id_tp, $id_jk, $id_statuspt, $nama_siswa, $nama_kampus, $jalur_kampus, $jurusan_kampus, $ket_lulus, $id_lulusan)
	{
		$detail_lulusan = $this->ambil_lulusan_admin($id_lulusan);
		$this->koneksi->query("UPDATE lulusan SET id_jurusan='$id_jurusan', id_tp = '$id_tp', id_jk = '$id_jk', id_statuspt = '$id_statuspt', nama_siswa='$nama_siswa',  nama_kampus='$nama_kampus', jalur_kampus='$jalur_kampus', jurusan_kampus='$jurusan_kampus', ket_lulus = '$ket_lulus' WHERE id_lulusan='$id_lulusan' ");
	}

	function hapus_lulusan($id_lulusan)
	{
		$this->koneksi->query("DELETE FROM lulusan WHERE id_lulusan='$id_lulusan' ");
	}

	function simpan_lulusan($id_jurusan, $id_tp, $id_jk, $id_statuspt, $nama_siswa, $nama_kampus, $jalur_kampus, $jurusan_kampus, $ket_lulus)
	{
		
		$this->koneksi->query("INSERT INTO lulusan (id_jurusan, id_tp, id_jk, id_statuspt, nama_siswa, nama_kampus, jalur_kampus, jurusan_kampus, ket_lulus) VALUES ('$id_jurusan', '$id_tp', '$id_jk', '$id_statuspt', '$nama_siswa', '$nama_kampus', '$jalur_kampus', '$jurusan_kampus', '$ket_lulus'   )");
	}



}
$lulusan = new lulusan($database);

class lomba
{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	

		
	

	function cek_periodelomba_sd($id_tp)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE lomba.id_tp='$id_tp'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_tp = $data_array['id_tp'];
		return $id_tp;
		}
		else
		{
			return "kosong";
		}

	}

	function tampil_periode_lomba_sd($id_tp)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

			 WHERE lomba.id_tp = '$id_tp' AND lomba.id_jenjang = '1' ORDER BY tp.nama_tp, lomba.tahun_lomba ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodelombasmp($id_tp)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE lomba.id_tp='$id_tp'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_tp = $data_array['id_tp'];
		return $id_tp;
		}
		else
		{
			return "kosong";
		}

	}

	function tampil_periode_lombasmp($id_tp)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

			 WHERE lomba.id_tp = '$id_tp' AND lomba.id_jenjang = '2' ORDER BY tp.nama_tp, lomba.tahun_lomba ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function cek_periodelombasma($id_tp)
	{
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE lomba.id_tp='$id_tp'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_tp = $data_array['id_tp'];
		return $id_tp;
		}
		else
		{
			return "kosong";
		}

	}

	function tampil_periode_lombasma($id_tp)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

			 WHERE lomba.id_tp = '$id_tp' AND lomba.id_jenjang = '3' ORDER BY tp.nama_tp, lomba.tahun_lomba ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}


	function cek_periodelomba($id_tp)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang
		 	
			 WHERE lomba.id_tp='$id_tp'  ");
		$hitung = $ambil->num_rows;

		if ($hitung > 0)
		{
		$data_array = $ambil->fetch_assoc();
		$id_tp = $data_array['id_tp'];
		return $id_tp;
		}
		else
		{
			return "kosong";
		}

	}

	function ambil_periode_lomba($id_tp)
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang
		 	
			WHERE lomba.id_tp='$id_tp'  ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;


		
	}

		
		function tampil_periode_lomba($id_tp)
	{
		$semua_data = array();
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

			 WHERE lomba.id_tp = '$id_tp' AND lomba.id_jenjang = '1' ORDER BY tp.nama_tp, lomba.tahun_lomba ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	
	function tampil_periode_lomba_smp($id_tp)
	{
		$semua_data = array();
		//$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

			 WHERE lomba.id_tp = '$id_tp' AND lomba.id_jenjang = '2' ORDER BY tp.nama_tp, lomba.tahun_lomba ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function tampil_periode_lomba_sma($id_tp)
	{
		$semua_data = array();
	//	$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

			 WHERE lomba.id_tp = '$id_tp' AND lomba.id_jenjang = '3' ORDER BY tp.nama_tp, lomba.tahun_lomba ") or die (mysqli_error($this->koneksi));
		while ($data_array= $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}
	


	function tampil_lomba_admin()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang
			ORDER BY id_lomba DESC
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}

	function tampil_lomba()
	{
		$id_jenjang = $_SESSION['pengguna']['id_jenjang'];
		$ambil = $this->koneksi->query("SELECT * FROM lomba
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang

				WHERE lomba.id_jenjang = $id_jenjang ORDER BY tp.nama_tp, lomba.tahun_lomba
			");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	function ambil_lomba_admin($id_lomba)
	{
		$ambil = $this->koneksi->query("SELECT * FROM lomba 
			LEFT JOIN tp on lomba.id_tp = tp.id_tp
			LEFT JOIN jk on lomba.id_jk = jk.id_jk
			LEFT JOIN jenjang on lomba.id_jenjang = jenjang.id_jenjang		 
			 WHERE id_lomba = '$id_lomba' ");
		$data_array = $ambil->fetch_assoc();
		return $data_array;
		
	}

	function ubah_lomba($id_jenjang, $id_tp, $id_jk, $nama_siswa, $lokasi_lomba, $nama_lomba, $tahun_lomba, $penyelenggara_lomba, $hasil_lomba, $id_lomba)
	{
		$detail_lomba = $this->ambil_lomba_admin($id_lomba);
		$this->koneksi->query("UPDATE lomba SET id_jenjang='$id_jenjang', id_tp = '$id_tp', id_jk = '$id_jk', nama_siswa = '$nama_siswa', lokasi_lomba='$lokasi_lomba',  nama_lomba='$nama_lomba', tahun_lomba='$tahun_lomba', penyelenggara_lomba='$penyelenggara_lomba', hasil_lomba = '$hasil_lomba' WHERE id_lomba='$id_lomba' ");
	}

	function hapus_lomba($id_lomba)
	{
		$this->koneksi->query("DELETE FROM lomba WHERE id_lomba='$id_lomba' ");
	}

	function simpan_lomba($id_jenjang, $id_tp, $id_jk, $nama_siswa, $lokasi_lomba, $nama_lomba, $tahun_lomba, $penyelenggara_lomba, $hasil_lomba)
	{
		
		$this->koneksi->query("INSERT INTO lomba (id_jenjang, id_tp, id_jk, nama_siswa, lokasi_lomba, nama_lomba, tahun_lomba, penyelenggara_lomba, hasil_lomba) VALUES ('$id_jenjang', '$id_tp', '$id_jk', '$nama_siswa', '$lokasi_lomba', '$nama_lomba', '$tahun_lomba', '$penyelenggara_lomba', '$hasil_lomba'   )");
	}



}
$lomba = new lomba($database);

class jurusan

{
	function __construct($database)
	{
		$this->koneksi = $database;
	}

		function tampil_jurusan_admin()
	{
		
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM jurusan");

		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;	
	}


	

	function simpan_jurusan($nama_jurusan)
	{
				
		$this->koneksi->query("INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan')");
	}

	

	function ubah_jurusan($nama_jurusan, $id_jurusan)
	{
		
		$this->koneksi->query("UPDATE jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan='$id_jurusan' ");

	}

	function hapus_jurusan($id_jurusan)
	{
		$this->koneksi->query("DELETE FROM jurusan WHERE id_jurusan ='$id_jurusan' ");
	}
	
	
}
$jurusan = new jurusan($database);


class waka
{
	public $koneksi;
	function __construct($database)
	{
		$this->koneksi = $database;
	}

function login_waka($username, $password)
	{
		// enskripsi password admin
		$pass_enkripsi = md5($password);
		// mengambil data admin berdasarkan inputan username dan password
		$ambil = $this->koneksi->query("SELECT * FROM waka WHERE username_waka='$username' AND password_waka='$pass_enkripsi' ");

		// menghitung data yang cocok
		$hitung = $ambil->num_rows;

		// jika ada data yang cocok
		if ($hitung > 0)
		{
			// mengubah data ke bentuk array
			$data_waka = $ambil->fetch_assoc();

			// membuat session admin
			$_SESSION['waka'] = $data_waka;
			return "waka";

		} else {
			return "gagal";
		}
		

		
	}

}

$waka = new waka($database);
?>




