<?php
session_start();

if(!isset($_SESSION['pesan'])){
    header("Location:index.php");
    exit;
}
function rupiah($angka){
    $hasil = "Rp ". number_format($angka, "2", ",", ".");
    return $hasil;
}

if(isset($_POST['back'])){
    echo"<script>
        window.location.href = 'index.php'
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Properti</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-600 h-screen">
    
    <!-- Start Header -->
    <header>
        <div class="h-24 bg-slate-500 flex justify-center items-center">
            <img src="./img/logo.png" alt="Logo" width="120px" >
        </div>
    </header>
    <!-- End Header -->

    <!-- Start table -->
    <div class="px-20">
        <h1 class="text-2xl font-bold text-white py-4">Daftar Pemesanan</h1>
    </div>
     <div class="container px-4 mx-auto py-4 text-white">
         <table class="w-full table-fixed text-center">
            <thead>
                <tr>
                     <th class="border border-white">Nama</th>
                     <th class="border border-white">Nomor HP</th>
                     <th class="border border-white">Durasi Sewa (Bulan)</th>
                     <th class="border border-white">Jenis Properti</th>
                     <th class="border border-white">Total Harga</th>
                </tr>
            </thead>
            <tbody class=" w-full ">
                <?php

                include "conn.php";
                
                $query = "SELECT * FROM sewa";
                $hasil = mysqli_query($conn, $query);
                
                while($data = mysqli_fetch_assoc($hasil)){
                

                    if($data['properti'] === "Kamar"){
                        $total = $data['durasi'] * 500000;
                    }
                    else if($data['properti'] === "Pavilion"){
                        $total = $data['durasi'] * 1000000;
                    }
                    else if($data['properti'] === "Rumah"){
                        $total = $data['durasi'] * 2000000;
                    }
                    else if($data['properti'] === "Kios"){
                        $total = $data['durasi'] * 1500000;
                    }
                    else if($data['properti'] === "Ruko"){
                        $total = $data['durasi'] * 2500000;
                    
                    
                    }
                
                ?>
                <tr>
                   
                    <td class="border border-white "><?=$data['nama']?></td>
                    <td class="border border-white "><?=$data['hp']?></td>
                    <td class="border border-white "><?=$data['durasi']?></td>
                    <td class="border border-white "><?=$data['properti']?></td>
                    <?php
                       
                    
                    ?>
                    <td class="border border-white "><?=rupiah($total)?></td>
                   
                </tr>
                <?php
                    
                }
                ?>
            </tbody>
        </table>

        <form action="" method="post">
            <div class="mt-8">
                <button type="submit" name="back" class="w-16 h-10 rounded bg-blue-600">Back</button>
            </div>
        </form>
    </div>
    <!-- End table -->
    

</body>
</html>