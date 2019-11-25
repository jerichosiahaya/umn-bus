# U-Bus
[![License](http://img.shields.io/:license-mit-blue.svg)](http://doge.mit-license.org)

![Universitas Multimedia Nusantara](https://cdns.klimg.com/merdeka.com/i/w/news/2019/09/19/1110741/670x335/umn-tawarkan-beasiswa-sejumlah-program-studi-khusus-minat.jpg)

## Fitur
- Login (sesuai NIM/ID)
- Memesan tiket
- Melihat tiket
- Membatalkan tiket

## Instalasi
- Download semua file
- Taruh di htdocs XAMPP
- Buat database dengan nama "umn-bus-baru" di MySQL Server
- Import SQL File dari folder database (gunakan yang umn-bus-baru)

## Author
- [Jericho Siahaya]( https://github.com/jerichosiahaya )
- [Ricky Ng]( https://github.com/rickyreplying )
- [Darren Riota]( https://github.com/VDarrenRiota )

#### <i>Major Update<i>
<i>Ganti nama database di koneksi.php, db-init.php dan db-ts.php (di dalam folder components) dengan nama database yang ingin dipakai. Gunakan database terbaru "umn-bus-baru" yang terdapat di dalam folder database. <bold> Jika muncul error saat pertama kali login, langsung direfresh, error itu karena timeout XAMPP yang diset 30 detik, sedangkan database ini butuh lebih dari 30 detik saat pertama kali login.</bold><i>
