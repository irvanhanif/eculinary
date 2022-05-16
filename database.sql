CREATE TABLE eculinary.user
(
    id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(60) NOT NULL,
    nama VARCHAR(60) NULL,
    email VARCHAR(60) NOT NULL,
    nomor_telepon VARCHAR(15) NULL,
    alamat VARCHAR(255) NULL,
    jenis_kelamin VARCHAR(15) NULL,
    tanggal_lahir DATE NULL,
    password VARCHAR(255) NOT NULL,
    token_change_password VARCHAR(4),
    avatar VARCHAR(60)
);

CREATE TABLE toko
(
    id_toko INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_toko VARCHAR(60) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    kota VARCHAR(60) NOT NULL,
    email VARCHAR(60),
    nomor_telepon VARCHAR(15),
    id_user INT NOT NULL,
    jam_awal TIME,
    jam_akhir TIME,
    avatar VARCHAR(60),

    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE menu
(
    id_menu INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_menu VARCHAR(60) NOT NULL,
    harga INT NOT NULL,
    jenis VARCHAR(60) NOT NULL,
    kategori VARCHAR(60) NOT NULL,
    id_toko INT NOT NULL,
    avatar VARCHAR(60),

    FOREIGN KEY (id_toko) REFERENCES toko(id_toko)
);

CREATE TABLE artikel
(
    id_artikel INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_penulis VARCHAR(60) NOT NULL,
    judul_artikel VARCHAR(60) NOT NULL,
    id_user INT NOT NULL,
    isi_artikel TEXT,
    time_create_artikel TIMESTAMP NOT NULL,

    FOREIGN KEY (id_user) REFERENCES user(id_user)
);


CREATE TABLE komentar
(
    id_komentar INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_menu INT NOT NULL,
    isi_komentar TEXT,
    id_parent_komentar INT,
    time_create_komentar TIMESTAMP NOT NULL,

    FOREIGN KEY (id_user) REFERENCES user(id_user), 
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu), 
    FOREIGN KEY (id_parent_komentar) REFERENCES komentar(id_komentar)
);

CREATE TABLE rating
(
    bintang INT NOT NULL,
    id_user INT NOT NULL,
    id_menu INT NOT NULL,

    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu)
);

CREATE TABLE wishlist
(
    id_user INT NOT NULL,
    id_menu INT NOT NULL,

    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu)
)