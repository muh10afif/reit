Report 14/08/2019

Nama Project : Reminder ATM
Tahapan : Build
Detail :

1. Membuat folder project atm
2. Setting config codeigniter
3. Membuat controller login:
- membuat fungsi index, menampikan halaman view v_login
- membuat fungsi cek_login, mengecek saat proses login
- membuat fungsi yuk_keluar, untuk proses keluar logout
4. Membuat model M_login:
- membuat fungsi cek_username, mencari username dari form input login
5. Membuat library template, untuk view template
6. Membuat library cek_login_lib: 
- membuat fungsi logged_in dan logged_in_2
7. Membuat controler master:
- membuat fungsi karyawan, menampilkan halaman v_karyawan
- membuat fungsi tampil_karyawan, untuk menampilkan list karyawan dengan return json
- membuat fungsi tambah_karyawan, untuk proses tambah data karyawan
8. Membuat model M_master:
- membuat fungsi get_data_karyawan, untuk menampilkan list karyawan
- membuat fungsi input_data, untuk proses input data 
9. Membuat view v_login
10. Membuat view V_karyawan
11. Membuat view Template

Progress : 15%

Report 13/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Proses pemindahan data ke file server:
- Mengganti controller prospektus, pengguna
- Menambahkan controller investor, manager
- Menghapus controller histori_transaksi, saham_properti, approve_lot
- Mengganti model M_data, M_invest, M-prospektus
- Mengganti view template
- Membuat folder investor dan manager, investor berisi view histori_transaksi, saham_properti, manager berisi approve lot, detail approve, publish_report
- Mengganti view v_buat_project pada kontributor

Progress : 99%

Report 12/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki fungsi mengirim aktivasi melalui email pada saat register
2. Merubah modal form investasi pada halaman detail
3. Memperbaiki from metode bayar pada transaksi koperasi
4. Memperbaiki input nilai invetasi anggota koperasi 
5. Memperbaiki fungsi simpan_nilai_investasi:
- menambahkan fungsi untuk menampilkan pesan bahwa jumlah invetasi melebihi total harga
- membuat kondisi bila jumlah invest melebihi total harga, tidak merubah nilai sebelumnya yang telah diinput
6. Merubah halaman view home edit, untuk pengaturan cms
7. Memperbaiki redirect bila saat pada halaman home ingit melihat detail prospektus, menuju halaman detail pada investor

Progress : 98%

Report 09/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki view halaman v_detail:
- Menggunakan breadcrumb, tidak menggunakan button kembali
- Menambahkan kondisi berbagai level pengguna, untuk redirect ke halaman yang dituju
2. Menambahkan data variable judul untuk fungsi index, detail, detal_kws controller Prospektus
3. Memperbaiki button investasi untuk level investor, menampilkan modal investasi
4. Memperbaiki fungsi koperasi controller prospektus:
- tidak menggunak result_array pada list data blok kawasan
- membuat kondisi untuk uri segment yang digunakan bila kode transaksi terisi atau tidak
5. Menampilkan sisa lot dari unit prospektus:
- memperbaiki fungsi get_data_unit, mengubah query dengan sisa lot yang ada
6. Membuat fungsi get_jml_lot_beli model M_prospektus:
- menampilkan jumlah lot yang telah dibeli menurut id_prospektus
7. Membuat kondisi bila jumlah sisa lot telah 0 maka button invetasi disabled

Progress : 90%

Report 08/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki fungsi index controller prospektus:
- membuat kondisi untuk level pengguna investor, mengambil data blok
- membuat fungsi get_data_blok_investor untuk menampilkan beserta dengan jumlah unit yang telah dibuat pada prospektus
- membuat kondisi bila parameter kketiga kode transaksi terisi atau ada, menggunakan uri segment 3 atau 4 
2. Memperbaiki fungsi proses invest controller Prospektus:
- membuat kondisi untuk redirect halaman saat proses telah selesai, saat level pengguna investor
3. Memperbaiki fungsi detail_kws controller Prospektus:
- membuat fungsi get_jumlah_unit model M_prospektus, menampilkan jumlah unit mnrt id_blok
4. Memperbaiki input jumlah lot pada form investasi:
- membuat javascript untuk menampilkan pesan bila jumlah lot yang dimasukkan tidak lebih dari jumlah lot yang tersedia

Progress : 89%

Report 07/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki fungsi index controller publish report
- membuat fungsi get_data_unit model M_invest, menampilkan data unit transaksi
2. Memperbaiki view halaman v_publish_report
- menampilkan data unit transaksi pada tabel data unit
3. Memperbaiki view v_prospektus, menghilangkan button edit untuk level investor
4. Memperbaiki menu template pada view template
5. Membuat controller investor:
- membuat fungsi saham_properti dan history_transaksi
6. Membuat controller manager:
- membuat fungsi approve_lot, detail_approve, ubah_stat_invest, dan publish_report
7. Memperbaiki fungsi histori_transaksi:
- membuat fungsi get_data_tr_beli model M_invest
8. Memperbaiki view v_histori_transaks:
- menampilkan data transaksi beli
9. Memperbaiki redirect halaman jika session level investor

Progress : 87%

Report 06/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki halaman approve lot:
- menampilkan status transaksi investor
- memperbaiki view approve lot, menambahkan fungsi array array_count_values untuk menghitung jumlah dari tiap status transaksi
- membuat kondisi bila status 0, 1, atau 2 akan menampilkan text yg berbeda
2. Memperbaiki halaman detail approve lot:
- membuat kondisi bila status 0, 1, atau 2 akan menampilkan text yg berbeda
- menampilkan modal untuk ubah status 
3. Membuat fungsi ubah_stat_invest controller approve_lot
- membuat fungsi ubah_status_approve model M_invest
- membuat kondisi bila mengambil inputan dengan uri segment atau inputan form
4. Menampilkan data pada halaman publish report bagian tab prospektus:
- memperbaiki fungsi index controller publish report
- membuat fungsi get_data_pros model M_invest, untuk menampilkan data transaksi prospektus
5. Memperbaiki halaman v_publish_report:
- menampilkan data transaksi prospektus
- membuat random string untuk pembuatan kode prospektus dan kode unit

Progress : 85%

Report 05/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Menambahkan inputan untuk menampilkan total dari nilai investasi
2. Membuat javascript fungsi sum untuk menghitung jumlah dari nilai invetasi
3. Menambahkan javascript formatNumber untuk membuat separator pada javascript
4. Menampilkan data approve lot:
- memperbaiki fungsi get_data_invest model M_invest
5. Menampilkan status dari list invest

Progress : 82%

Nama Project : SIP-BJB Interasi 1.1
Tahapan : Build
Detail :

1.	Memperbaiki upload data excel npl dan wo:
- memperbaiki fungsi simpan dan simpanWO
a. menambahkan convert format tanggal start, mate, dan tgl wo menjadi Y-m-d
b. menambahkan fungsi untuk menghapus string yang menggunakan koma pada beberapa field.

Progress : 100%

Report 02/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Menampilkan tanggal transaksi pada list data history, dan memakai group by kode transaksi
2. Membuat fungsi simpan_nilai_investasi controller prospektus
- menyimpan proses simpan data detail investasi anggota koperasi
- membuat fungsi ubah_nilai_invest model m_prospektus, untuk mengubah nilai investasi dari anggota
3. Memperbaiki tampilan detail history
4. Membuat inputan nilai investasi anggota hanya bisa memasukan angka saja
- membuat javascript untuk membuat inputan hanya angka
- membuat perulangan pada javacript dan css menampikan error jika masukkan huruf

Progress : 81%

Report 01/08/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki form investasi pada halaman detail unit
2. Memperbaiki desain transaksi koperasi
3. Memperbaiki fungsi history_kop controller:
- membuat fungsi get_data_history_koperasi model M-prospektus
4. Membuat fungsi detail_history controller prospektus
- Menampilkan data history sesuai dengan kode transaksi  
5. Membuat fungsi get_data_detail_history model M_prospektus, menampilkan detail history
6. Membuat fungsi get_data_anggota_id model M_prospektus, menampilkan anggota sesuai id_pengguna
7. Membuat fungsi tambah_anggota_det controller prospektus:
- memproses tambah data anggota secara multiple select
- membuat fungsi simpan_detail_invest model M_prospektus, query simpan data
8. Membuat fungsi hapus_his_det controller Prospektus
- proses hapus data anggota history
- membuat fungsi hapus_det_his model M_prospektus, query hapus data

Progress : 80%

Report 31/07/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Pada halaman pengguna koperasi:
- menampilkan prospektus pada halaman utama, tidak menampilkan prospektus kontributor
- membuat fungsi koperasi pada controller prospektus
- membuat fungsi get data blok koperasi pada model koperasi
2. Memperbaiki form investasi:
- membuat input jumlah lot hanya menerima number
- membuat perulangan pada javascript untuk proses menampilkan total dari perkalian jumlah lot investasi
3. Menampilkan data transaksi koperasi:
- menampilkan transaksi menurut session yang ada
4. Memperbaiki tampilan modal bayar:
- menampilkan tab bayar dengan cas dan transfer
5. Memproses form bayar:
- memperbaiki fungsi transaksi bayar cash, membuat batas bayar dan total harga dengan tambah angka unik
- memperbaiki fungsi transaksi bayar transfer, menyimpan data dengan batas bayar dan total harga
- memperbaiki redirect halaman sesuai dengan session sebelumnya

Progress : 79%

Report 30/07/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki halaman dengan user kontributor:
a. memperbaiki view v_buat_project:
- memperbaiki semua inputan yang menggunakan hanya angka, menambahkan javacript untuk mengecek yang diunput angka atau tidak
b. memperbaiki view v_unit:
- menghapus button kembali diganti dengan breadcrumb
- menambahkan button kirim pada tiap prospektus unit
- menggunakan confirm bila menekan tombol kirim
c. memperbaiki fungsi ubah_status_pros_con controller prospektus:
- menambahkan uri segment ke 4, membuat kondisi bila segemnt 4 terisi akan redirect ke halaman mana

Progress : 78%

Report 02/07/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki saat investasi, memilih button lanjutkan investasi:
- Memakai kode transaksi yang sama dengan membuat session kode transaksi
- Menambahkan input hidden value kode_transaksi pada form investasi
- Membuat kondisi pada fungsi proses invest controller Prospektus
- Jika ada value kode_transaksi maka memakainya, jika tidak menggunakan kode_transaksi yang baru
2. Menambahkan semua paramater dengan kode transaksi:
- Untuk membuat kondisi menggunakkan kode transaksi
- Menambahkan parameter base64_encode kd_transaksi pada aksi button kembali v_detail, v_unit  
- Menambahkan variabel berisi uri segment kode_transaksi pada fungsi index, detail, detail_kws controller prospektus
3. Membuat kondisi bila telah melakukan investasi:
- Memperbaiki fungsi detail controller prospektus
- Membuat fungsi model cek_kode_pros pada M_prospektus, mengecek ada atau tidak menurut kd_transaksi dan id_prospektus
- Membuat kondisi untuk button invstasi pada v_detail, jika belum invetasi tetap muncul button investasi 

Progress : 77%

Report 13/06/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki fungsi simpan_data_pengguna pada controller pengguna:
- menambahkan fungsi untuk menghapus foto sebelumnya pada saat edit foto profil
- menambahkan kondisi pada saat kondisi edit data, bila id_pengguna pada tabel detail profil tidak ada
2. Memperbaiki fungsi cek_login pada controller Signin:
- Menambahkan kondisi untuk mengecek akun aktif atau tidak
3. Membuat halaman view V_profil, untuk menampilkan halaman detail profil tiap akun pengguna:
- Membuat fungsi profil pada controller pengguna
- Membuat fungsi pada model M_data: cari_provinsi, cari_kota, cari_kecamatan, cari_kelurahan
- Membuat kondisi saat kembali pada view v_form edit data
4. Menambahkan session pada saat tambah, edit data penguna. untuk menampilkan data session terbaru. saat data pengguna diubah

Progress : 72%

Report 12/06/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki tampilan button edit, hapus pada semua tabel data
2. Menampilkan data edit provinsi, kota, kecamatan, kelurahan berubah menjadi nama string bukan integer
3. Memperbaiki fungsi aksi_data controller pengguna
- Membuat fungsi get_data_profil pada model M_data, untuk mencari data detail profil sesuai id_pengguna
4. Memperbaiki halama view v_form:
- Menambahkan kondisi pada input provinsi, kota, kecamatan, kelurahan. saat edit data maupun detail data, selected data sesuai dengan data detail profil id_pengguna
5. Memperbaiki view halaman V_form:
- Menambahkan card body untuk inputan ganti foto profil
- Membuat kondisi saat aksi tambah, edit, atau detail pada inputan foto profil
- Merubah jquery untuk library dropify
6. Memperbaiki combobox pada saat kondisi edit, detail data:
- Memperbaiki fungsi aksi data pada controller pengguna
- Membuat fungsi get_data_profil pada model M_data, untuk menampilkan data tabel detail_profil sesuai dengan id_pengguna
- Merubah view V_form untuk data detail_profil pada saat kondisi edit, detail data
7. Merubah fungsi simpan_data_pengguna pada controller pengguna
- menambahkan fungsi untuk upload foto
- membuat kondisi pada saat tambah, edit, atau detail data

Progress : 71%

Report 11/06/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki view halaman tambah data Pengguna:
- Memperbaiki view V_from, membuat kondisi aksi saat tambah data
- Membuat combobox chained untuk pilih provinsi, kota, kecamatan, dan kelurahan
- Membuat jquery chained pada view v_form
- Memperbaiki fungsi aksi_data pada controller Pengguna
- Membuat fungsi get_provinsi pada model M_data, untuk mengambil list data provinsi
- Membuat fungsi get_kota pada model M_data, untuk mengambil list data kota
- Membuat fungsi get_kecamatan pada model M_data, untuk mengambil list data kecamatan
- Membuat fungsi get_kelurahan pada model M_data, untuk mengambil list data kelurahan
- Membuat kondisi untuk aksi tambah data pada fungsi aksi_data controller pengguna
2. Membuat halaman ubah data pengguna:
- Memperbaiki v_form, membuat kondisi aksi saat ubah data
- Merubah fungsi aksi_data controller Pengguna, menambahkan kondisi untuk aksi ubah data
- Membuat fungsi ubah_pengguna pada model M_data, untuk proses ubah data di tabel pengguna
- Membuat fungsi ubah_detail_profil pada model M_data, untuk proses ubah data di tabel detail_profil
- Membuat fungsi get_data_id_pengguna pada model M_data, untuk mencari data menurut id_pengguna dalam edit data
3. Membuat halaman detail data pengguna:
- Memperbaiki view v_form, membuat kondisi aksi saat detail data
- Membuat inputan menjadi disable pada semua field pada view detail data pengguna

Progress : 70%

Report 10/06/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki tampilan untuk checkbox pada view V_tampil_data
2. Membuat view v_form_tambah untuk menampilkan form tambah data pengguna
3. Memperbaiki fungsi hapus_pengguna pada controller pengguna, menghapus juga data yang ada pada tabel detail_profil
4. Membuat fungsi tambah_data pada controller pengguna, menampilkan view v_form_tambah
5. Membuat fungsi simpan_data_pengguna pada controler pengguna, memproses simpan data pengguna ke 2 tabel, pengguna dan detail profil
6. Membuat fungsi simpan_pengguna pada model M_data, untuk menyimpan data ke tabel pengguna
7. Membuat fungsi simpan_detail_profil pada model M_data, untuk menyimpan data ke tabel detail_profil
8. Membuat fungsi cek_id_pengguna pada model M_data, untuk mengecek ada atau tidak id_pengguna yang dicari
9. Membuat fungsi hapus_detail_prof pada model M_data, untuk proses menghapus data di tabel detail profil yang memiliki id_pengguna yang dicari

Progress : 69%

Report 31/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Membuat jquery untuk membuat responsive pada gambar dan iframe dari inputan plugin editor pada view V_detail
2. Membuat controller pengguna untuk memproses halaman data pengguna
3. Menambahkan data pengguna pada navabar untuk level admin
4. Membuat fungsi index pada controller pengguna, untuk menampilkan tampilan default saat controller pengguna diakses
5. Membuat fungsi hapus_pengguna pada controller pengguna, untuk memproses hapus data pengguna. bisa lebih dari 1 data pengguna yang langsung bisa dihapus
6. Membuat model M_data, untuk menampung fungsi untuk memproses data dari controller
7. Membuat fungsi get_data_pengguna pada model M_data, untuk menampilkan semua data pengguna
8. Membuat fungsi hapus_id_pengguna pada model M_data, untuk memproses hapus data pengguna
9. Membuat view V_tampil_data untuk mendesain tampilan data pengguna

Progress : 68%

Report 29/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Merubah fungsi get_data_blok pada model M_prospektus, order data menurut field keterangan pada tabel blok
2. Merubah fungsi ubah_status_pros pada controller prospektus, membuat kondisi bila status diterima atau ditolak
3. Membuat fungsi proses_ubah_ket_blok pada model M_prospektus, untuk proses update tabel blok. menghilangkan keterangan jika telah diterima status
4. Menambahkan button edit pada v_prospektus kontributor, untuk menampilkan modal edit blok
5. Memperbaiki fungsi simpan_blok_con pada controller prospektus, menambahkan data keterangan saat input data

Progress : 67%

Report 28/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki view V_prospektus, menampilkan banyak blok prospesktus
2. Membedakan tampilan desain antara blok yg diinput oleh manager atau dengan kontributor
3. Membuat kondisi untuk dimana ketika pada tabel blok terdapat isi keterangan kontributor, maka akan dibedakan desain card boostrap
4. Mengubah fungsi javascript untuk membulatkan angka nilai minimum investasi

Progress : 66%

Report 27/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki kondisi untuk view detail pada saat level admin tetapi tidak ada pada kontributor saat telah data terkirim:
- menampilkan button tambah data dokumen
- menampilkan button tambah data resources
2. Mengubah fungsi javascript minimal input karakter saat input title prospektus
3. Memperbaiki redirect kembali, saat menampilkan detail prospektus:
- Menambahkan parameter approve pada saat klik button detail prospektus
- Membuat kondisi pada view V_detail, untuk button kembali. jika paremeter berisi approve maka akan kembali pada halaman approve prospektus

Progress : 65%

Report 25/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Menambahkan button daftar gambar dan upload gambar pada:
- tambah judul detail
- tambah sub judul detail
- edit data judul detail
2. Memperbaiki kondisi untuk view detail pad
3. Memperbaiki fungsi simpan_gambar_detail redirect halaman pada controller prospektus 
4. Memperbaiki fungsi hapus_gambar_detail redirect halaman pada controller prospektus 

Progress : 64%



Report 24/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Menambahkan button daftar gambar dan button upload gambar, pada view tambah judul detail	
2. Merubah redirect fungsi simpan_gambar_detail controller prospektus, saat sebelumnya meload halaman yang berbeda
3. Merubah redirect fungsi hapus_gambar_detail controller prospektus, saat sebelumnya meload halaman yang berbeda
4. Menambahkan copy clipboard pada tiap gambar di list gambar
- Membuat fungsi javascript copy clipboard pada view V_tambah judul detail
5. Menambahkan button hapus pada list data judul detail tiap prospektus
- membuat fungsi hapus_judul_det pada controller prospektus, untuk menghapus judul detail prospektus
- membuat fungsi proses_hapus_judul_det pada model M_prospektus, untuk proses hapus judul detail prospektus
6. Menambahkan button hapus pada list data sub judul detail tiap prospektus
- membuat fungsi hapus_judul_sub_det pada controller prospektus, untuk menghapus sub judul detail prospektus
- membuat fungsi proses_hapus_sub_judul_det pada model M_prospektus, untuk proses hapus sub judul detail prospektus
7. Memperbaiki nilai minimum investasi pada tambah data prospektus, agar membulatkan angka
8. Mengubah tampilan halaman kontibutor saat pertama kali belum membuat suatu prospektus
9. Memperbaiki tampillan pada level kontributor:
- form buat kawasan
- form buat blok
- form buat unit
- form buat prospektus
10. Memperbaiki tampilan v_unit untuk level kontributor:
- Menambahkan button tambah_prospektus
- Menampilkan status terkirim, publish, ditolak pada tiap prospektus
- Menampilkan button edit bila data belum terkirim
11. Membuat kondisi bila data telah terkirim, semua button tambah akan hilang. pada detail prospektus 

Progress : 64%

Report 22/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Membuat fungsi Kontributor pada controller prospektus, untuk menampilkan halaman awal kontributor
2. Membuat fungsi buat_project pada controller prospektus, untuk menampikan halaman form pembuatan data kawasan, blok, unit, prospektus
3. Membuat fungsi simpan data pada controller prospektus:
- fungsi simpan_kawasan_con, untuk menyimpan proses tambah data kawasan
- fungsi simpan_blok_con, untuk menyimpan proses tambah data blok
- fungsi simpan_unit_con, untuk menyimpan proses tambah data unit
- fungsi simpan_pros_con, untuk menyimpan proses tambah data prospektus
4. Membuat fungsi tampil_prospektus pada controller prospektus, untuk menampilkan halaman prospektus kontributor
5. Membuat fungsi cari id pada model M_prospektus:
- fungsi cari_id_kawasan, untuk mencari nama kawasan
- fungsi cari_id_blok, untuk mencari nama blok
- fungsi cari_id_unit_con, untuk mencari nama unit
6. Membuat view V_prospektus pada kontributor, untuk menampilkan halaman awal kontributor
7. Membuat view V_buat_project pada kontributor, untuk menampikan halaman form pembuatan data kawasan, blok, unit, prospektus
8. Membuat view V_tampil_pros pada konrtibutor, untuk menampilkan halaman prospektus kontributor

Report 23/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki redirect fungsi simpan_pros_con pada controller prospektus, untuk menampilkan halaman detail setelah simpan data prospektus
2. Membuat fungsi ubah_status_pros_con pada controller prospektus, untuk merubah status setelah data prospektus terkirim
3. Membuat fungsi ubah_status_pros pada controller prospektus, untuk proses manager mengubah status dipublish atau tidak
4. Membuat fungsi approve_pros pada controller prospektus, untuk menampilkan halaman approve prospektus pada level manager investasi
5. Membuat fungsi proses_ubah_status_con pada model M_prospektus, untuk proses ubah status setalah kirim data prospektus
6. Membuat fungsi get_data_pros_con pada model M_prospektus, untuk menampilkan data approve prospektus
7. Membuat fungsi proses_ubah_status_pros pada model M_prospektus, untuk proses ubah status setelah approve prospektus
8. Membuat view V_approve_pros, untuk menampilkan halaman approve prospektus
9. Memperbaiki desain view V_detail
10. Memberikan kondisi pada button pada view V_detail, jika data prospektus telah terkirim
11. Memperbaiki redirect pada saat proses simpan judul detail ataupun subjudul detail

Progress : 63%


Report 15/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Merubah view v_detail untuk detail per prospektus
2. Menambahkan Document dan Resources pada detail prospektus
3. Membuat fungsi tambah_dok pada controller prospektus, menampilkan data dokumen prospektus
4. Membuat fungsi simpan_dok pada controller prospektus, memproses simpan dokumen prospektus
5. Membuat fungsi tampil_pdf pada controller prospektus, menampilkan data dokumen pdf
6. Membuat fungsi tambah_resources pada controller prospektus, menampilkan data resources
7. Membuat fungsi simpan_res pada controller prospektus, memproses simpan data resources
8. Membuat fungsi tampil_res pada controller prospektus, menampilkan halaman resources sesuai dengan id_resources
9. Membuat fungsi pada model M_prospektus:
- simpan_data_dok, get_data_dok
- simpan_data_res, get_data_res, get_res_id_pros
10. Membuat view:
- Tampil_res, V_tambah_dok, V_tambah_res

Progress : 55%

Report 16/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Membuat fungsi edit_judul_detail pada controller prospektus, untuk menampilkan data judul detail
2. Membuat fungsi simpan_ubah_judul_det pada controller prospektus, untuk memproses ubah data judul detail
3. Membuat fungsi pada M_prospektus:
- get_edit_detail, get_edit_sub_detail untuk menampilkan data judul detail
4. Membuat fungsi ubah_judul_detail pada model M_prospektus, untuk menyimpan proses ubah judul detail prospektus
5. Membuat fungsi ubah_subjudul_detail pada model M_prospektus, untuk menyimpan proses ubah subjudul detail prospektus
6. Membuat view V_ubah_judul_detail untuk menampilkan halaman ubah data judul detail

Progress : 57%

Report 17/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Menambahkan button daftar gambar pada view V_ubah_judul_detail, untuk menampilkan list semua gambar
2. Menambahkan button upload gambar pada view V_ubah_judul_detail, untuk proses upload gambar
3. Membuat fungsi simpan_gambar_detail pada controller, untuk proses upload gambar
4. Merubah desain view V_ubah_judul_detail
5. Membuat fungsi get_file_foto pada model M_prospektus, untuk menampilkan list gambar
6. Membuat fungsi simpan_gbr_detail pada model M_prospektus, untuk proses simpan data gambar detail

Progress : 59%

Report 20/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Menambahkan fungsi hapus gambar pada list gambar detail view V_ubah_judul_detail
2. Merubah desain list gambar pada view V_ubah_judul_detail
3. Membuat fungsi hapus_gambar_detail pada controller Prospektus, untuk proses hapus gambar detail dan juga file gambar pada directory penyimpanan gambar
4. Membuat fungsi get_nama_gbr pada M_prospektus, untuk mencari nama dari gambar detail
5. Membuat fungsi hapus_gbr_detail pada model M_prospektus, query untuk proses menghapus gambar detail
6. Memperbaiki desain dari upload gambar pada view V_ubah_judul_detail

Progress : 60%

Report 21/05/2019

Nama Project : REI - TRUST
Tahapan : Build
Detail :

1. Memperbaiki desain tiap blok prospektus pada view V_prospketus
2. Memperbaiki desain tiap prospektus pada view V_unit
3. Menambahkan button hapus pada ubah detail, view V_ubah_judul_detail
4. Koordinasi dengan Pak Reno tentang sistem web Reit yang sudah dikerjakan

Progress : 61%

