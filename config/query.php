function tampil_mapel()
	{
		$ambil = $this->koneksi->query("SELECT * FROM mapel");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

function tampil_level()
	{
		$ambil = $this->koneksi->query("SELECT * FROM level");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}

	function tampil_project()
	{
		$semua_data = array();
		$ambil = $this->koneksi->query("SELECT * FROM project
		");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semua_data[] = $data_array;
		}
		return $semua_data;
	}	

	SELECT * FROM project 
			JOIN level ON project.level = level.id_level
			JOIN mapel ON laporan.id_mapel1 = mapel.id_mapel