<?php
    // getting all values from the HTML form
    
    $target_dir = "upload/file_cv/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $target_dir_surat = "upload/file_surat/";
    $target_file_surat = $target_dir_surat . basename($_FILES["file_surat"]["name"]);
    
        
        
        
        
    if(isset($_POST['submit']))
    {
        
        $tgl_input = date("Y-m-d H:i:s");
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nama_lengkap = $_POST['fname'] .' '. $_POST['lname'];
        $jk = $_POST['jk'];
        $national = $_POST['national'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $email_address = $_POST['email'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $pendidikan = $_POST['pendidikan'];
        $jurusan = $_POST['jurusan'];
        $jurusan_sawit = $_POST['jurusan_sawit'];
        $ipk = $_POST['ipk'];
        $max_ipk = $_POST['max_ipk'];
        $status_universitas = $_POST['status_universitas'];
        $status = 1;
        $lokasi_univ = $_POST['lokasi_univ'];
        $pengalaman = $_POST['pengalaman'];
        $pengalaman_kebun = $_POST['pengalaman_kebun'];
        $lokasi_kalimantan = $_POST['lokasi_kalimantan'];
        $file_cv = $_FILES["file"]["name"];
        $file_surat = $_FILES["file_surat"]["name"];
        //$nama_file = $_FILES["file"]["name"];
    
       if (file_exists($target_file) && file_exists($target_file_surat)) {
        echo "file already exists Yes.<br>";
        $uOk = 0;
            }
            
                  
                // $_FILES["file"]["tmp_name"] implies storage path
                // in tmp directory which is moved to uploads
                // directory using move_uploaded_file() method
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["file_surat"]["tmp_name"], $target_file_surat)) {
                    echo "The file ". basename( $_FILES["file"]["name"])
                                . " has been uploaded Yes.<br>";
                      
                    // Moving file to New directory 
                    /*if(rename($target_file, "New/". 
                                basename( $_FILES["file"]["name"]))) {
                        echo "File moving operation success<br>";
                    }
                    else {
                        echo "File moving operation failed..<br>";
                    }*/
                }
                else {
                    echo "Sorry, there was an error uploading your file Yes.<br>";
                }
            

    }else{
        
        $tgl_input = date("Y-m-d H:i:s");
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nama_lengkap = $_POST['fname'] .' '. $_POST['lname'];
        $jk = $_POST['jk'];
        $national = $_POST['national'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $email_address = $_POST['email'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $pendidikan = $_POST['pendidikan'];
        $jurusan = $_POST['jurusan'];
        $jurusan_sawit = $_POST['jurusan_sawit'];
        $ipk = $_POST['ipk'];
        $max_ipk = $_POST['max_ipk'];
        $status_universitas = $_POST['status_universitas'];
        $status = 1;
        $lokasi_univ = $_POST['lokasi_univ'];
        $pengalaman = $_POST['pengalaman'];
        $pengalaman_kebun = $_POST['pengalaman_kebun'];
        $lokasi_kalimantan = $_POST['lokasi_kalimantan'];
        $file_cv = $_FILES["file"]["name"];
        $file_surat = $_FILES["file_surat"]["name"];
        //$nama_file = $_FILES["file"]["tmp_name"];

        
       if (file_exists($target_file) && file_exists($target_file_surat) ) {
        echo "file already exists.<br>";
        $uOk = 0;
            }
              
                  
                // $_FILES["file"]["tmp_name"] implies storage path
                // in tmp directory which is moved to uploads
                // directory using move_uploaded_file() method
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["file_surat"]["tmp_name"], $target_file_surat) ) {
                    echo "The file ". basename( $_FILES["file"]["name"])
                                . " has been uploaded.<br>";
                      
                    // Moving file to New directory 
                    /*if(rename($target_file, "New/". 
                                basename( $_FILES["file"]["name"]))) {
                        echo "File moving operation success<br>";
                    }
                    else {
                        echo "File moving operation failed..<br>";
                    }*/
                }
                else {
                    echo "Sorry, there was an error uploading your file $target_file.<br>";
                }
      
    }

    // database details
    $host = "localhost";
    $username = "u1673034_hrm";
    $password = "hrm@212#";
    $dbname = "u1673034_hrm";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    
    // using sql to create a data entry query
    //move_upload_file($file_cv, 'upload/file_cv/'. $file_cv); //folder file CV
    
    $sql = "INSERT INTO t_pelamar ( tgl_input, email_address, email, nama_lengkap, fname, lname, jk, national, hp, tempat_lahir, tgl_lahir, alamat, pendidikan, status_universitas, lokasi_univ, jurusan, jurusan_sawit, ipk, max_ipk, file_cv, file_surat, status, pengalaman, pengalaman_kebun, lokasi_kalimantan) VALUES ( '$tgl_input','$email_address','$email','$nama_lengkap','$fname', '$lname','$jk', '$national', '$hp', '$tempat_lahir', '$tgl_lahir', '$alamat', '$pendidikan', '$status_universitas', '$lokasi_univ', '$jurusan', '$jurusan_sawit', '$ipk', '$max_ipk', '$file_cv', '$file_surat', '$status', '$pengalaman', '$pengalaman_kebun', '$lokasi_kalimantan')";
    
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Selamat Data Anda Sudah Terkirim, Akan Kami Proses Segera...!";
    } 
    
    else  { 
        echo "Data Anda Kurang, Silahkan Lengkapi Dahulu...!";
    }
    
    // ambil data file
    $file_cv = $_FILES['berkas']['file_cv'];
    $file_surat = $_FILES['berkas']['file_surat'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "frontpage/terupload/";

  
    // close connection
    mysqli_close($con);

?>