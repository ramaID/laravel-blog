# Episode 3 - Laravel Blog: Optimasi Relasi Post dan Comment

## Judul
"Optimasi Relasi Post dan Comment di Laravel: Cara Menghindari N+1 Query dan Masalah Performa"

## Deskripsi
"Dalam video ini, kita akan membahas cara mengoptimalkan relasi `has_many` antara **Post** dan **Comment** di Laravel. Mulai dari tantangan umum seperti N+1 query hingga solusi menggunakan eager loading dan subquery, video ini memberikan panduan lengkap untuk meningkatkan performa aplikasi Laravel kita. Mari kita lanjut pengembangan aplikasi Laravel Blog agar menjadikan aplikasi kita lebih efisien dan responsif. Tonton sampai selesai untuk mempelajari praktik terbaik dalam mengelola relasi database di Laravel!"

## Transcripts

### Pembukaan

"Halo semuanya, selamat datang di seri Laravel Blog episode 3! Pada kesempatan kali ini, kita akan membahas praktik terbaik untuk mengambil data terkait dari relasi `has_many` dengan menggunakan model **Post** dan **Comment**."

### [Scene 1: Pendahuluan]

"Kali ini, kita mendapatkan tugas untuk menampilkan komentar terbaru yang diberikan pada setiap postingan, tim kita yang lain sudah *develop* halaman admin untuk menampilkan seluruh **Post**. Task ini tampaknya sederhana, akan tetapi sebenarnya bisa membuat beberapa kompleksitas menarik dalam hal performa."

### [Scene 2: Menambahkan Kolom untuk Komentar Terbaru di Template Blade]

"Mari kita mulai dengan memperbarui template Blade kita. Kita akan menambahkan kolom baru pada tabel postingan yang akan menampilkan komentar terbaru. Ini melibatkan penambahan header baru pada tabel dan melakukan beberapa perubahan pada baris yang menampilkan postingan kita."

[Tampilkan contoh kode di mana kolom baru untuk 'Komentar Terbaru' ditambahkan.]

### [Scene 3: Mengambil Komentar Terbaru untuk Setiap Post]

"Sekarang, bagaimana kita sebenarnya mendapatkan komentar terbaru untuk setiap postingan? Salah satu pendekatan yang sederhana adalah menjalankan query untuk setiap postingan guna mengambil komentar terbarunya."

[Tampilkan contoh kode dengan query sederhana yang mengambil komentar terbaru untuk setiap postingan.]

"Tetapi, seperti yang telah kita duga, ini membuat sebuah issue / masalah 'N+1 query'."

### [Scene 4: Analisis Performansi dan Masalah N+1 Query]

"Jika kita memiliki banyak postingan, setiap query tambahan untuk mengambil komentar terbaru akan menambah beban pada database. Misalnya, jika kita menampilkan 50 postingan, maka akan ada 51 query yang dijalankan, satu untuk mengambil semua postingan dan 50 lainnya untuk mengambil komentar terbaru dari setiap postingan. Ini dapat menyebabkan masalah performa yang signifikan."

[Perlihatkan contoh di Laravel Debug Bar atau alat lainnya untuk meninjau jumlah query yang dijalankan.]

### [Scene 5: Optimasi dengan Eager Loading]

"Salah satu cara untuk mengatasi masalah ini adalah dengan menggunakan eager loading. Dengan eager loading, kita bisa memuat semua komentar terkait saat kita mengambil daftar postingan."

[Tampilkan contoh kode bagaimana cara menambahkan eager loading untuk komentar di controller.]

"Namun, ini bisa memperkenalkan masalah baru, terutama jika kita memiliki banyak komentar yang harus dimuat ke dalam memori, yang bisa meningkatkan penggunaan memori secara signifikan."

### [Scene 6: Pendekatan Alternatif dengan Subquery]

"Untuk menghindari masalah ini, kita bisa menggunakan subquery. Subquery memungkinkan kita untuk menambahkan kolom virtual pada query **Post** yang berisi hasil query dari tabel **Comment**."

[Tampilkan contoh kode menggunakan subquery untuk mengambil komentar terbaru.]

"Dengan pendekatan ini, kita bisa mendapatkan komentar terbaru tanpa harus menjalankan banyak query tambahan atau memuat terlalu banyak data ke dalam memori."

### [Scene 7: Evaluasi dan Pertimbangan Lain]

"Di akhir pelajaran ini, penting untuk diingat bahwa tidak ada solusi yang selalu tepat untuk semua situasi. Anda mungkin perlu mempertimbangkan caching atau denormalisasi data dalam beberapa kasus tertentu. Gunakan eager loading, subquery, atau bahkan caching berdasarkan kebutuhan spesifik aplikasi Anda."

### Penutup

"Jadi, itulah beberapa teknik yang dapat Anda gunakan untuk mengoptimalkan relasi `has_many` dalam aplikasi Anda. Terima kasih sudah mengikuti pelajaran ini, dan sampai jumpa di pelajaran berikutnya!"
