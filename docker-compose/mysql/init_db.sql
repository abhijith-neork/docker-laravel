
CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(33, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 34, '[]', '{\"name\":\"Shaneeshma T\",\"mobile\":\"09999999999\",\"email\":\"shaneeshma@neork.com\",\"role_id\":\"3\",\"password\":\"$2y$10$8xYPE8\\/SoCKLfBlYxsLRYOw09WpZDdppsF4TmOjxuCpSBOUnb.9qa\",\"id\":34}', 'https://hrms.neork.io/employee/store', '157.44.137.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-03 06:37:43', '2024-01-03 06:37:43'),
(34, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 1, '[]', '{\"user_id\":34,\"first_name\":\"Shaneeshma\",\"last_name\":\"T\",\"employee_code\":\"EMP_34\",\"gender\":\"Male\",\"blood_group\":\"B-ve\",\"marital_status\":\"Married\",\"dob\":\"2006-01-03\",\"address\":\"fgh\",\"email\":\"shaneeshma@tcs.com\",\"company_mail\":\"shaneeshma@neork.com\",\"phone\":\"09999999999\",\"aadhaar\":\"89689678678\",\"emergency_contact_name_1\":\"Shaneeshma T\",\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/employee/store', '157.44.137.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-03 06:37:45', '2024-01-03 06:37:45'),
(35, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 35, '[]', '{\"name\":\"Navarsha C Shaji\",\"mobile\":\"hjkm\",\"email\":\"navarsha@neork.com\",\"role_id\":\"3\",\"password\":\"$2y$10$oFwBaJwOLivJkK8h4Iautew4G6YGGsUqz1Ce2BLaPiZhhNEuL72mC\",\"id\":35}', 'https://hrms.neork.io/employee/store', '103.85.206.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-03 06:46:21', '2024-01-03 06:46:21'),
(36, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 2, '[]', '{\"user_id\":35,\"first_name\":\"Navarsha\",\"last_name\":\"C Shaji\",\"employee_code\":\"EMP_35\",\"gender\":\"Female\",\"blood_group\":\"A+ve\",\"marital_status\":\"Married\",\"dob\":\"2006-01-03\",\"address\":\"gvbnm\",\"email\":\"admin@neork.com\",\"company_mail\":\"navarsha@neork.com\",\"phone\":\"hjkm\",\"aadhaar\":\"fghjn\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/employee/store', '103.85.206.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-03 06:46:26', '2024-01-03 06:46:26'),
(39, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 38, '[]', '{\"name\":\"Varsha Sooraj\",\"mobile\":\"ssss\",\"email\":\"navarsha+43@neork.com\",\"role_id\":\"3\",\"password\":\"$2y$10$TKudOV1k4mFo5y7o2Ld\\/pOPst.m8gaUs9I5vIt96efhHNsdqhv4Jy\",\"id\":38}', 'https://hrms.neork.io/employee/store', '103.85.206.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-04 05:40:43', '2024-01-04 05:40:43'),
(40, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 3, '[]', '{\"user_id\":38,\"first_name\":\"Varsha\",\"last_name\":\"Sooraj\",\"employee_code\":\"EMP_38\",\"gender\":\"Female\",\"blood_group\":\"A+ve\",\"marital_status\":\"Married\",\"dob\":\"2006-01-03\",\"address\":\"Nochi House\",\"email\":\"navarsha+43@neork.com\",\"company_mail\":\"navarsha+43@neork.com\",\"phone\":\"ssss\",\"aadhaar\":\"sss\",\"emergency_contact_name_1\":\"ssss\",\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":\"ssss\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/employee/store', '103.85.206.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-04 05:40:47', '2024-01-04 05:40:47'),
(41, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":null}', '{\"remember_token\":\"Hch8get0zr9Tdq9uQP2vyv4FvPfXmX5gCm3oWfCCS0YH3gbDUj259S9ghcKz\"}', 'https://hrms.neork.io/login/admin', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-04 22:39:53', '2024-01-04 22:39:53'),
(42, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 40, '[]', '{\"name\":\"Sree Krishna\",\"mobile\":\"8887777999\",\"email\":\"krishnasree@neork.com\",\"role_id\":\"3\",\"password\":\"$2y$10$3Z5FxojEWN\\/LP2IZoYqLoOm42c4bt3n6wGSf5A7DPpUNteadJuiE2\",\"id\":40}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-04 22:41:31', '2024-01-04 22:41:31'),
(43, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 4, '[]', '{\"user_id\":40,\"first_name\":\"Sree\",\"last_name\":\"Krishna\",\"employee_code\":\"EMP_40\",\"gender\":\"Male\",\"blood_group\":\"O+ve\",\"marital_status\":\"Married\",\"dob\":\"2006-01-01\",\"address\":\"Guruvayr Temple\",\"email\":\"krishnasree@neork.com\",\"company_mail\":\"krishnasree@neork.com\",\"phone\":\"8887777999\",\"aadhaar\":\"58885668654564\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-04 22:41:34', '2024-01-04 22:41:34'),
(44, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 1, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-04 22:42:46', '2024-01-04 22:42:46'),
(45, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 41, '[]', '{\"name\":\"Shan T\",\"mobile\":\"09999999999\",\"email\":\"shan@neork.com\",\"role_id\":\"3\",\"password\":\"$2y$10$B.GX1i31Xq528xRnfJKdGest9A9u3kqGyGKP1gC\\/Wv6IfXreY.88W\",\"id\":41}', 'https://hrms.neork.io/employee/store', '137.97.125.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-04 23:25:08', '2024-01-04 23:25:08'),
(46, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 5, '[]', '{\"user_id\":41,\"first_name\":\"Shan\",\"last_name\":\"T\",\"employee_code\":\"EMP_41\",\"gender\":\"Female\",\"blood_group\":\"B+ve\",\"marital_status\":\"Single\",\"dob\":\"2006-01-05\",\"address\":\"fgh\",\"email\":\"shan@gmail.com\",\"company_mail\":\"shan@neork.com\",\"phone\":\"09999999999\",\"aadhaar\":\"2342354346\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"created_by\":1,\"id\":5}', 'https://hrms.neork.io/employee/store', '137.97.125.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-04 23:25:11', '2024-01-04 23:25:11'),
(47, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 42, '[]', '{\"name\":\"sdgfs sdf\",\"mobile\":\"09999999999\",\"email\":\"shaneeshma@tcs.com\",\"role_id\":\"3\",\"password\":\"$2y$10$PGbQGmLMZpmT7ZsjL.DGH.vJlKHcOZMAu8jVWZXlG.pRJPWsHtqCq\",\"id\":42}', 'https://hrms.neork.io/employee/store', '137.97.125.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-04 23:34:10', '2024-01-04 23:34:10'),
(48, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 6, '[]', '{\"user_id\":42,\"first_name\":\"sdgfs\",\"last_name\":\"sdf\",\"employee_code\":\"EMP_42\",\"gender\":null,\"blood_group\":null,\"marital_status\":null,\"dob\":\"2006-01-01\",\"address\":\"sdf\",\"email\":\"shaneeshma@wipro.com\",\"company_mail\":\"shaneeshma@tcs.com\",\"phone\":\"09999999999\",\"aadhaar\":\"54657567868\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"created_by\":1,\"id\":6}', 'https://hrms.neork.io/employee/store', '137.97.125.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-04 23:34:13', '2024-01-04 23:34:13'),
(49, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 2, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/employee/store', '137.97.125.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-04 23:34:38', '2024-01-04 23:34:38'),
(50, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 3, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/employee/store', '137.97.125.237', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-04 23:37:09', '2024-01-04 23:37:09'),
(51, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 4, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:07', '2024-01-05 00:18:07'),
(52, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 5, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":5}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:07', '2024-01-05 00:18:07'),
(53, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 6, '[]', '{\"user_id\":40,\"qualification\":\"dfgdsfgdf\",\"specialization\":null,\"institution\":\"sddfg\",\"start_date\":\"2024-01-06\",\"end_date\":\"1970-01-01\",\"percentage\":null,\"created_by\":1,\"id\":6}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:07', '2024-01-05 00:18:07'),
(54, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 7, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":7}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:10', '2024-01-05 00:18:10'),
(55, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 8, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":8}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:10', '2024-01-05 00:18:10'),
(56, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 9, '[]', '{\"user_id\":40,\"qualification\":\"dfgdsfgdf\",\"specialization\":null,\"institution\":\"sddfg\",\"start_date\":\"2024-01-06\",\"end_date\":\"1970-01-01\",\"percentage\":null,\"created_by\":1,\"id\":9}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:10', '2024-01-05 00:18:10'),
(57, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 10, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":10}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:44', '2024-01-05 00:18:44'),
(58, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 11, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":11}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:44', '2024-01-05 00:18:44'),
(59, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 12, '[]', '{\"user_id\":40,\"qualification\":\"dfgdsfgdf\",\"specialization\":null,\"institution\":\"sddfg\",\"start_date\":\"2024-01-06\",\"end_date\":\"1970-01-01\",\"percentage\":null,\"created_by\":1,\"id\":12}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:18:44', '2024-01-05 00:18:44'),
(60, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 13, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":13}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:19:04', '2024-01-05 00:19:04'),
(61, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 14, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":14}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:19:04', '2024-01-05 00:19:04'),
(62, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 15, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":15}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:34:02', '2024-01-05 00:34:02'),
(63, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 16, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":16}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:34:02', '2024-01-05 00:34:02'),
(64, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 1, '[]', '{\"user_id\":40,\"employer_name\":\"zsxdsdxvfx\",\"position_held\":\"qa\",\"start_date\":\"2024-01-03\",\"end_date\":\"2024-01-11\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:34:02', '2024-01-05 00:34:02'),
(65, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 17, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":17}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:49:09', '2024-01-05 00:49:09'),
(66, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 18, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":18}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:49:09', '2024-01-05 00:49:09'),
(67, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 2, '[]', '{\"user_id\":40,\"employer_name\":\"zsxdsdxvfx\",\"position_held\":\"qa\",\"start_date\":\"2024-01-03\",\"end_date\":\"2024-01-11\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:49:09', '2024-01-05 00:49:09'),
(68, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 3, '[]', '{\"user_id\":40,\"employer_name\":null,\"position_held\":null,\"start_date\":\"1970-01-01\",\"end_date\":\"1970-01-01\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:49:09', '2024-01-05 00:49:09'),
(69, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 4, '[]', '{\"user_id\":40,\"employer_name\":null,\"position_held\":null,\"start_date\":\"1970-01-01\",\"end_date\":\"1970-01-01\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:49:09', '2024-01-05 00:49:09'),
(70, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 5, '[]', '{\"user_id\":40,\"employer_name\":\"dfgdfh\",\"position_held\":\"fdgdf\",\"start_date\":\"2024-01-04\",\"end_date\":\"2024-01-08\",\"created_by\":1,\"id\":5}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:49:09', '2024-01-05 00:49:09'),
(71, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeSalaryDetail', 1, '[]', '{\"user_id\":40,\"basic_pay\":\"3500\",\"da\":\"5000\",\"pf_contribution\":\"1000\",\"hra\":\"2000\",\"bank_name\":\"hdfc\",\"branch\":\"kodakara\",\"account_number\":\"test\",\"ifsc\":\"dgfg\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(72, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 19, '[]', '{\"user_id\":40,\"qualification\":\"Mtech\",\"specialization\":\"Water Resource\",\"institution\":\"Govt. Engineering College, Thrissur\",\"start_date\":\"2016-08-01\",\"end_date\":\"2018-07-31\",\"percentage\":\"81\",\"created_by\":1,\"id\":19}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(73, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 20, '[]', '{\"user_id\":40,\"qualification\":\"dfxgxcv\",\"specialization\":\"cvbcv\",\"institution\":\"cfcfxg\",\"start_date\":\"2024-01-05\",\"end_date\":\"2024-01-18\",\"percentage\":\"33\",\"created_by\":1,\"id\":20}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(74, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 6, '[]', '{\"user_id\":40,\"employer_name\":\"zsxdsdxvfx\",\"position_held\":\"qa\",\"start_date\":\"2024-01-03\",\"end_date\":\"2024-01-11\",\"created_by\":1,\"id\":6}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(75, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 7, '[]', '{\"user_id\":40,\"employer_name\":null,\"position_held\":null,\"start_date\":\"1970-01-01\",\"end_date\":\"1970-01-01\",\"created_by\":1,\"id\":7}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(76, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 8, '[]', '{\"user_id\":40,\"employer_name\":null,\"position_held\":null,\"start_date\":\"1970-01-01\",\"end_date\":\"1970-01-01\",\"created_by\":1,\"id\":8}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(77, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 9, '[]', '{\"user_id\":40,\"employer_name\":\"dfgdfh\",\"position_held\":\"fdgdf\",\"start_date\":\"2024-01-04\",\"end_date\":\"2024-01-08\",\"created_by\":1,\"id\":9}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(78, 'App\\Models\\User', 1, 'created', 'App\\Models\\LeaveType', 1, '[]', '{\"leave_type_code\":\"test\",\"leave_type_name\":\"ssss\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/leave_type/create', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', NULL, '2024-01-05 01:00:07', '2024-01-05 01:00:07'),
(79, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeLeaveDetail', 1, '[]', '{\"user_id\":42,\"no_of_leaves_alloted\":\"5\",\"effective_from\":\"2024-01-05\",\"effective_to\":\"2024-01-12\",\"leave_type_id\":\"1\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 01:01:37', '2024-01-05 01:01:37'),
(80, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 21, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":21}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 01:01:37', '2024-01-05 01:01:37'),
(91, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 1, '[]', '{\"designation_code\":\"zcxvxc\",\"designation_name\":\"xccxv\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/designation/create', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:23:33', '2024-01-05 03:23:33'),
(92, 'App\\Models\\User', 1, 'created', 'App\\Models\\JobRole', 1, '[]', '{\"job_role_name\":\"PHP\",\"id\":1}', 'https://hrms.neork.io/job_role/create', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:23:51', '2024-01-05 03:23:51'),
(93, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 1, '{\"designation_code\":\"zcxvxc\",\"designation_name\":\"xccxv\"}', '{\"designation_code\":\"DS01\",\"designation_name\":\"Software Tester\"}', 'https://hrms.neork.io/designation/edit', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:24:25', '2024-01-05 03:24:25'),
(94, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 22, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":22}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:27:24', '2024-01-05 03:27:24'),
(95, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 10, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":10}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:27:25', '2024-01-05 03:27:25'),
(96, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 23, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":23}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:11', '2024-01-05 03:28:11'),
(97, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 11, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":11}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:11', '2024-01-05 03:28:11'),
(98, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 1, '[]', '{\"user_id\":42,\"document_type\":\"Education\",\"file_name\":\"\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:11', '2024-01-05 03:28:11'),
(99, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 24, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":24}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:42', '2024-01-05 03:28:42'),
(100, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 12, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":12}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:42', '2024-01-05 03:28:42'),
(101, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 2, '[]', '{\"user_id\":42,\"document_type\":\"Education\",\"file_name\":\"\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:42', '2024-01-05 03:28:42'),
(102, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 25, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":25}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:53', '2024-01-05 03:28:53'),
(103, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 13, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":13}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:28:53', '2024-01-05 03:28:53'),
(104, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 26, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":26}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:32:21', '2024-01-05 03:32:21'),
(105, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 14, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":14}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:32:21', '2024-01-05 03:32:21'),
(106, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 3, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:32:21', '2024-01-05 03:32:21'),
(107, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 1, '[]', '{\"technology_name\":\"PHP\",\"id\":1}', 'https://hrms.neork.io/technology/create', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:33:07', '2024-01-05 03:33:07'),
(108, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 27, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":27}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:34:15', '2024-01-05 03:34:15'),
(109, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 15, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":15}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:34:15', '2024-01-05 03:34:15'),
(110, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 28, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":28}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:11', '2024-01-05 03:59:11'),
(111, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 16, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":16}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:11', '2024-01-05 03:59:11'),
(112, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 4, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:11', '2024-01-05 03:59:11'),
(113, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 5, '[]', '{\"user_id\":42,\"document_type\":\"Salary\",\"file_name\":\"\",\"created_by\":1,\"id\":5}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:11', '2024-01-05 03:59:11'),
(114, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 6, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":6}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:11', '2024-01-05 03:59:11'),
(115, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 29, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":29}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:19', '2024-01-05 03:59:19'),
(116, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 17, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":17}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:19', '2024-01-05 03:59:19'),
(117, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 7, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":7}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:19', '2024-01-05 03:59:19'),
(118, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 8, '[]', '{\"user_id\":42,\"document_type\":\"Salary\",\"file_name\":\"\",\"created_by\":1,\"id\":8}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:19', '2024-01-05 03:59:19'),
(119, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 9, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":9}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:19', '2024-01-05 03:59:19'),
(120, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 30, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":30}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:29', '2024-01-05 03:59:29'),
(121, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 18, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":18}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:29', '2024-01-05 03:59:29'),
(122, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 10, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":10}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:29', '2024-01-05 03:59:29'),
(123, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 11, '[]', '{\"user_id\":42,\"document_type\":\"Salary\",\"file_name\":\"\",\"created_by\":1,\"id\":11}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:29', '2024-01-05 03:59:29'),
(124, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 12, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":12}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 03:59:29', '2024-01-05 03:59:29'),
(125, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 31, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":31}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:00:59', '2024-01-05 04:00:59'),
(126, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 19, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":19}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:00:59', '2024-01-05 04:00:59'),
(127, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 13, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":13}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:00:59', '2024-01-05 04:00:59'),
(128, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 14, '[]', '{\"user_id\":42,\"document_type\":\"Salary\",\"file_name\":\"\",\"created_by\":1,\"id\":14}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:00:59', '2024-01-05 04:00:59'),
(129, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeDocument', 15, '[]', '{\"user_id\":42,\"document_type\":\"Experience\",\"file_name\":\"\",\"created_by\":1,\"id\":15}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:00:59', '2024-01-05 04:00:59'),
(130, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeLeaveDetail', 2, '[]', '{\"user_id\":42,\"no_of_leaves_alloted\":\"5\",\"effective_from\":\"2024-01-05\",\"effective_to\":\"2024-01-10\",\"leave_type_id\":\"1\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:56:28', '2024-01-05 04:56:28'),
(131, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeEducation', 32, '[]', '{\"user_id\":42,\"qualification\":\"ghjn\",\"specialization\":\"ghj\",\"institution\":\"fhjg\",\"start_date\":\"2021-01-24\",\"end_date\":\"2022-01-15\",\"percentage\":\"45\",\"created_by\":1,\"id\":32}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:56:28', '2024-01-05 04:56:28'),
(132, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 20, '[]', '{\"user_id\":42,\"employer_name\":\"esfdf\",\"position_held\":\"sad\",\"start_date\":\"2024-01-11\",\"end_date\":\"2024-01-17\",\"created_by\":1,\"id\":20}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:56:28', '2024-01-05 04:56:28'),
(133, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 21, '[]', '{\"user_id\":42,\"employer_name\":null,\"position_held\":null,\"start_date\":\"1970-01-01\",\"end_date\":\"1970-01-01\",\"created_by\":1,\"id\":21}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:56:28', '2024-01-05 04:56:28'),
(134, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeExperience', 22, '[]', '{\"user_id\":42,\"employer_name\":null,\"position_held\":null,\"start_date\":\"1970-01-01\",\"end_date\":\"1970-01-01\",\"created_by\":1,\"id\":22}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:56:28', '2024-01-05 04:56:28'),
(135, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\EmployeeBasicInfo', 6, '{\"id\":6,\"user_id\":42,\"employee_code\":\"EMP_42\",\"first_name\":\"sdgfs\",\"last_name\":\"sdf\",\"gender\":null,\"blood_group\":null,\"marital_status\":null,\"dob\":\"2006-01-01\",\"address\":\"sdf\",\"email\":\"shaneeshma@wipro.com\",\"company_mail\":\"shaneeshma@tcs.com\",\"phone\":\"09999999999\",\"aadhaar\":\"54657567868\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"image\":null,\"status\":1,\"created_by\":1}', '[]', 'https://hrms.neork.io/employee/delete', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:58:51', '2024-01-05 04:58:51'),
(136, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\User', 42, '{\"id\":42,\"name\":\"sdgfs sdf\",\"mobile\":\"09999999999\",\"role_id\":3,\"email\":\"shaneeshma@tcs.com\",\"profile_image\":null,\"email_verified_at\":null,\"password\":\"$2y$10$PGbQGmLMZpmT7ZsjL.DGH.vJlKHcOZMAu8jVWZXlG.pRJPWsHtqCq\",\"status\":1,\"remember_token\":null}', '[]', 'https://hrms.neork.io/employee/delete', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:58:52', '2024-01-05 04:58:52'),
(137, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\EmployeeBasicInfo', 5, '{\"id\":5,\"user_id\":41,\"employee_code\":\"EMP_41\",\"first_name\":\"Shan\",\"last_name\":\"T\",\"gender\":\"Female\",\"blood_group\":\"B+ve\",\"marital_status\":\"Single\",\"dob\":\"2006-01-05\",\"address\":\"fgh\",\"email\":\"shan@gmail.com\",\"company_mail\":\"shan@neork.com\",\"phone\":\"09999999999\",\"aadhaar\":\"2342354346\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"image\":null,\"status\":1,\"created_by\":1}', '[]', 'https://hrms.neork.io/employee/delete', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:59:06', '2024-01-05 04:59:06'),
(138, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\User', 41, '{\"id\":41,\"name\":\"Shan T\",\"mobile\":\"09999999999\",\"role_id\":3,\"email\":\"shan@neork.com\",\"profile_image\":null,\"email_verified_at\":null,\"password\":\"$2y$10$B.GX1i31Xq528xRnfJKdGest9A9u3kqGyGKP1gC\\/Wv6IfXreY.88W\",\"status\":1,\"remember_token\":null}', '[]', 'https://hrms.neork.io/employee/delete', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 04:59:06', '2024-01-05 04:59:06'),
(139, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 35, '{\"profile_image\":null}', '{\"profile_image\":\"202401051032EMP_35.png\"}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 05:02:36', '2024-01-05 05:02:36'),
(140, 'App\\Models\\User', 1, 'updated', 'App\\Models\\EmployeeBasicInfo', 2, '{\"image\":null}', '{\"image\":\"admin\\/assets\\/uploads\\/profile_image\\/202401051032EMP_35.png\"}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 05:02:36', '2024-01-05 05:02:36'),
(141, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeLeaveDetail', 3, '[]', '{\"user_id\":35,\"no_of_leaves_alloted\":\"5\",\"effective_from\":\"2024-01-05\",\"effective_to\":\"2024-01-05\",\"leave_type_id\":\"1\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 05:02:47', '2024-01-05 05:02:47'),
(142, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"Hch8get0zr9Tdq9uQP2vyv4FvPfXmX5gCm3oWfCCS0YH3gbDUj259S9ghcKz\"}', '{\"remember_token\":\"QJhNW5EvaVoO8UPCMEkxdFPuYOZ696916Dm3Zn8M0njQkrRpoiupuUhPs33P\"}', 'https://hrms.neork.io/logout', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', NULL, '2024-01-05 05:03:07', '2024-01-05 05:03:07');
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(143, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeLeaveDetail', 4, '[]', '{\"user_id\":35,\"no_of_leaves_alloted\":\"5\",\"effective_from\":\"2024-01-05\",\"effective_to\":\"2024-01-12\",\"leave_type_id\":\"1\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 05:13:48', '2024-01-05 05:13:48'),
(144, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 53, '[]', '{\"name\":\"Hari Kumar\",\"mobile\":\"hjkm\",\"email\":\"navarsha+33@neork.com\",\"role_id\":\"2\",\"password\":\"$2y$10$Nlo2MOt0H4gSHT1mS5KRIOTdGfx5HFsnseUOAFaDsIuIkETjoBv2u\",\"id\":53}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 05:19:00', '2024-01-05 05:19:00'),
(145, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 7, '[]', '{\"user_id\":53,\"first_name\":\"Hari\",\"last_name\":\"Kumar\",\"employee_code\":\"EMP_53\",\"gender\":\"Male\",\"blood_group\":\"A+ve\",\"marital_status\":\"Married\",\"dob\":\"1990-03-09\",\"address\":\"test\",\"email\":\"test\",\"company_mail\":\"navarsha+33@neork.com\",\"phone\":\"hjkm\",\"aadhaar\":\"7988\",\"emergency_contact_name_1\":null,\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":null,\"emergency_contact_name_2\":null,\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":null,\"created_by\":1,\"id\":7}', 'https://hrms.neork.io/employee/store', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-05 05:19:03', '2024-01-05 05:19:03'),
(146, 'App\\Models\\User', 53, 'updated', 'App\\Models\\User', 53, '{\"remember_token\":null}', '{\"remember_token\":\"f5cq3oy3H9ydMVDEjFBqbQVSBqGV7ixZd88GEGc6h4z7QhcnaNsdXPneUEmS\"}', 'https://hrms.neork.io/login/admin', '103.85.206.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', NULL, '2024-01-05 05:19:42', '2024-01-05 05:19:42'),
(147, 'App\\Models\\User', 53, 'updated', 'App\\Models\\User', 53, '{\"remember_token\":\"f5cq3oy3H9ydMVDEjFBqbQVSBqGV7ixZd88GEGc6h4z7QhcnaNsdXPneUEmS\"}', '{\"remember_token\":\"tojKEwawU7mP19q8NfMuD57Kt7EqCMC7VHc7NW2zy02rrVnBljp25Ti5DDQm\"}', 'https://hrms.neork.io/logout', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', NULL, '2024-01-07 23:24:34', '2024-01-07 23:24:34'),
(148, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"QJhNW5EvaVoO8UPCMEkxdFPuYOZ696916Dm3Zn8M0njQkrRpoiupuUhPs33P\"}', '{\"remember_token\":\"fC38TyvL1634vr5RlRWJsG2C2FAsG6ke5HIyWqJBfDnLSstR37G2L1Cf3ezp\"}', 'https://hrms.neork.io/logout', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:41:15', '2024-01-07 23:41:15'),
(149, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 2, '[]', '{\"designation_code\":\"D00122\",\"designation_name\":\"Manager\",\"status\":\"0\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/designation/create', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:43:06', '2024-01-07 23:43:06'),
(150, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 2, '{\"status\":0}', '{\"status\":\"1\"}', 'https://hrms.neork.io/designation/edit', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:43:34', '2024-01-07 23:43:34'),
(151, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 2, '[]', '{\"technology_name\":\"python\",\"status\":\"1\",\"id\":2}', 'https://hrms.neork.io/technology/create', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:45:33', '2024-01-07 23:45:33'),
(152, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Technology', 2, '{\"technology_name\":\"python\"}', '{\"technology_name\":\"Python\"}', 'https://hrms.neork.io/technology/edit', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:46:18', '2024-01-07 23:46:18'),
(153, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 3, '[]', '{\"technology_name\":\"java\",\"status\":\"0\",\"id\":3}', 'https://hrms.neork.io/technology/create', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:46:33', '2024-01-07 23:46:33'),
(154, 'App\\Models\\User', 1, 'created', 'App\\Models\\LeaveType', 2, '[]', '{\"leave_type_code\":\"LT001\",\"leave_type_name\":\"Annual leave\",\"status\":\"1\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/leave_type/create', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:47:25', '2024-01-07 23:47:25'),
(155, 'App\\Models\\User', 1, 'created', 'App\\Models\\LeaveType', 3, '[]', '{\"leave_type_code\":\"LT0030\",\"leave_type_name\":\"Casual Leave\",\"status\":\"0\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/leave_type/create', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-07 23:47:54', '2024-01-07 23:47:54'),
(156, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"fC38TyvL1634vr5RlRWJsG2C2FAsG6ke5HIyWqJBfDnLSstR37G2L1Cf3ezp\"}', '{\"remember_token\":\"4DFrNDBYtvk2ESRVUlPQDWio5QxI4tTyBshR4mJXooKkLb7aRgE6DTGTT9xK\"}', 'https://hrms.neork.io/logout', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-07 23:49:11', '2024-01-07 23:49:11'),
(157, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"4DFrNDBYtvk2ESRVUlPQDWio5QxI4tTyBshR4mJXooKkLb7aRgE6DTGTT9xK\"}', '{\"remember_token\":\"rJfxcuL6XVI1pXnZnPUZ1FzKLth17D0G9nmcWqCgfIpzXoyAeQfGKhqlqkH5\"}', 'https://hrms.neork.io/logout', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-07 23:58:52', '2024-01-07 23:58:52'),
(158, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"rJfxcuL6XVI1pXnZnPUZ1FzKLth17D0G9nmcWqCgfIpzXoyAeQfGKhqlqkH5\"}', '{\"remember_token\":\"E4LAqA8DPX8Jn8zBoyV2243pin4x2FnW39w8izLsOlhMcJXo6H99FvpuOJHI\"}', 'https://hrms.neork.io/logout', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', NULL, '2024-01-07 23:59:48', '2024-01-07 23:59:48'),
(159, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"E4LAqA8DPX8Jn8zBoyV2243pin4x2FnW39w8izLsOlhMcJXo6H99FvpuOJHI\"}', '{\"remember_token\":\"7AzmGSn0D0iCFR3rgVDEHvBSA9THdTW5oDKaxgBmdgxU8CiadTiLcmIpx6J3\"}', 'https://hrms.neork.io/logout', '137.97.68.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 00:06:58', '2024-01-08 00:06:58'),
(160, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 2, '{\"status\":1}', '{\"status\":\"0\"}', 'https://hrms.neork.io/designation/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:21:48', '2024-01-08 03:21:48'),
(161, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 3, '[]', '{\"designation_code\":\"D0123\",\"designation_name\":\"Project Manager\",\"status\":\"0\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:27:39', '2024-01-08 03:27:39'),
(162, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 4, '[]', '{\"designation_code\":\"D0124\",\"designation_name\":\"Software Engineer\",\"status\":\"1\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:30:49', '2024-01-08 03:30:49'),
(163, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 5, '[]', '{\"designation_code\":\"D0124\",\"designation_name\":\"Senior Software Engineer\",\"status\":\"1\",\"created_by\":1,\"id\":5}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:31:26', '2024-01-08 03:31:26'),
(164, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 6, '[]', '{\"designation_code\":\"D0125\",\"designation_name\":\"Junior Software Tester\",\"status\":\"1\",\"created_by\":1,\"id\":6}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:36:07', '2024-01-08 03:36:07'),
(165, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 7, '[]', '{\"designation_code\":\"D0126\",\"designation_name\":\"Cloud Engineer\",\"status\":\"1\",\"created_by\":1,\"id\":7}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:36:21', '2024-01-08 03:36:21'),
(166, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 8, '[]', '{\"designation_code\":\"D0127\",\"designation_name\":\"Junior Cloud Engineer\",\"status\":\"1\",\"created_by\":1,\"id\":8}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:37:12', '2024-01-08 03:37:12'),
(167, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 9, '[]', '{\"designation_code\":\"D0130\",\"designation_name\":\"HR Manager\",\"status\":\"1\",\"created_by\":1,\"id\":9}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:37:33', '2024-01-08 03:37:33'),
(168, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 10, '[]', '{\"designation_code\":\"D0131\",\"designation_name\":\"HR Intern\",\"status\":\"1\",\"created_by\":1,\"id\":10}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:39:50', '2024-01-08 03:39:50'),
(169, 'App\\Models\\User', 1, 'created', 'App\\Models\\Designation', 11, '[]', '{\"designation_code\":\"D0121\",\"designation_name\":\"Team Lead\",\"status\":\"1\",\"created_by\":1,\"id\":11}', 'https://hrms.neork.io/designation/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 03:40:21', '2024-01-08 03:40:21'),
(170, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 11, '{\"designation_code\":\"D0121\"}', '{\"designation_code\":\"D0125\"}', 'https://hrms.neork.io/designation/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:19:05', '2024-01-08 04:19:05'),
(171, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 11, '{\"designation_code\":\"D0125\"}', '{\"designation_code\":\"D0123\"}', 'https://hrms.neork.io/designation/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:29:41', '2024-01-08 04:29:41'),
(172, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 4, '[]', '{\"technology_name\":\"html css\",\"status\":\"1\",\"id\":4}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:34:58', '2024-01-08 04:34:58'),
(173, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 5, '[]', '{\"technology_name\":\"Laravel\",\"status\":\"1\",\"id\":5}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:36:16', '2024-01-08 04:36:16'),
(174, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 6, '[]', '{\"technology_name\":\"Selenium\",\"status\":\"1\",\"id\":6}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:38:25', '2024-01-08 04:38:25'),
(175, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 7, '[]', '{\"technology_name\":\"Angular\",\"status\":\"1\",\"id\":7}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:38:45', '2024-01-08 04:38:45'),
(176, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 8, '[]', '{\"technology_name\":\"Jmeter\",\"status\":\"1\",\"id\":8}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:38:58', '2024-01-08 04:38:58'),
(177, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 9, '[]', '{\"technology_name\":\"Sql\",\"status\":\"1\",\"id\":9}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:39:33', '2024-01-08 04:39:33'),
(178, 'App\\Models\\User', 1, 'created', 'App\\Models\\Technology', 10, '[]', '{\"technology_name\":\"Manual testing\",\"status\":\"1\",\"id\":10}', 'https://hrms.neork.io/technology/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:39:46', '2024-01-08 04:39:46'),
(179, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Technology', 10, '{\"status\":1}', '{\"status\":\"0\"}', 'https://hrms.neork.io/technology/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:40:27', '2024-01-08 04:40:27'),
(180, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Technology', 9, '{\"status\":1}', '{\"status\":\"0\"}', 'https://hrms.neork.io/technology/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 04:40:44', '2024-01-08 04:40:44'),
(181, 'App\\Models\\User', 1, 'updated', 'App\\Models\\LeaveType', 2, '{\"status\":1}', '{\"status\":\"0\"}', 'https://hrms.neork.io/leave_type/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 06:32:50', '2024-01-08 06:32:50'),
(182, 'App\\Models\\User', 1, 'updated', 'App\\Models\\LeaveType', 3, '{\"status\":0}', '{\"status\":\"1\"}', 'https://hrms.neork.io/leave_type/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:06', '2024-01-08 06:33:06'),
(183, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 1, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":1}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:42', '2024-01-08 06:33:42'),
(184, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 2, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":2}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(185, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 3, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":3}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(186, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 4, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(187, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 5, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":5}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(188, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 6, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":6}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(189, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 7, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":7}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(190, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 8, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":8}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(191, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 9, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":9}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(192, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 10, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":10}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(193, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 11, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":11}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(194, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 12, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":12}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(195, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 13, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":13}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(196, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 14, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":14}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(197, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 15, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":15}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(198, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 16, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":16}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:51', '2024-01-08 06:33:51'),
(199, 'App\\Models\\User', 1, 'created', 'App\\Models\\Policy', 17, '[]', '{\"policy_title\":\"ghfg\",\"policy_description\":\"jkljljh\",\"effective_from\":\"2024-01-03\",\"created_by\":1,\"id\":17}', 'https://hrms.neork.io/policy/create', '137.97.95.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', NULL, '2024-01-08 06:33:51', '2024-01-08 06:33:51'),
(200, 'App\\Models\\User', 1, 'created', 'App\\Models\\LeaveType', 4, '[]', '{\"leave_type_code\":\"LT030\",\"leave_type_name\":\"Sick Leave\",\"status\":\"0\",\"created_by\":1,\"id\":4}', 'https://hrms.neork.io/leave_type/create', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-08 06:36:31', '2024-01-08 06:36:31'),
(201, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"remember_token\":\"7AzmGSn0D0iCFR3rgVDEHvBSA9THdTW5oDKaxgBmdgxU8CiadTiLcmIpx6J3\"}', '{\"remember_token\":\"zxAaOdcr4pzDz6s6usKmrEBA4uAfmtk1bBqRSqAZgXwtEtzLPWin1HETwuYc\"}', 'https://hrms.neork.io/logout', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', NULL, '2024-01-08 23:35:30', '2024-01-08 23:35:30'),
(202, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 11, '{\"designation_code\":\"D0123\"}', '{\"designation_code\":\"D0125\"}', 'https://hrms.neork.io/designation/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 21:26:20', '2024-01-09 21:26:20'),
(203, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Designation', 10, '{\"designation_code\":\"D0131\"}', '{\"designation_code\":\"D0125\"}', 'https://hrms.neork.io/designation/edit', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 21:26:29', '2024-01-09 21:26:29'),
(204, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 54, '[]', '{\"name\":\"Vinash Vipin\",\"mobile\":\"9988888877\",\"email\":\"navarsha+1@neork.com\",\"role_id\":\"3\",\"password\":\"$2y$10$0kXOz2EfBvvOG2n6f1H5Gu0Ek\\/QzJCS17.2.U4HQIwne7clZc2mMq\",\"id\":54}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 21:39:46', '2024-01-09 21:39:46'),
(205, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 54, '{\"profile_image\":null}', '{\"profile_image\":\"202401100309EMP_54.png\"}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 21:39:49', '2024-01-09 21:39:49'),
(206, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 8, '[]', '{\"user_id\":54,\"first_name\":\"Vinash\",\"last_name\":\"Vipin\",\"employee_code\":\"EMP_54\",\"gender\":\"Male\",\"blood_group\":\"A+ve\",\"marital_status\":\"Married\",\"image\":\"admin\\/assets\\/uploads\\/profile_image\\/202401100309EMP_54.png\",\"dob\":\"2006-01-02\",\"address\":\"test tets\",\"email\":\"navarsha@neork.com\",\"company_mail\":\"navarsha+1@neork.com\",\"phone\":\"9988888877\",\"aadhaar\":\"787986566532\",\"emergency_contact_name_1\":\"Vyshak\",\"emergency_contact_relation_1\":\"test\",\"emergency_contact_phone_1\":\"8799988877\",\"emergency_contact_name_2\":\"wesddfssd\",\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":\"7898656328\",\"created_by\":1,\"id\":8}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 21:39:49', '2024-01-09 21:39:49'),
(207, 'App\\Models\\User', 1, 'created', 'App\\Models\\User', 55, '[]', '{\"name\":\"Navarsha C Shaji\",\"mobile\":\"9998888777\",\"email\":\"navarsha+2@neork.com\",\"role_id\":\"2\",\"password\":\"$2y$10$\\/V\\/H79ZY3g\\/mfW1tP479dOJ22k3pfKVJ4IeCmDFZubHjAKXA7a4n2\",\"id\":55}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 22:00:16', '2024-01-09 22:00:16'),
(208, 'App\\Models\\User', 1, 'created', 'App\\Models\\EmployeeBasicInfo', 9, '[]', '{\"user_id\":55,\"first_name\":\"Navarsha\",\"last_name\":\"C Shaji\",\"employee_code\":\"EMP_55\",\"gender\":\"Male\",\"blood_group\":\"A+ve\",\"marital_status\":\"Married\",\"dob\":\"2006-01-01\",\"address\":\"gvbnm\",\"email\":\"navarsha@neork.com\",\"company_mail\":\"navarsha+2@neork.com\",\"phone\":\"9998888777\",\"aadhaar\":\"977530281122\",\"emergency_contact_name_1\":\"Verma\",\"emergency_contact_relation_1\":null,\"emergency_contact_phone_1\":\"8887778889\",\"emergency_contact_name_2\":\"Viham\",\"emergency_contact_relation_2\":null,\"emergency_contact_phone_2\":\"7778889975\",\"created_by\":1,\"id\":9}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 22:00:19', '2024-01-09 22:00:19'),
(209, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 55, '{\"profile_image\":null}', '{\"profile_image\":\"202401100401EMP_55.jpg\"}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 22:31:23', '2024-01-09 22:31:23'),
(210, 'App\\Models\\User', 1, 'updated', 'App\\Models\\EmployeeBasicInfo', 9, '{\"image\":null}', '{\"image\":\"admin\\/assets\\/uploads\\/profile_image\\/202401100401EMP_55.jpg\"}', 'https://hrms.neork.io/employee/store', '103.165.20.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL, '2024-01-09 22:31:23', '2024-01-09 22:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_code`, `designation_name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'DS01', 'Software Tester', 1, 1, '2024-01-05 03:23:33', '2024-01-05 03:24:25'),
(2, 'D00122', 'Manager', 0, 1, '2024-01-07 23:43:06', '2024-01-08 03:21:48'),
(3, 'D0123', 'Project Manager', 0, 1, '2024-01-08 03:27:39', '2024-01-08 03:27:39'),
(4, 'D0124', 'Software Engineer', 1, 1, '2024-01-08 03:30:49', '2024-01-08 03:30:49'),
(5, 'D0124', 'Senior Software Engineer', 1, 1, '2024-01-08 03:31:26', '2024-01-08 03:31:26'),
(6, 'D0125', 'Junior Software Tester', 1, 1, '2024-01-08 03:36:07', '2024-01-08 03:36:07'),
(7, 'D0126', 'Cloud Engineer', 1, 1, '2024-01-08 03:36:21', '2024-01-08 03:36:21'),
(8, 'D0127', 'Junior Cloud Engineer', 1, 1, '2024-01-08 03:37:12', '2024-01-08 03:37:12'),
(9, 'D0130', 'HR Manager', 1, 1, '2024-01-08 03:37:33', '2024-01-08 03:37:33'),
(10, 'D0125', 'HR Intern', 1, 1, '2024-01-08 03:39:50', '2024-01-09 21:26:29'),
(11, 'D0125', 'Team Lead', 1, 1, '2024-01-08 03:40:21', '2024-01-09 21:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_basic_infos`
--

CREATE TABLE `employee_basic_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employee_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhaar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact_name_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_relation_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_name_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_relation_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_basic_infos`
--

INSERT INTO `employee_basic_infos` (`id`, `user_id`, `employee_code`, `first_name`, `last_name`, `gender`, `blood_group`, `marital_status`, `dob`, `address`, `email`, `company_mail`, `phone`, `aadhaar`, `emergency_contact_name_1`, `emergency_contact_relation_1`, `emergency_contact_phone_1`, `emergency_contact_name_2`, `emergency_contact_relation_2`, `emergency_contact_phone_2`, `image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 34, 'EMP_34', 'Shaneeshma', 'T', 'Male', 'B-ve', 'Married', '2006-01-03', 'fgh', 'shaneeshma@tcs.com', 'shaneeshma@neork.com', '09999999999', '89689678678', 'Shaneeshma T', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2024-01-03 06:37:45', '2024-01-03 06:37:45'),
(2, 35, 'EMP_35', 'Navarsha', 'C Shaji', 'Female', 'A+ve', 'Married', '2006-01-03', 'gvbnm', 'admin@neork.com', 'navarsha@neork.com', 'hjkm', 'fghjn', NULL, NULL, NULL, NULL, NULL, NULL, 'admin/assets/uploads/profile_image/202401051032EMP_35.png', 1, 1, '2024-01-03 06:46:26', '2024-01-05 05:02:36'),
(3, 38, 'EMP_38', 'Varsha', 'Sooraj', 'Female', 'A+ve', 'Married', '2006-01-03', 'Nochi House', 'navarsha+43@neork.com', 'navarsha+43@neork.com', 'ssss', 'sss', 'ssss', NULL, NULL, NULL, NULL, 'ssss', NULL, 1, 1, '2024-01-04 05:40:47', '2024-01-04 05:40:47'),
(4, 40, 'EMP_40', 'Sree', 'Krishna', 'Male', 'O+ve', 'Married', '2006-01-01', 'Guruvayr Temple', 'krishnasree@neork.com', 'krishnasree@neork.com', '8887777999', '58885668654564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2024-01-04 22:41:34', '2024-01-04 22:41:34'),
(7, 53, 'EMP_53', 'Hari', 'Kumar', 'Male', 'A+ve', 'Married', '1990-03-09', 'test', 'test', 'navarsha+33@neork.com', 'hjkm', '7988', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2024-01-05 05:19:03', '2024-01-05 05:19:03'),
(8, 54, 'EMP_54', 'Vinash', 'Vipin', 'Male', 'A+ve', 'Married', '2006-01-02', 'test tets', 'navarsha@neork.com', 'navarsha+1@neork.com', '9988888877', '787986566532', 'Vyshak', 'test', '8799988877', 'wesddfssd', NULL, '7898656328', 'admin/assets/uploads/profile_image/202401100309EMP_54.png', 1, 1, '2024-01-09 21:39:49', '2024-01-09 21:39:49'),
(9, 55, 'EMP_55', 'Navarsha', 'C Shaji', 'Male', 'A+ve', 'Married', '2006-01-01', 'gvbnm', 'navarsha@neork.com', 'navarsha+2@neork.com', '9998888777', '977530281122', 'Verma', NULL, '8887778889', 'Viham', NULL, '7778889975', 'admin/assets/uploads/profile_image/202401100401EMP_55.jpg', 1, 1, '2024-01-09 22:00:19', '2024-01-09 22:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_educations`
--

CREATE TABLE `employee_educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` text COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `percentage` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_educations`
--

INSERT INTO `employee_educations` (`id`, `user_id`, `qualification`, `specialization`, `institution`, `start_date`, `end_date`, `percentage`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(19, 40, 'Mtech', 'Water Resource', 'Govt. Engineering College, Thrissur', '2016-08-01', '2018-07-31', '81', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(20, 40, 'dfxgxcv', 'cvbcv', 'cfcfxg', '2024-01-05', '2024-01-18', '33', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_experiences`
--

CREATE TABLE `employee_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employer_name` text COLLATE utf8mb4_unicode_ci,
  `position_held` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_experiences`
--

INSERT INTO `employee_experiences` (`id`, `user_id`, `employer_name`, `position_held`, `start_date`, `end_date`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(6, 40, 'zsxdsdxvfx', 'qa', '2024-01-03', '2024-01-11', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(7, 40, NULL, NULL, '1970-01-01', '1970-01-01', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(8, 40, NULL, NULL, '1970-01-01', '1970-01-01', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49'),
(9, 40, 'dfgdfh', 'fdgdf', '2024-01-04', '2024-01-08', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_details`
--

CREATE TABLE `employee_leave_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_leaves_alloted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_to` date DEFAULT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leave_details`
--

INSERT INTO `employee_leave_details` (`id`, `user_id`, `no_of_leaves_alloted`, `effective_from`, `effective_to`, `leave_type_id`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(4, 35, '5', '2024-01-05', '2024-01-12', 1, 1, 1, '2024-01-05 05:13:48', '2024-01-05 05:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `employee_professional_details`
--

CREATE TABLE `employee_professional_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_joining` date NOT NULL,
  `relieving_date` date DEFAULT NULL,
  `technology_used` text COLLATE utf8mb4_unicode_ci,
  `supervisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_details`
--

CREATE TABLE `employee_salary_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `basic_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pf_contribution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hra` text COLLATE utf8mb4_unicode_ci,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_details`
--

INSERT INTO `employee_salary_details` (`id`, `user_id`, `basic_pay`, `da`, `pf_contribution`, `hra`, `bank_name`, `branch`, `account_number`, `ifsc`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 40, '3500', '5000', '1000', '2000', 'hdfc', 'kodakara', 'test', 'dgfg', 1, 1, '2024-01-05 00:53:49', '2024-01-05 00:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_roles`
--

CREATE TABLE `job_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_roles`
--

INSERT INTO `job_roles` (`id`, `job_role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 1, '2024-01-05 03:23:51', '2024-01-05 03:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_type_code`, `leave_type_name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 'ssss', 1, 1, '2024-01-05 01:00:07', '2024-01-05 01:00:07'),
(2, 'LT001', 'Annual leave', 0, 1, '2024-01-07 23:47:25', '2024-01-08 06:32:50'),
(3, 'LT0030', 'Casual Leave', 1, 1, '2024-01-07 23:47:54', '2024-01-08 06:33:06'),
(4, 'LT030', 'Sick Leave', 0, 1, '2024-01-08 06:36:31', '2024-01-08 06:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, '2023_10_18_095946_create_permission_tables', 1),
(7, '2023_11_03_194105_create_role_permissions_table', 1),
(8, '2023_11_14_071801_add_profile_image_to_users', 1),
(9, '2023_11_20_072007_create_categories_table', 1),
(10, '2023_11_27_053358_create_notifications_table', 1),
(11, '2023_11_28_154611_create_notification_recipients_table', 1),
(12, '2023_11_29_103857_create_technologies', 1),
(13, '2023_11_30_060746_create_designations', 1),
(14, '2023_11_30_083941_create_skills', 1),
(15, '2023_11_30_091451_create_leave_types', 1),
(16, '2023_11_30_095043_create_job_role', 1),
(17, '2023_11_30_102650_create_department', 1),
(18, '2023_12_01_050107_create_policies', 1),
(19, '2023_12_20_061520_create_employee_basic_info', 1),
(20, '2023_12_20_061530_create_employee_education', 1),
(21, '2023_12_20_061538_create_employee_experience', 1),
(22, '2023_12_20_061545_create_employee_documents', 1),
(23, '2023_12_20_061609_create_employee_professional_details', 1),
(24, '2023_12_20_061624_create_employee_salary_details', 1),
(25, '2023_12_20_061630_create_employee_leave_details', 1),
(26, '2023_12_21_035619_create_audits_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `recipient_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_recipients`
--

CREATE TABLE `notification_recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policy_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_from` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `policy_title`, `policy_description`, `effective_from`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:42', '2024-01-08 06:33:42'),
(2, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(3, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(4, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(5, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:48', '2024-01-08 06:33:48'),
(6, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(7, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(8, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(9, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(10, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:49', '2024-01-08 06:33:49'),
(11, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(12, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(13, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(14, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(15, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:50', '2024-01-08 06:33:50'),
(16, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:51', '2024-01-08 06:33:51'),
(17, 'ghfg', 'jkljljh', '2024-01-03', 1, 1, '2024-01-08 06:33:51', '2024-01-08 06:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'Admin Full Access', NULL, '2024-01-03 05:20:16', NULL),
(2, 'Admin', 'HR Admin Full Access', NULL, '2024-01-03 05:20:16', NULL),
(3, 'Employee', 'Employee Limited Access', NULL, '2024-01-03 05:20:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 1, 'Role-View', '2024-01-03 04:46:50', NULL),
(2, 1, 'Role-Create', '2024-01-03 04:46:50', NULL),
(3, 1, 'Role-Update', '2024-01-03 04:46:50', NULL),
(4, 1, 'Role-Delete', '2024-01-03 04:46:50', NULL),
(5, 1, 'User-View', '2024-01-03 04:46:50', NULL),
(6, 1, 'User-Create', '2024-01-03 04:46:50', NULL),
(7, 1, 'User-Update', '2024-01-03 04:46:50', NULL),
(8, 1, 'User-Delete', '2024-01-03 04:46:50', NULL),
(9, 1, 'User-Change Password', '2024-01-03 04:46:50', NULL),
(10, 1, 'Policies-View', '2024-01-03 04:46:50', NULL),
(11, 1, 'Policies-Create', '2024-01-03 04:46:50', NULL),
(12, 1, 'Policies-Update', '2024-01-03 04:46:50', NULL),
(13, 1, 'Policies-Delete', '2024-01-03 04:46:50', NULL),
(14, 1, 'Technology-View', '2024-01-03 04:46:50', NULL),
(15, 1, 'Technology-Create', '2024-01-03 04:46:50', NULL),
(16, 1, 'Technology-Update', '2024-01-03 04:46:50', NULL),
(17, 1, 'Technology-Delete', '2024-01-03 04:46:50', NULL),
(18, 1, 'Job Role-View', '2024-01-03 04:46:50', NULL),
(19, 1, 'Job Role-Create', '2024-01-03 04:46:50', NULL),
(20, 1, 'Job Role-Update', '2024-01-03 04:46:50', NULL),
(21, 1, 'Job Role-Delete', '2024-01-03 04:46:50', NULL),
(22, 1, 'Skill-View', '2024-01-03 04:46:50', NULL),
(23, 1, 'Skill-Create', '2024-01-03 04:46:50', NULL),
(24, 1, 'Skill-Update', '2024-01-03 04:46:50', NULL),
(25, 1, 'Skill-Delete', '2024-01-03 04:46:50', NULL),
(26, 1, 'Designation-View', '2024-01-03 04:46:50', NULL),
(27, 1, 'Designation-Create', '2024-01-03 04:46:50', NULL),
(28, 1, 'Designation-Update', '2024-01-03 04:46:50', NULL),
(29, 1, 'Designation-Delete', '2024-01-03 04:46:50', NULL),
(30, 1, 'Department-View', '2024-01-03 04:46:50', NULL),
(31, 1, 'Department-Create', '2024-01-03 04:46:50', NULL),
(32, 1, 'Department-Update', '2024-01-03 04:46:50', NULL),
(33, 1, 'Department-Delete', '2024-01-03 04:46:50', NULL),
(34, 1, 'LeaveType-View', '2024-01-03 04:46:50', NULL),
(35, 1, 'LeaveType-Create', '2024-01-03 04:46:50', NULL),
(36, 1, 'LeaveType-Update', '2024-01-03 04:46:50', NULL),
(37, 1, 'LeaveType-Delete', '2024-01-03 04:46:50', NULL),
(38, 1, 'Employee Category-View', '2024-01-03 04:46:50', NULL),
(39, 1, 'Employee Category-Create', '2024-01-03 04:46:50', NULL),
(40, 1, 'Employee Category-Update', '2024-01-03 04:46:50', NULL),
(41, 1, 'Employee Category-Delete', '2024-01-03 04:46:50', NULL),
(42, 1, 'Sub Category-View', '2024-01-03 04:46:50', NULL),
(43, 1, 'Sub Category-Create', '2024-01-03 04:46:50', NULL),
(44, 1, 'Sub Category-Update', '2024-01-03 04:46:50', NULL),
(45, 1, 'Sub Category-Delete', '2024-01-03 04:46:50', NULL),
(46, 1, 'Notification-View', '2024-01-03 04:46:50', NULL),
(47, 1, 'Notification-Create', '2024-01-03 04:46:50', NULL),
(48, 1, 'Notification-Delete', '2024-01-03 04:46:50', NULL),
(49, 1, 'Site Settings-View', '2024-01-03 04:46:50', NULL),
(50, 1, 'Site Settings-Update', '2024-01-03 04:46:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technology_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `technology_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 1, '2024-01-05 03:33:07', '2024-01-05 03:33:07'),
(2, 'Python', 1, '2024-01-07 23:45:33', '2024-01-07 23:46:18'),
(3, 'java', 0, '2024-01-07 23:46:33', '2024-01-07 23:46:33'),
(4, 'html css', 1, '2024-01-08 04:34:58', '2024-01-08 04:34:58'),
(5, 'Laravel', 1, '2024-01-08 04:36:16', '2024-01-08 04:36:16'),
(6, 'Selenium', 1, '2024-01-08 04:38:24', '2024-01-08 04:38:24'),
(7, 'Angular', 1, '2024-01-08 04:38:45', '2024-01-08 04:38:45'),
(8, 'Jmeter', 1, '2024-01-08 04:38:58', '2024-01-08 04:38:58'),
(9, 'Sql', 0, '2024-01-08 04:39:33', '2024-01-08 04:40:44'),
(10, 'Manual testing', 0, '2024-01-08 04:39:46', '2024-01-08 04:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` blob,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `role_id`, `email`, `profile_image`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 1, 'admin@neork.com', NULL, NULL, '$2y$10$jy7PDpK2OrVDBoej8cSEpupNCt/bGQS.oXbkfdBgQ44DzYqsSWBVe', 1, 'zxAaOdcr4pzDz6s6usKmrEBA4uAfmtk1bBqRSqAZgXwtEtzLPWin1HETwuYc', '2023-11-06 20:50:00', '2024-01-03 04:46:50'),
(34, 'Shaneeshma T', '09999999999', 3, 'shaneeshma@neork.com', NULL, NULL, '$2y$10$8xYPE8/SoCKLfBlYxsLRYOw09WpZDdppsF4TmOjxuCpSBOUnb.9qa', 1, NULL, '2024-01-03 06:37:43', '2024-01-03 06:37:43'),
(35, 'Navarsha C Shaji', 'hjkm', 3, 'navarsha@neork.com', 0x323032343031303531303332454d505f33352e706e67, NULL, '$2y$10$oFwBaJwOLivJkK8h4Iautew4G6YGGsUqz1Ce2BLaPiZhhNEuL72mC', 1, NULL, '2024-01-03 06:46:21', '2024-01-05 05:02:36'),
(38, 'Varsha Sooraj', 'ssss', 3, 'navarsha+43@neork.com', NULL, NULL, '$2y$10$TKudOV1k4mFo5y7o2Ld/pOPst.m8gaUs9I5vIt96efhHNsdqhv4Jy', 1, NULL, '2024-01-04 05:40:43', '2024-01-04 05:40:43'),
(40, 'Sree Krishna', '8887777999', 3, 'krishnasree@neork.com', NULL, NULL, '$2y$10$3Z5FxojEWN/LP2IZoYqLoOm42c4bt3n6wGSf5A7DPpUNteadJuiE2', 1, NULL, '2024-01-04 22:41:31', '2024-01-04 22:41:31'),
(53, 'Hari Kumar', 'hjkm', 2, 'navarsha+33@neork.com', NULL, NULL, '$2y$10$Nlo2MOt0H4gSHT1mS5KRIOTdGfx5HFsnseUOAFaDsIuIkETjoBv2u', 1, 'tojKEwawU7mP19q8NfMuD57Kt7EqCMC7VHc7NW2zy02rrVnBljp25Ti5DDQm', '2024-01-05 05:19:00', '2024-01-05 05:19:00'),
(54, 'Vinash Vipin', '9988888877', 3, 'navarsha+1@neork.com', 0x323032343031313030333039454d505f35342e706e67, NULL, '$2y$10$0kXOz2EfBvvOG2n6f1H5Gu0Ek/QzJCS17.2.U4HQIwne7clZc2mMq', 1, NULL, '2024-01-09 21:39:46', '2024-01-09 21:39:49'),
(55, 'Navarsha C Shaji', '9998888777', 2, 'navarsha+2@neork.com', 0x323032343031313030343031454d505f35352e6a7067, NULL, '$2y$10$/V/H79ZY3g/mfW1tP479dOJ22k3pfKVJ4IeCmDFZubHjAKXA7a4n2', 1, NULL, '2024-01-09 22:00:16', '2024-01-09 22:31:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_created_by_foreign` (`created_by`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_basic_infos`
--
ALTER TABLE `employee_basic_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_basic_infos_user_id_foreign` (`user_id`),
  ADD KEY `employee_basic_infos_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_documents_user_id_foreign` (`user_id`),
  ADD KEY `employee_documents_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_educations`
--
ALTER TABLE `employee_educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_educations_user_id_foreign` (`user_id`),
  ADD KEY `employee_educations_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_experiences`
--
ALTER TABLE `employee_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_experiences_user_id_foreign` (`user_id`),
  ADD KEY `employee_experiences_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_leave_details`
--
ALTER TABLE `employee_leave_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_leave_details_leave_type_id_foreign` (`leave_type_id`),
  ADD KEY `employee_leave_details_user_id_foreign` (`user_id`),
  ADD KEY `employee_leave_details_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_professional_details`
--
ALTER TABLE `employee_professional_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_professional_details_designation_id_foreign` (`designation_id`),
  ADD KEY `employee_professional_details_supervisor_id_foreign` (`supervisor_id`),
  ADD KEY `employee_professional_details_user_id_foreign` (`user_id`),
  ADD KEY `employee_professional_details_created_by_foreign` (`created_by`);

--
-- Indexes for table `employee_salary_details`
--
ALTER TABLE `employee_salary_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salary_details_user_id_foreign` (`user_id`),
  ADD KEY `employee_salary_details_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_roles`
--
ALTER TABLE `job_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_types_created_by_foreign` (`created_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_recipients`
--
ALTER TABLE `notification_recipients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_recipients_notification_id_foreign` (`notification_id`),
  ADD KEY `notification_recipients_user_id_foreign` (`user_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `policies_created_by_foreign` (`created_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_index` (`permission`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
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
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_basic_infos`
--
ALTER TABLE `employee_basic_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_educations`
--
ALTER TABLE `employee_educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee_experiences`
--
ALTER TABLE `employee_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_leave_details`
--
ALTER TABLE `employee_leave_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_professional_details`
--
ALTER TABLE `employee_professional_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_details`
--
ALTER TABLE `employee_salary_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_roles`
--
ALTER TABLE `job_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_recipients`
--
ALTER TABLE `notification_recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_basic_infos`
--
ALTER TABLE `employee_basic_infos`
  ADD CONSTRAINT `employee_basic_infos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_basic_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD CONSTRAINT `employee_documents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_educations`
--
ALTER TABLE `employee_educations`
  ADD CONSTRAINT `employee_educations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_experiences`
--
ALTER TABLE `employee_experiences`
  ADD CONSTRAINT `employee_experiences_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_leave_details`
--
ALTER TABLE `employee_leave_details`
  ADD CONSTRAINT `employee_leave_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_leave_details_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`),
  ADD CONSTRAINT `employee_leave_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_professional_details`
--
ALTER TABLE `employee_professional_details`
  ADD CONSTRAINT `employee_professional_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_professional_details_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`),
  ADD CONSTRAINT `employee_professional_details_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_professional_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_salary_details`
--
ALTER TABLE `employee_salary_details`
  ADD CONSTRAINT `employee_salary_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_salary_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD CONSTRAINT `leave_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_recipients`
--
ALTER TABLE `notification_recipients`
  ADD CONSTRAINT `notification_recipients_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_recipients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
