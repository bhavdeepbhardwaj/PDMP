-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3377
-- Generation Time: May 20, 2024 at 02:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`id`, `port_id`, `name`, `parent_id`, `type`, `status`, `created_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '0', 'Root', '0', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(2, '0', 'Liquid Bulk', '1', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(3, '0', 'Dry Bulk', '1', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(4, '0', 'Break Bulk', '1', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(5, '0', 'Container', '1', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(6, '0', 'Transhippment', '1', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(7, '0', 'POL-Crude', '2', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(8, '0', 'POL-Products', '2', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(9, '0', 'LPG or LNG', '2', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(10, '0', 'Edible Oil', '2', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(11, '0', 'FRM-Liquid', '2', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(12, '0', 'Iron Ore All', '3', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(13, '0', 'Pellets', '12', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(14, '0', 'Fine', '12', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(15, '0', 'Other Ores', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(16, '0', 'Thermal Coal', '3', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(17, '0', 'Coking Coal', '3', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(18, '0', 'Other Coal', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(19, '0', 'Iron and Steel', '4', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(20, '0', 'Timber and Log', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(21, '0', 'TEUs', '5', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(22, '0', 'Container Tonnes', '6', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(23, '0', 'Other Transhipment', '6', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(24, '0', 'Other Liquids', '2', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(25, '0', 'Fertilizer', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(26, '0', 'FRM-Dry', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(27, '0', 'Food Grains-excluding pulses', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(28, '0', 'Pulses', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(29, '0', 'Sugar', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(30, '0', 'Cement', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(31, '0', 'Salt', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(32, '0', 'Iron Scrap', '3', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(33, '0', 'Other Dry Bulk', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(34, '0', 'Tea and Coffee', '4', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(35, '0', 'Food Grains-excluding pulses', '4', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(36, '0', 'Pulses', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(37, '0', 'Sugar', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(38, '0', 'Cement', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(39, '0', 'Project Cargo', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(40, '0', 'Fertilizer', '4', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(41, '0', 'Automobiles-Tonnes', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(42, '0', 'Other Break Bulk', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(43, '0', 'Service rendered to ship', '1', 'Header', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(44, '0', 'Fresh Water', '43', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(45, '0', 'Tonnes', '5', 'Principal Commodity', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(46, '0', 'Fuel', '43', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(47, '0', 'Others', '43', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(48, '0', 'Chemicals', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(49, '0', 'Building Materials', '4', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(50, '0', 'POL-Crude', '6', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(51, '0', 'Container TEUs', '6', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(52, '0', 'POL-Products', '6', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58'),
(53, '0', 'Scrap - LDT', '3', 'Others', 0, '0', '0', 0, '2024-05-13 11:13:58', '2024-05-13 11:13:58');

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
(1, 'Department 1', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(2, 'Department 2', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(3, 'Department 3', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(4, 'Department 4', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(5, 'Department 5', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41');

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
(1, 0, 'mod_1', 'Dashboard', 'dashboard', 'fa-th', 'dashboard', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(2, 0, 'mod_2', 'Module', 'module', 'fa-user-shield', 'module', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(3, 0, 'mod_3', 'User Management', 'user', 'fa-users', 'user', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(4, 3, 'mod_4', 'Add User', 'add-user', 'fa-users', 'add-user', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(5, 3, 'mod_5', 'Edit User', 'edit-user', 'fa-users', 'edit-user', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(6, 0, 'mod_6', 'Role', 'role', 'fa-user-tag', 'role', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(7, 0, 'mod_7', 'Department', 'department', 'fa-user-tag', 'department', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(8, 0, 'mod_8', 'Icon With Panels', 'icon-with-panels', 'fa-user-tag', 'icon-with-panels', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(9, 8, 'mod_9', 'Add Icon With Panels', 'add-icon-with-panels', 'fa-user-tag', 'add-icon-with-panels', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(10, 8, 'mod_10', 'Edit Icon With Panels', 'edit-icon-with-panels', 'fa-user-tag', 'edit-icon-with-panels', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(11, 0, 'mod_11', 'Port', 'port', 'fa-ship', 'port', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(12, 11, 'mod_12', 'Add Port', 'add-port', 'fa-ship', 'add-port', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(13, 11, 'mod_13', 'Edit Port', 'edit-port', 'fa-ship', 'edit-port', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(14, 0, 'mod_14', 'Port Category', 'port-category', 'fa-ship', 'port-category', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(15, 0, 'mod_15', 'Major Non Major Ports and Capacities', 'view-major-non-major-port-capacity', 'fa-ship', 'view-major-non-major-port-capacity', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(16, 0, 'mod_16', 'Berth Related Information', 'view-berth-related-information', 'fa-ship', 'view-berth-related-information', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(17, 0, 'mod_17', 'Direct Port Entry Delivery Related Containers', 'view-direct-port-entry-delivery-related-containers', 'fa-ship', 'view-direct-port-entry-delivery-related-containers', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(18, 0, 'mod_18', 'Employment Major Ports', 'view-employment-major-ports', 'fa-ship', 'view-employment-major-ports', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(19, 0, 'mod_19', 'Employment Dock Labour Boards Major Port', 'view-employment-dock-labour-boards-major-port', 'fa-ship', 'view-employment-dock-labour-boards-major-port', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(20, 0, 'mod_20', 'Cruise Tourism', 'view-cruise-tourism', 'fa-ship', 'view-cruise-tourism', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(21, 0, 'mod_21', 'National Waterways Information', 'view-national-waterways-information', 'fa-ship', 'view-national-waterways-information', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(22, 0, 'mod_22', 'Indian Tonnage', 'view-indian-tonnage', 'fa-ship', 'view-indian-tonnage', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(23, 0, 'mod_23', 'Seafarers Information', 'view-seafarers-information', 'fa-ship', 'view-seafarers-information', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(24, 0, 'mod_24', 'Commodities List', 'view-commodities', 'fa-ship', 'view-commodities', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(25, 0, 'mod_25', 'Commodities List Form Add', 'add-commodities-form', 'fa-ship', 'add-commodities-form', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(26, 0, 'mod_26', 'Report', 'view-report', 'fa-ship', 'view-report', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41');

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
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(54, '2014_10_12_100000_create_password_resets_table', 1),
(55, '2019_08_19_000000_create_failed_jobs_table', 1),
(56, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(57, '2023_09_20_073036_create_roles_table', 1),
(58, '2023_09_21_175917_create_icon_with_panels_table', 1),
(59, '2023_09_21_183049_create_modules_table', 1),
(60, '2023_11_01_090705_create_departments_table', 1),
(61, '2023_11_08_055631_create_ports_table', 1),
(62, '2023_11_08_055856_create_port_categories_table', 1),
(63, '2023_11_10_205120_create_role_permissions_table', 1),
(64, '2023_12_15_065229_create_m_n_m_port_capacities_table', 1),
(65, '2023_12_21_061529_create_berth_related_information_table', 1),
(66, '2023_12_25_084459_create_direct_port_entry_delivery_related_containers_table', 1),
(67, '2023_12_25_092715_create_cruise_tourisms_table', 1),
(68, '2023_12_25_152002_create_national_waterways_information_table', 1),
(69, '2023_12_25_160742_create_indian_tonnages_table', 1),
(70, '2023_12_26_071530_create_seafarers_information_table', 1),
(71, '2024_01_01_061153_create_state_boards_table', 1),
(72, '2024_01_01_061728_create_states_table', 1),
(73, '2024_01_09_073530_create_employment_major_ports_table', 1),
(74, '2024_01_10_045430_create_employment_dock_labour_boards_major_ports_table', 1),
(75, '2024_05_12_154719_create_commodities_table', 1),
(76, '2024_05_12_192926_create_commodities_data_table', 1);

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
(1, '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26', '', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(2, '2', '1', '', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(3, '3', '1', '', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(4, '4', '1', '', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(5, '5', '1', '', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(6, '6', '1', '', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41');

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
(1, '31', '0', '1', 'Chennai Port Authority', '0', '0', '1', '1', 0, '2024-05-16 04:46:51', '2024-05-16 04:48:08'),
(2, '18', '0', '1', 'Cochin Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(3, '12', '0', '1', 'Deendayal Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(4, '37', '0', '1', 'Haldia Dock Complex', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(5, '21', '0', '1', 'Jawaharlal Nehru Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(6, '31', '0', '1', 'Kamarajar Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(7, '11', '0', '1', 'Mormugao Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(8, '21', '0', '1', 'Mumbai Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(9, '17', '0', '1', 'New Mangalore Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(10, '26', '0', '1', 'Paradip Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(11, '37', '0', '1', 'Syama Prasad Mookerjee Kolkata', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(12, '31', '0', '1', 'V O Chidambaranar Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(13, '1', '0', '1', 'Visakhapatnam Port Authority', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(14, '0', '1', '2', 'Gangavaram Port Limited', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(15, '0', '1', '2', 'Kakinada Anchorage Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(16, '0', '1', '2', 'Kakinada Seaports Limited', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(17, '0', '1', '2', 'Krishnapatnam Port Limited', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(18, '0', '1', '2', 'Ravva Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(19, '0', '2', '2', 'Andaman Nicobar Island Ports', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(20, '0', '3', '2', 'Panaji', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(21, '0', '4', '2', 'Alang', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(22, '0', '4', '2', 'Bedi', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(23, '0', '4', '2', 'Bedi Ebtsl Jetty', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(24, '0', '4', '2', 'Bedi Sikka', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(25, '0', '4', '2', 'Bhavnagar', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(26, '0', '4', '2', 'Dahej', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(27, '0', '4', '2', 'Jafrabad', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(28, '0', '4', '2', 'Jafrabad Gujarat Pipavav Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(29, '0', '4', '2', 'Magdalla', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(30, '0', '4', '2', 'Magdalla Adani Hazira Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(31, '0', '4', '2', 'Magdalla Hazira Port Pvt Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(32, '0', '4', '2', 'Mandvi Jakhau', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(33, '0', '4', '2', 'Mandvi Mundra', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(34, '0', '4', '2', 'Mandvi Mundra Port And Sez', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(35, '0', '4', '2', 'Navlakhi', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(36, '0', '4', '2', 'Okha', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(37, '0', '4', '2', 'Porbandar', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(38, '0', '4', '2', 'Veraval', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(39, '0', '5', '2', 'Honnavar', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(40, '0', '5', '2', 'Karwar', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(41, '0', '5', '2', 'Kundapur', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(42, '0', '5', '2', 'Malpe', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(43, '0', '5', '2', 'Old Mangalore', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(44, '0', '6', '2', 'Alappuzha', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(45, '0', '6', '2', 'Azhikkal', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(46, '0', '6', '2', 'Beypore', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(47, '0', '6', '2', 'Kollam', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(48, '0', '6', '2', 'Vizhinjam', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(49, '0', '7', '2', 'Bankot Infrastructure Logistic', '0', '0', '1', '0', 0, '2024-05-16 04:46:51', '2024-05-16 04:46:51'),
(50, '0', '7', '2', 'Belapur MMB Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(51, '0', '7', '2', 'Bhiwandi MMB Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(52, '0', '7', '2', 'Dabhol Konkan LNG', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(53, '0', '7', '2', 'Dahanu Adani Electricity', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(54, '0', '7', '2', 'Dharamtar JSW DPPl', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(55, '0', '7', '2', 'Dharamtar PNP Maritime Service', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(56, '0', '7', '2', 'Dighi Port Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(57, '0', '7', '2', 'Jaigad Angre Port Pvt Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(58, '0', '7', '2', 'Jaigad JSWJaigarh Port Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(59, '0', '7', '2', 'Karanja Terminal And Logistics', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(60, '0', '7', '2', 'Kelshi Ashapura Minechem Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(61, '0', '7', '2', 'Ratnagiri Finolex Industries', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(62, '0', '7', '2', 'Ratnagiri Ultratech Cement Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(63, '0', '7', '2', 'Redi Port Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(64, '0', '7', '2', 'Revdanda Indoenergy Internation', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(65, '0', '7', '2', 'Revdanda Jsw Steel Salav Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(66, '0', '7', '2', 'Trombay Mmb Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(67, '0', '7', '2', 'Ulwa Belapur Ambuja Cements', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(68, '0', '7', '2', 'Vasai MMB Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(69, '0', '7', '2', 'Vijaydurg MMB Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(70, '0', '7', '2', 'Yogayatan Ports Pvt Ltd', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(71, '0', '8', '2', 'Dhamara', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(72, '0', '8', '2', 'Gopalpur', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(73, '0', '9', '2', 'Karaikal Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(74, '0', '9', '2', 'MTF Of Chemplast Sanmar', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(75, '0', '9', '2', 'Pondicherry Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(76, '0', '10', '2', 'Cuddalore Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(77, '0', '10', '2', 'Ennore Minor Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(78, '0', '10', '2', 'Kattupalli Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(79, '0', '10', '2', 'Kudankulam', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(80, '0', '10', '2', 'Nagapattinam Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52'),
(81, '0', '10', '2', 'Tirukkadaiyur Port', '0', '0', '1', '0', 0, '2024-05-16 04:46:52', '2024-05-16 04:46:52');

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
(1, 'Major Port', 'majorport', '1', '0', 0, '2024-05-16 04:15:12', '2024-05-16 04:15:12'),
(2, 'Non Major Port', 'nonmajorport', '1', '0', 0, '2024-05-16 04:15:12', '2024-05-16 04:15:12');

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
(1, 'Superadmin', 'superadmin', '1', 'Super Admin', '1,2,3,4,5,6,7', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(2, 'Ministry Nodal Officer', 'ministrynodalofficer', '2', 'Ministry Nodal Officer (Admin I)', '0', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(3, 'State Maritime Board Nodal Officer', 'statemaritimeboardnodalofficer', '3', 'State Maritime Board Nodal Officer (Admin II)', '5,6', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(4, 'Port Nodal Officer', 'portnodalofficer', '4', 'Port Nodal Officer (Admin II)', '5,6', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(5, 'Port Manager', 'portmanager', '5', 'Port Manager ', '0', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(6, 'Data Entry Officer', 'dataentryofficer', '6', 'Data Entry Officer (User)', '0', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(7, 'NIC', 'nic', '7', 'NIC', '0', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41');

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
(1, '1', '1', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(2, '1', '2', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(3, '1', '3', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(4, '1', '4', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:41', '2024-05-13 04:23:41'),
(5, '1', '5', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(6, '1', '6', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(7, '1', '7', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(8, '1', '8', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(9, '1', '9', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(10, '1', '10', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(11, '1', '11', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(12, '1', '12', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(13, '1', '13', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(14, '1', '14', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(15, '1', '15', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(16, '1', '16', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(17, '1', '17', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(18, '1', '18', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(19, '1', '19', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(20, '1', '20', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(21, '1', '21', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(22, '1', '22', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(23, '1', '23', '1', '1', '1', '1', '1', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42');

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
(1, 'Andhra Pradesh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(2, 'Arunachal Pradesh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(3, 'Andaman and Nicobar Islands', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(4, 'Assam', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(5, 'Bihar', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(6, 'Chandigarh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(7, 'Chhattisgarh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(8, 'Dadar and Nagar Haveli', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(9, 'Daman and Diu', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(10, 'Delhi', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(11, 'Goa', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(12, 'Gujarat', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(13, 'Haryana', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(14, 'Himachal Pradesh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(15, 'Jammu Kashmir', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(16, 'Jharkhand', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(17, 'Karnataka', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(18, 'Kerala', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(19, 'Lakshadeep', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(20, 'Madhya Pradesh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(21, 'Maharashtra', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(22, 'Manipur', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(23, 'Meghalaya', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(24, 'Mizoram', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(25, 'Nagaland', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(26, 'Odisha', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(27, 'Pondicherry', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(28, 'Punjab', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(29, 'Rajasthan', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(30, 'Sikkim', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(31, 'Tamil Nadu', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(32, 'Telangana', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(33, 'Tripura', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(34, 'Uttaranchal', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(35, 'Uttar Pradesh', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(36, 'Uttarakhand', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(37, 'West Bengal', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42');

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
(1, '1', 'Directorate Of Port Govt Of AP', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(2, '3', 'Port Management Board A N', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(3, '11', 'Capt of Ports GOVT OF GOA', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(4, '12', 'Gujarat Maritime Board', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(5, '17', 'Directorate Of Ports Karnataka', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(6, '18', 'Director Of Ports Govt Kerala', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(7, '21', 'Maharashtra Maritime Board', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(8, '26', 'Directorate Of Ports Odisha', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(9, '27', 'Director of Ports Puducherry', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(10, '31', 'Tamil Nadu Maritime Board ', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(11, '9', 'UT AD Of Daman', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(12, '9', 'UT ADM Of Diu', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42'),
(13, '19', 'Director Port Lakshadeep', '0', '0', 0, '2024-05-13 04:23:42', '2024-05-13 04:23:42');

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
  `role_id` tinyint(4) NOT NULL DEFAULT 4,
  `dep_id` varchar(255) DEFAULT NULL,
  `report_to` text NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `extra_module` text NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Soft Deleted',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` text NOT NULL DEFAULT '0' COMMENT 'Create User ID',
  `updated_by` text NOT NULL DEFAULT '0' COMMENT 'Admin ID',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `state_id`, `port_type`, `state_board`, `port_id`, `role_id`, `dep_id`, `report_to`, `status`, `extra_module`, `email`, `username`, `is_deleted`, `email_verified_at`, `password`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '0', '0', '0', '0', 1, '1', '1', 1, '0', 'superadmin@gov.in', 'superadmin', 0, NULL, '$2y$10$DjqeahLhNADWlo7tFmQ84eyvv8A.PQA2kIO8W1wsJNnXHrsqiGY8W', '1', '0', NULL, '2024-05-16 13:02:29', '2024-05-16 13:02:29'),
(2, 'NIC Super Admin', '0', '0', '0', '0', 1, '1', '1', 1, '0', 'nic@gov.in', 'nic-superadmin', 0, NULL, '$2y$10$Y4eH4J3CIAbhGi2dfI3Z4O9zxVXE8/iEv46yBW47/mZ0iG4jsk3Sa', '1', '0', NULL, '2024-05-16 13:02:29', '2024-05-16 13:02:29'),
(3, 'Ministry Nodal Officer', '0', '1', '0', '1,2,3,4,5,6,7,8,9,10,11,12,13', 2, '2', '1', 1, '1,26', 'ministrynodalofficer@gov.in', 'ministrynodalofficer', 0, NULL, '$2y$10$e.Vu5ESj5PbJhhjfXKQH.OnwlSpALZ.lsARQuNKKG7iakYUiqHwTu', '1', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(4, 'Chennai Port Authority Port Nodal Officer', '0', '1', '0', '1', 4, '1', '3', 1, '3,4,5,15,16,17,18,19', 'cpa-pno@gov.in', 'cpa-pno', 0, NULL, '$2y$10$LP/xqKYLFoR3G7S1R6Gn.OQE6MGQAe2aEVaIM1QtRGadZEtgXmbEa', '1', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(5, 'Chennai Port Authority Port Manager', '0', '1', '0', '1', 5, '1', '4', 1, '15,16,17,18,19', 'cpa-pm@gov.in', 'cpa-pm', 0, NULL, '$2y$10$sjNo4QVO6W8RNzWU7teycOwFTAngQ76gktGh.vxsUSgxVNNNAvbZm', '3', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(6, 'Chennai Port Authority Data Entry Officer', '0', '1', '0', '1', 6, '1', '4', 1, '15,16,17,18,19', 'cpa-deo@gov.in', 'cpa-deo', 0, NULL, '$2y$10$D6uU87IcgQZ4RidWF62k3Os5rGpshDepHRBGp5t0Yrm2ZGMH/wdKS', '3', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(7, 'Cochin Port Authority Port Nodal Office', '0', '1', '0', '2', 4, '2', '3', 1, '1,3,4,5,15,16,17,18,19', 'cochinpa-pno@gov.in', 'cochinpa-pno', 0, NULL, '$2y$10$3u8BfxEQdh1JmdGZWHe9JeXKLM275ibPRvP5jcGB4dbtl.Kx9s4MC', '1', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(8, 'Cochin Port Authority Port Manager', '0', '1', '0', '2', 5, '2', '7', 1, '1,15,16,17,18,19', 'cochinpa-pm@gov.in', 'cochinpa-pm', 0, NULL, '$2y$10$KorCCb6.aQrMMep/Jq9fguHZeNiNm6f7vRPI95dZSUCy/ZNrMU672', '6', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(9, 'Cochin Port Authority Data Entry Officer', '0', '1', '0', '2', 6, '2', '7', 1, '1,15,16,17,18,19', 'cochinpa-deo@gov.in', 'cochinpa-deo', 0, NULL, '$2y$10$y9bOoVHn.y836NCR2PdTA.PgBcNMkP9zqyy2qZ9OwAItE5uj7Ta5K', '6', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(10, 'Deendayal Port Authority Port Nodal Officer', '0', '1', '0', '3', 4, '3', '3', 1, '1,3,4,5,15,16,17,18,19', 'dpa-pno@gov.in', 'dpa-pno', 0, NULL, '$2y$10$vzRuwioagabXYKwwNydG1ee4s9dWvtxHj1WT2BIO859.gYWax8uFi', '1', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(11, 'Deendayal Port Authority Port Manager', '0', '1', '0', '3', 5, '3', '10', 1, '1,15,16,17,18,19', 'dpa-pm@gov.in', 'dpa-pm', 0, NULL, '$2y$10$ZhlI57VQ6pKNF7f2UrIFzOPBikRADBARxBnocKOb5M2/Z/Ri9yZDC', '9', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(12, 'Deendayal Port Authority Data Entry Officer', '0', '1', '0', '3', 6, '3', '10', 1, '1,15,16,17,18,19', 'dpa-deo@gov.in', 'dpa-deo', 0, NULL, '$2y$10$OQ0aZF1gMqaQmPoU0eJdV.hRMJu./THg28GJuDtYXBYPl2/YSO.ve', '9', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(13, 'Haldia Dock Complex Port Nodal Officer', '0', '1', '0', '4', 4, '4', '3', 1, '1,3,4,5,15,16,17,18,19', 'hdc-pno@gov.in', 'hdc-pno', 0, NULL, '$2y$10$6EN6wA3i7.MSax2RHcpiNOPsr4ZkS/Ff4UkPDJynG3x54T98HFy.u', '1', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(14, 'Haldia Dock Complex Port Manager', '0', '1', '0', '4', 5, '4', '13', 1, '1,15,16,17,18,19', 'hdc-pm@gov.in', 'hdc-pm', 0, NULL, '$2y$10$JY7QCcwiCKALhDziqm0oYuZycsPpeUvkzEjvKfRGfQPtNpbfYp2jy', '12', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(15, 'Haldia Dock Complex Data Entry Officer', '0', '1', '0', '4', 6, '4', '1', 1, '1,15,16,17,18,19', 'hdc-deo@gov.in', 'hdc-deo', 0, NULL, '$2y$10$RieamOBkjPYi.MriV7Ps5uPpqp6IXAYiRAoxhLg1YMJ1taAjQDvX2', '12', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(16, 'Jawaharlal Nehru Port Authority Port Nodal Officer', '0', '1', '0', '5', 4, '5', '3', 1, '1,3,4,5,15,16,17,18,19', 'jnpa-pno@gov.in', 'jnpa-pno', 0, NULL, '$2y$10$Zr4USpVhWck/dAYG8zD0T.elD5OIAPeSz/uDhPy5pvSvCoqUFzL9C', '1', '0', NULL, '2024-05-16 13:02:30', '2024-05-16 13:02:30'),
(17, 'Jawaharlal Nehru Port Authority Port Manager', '0', '1', '0', '5', 5, '5', '16', 1, '1,15,16,17,18,19', 'jnpa-pm@gov.in', 'jnpa-pm', 0, NULL, '$2y$10$SANoWhoFCiVuj1CUzwf2AelLBkXU4CgSMZUTi17HncDo4zFjMdoye', '16', '0', NULL, '2024-05-16 13:02:31', '2024-05-16 13:02:31'),
(18, 'Jawaharlal Nehru Port Authority Data Entry Officer', '0', '1', '0', '5', 5, '5', '16', 1, '1,15,16,17,18,19', 'npa-deo@gov.in', 'npa-deo', 0, NULL, '$2y$10$h6M14SVuPAxST5suIw88ve3pW0CiTWmyizS0aTnkkwIGjwp51Uo8y', '16', '0', NULL, '2024-05-16 13:02:31', '2024-05-16 13:02:31'),
(19, 'Kamarajar Port Authority Port Nodal Officer', '0', '1', '0', '6', 4, '5', '3', 1, '1,3,4,5,15,16,17,18,19', 'kpa-pno@gov.in', 'kpa-pno', 0, NULL, '$2y$10$UNjwnpKLtGMRhDyiY4cF.O.cjDmiVuNWTlnm8SZCHlsg2BH8kCeHO', '1', '0', NULL, '2024-05-16 13:02:31', '2024-05-16 13:02:31'),
(20, 'Kamarajar Port Authority Port Manager', '0', '1', '0', '6', 5, '5', '19', 1, '1,15,16,17,18,19', 'kpa-pm@gov.in', 'kpa-pno', 0, NULL, '$2y$10$MshhfoC7H5Aw9kcbkFX8ZenDFmv3YbN4Ohdyi6mLQ8X8oe/wElfp.', '19', '0', NULL, '2024-05-16 13:02:31', '2024-05-16 13:02:31'),
(21, 'Kamarajar Port Authority Data Entry Officer', '0', '1', '0', '6', 6, '5', '19', 1, '1,15,16,17,18,19', 'kpa-deo@gov.in', 'kpa-deo', 0, NULL, '$2y$10$ujeSlwedJPI4CEY4mhRMfuIF5zi3PrMjXrmbJ.KOrkabv/a3OoZKy', '19', '0', NULL, '2024-05-16 13:02:31', '2024-05-16 13:02:31'),
(22, 'Mormugao Port Authority Port Nodal Officer', '0', '1', '0', '7', 4, '1', '3', 1, '1,3,4,5,15,16,17,18,19', 'mpa-pno@gov.in', 'mpa-pno', 0, NULL, '$2y$10$KCUi7RxUraWysDBagHji8ep7ofpJ1A6SABWF0ubbUSbfeDo.2NqhW', '1', '0', NULL, '2024-05-20 10:38:09', '2024-05-20 10:38:09'),
(23, 'Mormugao Port Authority Port Manager', '0', '1', '0', '7', 5, '1', '22', 1, '1,15,16,17,18,19', 'mpa-pm@gov.in', 'mpa-pm', 0, NULL, '$2y$10$TZpvWL3BM0ebsgrv23GJ2u/YTnL48gU7VtpUnzf9Gf0/Qg.Rll1M6', '22', '0', NULL, '2024-05-20 10:41:37', '2024-05-20 10:41:37'),
(24, 'Mormugao Port Authority Data Entry Officer', '0', '1', '0', '7', 6, '1', '22', 1, '1,15,16,17,18,19', 'mpa-deo@gov.in', 'mpa-deo', 0, NULL, '$2y$10$YbvMLnZOZWgalVYCN/h8Z.n3nQuWeY91Xp8kD52evZz4Ep.I1I2f2', '22', '0', NULL, '2024-05-20 10:42:24', '2024-05-20 10:42:24'),
(25, 'Mumbai Port Authority	Port Nodal Officer', '0', '1', '0', '8', 4, '2', '3', 1, '1,3,4,5,15,16,17,18,19', 'mumbaipa-pno@gov.in', 'mumbaipa-pno', 0, NULL, '$2y$10$.Ty2rrX4sDx/545SppG2qOiUipUDEp0Wg1xd7xlYXpkKh6RS.tjOi', '1', '0', NULL, '2024-05-20 10:44:37', '2024-05-20 10:44:37'),
(26, 'Mumbai Port Authority Port Manager', '0', '1', '0', '8', 5, '2', '25', 1, '1,15,16,17,18,19', 'mumbaipa-pm@gov.in', 'mumbaipa-pm', 0, NULL, '$2y$10$6r3i7hdroEaT1XuwrJoJG.s/VZgV3IsG2ERxGkkZoq1QWiviN.3k2', '25', '0', NULL, '2024-05-20 10:45:38', '2024-05-20 10:45:38'),
(27, 'Mumbai Port Authority Data Entry Officer', '0', '1', '0', '8', 6, '2', '25', 1, '1,15,16,17,18,19', 'mumbaipa-deo@gov.in', 'mumbaipa-deo', 0, NULL, '$2y$10$0.F5GjtLDtrLWD/Vc8sOAeGNLM4j8MiBQhPGUjM0aWwO4cOINI4bm', '25', '0', NULL, '2024-05-20 10:46:39', '2024-05-20 10:46:39'),
(28, 'New Mangalore Port Authority Port Nodal Officer', '0', '1', '0', '9', 4, '3', '3', 1, '1,3,4,5,15,16,17,18,19', 'nmpa-pno@gov.in', 'nmpa-pno', 0, NULL, '$2y$10$OWblsXG8oxv1bNKG3P73Eu3ghnRWfY.pu9J7/mzrqY9jrYF3Qv7wu', '1', '0', NULL, '2024-05-20 10:50:43', '2024-05-20 10:50:43'),
(29, 'New Mangalore Port Authority Port Manager', '0', '1', '0', '9', 5, '3', '28', 1, '1,15,16,17,18,19', 'nmpa-pm@gov.in', 'nmpa-pm', 0, NULL, '$2y$10$iCWzyZK3l65TVx.5.4vEa.Ed6ZeSxiGSjgCfxS6m0xHyliDhpiqHi', '28', '0', NULL, '2024-05-20 10:51:55', '2024-05-20 10:51:55'),
(30, 'New Mangalore Port Authority Data Entry Officer', '0', '1', '0', '9', 6, '3', '28', 1, '1,15,16,17,18,19', 'nmpa-deo@gov.in', 'nmpa-deo', 0, NULL, '$2y$10$Uq2AQe8SdoWjAA50AsWb4O8QhIyhFy6w0KEexheJXWueI/YQob2BW', '28', '0', NULL, '2024-05-20 10:53:50', '2024-05-20 10:53:50'),
(31, 'Paradip Port Authority	Port Nodal Officer', '0', '1', '0', '10', 4, '4', '3', 1, '1,3,4,5,15,16,17,18,19', 'ppa-pno@gov.in', 'ppa-pno', 0, NULL, '$2y$10$7PmyHnD6YSrgTwu8CUWLhu1B8i/UokVelCkw/B5of9fzLJydIsyee', '1', '0', NULL, '2024-05-20 10:54:48', '2024-05-20 10:54:48'),
(33, 'Paradip Port Authority Port Manager', '0', '1', '0', '10', 5, '4', '31', 1, '1,15,16,17,18,19', 'ppa-pm@gov.in', 'ppa-pm', 0, NULL, '$2y$10$y0oeRwSED5cJ5Ok2vlEzJ.PyVyWtDSgtT9TLDBmzSimZxgW113hRm', '31', '0', NULL, '2024-05-20 11:38:35', '2024-05-20 11:38:35'),
(34, 'Paradip Port Authority Data Entry Officer', '0', '1', '0', '10', 6, '4', '31', 1, '1,15,16,17,18,19', 'ppa-deo@gov.in', 'ppa-deo', 0, NULL, '$2y$10$n/OEE81AvrO7U5TN2aanruUz97RHFxZ.VTGqGEqSATzdlCM24bqp6', '31', '0', NULL, '2024-05-20 11:48:34', '2024-05-20 11:48:34'),
(35, 'Syama Prasad Mookerjee Kolkata Port Nodal Officer', '0', '1', '0', '11', 4, '5', '3', 1, '1,3,4,5,15,16,17,18,19', 'spmk-pno@gov.in', 'spmk-pno', 0, NULL, '$2y$10$EJkD19DKFanfWjQAqy/gh.C26LGhz9iaTtJHZY.auqMpWc5oVHHKu', '1', '0', NULL, '2024-05-20 11:59:45', '2024-05-20 11:59:45'),
(36, 'Syama Prasad Mookerjee Kolkata Port Manager', '0', '1', '0', '11', 5, '5', '35', 1, '1,15,16,17,18,19', 'spmk-pm@gov.in', 'spmk-pm', 0, NULL, '$2y$10$rEhqpsRzRkok5GRSs4s/hu.zpa4hF8x6Hg.YBCbitQM0abt/T8reG', '35', '35', NULL, '2024-05-20 12:00:39', '2024-05-20 12:00:59'),
(37, 'Syama Prasad Mookerjee Kolkata Data Entry Officer', '0', '1', '0', '11', 6, '5', '35', 1, '1,15,16,17,18,19', 'spmk-deo@gov.in', 'spmk-deo', 0, NULL, '$2y$10$QJs1sh9OVoSvEWo5oIGeeejc1NjDFhR0hhWUP5QZri3/4OvTDE.IC', '35', '0', NULL, '2024-05-20 12:01:58', '2024-05-20 12:01:58'),
(38, 'V O Chidambaranar Port Authority Port Nodal Officer', '0', '1', '0', '12', 4, '5', '3', 1, '1,3,4,5,15,16,17,18,19', 'vocpa-pno@gov.in', 'vocpa-pno', 0, NULL, '$2y$10$kZcNuKgQlnOfMxUQc/3CNe9ASIkajD.MXGmxyalzda1LuY3xROiaC', '1', '0', NULL, '2024-05-20 12:04:01', '2024-05-20 12:04:01'),
(39, 'V O Chidambaranar Port Authority Port Manager', '0', '1', '0', '12', 5, '5', '38', 1, '1,15,16,17,18,19', 'vocpa-pm@gov.in', 'vocpa-pm', 0, NULL, '$2y$10$Mzl5WxBbotjtMPRtrkj2A.1K/4/SWnMq2i44iGh73f.NUHG1L5SFe', '38', '0', NULL, '2024-05-20 12:04:52', '2024-05-20 12:04:52'),
(40, 'V O Chidambaranar Port Authority Data Entry Officer', '0', '1', '0', '12', 6, '5', '38', 1, '1,15,16,17,18,19', 'vocpa-deo@gov.in', 'vocpa-deo', 0, NULL, '$2y$10$CE5JqbxYrfS8s7rO5JzqTuVTyJAuY086t8oHfHQSWtH3jyOyqbjw.', '38', '0', NULL, '2024-05-20 12:05:35', '2024-05-20 12:05:35'),
(41, 'Visakhapatnam Port Authority	Port Nodal Officer', '0', '1', '0', '13', 4, '1', '3', 1, '1,3,4,5,15,16,17,18,19', 'vpa-pno@gov.in', 'vpa-pno', 0, NULL, '$2y$10$Q1Ap4hRmlPOz.rxKLAyxsec70hHkGVw8p9bCxzFXnoPgrdWmiQGNG', '1', '0', NULL, '2024-05-20 12:06:34', '2024-05-20 12:06:34'),
(42, 'Visakhapatnam Port Authority Port Manager', '0', '1', '0', '13', 5, '1', '41', 1, '1,15,16,17,18,19', 'vpa-pm@gov.in', 'vpa-pm', 0, NULL, '$2y$10$Op9DkXq6sjaRh4NDzbLRC.ZbeR5CaXSTxfOt1I/BPVCdGmVnc71La', '41', '0', NULL, '2024-05-20 12:07:23', '2024-05-20 12:07:23'),
(43, 'Visakhapatnam Port Authority Data Entry Officer', '0', '1', '0', '13', 6, '1', '41', 1, '1,15,16,17,18,19', 'vpa-deo@gov.in', 'vpa-deo', 0, NULL, '$2y$10$ZUcouxBfN7BZeF3q4ZxtGuiflUV/S1q2pLQhpBEQCQ3WxgrEXqM0i', '41', '0', NULL, '2024-05-20 12:08:20', '2024-05-20 12:08:20'),
(44, 'IWAI', '0', '0', '0', '0', 4, '1', '3', 1, '1,21', 'iwai@gov.in', 'iwai', 0, NULL, '$2y$10$ymRHjoVbdO5sRwSOupVN8uImPk31Xzel1b24RFq/dL1OXUm.ydSfm', '1', '0', NULL, '2024-05-20 12:14:23', '2024-05-20 12:14:23'),
(45, 'DG Shipping', '0', '0', '0', '0', 4, '2', '3', 1, '1,22,23', 'dg-shipping@gov.in', 'dg-shipping', 0, NULL, '$2y$10$khhVjRK.Nkw3CSL6o9htwui.iK.D5OLka0eopfPIINJApt0U084rm', '1', '0', NULL, '2024-05-20 12:15:51', '2024-05-20 12:15:51');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_n_m_port_capacities`
--
ALTER TABLE `m_n_m_port_capacities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `national_waterways_information`
--
ALTER TABLE `national_waterways_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `port_categories`
--
ALTER TABLE `port_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
