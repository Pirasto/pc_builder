-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Sty 2023, 22:43
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `project_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `user_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `build`
--

CREATE TABLE `build` (
  `id_build` int(11) NOT NULL,
  `build_name` varchar(45) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `case_id_case` int(11) DEFAULT NULL,
  `cpu_id_cpu` int(11) DEFAULT NULL,
  `motherboard_id_motherboard` int(11) DEFAULT NULL,
  `psu_id_psu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `build`
--

INSERT INTO `build` (`id_build`, `build_name`, `user_id_user`, `case_id_case`, `cpu_id_cpu`, `motherboard_id_motherboard`, `psu_id_psu`) VALUES
(1, 'New  build', 6, NULL, NULL, NULL, NULL),
(2, 'New  build', 6, NULL, NULL, NULL, NULL),
(3, 'New  build', 6, NULL, NULL, NULL, NULL),
(4, 'New vitya1337 build', 6, NULL, NULL, NULL, NULL),
(5, 'New admin_pirasto build', 1, NULL, NULL, NULL, NULL),
(6, 'New admin_pirasto build', 1, NULL, NULL, NULL, NULL),
(7, 'New admin_pirasto build', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `build_expansion_card`
--

CREATE TABLE `build_expansion_card` (
  `id_build_expansion_card` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `expansion_card_id_expansion_card` int(11) NOT NULL,
  `build_id_build` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `build_gpu`
--

CREATE TABLE `build_gpu` (
  `id_build_gpu` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `gpu_id_gpu` int(11) DEFAULT NULL,
  `build_id_build` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `build_ram`
--

CREATE TABLE `build_ram` (
  `id_build_ram` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ram_id_ram` int(11) NOT NULL,
  `build_id_build` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `build_storage`
--

CREATE TABLE `build_storage` (
  `id_build_storage` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `storage_id_storage` int(11) DEFAULT NULL,
  `build_id_build` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `case`
--

CREATE TABLE `case` (
  `id_case` int(11) NOT NULL,
  `case_name` varchar(45) NOT NULL,
  `case_price` decimal(6,2) NOT NULL,
  `motherboard_form_factor_id_motherboard_form_factor` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cpu`
--

CREATE TABLE `cpu` (
  `id_cpu` int(11) NOT NULL,
  `cpu_name` varchar(45) NOT NULL,
  `cpu_price` decimal(6,2) NOT NULL,
  `cpu_clock_speed` int(11) NOT NULL,
  `cpu_core_count` int(11) NOT NULL,
  `cpu_thread_count` int(11) NOT NULL,
  `cpu_tdp_wattage` int(11) NOT NULL,
  `cpu_integrated_graphics` varchar(45) DEFAULT NULL,
  `cpu_series` varchar(45) NOT NULL,
  `cpu_max_supported_ram` int(11) NOT NULL,
  `cpu_litography` int(11) NOT NULL,
  `socket_id_socket` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `cpu`
--

INSERT INTO `cpu` (`id_cpu`, `cpu_name`, `cpu_price`, `cpu_clock_speed`, `cpu_core_count`, `cpu_thread_count`, `cpu_tdp_wattage`, `cpu_integrated_graphics`, `cpu_series`, `cpu_max_supported_ram`, `cpu_litography`, `socket_id_socket`, `manufacturer_id_manufacturer`) VALUES
(1, 'Ryzen 9 7950X', '577.98', 4500, 16, 32, 170, 'Radeon', 'Ryzen 9', 128, 5, 23, 1),
(2, 'Ryzen 5 7600X', '245.99', 4700, 6, 12, 105, NULL, 'Ryzen 5', 128, 5, 23, 1),
(3, 'Core i5-9400F', '149.44', 2900, 6, 12, 65, NULL, 'Core i5', 128, 14, 24, 2),
(4, 'Core i7-8700K', '340.00', 3700, 6, 12, 95, 'Intel UHD Graphics 630', 'Core i7', 128, 14, 24, 2),
(5, 'Core i9-9900K', '595.00', 3600, 8, 16, 95, 'Intel UHD Graphics 630', 'Core i9', 128, 14, 24, 2),
(6, 'Core i7-11700K', '287.43', 3600, 8, 16, 125, 'Intel UHD Graphics 750', 'Core i7', 128, 14, 25, 2),
(7, 'Core i5-11400F', '135.93', 2600, 6, 12, 65, NULL, 'Core i5', 128, 14, 25, 2),
(8, 'Core i3-10100F', '74.97', 3600, 4, 8, 65, NULL, 'Core i3', 128, 14, 25, 2),
(9, 'Core i5-12400F', '164.95', 2500, 6, 12, 65, NULL, 'Core i5', 128, 10, 26, 2),
(10, 'Core i7-12700K', '298.89', 3600, 12, 24, 125, 'Intel UHD Graphics 770', 'Core i7', 128, 10, 26, 2),
(11, 'Core i9-13900K', '609.99', 3000, 24, 48, 125, 'Intel UHD Graphics 770', 'Core i9', 128, 10, 26, 2),
(12, 'Ryzen 5 5600X', '167.00', 3700, 6, 12, 65, NULL, 'Ryzen 5', 128, 7, 22, 1),
(13, 'Ryzen 7 5800X', '235.97', 3800, 8, 16, 105, NULL, 'Ryzen 7', 128, 7, 22, 1),
(14, 'Ryzen 9 5900X', '333.21', 3700, 12, 24, 105, NULL, 'Ryzen 9', 128, 7, 22, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ddr`
--

CREATE TABLE `ddr` (
  `id_ddr` int(11) NOT NULL,
  `ddr_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ddr`
--

INSERT INTO `ddr` (`id_ddr`, `ddr_type`) VALUES
(1, 'DDR3'),
(2, 'DDR4'),
(3, 'DDR5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expansion_card`
--

CREATE TABLE `expansion_card` (
  `id_expansion_card` int(11) NOT NULL,
  `expansion_card_name` varchar(45) NOT NULL,
  `expansion_card_price` decimal(6,2) NOT NULL,
  `pci_line_id_pci_line` int(11) NOT NULL,
  `expansion_card_type_id_expansion_card_type` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL,
  `psu_connectors_id_psu_connectors` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `expansion_card`
--

INSERT INTO `expansion_card` (`id_expansion_card`, `expansion_card_name`, `expansion_card_price`, `pci_line_id_pci_line`, `expansion_card_type_id_expansion_card_type`, `manufacturer_id_manufacturer`, `psu_connectors_id_psu_connectors`) VALUES
(1, 'Sound Blaster AE-9 32-bit 384 kHz', '332.49', 1, 1, 11, NULL),
(2, 'Sound BlasterX AE-5 Plus 32-bit 384 kHz', '149.99', 1, 1, 11, NULL),
(3, 'TG-3468 Gigabit Ethernet', '14.99', 1, 2, 12, NULL),
(4, 'XG-C100C 10 Gb/s Ethernet', '92.99', 1, 2, 13, NULL),
(5, 'Archer TX50E 802.11a/b/g/n/ac/ax', '49.99', 1, 3, 12, NULL),
(6, 'GC-WBAX200 802.11a/b/g/n/ac/ax', '39.99', 1, 3, 14, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expansion_card_type`
--

CREATE TABLE `expansion_card_type` (
  `id_expansion_card_type` int(11) NOT NULL,
  `expansion_card_type_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `expansion_card_type`
--

INSERT INTO `expansion_card_type` (`id_expansion_card_type`, `expansion_card_type_name`) VALUES
(1, 'Sound Card'),
(2, 'Wired Network Adapter'),
(3, 'Wireless Network Adapter');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu`
--

CREATE TABLE `gpu` (
  `id_gpu` int(11) NOT NULL,
  `gpu_name` varchar(45) NOT NULL,
  `gpu_price` decimal(6,2) NOT NULL,
  `gpu_chipset` varchar(45) NOT NULL,
  `gpu_memory_amount` int(11) NOT NULL,
  `gpu_core_clock` int(11) NOT NULL,
  `gpu_boost_clock` int(11) NOT NULL,
  `gpu_sli_crossfire` tinyint(4) NOT NULL,
  `gpu_tdp_wattage` int(11) NOT NULL,
  `gpu_dvi_ports` int(11) DEFAULT NULL,
  `gpu_hdmi_ports` int(11) DEFAULT NULL,
  `gpu_display_ports` int(11) DEFAULT NULL,
  `gpu_mem_type_id_gpu_mem_type` int(11) NOT NULL,
  `pci_line_id_pci_line` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gpu`
--

INSERT INTO `gpu` (`id_gpu`, `gpu_name`, `gpu_price`, `gpu_chipset`, `gpu_memory_amount`, `gpu_core_clock`, `gpu_boost_clock`, `gpu_sli_crossfire`, `gpu_tdp_wattage`, `gpu_dvi_ports`, `gpu_hdmi_ports`, `gpu_display_ports`, `gpu_mem_type_id_gpu_mem_type`, `pci_line_id_pci_line`) VALUES
(1, 'GeForce RTX 3060 Ventus 2X', '369.99', 'GeForce RTX 3060 12GB', 12, 1320, 1777, 0, 170, NULL, 1, 3, 1, 2),
(2, 'Radeon RX6700XT CLD', '359.99', 'Radeon RX 6700 XT', 12, 2321, 2581, 0, 230, NULL, 1, 3, 1, 2),
(3, 'TUF GAMING OC GeForce RTX 4090', '1799.99', 'GeForce RTX 4090', 24, 2235, 2595, 0, 450, NULL, 2, 3, 2, 2),
(4, 'GeForce RTX 3060 Gaming X12G', '389.99', 'GeForce RTX 3060 12GB', 12, 1320, 1837, 0, 170, NULL, 1, 3, 1, 2),
(5, 'ROG STRIX GAMING OC GeForce RTX 4090', '1999.99', 'GeForce RTX 4090', 24, 2235, 2640, 0, 450, NULL, 2, 3, 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu_manufacturer`
--

CREATE TABLE `gpu_manufacturer` (
  `id_gpu_manufacturer` int(11) NOT NULL,
  `gpu_id_gpu` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gpu_manufacturer`
--

INSERT INTO `gpu_manufacturer` (`id_gpu_manufacturer`, `gpu_id_gpu`, `manufacturer_id_manufacturer`) VALUES
(1, 1, 15),
(2, 1, 17),
(3, 2, 16),
(4, 2, 1),
(5, 3, 17),
(6, 3, 13),
(7, 4, 15),
(8, 4, 17),
(9, 5, 13),
(10, 5, 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu_mem_type`
--

CREATE TABLE `gpu_mem_type` (
  `id_gpu_mem_type` int(11) NOT NULL,
  `gpu_mem_type_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gpu_mem_type`
--

INSERT INTO `gpu_mem_type` (`id_gpu_mem_type`, `gpu_mem_type_name`) VALUES
(1, 'GDDR6'),
(2, 'GDDR6X');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id_manufacturer` int(11) NOT NULL,
  `manufacturer_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `manufacturer`
--

INSERT INTO `manufacturer` (`id_manufacturer`, `manufacturer_name`) VALUES
(1, 'AMD'),
(2, 'Intel'),
(3, 'Corsair'),
(4, 'G.Skill'),
(5, 'EVGA'),
(6, 'Seagate'),
(7, 'Western Digital'),
(8, 'Samsung'),
(9, 'Kingston'),
(10, 'Micron'),
(11, 'Creative Labs'),
(12, 'TP-Link'),
(13, 'Asus'),
(14, 'Gigabyte'),
(15, 'MSI'),
(16, 'ASRock'),
(17, 'Nvidia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `motherboard`
--

CREATE TABLE `motherboard` (
  `id_motherboard` int(11) NOT NULL,
  `motherboard_name` varchar(45) NOT NULL,
  `motherboard_price` decimal(6,2) NOT NULL,
  `motherboard_chipset` varchar(45) NOT NULL,
  `motherboard_max_ram_capacity` int(11) NOT NULL,
  `motherboard_ram_slots` int(11) NOT NULL,
  `motherboard_sli_crossfire` tinyint(4) NOT NULL,
  `motherboard_lan` varchar(45) DEFAULT NULL,
  `motherboard_wlan` varchar(45) DEFAULT NULL,
  `motherboard_raid_support` tinyint(4) NOT NULL,
  `motherboard_cpu_slots` int(11) NOT NULL,
  `socket_id_socket` int(11) NOT NULL,
  `motherboard_form_factor_id_motherboard_form_factor` int(11) NOT NULL,
  `ddr_id_ddr` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `motherboard`
--

INSERT INTO `motherboard` (`id_motherboard`, `motherboard_name`, `motherboard_price`, `motherboard_chipset`, `motherboard_max_ram_capacity`, `motherboard_ram_slots`, `motherboard_sli_crossfire`, `motherboard_lan`, `motherboard_wlan`, `motherboard_raid_support`, `motherboard_cpu_slots`, `socket_id_socket`, `motherboard_form_factor_id_motherboard_form_factor`, `ddr_id_ddr`, `manufacturer_id_manufacturer`) VALUES
(1, 'B650 AORUS ELITE AX', '229.99', 'AMD B650', 128, 4, 0, '1 x 2.5 Gb/s (Realtek)', NULL, 1, 1, 23, 1, 3, 14),
(2, 'ROG STRIX X670E-E GAMING WIFI', '499.99', 'AMD X670E', 128, 4, 0, '1 x 2.5 Gb/s (Intel)', 'Wi-Fi 6E', 1, 1, 23, 1, 3, 13),
(3, 'H310CM-DVS', '69.47', 'Intel H310', 32, 2, 0, '1 x 1 Gb/s', NULL, 0, 1, 24, 5, 2, 16),
(4, 'PRIME Z390-A', '179.99', 'Intel Z390', 128, 4, 0, '1 x 1 Gb/s', NULL, 1, 1, 24, 1, 2, 13),
(5, 'TUF GAMING X570-PLUS (WI-FI)', '209.99', 'AMD X570', 128, 4, 1, '1 x 1 Gb/s (Realtek L8200A)', 'Wi-Fi 5', 1, 1, 22, 1, 2, 13),
(6, 'B550-A PRO', '139.99', 'AMD B550', 128, 4, 1, '1 x 1 Gb/s', NULL, 1, 1, 22, 1, 2, 15),
(7, 'MAG Z490 TOMAHAWK', '139.99', 'Intel Z490', 128, 4, 1, '1 x 1 Gb/s, 1 x 2.5 Gb/s', NULL, 1, 1, 25, 1, 2, 15),
(8, 'Z590 Pro4', '79.99', 'Intel Z590', 128, 4, 1, '1 x 2.5 Gb/s', NULL, 1, 1, 25, 1, 2, 16),
(9, 'B660M DS3H', '109.99', 'Intel B660', 128, 4, 0, '1 x 2.5 Gb/s (Realtek)', NULL, 1, 1, 26, 5, 2, 14),
(10, 'ROG STRIX B660-I GAMING WIFI', '199.99', 'Intel B660', 64, 2, 0, '1 x 2.5 Gb/s (Intel I225-V)', 'Wi-Fi 6', 1, 1, 26, 6, 3, 13),
(11, 'B660 TOMAHAWK WIFI', '189.99', 'Intel B660', 128, 4, 1, '1 x 2.5 Gb/s (Realtek RTL8125B-CG)', 'Wi-Fi 6', 1, 1, 26, 1, 2, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `motherboard_form_factor`
--

CREATE TABLE `motherboard_form_factor` (
  `id_motherboard_form_factor` int(11) NOT NULL,
  `motherboard_form_factor_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `motherboard_form_factor`
--

INSERT INTO `motherboard_form_factor` (`id_motherboard_form_factor`, `motherboard_form_factor_name`) VALUES
(1, 'ATX'),
(2, 'EATX'),
(3, 'Flex ATX'),
(4, 'HPTX'),
(5, 'Micro ATX'),
(6, 'Mini ITX'),
(7, 'Thin Mini ITX'),
(8, 'Mini DTX'),
(9, 'SSI CEB'),
(10, 'SSI EEB'),
(11, 'XL ATX');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pci_line`
--

CREATE TABLE `pci_line` (
  `id_pci_line` int(11) NOT NULL,
  `pci_line_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pci_line`
--

INSERT INTO `pci_line` (`id_pci_line`, `pci_line_name`) VALUES
(1, 'PCIe x1'),
(2, 'PCIe x16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `psu`
--

CREATE TABLE `psu` (
  `id_psu` int(11) NOT NULL,
  `psu_name` varchar(45) NOT NULL,
  `psu_price` decimal(6,2) NOT NULL,
  `psu_wattage` int(11) NOT NULL,
  `psu_modular` tinyint(4) NOT NULL,
  `psu_rating_id_psu_rating` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `psu`
--

INSERT INTO `psu` (`id_psu`, `psu_name`, `psu_price`, `psu_wattage`, `psu_modular`, `psu_rating_id_psu_rating`, `manufacturer_id_manufacturer`) VALUES
(1, 'RM850x (2021)', '134.99', 850, 1, 3, 3),
(2, 'SuperNOVA 650 GT', '89.00', 650, 1, 3, 5),
(3, 'HX1200 Platinum', '279.00', 1200, 1, 2, 3),
(4, 'RM1000x (2021)', '189.95', 1000, 1, 3, 3),
(5, 'RM750x (2021)', '129.99', 750, 1, 3, 3),
(6, 'SuperNOVA 750 GT', '109.99', 750, 1, 3, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `psu_connector`
--

CREATE TABLE `psu_connector` (
  `id_psu_connector` int(11) NOT NULL,
  `psu_connector_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `psu_connectors`
--

CREATE TABLE `psu_connectors` (
  `id_psu_connectors` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `psu_connector_id_psu_connector` int(11) NOT NULL,
  `psu_id_psu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `psu_rating`
--

CREATE TABLE `psu_rating` (
  `id_psu_rating` int(11) NOT NULL,
  `psu_rating_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `psu_rating`
--

INSERT INTO `psu_rating` (`id_psu_rating`, `psu_rating_name`) VALUES
(1, '80+ Titanium'),
(2, '80+ Platinum'),
(3, '80+ Gold'),
(4, '80+ Silver'),
(5, '80+ Bronze'),
(6, '80+');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ram`
--

CREATE TABLE `ram` (
  `id_ram` int(11) NOT NULL,
  `ram_name` varchar(45) NOT NULL,
  `ram_price` decimal(6,2) NOT NULL,
  `ram_capacity` int(11) NOT NULL,
  `ram_clock_speed` int(11) NOT NULL,
  `ram_latency` decimal(5,3) NOT NULL,
  `ram_timing` varchar(45) NOT NULL,
  `ram_voltage` decimal(4,2) NOT NULL,
  `ddr_id_ddr` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ram`
--

INSERT INTO `ram` (`id_ram`, `ram_name`, `ram_price`, `ram_capacity`, `ram_clock_speed`, `ram_latency`, `ram_timing`, `ram_voltage`, `ddr_id_ddr`, `manufacturer_id_manufacturer`) VALUES
(1, 'Vengeance LPX', '24.99', 8, 3200, '10.000', '16-18-18-36', '1.35', 2, 3),
(2, 'Vengeance RGB Pro', '57.49', 16, 3600, '10.000', '18-22-22-42', '1.35', 2, 3),
(3, 'Vengeance RGB Pro', '33.49', 8, 3200, '10.000', '16-18-18-36', '1.35', 2, 3),
(4, 'Vengeance LPX', '41.49', 16, 3600, '10.000', '18-22-22-42', '1.35', 2, 3),
(5, 'Vengeance', '69.99', 16, 5600, '12.857', '36-36-36-76', '1.25', 3, 3),
(6, 'Trident Z5 RGB', '16.00', 80, 6000, '12.000', '36-36-36-96', '1.35', 3, 4),
(7, 'Ripjaws V', '39.99', 16, 3200, '10.000', '16-18-18-38', '1.35', 2, 4),
(8, 'Vengeance LPX', '26.99', 8, 3600, '10.000', '18-22-22-42', '1.35', 2, 3),
(9, 'Vengeance RGB Pro SL', '52.49', 16, 3600, '10.000', '18-22-22-42', '1.35', 2, 3),
(10, 'Trident Z5 RGB', '99.99', 16, 6400, '10.000', '32-39-39-102', '1.40', 3, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `socket`
--

CREATE TABLE `socket` (
  `id_socket` int(11) NOT NULL,
  `socket_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `socket`
--

INSERT INTO `socket` (`id_socket`, `socket_name`) VALUES
(22, 'AM4'),
(23, 'AM5'),
(24, 'LGA1151'),
(25, 'LGA1200'),
(26, 'LGA1700');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `storage`
--

CREATE TABLE `storage` (
  `id_storage` int(11) NOT NULL,
  `storage_name` varchar(45) NOT NULL,
  `storage_price` decimal(6,2) NOT NULL,
  `storage_capacity` int(11) NOT NULL,
  `storage_rpm` int(11) DEFAULT NULL,
  `storage_type_id_storage_type` int(11) NOT NULL,
  `storage_form_factor_id_storage_form_factor` int(11) NOT NULL,
  `manufacturer_id_manufacturer` int(11) NOT NULL,
  `psu_connectors_id_psu_connectors` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `storage`
--

INSERT INTO `storage` (`id_storage`, `storage_name`, `storage_price`, `storage_capacity`, `storage_rpm`, `storage_type_id_storage_type`, `storage_form_factor_id_storage_form_factor`, `manufacturer_id_manufacturer`, `psu_connectors_id_psu_connectors`) VALUES
(1, 'Barracuda Compute', '2048.00', 2048, 7200, 4, 1, 6, NULL),
(2, 'Caviar Blue', '39.99', 1024, 7200, 4, 1, 7, NULL),
(3, '870 Evo', '89.99', 1024, NULL, 1, 2, 8, NULL),
(4, 'A400', '17.98', 240, NULL, 1, 2, 9, NULL),
(5, '970 Evo Plus', '99.99', 1024, NULL, 1, 4, 8, NULL),
(6, 'NV2', '50.99', 1024, NULL, 1, 4, 9, NULL),
(7, '980 Pro', '179.99', 2048, NULL, 1, 4, 8, NULL),
(8, '7400 PRO', '730.99', 3840, NULL, 1, 5, 10, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `storage_form_factor`
--

CREATE TABLE `storage_form_factor` (
  `id_storage_form_factor` int(11) NOT NULL,
  `storage_form_factor_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `storage_form_factor`
--

INSERT INTO `storage_form_factor` (`id_storage_form_factor`, `storage_form_factor_name`) VALUES
(1, '3.5\"'),
(2, '2.5\"'),
(3, 'PCIe'),
(4, 'M.2-2280'),
(5, 'M.2-22110');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `storage_type`
--

CREATE TABLE `storage_type` (
  `id_storage_type` int(11) NOT NULL,
  `storage_type_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `storage_type`
--

INSERT INTO `storage_type` (`id_storage_type`, `storage_type_name`) VALUES
(1, 'SSD'),
(2, '5400 RPM'),
(3, '5900 RPM'),
(4, '7200 RPM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_surname` varchar(45) DEFAULT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_surname`, `login`, `email`, `password`) VALUES
(1, 'Pirasto', NULL, 'admin_pirasto', 'nexus7nik@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(6, 'vitya1337', NULL, 'vitya1337', 'vitya@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_admin_user` (`user_id_user`);

--
-- Indeksy dla tabeli `build`
--
ALTER TABLE `build`
  ADD PRIMARY KEY (`id_build`),
  ADD KEY `fk_build_user1` (`user_id_user`),
  ADD KEY `fk_build_case1` (`case_id_case`),
  ADD KEY `fk_build_cpu1` (`cpu_id_cpu`),
  ADD KEY `fk_build_motherboard1` (`motherboard_id_motherboard`),
  ADD KEY `fk_build_psu1` (`psu_id_psu`);

--
-- Indeksy dla tabeli `build_expansion_card`
--
ALTER TABLE `build_expansion_card`
  ADD PRIMARY KEY (`id_build_expansion_card`),
  ADD KEY `fk_build_expansion_card_expansion_card1` (`expansion_card_id_expansion_card`),
  ADD KEY `fk_build_expansion_card_build1` (`build_id_build`);

--
-- Indeksy dla tabeli `build_gpu`
--
ALTER TABLE `build_gpu`
  ADD PRIMARY KEY (`id_build_gpu`),
  ADD KEY `fk_build_gpu_gpu1` (`gpu_id_gpu`),
  ADD KEY `fk_build_gpu_build1` (`build_id_build`);

--
-- Indeksy dla tabeli `build_ram`
--
ALTER TABLE `build_ram`
  ADD PRIMARY KEY (`id_build_ram`),
  ADD KEY `fk_build_ram_ram1` (`ram_id_ram`),
  ADD KEY `fk_build_ram_build1` (`build_id_build`);

--
-- Indeksy dla tabeli `build_storage`
--
ALTER TABLE `build_storage`
  ADD PRIMARY KEY (`id_build_storage`),
  ADD KEY `fk_build_storage_storage1` (`storage_id_storage`),
  ADD KEY `fk_build_storage_build1` (`build_id_build`);

--
-- Indeksy dla tabeli `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id_case`),
  ADD KEY `fk_case_motherboard_form_factor1` (`motherboard_form_factor_id_motherboard_form_factor`),
  ADD KEY `fk_case_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id_cpu`),
  ADD KEY `fk_cpu_socket1` (`socket_id_socket`),
  ADD KEY `fk_cpu_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `ddr`
--
ALTER TABLE `ddr`
  ADD PRIMARY KEY (`id_ddr`);

--
-- Indeksy dla tabeli `expansion_card`
--
ALTER TABLE `expansion_card`
  ADD PRIMARY KEY (`id_expansion_card`),
  ADD KEY `fk_expansion_card_pci_line1` (`pci_line_id_pci_line`),
  ADD KEY `fk_expansion_card_expansion_card_type1` (`expansion_card_type_id_expansion_card_type`),
  ADD KEY `fk_expansion_card_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `expansion_card_type`
--
ALTER TABLE `expansion_card_type`
  ADD PRIMARY KEY (`id_expansion_card_type`);

--
-- Indeksy dla tabeli `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id_gpu`),
  ADD KEY `fk_gpu_gpu_mem_type1` (`gpu_mem_type_id_gpu_mem_type`),
  ADD KEY `fk_gpu_pci_line1` (`pci_line_id_pci_line`);

--
-- Indeksy dla tabeli `gpu_manufacturer`
--
ALTER TABLE `gpu_manufacturer`
  ADD PRIMARY KEY (`id_gpu_manufacturer`),
  ADD KEY `fk_gpu_manufacturer_gpu1` (`gpu_id_gpu`),
  ADD KEY `fk_gpu_manufacturer_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `gpu_mem_type`
--
ALTER TABLE `gpu_mem_type`
  ADD PRIMARY KEY (`id_gpu_mem_type`);

--
-- Indeksy dla tabeli `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id_manufacturer`);

--
-- Indeksy dla tabeli `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id_motherboard`),
  ADD KEY `fk_motherboard_socket1` (`socket_id_socket`),
  ADD KEY `fk_motherboard_motherboard_form_factor1` (`motherboard_form_factor_id_motherboard_form_factor`),
  ADD KEY `fk_motherboard_ddr1` (`ddr_id_ddr`),
  ADD KEY `fk_motherboard_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `motherboard_form_factor`
--
ALTER TABLE `motherboard_form_factor`
  ADD PRIMARY KEY (`id_motherboard_form_factor`);

--
-- Indeksy dla tabeli `pci_line`
--
ALTER TABLE `pci_line`
  ADD PRIMARY KEY (`id_pci_line`);

--
-- Indeksy dla tabeli `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`id_psu`),
  ADD KEY `fk_psu_psu_rating1` (`psu_rating_id_psu_rating`),
  ADD KEY `fk_psu_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `psu_connector`
--
ALTER TABLE `psu_connector`
  ADD PRIMARY KEY (`id_psu_connector`);

--
-- Indeksy dla tabeli `psu_connectors`
--
ALTER TABLE `psu_connectors`
  ADD PRIMARY KEY (`id_psu_connectors`);

--
-- Indeksy dla tabeli `psu_rating`
--
ALTER TABLE `psu_rating`
  ADD PRIMARY KEY (`id_psu_rating`);

--
-- Indeksy dla tabeli `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id_ram`),
  ADD KEY `fk_ram_ddr1` (`ddr_id_ddr`),
  ADD KEY `fk_ram_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `socket`
--
ALTER TABLE `socket`
  ADD PRIMARY KEY (`id_socket`);

--
-- Indeksy dla tabeli `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id_storage`),
  ADD KEY `fk_storage_storage_type1` (`storage_type_id_storage_type`),
  ADD KEY `fk_storage_storage_form_factor1` (`storage_form_factor_id_storage_form_factor`),
  ADD KEY `fk_storage_manufacturer1` (`manufacturer_id_manufacturer`);

--
-- Indeksy dla tabeli `storage_form_factor`
--
ALTER TABLE `storage_form_factor`
  ADD PRIMARY KEY (`id_storage_form_factor`);

--
-- Indeksy dla tabeli `storage_type`
--
ALTER TABLE `storage_type`
  ADD PRIMARY KEY (`id_storage_type`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `build`
--
ALTER TABLE `build`
  MODIFY `id_build` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `build_expansion_card`
--
ALTER TABLE `build_expansion_card`
  MODIFY `id_build_expansion_card` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `build_gpu`
--
ALTER TABLE `build_gpu`
  MODIFY `id_build_gpu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `build_ram`
--
ALTER TABLE `build_ram`
  MODIFY `id_build_ram` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `build_storage`
--
ALTER TABLE `build_storage`
  MODIFY `id_build_storage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `case`
--
ALTER TABLE `case`
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id_cpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `ddr`
--
ALTER TABLE `ddr`
  MODIFY `id_ddr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `expansion_card`
--
ALTER TABLE `expansion_card`
  MODIFY `id_expansion_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `expansion_card_type`
--
ALTER TABLE `expansion_card_type`
  MODIFY `id_expansion_card_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id_gpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `gpu_manufacturer`
--
ALTER TABLE `gpu_manufacturer`
  MODIFY `id_gpu_manufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `gpu_mem_type`
--
ALTER TABLE `gpu_mem_type`
  MODIFY `id_gpu_mem_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id_manufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `id_motherboard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `motherboard_form_factor`
--
ALTER TABLE `motherboard_form_factor`
  MODIFY `id_motherboard_form_factor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `pci_line`
--
ALTER TABLE `pci_line`
  MODIFY `id_pci_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `psu`
--
ALTER TABLE `psu`
  MODIFY `id_psu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `psu_connector`
--
ALTER TABLE `psu_connector`
  MODIFY `id_psu_connector` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `psu_connectors`
--
ALTER TABLE `psu_connectors`
  MODIFY `id_psu_connectors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `psu_rating`
--
ALTER TABLE `psu_rating`
  MODIFY `id_psu_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `ram`
--
ALTER TABLE `ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `socket`
--
ALTER TABLE `socket`
  MODIFY `id_socket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `storage`
--
ALTER TABLE `storage`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `storage_form_factor`
--
ALTER TABLE `storage_form_factor`
  MODIFY `id_storage_form_factor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `storage_type`
--
ALTER TABLE `storage_type`
  MODIFY `id_storage_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `build`
--
ALTER TABLE `build`
  ADD CONSTRAINT `fk_build_case1` FOREIGN KEY (`case_id_case`) REFERENCES `case` (`id_case`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_cpu1` FOREIGN KEY (`cpu_id_cpu`) REFERENCES `cpu` (`id_cpu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_motherboard1` FOREIGN KEY (`motherboard_id_motherboard`) REFERENCES `motherboard` (`id_motherboard`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_psu1` FOREIGN KEY (`psu_id_psu`) REFERENCES `psu` (`id_psu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `build_expansion_card`
--
ALTER TABLE `build_expansion_card`
  ADD CONSTRAINT `fk_build_expansion_card_build1` FOREIGN KEY (`build_id_build`) REFERENCES `build` (`id_build`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_expansion_card_expansion_card1` FOREIGN KEY (`expansion_card_id_expansion_card`) REFERENCES `expansion_card` (`id_expansion_card`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `build_gpu`
--
ALTER TABLE `build_gpu`
  ADD CONSTRAINT `fk_build_gpu_build1` FOREIGN KEY (`build_id_build`) REFERENCES `build` (`id_build`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_gpu_gpu1` FOREIGN KEY (`gpu_id_gpu`) REFERENCES `gpu` (`id_gpu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `build_ram`
--
ALTER TABLE `build_ram`
  ADD CONSTRAINT `fk_build_ram_build1` FOREIGN KEY (`build_id_build`) REFERENCES `build` (`id_build`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_ram_ram1` FOREIGN KEY (`ram_id_ram`) REFERENCES `ram` (`id_ram`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `build_storage`
--
ALTER TABLE `build_storage`
  ADD CONSTRAINT `fk_build_storage_build1` FOREIGN KEY (`build_id_build`) REFERENCES `build` (`id_build`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_build_storage_storage1` FOREIGN KEY (`storage_id_storage`) REFERENCES `storage` (`id_storage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `case`
--
ALTER TABLE `case`
  ADD CONSTRAINT `fk_case_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_case_motherboard_form_factor1` FOREIGN KEY (`motherboard_form_factor_id_motherboard_form_factor`) REFERENCES `motherboard_form_factor` (`id_motherboard_form_factor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `fk_cpu_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cpu_socket1` FOREIGN KEY (`socket_id_socket`) REFERENCES `socket` (`id_socket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `expansion_card`
--
ALTER TABLE `expansion_card`
  ADD CONSTRAINT `fk_expansion_card_expansion_card_type1` FOREIGN KEY (`expansion_card_type_id_expansion_card_type`) REFERENCES `expansion_card_type` (`id_expansion_card_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expansion_card_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expansion_card_pci_line1` FOREIGN KEY (`pci_line_id_pci_line`) REFERENCES `pci_line` (`id_pci_line`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expansion_card_psu_connectors1` FOREIGN KEY (`psu_connectors_id_psu_connectors`) REFERENCES `psu_connectors` (`id_psu_connectors`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `fk_gpu_gpu_mem_type1` FOREIGN KEY (`gpu_mem_type_id_gpu_mem_type`) REFERENCES `gpu_mem_type` (`id_gpu_mem_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gpu_pci_line1` FOREIGN KEY (`pci_line_id_pci_line`) REFERENCES `pci_line` (`id_pci_line`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `gpu_manufacturer`
--
ALTER TABLE `gpu_manufacturer`
  ADD CONSTRAINT `fk_gpu_manufacturer_gpu1` FOREIGN KEY (`gpu_id_gpu`) REFERENCES `gpu` (`id_gpu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gpu_manufacturer_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `fk_motherboard_ddr1` FOREIGN KEY (`ddr_id_ddr`) REFERENCES `ddr` (`id_ddr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_motherboard_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_motherboard_motherboard_form_factor1` FOREIGN KEY (`motherboard_form_factor_id_motherboard_form_factor`) REFERENCES `motherboard_form_factor` (`id_motherboard_form_factor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_motherboard_socket1` FOREIGN KEY (`socket_id_socket`) REFERENCES `socket` (`id_socket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `psu`
--
ALTER TABLE `psu`
  ADD CONSTRAINT `fk_psu_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_psu_psu_rating1` FOREIGN KEY (`psu_rating_id_psu_rating`) REFERENCES `psu_rating` (`id_psu_rating`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `psu_connectors`
--
ALTER TABLE `psu_connectors`
  ADD CONSTRAINT `fk_psu_connectors_psu1` FOREIGN KEY (`psu_id_psu`) REFERENCES `psu` (`id_psu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_psu_connectors_psu_connector1` FOREIGN KEY (`psu_connector_id_psu_connector`) REFERENCES `psu_connector` (`id_psu_connector`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `fk_ram_ddr1` FOREIGN KEY (`ddr_id_ddr`) REFERENCES `ddr` (`id_ddr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ram_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `fk_storage_manufacturer1` FOREIGN KEY (`manufacturer_id_manufacturer`) REFERENCES `manufacturer` (`id_manufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
