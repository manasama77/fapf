<?php
class CListJob
{
    protected $conn;
    protected $lokasi;
    protected $keyword;
    protected $batas;
    protected $halaman;
    protected $halaman_awal;
    protected $prev;
    protected $next;

    public function __construct($lokasi, $keyword, $halaman = 1)
    {
        require_once('./koneksi.php');
        $this->conn = $conn;
        $this->lokasi = $lokasi;
        $this->keyword = $keyword;
        $this->batas = 1;
        $this->halaman = $halaman;
        $this->halaman_awal = ($halaman > 1) ? ($halaman * $this->batas) - $this->batas : 0;

        $this->prev = $halaman - 1;
        $this->next = $halaman + 1;
    }

    public function get()
    {
        $where_additional = 't_job_vacant.`status` = 1';

        $sql_all_data   = "SELECT * FROM t_job_vacant WHERE $where_additional";
        $query_all_data = $this->conn->query($sql_all_data);
        $total_data     = $query_all_data->num_rows;
        $total_halaman  = ceil($total_data / $this->batas);

        if ($this->lokasi) {
            $where_additional .= "
            AND t_job_vacant.lokasi = '$this->lokasi'
            ";
        }

        if ($this->keyword) {
            $where_additional .= "
            AND
            (
                t_job_vacant.`skill` LIKE '$this->keyword%'
                OR t_job_vacant.`lokasi` LIKE '$this->keyword%'
                OR t_jabatan.`nama_jabatan` LIKE '$this->keyword%'
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
            LIMIT $this->halaman_awal, $this->batas
        ";

        // echo '<pre>' . print_r($sql, 1) . '</pre>';
        // exit;

        $query = $this->conn->query($sql);

        $return = [
            'halaman'       => $this->halaman,
            'total_halaman' => $total_halaman,
            'lokasi'        => $this->lokasi,
            'halaman'       => $this->halaman,
            'prev'          => $this->prev,
            'next'          => $this->next,
            'data'          => [],
        ];

        if ($query->num_rows == 0) {
            return $return;
        }

        $no = $this->halaman_awal + 1;
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
}
