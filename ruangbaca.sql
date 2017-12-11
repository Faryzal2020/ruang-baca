-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 06:09 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangbaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `idgenre` int(11) NOT NULL,
  `hargasewa` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalinput` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL,
  `filegambar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `penulis`, `idgenre`, `hargasewa`, `username`, `bahasa`, `deskripsi`, `tanggalinput`, `status`, `filegambar`) VALUES
(1, 'Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 1, 5000, 'nasalsabila', 'Indonesia', '"Penulis novel ini berhasil menggambarkan latar (setting) sosial-budaya Timur Tengah dengan sangat hidup tanpa harus memakai istilah-istilah Arab. Bahasanya yang mengalir, karakterisasi tokoh-tokohnya yang begitu kuat, dan gambaran latarnya yang begitu hidup, membuat kisah dalam novel ini terasa benar-benar terjadi. Ini contoh novel karya penulis muda yang sangat bagus!" AHMADUN YOSI HERFANDA Sastrawan dan Redaktur Budaya Republika "Jarang ada buku seperti ini. Saya tidak yakin akan ada novel serupa dari penulis muda Indonesia lainnya saat ini bahkan mungkin hingga beberapa puluh tahun ke depan. Begitu menyentuh. Begitu dalam. Dan begitu dewasa!" MOHAMMAD FAUZIL ADHIM Psikolog dan Penulis Buku-buku Best Seller "Jika Naguib Mahfuz menulis Mesir dari pandangan orang Mesir, maka Mesir kali ini ditulis dalam pandangan orang Indonesia. Novel ini ditulis oleh orang Indonesia yang paham betul seluk-beluk negeri itu, hingga ke detail-detail yang paling kecil. Ia hidup, berbaur dan berinteraksi dalam kehidupan sehari-hari lalu menyerap spirit dan pengetahuan darinya, dan dituangkan dengan sepenuh hati dalam bentuk novel kaya. Ditulis dengan bahasa yang lancar, dengan tokoh-tokoh yang \'hidup\' dan berkelebatan dalam berbagai karakter. Membaca novel ini seperti membuka cermin cakrawala yang terbuka..." JONI ARIADINATA Cerpenis, Redaktur Jurnal Cerpen Indonesia "Novel yang tidak klise dan tak terduga pada setiap babnya. Habiburrahman El Shirazy dengan sangat meyakinkan mengajak kita menyelusuri lekuk Mesir yang eksotis itu, tanpa lelah. Tak sampai di situ, Ayat Ayat Cinta mengajak kita untuk lebih jernih, lebih cerdas dalam memahami cakrawala keislaman, kehidupan dan juga cinta." HELVY TIANA ROSA Ketua Umum Forum Lingkar Pena "Membaca Ayat Ayat Cinta ini membuat angan kita melayang-layang ke negeri seribu menara dan merasakan \'pelangi\' akhlak yang menghiasi pesona-pesonanya. Sungguh sebuah cerita yang layak dibaca dan disosialisasikan pada para pemburu bacaan popular yang sudah tidak mengindahkan akhlak sebagai menu utamanya, agar dunia bacaan kita terhiasi karya-karya yang \'membangun\'." RATIH SANGARWATI Artis dan Peragawati "Membaca novel ini, nutrisi cinta seakan mengalir memenuhi jiwa. Dan pikiran kiat terpenuhi oleh berbagai pengetahuan dan wawasan. Inilah karya fiksi yang tidak \'mengelabui\'. Bagus sekali." ANNA R. NAWANING Cerpenis dan Penulis Sastra Islami "Sangat romantis dan humanis! Novel ini saya rasakan begitu kuat dalam ajaran, perasaan, dan penokohannya. Luar biasa, hati saya gerimis selesai membacanya!" HAMIZAR "BAZARVIO" RIDWAN Sastrawan dan Wartawan Pontianak Post', '2017-10-31 17:00:00', 'Tersedia', 'ayat2cinta.JPG'),
(2, 'Harry Potter dan Batu Bertuah', 'J.K Rowling', 1, 7000, 'varezanoor', 'Indonesia', '\r\n\r\n"Seumur hidup, Harry Potter tidak pernah berurusan dengan sihir. Dia tinggal bersama keluarga Dursley yang kejam dan Dudley, putra mereka yang menyebalkan. Kamar Harry cuma lemari sempit di kolong tangga, dan selama sebelas tahun, ulang tahunnya tak pernah dirayakan.\r\n\r\nNamun, tiba-tiba datang burung hantu membawa surat misterius: surat berisi undangan ke tempat menakjubkan bernama Sekolah Sihir Hogwarts. Dan di sana bukan hanya ada banyak teman, pertandingan olahraga naik sapu terbang, dan sihir dalam segala hal—dari pelajaran sampai makanan— tapi juga ada takdir luar biasa yang sudah lama menantinya... Jika Harry mampu bertahan hidup."', '2017-10-31 17:16:00', 'Tersedia', 'harpotbb.JPG'),
(3, 'Origin Karya Dan Brown', 'Dan Brown', 1, 10000, 'tyasyuni', 'Indonesia', '\r\n\r\n Siapapun dirimu\r\nApa pun keyakinanmu\r\nSemuanya akan berubah.\r\n \r\nBilbao, Spanyol\r\nRobert Langdon, profesor simbologi dan ikonologi agama Universitas Harvard, tiba di Museum Guggenheim yang supermodern untuk menghadiri pengumuman besar tentang penemuan yang "akan mengubah dunia sains." Tuan rumah acara malam hari itu adalah Edmond Kirsch, seorang miliuner dan Futuris berusia empat puluh tahun. Kirsch adalah sosok yang terkenal di seluruh dunia, berkat penemuan-penemuan teknologi tingkat tingginya yang mengagumkan, serta prediksi-prediksinya yang berani. Dia juga merupakan salah satu mahasiswa Langdon dua puluh tahun yang lalu, dan sekarang dia akan mengungkap suatu terobosan yang mencengangkan  yang akan menjawab dua pertanyaan fundamental terkait eksistensi manusia.\r\n\r\n \r\nBegitu acara dimulai, Langdon dan beberapa ratus hadirin lainnya terpukau oleh pemaparan yang begitu orisinil, dan Langdon menyadari bahwa ini akan jauh lebih kontroversial daripada dugaannya. Namun acara yang telah diatur dengan amat cermat itu tiba-tiba kacau balau, dan penemuan berharga Kirsch nyaris hilang selamanya. Terguncang dan menghadapi bahaya besar, Langdon terpaksa melarikan diri dari Bilbao. Dia didampingi oleh Ambra Vidal, sang direktur museum yang bekerja sama dengan Kirsch untuk menyelenggarakan acara. Keduanya bertolak ke Barcelona untuk mencari password teka-teki yang akan mengungkap rahasia Kirsch.\r\n\r\n \r\nMenyusuri koridor-koridor gelap sejarah rahasia dan agama ekstrem, Langdon dan Vidal harus menghindari lawan yang sepertinya tahu segalanya, yang kemungkinan didukung oleh pihak Istana Kerajaan Spanyol yang tidak akan melakukan apa pun untuk membungkam Edmond Kirsch. Mengikuti jejak-jejak tersembunyi dalam karya seni modern dan beragam simbol misterius, Langdon dan Vidal menemukan petunjuk-petunjuk yang pada akhirnya membawa mereka berhadapan dengan penemuan Kirsch dan kenyataan mencengangkan yang selama ini tidak kita ketahui.\r\n', '2017-10-31 20:00:00', 'Tersedia', 'origin.JPG'),
(4, 'Rentang Kisah', 'Gita Savitri Devi', 2, 5000, 'nasalsabila', 'Indonesia', '\r\n\r\nApa tujuan hidupmu?\r\n\r\nKalau itu ditanyakan kepadaku saat remaja, aku pasti nggak bisa menjawabnya. Jangankan tujuan hidup, cara belajar yang benar saja aku nggak tahu. Setiap hari aku ke sekolah lebih suka bertemu teman-teman dan bermain kartu. Aku nggak tahu apa yang menjadi passion-ku. Aku sekadar menjalani apa yang ibu pilihkan untukku—termasuk melanjutkan kuliah di Jerman.\r\n\r\nTentu bukan keputusan mudah untuk hidup mandiri di negara baru. Selama 7 tahun tinggal di Jerman, banyak kendala aku alami; bahasa Jerman yang belum fasih membuat proses perkuliahan menjadi berat, hingga uang yang pas-pasan membuatku harus mengatur waktu antara kuliah dan kerja sambilan.\r\n\r\nSemua proses yang sulit itu telah mengubahku; jadi mengenal diri sendiri, mengenal agamaku, dan memahami untuk apa aku ada di dunia. Buatku, kini hidup tak lagi sama, bukan hanya tentang aku, aku, dan aku. Tapi juga, tentang orangtua, orang lain, dan yang paling penting mensyukuri semua hal yang sudah Tuhan berikan.\r\n\r\nThe purpose to live a happy life is to always be grateful and don\'t forget the magic word: ikhlas, ikhlas, ikhlas.\r\n', '2017-10-31 21:00:00', 'Tersedia', 'rentangkisah.JPG'),
(5, 'The Alchemist - Sang Alkemis', 'Paulo Coelho', 1, 7000, 'varezanoor', 'Indonesia', 'Setiap beberapa puluh tahun, muncul sebuah buku yang mengubah hidup para pembacanya selamanya. Novel Paulo Coelho yang memikat ini telah memberikan inspirasi bagi jutaan orang di seluruh dunia. Kisah yang sangat sederhana, namun menyimpan kebijaksanaan penuh makna, tentang anak gembala bernama Santiago yang berkelana dari rumahnya di Spanyol ke padang pasir Mesir untuk mencari harta karun terpendam di Piramida-Piramida. Di perjalanan dia bertemu seorang perempuan Gipsi, seorang lelaki yang mengaku dirinya Raja, dan seorang alkemis––semuanya menunjukkan jalan kepada Santiago untuk menuju harta karunnya.\r\n\r\nTak ada yang tahu isi harta karun itu, atau apakah Santiago akan berhasil mengatasi rintangan-rintangan sepanjang jalan. Namun perjalanan yang semula bertujuan untuk menemukan harta duniawi berubah menjadi penemuan harta di dalam diri.\r\n\r\nKaya, menggugah, dan sangat manusiawi, kisah Santiago menunjukkan kekuatan mimpi-mimpi dan pentingnya mendengarkan suara hati kita.', '2017-11-01 17:00:00', 'Tersedia', 'sangalkemis.JPG'),
(6, 'Dunia Sophie: Sebuah Novel Filsafat', 'Joestein Gaarder', 4, 10000, 'tyasyuni', 'Indonesia', 'Mizan Gold Edition adalah spesial dari karya-karya terbaik penulis dunia. Hadir dalam kualitas teks prima serta kemasan dan bahan eksklusif, seri ini layak menjadi koleksi para pencinta sejati buku. Sophie, seorang pelajar sekolah menengah berusia empat belas tahu. Suatu hari sepulang sekolah, dia mendapat sebuah surat misterius yang hanya berisikan satu pertanyaan: "Siapa kamu?" Belum habis keheranannya, pada hari yang sama dia mendapat surat lain yang bertanya: "Dari manakah datangnya dunia?" Seakan tersentak dari rutinitas hidup sehari-hari, surat-surat itu mempuat Sophie mulai mempertanyakan soal-soal mendasar yang tak pernah dipikirkannya selama ini. Dia mulai belajar filsafat.', '2017-11-01 19:00:00', 'Tersedia', 'duniasophie.JPG'),
(7, 'Happy Little Soul', 'Retno Hening', 2, 5000, 'nasalsabila', 'Indonesia', '\r\n\r\n“Ndak apa-apa, itu namanya be-la-jar.” Atau, “Sorry…,” seru Kirana sambil tersenyum dengan tatapan mata teduhnya yang siapa pun pasti tak bisa menolaknya.\r\n\r\nPlease…  sorry… thank you… adalah kata-kata tulus nan menggemaskan yang kerap disampaikan oleh Kirana ketika bermain. Baginya, belajar dari kesalahan is okay. Dan bagi Ibuk, dia justru banyak belajar tentang sabar dari sang anak, Mayesa Hafsah Kirana.\r\n\r\nLife is an adventure. Cerita petualangan Ibuk dan Kirana di Happy Little Soul ini mengajak kita semua—kakak, adik, orangtua, calon ayah atau ibu, dan sebagai apa pun perannya—untuk belajar hal-hal sederhana mengenai kasih sayang dan belajar bersama mewarnai kehidupan dengan lebih baik.\r\n\r\n***\r\n\r\n"Bagi saya, my kid my rules. Namun, semenjak kenal sama satu sosok anak lucu, ceria, dan pintar bernama Kirana di Instagram, saya jadi penasaran siapa, sih, ibu anak hebat ini. Lewat buku ini saya jadi kenal sosok Ibuk @retnohening. Dengan penuh suka duka Ibuk berbagi pengalamannya bersama Kirana. Seru!." Tike Priantnakusumah (@tikeprie) —entertainer, penyiar radio\r\n\r\n"Lewat buku ini Mbak @retnohening berbaik hati berbagi cerita berdasarkan pengalamannya dalam mengasuh Kirana secara detail, sejak hamil hingga sekarang. Membaca buku ini seperti sedang mengobrol langsung dengan Mbak Retno karena gaya berceritanya ringan dan topiknya dekat dengan kehidupan kita sehari-hari sebagai orangtua." Putri Sari (@iburakarayi) —psikolog pendidikan\r\n\r\n"Buku ini adalah bentuk lain dari ucapan Mbak Retno kepada saya, "Dek, akan banyak hal menantang ketika menjadi seorang Ibu, entah itu dari lingkungan sekitar, dari dalam diri sendiri, ataupun dari si anak. Ini semua proses menggapai surga, panen pahala, kuncinya dua: sabar dan penuh cinta." Sundari Hana Respati (@sundarihana) —Bulek, #TemanMainKirana\r\n\r\n"Membaca buku ini membuat saya merasakan betapa luar biasanya perempuan. Ada banyak hal baik yang disampaikan dengan cara yang lembut. Saya pikir, anak muda seusia saya, yang kelak akan menjadi ibu atau ayah, sangat baik membaca buku ini. Buku yang bisa membuat saya dan kamu merasakan deg-degan, tertawa, dan terharu." Boy Candra (@Boycandra)—penulis\r\n', '2017-11-01 17:16:00', 'Tersedia', 'happylittlesoul.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `detailpenyewaan`
--

CREATE TABLE `detailpenyewaan` (
  `iddetail` int(11) NOT NULL,
  `idpenyewaan` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tanggalterimabuku` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `giveaway`
--

CREATE TABLE `giveaway` (
  `idgiveaway` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `penulisbuku` varchar(50) NOT NULL,
  `isigiveaway` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggalinput` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filegambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `giveaway`
--

INSERT INTO `giveaway` (`idgiveaway`, `username`, `judulbuku`, `penulisbuku`, `isigiveaway`, `status`, `tanggalinput`, `filegambar`) VALUES
(1, 'nasalsabila', 'Happy Little Soul', 'Retno Hening', 'Halo, teman-teman!\nAku Sabila, mau bagi satu buku Happy Little Soul untuk semua #TemanMainKirana. Siapa cepat dia dapat!\nGiveaway ini aku adakan dalam rangka lahirannya kucingku. Hehehe.', 'Tersedia', '2017-11-04 16:51:31', 'happylittlesoul.JPG'),
(2, 'tyasyuni', 'Rectoverso', 'Dee Lestari', 'Hey! Buku Rectoverso untuk yang beruntung! Silakan~\nIni bukan buku baru, tapi kondisinya masih sangat sangat bagus kok. Buku ini salah satu buku favorit, dan aku mau kalian juga ikutan baca kekerenan buku ini.', 'Tersedia', '2017-11-04 16:52:28', 'rectoverso.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Fiksi'),
(2, 'Non-Fiksi'),
(3, 'Agama'),
(4, 'Filsafat');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(20) NOT NULL,
  `namapengguna` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tanggalregist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statuspengguna` varchar(20) NOT NULL,
  `tanggalverified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `namapengguna`, `alamat`, `telepon`, `kota`, `email`, `password`, `tanggalregist`, `statuspengguna`, `tanggalverified`) VALUES
('nasalsabila', 'N A Salsabila', 'Taman Wisma Asri Bekasi Utara', '085775156523', 'Bekasi', 'nasalsabil23@gmail.com', 'sabilalala', '2017-12-11 04:48:23', 'General', NULL),
('tyasyuni', 'Tyas Yuni Astuti', 'Jalan Ceritanya Bogor', '089882917712', 'Bogor', 'tyasyuni@gmail.com', 'tyasyasyas', '2017-12-11 04:48:35', 'General', NULL),
('varezanoor', 'Vareza Noorliko', 'Jl. Depok, Depok', '087712936712', 'Depok', 'varezanoorliko@gmail.com', 'varezazaza', '2017-12-11 04:48:42', 'General', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_confirm`
--

CREATE TABLE `pengguna_confirm` (
  `codeconfirm` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `idpenyewaan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `totalbiaya` int(11) NOT NULL,
  `metodekirim` varchar(50) NOT NULL,
  `tanggalsewa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `idquotes` int(11) NOT NULL,
  `isiquotes` text NOT NULL,
  `sumber` varchar(200) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `tanggalinput` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`idquotes`, `isiquotes`, `sumber`, `username`, `tanggalinput`) VALUES
(1, 'Seberat Apapun Hidup, Tetap Ada Yang Bisa Ditertawakan', 'Sirkus Pohon (Andrea Hirata)', 'nasalsabila', '2017-11-04 12:35:06'),
(2, 'Impian harus menyala dengan apa pun yang kita miliki, meskipun yang kita miliki tidak sempurna, meskipun itu retak-retak', '9 Summers 10 Autumns', 'nasalsabila', '2017-11-04 12:35:06'),
(3, 'Dan Tuhan memelihara ketidakpastian itu pada seluruh umat manusia agar manusia terus belajar, terus bermimpi dan ujung-ujungnya kita akan kembali padanya', '5cm', 'varezanoor', '2017-11-04 12:35:06'),
(4, 'Beri aku sesuatu yang paling sulit, aku akan belajar!', 'Cinta di Dalam Gelas', 'tyasyuni', '2017-11-04 12:35:06'),
(5, 'Bermimpilah, karena Tuhan akan memeluk mimpi-mimpi itu.', 'Sang Pemimpi', 'varezanoor', '2017-11-04 12:35:06'),
(6, 'Semua orang pernah gagal. Sebagian menyerah, sebagian bangkit kembali. Maka ada pecundang, ada pemenang.', 'Marshmallow Cokelat', 'nasalsabila', '2017-11-04 12:35:06'),
(7, 'Kadang - kadang pilihan yang terbaik adalah menerima...', 'Rectoverso', 'tyasyuni', '2017-11-04 12:35:06'),
(8, 'Hiduplah untuk memberi yang sebanyak-banyaknya, bukan untuk menerima yang sebanyak-banyaknya.', 'Laskar Pelangi', 'nasalsabila', '2017-11-04 12:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `readingjournal`
--

CREATE TABLE `readingjournal` (
  `idjurnal` int(11) NOT NULL,
  `juduljurnal` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tulisan` text NOT NULL,
  `filegambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `readingjournal`
--

INSERT INTO `readingjournal` (`idjurnal`, `juduljurnal`, `username`, `tanggal`, `tulisan`, `filegambar`) VALUES
(1, 'Sirkus Pohon; Karya Fantastis Andrea Hirata', 'nasalsabila', '2017-11-04 17:26:03', 'Hanya umpatan dan makian yang berlalu lalang dalam kepala saya ketika dalam waktu kurang dari 12 jam saya menyelesaikan karya ke-10 Bang Andrea Hirata. Saya adalah pembaca setia novel beliau, namun baru kali ini saya merasa perlu dan terpanggil untuk menuliskan review karyanya.\r\n\r\nSeburuk itukah buku ini?\r\n\r\nKalau kamu adalah nyinyiers Bang Andrea, sebagus apapun karya Doctor Honoris Causa bidang sastra dari University of Warwick, United Kingdom ini pasti akan kamu nilai sebagai sampah.\r\n\r\nBagi saya, karya ini adalah bukti sahih kejeniusan paripurna dari sang maestro kata, Andrea Hirata.\r\n\r\nPernah menonton film Now You See Me ? Semua reviewer film berpendapat jika twist dalam film itu membuat banyak penonton terperangah. Termasuk saya yang gemes dan mendadak bengong saking amaze-nya saat tahu bagaimana endingnya. Tetapi in the end, saya menjadi maklum karena itu garapan penulis dan sineas asing. Wajar lah ya..\r\n\r\nNah, kenapa Sirkus Pohon bagi saya karya yang jenius? Karena kejutannya lebih WOW daripada NYSM !\r\n\r\nOke, mari kita bahas.\r\n\r\nBang Andrea adalah sastrawan melayu yang begitu mencintai kebudayaan aslinya di Belitong sana. Hal ini tak usah kita perdebatkan lagi. Pun dengan karya ke 10 nya ini. Kearifan lokal tentang Belitong menjadi warna yang sangat kental. Apapun sukumu dan bahasamu, ketika menyelami dunia sirkus pohon, mendadak kamu akan terlahir kembali sebagai orang melayu yang fasih memakai bahasa mereka. Seolah-olah kamu sedang ada di tengah mereka. Di tengah warung Kupi Kuli di Pasar Dalam, Tanjung Lantai. Akrab dengan nama-nama seperti Suruhudin, Debuludin, Taripol, Soridin Kebul, Jamot, dan lainnya.\r\n\r\nBelum lagi kosa kata seperti “Boi”  dan “Ojeh” yang akan membuatmu tak tahan untuk langsung mempraktekan kata itu dalam kehidupan keseharianmu. Sekali lagi, apapun sukumu. Dari sisi ini, Bang Andrea sukses membuat Melayu Indonesia naik kelas!\r\n\r\nBang Andrea dalam novel ini juga membuktikan diri sebagai penuls dengan riset yang mendalam. Dia memahami betul sosiologi masyarakat Indonesia yang suka tahayul, mudah tertipu pencitraan, dan memiliki ego tinggi.\r\n\r\nSekarang beranjak dari sisi teknik menulis.\r\n\r\nBang Andrea adalah tipikal penulis yang memiliki sentuhan magis dalam tiap kalimatnya. Bayangkan, dua kutilang pacaran di atas pohon bisa dia tuliskan berlembar-lembar tanpa membuat pembacanya BOSAN! Ada sisi roman, ada sisi komedi, dan penuturannya yang detail selalu sukses membuat pembaca melompat ke dunia lain. Ke dunia yang diciptakan Bang Andrea dalam bukunya. Tunggu sampai kamu belajar menulis novel, teknik seperti ini adalah teknik tingkat dewa yang butuh ribuan jam terbang untuk menguasainya.\r\n\r\nDari sisi cerita.\r\n\r\nSirkus Pohon adalah novel yang menjelma menjadi potret kondisi ramai bangsa ini. Secara gamblang sindirannya terhadap kondisi perpolitikan negeri ini diungkapnya. Namun dengan eksekusi yang sangat membumi. Pemilihan kepala desa!\r\n\r\nSirkus Pohon juga menjelma menjadi roman yang tak kalah kelasnya dari Romeo and Juliet atau Twilight. Tentang kesabaran menunggu dalam cinta, tentang kesetiaan, tentang penerimaan cinta yang tidak memandang rupa, harta, maupun tahta. Tentunya hal itu akan menjadi picisan jika yang menulis bukan seorang Andrea Hirata. Bang Andrea berhasil meramu semua romantisme itu dalam sentuhan penuh komedi khas melayu di satu sisi dan sentuhan “BAPER TINGKAT DEWA” di sisi lainnya. Boi, sungguh ini kombinasi yang ajaib!\r\n\r\nBerbeda dengan tetralogi laskar pelangi, yang mengusung tema besar tentang impian dan kerja keras, Sirkus Pohon tidak berhenti sampai situ. Walaupun Bang Andrea tetap konsisten mengusung dua tema itu, Sirkus Pohon menambahkannya dengan suatu intrik dan twist yang takkan kamu temui di karya sebelumnya. Inilah poin paling istimewa dalam buku ini.\r\n\r\nBisa jadi nanti kamu akan mengidolakan karakter “Hob” dalam buku ini yang memiliki ketulusan cinta tiada tara. Atapun karakter Tara dan Tegar, dua insan yang memiliki definisi setia tak bebilang masa. Namun, tokoh idola saya di Sirkus Pohon adalah Taripol. Seorang begundal, maling, yang culas namun sutradara belakang layar yang tak terduga.\r\n\r\nSaya membutuhkan waktu yang cukup lama untuk menulis review ini, sebab satu hal. Karena saya memikirkan kekurangan apa yang bisa saya temukan dan saya tulis. Tidak fair rasanya jika sebuah review penuh berisi pujian tanpa kritik.\r\n\r\nWell, kritik saya sederhana saja. Bang Andrea seharusnya mengeluarkan karya seperti ini minimal setahun sekali! Indonesia butuh asupan gizi dari literasi kelas dunia macam ini lebih banyak lagi.\r\n\r\nBaiklah, Kawan, jangan percaya apa yang saya tulis sampai kamu memasuki sendiri dunia Sirkus Pohon. Alami, dan rasakan sendiri.', 'sirkuspohon.JPG'),
(2, 'Belajar Menjadi Ibu Melalui Happy Little Soul', 'tyasyuni', '2017-11-04 17:26:20', ' Yang jadi #temenmainkirana pasti udah heboh banget karna buku yang di tulis ibuk @retnohening. Ibuk menulis buku yang judulnya Happy Little Soul, belajar memahami anak dengan penuh cinta terbitan Gagas media.\r\n Di awal bulan April, tepatnya tanggal 1-10 dibukalah Pre Order oleh gagas dengan menggandeng beberapa toko buku online sebagai partner penjualan buku ini, jauh sebelum tanggal 1, kehebohan penggemarnya Kirana sudah terliat baik di IG nya Ibuk maupun di Ignya Gagas media sendiri, saya juga nggak mau ketinggalan dong, sampe di SC lah, toko2 online yang membuka PO bukunya ibuk. Pas tanggal 1 April mulailah nyari toko buku online yang di tunjuk gagas media, ternyata beberapa toko buku udah kehabisan stock buat PO, padahal baru tanggal 1 loh, sampe bingung juga, PO tapi kok bisa kehabisan stok, mungkin cetakannya terbatas kali ya, setelah dicari-cari, ternyata di salah satu toko buku online masih bisa pesen walaupun yang tanpa bonus, nggak apapa deh yang penting bisa cepet punya bukunya.\r\n\r\nPengiriman buku PO ini sebenarnya tanggal 11, tapi saya dapet WA dari Adminnya toko buku tersebut, pengiriman buku saya akan di kirim awal Mei, What???? Jadi buat apa ikutan PO kalau bukunya baru di kirim awal Mei, di toko buku udah ada kali. Jawaban dari adminnya "mohon maaf kak, apabila kaka kurang berkenan, kakak bisa mengajukan refund" haiss, sebenarnya geram, tapi mau gimana lagi, terpaksa sabar menanti aja deh. Di IG udah berseliweran bukunya ibuk yang di upload penggemarnya kirana, beberapa hari yang lalu bahkan di beberapa toko buku juga udah di pajang, hiks.. kapan lah bisa baca bukunya, dan kamis lalu bukunya baru saya terima, Alhamdulillah seneng akhirnya buku ibuk datang, liat covernya bikin sumringah karena langsung inget Kirana. Di halaman pertama buku ini juga ada beberapa foto Kirana dan juga Ibuk, yang setiap saya liatin ke Cyila, dia langsung senyum-senyum.\r\n\r\nHappy Little Soul ini berisi tentang cerita petualangan ibuk dan Kirana mengajak kita semua-kakak, adik, orangtua, calon ayah atau calon ibu, sebagai apapun perannya- untuk belajar hal-hal sederhana mengenai kasih sayang dan bersama mewarnai kehidupan dengan lebih baik. Dari buku ini kita belajar dari cerita yang disampaikan ibuk, bagaimana beliau mengajar dan mendidik Kirana, seperti ungkapan kata-kata Kirana yang sering kita lihad di IG nya Ibuk seperti "Ndak apa-apa, itu namanya be-la-jar" atau "sorry", "please ibuk" dengan senyuman dan tatapan yang lucu banget. Please.. Sorry.. Thank you.. adalah kata-kata tulus yang menggemaskan yang sering Kirana ucapkan, baginya belajar dari kesalahan is okay. Dan bagi ibuk, dia justru banyak belajar tentang sabar dari sang anak.\r\n\r\nSaya kutip satu paragraf yang ada di buku ini " Berbicara dengan bayi yang belum bisa merespon omongan kita, mungkin dianggap sebagian orang konyol dan tidak terlalu penting, tetapi penting bagi saya. Hal itu saya anggap sebagai stimulasi perkembangan bahasa Kirana, proses belajar memahami Kirana dan proses Kirana mengenal dan memahami saya. Dari sanalah dia bisa mengenal suara saya, mengenal ekspresi ketika berbicara dan menatapnya, mengenal perubahan nada suara dan mungkin kosakata". Menurut saya dengan cara inilah ibuk membuat Kirana yang masih berumur 3 tahun, tapi sudah bisa berbicara dengan lancar, bahkan juga sudah bisa menceritakan kembali isi sebuah buku kepada ibuk dengan bahasa dan kata-katanya sendiri. Ini juga yang telah saya lakukan bahkan sebelum Arsyila lahir, seringkali ketika hanya berdua, saya mengajak Cyila ngobrol layaknya temen bicara sungguhan, mungkin jika orang lain denger akan keheranan, alhamdulillah dengan cara ini, cyila yang sudah delapan bulan memiliki beberapa kosakata, walaupun belum jelas sekali seperti ayah (ayam), nte (tante), tatak (kakak), aba (abi), umi dll.\r\n\r\nMenjadi ibu itu luar biasa, kita bisa memahami perkataan bayi yang entah apa artinya, kita tau maksud dan keinginannya walau dengan kosakata yang entah berantah, seperti cyila ketika minta ASI, dengan menyebut "ditdit". Menjadi ibu dari anak gadis itu juga menyenangkan, dari masih bayi merah saya sudah menantikan momen ketika saya dan cyila memakai pakaian yang sama atau couple (hehe..) untuk baju lebaran 2017 (ramadhan aja belum loh padahal haha..) saya sudah menyiapkan seragam kami bertiga, saya, cyila dan abinya.\r\n\r\nBuat #temenmainkirana selamat membaca bukunya ibuk, banyak banget deh dapet pelajaran tentang mendidik anak dengan cinta di buku ini, buat yang belum beli bukunya, silahkan dibeli, di toko buku sudah mulai di jual kok, buat yang masih bingung, siapa sih Kirana dan Ibuk? Silahkan kepoin IG nya Ibuk @retnohening.', 'happylittlesoul.JPG'),
(3, '#Review : Harry Potter Yang Selalu Menakjubkan', 'varezanoor', '2017-11-04 17:27:03', 'Bam!\r\n\r\nBaru halaman 18, saya sudah menutup kisah terbaru Harry Potter yang sedang saya baca. 18 halaman yang membawa imajinasi terbang, menjadikan saya tersenyum-senyum dan dada disesaki kerinduan. Lalu tersadar, semakin saya membaca, artinya kan semakin mendekati akhir cerita. Masih ada ratusan halaman tersisa, tapi saya nggak pengen buru-buru selesai. Ibarat makan kue Nastar enak, pengen diirit-irit biar lama abis.\r\n\r\nTapi… Seperti kisahnya yang penuh pesona sihir, sihir untuk membuka lagi buku ini pun kuat. Dan ya, meski dalam kondisi berdiri di atas kereta dan TransJakarta, saya pun lanjut membaca, hingga tuntas dalam 6 jam. Paling-paling terpotong makan, mandi dan ke toilet.\r\n\r\nNow, the review.\r\n\r\nHarry Potter and the Cursed Child bukan novel seperti ketujuh buku sebelumnya. Cerita asli memang ditulis oleh J.K. Rowling sendiri, beserta John Tiffany dan Jack Thorne, tapi buku ke-8 ini formatnya berupa skrip drama; drama oleh Jack Thorne yang disebut J.K. Rowling sebagai seseorang yang telah memasuki dunianya (Rowling) dan melakukan hal-hal indah di sana (dunia Harry Potter).\r\n\r\n    “To Jack Thorne, who entered my world and did beautiful things there.” -J.K. Rowling\r\n\r\nBerlatar 19 tahun sejak kemenangan melawan Kau-Tahu-Siapa, kisah Harry Potter and the Cursed Child terkesan sepotong-potong, dan tidak berisi deskripsi cerita sedetail novel; tapi kamu yang sudah melahap ketujuh novel Harry Potter dijamin mudah membayangkan tiap adegan yang ada. Imajinasimu dibikin bergerak liar.\r\n\r\nSejak halaman-halaman awal kita telah digiring untuk mengetahui bahwa kisah Harry Potter and the Cursed Child akan berada seputar Albus Severus Potter, anak kedua Harry. 48 halaman pertama beralur cepat dan lumayan melompat dari tahun pertama Albus di Hogwarts sampai tahun ke-4. Namun setelah itu, konflik sesungguhnya mulai ditampilkan.\r\n\r\nMulai dari Albus dan Scorpius (anak semata wayang Draco Malfoy) yang melompat keluar Hogwarts Express, kening Harry yang kembali terasa sakit, seseorang yang mati hidup kembali, dia yang telah musnah ternyata masih menyisakan keturunan… Dan, apakah Harry serta Draco masih saling bermusuhan mengetahui kedua anak mereka hilang?\r\n\r\nSatu per satu tokoh yang sudah sangat kita kenal tampil membangun cerita. Yes, it’s a reunion! Beberapa karakter baru memiliki porsi mereka masing-masing. Porsi yang besar. Secara personal saya sangat menyukai Scorpius Malfoy, bocah yang karakternya seperti gabungan si brilian Hermione Granger dan si lucu Ron Weasley. Buat saya dia adalah tokoh bintangnya.\r\n\r\nSeperti tujuh judul sebelumnya, Harry Potter and the Cursed Child, meski mengambil tempat di dunia sihir, tetap berisi kisah yang nyambung dengan kehidupan kita sehari-hari di dunia manusia. Bukan hanya tentang persahabatan, tapi juga tentang keluarga. Tentang ikatan darah. Terlepas dari petualangan menyelamatkan dunia sihir, pembaca Harry Potter usia dewasa seperti saya bisa ikut memahami rasanya menjadi Harry yang kini berusia menjelang 40 tahun, menghadapi Albus si pemberontak.\r\n\r\nPembaca remaja pun bisa mengerti rasanya menjadi Albus, hidup dengan tuntutan sekitar, merasa tidak mendapat celah untuk membuktikan diri sendiri, merasa tidak sehebat ayahnya; ditambah fakta dirinya masuk Slytherin dan berteman baik dengan Scorpius Malfoy.\r\n\r\nYang pasti, buku skrip drama Harry Potter and the Cursed Child tidak kalah mengesankan dibanding ketujuh novel di belakangnya. Tetap bikin kita terlarut dalam pesona dunia sihir, dan tetap bikin buku ini susah ditutup sebelum mencapai halaman terakhir. Wajib dibikin film! Atau mungkin dramanya bisa dibawa ke Indonesia? Mari kita panjatkan doa.\r\n\r\nSelamat tersenyum, tertawa, tegang, penasaran, menitikkan air mata, dan (mungkin) jatuh cinta pada Scorpius Malfoy (seperti saya).', 'harpotcc.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `idtrade` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `request` varchar(100) NOT NULL,
  `offer` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `judultrade` varchar(300) NOT NULL,
  `tanggalinput` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`idtrade`, `username`, `request`, `offer`, `status`, `judultrade`, `tanggalinput`) VALUES
(1, 'varezanoor', 'Sirkus Pohon', 'Ayah', 'Tersedia', 'Tukar buku Ayah milik saya dengan Sirkus Pohon', '2017-11-04 12:52:00'),
(2, 'tyasyuni', 'Reach Your Dreams', 'Perahu Kertas', 'Tersedia', 'Tukar Novel Perahu Kertas dengan Reach Your Dreams', '2017-11-04 15:08:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `detailpenyewaan`
--
ALTER TABLE `detailpenyewaan`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `giveaway`
--
ALTER TABLE `giveaway`
  ADD PRIMARY KEY (`idgiveaway`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pengguna_confirm`
--
ALTER TABLE `pengguna_confirm`
  ADD PRIMARY KEY (`codeconfirm`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`idpenyewaan`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`idquotes`);

--
-- Indexes for table `readingjournal`
--
ALTER TABLE `readingjournal`
  ADD PRIMARY KEY (`idjurnal`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`idtrade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detailpenyewaan`
--
ALTER TABLE `detailpenyewaan`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giveaway`
--
ALTER TABLE `giveaway`
  MODIFY `idgiveaway` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `idpenyewaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `idquotes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `readingjournal`
--
ALTER TABLE `readingjournal`
  MODIFY `idjurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `idtrade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
