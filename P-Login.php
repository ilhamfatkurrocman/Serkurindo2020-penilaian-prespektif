<?php
// session : untuk login dan logout, di simpan dalam session, untuk merekam
session_start();
include "Koneksi.php";
    $username = $_POST['USER'];
    $password = $_POST['PASSWORD'];

    $sql_cek_user = "SELECT USER, PASSWORD, STATUS
                        FROM USER WHERE USER = '" . $username . "' AND PASSWORD ='" . $password . "'";
    $qwr_cek_user = mysqli_query($con, $sql_cek_user);
    $cekLevel = mysqli_num_rows($qwr_cek_user);

    // cek apakah username dan password di temukan pada database
    if($cekLevel > 0){
    
        $data = mysqli_fetch_assoc($qwr_cek_user);
    
        // cek jika user login sebagai admin
        if($data['STATUS']== 1){
    
            // buat session login dan username
            $_SESSION['USER'] = $username;
            $_SESSION['STATUS'] = "1";

            // alihkan ke halaman dashboard admin
            echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=index.php\">");
    
        // cek jika user login sebagai supervisior
        }else if($data['STATUS']== 2){

            // buat session login dan username
            $_SESSION['USER'] = $username;
            $_SESSION['STATUS'] = "2";

            // alihkan ke halaman dashboard supervisior
            echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=index.php\">");
    
        // cek jika user login sebagai sales
        }else if($data['STATUS']== 3){

            // buat session login dan username
            $_SESSION['USER'] = $username;
            $_SESSION['STATUS'] = "3";

            // alihkan ke halaman dashboard sales
            echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=index.php\">");
    
        }else{
 
		// alihkan ke halaman login kembali
		 echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=Login.php\">");
	    }	
    }else{

?>
    <script language="JavaScript">
        alert('Username or Password yang anda masukkan salah :(');
        document.location = 'Login.php';
    </script>
<?php
    }
//}
?>