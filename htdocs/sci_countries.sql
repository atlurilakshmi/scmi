-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 26, 2009 at 12:46 PM
-- Server version: 5.0.15
-- PHP Version: 5.0.5
-- 
-- Database: `db_scimores`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `sci_countries`
-- 

CREATE TABLE `sci_countries` (
  `CountryId` int(10) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `CurrencyCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `sci_countries`
-- 

INSERT INTO `sci_countries` VALUES (1, 'Afghanistan', 'AFA');
INSERT INTO `sci_countries` VALUES (2, 'Albania', 'ALL');
INSERT INTO `sci_countries` VALUES (3, 'Algeria', 'DZD');
INSERT INTO `sci_countries` VALUES (4, 'American Samoa', 'USD');
INSERT INTO `sci_countries` VALUES (5, 'Andorra', 'EUR');
INSERT INTO `sci_countries` VALUES (6, 'Angola', 'AOA');
INSERT INTO `sci_countries` VALUES (7, 'Anguilla', 'XCD');
INSERT INTO `sci_countries` VALUES (8, 'Antarctica', '');
INSERT INTO `sci_countries` VALUES (9, 'Antigua and Barbuda', 'XCD');
INSERT INTO `sci_countries` VALUES (10, 'Argentina', 'ARS');
INSERT INTO `sci_countries` VALUES (11, 'Armenia', 'AMD');
INSERT INTO `sci_countries` VALUES (12, 'Aruba', 'AWG');
INSERT INTO `sci_countries` VALUES (13, 'Ashmore and Cartier', '');
INSERT INTO `sci_countries` VALUES (14, 'Australia', 'AUD');
INSERT INTO `sci_countries` VALUES (15, 'Austria', 'EUR');
INSERT INTO `sci_countries` VALUES (16, 'Azerbaijan', 'AZM');
INSERT INTO `sci_countries` VALUES (17, 'The Bahamas', 'BSD');
INSERT INTO `sci_countries` VALUES (18, 'Bahrain', 'BHD');
INSERT INTO `sci_countries` VALUES (19, 'Baker Island', '');
INSERT INTO `sci_countries` VALUES (20, 'Bangladesh', 'BDT');
INSERT INTO `sci_countries` VALUES (21, 'Barbados', 'BBD');
INSERT INTO `sci_countries` VALUES (22, 'Bassas da India', '');
INSERT INTO `sci_countries` VALUES (23, 'Belarus', 'BYR');
INSERT INTO `sci_countries` VALUES (24, 'Belgium', 'EUR');
INSERT INTO `sci_countries` VALUES (25, 'Belize', 'BZD');
INSERT INTO `sci_countries` VALUES (26, 'Benin', 'XOF');
INSERT INTO `sci_countries` VALUES (27, 'Bermuda', 'BMD');
INSERT INTO `sci_countries` VALUES (28, 'Bhutan', 'BTN');
INSERT INTO `sci_countries` VALUES (29, 'Bolivia', 'BOB');
INSERT INTO `sci_countries` VALUES (30, 'Bosnia and Herzegovina', 'BAM');
INSERT INTO `sci_countries` VALUES (31, 'Botswana', 'BWP');
INSERT INTO `sci_countries` VALUES (32, 'Bouvet Island', 'NOK');
INSERT INTO `sci_countries` VALUES (33, 'Brazil', 'BRL');
INSERT INTO `sci_countries` VALUES (34, 'British Indian Ocean Territory', 'USD');
INSERT INTO `sci_countries` VALUES (35, 'British Virgin Islands', 'USD');
INSERT INTO `sci_countries` VALUES (36, 'Brunei Darussalam', 'BND');
INSERT INTO `sci_countries` VALUES (37, 'Bulgaria', 'BGN');
INSERT INTO `sci_countries` VALUES (38, 'Burkina Faso', 'XOF');
INSERT INTO `sci_countries` VALUES (39, 'Burma', 'MMK');
INSERT INTO `sci_countries` VALUES (40, 'Burundi', 'BIF');
INSERT INTO `sci_countries` VALUES (41, 'Cambodia', 'KHR');
INSERT INTO `sci_countries` VALUES (42, 'Cameroon', 'XAF');
INSERT INTO `sci_countries` VALUES (43, 'Canada', 'CAD');
INSERT INTO `sci_countries` VALUES (44, 'Cape Verde', 'CVE');
INSERT INTO `sci_countries` VALUES (45, 'Cayman Islands', 'KYD');
INSERT INTO `sci_countries` VALUES (46, 'Central African Republic', 'XAF');
INSERT INTO `sci_countries` VALUES (47, 'Chad', 'XAF');
INSERT INTO `sci_countries` VALUES (48, 'Chile', 'CLP');
INSERT INTO `sci_countries` VALUES (49, 'China', 'CNY');
INSERT INTO `sci_countries` VALUES (50, 'Christmas Island', 'AUD');
INSERT INTO `sci_countries` VALUES (51, 'Clipperton Island', '');
INSERT INTO `sci_countries` VALUES (52, 'Cocos (Keeling) Islands', 'AUD');
INSERT INTO `sci_countries` VALUES (53, 'Colombia', 'COP');
INSERT INTO `sci_countries` VALUES (54, 'Comoros', 'KMF');
INSERT INTO `sci_countries` VALUES (55, 'Congo, Democratic Republic of the', 'CDF');
INSERT INTO `sci_countries` VALUES (56, 'Congo, Republic of the', 'XAF');
INSERT INTO `sci_countries` VALUES (57, 'Cook Islands', 'NZD');
INSERT INTO `sci_countries` VALUES (58, 'Coral Sea Islands', '');
INSERT INTO `sci_countries` VALUES (59, 'Costa Rica', 'CRC');
INSERT INTO `sci_countries` VALUES (60, 'Cote d''Ivoire', 'XOF');
INSERT INTO `sci_countries` VALUES (61, 'Croatia', 'HRK');
INSERT INTO `sci_countries` VALUES (62, 'Cuba', 'CUP');
INSERT INTO `sci_countries` VALUES (63, 'Cyprus', 'CYP');
INSERT INTO `sci_countries` VALUES (64, 'Czech Republic', 'CZK');
INSERT INTO `sci_countries` VALUES (65, 'Denmark', 'DKK');
INSERT INTO `sci_countries` VALUES (66, 'Djibouti', 'DJF');
INSERT INTO `sci_countries` VALUES (67, 'Dominica', 'XCD');
INSERT INTO `sci_countries` VALUES (68, 'Dominican Republic', 'DOP');
INSERT INTO `sci_countries` VALUES (69, 'East Timor', 'TPE');
INSERT INTO `sci_countries` VALUES (70, 'Ecuador', 'USD');
INSERT INTO `sci_countries` VALUES (71, 'Egypt', 'EGP');
INSERT INTO `sci_countries` VALUES (72, 'El Salvador', 'SVC');
INSERT INTO `sci_countries` VALUES (73, 'Equatorial Guinea', 'XAF');
INSERT INTO `sci_countries` VALUES (74, 'Eritrea', 'ERN');
INSERT INTO `sci_countries` VALUES (75, 'Estonia', 'EEK');
INSERT INTO `sci_countries` VALUES (76, 'Ethiopia', 'ETB');
INSERT INTO `sci_countries` VALUES (77, 'Europa Island', '');
INSERT INTO `sci_countries` VALUES (78, 'Falkland Islands (Islas Malvinas)', 'FKP');
INSERT INTO `sci_countries` VALUES (79, 'Faroe Islands', 'DKK');
INSERT INTO `sci_countries` VALUES (80, 'Fiji', 'FJD');
INSERT INTO `sci_countries` VALUES (81, 'Finland', 'EUR');
INSERT INTO `sci_countries` VALUES (82, 'France', 'EUR');
INSERT INTO `sci_countries` VALUES (83, 'France, Metropolitan', 'EUR');
INSERT INTO `sci_countries` VALUES (84, 'French Guiana', 'EUR');
INSERT INTO `sci_countries` VALUES (85, 'French Polynesia', 'XPF');
INSERT INTO `sci_countries` VALUES (86, 'French Southern and Antarctic Lands', 'EUR');
INSERT INTO `sci_countries` VALUES (87, 'Gabon', 'XAF');
INSERT INTO `sci_countries` VALUES (88, 'The Gambia', 'GMD');
INSERT INTO `sci_countries` VALUES (89, 'Gaza Strip', 'ILS');
INSERT INTO `sci_countries` VALUES (90, 'Georgia', 'GEL');
INSERT INTO `sci_countries` VALUES (91, 'Germany', 'EUR');
INSERT INTO `sci_countries` VALUES (92, 'Ghana', 'GHC');
INSERT INTO `sci_countries` VALUES (93, 'Gibraltar', 'GIP');
INSERT INTO `sci_countries` VALUES (94, 'Glorioso Islands', '');
INSERT INTO `sci_countries` VALUES (95, 'Greece', 'EUR');
INSERT INTO `sci_countries` VALUES (96, 'Greenland', 'DKK');
INSERT INTO `sci_countries` VALUES (97, 'Grenada', 'XCD');
INSERT INTO `sci_countries` VALUES (98, 'Guadeloupe', 'EUR');
INSERT INTO `sci_countries` VALUES (99, 'Guam', 'USD');
INSERT INTO `sci_countries` VALUES (100, 'Guatemala', 'GTQ');
INSERT INTO `sci_countries` VALUES (101, 'Guernsey', 'GBP');
INSERT INTO `sci_countries` VALUES (102, 'Guinea', 'GNF');
INSERT INTO `sci_countries` VALUES (103, 'Guinea-Bissau', 'XOF');
INSERT INTO `sci_countries` VALUES (104, 'Guyana', 'GYD');
INSERT INTO `sci_countries` VALUES (105, 'Haiti', 'HTG');
INSERT INTO `sci_countries` VALUES (106, 'Heard Island and McDonald Islands', 'AUD');
INSERT INTO `sci_countries` VALUES (107, 'Holy See (Vatican City)', 'EUR');
INSERT INTO `sci_countries` VALUES (108, 'Honduras', 'HNL');
INSERT INTO `sci_countries` VALUES (109, 'Hong Kong (SAR)', 'HKD');
INSERT INTO `sci_countries` VALUES (110, 'Howland Island', '');
INSERT INTO `sci_countries` VALUES (111, 'Hungary', 'HUF');
INSERT INTO `sci_countries` VALUES (112, 'Iceland', 'ISK');
INSERT INTO `sci_countries` VALUES (113, 'India', 'INR');
INSERT INTO `sci_countries` VALUES (114, 'Indonesia', 'IDR');
INSERT INTO `sci_countries` VALUES (115, 'Iran', 'IRR');
INSERT INTO `sci_countries` VALUES (116, 'Iraq', 'IQD');
INSERT INTO `sci_countries` VALUES (117, 'Ireland', 'EUR');
INSERT INTO `sci_countries` VALUES (118, 'Israel', 'ILS');
INSERT INTO `sci_countries` VALUES (119, 'Italy', 'EUR');
INSERT INTO `sci_countries` VALUES (120, 'Jamaica', 'JMD');
INSERT INTO `sci_countries` VALUES (121, 'Jan Mayen', 'NOK');
INSERT INTO `sci_countries` VALUES (122, 'Japan', 'JPY');
INSERT INTO `sci_countries` VALUES (123, 'Jarvis Island', '');
INSERT INTO `sci_countries` VALUES (124, 'Jersey', 'GBP');
INSERT INTO `sci_countries` VALUES (125, 'Johnston Atoll', '');
INSERT INTO `sci_countries` VALUES (126, 'Jordan', 'JOD');
INSERT INTO `sci_countries` VALUES (127, 'Juan de Nova Island', '');
INSERT INTO `sci_countries` VALUES (128, 'Kazakhstan', 'KZT');
INSERT INTO `sci_countries` VALUES (129, 'Kenya', 'KES');
INSERT INTO `sci_countries` VALUES (130, 'Kingman Reef', '');
INSERT INTO `sci_countries` VALUES (131, 'Kiribati', 'AUD');
INSERT INTO `sci_countries` VALUES (132, 'Korea, North', 'KPW');
INSERT INTO `sci_countries` VALUES (133, 'Korea, South', 'KRW');
INSERT INTO `sci_countries` VALUES (134, 'Kuwait', 'KWD');
INSERT INTO `sci_countries` VALUES (135, 'Kyrgyzstan', 'KGS');
INSERT INTO `sci_countries` VALUES (136, 'Laos', 'LAK');
INSERT INTO `sci_countries` VALUES (137, 'Latvia', 'LVL');
INSERT INTO `sci_countries` VALUES (138, 'Lebanon', 'LBP');
INSERT INTO `sci_countries` VALUES (139, 'Lesotho', 'LSL');
INSERT INTO `sci_countries` VALUES (140, 'Liberia', 'LRD');
INSERT INTO `sci_countries` VALUES (141, 'Libya', 'LYD');
INSERT INTO `sci_countries` VALUES (142, 'Liechtenstein', 'CHF');
INSERT INTO `sci_countries` VALUES (143, 'Lithuania', 'LTL');
INSERT INTO `sci_countries` VALUES (144, 'Luxembourg', 'EUR');
INSERT INTO `sci_countries` VALUES (145, 'Macao', 'MOP');
INSERT INTO `sci_countries` VALUES (146, 'Macedonia, The Former Yugoslav Republic of', 'MKD');
INSERT INTO `sci_countries` VALUES (147, 'Madagascar', 'MGF');
INSERT INTO `sci_countries` VALUES (148, 'Malawi', 'MWK');
INSERT INTO `sci_countries` VALUES (149, 'Malaysia', 'MYR');
INSERT INTO `sci_countries` VALUES (150, 'Maldives', 'MVR');
INSERT INTO `sci_countries` VALUES (151, 'Mali', 'XOF');
INSERT INTO `sci_countries` VALUES (152, 'Malta', 'MTL');
INSERT INTO `sci_countries` VALUES (153, 'Man, Isle of', 'GBP');
INSERT INTO `sci_countries` VALUES (154, 'Marshall Islands', 'USD');
INSERT INTO `sci_countries` VALUES (155, 'Martinique', 'EUR');
INSERT INTO `sci_countries` VALUES (156, 'Mauritania', 'MRO');
INSERT INTO `sci_countries` VALUES (157, 'Mauritius', 'MUR');
INSERT INTO `sci_countries` VALUES (158, 'Mayotte', 'EUR');
INSERT INTO `sci_countries` VALUES (159, 'Mexico', 'MXN');
INSERT INTO `sci_countries` VALUES (160, 'Micronesia, Federated States of', 'USD');
INSERT INTO `sci_countries` VALUES (161, 'Midway Islands', 'USD');
INSERT INTO `sci_countries` VALUES (162, 'Miscellaneous (French)', '');
INSERT INTO `sci_countries` VALUES (163, 'Moldova', 'MDL');
INSERT INTO `sci_countries` VALUES (164, 'Monaco', 'EUR');
INSERT INTO `sci_countries` VALUES (165, 'Mongolia', 'MNT');
INSERT INTO `sci_countries` VALUES (166, 'Montenegro', '');
INSERT INTO `sci_countries` VALUES (167, 'Montserrat', 'XCD');
INSERT INTO `sci_countries` VALUES (168, 'Morocco', 'MAD');
INSERT INTO `sci_countries` VALUES (169, 'Mozambique', 'MZM');
INSERT INTO `sci_countries` VALUES (170, 'Myanmar', 'MMK');
INSERT INTO `sci_countries` VALUES (171, 'Namibia', 'NAD');
INSERT INTO `sci_countries` VALUES (172, 'Nauru', 'AUD');
INSERT INTO `sci_countries` VALUES (173, 'Navassa Island', '');
INSERT INTO `sci_countries` VALUES (174, 'Nepal', 'NPR');
INSERT INTO `sci_countries` VALUES (175, 'Netherlands', 'EUR');
INSERT INTO `sci_countries` VALUES (176, 'Netherlands Antilles', 'ANG');
INSERT INTO `sci_countries` VALUES (177, 'New Caledonia', 'XPF');
INSERT INTO `sci_countries` VALUES (178, 'New Zealand', 'NZD');
INSERT INTO `sci_countries` VALUES (179, 'Nicaragua', 'NIO');
INSERT INTO `sci_countries` VALUES (180, 'Niger', 'XOF');
INSERT INTO `sci_countries` VALUES (181, 'Nigeria', 'NGN');
INSERT INTO `sci_countries` VALUES (182, 'Niue', 'NZD');
INSERT INTO `sci_countries` VALUES (183, 'Norfolk Island', 'AUD');
INSERT INTO `sci_countries` VALUES (184, 'Northern Mariana Islands', 'USD');
INSERT INTO `sci_countries` VALUES (185, 'Norway', 'NOK');
INSERT INTO `sci_countries` VALUES (186, 'Oman', 'OMR');
INSERT INTO `sci_countries` VALUES (187, 'Pakistan', 'PKR');
INSERT INTO `sci_countries` VALUES (188, 'Palau', 'USD');
INSERT INTO `sci_countries` VALUES (189, 'Palmyra Atoll', '');
INSERT INTO `sci_countries` VALUES (190, 'Panama', 'PAB');
INSERT INTO `sci_countries` VALUES (191, 'Papua New Guinea', 'PGK');
INSERT INTO `sci_countries` VALUES (192, 'Paracel Islands', '');
INSERT INTO `sci_countries` VALUES (193, 'Paraguay', 'PYG');
INSERT INTO `sci_countries` VALUES (194, 'Peru', 'PEN');
INSERT INTO `sci_countries` VALUES (195, 'Philippines', 'PHP');
INSERT INTO `sci_countries` VALUES (196, 'Pitcairn Islands', 'NZD');
INSERT INTO `sci_countries` VALUES (197, 'Poland', 'PLN');
INSERT INTO `sci_countries` VALUES (198, 'Portugal', 'EUR');
INSERT INTO `sci_countries` VALUES (199, 'Puerto Rico', 'USD');
INSERT INTO `sci_countries` VALUES (200, 'Qatar', 'QAR');
INSERT INTO `sci_countries` VALUES (201, 'R?union', 'EUR');
INSERT INTO `sci_countries` VALUES (202, 'Romania', 'ROL');
INSERT INTO `sci_countries` VALUES (203, 'Russia', 'RUB');
INSERT INTO `sci_countries` VALUES (204, 'Rwanda', 'RWF');
INSERT INTO `sci_countries` VALUES (205, 'Saint Helena', 'SHP');
INSERT INTO `sci_countries` VALUES (206, 'Saint Kitts and Nevis', 'XCD');
INSERT INTO `sci_countries` VALUES (207, 'Saint Lucia', 'XCD');
INSERT INTO `sci_countries` VALUES (208, 'Saint Pierre and Miquelon', 'EUR');
INSERT INTO `sci_countries` VALUES (209, 'Saint Vincent and the Grenadines', 'XCD');
INSERT INTO `sci_countries` VALUES (210, 'Samoa', 'WST');
INSERT INTO `sci_countries` VALUES (211, 'San Marino', 'EUR');
INSERT INTO `sci_countries` VALUES (212, 'S?o Tom? and Pr?ncipe', 'STD');
INSERT INTO `sci_countries` VALUES (213, 'Saudi Arabia', 'SAR');
INSERT INTO `sci_countries` VALUES (214, 'Senegal', 'XOF');
INSERT INTO `sci_countries` VALUES (215, 'Serbia', '');
INSERT INTO `sci_countries` VALUES (216, 'Serbia and Montenegro', '');
INSERT INTO `sci_countries` VALUES (217, 'Seychelles', 'SCR');
INSERT INTO `sci_countries` VALUES (218, 'Sierra Leone', 'SLL');
INSERT INTO `sci_countries` VALUES (219, 'Singapore', 'SGD');
INSERT INTO `sci_countries` VALUES (220, 'Slovakia', 'SKK');
INSERT INTO `sci_countries` VALUES (221, 'Slovenia', 'EUR');
INSERT INTO `sci_countries` VALUES (222, 'Solomon Islands', 'SBD');
INSERT INTO `sci_countries` VALUES (223, 'Somalia', 'SOS');
INSERT INTO `sci_countries` VALUES (224, 'South Africa', 'ZAR');
INSERT INTO `sci_countries` VALUES (225, 'South Georgia and the South Sandwich Islands', 'GBP');
INSERT INTO `sci_countries` VALUES (226, 'Spain', 'EUR');
INSERT INTO `sci_countries` VALUES (227, 'Spratly Islands', '');
INSERT INTO `sci_countries` VALUES (228, 'Sri Lanka', 'LKR');
INSERT INTO `sci_countries` VALUES (229, 'Sudan', 'SDD');
INSERT INTO `sci_countries` VALUES (230, 'Suriname', 'SRG');
INSERT INTO `sci_countries` VALUES (231, 'Svalbard', 'NOK');
INSERT INTO `sci_countries` VALUES (232, 'Swaziland', 'SZL');
INSERT INTO `sci_countries` VALUES (233, 'Sweden', 'SEK');
INSERT INTO `sci_countries` VALUES (234, 'Switzerland', 'CHF');
INSERT INTO `sci_countries` VALUES (235, 'Syria', 'SYP');
INSERT INTO `sci_countries` VALUES (236, 'Taiwan', 'TWD');
INSERT INTO `sci_countries` VALUES (237, 'Tajikistan', 'TJS');
INSERT INTO `sci_countries` VALUES (238, 'Tanzania', 'TZS');
INSERT INTO `sci_countries` VALUES (239, 'Thailand', 'THB');
INSERT INTO `sci_countries` VALUES (240, 'Togo', 'XOF');
INSERT INTO `sci_countries` VALUES (241, 'Tokelau', 'NZD');
INSERT INTO `sci_countries` VALUES (242, 'Tonga', 'TOP');
INSERT INTO `sci_countries` VALUES (243, 'Trinidad and Tobago', 'TTD');
INSERT INTO `sci_countries` VALUES (244, 'Tromelin Island', '');
INSERT INTO `sci_countries` VALUES (245, 'Tunisia', 'TND');
INSERT INTO `sci_countries` VALUES (246, 'Turkey', 'TRL');
INSERT INTO `sci_countries` VALUES (247, 'Turkmenistan', 'TMM');
INSERT INTO `sci_countries` VALUES (248, 'Turks and Caicos Islands', 'USD');
INSERT INTO `sci_countries` VALUES (249, 'Tuvalu', 'AUD');
INSERT INTO `sci_countries` VALUES (250, 'Uganda', 'UGX');
INSERT INTO `sci_countries` VALUES (251, 'Ukraine', 'UAH');
INSERT INTO `sci_countries` VALUES (252, 'United Arab Emirates', 'AED');
INSERT INTO `sci_countries` VALUES (253, 'United Kingdom', 'GBP');
INSERT INTO `sci_countries` VALUES (254, 'United States', 'USD');
INSERT INTO `sci_countries` VALUES (255, 'United States Minor Outlying Islands', 'USD');
INSERT INTO `sci_countries` VALUES (256, 'Uruguay', 'UYU');
INSERT INTO `sci_countries` VALUES (257, 'Uzbekistan', 'UZS');
INSERT INTO `sci_countries` VALUES (258, 'Vanuatu', 'VUV');
INSERT INTO `sci_countries` VALUES (259, 'Venezuela', 'VEB');
INSERT INTO `sci_countries` VALUES (260, 'Vietnam', 'VND');
INSERT INTO `sci_countries` VALUES (261, 'Virgin Islands', 'USD');
INSERT INTO `sci_countries` VALUES (262, 'Virgin Islands (UK)', 'USD');
INSERT INTO `sci_countries` VALUES (263, 'Virgin Islands (US)', 'USD');
INSERT INTO `sci_countries` VALUES (264, 'Wake Island', 'USD');
INSERT INTO `sci_countries` VALUES (265, 'Wallis and Futuna', 'XPF');
INSERT INTO `sci_countries` VALUES (266, 'West Bank', 'ILS');
INSERT INTO `sci_countries` VALUES (267, 'Western Sahara', 'MAD');
INSERT INTO `sci_countries` VALUES (268, 'Western Samoa', 'WST');
INSERT INTO `sci_countries` VALUES (269, 'World', '');
INSERT INTO `sci_countries` VALUES (270, 'Yemen', 'YER');
INSERT INTO `sci_countries` VALUES (271, 'Yugoslavia', 'YUM');
INSERT INTO `sci_countries` VALUES (272, 'Zaire', '');
INSERT INTO `sci_countries` VALUES (273, 'Zambia', 'ZMK');
INSERT INTO `sci_countries` VALUES (274, 'Zimbabwe', 'ZWD');
INSERT INTO `sci_countries` VALUES (275, 'Palestinian Territory, Occupied', '');