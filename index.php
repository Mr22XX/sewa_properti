<?php
session_start();
include "conn.php";

if(isset($_POST['pesan'])){
    $_SESSION['pesan'] = true;
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $durasi = $_POST['durasi'];
    $properti = $_POST['properti'];

    $query = "INSERT INTO sewa (nama, hp, durasi, properti) VALUES ('$nama', '$hp', '$durasi', '$properti')";

    $hasil = mysqli_query($conn, $query);

    if($hasil){
        echo
        "<script>
            alert('pesanan berhasil');
            window.location.href = 'orders.php';
        </script>";
    }
    else{
        echo
        "<script>
            alert('pesanan gagal')
        </script>";
    }
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

    <!-- Start form -->
     <div class="container mx-auto px-4 py-4">
         <form action="" method="post">
             <div class="text-white h-auto w-full">
                 <h1 class="text-2xl text-white font-bold">Halaman Pemesanan</h1>
                 <div class="mt-8">
                     <label for="nama" class="block mb-3">Nama : </label>
                     <input type="text" name="nama" class="w-full text-lg h-9 text-black rounded" required>
                </div>
                 <div class="mt-8">
                     <label for="hp" class="block mb-3">Nomor HP : </label>
                     <input type="text" name="hp" class="w-full text-lg h-9 text-black rounded" required>
                </div>
                 <div class="mt-8">
                     <label for="durasi" class="block mb-3">Durasi Sewa : </label>
                     <input type="number" name="durasi" id="durasi" class="w-full text-lg h-9 text-black rounded" required>
                </div>
                 <div class="mt-8">
                     <label for="properti" class="block mb-3">Jenis Properti : </label>
                     <select name="properti" id="properti" class="w-full h-9 rounded text-black" required>
                        <option>Kamar</option>
                        <option>Pavilion</option>
                        <option>Rumah</option>
                        <option>Kios</option>
                        <option>Ruko</option>
                     </select>
                </div>
               
            
                <div class="mt-8">
                    <h1 id="total"> </h1>
                </div>
                
                <div class="mt-8">
                    <button type="submit" name="pesan" class="w-16 h-10 rounded bg-green-600">Pesan</button>
                </div>
            </div>        
        </form>
        <div class="mt-8">
                <button  onclick="hitung()" class="w-16 h-10 rounded bg-blue-600">Hitung</button>
        </div>
    </div>
    <!-- End Form -->
    
<script>
    function hitung(){

        let properti =document.getElementById('properti').value;
        let durasi =document.getElementById('durasi').value;
        let total =document.getElementById('total');
        
        if(properti === "Kamar"){
            total.innerText ="Total Harga: Rp." + durasi * 500000;
        }
        else if(properti === "Pavilion"){
            total.innerText ="Total Harga: Rp." + durasi * 1000000;
            
        }
        else if(properti === "Rumah"){
            total.innerText ="Total Harga: Rp." + durasi * 2000000;
            
        }
        else if(properti === "Kios"){
            total.innerText ="Total Harga: Rp." + durasi * 1500000;
            
        }
        else if(properti === "Ruko"){
            total.innerText ="Total Harga: Rp." + durasi * 2500000;
            
        }
    }
</script>
</body>
</html>