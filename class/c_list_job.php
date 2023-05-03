<?php
class CListJob
{
    protected $conn;

    public function __construct()
    {
        require_once('./koneksi.php');
        $this->conn = $conn;
    }

    public function get($lokasi, $keyword, $halaman = 1)
    {
        $batas = 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        $prev = $halaman - 1;
        $next = $halaman + 1;

        $where_additional = 't_job_vacant.`status` = 1';

        $sql_all_data   = "SELECT * FROM t_job_vacant WHERE $where_additional";
        $query_all_data = $this->conn->query($sql_all_data);
        $total_data     = $query_all_data->num_rows;
        $total_halaman  = ceil($total_data / $batas);

        if ($lokasi) {
            $where_additional .= "
            AND t_job_vacant.lokasi = '$lokasi'
            ";
        }

        if ($keyword) {
            $where_additional .= "
            AND
            (
                t_job_vacant.`skill` LIKE '$keyword%'
                OR t_job_vacant.`lokasi` LIKE '$keyword%'
                OR t_jabatan.`nama_jabatan` LIKE '$keyword%'
            )
            ";
        }

        $sql = "
            SELECT 
                t_job_vacant.id,
                t_job_vacant.skill,
                t_job_vacant.lokasi,
                t_jabatan.nama_jabatan 
            FROM t_job_vacant 
            LEFT JOIN t_jabatan ON t_jabatan.kode_jabatan = t_job_vacant.jabatan 
            WHERE $where_additional
            ORDER BY t_job_vacant.`tgl_input` DESC
            LIMIT $halaman_awal, $batas
        ";

        // echo '<pre>' . print_r($sql, 1) . '</pre>';
        // exit;

        $query = $this->conn->query($sql);

        $return = [
            'halaman'       => $halaman,
            'total_halaman' => $total_halaman,
            'lokasi'        => $lokasi,
            'halaman'       => $halaman,
            'prev'          => $prev,
            'next'          => $next,
            'data'          => [],
        ];

        if ($query->num_rows == 0) {
            return $return;
        }

        $no = $halaman_awal + 1;
        while ($row = $query->fetch_assoc()) {
            $nested['id']           = $row['id'];
            $nested['skill']        = $row['skill'];
            $nested['lokasi']       = $row['lokasi'];
            $nested['nama_jabatan'] = $row['nama_jabatan'];

            array_push($return['data'], $nested);
        }

        return $return;
    }

    public function get_unique_lokasi()
    {
        $sql = "
            SELECT 
                t_job_vacant.`lokasi` 
            FROM t_job_vacant
            WHERE 
                t_job_vacant.`status` = 1
            GROUP BY 
                t_job_vacant.`lokasi`
            ORDER BY 
                t_job_vacant.`lokasi` ASC
        ";
        $query = $this->conn->query($sql);
        return ($query->num_rows > 0) ? $query : false;
    }

    public function show($id)
    {
        $sql = "
        SELECT 
            t_job_vacant.id,
            t_job_vacant.tgl_input,
            t_job_vacant.tgl_dibutuhkan,
            t_job_vacant.status_karyawan,
            t_job_vacant.pengalaman,
            t_job_vacant.jk,
            t_job_vacant.lokasi,
            t_job_vacant.usia_min,
            t_job_vacant.usia_max,
            t_job_vacant.pendidikan,

            t_jabatan.kode_jabatan, 
            t_jabatan.nama_jabatan, 
            t_jabatan.reportTo as nama_departemen, 
            t_jabatan.posisi as informasi_pekerjaan, 
            t_jabatan.tugas, 
            t_jabatan.kriteria
        FROM t_job_vacant
        LEFT JOIN t_jabatan ON t_jabatan.kode_jabatan = t_job_vacant.jabatan 
        WHERE t_job_vacant.id = $id
        ";
        $query = $this->conn->query($sql);

        $return = [];

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $return['id']                  = $row['id'];
                $return['tgl_posted']          = $this->tgl_indo($row['tgl_posted']);
                $return['tgl_dibutuhkan']      = $this->tgl_indo($row['tgl_dibutuhkan']);
                $return['status_karyawan']     = $row['status_karyawan'];
                $return['pengalaman']          = $row['pengalaman'];
                $return['jk']                  = ($row['jk'] == "L") ? "Male" : "Female";
                $return['lokasi']              = $row['lokasi'];
                $return['usia_min']            = $row['usia_min'];
                $return['usia_max']            = $row['usia_max'];
                $return['pendidikan']          = $row['pendidikan'];
                $return['kode_jabatan']        = $row['kode_jabatan'];
                $return['nama_jabatan']        = $row['nama_jabatan'];
                $return['nama_departemen']     = $row['nama_departemen'];
                $return['informasi_pekerjaan'] = $row['informasi_pekerjaan'];
                $return['tugas']               = $row['tugas'];
                $return['kriteria']            = $row['kriteria'];
            }
        }

        return $return;
    }

    protected function tgl_indo($tanggal)
    {
        $tgl_obj = new DateTime($tanggal);
        return $tgl_obj->format('d/M/Y');
    }
}
