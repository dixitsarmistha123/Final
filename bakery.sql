-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 12:31 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managed_by`
--

CREATE TABLE `managed_by` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('linktoDashboard','linkToCrud','linkToRoute','section') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `icon`, `type`, `entity_path`, `status`, `created`, `updated`, `role`) VALUES
(1, NULL, 'Dashboard', 'fa-home', 'linktoDashboard', 'App\\Entity\\Menu', 1, '2021-01-19 14:31:32', '2021-01-19 14:31:32', 'ROLE_ADMIN'),
(3, NULL, 'Menu', 'fa-tree', 'section', 'App\\Entity\\Menu', 1, '2021-01-19 14:33:22', '2021-01-19 14:33:22', 'ROLE_ADMIN'),
(4, NULL, 'Category', 'fa-pencil', 'linkToCrud', 'App\\Entity\\PostCategory', 1, '2021-01-19 14:34:22', '2021-01-19 14:34:22', 'ROLE_ADMIN'),
(5, NULL, 'Product', 'fa-tree', 'section', 'App\\Entity\\Menu', 1, '2021-01-19 14:37:53', '2021-01-19 14:37:53', 'ROLE_ADMIN'),
(6, NULL, 'Product type', 'fa-fa-money', 'linkToCrud', 'App\\Entity\\Post', 1, '2021-01-19 14:38:58', '2021-01-19 14:38:58', 'ROLE_ADMIN'),
(7, NULL, 'Menu', 'fa-pencil', 'linktoDashboard', 'App\\Entity\\Menu', 1, '2021-01-19 17:28:02', '2021-01-19 17:28:02', 'ROLE_ADMIN'),
(9, NULL, 'Product', 'fa-pencil', 'linkToCrud', 'App\\Entity\\Product', 1, '2021-01-21 08:29:47', '2021-01-21 08:29:47', 'ROLE_MANAGER'),
(10, NULL, 'Prduct', 'fa-fa-pencil', 'linkToCrud', 'App\\Entity\\Product', 1, '2021-01-21 12:43:54', '2021-01-21 12:43:54', 'ROLE_ADMIN'),
(11, NULL, 'User', 'fa-fa-user', 'linkToCrud', 'App\\Entity\\User', 1, '2021-01-22 14:02:01', '2021-01-22 14:02:01', 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_author_id` int(11) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` enum('post','page') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_status` enum('draft','pending','active','inactive','trashed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_author_id`, `post_category_id`, `post_title`, `post_slug`, `post_content`, `post_type`, `post_status`, `post_thumbnail`, `created`, `updated`) VALUES
(3, 1, 2, 'Chocolate Oatmeal Cookies.', 'Chocolate-Oatmeal-Cookies', '<div>Among the most popular of all cookie types, the chocolate chip cookie\'s invention was a happy accident. In 1930, Ruth Graves Wakefield, who ran the Toll House Inn in Whitman, Massachusetts, ran out of baker\'s chocolate and substituted for it with pieces of Nestle\'s® semi-sweet chocolate. The rest is history. <a href=\"https://www.allrecipes.com/recipe/10813/best-chocolate-chip-cookies/\">Chocolate chip cookies</a> are drop cookies that can be soft and doughy or crisp and crunchy depending on how long you cook them or what ingredients you use.</div>', 'post', 'pending', 'image.webp', '2021-01-19 14:55:44', '2021-01-19 17:22:34'),
(4, 1, 2, 'Chocolate Oatmeal Cookies.', 'Chocolate-Oatmeal-Cookies', '<div>Among the most popular of all cookie types, the chocolate chip cookie\'s invention was a happy accident. In 1930, Ruth Graves Wakefield, who ran the Toll House Inn in Whitman, Massachusetts, ran out of baker\'s chocolate and substituted for it with pieces of Nestle\'s® semi-sweet chocolate. The rest is history. <a href=\"https://www.allrecipes.com/recipe/10813/best-chocolate-chip-cookies/\">Chocolate chip cookies</a> are drop cookies that can be soft and doughy or crisp and crunchy depending on how long you cook them or what ingredients you use.</div>', 'post', 'active', 'image.webp', '2021-01-19 14:56:09', '2021-01-19 14:56:09'),
(5, 1, 3, '. BANANA MUFFINS', 'BANANA-MUFFINS', '<div>These have been a favorite of mine for over 10 years. It’s one of the first recipes I started baking over and over again. They’re sweet and delicious – breakfast or dessert!</div>', 'post', 'active', 'banana-muffins-5-6001.jpg', '2021-01-19 14:59:41', '2021-01-19 15:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `category_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_flavours` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_shapes` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_types` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `parent_id`, `category_name`, `description`, `status`, `created`, `updated`, `category_thumbnail`, `available_flavours`, `available_shapes`, `available_types`) VALUES
(1, NULL, 'cake', '<blockquote>For all type <em>cakes</em></blockquote>', 1, '2021-01-19 14:42:59', '2021-01-19 14:42:59', 'unnamed.jpg', 'BlueBerry Cheese cAke, Rainbow Cake', NULL, 'Egg, Eggless'),
(2, NULL, 'Cookies', '<blockquote>For all type <em>Cookies</em></blockquote>', 1, '2021-01-19 14:43:04', '2021-01-19 14:43:04', 'Small-Batch-Chocolate-Chip-Cookies-4s.jpg', NULL, NULL, NULL),
(3, NULL, 'Muffins', '<div>For type<em> Muffins</em></div>', 1, '2021-01-19 14:44:54', '2021-01-19 14:44:54', 'Anything-But-Basic-Muffin-Recipe-260x195.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `managed_by_id` int(11) DEFAULT NULL,
  `name` varchar(105) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flavour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` enum('egg','eggless') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thumbail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `at1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `product_status` enum('draft','pending','active','inactive','trashed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_returnable` tinyint(1) NOT NULL,
  `is_custom` tinyint(1) NOT NULL,
  `delivery_type` enum('Home Delivery','Pick Up') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `post_category_id`, `managed_by_id`, `name`, `flavour`, `description`, `product_type`, `product_thumbail`, `price`, `qty`, `at1`, `at2`, `at3`, `at4`, `fat`, `suger`, `at5`, `created_at`, `updated_at`, `product_status`, `product_slug`, `weight`, `is_returnable`, `is_custom`, `delivery_type`) VALUES
(1, 1, 1, 'Buttermilk cake', 'vanilla', '<div>THIS THIS IS CAKE</div>', 'egg', 'EP_06062016_Vanilla-Buttermilk-Wedding-Cake-with-Raspberries-and-Orange-Cream-Cheese-Frosting.jpg', 4500, NULL, NULL, NULL, NULL, NULL, '0.3%', '0.4', NULL, '2021-01-20 09:17:23', '2021-01-20 09:17:23', 'pending', 'Buttermilk-cake', '1 kg', 0, 0, 'Pick Up'),
(3, 1, 2, 'Red Velvet Cake', 'Red Velvet', '<div><strong><em>Red velvet cake</em></strong> is the queen of all layer <strong><em>cakes</em></strong>. The “I can\'t quite put my finger on the flavor” <strong><em>cake</em></strong>. It\'s the sweet marriage of buttermilk and vanilla with a little cocoa for good measure.&nbsp;</div>', 'egg', 'redvel.webp', 1557, NULL, NULL, NULL, NULL, NULL, '23%', '12.76%', NULL, '2021-01-21 11:45:24', '2021-01-21 11:45:24', 'active', 'Red-Velvet-Cake', '500 gm', 1, 1, 'Home Delivery'),
(4, 1, 2, 'Rainbow Cake', 'Vanilla', '<div>If you try to add color to a vanilla <strong><em>cake</em></strong> that has egg yolks in it, those yolks will distort your colors while baking. The other reason white velvet is perfect for making a <strong><em>rainbow cake</em></strong> is that it won\'t get over-mixed when you add the color.</div>', 'eggless', 'rainbow-cake760x580.jpg', 2000, NULL, NULL, NULL, NULL, NULL, '34%', '33.33%', NULL, '2021-01-21 11:51:46', '2021-01-21 11:51:46', 'active', 'Rainbow-Cake', '500 gm', 1, 0, 'Home Delivery'),
(5, 3, 2, 'Banana Oatmeal Muffin', 'Mixed', '<div>These easy Banana Oatmeal Muffins with Chocolate Chips are flourless, gluten free, dairy free, and made with oats and banana. They are not only super tasty, but they are also so quick and easy to make. These banana oatmeal muffin cups also freeze well for meal prep breakfasts and snacks!</div>', 'eggless', 'Banana-Oatmeal-Muffin-Cup-820-1.jpg', 1000, NULL, NULL, NULL, NULL, NULL, '15%', '12.24%', NULL, '2021-01-21 11:55:16', '2021-01-21 11:55:16', 'active', 'Banana-Oatmeal-Muffin', '100 gm', 0, 0, 'Pick Up'),
(6, 3, 2, 'Strawberry Muffins', 'Strawberry', '<div>These strawberry cupcakes are moist, flavorful, and loaded with fresh strawberries! They are perfect when frosted with strawberry buttercream.</div>', 'eggless', 'Strawberry-Cupcakes-and-Frostings-48.jpg', 1355, NULL, NULL, NULL, NULL, NULL, '29%', '31%', NULL, '2021-01-21 11:58:41', '2021-01-21 11:59:29', 'active', 'Strawberry-Muffins', '150 gm', 1, 1, 'Home Delivery'),
(7, 2, 2, 'Berry Cookies', 'Fruit', '<div>Crispy almond sugar cookies topped with sweet raspberry jam and drizzled with white chocolate. These pretty cookies would be lovely on a wintry day curled up with a cup of tea</div>', 'egg', 'images.jpg', 845, NULL, NULL, NULL, NULL, NULL, '19.6%', '25%', NULL, '2021-01-21 12:03:05', '2021-01-21 12:03:05', 'active', 'Berry-Cookies', '100 gm', 1, 1, 'Home Delivery'),
(8, 1, 2, 'Blueberry Cheesecake', 'blueberry', '<div>This one is perhaps one of the best cakes you have ever tasted! This mouth-watering blueberry cheesecake is perfect for impressing your loved ones. Indulge your loved ones in this delicious treat for no dessert menu can be completed without a cheesecake.</div>', 'egg', 'blueberry-cheesecake-om_1.webp', 2600, NULL, NULL, NULL, NULL, NULL, '47.25%', '20%', NULL, '2021-01-22 06:57:18', '2021-01-22 06:57:18', 'active', 'Blueberry-Cheesecake', '500gm', 0, 1, 'Pick Up'),
(9, 1, 2, 'Banana Muffins', 'banana', '<div>banana muffines</div>', 'egg', 'banana-muffins-5-6001.jpg', 500, NULL, NULL, NULL, NULL, NULL, '2.3%', '0.2%', NULL, '2021-01-22 07:09:38', '2021-01-22 07:09:38', 'pending', 'Banana-Muffins', '300gm', 0, 1, 'Home Delivery'),
(10, 1, 2, 'banana', 'banana', '<div>this is</div>', 'egg', NULL, 1000, NULL, NULL, NULL, NULL, NULL, '.22', '00', NULL, '2021-01-22 07:15:57', '2021-01-22 07:15:57', 'active', 'banana', '502', 0, 1, 'Pick Up'),
(11, 3, 2, 'banana muffins', 'banana', '<div>this</div>', 'egg', 'banana-muffins-5-6001.jpg', 5600, NULL, NULL, NULL, NULL, NULL, '22', '22', NULL, '2021-01-22 08:57:38', '2021-01-22 08:57:38', 'active', 'banana-muffins', '200', 0, 1, 'Pick Up'),
(12, 1, 2, 'blueberry', 'blueberry', '<div>this</div>', 'egg', 'blueberry-cheesecake-om_1.webp', 2300, NULL, NULL, NULL, NULL, NULL, '20', '32', NULL, '2021-01-22 09:36:51', '2021-01-22 09:36:51', 'active', 'blueberry', '205', 0, 1, 'Home Delivery'),
(13, 3, 2, 'Chocolate Muffins', 'Chocolate', '<div>These are the best <strong><em>chocolate muffins</em></strong> you\'ll ever have. Super chocolatey, moist yet dense, with crunchy tops. They look and taste just like the ones in the bakeries. You won\'t need any other <strong><em>recipe</em></strong>!</div>', 'egg', '151.jpg', 875, NULL, NULL, NULL, NULL, NULL, '26%', '33%', NULL, '2021-01-23 08:48:08', '2021-01-23 08:59:43', 'active', 'Chocolate-Muffins', '120 gm', 1, 1, 'Pick Up');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(2, 2, 'f3EpQIiBYRksXm8BoJBc', 'kek+Gx8BIVDDAOX2hsGlswvq/O7dPWYBAP2NJxeDHrY=', '2021-01-22 13:44:14', '2021-01-22 14:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','active','inactive','trashed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `roles`, `password`, `mobile`, `dob`, `gender`, `status`, `created`, `updated`) VALUES
(1, 'sarmistha', 'dixit', 'dixitsarmistha7@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$cmVJcjZrM3NEakd4OEJ0dw$zFqLb5e0XdK7xC/NlREqZEfu2ZuGuk9+3eTP5ZbRphs', '7060260411', '1997-08-31', 'female', 'active', '2021-01-19 14:11:40', '2021-01-19 14:11:40'),
(2, 'kajal', 'khanna', 'kajalkhanna803@gmail.com', '[\"ROLE_MANAGER\"]', '$argon2id$v=19$m=65536,t=4,p=1$RGxHQURhWEVzUFprODJCMQ$oJ+1snuusUI7nKmcJ93/gjgdQintRs+k3b4dumSFKiU', '7060260411', '1999-08-31', 'female', 'active', '2021-01-20 10:33:41', '2021-01-20 10:33:41'),
(3, 'siddharth', 'srivastava', 'siddharth@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$YUJtOS9HT1dSanpNSTBxMQ$UwJkCJqkwkVQGYHRwkUyvPPSecpvz1xQl8Q6O4cu0WE', '789456123', '1999-07-08', 'male', 'active', '2021-01-21 06:44:02', '2021-01-21 06:44:02'),
(4, 'pooja', 'singh', 'singh@gmail.com', '[\"ROLE_MANAGER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Ni95MmpSUDRlM29uejRDcw$H2ITAv71COS6SSHge6mSI4NnlIWMc1/vH95m35MJJf4', '789456123', '1999-03-08', 'female', 'active', '2021-01-21 08:56:35', '2021-01-21 08:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `managed_by`
--
ALTER TABLE `managed_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7D053A93727ACA70` (`parent_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8D571B8DEC` (`post_author_id`),
  ADD KEY `IDX_5A8A6C8DFE0617CD` (`post_category_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B9A19060727ACA70` (`parent_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04ADFE0617CD` (`post_category_id`),
  ADD KEY `IDX_D34A04AD873649CA` (`managed_by_id`);

--
-- Indexes for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `managed_by`
--
ALTER TABLE `managed_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_7D053A93727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D571B8DEC` FOREIGN KEY (`post_author_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5A8A6C8DFE0617CD` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `FK_B9A19060727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `post_category` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD873649CA` FOREIGN KEY (`managed_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D34A04ADFE0617CD` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
