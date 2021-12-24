-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table opcao1.consultas: ~9 rows (approximately)
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
REPLACE INTO `consultas` (`id`, `nome`, `idade`, `morada`, `email`, `data`, `hora`, `estado`, `observacao`, `unidade`, `especialidade`, `medico`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Carla', 7, 'Maxaquene', 'paciente@gmail.com', '2021-09-17', '', 'remarcada', 'pendente', '', '', '', 1, '2021-09-07 11:07:56', '2021-12-01 07:20:11', NULL),
	(2, 'Maria', 23, 'Alto-mae', 'paciente@gmail.com', '2021-09-29', 'Noite', 'marcada', 'pendente', '1', '1', 'Dra. Code', 1, '2021-09-07 11:08:52', '2021-09-07 11:08:52', NULL),
	(3, 'Joao Sitoe', 67, 'Benfica', 'paciente@gmail.com', '2021-10-08', 'Manha', 'marcada', 'pendente', '4', '3', 'Dr. Paulo', 1, '2021-09-07 11:09:54', '2021-09-07 11:09:54', NULL),
	(12, 'Arsenio Langa', 24, 'Benfica', 'arseniosergiolanga@gmail.com', '2021-09-30', 'Tarde', 'marcada', 'pendente', '4', '3', 'Dr. Java', 1, '2021-09-08 18:06:31', '2021-09-08 18:06:31', NULL),
	(13, 'Arsenio Langa', 23, 'Zona-Verde', 'arseniosergiolanga@gmail.com', '2021-10-08', 'Tarde', 'marcada', 'pendente', '2', '2', 'Dra. Laravel', 1, '2021-09-08 18:19:09', '2021-09-08 18:19:09', NULL),
	(15, 'Maria', 10, 'Matola', 'arseniosergiolanga@gmail.com', '2021-10-08', 'Tarde', 'marcada', 'pendente', '4', '3', 'Dr. Paulo', 1, '2021-09-08 18:58:15', '2021-09-08 18:58:15', NULL),
	(16, 'Arsenio Langa', 54, 'Magoanine', 'arseniosergiolanga@gmail.com', '2021-09-23', 'Tarde', 'marcada', 'pendente', '2', '2', 'Dra. Laravel', 1, '2021-09-09 15:23:33', '2021-09-09 15:23:33', NULL),
	(17, 'Joana Maria', 7, 'Zona-Verde', 'arseniosergiolanga@gmail.com', '2021-09-21', 'Tarde', 'marcada', 'pendente', '2', '2', 'Dra. Laravel', 1, '2021-09-09 15:24:42', '2021-09-09 15:24:42', NULL),
	(18, 'Arsenio Langa', 34, 'Matola', 'arseniosergiolanga@gmail.com', '2021-09-23', 'Manha', 'marcada', 'pendente', '2', '6', 'Dr. Mario', 1, '2021-09-09 15:29:43', '2021-09-09 15:29:43', NULL);
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;

-- Dumping data for table opcao1.especialidades: ~13 rows (approximately)
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
REPLACE INTO `especialidades` (`id`, `especialidade`, `unidade_id`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Demartologia', '1', 1, '2021-08-06 10:55:59', '2021-08-06 10:56:00', NULL),
	(2, 'Demartologia', '2', 1, '2021-08-06 10:56:14', '2021-08-06 10:56:15', NULL),
	(3, 'Demartologia', '4', 1, '2021-08-06 10:56:23', '2021-08-06 10:56:24', NULL),
	(4, 'Genecologia', '3', 1, '2021-08-06 10:56:37', '2021-08-06 10:56:59', NULL),
	(5, 'Genecologia', '1', 1, '2021-08-06 10:56:56', '2021-08-06 10:56:57', NULL),
	(6, 'Oftamologia', '2', 1, '2021-08-06 10:57:17', '2021-08-06 10:57:18', NULL),
	(7, 'Cardiologia', '1', 1, '2021-08-06 10:57:36', '2021-08-06 10:57:37', NULL),
	(8, 'Fisoterapia', '4', 1, '2021-08-06 10:57:58', '2021-08-06 10:57:59', NULL),
	(9, 'Pediatria', '5', 1, '2021-08-06 10:58:22', '2021-08-06 10:58:23', NULL),
	(10, 'Pediatria', '3', 1, '2021-08-06 10:58:38', '2021-08-06 10:58:41', NULL),
	(11, 'Pediatria', '5', 1, '2021-08-06 10:59:13', '2021-08-06 10:59:14', NULL),
	(12, 'Pediatria', '6', 1, '2021-08-06 10:59:43', '2021-08-06 10:59:44', NULL),
	(13, 'Cirugia', '6', 1, '2021-08-06 11:00:37', '2021-08-06 11:00:39', NULL);
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;

-- Dumping data for table opcao1.medicos: ~12 rows (approximately)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
REPLACE INTO `medicos` (`id`, `nome`, `especialidade_id`, `email`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Dr. Php', '1', 'php@gmail.com', 1, '2021-08-06 11:01:18', '2021-08-06 11:01:19', NULL),
	(2, 'Dra. Laravel', '2', 'medico@gmail.com', 1, '2021-08-06 11:01:35', '2021-08-06 11:01:36', NULL),
	(3, 'Dr. Java', '3', 'java@gmail.com', 1, '2021-08-06 11:01:52', '2021-08-06 11:01:54', NULL),
	(4, 'Dr. Langa', '4', 'langa@gmail.com', 1, '2021-08-06 11:02:12', '2021-08-06 11:02:13', NULL),
	(5, 'Dra. Maria', '6', 'maria@gmail.com', 1, '2021-08-06 11:02:53', '2021-08-06 11:02:54', NULL),
	(6, 'Dr. Jose', '5', 'jose@gmail.com', 1, '2021-08-06 11:03:25', '2021-08-06 11:03:26', NULL),
	(7, 'Dra. Laura', '4', 'laura@gmail.com', 1, '2021-08-06 11:03:24', '2021-08-06 11:03:27', NULL),
	(8, 'Dr. Paulo', '3', 'paulo@gmail.com', 1, '2021-08-06 11:03:41', '2021-08-06 11:03:43', NULL),
	(9, 'Dr. Byte Code', '5', 'byte.code@gmail.com', 1, '2021-08-06 11:04:08', '2021-08-06 11:04:29', NULL),
	(10, 'Dr. Python', '1', 'python@gmail.com', 1, '2021-08-06 11:04:30', '2021-08-06 11:04:28', NULL),
	(11, 'Dra. Code', '1', 'code@gmail.com', 1, '2021-08-06 11:05:41', '2021-08-06 11:05:41', NULL),
	(12, 'Dr. Mario', '6', 'mario@gmail.com', 1, '2021-08-06 11:05:40', '2021-08-06 11:05:42', NULL);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;

-- Dumping data for table opcao1.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(34, '2021_07_14_190157_create_table_medicos', 1),
	(35, '2021_07_20_170249_table_usuarios', 1),
	(36, '2021_07_20_173217_unidade', 1),
	(37, '2021_07_22_174712_especialidade', 1),
	(38, '2021_08_06_082815_create_table_consultas', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table opcao1.unidades: ~6 rows (approximately)
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
REPLACE INTO `unidades` (`id`, `unidade`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Hospital Central de Maputo', 1, '2021-08-06 10:53:54', '2021-08-06 10:53:57', NULL),
	(2, 'Hospital Geral Jose Macamo', 1, '2021-08-06 10:54:17', '2021-08-06 10:54:18', NULL),
	(3, 'Hospital Privado', 1, '2021-08-06 10:54:33', '2021-08-06 10:54:34', NULL),
	(4, 'Instituto do Coracao', 1, '2021-08-06 10:54:47', '2021-08-06 10:54:48', NULL),
	(5, 'Clinica Care', 1, '2021-08-06 10:55:11', '2021-08-06 10:55:12', NULL),
	(6, 'Clinica + Saude', 1, '2021-08-06 10:55:39', '2021-08-06 10:55:40', NULL);
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;

-- Dumping data for table opcao1.usuarios: ~6 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id`, `usuario`, `senha`, `categoria`, `last_login`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'paciente@gmail.com', '$2y$10$vGXvJ.o7cwK1ApXoEgxNxut9iJNcWClFqIffzYahdIbWr5j3ABQWq', 'paciente', NULL, 1, '2021-08-06 10:50:31', '2021-08-06 10:50:32', NULL),
	(2, 'medico@gmail.com', '$2y$10$vGXvJ.o7cwK1ApXoEgxNxut9iJNcWClFqIffzYahdIbWr5j3ABQWq', 'medico', NULL, 1, '2021-08-06 10:50:53', '2021-08-06 10:50:54', NULL),
	(3, 'gestor@gmail.com', '$2y$10$vGXvJ.o7cwK1ApXoEgxNxut9iJNcWClFqIffzYahdIbWr5j3ABQWq', 'gestor', NULL, 1, '2021-08-06 11:08:26', '2021-08-06 11:08:27', NULL),
	(4, 'python@gmail.cim', '$2y$10$vGXvJ.o7cwK1ApXoEgxNxut9iJNcWClFqIffzYahdIbWr5j3ABQWq', 'medico', NULL, 1, '2021-09-07 13:11:52', '2021-09-07 13:11:53', NULL),
	(5, 'java@gmail.com', '$2y$10$vGXvJ.o7cwK1ApXoEgxNxut9iJNcWClFqIffzYahdIbWr5j3ABQWq', 'medico', NULL, 1, '2021-09-07 13:12:25', '2021-09-07 13:12:28', NULL),
	(6, 'arseniosergiolanga@gmail.com', '$2y$10$vGXvJ.o7cwK1ApXoEgxNxut9iJNcWClFqIffzYahdIbWr5j3ABQWq', 'paciente', NULL, 1, '2021-09-08 18:42:30', '2021-09-08 18:42:31', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
