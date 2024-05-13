-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3366
-- Generation Time: May 13, 2024 at 05:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `berth_related_information`
--

CREATE TABLE `berth_related_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `type_of_berth` text NOT NULL DEFAULT '0',
  `no_of_berth` text NOT NULL DEFAULT '0',
  `public` text NOT NULL DEFAULT '0',
  `ppp` text NOT NULL DEFAULT '0',
  `designed_depth` text NOT NULL DEFAULT '0',
  `permissible_draft` text NOT NULL DEFAULT '0',
  `avg_total_draft` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commodities`
--

CREATE TABLE `commodities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `port_id` text NOT NULL DEFAULT '0',
  `name` text NOT NULL DEFAULT '0',
  `parent_id` text NOT NULL DEFAULT '0',
  `type` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`id`, `port_id`, `name`, `parent_id`, `type`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '0', 'Root', '0', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(2, '0', 'Liquid Bulk', '1', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(3, '0', 'Dry Bulk', '1', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(4, '0', 'Break Bulk', '1', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(5, '0', 'Container', '1', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(6, '0', 'Transhippment', '1', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(7, '0', 'POL-Crude', '2', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:02:12'),
(8, '0', 'POL-Products', '2', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:02:18'),
(9, '0', 'LPG or LNG', '2', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:02:28'),
(10, '0', 'Edible Oil', '2', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(11, '0', 'FRM-Liquid', '2', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:44:39'),
(12, '0', 'Iron Ore All', '3', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(13, '0', 'Pellets', '12', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:06:07'),
(14, '0', 'Fine', '12', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:00:56'),
(15, '0', 'Other Ores', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:44:46'),
(16, '0', 'Thermal Coal', '3', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:44:47'),
(17, '0', 'Coking Coal', '3', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:44:48'),
(18, '0', 'Other Coal', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:44:50'),
(19, '0', 'Iron and Steel', '4', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(20, '0', 'Timber and Log', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(21, '0', 'TEUs', '5', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(22, '0', 'Container Tonnes', '6', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(23, '0', 'Other Transhipment', '6', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(24, '0', 'Other Liquids', '2', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:44:38'),
(25, '0', 'Fertilizer', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(26, '0', 'FRM-Dry', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(27, '0', 'Food Grains-excluding pulses', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(28, '0', 'Pulses', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:01:34'),
(29, '0', 'Sugar', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:01:36'),
(30, '0', 'Cement', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 17:01:37'),
(31, '0', 'Salt', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(32, '0', 'Iron Scrap', '3', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:43:06'),
(33, '0', 'Other Dry Bulk', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:07:38'),
(34, '0', 'Tea and Coffee', '4', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(35, '0', 'Food Grains-excluding pulses', '4', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(36, '0', 'Pulses', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(37, '0', 'Sugar', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(38, '0', 'Cement', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(39, '0', 'Project Cargo', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(40, '0', 'Fertilizer', '4', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(41, '0', 'Automobiles-Tonnes', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(42, '0', 'Other Break Bulk', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(43, '0', 'Service rendered to ship', '1', 'Header', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(44, '0', 'Fresh Water', '43', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(45, '0', 'Tonnes', '5', 'Principal Commodity', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(46, '0', 'Fuel', '43', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(47, '0', 'Others', '43', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(48, '0', 'Chemicals', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(49, '0', 'Building Materials', '4', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(50, '0', 'POL-Crude', '6', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(51, '0', 'Container TEUs', '6', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(52, '0', 'POL-Products', '6', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-13 09:53:41'),
(53, '0', 'Scrap - LDT', '3', 'Others', '0', '0', 0, '2024-05-13 09:53:41', '2024-05-12 16:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `commodities_data`
--

CREATE TABLE `commodities_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `state_id` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `commodity_id` text NOT NULL DEFAULT '0',
  `ov_ul_if` text NOT NULL DEFAULT '0',
  `ov_ul_ff` text NOT NULL DEFAULT '0',
  `ov_l_if` text NOT NULL DEFAULT '0',
  `ov_l_ff` text NOT NULL DEFAULT '0',
  `ov_total` text NOT NULL DEFAULT '0',
  `co_ul_if` text NOT NULL DEFAULT '0',
  `co_ul_ff` text NOT NULL DEFAULT '0',
  `co_l_if` text NOT NULL DEFAULT '0',
  `co_l_ff` text NOT NULL DEFAULT '0',
  `co_total` text NOT NULL DEFAULT '0',
  `grand_total` text NOT NULL DEFAULT '0',
  `status` text NOT NULL DEFAULT '0',
  `comm_remarks` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cruise_tourisms`
--

CREATE TABLE `cruise_tourisms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `no_of_cruise_terminals` text NOT NULL DEFAULT '0',
  `total_cruise_calls` text NOT NULL DEFAULT '0',
  `no_of_cruise_passengers` text NOT NULL DEFAULT '0',
  `cruise_berth_charges` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Department 1', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, 'Department 2', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, 'Department 3', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, 'Department 4', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, 'Department 5', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `direct_port_entry_delivery_related_containers`
--

CREATE TABLE `direct_port_entry_delivery_related_containers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `containers` text NOT NULL DEFAULT '0',
  `direct_port_entry_of_teu` text NOT NULL DEFAULT '0',
  `direct_port_delivery` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_dock_labour_boards_major_ports`
--

CREATE TABLE `employment_dock_labour_boards_major_ports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `class_1` text NOT NULL DEFAULT '0',
  `class_2` text NOT NULL DEFAULT '0',
  `class_3` text NOT NULL DEFAULT '0',
  `class_4` text NOT NULL DEFAULT '0',
  `total` text NOT NULL DEFAULT '0',
  `registered` text NOT NULL DEFAULT '0',
  `listed` text NOT NULL DEFAULT '0',
  `others` text NOT NULL DEFAULT '0',
  `dwtotal` text NOT NULL DEFAULT '0',
  `grandTotal` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_major_ports`
--

CREATE TABLE `employment_major_ports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `class_1` text NOT NULL DEFAULT '0',
  `class_2` text NOT NULL DEFAULT '0',
  `class_3` text NOT NULL DEFAULT '0',
  `class_4` text NOT NULL DEFAULT '0',
  `class_5` text NOT NULL DEFAULT '0',
  `class_6` text NOT NULL DEFAULT '0',
  `class_7` text NOT NULL DEFAULT '0',
  `shore_wrk` text NOT NULL DEFAULT '0',
  `casual_work` text NOT NULL DEFAULT '0',
  `total` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icon_with_panels`
--

CREATE TABLE `icon_with_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `module` text NOT NULL DEFAULT '0',
  `module_name` text NOT NULL DEFAULT '0',
  `mod_list_name` text NOT NULL DEFAULT '0',
  `icon` text NOT NULL DEFAULT '0',
  `url` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icon_with_panels`
--

INSERT INTO `icon_with_panels` (`id`, `parent_id`, `module`, `module_name`, `mod_list_name`, `icon`, `url`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 0, 'mod_1', 'Dashboard', 'dashboard', 'fa-th', 'dashboard', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, 0, 'mod_2', 'Module', 'module', 'fa-user-shield', 'module', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, 0, 'mod_3', 'User Management', 'user', 'fa-users', 'user', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, 3, 'mod_4', 'Add User', 'add-user', 'fa-users', 'add-user', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, 3, 'mod_5', 'Edit User', 'edit-user', 'fa-users', 'edit-user', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(6, 0, 'mod_6', 'Role', 'role', 'fa-user-tag', 'role', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(7, 0, 'mod_7', 'Department', 'department', 'fa-user-tag', 'department', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(8, 0, 'mod_8', 'Icon With Panels', 'icon-with-panels', 'fa-user-tag', 'icon-with-panels', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(9, 8, 'mod_9', 'Add Icon With Panels', 'add-icon-with-panels', 'fa-user-tag', 'add-icon-with-panels', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(10, 8, 'mod_10', 'Edit Icon With Panels', 'edit-icon-with-panels', 'fa-user-tag', 'edit-icon-with-panels', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(11, 0, 'mod_11', 'Port', 'port', 'fa-ship', 'port', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(12, 11, 'mod_12', 'Add Port', 'add-port', 'fa-ship', 'add-port', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(13, 11, 'mod_13', 'Edit Port', 'edit-port', 'fa-ship', 'edit-port', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(14, 0, 'mod_14', 'Port Category', 'port-category', 'fa-ship', 'port-category', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(15, 0, 'mod_15', 'Major Non Major Ports and Capacities', 'view-major-non-major-port-capacity', 'fa-ship', 'view-major-non-major-port-capacity', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(16, 0, 'mod_16', 'Berth Related Information', 'view-berth-related-information', 'fa-ship', 'view-berth-related-information', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(17, 0, 'mod_17', 'Direct Port Entry Delivery Related Containers', 'view-direct-port-entry-delivery-related-containers', 'fa-ship', 'view-direct-port-entry-delivery-related-containers', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(18, 0, 'mod_18', 'Employment Major Ports', 'view-employment-major-ports', 'fa-ship', 'view-employment-major-ports', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(19, 0, 'mod_19', 'Employment Dock Labour Boards Major Port', 'view-employment-dock-labour-boards-major-port', 'fa-ship', 'view-employment-dock-labour-boards-major-port', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(20, 0, 'mod_20', 'Cruise Tourism', 'view-cruise-tourism', 'fa-ship', 'view-cruise-tourism', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(21, 0, 'mod_21', 'National Waterways Information', 'view-national-waterways-information', 'fa-ship', 'view-national-waterways-information', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(22, 0, 'mod_22', 'Indian Tonnage', 'view-indian-tonnage', 'fa-ship', 'view-indian-tonnage', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(23, 0, 'mod_23', 'Seafarers Information', 'view-seafarers-information', 'fa-ship', 'view-seafarers-information', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(24, 0, 'mod_24', 'Commodities List', 'view-commodities', 'fa-ship', 'view-commodities', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(25, 0, 'mod_25', 'Commodities List Form Add', 'add-commodities-form', 'fa-ship', 'add-commodities-form', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(26, 0, 'mod_26', 'Report', 'view-report', 'fa-ship', 'view-report', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `indian_tonnages`
--

CREATE TABLE `indian_tonnages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `trade` text NOT NULL DEFAULT '0',
  `no_of_ships` text NOT NULL DEFAULT '0',
  `gross_tonnage` text NOT NULL DEFAULT '0',
  `dead_weight_tonnage` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indian_tonnages`
--

INSERT INTO `indian_tonnages` (`id`, `select_year`, `select_month`, `port_type`, `state_board`, `port_id`, `trade`, `no_of_ships`, `gross_tonnage`, `dead_weight_tonnage`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2023', '7', '0', '0', '0', 'Overseas', '196081', '7585', '79967', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(2, '2024', '10', '0', '0', '0', 'Coastal', '313730', '2264', '67375', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(3, '2022', '6', '0', '0', '0', 'Overseas', '753709', '44144', '40823', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(4, '2024', '4', '0', '0', '0', 'Overseas', '708886', '32791', '88328', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(5, '2024', '4', '0', '0', '0', 'Overseas', '496917', '10770', '98476', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(6, '2022', '11', '0', '0', '0', 'Coastal', '556093', '9616', '20427', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(7, '2024', '5', '0', '0', '0', 'Overseas', '104984', '48827', '18954', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(8, '2022', '10', '0', '0', '0', 'Coastal', '989140', '89144', '43221', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(9, '2024', '3', '0', '0', '0', 'Overseas', '564928', '18092', '47748', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(10, '2022', '1', '0', '0', '0', 'Overseas', '667871', '97280', '48490', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(11, '2023', '8', '0', '0', '0', 'Coastal', '278066', '33631', '71718', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(12, '2023', '3', '0', '0', '0', 'Overseas', '962131', '37869', '46674', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(13, '2024', '3', '0', '0', '0', 'Coastal', '972466', '88927', '40249', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(14, '2024', '5', '0', '0', '0', 'Coastal', '424587', '6251', '96798', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(15, '2023', '1', '0', '0', '0', 'Coastal', '73631', '24952', '83171', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(16, '2024', '6', '0', '0', '0', 'Overseas', '777075', '96064', '70380', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(17, '2023', '12', '0', '0', '0', 'Overseas', '709549', '23971', '25095', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(18, '2024', '3', '0', '0', '0', 'Coastal', '695305', '4399', '88943', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(19, '2024', '4', '0', '0', '0', 'Overseas', '288132', '76435', '73330', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(20, '2022', '8', '0', '0', '0', 'Overseas', '367301', '30424', '48000', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(21, '2023', '12', '0', '0', '0', 'Coastal', '105833', '33631', '29061', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(22, '2022', '4', '0', '0', '0', 'Coastal', '359306', '53640', '12089', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(23, '2023', '5', '0', '0', '0', 'Coastal', '292171', '6664', '94868', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(24, '2022', '3', '0', '0', '0', 'Coastal', '911890', '5815', '24923', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(25, '2024', '12', '0', '0', '0', 'Overseas', '213133', '10185', '86611', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(26, '2022', '6', '0', '0', '0', 'Coastal', '757979', '11489', '66155', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(27, '2022', '8', '0', '0', '0', 'Overseas', '949483', '93680', '43259', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(28, '2024', '6', '0', '0', '0', 'Overseas', '802777', '57274', '42314', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(29, '2024', '4', '0', '0', '0', 'Overseas', '280469', '97279', '35711', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(30, '2023', '7', '0', '0', '0', 'Overseas', '140221', '62966', '90831', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(31, '2023', '9', '0', '0', '0', 'Overseas', '396669', '10998', '28839', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(32, '2023', '4', '0', '0', '0', 'Overseas', '102599', '28942', '44200', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(33, '2022', '11', '0', '0', '0', 'Coastal', '438439', '94137', '43253', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(34, '2023', '4', '0', '0', '0', 'Coastal', '137923', '73500', '74005', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(35, '2022', '6', '0', '0', '0', 'Overseas', '178657', '76081', '16787', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(36, '2022', '11', '0', '0', '0', 'Coastal', '27558', '23934', '25058', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(37, '2022', '8', '0', '0', '0', 'Overseas', '762210', '71493', '80946', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(38, '2024', '2', '0', '0', '0', 'Overseas', '964848', '46310', '91877', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(39, '2022', '5', '0', '0', '0', 'Overseas', '98287', '70814', '9155', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(40, '2023', '5', '0', '0', '0', 'Coastal', '829240', '23782', '88173', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(41, '2023', '2', '0', '0', '0', 'Overseas', '145677', '94771', '61453', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(42, '2024', '8', '0', '0', '0', 'Overseas', '156514', '11808', '20680', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(43, '2022', '1', '0', '0', '0', 'Coastal', '220899', '1476', '4129', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(44, '2023', '12', '0', '0', '0', 'Overseas', '296452', '60733', '58034', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(45, '2024', '9', '0', '0', '0', 'Overseas', '383910', '57291', '97821', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(46, '2022', '5', '0', '0', '0', 'Coastal', '691864', '95524', '76084', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(47, '2024', '12', '0', '0', '0', 'Overseas', '325302', '67483', '90801', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(48, '2023', '2', '0', '0', '0', 'Coastal', '181241', '25899', '46683', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(49, '2024', '5', '0', '0', '0', 'Overseas', '143914', '45909', '94682', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(50, '2024', '1', '0', '0', '0', 'Coastal', '952731', '55722', '93269', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(51, '2024', '6', '0', '0', '0', 'Overseas', '221348', '62915', '37819', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(52, '2022', '5', '0', '0', '0', 'Coastal', '511831', '66332', '81548', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(53, '2022', '6', '0', '0', '0', 'Overseas', '882106', '41996', '6037', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(54, '2024', '12', '0', '0', '0', 'Coastal', '115261', '28427', '77869', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(55, '2023', '2', '0', '0', '0', 'Overseas', '254808', '24905', '1115', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(56, '2024', '3', '0', '0', '0', 'Coastal', '203182', '9302', '81088', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(57, '2024', '1', '0', '0', '0', 'Overseas', '294560', '61092', '37081', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(58, '2022', '8', '0', '0', '0', 'Overseas', '147408', '33151', '94435', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(59, '2023', '8', '0', '0', '0', 'Coastal', '411174', '41205', '94291', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(60, '2023', '2', '0', '0', '0', 'Overseas', '539938', '46279', '52995', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(61, '2023', '1', '0', '0', '0', 'Overseas', '991423', '51839', '24613', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(62, '2022', '12', '0', '0', '0', 'Coastal', '648062', '91683', '47272', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(63, '2023', '12', '0', '0', '0', 'Coastal', '560557', '36361', '43633', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(64, '2024', '11', '0', '0', '0', 'Coastal', '251399', '29394', '51842', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(65, '2024', '3', '0', '0', '0', 'Coastal', '189870', '94997', '11442', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(66, '2024', '10', '0', '0', '0', 'Coastal', '862144', '29825', '67543', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(67, '2022', '8', '0', '0', '0', 'Overseas', '518992', '68597', '65815', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(68, '2022', '1', '0', '0', '0', 'Overseas', '756887', '76930', '26074', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(69, '2022', '5', '0', '0', '0', 'Overseas', '35464', '84227', '63878', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(70, '2024', '10', '0', '0', '0', 'Overseas', '876157', '35680', '87719', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(71, '2024', '9', '0', '0', '0', 'Coastal', '160663', '84456', '98524', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(72, '2024', '8', '0', '0', '0', 'Overseas', '158600', '30565', '8084', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(73, '2024', '5', '0', '0', '0', 'Coastal', '675695', '84846', '49842', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(74, '2024', '12', '0', '0', '0', 'Overseas', '181601', '24562', '26976', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(75, '2023', '12', '0', '0', '0', 'Overseas', '196977', '44620', '67823', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(76, '2024', '1', '0', '0', '0', 'Coastal', '607994', '12279', '35453', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(77, '2022', '9', '0', '0', '0', 'Coastal', '233863', '81623', '17097', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(78, '2023', '8', '0', '0', '0', 'Coastal', '546765', '85997', '69216', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(79, '2022', '12', '0', '0', '0', 'Coastal', '985501', '36531', '56495', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(80, '2022', '12', '0', '0', '0', 'Coastal', '711201', '95968', '57199', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(81, '2024', '12', '0', '0', '0', 'Overseas', '680200', '19515', '25980', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(82, '2022', '3', '0', '0', '0', 'Overseas', '846515', '46246', '42226', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(83, '2023', '2', '0', '0', '0', 'Coastal', '198056', '54970', '60361', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(84, '2023', '4', '0', '0', '0', 'Coastal', '730745', '74463', '87264', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(85, '2024', '2', '0', '0', '0', 'Overseas', '996349', '46872', '42216', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(86, '2024', '7', '0', '0', '0', 'Coastal', '895481', '11099', '59927', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(87, '2024', '4', '0', '0', '0', 'Coastal', '766241', '32922', '20711', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(88, '2024', '4', '0', '0', '0', 'Coastal', '568632', '19337', '71705', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(89, '2023', '2', '0', '0', '0', 'Coastal', '858556', '97677', '13795', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(90, '2023', '11', '0', '0', '0', 'Overseas', '137022', '2941', '9898', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(91, '2023', '11', '0', '0', '0', 'Coastal', '258025', '35582', '21817', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(92, '2023', '7', '0', '0', '0', 'Coastal', '566750', '76545', '37080', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(93, '2022', '5', '0', '0', '0', 'Coastal', '38615', '23193', '46270', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(94, '2022', '9', '0', '0', '0', 'Overseas', '721373', '18487', '77468', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(95, '2023', '11', '0', '0', '0', 'Overseas', '773499', '9492', '37631', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(96, '2024', '9', '0', '0', '0', 'Coastal', '275685', '9840', '32077', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(97, '2024', '3', '0', '0', '0', 'Overseas', '636633', '11614', '90605', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(98, '2024', '10', '0', '0', '0', 'Coastal', '395735', '38652', '58254', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(99, '2023', '6', '0', '0', '0', 'Overseas', '920322', '70368', '60636', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04'),
(100, '2024', '11', '0', '0', '0', 'Coastal', '147920', '23277', '49702', '1', '0', 0, '2024-05-10 16:42:04', '2024-05-10 16:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_20_073036_create_roles_table', 1),
(7, '2023_09_21_175917_create_icon_with_panels_table', 1),
(8, '2023_09_21_183049_create_modules_table', 1),
(9, '2023_11_01_090705_create_departments_table', 1),
(10, '2023_11_08_055631_create_ports_table', 1),
(11, '2023_11_08_055856_create_port_categories_table', 1),
(12, '2023_11_10_205120_create_role_permissions_table', 1),
(13, '2023_12_15_065229_create_m_n_m_port_capacities_table', 1),
(14, '2023_12_21_061529_create_berth_related_information_table', 1),
(15, '2023_12_25_084459_create_direct_port_entry_delivery_related_containers_table', 1),
(16, '2023_12_25_092715_create_cruise_tourisms_table', 1),
(17, '2023_12_25_152002_create_national_waterways_information_table', 1),
(18, '2023_12_25_160742_create_indian_tonnages_table', 1),
(19, '2023_12_26_071530_create_seafarers_information_table', 1),
(20, '2024_01_01_061153_create_state_boards_table', 1),
(21, '2024_01_01_061728_create_states_table', 1),
(22, '2024_01_09_073530_create_employment_major_ports_table', 1),
(23, '2024_01_10_045430_create_employment_dock_labour_boards_major_ports_table', 1),
(24, '2024_05_11_084537_create_commodities_table', 2),
(25, '2024_05_11_233334_create_port_commodities_structures_table', 3),
(26, '2024_05_12_154719_create_commodities_table', 4),
(27, '2024_05_12_192926_create_commodities_data_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` text NOT NULL DEFAULT '0',
  `module_id` text NOT NULL DEFAULT '0',
  `permission` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `role_id`, `module_id`, `permission`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26', '', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, '2', '1', '', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, '3', '1', '', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, '4', '1,3,4,5', '', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, '5', '1,15', '', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(6, '6', '1', '', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `m_n_m_port_capacities`
--

CREATE TABLE `m_n_m_port_capacities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_name` text NOT NULL DEFAULT '0',
  `operational` text NOT NULL DEFAULT '0',
  `capacity` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_n_m_port_capacities`
--

INSERT INTO `m_n_m_port_capacities` (`id`, `select_year`, `select_month`, `port_type`, `state_board`, `port_name`, `operational`, `capacity`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2023', '5', '1', '0', '1', 'operational', '4', '10', '9', 0, '2024-05-11 23:52:17', '2024-05-11 23:53:03'),
(2, '2023', '5', '2', '1', '14', 'operational', '2', '15', '15', 0, '2024-05-12 00:40:33', '2024-05-12 00:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `national_waterways_information`
--

CREATE TABLE `national_waterways_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `national_waterway_no` text NOT NULL DEFAULT '0',
  `length_km` text NOT NULL DEFAULT '0',
  `details_of_waterways` text NOT NULL DEFAULT '0',
  `cargo_moved` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_waterways_information`
--

INSERT INTO `national_waterways_information` (`id`, `select_year`, `select_month`, `port_type`, `state_board`, `port_id`, `national_waterway_no`, `length_km`, `details_of_waterways`, `cargo_moved`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2022', '1', '0', '0', '0', '85489', '3788531', '68825', '3976347', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(2, '2024', '6', '0', '0', '0', '668378', '1992265', '368159', '7908565', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(3, '2019', '10', '0', '0', '0', '873699', '4118387', '173828', '3390418', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(4, '2019', '9', '0', '0', '0', '684162', '4477577', '339781', '9536049', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(5, '2021', '5', '0', '0', '0', '805512', '879017', '906850', '7001441', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(6, '2022', '4', '0', '0', '0', '664021', '1208797', '90202', '7615495', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(7, '2023', '5', '0', '0', '0', '153461', '533589', '211565', '5701546', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(8, '2020', '2', '0', '0', '0', '90285', '1144892', '457197', '2188676', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(9, '2019', '5', '0', '0', '0', '545581', '4840732', '895005', '8298635', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(10, '2023', '8', '0', '0', '0', '380186', '1530136', '493208', '1011903', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(11, '2023', '12', '0', '0', '0', '16696', '120714', '729885', '1966188', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(12, '2019', '9', '0', '0', '0', '615436', '624131', '163404', '8210891', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(13, '2023', '4', '0', '0', '0', '206120', '4587641', '212749', '6662586', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(14, '2019', '8', '0', '0', '0', '628196', '2041535', '915506', '9271072', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(15, '2024', '1', '0', '0', '0', '448809', '4201223', '405038', '7822790', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(16, '2023', '7', '0', '0', '0', '844184', '2576435', '782907', '2297351', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(17, '2024', '6', '0', '0', '0', '614726', '1305301', '89521', '5102844', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(18, '2022', '2', '0', '0', '0', '824052', '1449645', '539910', '5353523', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(19, '2020', '10', '0', '0', '0', '747293', '54852', '993302', '4209445', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(20, '2020', '7', '0', '0', '0', '991105', '3194418', '960440', '9496438', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(21, '2022', '5', '0', '0', '0', '458175', '4199204', '826217', '8396175', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(22, '2021', '4', '0', '0', '0', '908813', '4177299', '371982', '3528489', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(23, '2024', '6', '0', '0', '0', '177417', '3167313', '564344', '6494492', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(24, '2019', '6', '0', '0', '0', '922360', '2564827', '812820', '4739754', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(25, '2020', '9', '0', '0', '0', '767569', '1912209', '139380', '2095665', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(26, '2019', '12', '0', '0', '0', '858872', '4893172', '949142', '245682', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(27, '2024', '3', '0', '0', '0', '123057', '2314879', '145670', '7195699', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(28, '2024', '7', '0', '0', '0', '916000', '4940641', '805694', '7901707', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(29, '2023', '2', '0', '0', '0', '736572', '4598886', '688866', '3249368', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(30, '2019', '8', '0', '0', '0', '407969', '3265180', '409586', '1764729', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(31, '2019', '1', '0', '0', '0', '294916', '1826865', '280351', '740841', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(32, '2022', '8', '0', '0', '0', '660071', '2100439', '992740', '2266640', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(33, '2022', '7', '0', '0', '0', '838265', '4644348', '772851', '206914', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(34, '2022', '6', '0', '0', '0', '668820', '1306810', '486545', '2418114', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(35, '2019', '9', '0', '0', '0', '298579', '857075', '720522', '4430040', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(36, '2023', '11', '0', '0', '0', '545650', '895750', '405493', '1345544', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(37, '2020', '3', '0', '0', '0', '720930', '201819', '820377', '9188606', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(38, '2024', '3', '0', '0', '0', '607505', '3309088', '680218', '3344668', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(39, '2023', '11', '0', '0', '0', '576029', '969128', '928891', '4335876', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(40, '2021', '11', '0', '0', '0', '203919', '4645343', '135592', '1296329', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(41, '2020', '2', '0', '0', '0', '528062', '1161467', '797311', '660001', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(42, '2019', '9', '0', '0', '0', '84882', '4184985', '347111', '2027884', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(43, '2023', '12', '0', '0', '0', '146399', '3634881', '765625', '181003', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(44, '2023', '4', '0', '0', '0', '487666', '1681723', '270165', '6163692', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(45, '2023', '2', '0', '0', '0', '652220', '260365', '983224', '6392806', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(46, '2021', '3', '0', '0', '0', '971468', '4967242', '777490', '5948387', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(47, '2021', '11', '0', '0', '0', '413167', '1723828', '154505', '4937982', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(48, '2019', '9', '0', '0', '0', '202960', '2030762', '498497', '9253986', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(49, '2024', '7', '0', '0', '0', '190942', '597236', '364287', '4777471', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(50, '2024', '8', '0', '0', '0', '984822', '4600209', '142523', '8348832', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(51, '2023', '10', '0', '0', '0', '671704', '4406325', '917216', '6101629', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(52, '2019', '6', '0', '0', '0', '122271', '3725095', '822577', '6525807', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(53, '2020', '10', '0', '0', '0', '574460', '2571065', '175562', '3271669', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(54, '2024', '2', '0', '0', '0', '873467', '894096', '617588', '5385183', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(55, '2020', '3', '0', '0', '0', '921447', '1209120', '841088', '1109504', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(56, '2022', '8', '0', '0', '0', '734994', '1451177', '768231', '6217305', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(57, '2023', '3', '0', '0', '0', '945368', '505032', '491441', '2867690', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(58, '2020', '12', '0', '0', '0', '108574', '232698', '365427', '888089', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(59, '2021', '10', '0', '0', '0', '390631', '447632', '589639', '1202589', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(60, '2021', '10', '0', '0', '0', '707124', '2838398', '771873', '8443794', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(61, '2021', '11', '0', '0', '0', '648225', '565276', '933363', '9217111', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(62, '2023', '12', '0', '0', '0', '187638', '3319562', '624305', '4781576', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(63, '2023', '5', '0', '0', '0', '729079', '3768986', '105379', '405120', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(64, '2022', '7', '0', '0', '0', '415600', '1429613', '776657', '8895811', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(65, '2024', '1', '0', '0', '0', '232492', '3173617', '795651', '7467961', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(66, '2019', '12', '0', '0', '0', '53782', '2788884', '204920', '7066787', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(67, '2022', '2', '0', '0', '0', '154705', '4743674', '256171', '4401897', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(68, '2021', '4', '0', '0', '0', '678430', '2474231', '240647', '8774730', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(69, '2021', '7', '0', '0', '0', '680953', '2111569', '85278', '1215086', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(70, '2019', '8', '0', '0', '0', '958872', '1245242', '366623', '5619535', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(71, '2023', '5', '0', '0', '0', '677418', '689241', '399686', '5149956', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(72, '2019', '11', '0', '0', '0', '244686', '2065819', '285058', '373565', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(73, '2019', '6', '0', '0', '0', '619986', '27398', '207554', '7290817', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(74, '2023', '1', '0', '0', '0', '38517', '2130064', '198091', '1413155', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(75, '2021', '6', '0', '0', '0', '16421', '1213673', '421965', '5742125', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(76, '2019', '6', '0', '0', '0', '86699', '405820', '612282', '6913901', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(77, '2023', '1', '0', '0', '0', '171683', '2007684', '633548', '5919250', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(78, '2023', '9', '0', '0', '0', '825321', '1962760', '482667', '4925055', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(79, '2020', '4', '0', '0', '0', '368175', '1865765', '649461', '3502193', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(80, '2020', '5', '0', '0', '0', '516140', '2315596', '288107', '2239780', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(81, '2023', '2', '0', '0', '0', '979119', '4962726', '910422', '1633118', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(82, '2022', '9', '0', '0', '0', '765083', '312010', '660034', '380865', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(83, '2024', '6', '0', '0', '0', '525842', '2184297', '467097', '3967621', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(84, '2021', '6', '0', '0', '0', '577096', '3924292', '774368', '6865632', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(85, '2021', '6', '0', '0', '0', '326055', '1528544', '739347', '2724004', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(86, '2024', '2', '0', '0', '0', '831717', '4660045', '376730', '7400173', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(87, '2024', '4', '0', '0', '0', '793198', '4574533', '204986', '5464538', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(88, '2020', '6', '0', '0', '0', '910431', '468292', '947930', '6448183', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(89, '2024', '11', '0', '0', '0', '772168', '97135', '180905', '9156317', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(90, '2020', '11', '0', '0', '0', '162342', '1596475', '957956', '4375371', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(91, '2022', '6', '0', '0', '0', '198538', '455672', '527240', '1315575', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(92, '2024', '3', '0', '0', '0', '111578', '1040868', '635841', '1155598', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(93, '2021', '5', '0', '0', '0', '842015', '2883080', '347311', '436132', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(94, '2019', '4', '0', '0', '0', '153110', '903087', '322248', '5612199', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(95, '2024', '5', '0', '0', '0', '699957', '2944681', '484312', '4092463', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(96, '2022', '4', '0', '0', '0', '978348', '2176631', '631544', '6900490', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(97, '2024', '1', '0', '0', '0', '73579', '1328352', '311287', '2959587', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(98, '2019', '10', '0', '0', '0', '671421', '300913', '500624', '9191271', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(99, '2021', '9', '0', '0', '0', '285368', '2835587', '451331', '7635941', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44'),
(100, '2022', '12', '0', '0', '0', '439603', '2221913', '338968', '1356852', '1', '0', 0, '2024-05-10 16:41:44', '2024-05-10 16:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` text NOT NULL DEFAULT '0',
  `states_board_id` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `port_name` text NOT NULL DEFAULT '0',
  `port_code` text NOT NULL DEFAULT '0',
  `port_data_code` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `state_id`, `states_board_id`, `port_type`, `port_name`, `port_code`, `port_data_code`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '0', '0', '1', 'Chennai Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, '0', '0', '1', 'Cochin Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, '0', '0', '1', 'Deendayal Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, '0', '0', '1', 'Haldia Dock Complex', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, '0', '0', '1', 'Jawaharlal Nehru Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(6, '0', '0', '1', 'Kamarajar Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(7, '0', '0', '1', 'Mormugao Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(8, '0', '0', '1', 'Mumbai Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(9, '0', '0', '1', 'New Mangalore Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(10, '0', '0', '1', 'Paradip Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(11, '0', '0', '1', 'Syama Prasad Mookerjee Kolkata', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(12, '0', '0', '1', 'V O Chidambaranar Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(13, '0', '0', '1', 'Visakhapatnam Port Authority', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(14, '0', '1', '2', 'Gangavaram Port Limited', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(15, '0', '1', '2', 'Kakinada Anchorage Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(16, '0', '1', '2', 'Kakinada Seaports Limited', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(17, '0', '1', '2', 'Krishnapatnam Port Limited', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(18, '0', '1', '2', 'Ravva Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(19, '0', '2', '2', 'Andaman Nicobar Island Ports', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(20, '0', '3', '2', 'Panaji', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(21, '0', '4', '2', 'Alang', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(22, '0', '4', '2', 'Bedi', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(23, '0', '4', '2', 'Bedi Ebtsl Jetty', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(24, '0', '4', '2', 'Bedi Sikka', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(25, '0', '4', '2', 'Bhavnagar', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(26, '0', '4', '2', 'Dahej', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(27, '0', '4', '2', 'Jafrabad', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(28, '0', '4', '2', 'Jafrabad Gujarat Pipavav Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(29, '0', '4', '2', 'Magdalla', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(30, '0', '4', '2', 'Magdalla Adani Hazira Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(31, '0', '4', '2', 'Magdalla Hazira Port Pvt Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(32, '0', '4', '2', 'Mandvi Jakhau', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(33, '0', '4', '2', 'Mandvi Mundra', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(34, '0', '4', '2', 'Mandvi Mundra Port And Sez', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(35, '0', '4', '2', 'Navlakhi', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(36, '0', '4', '2', 'Okha', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(37, '0', '4', '2', 'Porbandar', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(38, '0', '4', '2', 'Veraval', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(39, '0', '5', '2', 'Honnavar', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(40, '0', '5', '2', 'Karwar', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(41, '0', '5', '2', 'Kundapur', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(42, '0', '5', '2', 'Malpe', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(43, '0', '5', '2', 'Old Mangalore', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(44, '0', '6', '2', 'Alappuzha', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(45, '0', '6', '2', 'Azhikkal', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(46, '0', '6', '2', 'Beypore', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(47, '0', '6', '2', 'Kollam', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(48, '0', '6', '2', 'Vizhinjam', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(49, '0', '7', '2', 'Bankot Infrastructure Logistic', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(50, '0', '7', '2', 'Belapur MMB Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(51, '0', '7', '2', 'Bhiwandi MMB Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(52, '0', '7', '2', 'Dabhol Konkan LNG', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(53, '0', '7', '2', 'Dahanu Adani Electricity', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(54, '0', '7', '2', 'Dharamtar JSW DPPl', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(55, '0', '7', '2', 'Dharamtar PNP Maritime Service', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(56, '0', '7', '2', 'Dighi Port Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(57, '0', '7', '2', 'Jaigad Angre Port Pvt Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(58, '0', '7', '2', 'Jaigad JSWJaigarh Port Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(59, '0', '7', '2', 'Karanja Terminal And Logistics', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(60, '0', '7', '2', 'Kelshi Ashapura Minechem Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(61, '0', '7', '2', 'Ratnagiri Finolex Industries', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(62, '0', '7', '2', 'Ratnagiri Ultratech Cement Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(63, '0', '7', '2', 'Redi Port Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(64, '0', '7', '2', 'Revdanda Indoenergy Internation', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(65, '0', '7', '2', 'Revdanda Jsw Steel Salav Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(66, '0', '7', '2', 'Trombay Mmb Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(67, '0', '7', '2', 'Ulwa Belapur Ambuja Cements', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(68, '0', '7', '2', 'Vasai MMB Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(69, '0', '7', '2', 'Vijaydurg MMB Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(70, '0', '7', '2', 'Yogayatan Ports Pvt Ltd', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(71, '0', '8', '2', 'Dhamara', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(72, '0', '8', '2', 'Gopalpur', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(73, '0', '9', '2', 'Karaikal Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(74, '0', '9', '2', 'MTF Of Chemplast Sanmar', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(75, '0', '9', '2', 'Pondicherry Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(76, '0', '10', '2', 'Cuddalore Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(77, '0', '10', '2', 'Ennore Minor Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(78, '0', '10', '2', 'Kattupalli Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(79, '0', '10', '2', 'Kudankulam', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(80, '0', '10', '2', 'Nagapattinam Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(81, '0', '10', '2', 'Tirukkadaiyur Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(82, '0', '0', '3', 'Shipping Sector Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(83, '0', '0', '4', 'Other Organisations Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(84, '0', '0', '5', 'Sagarmala + ALHW Project Port', '0', '0', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `port_categories`
--

CREATE TABLE `port_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` text NOT NULL DEFAULT '0',
  `slug` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `port_categories`
--

INSERT INTO `port_categories` (`id`, `category_name`, `slug`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Major Port', 'majorport', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, 'Non Major Port', 'nonmajorport', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, 'Shipping Sector', 'shippingsector', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, 'Other Organisations', 'otherorganisations', '1', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, 'Sagarmala + ALHW Project', 'sagarmala+alhwproject', '1', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `port_commodities_structures`
--

CREATE TABLE `port_commodities_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` text NOT NULL DEFAULT '0',
  `states_board_id` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `port_name` text NOT NULL DEFAULT '0',
  `data_table_type_id` text NOT NULL DEFAULT '0',
  `commodity_id` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` text NOT NULL DEFAULT '0',
  `role_slug` text NOT NULL DEFAULT '0',
  `level` text NOT NULL DEFAULT '0',
  `employee_role` text NOT NULL DEFAULT '0',
  `access_role` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_slug`, `level`, `employee_role`, `access_role`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', '1', 'Super Admin', '1,2,3,4,5,6,7', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, 'Ministry Nodal Officer', 'ministrynodalofficer', '2', 'Ministry Nodal Officer (Admin I)', '0', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, 'State Maritime Board Nodal Officer', 'statemaritimeboardnodalofficer', '3', 'State Maritime Board Nodal Officer (Admin II)', '0', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, 'Port Nodal Officer', 'portnodalofficer', '4', 'Port Nodal Officer (Admin III)', '5,6', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, 'Port Manager', 'portmanager', '5', 'Port Manager ', '0', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(6, 'Data Entry Officer', 'dataentryofficer', '6', 'Data Entry Officer (User)', '0', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(7, 'NIC', 'nic', '7', 'NIC', '0', '0', '0', 0, '2024-05-10 16:41:14', '2024-05-10 16:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` text NOT NULL DEFAULT '0',
  `module_id` text NOT NULL DEFAULT '0',
  `create` text NOT NULL DEFAULT '0',
  `edit` text NOT NULL DEFAULT '0',
  `view` text NOT NULL DEFAULT '0',
  `deleted` text NOT NULL DEFAULT '0',
  `status` text NOT NULL DEFAULT '1',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `module_id`, `create`, `edit`, `view`, `deleted`, `status`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(2, '1', '2', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(3, '1', '3', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(4, '1', '4', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(5, '1', '5', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(6, '1', '6', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(7, '1', '7', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(8, '1', '8', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(9, '1', '9', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(10, '1', '10', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(11, '1', '11', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(12, '1', '12', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(13, '1', '13', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(14, '1', '14', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(15, '1', '15', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(16, '1', '16', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(17, '1', '17', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(18, '1', '18', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(19, '1', '19', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(20, '1', '20', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(21, '1', '21', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(22, '1', '22', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(23, '1', '23', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `seafarers_information`
--

CREATE TABLE `seafarers_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_year` text NOT NULL DEFAULT '0',
  `select_month` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `total_seafarers` text NOT NULL DEFAULT '0',
  `woman_seafarer` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seafarers_information`
--

INSERT INTO `seafarers_information` (`id`, `select_year`, `select_month`, `port_type`, `state_board`, `port_id`, `total_seafarers`, `woman_seafarer`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2023', '4', '0', '0', '0', '20055', '256', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(2, '2024', '9', '0', '0', '0', '91757', '296', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(3, '2022', '10', '0', '0', '0', '46745', '350', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(4, '2024', '11', '0', '0', '0', '41894', '247', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(5, '2023', '11', '0', '0', '0', '8166', '735', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(6, '2022', '4', '0', '0', '0', '63692', '954', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(7, '2024', '10', '0', '0', '0', '45746', '328', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(8, '2024', '4', '0', '0', '0', '70371', '722', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(9, '2023', '3', '0', '0', '0', '76777', '384', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(10, '2022', '7', '0', '0', '0', '68503', '768', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(11, '2024', '4', '0', '0', '0', '7143', '879', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(12, '2024', '11', '0', '0', '0', '80462', '656', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(13, '2023', '7', '0', '0', '0', '10948', '162', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(14, '2024', '2', '0', '0', '0', '91855', '484', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(15, '2022', '6', '0', '0', '0', '47547', '392', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(16, '2024', '11', '0', '0', '0', '33754', '438', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(17, '2023', '9', '0', '0', '0', '38978', '945', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(18, '2022', '9', '0', '0', '0', '21935', '4', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(19, '2024', '6', '0', '0', '0', '11322', '353', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(20, '2023', '3', '0', '0', '0', '32145', '517', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(21, '2024', '1', '0', '0', '0', '68730', '864', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(22, '2022', '5', '0', '0', '0', '92931', '24', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(23, '2023', '7', '0', '0', '0', '13688', '663', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(24, '2023', '8', '0', '0', '0', '56928', '257', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(25, '2022', '4', '0', '0', '0', '74839', '832', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(26, '2024', '1', '0', '0', '0', '67886', '990', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(27, '2023', '3', '0', '0', '0', '24490', '555', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(28, '2022', '4', '0', '0', '0', '50647', '476', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(29, '2024', '7', '0', '0', '0', '66626', '54', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(30, '2022', '11', '0', '0', '0', '84853', '120', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(31, '2023', '11', '0', '0', '0', '38882', '594', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(32, '2023', '1', '0', '0', '0', '80219', '898', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(33, '2023', '3', '0', '0', '0', '75646', '660', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(34, '2022', '5', '0', '0', '0', '84283', '11', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(35, '2023', '5', '0', '0', '0', '233', '301', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(36, '2024', '3', '0', '0', '0', '91452', '20', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(37, '2022', '6', '0', '0', '0', '56826', '746', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(38, '2022', '11', '0', '0', '0', '25970', '258', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(39, '2023', '2', '0', '0', '0', '93053', '425', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(40, '2024', '11', '0', '0', '0', '32233', '527', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(41, '2023', '9', '0', '0', '0', '75587', '679', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(42, '2022', '4', '0', '0', '0', '47527', '396', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(43, '2024', '6', '0', '0', '0', '34540', '496', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(44, '2022', '12', '0', '0', '0', '61658', '456', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(45, '2024', '11', '0', '0', '0', '2811', '582', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(46, '2024', '9', '0', '0', '0', '64288', '745', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(47, '2023', '4', '0', '0', '0', '73618', '216', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(48, '2023', '3', '0', '0', '0', '74589', '772', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(49, '2023', '6', '0', '0', '0', '72178', '334', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(50, '2023', '4', '0', '0', '0', '97701', '365', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(51, '2022', '2', '0', '0', '0', '38800', '201', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(52, '2023', '6', '0', '0', '0', '71128', '871', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(53, '2022', '11', '0', '0', '0', '82449', '964', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(54, '2024', '11', '0', '0', '0', '1264', '40', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(55, '2024', '2', '0', '0', '0', '52165', '366', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(56, '2024', '7', '0', '0', '0', '91439', '883', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(57, '2023', '11', '0', '0', '0', '71842', '236', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(58, '2024', '10', '0', '0', '0', '90379', '135', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(59, '2022', '9', '0', '0', '0', '96217', '297', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(60, '2022', '3', '0', '0', '0', '34189', '147', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(61, '2023', '6', '0', '0', '0', '6736', '323', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(62, '2024', '5', '0', '0', '0', '75367', '519', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(63, '2023', '9', '0', '0', '0', '5641', '162', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(64, '2024', '3', '0', '0', '0', '6418', '403', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(65, '2022', '3', '0', '0', '0', '20346', '478', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(66, '2023', '5', '0', '0', '0', '67265', '253', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(67, '2024', '8', '0', '0', '0', '58533', '166', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(68, '2024', '11', '0', '0', '0', '95145', '672', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(69, '2024', '12', '0', '0', '0', '53040', '867', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(70, '2023', '5', '0', '0', '0', '38223', '954', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(71, '2023', '6', '0', '0', '0', '70454', '865', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(72, '2024', '4', '0', '0', '0', '34855', '596', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(73, '2023', '5', '0', '0', '0', '57733', '790', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(74, '2024', '4', '0', '0', '0', '89024', '113', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(75, '2024', '8', '0', '0', '0', '14569', '132', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(76, '2023', '4', '0', '0', '0', '77543', '904', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(77, '2024', '8', '0', '0', '0', '80880', '586', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(78, '2022', '10', '0', '0', '0', '77115', '591', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(79, '2024', '10', '0', '0', '0', '50339', '114', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(80, '2023', '11', '0', '0', '0', '1794', '761', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(81, '2022', '5', '0', '0', '0', '27196', '62', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(82, '2022', '10', '0', '0', '0', '45181', '730', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(83, '2022', '5', '0', '0', '0', '45202', '865', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(84, '2024', '10', '0', '0', '0', '35254', '496', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(85, '2022', '9', '0', '0', '0', '53033', '77', '1', '0', 0, '2024-05-10 16:41:22', '2024-05-10 16:41:22'),
(86, '2022', '7', '0', '0', '0', '14784', '252', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(87, '2023', '2', '0', '0', '0', '12384', '482', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(88, '2022', '5', '0', '0', '0', '48401', '630', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(89, '2023', '5', '0', '0', '0', '23954', '692', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(90, '2023', '8', '0', '0', '0', '38646', '412', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(91, '2022', '7', '0', '0', '0', '23542', '539', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(92, '2022', '4', '0', '0', '0', '40240', '768', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(93, '2022', '2', '0', '0', '0', '17707', '392', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(94, '2023', '3', '0', '0', '0', '87683', '604', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(95, '2024', '1', '0', '0', '0', '36161', '455', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(96, '2022', '7', '0', '0', '0', '85063', '392', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(97, '2024', '9', '0', '0', '0', '57961', '258', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(98, '2024', '5', '0', '0', '0', '13172', '797', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(99, '2023', '3', '0', '0', '0', '26475', '339', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23'),
(100, '2022', '11', '0', '0', '0', '42719', '241', '1', '0', 0, '2024-05-10 16:41:23', '2024-05-10 16:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(2, 'Arunachal Pradesh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(3, 'Andaman and Nicobar Islands', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(4, 'Assam', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(5, 'Bihar', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(6, 'Chandigarh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(7, 'Chhattisgarh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(8, 'Dadar and Nagar Haveli', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(9, 'Daman and Diu', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(10, 'Delhi', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(11, 'Goa', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(12, 'Gujarat', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(13, 'Haryana', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(14, 'Himachal Pradesh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(15, 'Jammu Kashmir', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(16, 'Jharkhand', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(17, 'Karnataka', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(18, 'Kerala', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(19, 'Lakshadeep', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(20, 'Madhya Pradesh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(21, 'Maharashtra', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(22, 'Manipur', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(23, 'Meghalaya', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(24, 'Mizoram', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(25, 'Nagaland', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(26, 'Odisha', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(27, 'Pondicherry', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(28, 'Punjab', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(29, 'Rajasthan', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(30, 'Sikkim', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(31, 'Tamil Nadu', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(32, 'Telangana', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(33, 'Tripura', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(34, 'Uttaranchal', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(35, 'Uttar Pradesh', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(36, 'Uttarakhand', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(37, 'West Bengal', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `state_boards`
--

CREATE TABLE `state_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` text NOT NULL DEFAULT '0',
  `name` text NOT NULL DEFAULT '0',
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Users ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state_boards`
--

INSERT INTO `state_boards` (`id`, `state_id`, `name`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1', 'Directorate Of Port Govt Of AP', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(2, '3', 'Port Management Board A N', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(3, '11', 'Capt of Ports GOVT OF GOA', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(4, '12', 'Gujarat Maritime Board', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(5, '17', 'Directorate Of Ports Karnataka', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(6, '18', 'Director Of Ports Govt Kerala', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(7, '21', 'Maharashtra Maritime Board', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(8, '26', 'Directorate Of Ports Odisha', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(9, '27', 'Director of Ports Puducherry', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(10, '31', 'Tamil Nadu Maritime Board ', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(11, '9', 'UT AD Of Daman', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(12, '9', 'UT ADM Of Diu', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15'),
(13, '19', 'Director Port Lakshadeep', '0', '0', 0, '2024-05-10 16:41:15', '2024-05-10 16:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `state_id` text NOT NULL DEFAULT '0',
  `port_type` text NOT NULL DEFAULT '0',
  `state_board` text NOT NULL DEFAULT '0',
  `port_id` text NOT NULL DEFAULT '0',
  `report_to` text NOT NULL DEFAULT '0',
  `extra_module` text NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 4,
  `dep_id` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `state_id`, `port_type`, `state_board`, `port_id`, `report_to`, `extra_module`, `email`, `username`, `email_verified_at`, `password`, `role_id`, `dep_id`, `status`, `created_by`, `updated_by`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '0', '0', '0', '0', '0', '0', 'superadmin@gov.in', 'superadmin', NULL, '$2y$10$p/Y.jyqKWHfklirGldz7o.txKNAChejQxEWgus5DmQfUPxeJ3NNTW', 1, '1', 1, '0', '0', 0, NULL, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(2, 'Ministry of Admin (Admin)', '0', '0', '0', '0', '1', '0', 'madmin@gov.in', 'madmin', NULL, '$2y$10$cD9ycbT954a5pCrPg6HaguQnrqYkGyt6q84RDIDUCHtOjWLbROzGe', 2, '1', 1, '0', '0', 0, NULL, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(3, 'DG Shipping (Admin)', '0', '0', '0', '0', '1', '0', 'dgadmin@gov.in', 'dgamin', NULL, '$2y$10$lGlW8snZL.6PqlZkcLCjge9ndwHHDHj8YMSNmUY92H0D9/1Jl6/6G', 3, '1', 1, '0', '0', 0, NULL, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(4, 'IWAI (Admin)', '0', '0', '0', '0', '1', '0', 'iwaiadmin@gov.in', 'iwaiadmin', NULL, '$2y$10$FM/iZaYzBns4mDOO.GmZOucFd7g4M5l2ejn2qJpNonymRNjvsUeG2', 4, '1', 1, '0', '0', 0, NULL, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(5, 'Port Data entry officer (User)', '0', '0', '0', '0', '0', '0', 'user@gov.in', 'user', NULL, '$2y$10$VuOuBKJXKsfC67fZzcrzQ.0XNgzb4Xbv7gwQysTyCo6K972iQCJzO', 5, '1', 1, '0', '0', 0, NULL, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(6, 'NIC', '0', '0', '0', '0', '1', '0', 'nic@gov.in', 'nic', NULL, '$2y$10$e/dNe9nCdUfbgpWLvSpMvOaHga/ioMIdysQog9f3DfGt.NxtE8yiy', 6, '1', 1, '0', '0', 0, NULL, '2024-05-10 16:41:14', '2024-05-10 16:41:14'),
(7, 'ministry user', '0', '1', '0', '1', '2', '0', 'ministryuser@gov.in', 'ministryuser', NULL, '$2y$10$fxIc59i4I8s8bLXCa3o4C.Xr8fwzW/Nr8BU8iUT.3vUNvSMHvkBrS', 2, '1', 1, '1', '0', 0, NULL, '2024-05-10 17:19:57', '2024-05-10 17:19:57'),
(8, 'Port Nodal Officer I', '0', '1', '0', '1', '2', '3,4,5', 'portnodaloffice1@gov.in', 'portnodaloffice1', NULL, '$2y$10$JR/e5ZCwesL7/NjucBtWjOpzOXqle3tSGlOGiE2K/qjXA225WdzhS', 4, '1', 1, '7', '0', 0, NULL, '2024-05-10 17:27:36', '2024-05-10 17:27:36'),
(9, 'Port Manager I', '0', '1', '0', '1', '8', '24,15', 'portmanager1@gov.in', 'portmanager1', NULL, '$2y$10$LbITFhdMC2/x12Bz59hswOr1pLaDnwYZveCCj8wWMMTNfIDpG9EDO', 5, '1', 1, '8', '0', 0, NULL, '2024-05-11 20:35:59', '2024-05-11 20:35:59'),
(10, 'Data Entry Officer I', '0', '1', '0', '1', '8', '1,15', 'dataentryofficer1@gov.in', 'dataentryofficer1', NULL, '$2y$10$9hilh9bhHQBd8ZTTymWMNud/QPOXEQBPTkaoLFRCC8ZaLPMH1CV0y', 6, '1', 1, '8', '0', 0, NULL, '2024-05-11 20:37:05', '2024-05-11 20:37:05'),
(11, 'Port Manager II', '0', '1', '0', '1', '8', '1,16,24', 'portmanager2@gov.in', 'portmanager2', NULL, '$2y$10$feZ/e5h4Aepa3XZM5.gaaOvjcyQhQ9PHuzQ4iFpa1Xk3jvsIYvy6W', 5, '2', 1, '8', '0', 0, NULL, '2024-05-11 23:15:26', '2024-05-11 23:15:26'),
(13, 'Data Entry Officer I	I', '0', '1', '0', '1', '8', '15,16', 'dataentryofficer2@gov.in', 'dataentryofficer2', NULL, '$2y$10$Wb1TL7Qmv9716zOs6lKuO.Wl1qYMCXb8YcZpAuGcmMKUjfnSwdxL6', 6, '1', 1, '8', '0', 0, NULL, '2024-05-11 23:18:09', '2024-05-11 23:18:09'),
(14, 'Port Nodal Officer I	I', '0', '2', '1', '14', '7', '3,4,5', 'portnodaloffice2@gov.in', 'portnodaloffice2', NULL, '$2y$10$nPMFHHqYsa080zRgL/XyfOpe9.p/bgo4Wtp43Fl7mLcjT0d9Crbfe', 4, '1', 1, '1', '0', 0, NULL, '2024-05-11 23:36:53', '2024-05-11 23:36:53'),
(15, 'Port Manager III', '0', '2', '1', '14', '14', '1,15,16,23,24,25', 'portmanager3@gov.in', 'portmanager3', NULL, '$2y$10$DMqki9mOvSIDl/nYdkbab.tnpZr7TGTxznnfPYAjoet4ukdOAFYBK', 5, '1', 1, '14', '14', 0, NULL, '2024-05-12 00:27:39', '2024-05-12 08:37:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berth_related_information`
--
ALTER TABLE `berth_related_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodities`
--
ALTER TABLE `commodities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodities_data`
--
ALTER TABLE `commodities_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruise_tourisms`
--
ALTER TABLE `cruise_tourisms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_port_entry_delivery_related_containers`
--
ALTER TABLE `direct_port_entry_delivery_related_containers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_dock_labour_boards_major_ports`
--
ALTER TABLE `employment_dock_labour_boards_major_ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_major_ports`
--
ALTER TABLE `employment_major_ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `icon_with_panels`
--
ALTER TABLE `icon_with_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indian_tonnages`
--
ALTER TABLE `indian_tonnages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_n_m_port_capacities`
--
ALTER TABLE `m_n_m_port_capacities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_waterways_information`
--
ALTER TABLE `national_waterways_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_categories`
--
ALTER TABLE `port_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_commodities_structures`
--
ALTER TABLE `port_commodities_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seafarers_information`
--
ALTER TABLE `seafarers_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_boards`
--
ALTER TABLE `state_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berth_related_information`
--
ALTER TABLE `berth_related_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `commodities_data`
--
ALTER TABLE `commodities_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cruise_tourisms`
--
ALTER TABLE `cruise_tourisms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `direct_port_entry_delivery_related_containers`
--
ALTER TABLE `direct_port_entry_delivery_related_containers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_dock_labour_boards_major_ports`
--
ALTER TABLE `employment_dock_labour_boards_major_ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_major_ports`
--
ALTER TABLE `employment_major_ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icon_with_panels`
--
ALTER TABLE `icon_with_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `indian_tonnages`
--
ALTER TABLE `indian_tonnages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_n_m_port_capacities`
--
ALTER TABLE `m_n_m_port_capacities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `national_waterways_information`
--
ALTER TABLE `national_waterways_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `port_categories`
--
ALTER TABLE `port_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `port_commodities_structures`
--
ALTER TABLE `port_commodities_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `seafarers_information`
--
ALTER TABLE `seafarers_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `state_boards`
--
ALTER TABLE `state_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
