-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 05:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horrorstory [backup]`
--

-- --------------------------------------------------------

--
-- Table structure for table `cerita`
--

CREATE TABLE `cerita` (
  `id_cerita` int(11) NOT NULL,
  `foto_cerita` varchar(300) NOT NULL,
  `judul_cerita` varchar(100) NOT NULL,
  `deskripsi_cerita` varchar(200) NOT NULL,
  `isi_cerita` text NOT NULL,
  `pencipta_cerita` varchar(100) NOT NULL,
  `cerita_like` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cerita`
--

INSERT INTO `cerita` (`id_cerita`, `foto_cerita`, `judul_cerita`, `deskripsi_cerita`, `isi_cerita`, `pencipta_cerita`, `cerita_like`) VALUES
(129381737, 'cerita-4.jpeg', ' Bertemu Hantu Perempuan Berkerudung', 'Gunung Raung menjadi sorotan belakangan ini lantaran peningkatan aktivitas vulkaniknya.', '<p>Cerita bermula saat dia diajak petugas PVMBG Bandung untuk memasang alat di Gunung Raung. Pendakian gunung dilakukan melalui jalur pendakian Kecamatan Kalibaru.</p>\r\n\r\n<p>Berangkat dari Pos PGA Raung, dari petugas ada lima orang, kalau saya berdua bersama teman saya,&nbsp;kata dia, seperti dikutip dari <a href=\"https://beritajatim.com/peristiwa/ketemu-hantu-wanita-di-puncak-gunung-raung-banyuwangi/\">Beritajatim.com</a> jaringan Suara.com, Kamis (11/2/2021).</p>\r\n\r\n<p>Saya mulai naik itu sekitar pukul 04.00 WIB sampai atas itu sekitar Jam 14.00 WIB,&nbsp;imbuhnya.</p>\r\n\r\n<p>Ia melanjutkan, perjalanan menuju lokasi sangat melelahkan. Sebab, kondisi yang terjal dan tertutup rerimbunan pohon. Juga terdapat jurang pada dua sisi sepanjang perjalanan menjadi tantangan berat.</p>\r\n\r\n<p>Kalau ke sana badan harus fit, bawa perlengkapan karena di sisi kakan kiri masih banyak pohon. Sekalian buat jalan,&nbsp;jelasnya.</p>\r\n\r\n<p>Dijelaskannya, ada salah seorang petugas PVMBG sempat mengalami sakit. Tapi, yang bersangkutan tetap memaksa naik ke atas.</p>\r\n\r\n<p>Sakit demam kayaknya, mau pulang tapi sudah sampai di tengah. Akhirnya dipaksa sampai atas juga. Pas turun sampai bawah langsung terkapar,&nbsp;sambung dia.</p>\r\n\r\n<p>Usai memasang alat yang dimaksud, rombongan memutuskan beristirahat sejenak di bawah pohon. Saat itu matahari telah terbenam. Hal yang tak diduga sebelumnya pun terjadi. Sosok mistis menyapanya.</p>\r\n\r\n<p>Tiba-tiba ada yang bilang <em>Nyare Kaju</em> (bahasa Madura) atau mencari kayu. Saya kaget, kok ada orang malam-malam nyari kayu di tempat ini. Tapi saya diam kalau saya bilang bisa lari semua,&nbsp;katanya.</p>\r\n\r\n<p>Ia menjelaskan bahwa sosok yang dilihatnya adalah seorang wanita tua. Memakai kerudung, berpakaian ala orang desa.</p>\r\n\r\n<p>Sosoknya itu tua, tapi naik ke atas pohon mencari kayu katanya. Sebenarnya saya merinding, tapi saya diam saja, biarkan dia menyapa,&nbsp;kisahnya.</p>\r\n\r\n<p>Pria yang sehari-hari bekerja di kebun ini mengaku sudah tiga kali mendaki <a href=\"https://www.suara.com/tag/gunung-raung\">Gunung Raung</a>. Tapi baru kali ini bertemu sosok halus itu.</p>\r\n\r\n<p>Pertama itu saya pas masih SMA, terakhir ya kemarin itu. Dulu nggak pernah ketemu seperti itu. Paling si Mbah, macan tutul itu saya temui,&nbsp;ungkapnya.</p>\r\n\r\n<p>Setelah turun gunung, barulah Yoga berani bercerita tentang sosok astral yang ditemuinya tadi.</p>\r\n\r\n<p>Saya bilang, saat di atas bertemu sosok itu. Mereka terkejut,&nbsp;ujarnya.</p>\r\n\r\n<p>Lalu, Dia juga bercerita mengenai pengalaman lain bertemu makhluk halus. Bahkan dia sering bertemu di tempat lain di lereng Raung.</p>\r\n\r\n<p>Percaya gak percaya kalau di sini (Gumarang Bike Park) itu banyak kayak gitu. Kita kan gak tau namanya hutan belantara seperti ini. Asal kita gak ganggu mereka,&nbsp;tutupnya.</p>\r\n\r\n<p>Sekadar informasi, erupsi Gunung Raung masih terus terjadi hingga saat ini. Statusnya mulai naik dari normal (Level I) menjadi waspada (Level II), sejak (21/1/2021). Beberapa kali bahkan terlihat cahaya api di puncak gunung saat malam hari.</p>\r\n\r\n<p>Suara gemuruh menggelegar keras terdengar hingga radius 30 kilometer. Semburan abu vulkanik juga keluar mengguyur hampir seluruh wilayah Banyuwangi, bahkan hingga Bali.</p>\r\n', 'Adli Gans', 0),
(129381738, '37583.jpg', 'Kelas Malam', 'Cerpen Kelas Malam merupakan cerita pendek karangan Halimah Sadiah', '<p>Hari ini tugasku sangat banyak, belum lagi ditambah dengan tugas kelompok. Maka dari itu, aku dan teman-temanku memutuskan untuk mengadakan kelas malam, yaitu kelas yang diadakan pada malam hari. Di sekolahku memang sudah biasa diadakan kelas malam.<br />\r\n<br />\r\nKetika aku sedang mengerjakan tugas, tiba-tiba aku ingin pergi ke toilet. Ya sudah, aku langsung pergi ke toilet sendirian. Sementara teman-temanku di kelas masih sibuk mengerjakan tugasnya.<br />\r\n<br />\r\nDisaat teman-temanku sedang mengerjakan tugas, tiba-tiba ada yang mengetuk jendela kelas. Dan mereka terkejut karena melihat ada sosok yang menyeramkan, dia berambut panjang, tidak mempunyai mata, dan kuku-kukunya yang tajam sedang mengetuk-ngetuk jendela. Hantu itu terus saja mengetuk jendela, sampai jendela itu pecah. Dan teman-temanku pun teriak karena hantu itu sudah berada di kelas.<br />\r\n<br />\r\nKarena aku sedang berada di toilet, jadi aku tidak mendengar teriakan teman-temanku. Aku berjalan menghampiri kelas, dan aku terkejut karena melihat teman-temanku yang telah tewas dan bergeletakan di lantai.<br />\r\n<br />\r\nSaat hantu itu masuk ke kelas, aku langsung berbaring di lantai seolah-olah aku sudah dibunuh olehnya. Aku terus menahan nafas saat dia menghampiri jasad temanku satu persatu.<br />\r\nTiba-tiba suasana menjadi hening, dan aku merasa hantu itu sudah keluar dari kelasku. Jadi aku memutuskan untuk membuka mataku. Saat membuka mataku, betapa terkejutnya aku karena hantu itu berada tepat di depan wajahku. Wajahnya sangat menyeramkan, dan dia tidak mempunyai mata. Dalam sekejap dia langsung mencongkel mataku dengan kukunya yang tajam dan tewas bersama teman-temanku yang lain.</p>\r\n', 'Halimah Sadiah', 0),
(129381739, '36798695756371715254.large', 'Gadis Pembunuh', 'Menceritakan sosok gadis pembunuh', '<p>Tukk.. tukk..&nbsp;terdengar seseorang sedang mengetuk pintu.<br />\r\nAda apa?&nbsp;tanyaku sambil membuka pintu. Tampak seseorang menggunakan jepit rambut bergambar kepala mickey mouse, baju terusan berwarna merah dan sepatu merah muda. Dia hanya menunduk kaku dengan memegang sebuah boneka anak perempuan. Dia tidak berbicara sepatah kata pun kepadaku. Tiba-tiba ia melukai tanganku.<br />\r\nAdduh!!&nbsp;teriaku.<br />\r\nSetelah aku berpaling sebentar dia menghilang begitu saja.<br />\r\n<br />\r\nsofhi, bisakah kamu membantu mama?&nbsp;terdengar suara yang mengalihkan perhatianku dari gadis itu.<br />\r\nDengan cepat aku menutup pintu dan berusaha tidak memikirkan gadis aneh yang melukai tanganku. Dan aku berusaha menghentikan pendarahan yang terjadi di tanganku.<br />\r\nAa..da apa ma?&nbsp;tanyaku agak gugup karena kejadian tadi.<br />\r\nTolong bantu mama membersihkan kamarmu!&nbsp;kata mama yang tidak menghiraukan suara gagapku yang mungkin mencurigakan.<br />\r\nBaik.&nbsp;jawabku sambil berlari menuju tangga.<br />\r\n<br />\r\nSesampainya di kamar, aku menutup pintu sambil menghela nafas.<br />\r\nUntung saja mama tidak melihat tanganku.<br />\r\nSetelah mengobati lukaku, aku segera merapikan tempat tidurku dan mengambil telepon genggamku yang kuletakan tepat di bawah bantal. Aku mulai menyentuh satu per satu huruf di telepon genggamku.<br />\r\nSebaiknya aku menelepon shabila.<br />\r\n<br />\r\nSetelah menunggu beberapa detik akhirnya telepon genggamku tersambung juga dengan telepon genggam shabila.<br />\r\nHai sofhia! ada apa? tanya seseorang dari ujung telepon.<br />\r\nTadi ada seorang gadis yang membawa boneka anak perumpuan yang melukai tanganku. Dan apakah kamu tahu orang itu?&nbsp;tanyaku.<br />\r\nTentu aku mengetahuinya karena baru beberapa menit tadi dia datang ke rumahku. Tapi dia tidak melukaiku. jawab shabila yang mengiyakan.</p>\r\n\r\n<p>&nbsp;Baiklah, bagaimana jika aku ke rumahmu? tanyaku.<br />\r\ntentu.<br />\r\nAku menutup telepon dan berjalan ke lantai bawah.<br />\r\nMa&nbsp;aku pergi ke rumah shabila.&nbsp;kataku sembari berlari kecil keluar dari pintu. Iya, hati-hati ya sayang!<br />\r\nAku menyusuri jalan sambil mengayuh sepedaku yang berwarna kuning tua.<br />\r\n<br />\r\nTuuk.. tuk.. asalammualaikum<br />\r\nWaalaikumsalam&nbsp;jawab seseorang yang membukakan pintu untukku.<br />\r\nAyo silahkan masuk sofhia. Shabila telah menunggumu di lantai dua.&nbsp;kata mama shabila mempersilahkan.<br />\r\nTerima kasih, tante nisa.<br />\r\nAku melangkahi anak tangga, aku melihat beberapa foto keluarga shabila yang tergantung di dinding rumah.<br />\r\nTukk.. tukk.. shabila.. shabila..&nbsp;aku memanggil shabila sambil mengetuk pintu kamarnya.<br />\r\nSilahkan masuk!<br />\r\nAku memasuki kamar shabila yang penuh dengan corak hello kitty.<br />\r\n<br />\r\nBegini, aku hanya ingin tanya soal gadis aneh yang meluakai tanganku tadi?&nbsp;tanyaku sambil duduk di tempat tidur shabila.<br />\r\nHmmm aku kurang tahu dan untung saja dia tidak melukaiku. Tapi, boneka anak perempuan yang dibawanya membuatku binggung.&nbsp;kata shabila sambil meletakan sebuah pensil di telingganya yang menandakan dia sedang kebinggungan. Baik, bagaimana kalau besok sesudah sekolah usai kita mencari tahu tentang dia?&nbsp;tanya shabila.<br />\r\nok, aku akan membantu<br />\r\n<br />\r\nKeesokan paginya<br />\r\nSelesai sholat shubuh aku bergegas ke kamar mandi dan mengenakan seragam berwarna merah tua dengan corak kotak-kotak juga tak lupa tas punggung kuning yang memperindah penampilanku. Aku melangkah penuh semangat, dari kejauhan sudah terlihat mama dan papaku sudah menunggu.<br />\r\nPagi, sofhi!&nbsp;tanya seseorang dari kejauhan.<br />\r\nPagi, papa, kenapa kemarin papa terlambat pulang kerja?&nbsp;tanyaku sambil menyembunyikan tanganku yang terluka. Maafkan papa, karena kemarin banyak sekali tugas yang harus papa kerjakan jadi papa harus lembur.&nbsp;jawab papa sambil mengusap-usap kepalaku.<br />\r\nSudah, ayo sofhi segera habiskan sarapannya dan segera bergegas.&nbsp;kata mama yang menghentikan sejenak percakapan aku dan papa.<br />\r\nok, bos!!&nbsp;jawabku sabil tersenyum manis.<br />\r\nSelesai dengan sarapanku yang lezat, aku pun menaiki mobil dan segera berangkat. Di sepanjang jalan, aku berusaha menyimpan tangan kiriku dari penglihatan papa. Tak sengaja, aku melihat gadis yang melukai tanganku kemarin Hah, gadis itu lagi!!&nbsp;kataku sambil berteriak kesal.<br />\r\ngadis? siapa itu, sofhi?&nbsp;tanya papa penasaran mendengarku berteriak. oo.. ti..dak.. bukan siapa-siapa. kataku dengan gugup sambil tersenyum untuk meyakinkan papa.</p>\r\n\r\n<p>Kenapa gadis itu berada disini?&nbsp;pikirku<br />\r\n<br />\r\nSesampainya di sekolah, bel sudah berbunyi dan aku tak sempat untuk mencari keberadaan gadis itu untuk mempertanggung jawabkan perbuatanya. Pagi ini, adalah pelajaran bu ratna yang mengajar pelajaran bahasa inggris. Tak terasa beberapa pelajaran telah usai, tinggal beberapa menit lagi pelajaran terakhir usai.<br />\r\nï¿½Tiit..titt.ï¿½<br />\r\nSemua anak berhamburan keluar dari kelas kecuali aku dan shabila. Kami hanya saling menatap. Tapi tak berapa lama, miranda si gadis peramal datang menghampiri.<br />\r\nï¿½Apa yang kalian lakukan?ï¿½ tanya miranda agak pelan.<br />\r\nï¿½Kami hanya sedang berpikir tentang sesuatu.ï¿½ kataku menjawab pertanyaan miranda.<br />\r\nï¿½Kalian sedang memikirkan gadis aneh bukan?ï¿½ tanya miranda.<br />\r\nï¿½Bagaimana kau mengetahuinya?ï¿½ shabila kembali bertanya.<br />\r\nMiranda hanya mengangguk tanpa kata. ï¿½Gadis itu adalah pembunuh!ï¿½ kata miranda yang membuat suasana menjadi mencekam.<br />\r\nï¿½iya, kemarin ia melukai tangan kiriku padahal aku tidak menyakitinyaï¿½ ungkapku kesal.<br />\r\nMiranda pun melangkah keluar dari kelas, seolah-olah sedang menuntun kami menuju gadis itu.<br />\r\nï¿½Gadis itu telah membunuh adikku sebulan yang lalu saat adikku bermain di persimapngan itu.ï¿½<br />\r\nï¿½Apa?!ï¿½ kami terkejut dengan apa yang di katakan oleh miranda.<br />\r\nï¿½Dulu aku seperti kalian. Gadis itu selalu datang ke rumahku dan dengan membawa boneka anak perempuan yang sama seperti yang kalian lihat saat dia datang. Dan adik gadis itu yang bernama aina juga telah mati dibunuh oleh seorang pembunuh. Jika kalian ingin mengunjungi rumah gadis itu, kalian pergi saja ke persimpangan tersebut dan rumahnya berada di ujung persimpangan dengan nomor 13, aku tidak akan mengantar.ï¿½ jelasnya.<br />\r\nKami tidak menghiraukan apa yang dikatakan miranda. Sesuai petujuk miranda kami mengunjungi rumah di ujung persimpangan untuk meminta pertanggung jawaban.<br />\r\n<br />\r\nï¿½Dimana rumahnya? disini hanya ada rumah papan yang angker dengan nomor 13.ï¿½ kataku sedikit kesal. ï¿½Baiklah, lebih baik kita masuk saja.ï¿½ kata shabila.<br />\r\nï¿½aahh.. aku tidak mau, lebih baik menunggu gadis itu sampai ia keluar dibanding harus masuk ke rumah angkernya itu.ï¿½ kataku yang menolak ajakan shabila.<br />\r\n<br />\r\nSetelah 3 jam, gadis itu tak kunjung keluar dan membuatku semakin kesal saja. ï¿½Hadduh!! gadis itu dimana sih? apakah jangan-jangan dia tidak di rumah.ï¿½ kataku sambil melempar kerikil ke dalam selokan.<br />\r\nï¿½Kurasa.ï¿½<br />\r\nï¿½Bagaimana jika kamu yang mengecek, karena ini sudah pukul 5 sore dan aku ingin pulang.ï¿½ kataku sambil mengedipkan sebelah mata.<br />\r\nDengan langkah ketakutan shabila mengintip ke arah jendela.<br />\r\nï¿½Sofhia.. sofhia kesini!ï¿½ ajak shabila sedikit berbisik.<br />\r\nAku pun mengikuti shabila. Kami melihat gadis itu duduk di kursi goyangnya dan tiba-tiba dia menatap kami. Dan rasanya aku tak berani meminta pertanggung jawaban kepadanya. Tiba-tiba saja dunia seakan berubah keadaan langit tampak sangat gelap, petir pun mulai menyambar, suasana terasa sangat menakutkan, aku berlari menuju bagian garasi rumah tersebut. Kami bersembunyi tepat di bawah meja. Gadis itu datang dan berjalan seperti zombie.<br />\r\nï¿½Aina..ï¿½ kata gadis itu berteriak memanggil nama adiknya.<br />\r\nï¿½bau busuk apa ini?ï¿½ bisikku sangat pelan.<br />\r\nAku melihat ke samping teryata seorang gadis kecil dengan muka penuh darah dan darahnya sudah mengotori gaun putihnya. Aina teryata sudah disimpan selama bertahun-tahun di bawah meja.<br />\r\nï¿½aahh.. sofhia tolong aku!!ï¿½ terdengar suara permintaan tolong.<br />\r\nGadis itu pun menancapkan pisau tepat di kaki shabila. Keringat pun mulai bercucuran membasahi dahi dan pakaianku. Aku tak sanggup mendengar permintaan tolong shabila. Aku menutup telingaku. Aku tak tahu harus berbuat apa. ï¿½Shabila, maafkan aku..ï¿½ tangisku. ï¿½Aahhï¿½ï¿½<br />\r\nSuara tangisan shabila pun terhenti seketika.<br />\r\nï¿½Shabilaï¿½ï¿½ teriakku dengan menyesal. ï¿½ahhh!!ï¿½<br />\r\nJantungku tiba-tiba saja berhenti berdetak.</p>\r\n', 'Lulu Kamalia Putri', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cerita_user`
--

CREATE TABLE `cerita_user` (
  `id_cu` int(11) NOT NULL,
  `judul_cu` varchar(200) NOT NULL,
  `deskripsi_cu` varchar(200) NOT NULL,
  `isi_cu` text NOT NULL,
  `pencipta_cu` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cerita_user`
--

INSERT INTO `cerita_user` (`id_cu`, `judul_cu`, `deskripsi_cu`, `isi_cu`, `pencipta_cu`) VALUES
(10, 'Derita programmer :v', 'Ini adalah kisah adli', '&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Waktu itu saya tidak tahu,&amp;lt;/strong&amp;gt;&amp;lt;i&amp;gt;&amp;lt;strong&amp;gt;akh kira&amp;lt;/strong&amp;gt; jadi programmer itu mudah, ternyata saya salah :v awokawokawok anj&amp;lt;/i&amp;gt; nah&amp;amp;nbsp;&amp;lt;/p&amp;gt;', 'Adli Gans'),
(11, 'Apa sih', 'Ngntd', '&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Haii saya Adli, &amp;lt;/strong&amp;gt;&amp;lt;i&amp;gt;&amp;lt;strong&amp;gt;ini adil saya Ipin, &amp;lt;/strong&amp;gt;ga tau males&amp;lt;/i&amp;gt;&amp;lt;/p&amp;gt;', 'Adli Gans'),
(12, 'Derita programmer :v', 'Ahahahahah', '&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Apa sih anjg &amp;lt;/strong&amp;gt;&amp;lt;i&amp;gt;&amp;lt;strong&amp;gt;bacot&amp;lt;/strong&amp;gt; apaaaa &amp;lt;/i&amp;gt;apaaaaa&amp;lt;/p&amp;gt;', 'Adli Gans');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_crt` int(11) NOT NULL,
  `nama_komentar` varchar(100) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like_history`
--

CREATE TABLE `like_history` (
  `cerita_id` int(11) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `like_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `gmail_login` varchar(100) NOT NULL,
  `pass_login` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user_login`, `gmail_login`, `pass_login`) VALUES
(1, 'naufal', 'user@gmail.com', 'a7ef174d3ed272acd2b72913a7ef9d40'),
(2, 'naufal', 'adli@gmail.com', 'a7ef174d3ed272acd2b72913a7ef9d40'),
(3, 'Andrian', 'andrian@gmail.com', 'f3432339f2fb1092d4e8a2fc3843c147');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(300) NOT NULL,
  `gmail_user` varchar(200) NOT NULL,
  `password_user` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `gmail_user`, `password_user`) VALUES
(1, 'Adli Gans', 'user@gmail.com', '55b5eac92aab2289d9a67c3929f8ea9d'),
(5, 'naufal gans', 'naufal@gmail.com', 'a7ef174d3ed272acd2b72913a7ef9d40'),
(36, 'Andrianfaa', 'hello@andriann.com', '101b46827952b828f440b627b108c2a3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cerita`
--
ALTER TABLE `cerita`
  ADD PRIMARY KEY (`id_cerita`);

--
-- Indexes for table `cerita_user`
--
ALTER TABLE `cerita_user`
  ADD PRIMARY KEY (`id_cu`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `like_history`
--
ALTER TABLE `like_history`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cerita`
--
ALTER TABLE `cerita`
  MODIFY `id_cerita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129381753;

--
-- AUTO_INCREMENT for table `cerita_user`
--
ALTER TABLE `cerita_user`
  MODIFY `id_cu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `like_history`
--
ALTER TABLE `like_history`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
