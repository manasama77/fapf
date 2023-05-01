<?php
class CListJob
{
    protected $conn;
    protected $table = "t_job_vacant";
    protected $lokasi;

    public function __construct($lokasi)
    {
        require_once('./koneksi.php');
        $this->conn = $conn;
        $this->lokasi = $lokasi;
    }

    public function get()
    {
        $where_additional = '';

        if ($this->lokasi) {
            $where_additional = "AND `$this->table`.`lokasi` LIKE '$this->lokasi%'";
        }

        $sql = "
            SELECT `$this->table`.* 
            FROM `$this->table` 
            WHERE `$this->table`.`status` = 1 
            $where_additional
            ORDER BY `$this->table`.`tgl_input` DESC
        ";
        $query = $this->conn->query($sql);
        return ($query->num_rows > 0) ? $query : false;
    }

    public function get_unique_lokasi()
    {
        $sql = "
            SELECT `$this->table`.`lokasi` 
            FROM `$this->table`
            WHERE 
                `$this->table`.`status` = 1
            GROUP BY 
                `$this->table`.`lokasi`
            ORDER BY 
                `$this->table`.`lokasi` ASC
        ";
        $query = $this->conn->query($sql);
        return ($query->num_rows > 0) ? $query : false;
    }
}
