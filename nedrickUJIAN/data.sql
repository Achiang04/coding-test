CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

  CREATE TABLE `peserta` (
    `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
    `nim` varchar(50) NOT NULL,
    `nama` varchar(50) NOT NULL,
    `jurusan` varchar(50) NOT NULL,
    `semester` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `no_hp` char(13) NOT NULL,
    PRIMARY KEY (`id_peserta`)
  )