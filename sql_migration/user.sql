CREATE TABLE IF NOT EXISTS `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `tanggalLahir` DATE NOT NULL,
    `tanggalTes` DATE DEFAULT NULL,
    `umur` INT NOT NULL,
    `orangTua` VARCHAR(255) NOT NULL,
    `kelas` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255) NOT NULL
);