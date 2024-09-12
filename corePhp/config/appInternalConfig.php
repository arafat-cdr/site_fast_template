<?php
/**
 * ************************************************
 *
 * Do not Change Anything Form Here
 * This use For Internal App Configuration
 * Here We will Define The Associated Info
 *
 * ************************************************
 **/

# Set The Table name and its associate Foreign key Here
function foreign_table_name() {
	return array(
		
		"journal_names" => array(
			"journal_name_id",
		),

	);

}

/**
 * ************************************************
 * This Function is Used for Getting The Name Of
 * The Foregin Key Table
 * @package arafat framework
 * @param foreign_key name
 * @return foregin_key_table name
 * ************************************************
 */
function foreign_key_table_name($foreign_key_name) {

	$foreign_table_name = foreign_table_name();

	if ($foreign_table_name) {
		foreach ($foreign_table_name as $k => $v) {
			foreach ($v as $kk => $vv) {
				if ($vv == $foreign_key_name) {
					# If Found Return The Table Name
					return $k;
				}
			}
		}
	}

	# No such key set Return False
	return false;

}


global $currency_arr;

$currency_arr = array(
	'ALL' => 'Albania Lek',
	'AFN' => 'Afghanistan Afghani',
	'ARS' => 'Argentina Peso',
	'AWG' => 'Aruba Guilder',
	'AUD' => 'Australia Dollar',
	'AZN' => 'Azerbaijan New Manat',
	'BSD' => 'Bahamas Dollar',
	'BBD' => 'Barbados Dollar',
	'BDT' => 'Bangladeshi taka',
	'BYR' => 'Belarus Ruble',
	'BZD' => 'Belize Dollar',
	'BMD' => 'Bermuda Dollar',
	'BOB' => 'Bolivia Boliviano',
	'BAM' => 'Bosnia and Herzegovina Convertible Marka',
	'BWP' => 'Botswana Pula',
	'BGN' => 'Bulgaria Lev',
	'BRL' => 'Brazil Real',
	'BND' => 'Brunei Darussalam Dollar',
	'KHR' => 'Cambodia Riel',
	'CAD' => 'Canada Dollar',
	'KYD' => 'Cayman Islands Dollar',
	'CLP' => 'Chile Peso',
	'CNY' => 'China Yuan Renminbi',
	'COP' => 'Colombia Peso',
	'CRC' => 'Costa Rica Colon',
	'HRK' => 'Croatia Kuna',
	'CUP' => 'Cuba Peso',
	'CZK' => 'Czech Republic Koruna',
	'DKK' => 'Denmark Krone',
	'DOP' => 'Dominican Republic Peso',
	'XCD' => 'East Caribbean Dollar',
	'EGP' => 'Egypt Pound',
	'SVC' => 'El Salvador Colon',
	'EEK' => 'Estonia Kroon',
	'EUR' => 'Euro Member Countries',
	'FKP' => 'Falkland Islands (Malvinas) Pound',
	'FJD' => 'Fiji Dollar',
	'GHC' => 'Ghana Cedis',
	'GIP' => 'Gibraltar Pound',
	'GTQ' => 'Guatemala Quetzal',
	'GGP' => 'Guernsey Pound',
	'GYD' => 'Guyana Dollar',
	'HNL' => 'Honduras Lempira',
	'HKD' => 'Hong Kong Dollar',
	'HUF' => 'Hungary Forint',
	'ISK' => 'Iceland Krona',
	'INR' => 'India Rupee',
	'IDR' => 'Indonesia Rupiah',
	'IRR' => 'Iran Rial',
	'IMP' => 'Isle of Man Pound',
	'ILS' => 'Israel Shekel',
	'JMD' => 'Jamaica Dollar',
	'JPY' => 'Japan Yen',
	'JEP' => 'Jersey Pound',
	'KZT' => 'Kazakhstan Tenge',
	'KPW' => 'Korea (North) Won',
	'KRW' => 'Korea (South) Won',
	'KGS' => 'Kyrgyzstan Som',
	'LAK' => 'Laos Kip',
	'LVL' => 'Latvia Lat',
	'LBP' => 'Lebanon Pound',
	'LRD' => 'Liberia Dollar',
	'LTL' => 'Lithuania Litas',
	'MKD' => 'Macedonia Denar',
	'MYR' => 'Malaysia Ringgit',
	'MUR' => 'Mauritius Rupee',
	'MXN' => 'Mexico Peso',
	'MNT' => 'Mongolia Tughrik',
	'MZN' => 'Mozambique Metical',
	'NAD' => 'Namibia Dollar',
	'NPR' => 'Nepal Rupee',
	'ANG' => 'Netherlands Antilles Guilder',
	'NZD' => 'New Zealand Dollar',
	'NIO' => 'Nicaragua Cordoba',
	'NGN' => 'Nigeria Naira',
	'NOK' => 'Norway Krone',
	'OMR' => 'Oman Rial',
	'PKR' => 'Pakistan Rupee',
	'PAB' => 'Panama Balboa',
	'PYG' => 'Paraguay Guarani',
	'PEN' => 'Peru Nuevo Sol',
	'PHP' => 'Philippines Peso',
	'PLN' => 'Poland Zloty',
	'QAR' => 'Qatar Riyal',
	'RON' => 'Romania New Leu',
	'RUB' => 'Russia Ruble',
	'SHP' => 'Saint Helena Pound',
	'SAR' => 'Saudi Arabia Riyal',
	'RSD' => 'Serbia Dinar',
	'SCR' => 'Seychelles Rupee',
	'SGD' => 'Singapore Dollar',
	'SBD' => 'Solomon Islands Dollar',
	'SOS' => 'Somalia Shilling',
	'ZAR' => 'South Africa Rand',
	'LKR' => 'Sri Lanka Rupee',
	'SEK' => 'Sweden Krona',
	'CHF' => 'Switzerland Franc',
	'SRD' => 'Suriname Dollar',
	'SYP' => 'Syria Pound',
	'TWD' => 'Taiwan New Dollar',
	'THB' => 'Thailand Baht',
	'TTD' => 'Trinidad and Tobago Dollar',
	'TRY' => 'Turkey Lira',
	'TRL' => 'Turkey Lira',
	'TVD' => 'Tuvalu Dollar',
	'UAH' => 'Ukraine Hryvna',
	'GBP' => 'United Kingdom Pound',
	'UGX' => 'Uganda Shilling',
	'USD' => 'United States Dollar',
	'UYU' => 'Uruguay Peso',
	'UZS' => 'Uzbekistan Som',
	'VEF' => 'Venezuela Bolivar',
	'VND' => 'Viet Nam Dong',
	'YER' => 'Yemen Rial',
	'ZWD' => 'Zimbabwe Dollar',
);



global $countries_arr;
$countries_arr = array("Afghanistan" => "Afghanistan", "Albania" => "Albania", "Algeria" => "Algeria", "American Samoa" => "American Samoa", "Andorra" => "Andorra", "Angola" => "Angola", "Anguilla" => "Anguilla", "Antarctica" => "Antarctica", "Antigua and Barbuda" => "Antigua and Barbuda", "Argentina" => "Argentina", "Armenia" => "Armenia", "Aruba" => "Aruba", "Australia" => "Australia", "Austria" => "Austria", "Azerbaijan" => "Azerbaijan", "Bahamas" => "Bahamas", "Bahrain" => "Bahrain", "Bangladesh" => "Bangladesh", "Barbados" => "Barbados", "Belarus" => "Belarus", "Belgium" => "Belgium", "Belize" => "Belize", "Benin" => "Benin", "Bermuda" => "Bermuda", "Bhutan" => "Bhutan", "Bolivia" => "Bolivia", "Bosnia and Herzegowina" => "Bosnia and Herzegowina", "Botswana" => "Botswana", "Bouvet Island" => "Bouvet Island", "Brazil" => "Brazil", "British Indian Ocean Territory" => "British Indian Ocean Territory", "Brunei Darussalam" => "Brunei Darussalam", "Bulgaria" => "Bulgaria", "Burkina Faso" => "Burkina Faso", "Burundi" => "Burundi", "Cambodia" => "Cambodia", "Cameroon" => "Cameroon", "Canada" => "Canada", "Cape Verde" => "Cape Verde", "Cayman Islands" => "Cayman Islands", "Central African Republic" => "Central African Republic", "Chad" => "Chad", "Chile" => "Chile", "China" => "China", "Christmas Island" => "Christmas Island", "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands", "Colombia" => "Colombia", "Comoros" => "Comoros", "Congo" => "Congo", "Congo, the Democratic Republic of the" => "Congo, the Democratic Republic of the", "Cook Islands" => "Cook Islands", "Costa Rica" => "Costa Rica", "Cote d'Ivoire" => "Cote d'Ivoire", "Croatia (Hrvatska)" => "Croatia (Hrvatska)", "Cuba" => "Cuba", "Cyprus" => "Cyprus", "Czech Republic" => "Czech Republic", "Denmark" => "Denmark", "Djibouti" => "Djibouti", "Dominica" => "Dominica", "Dominican Republic" => "Dominican Republic", "East Timor" => "East Timor", "Ecuador" => "Ecuador", "Egypt" => "Egypt", "El Salvador" => "El Salvador", "Equatorial Guinea" => "Equatorial Guinea", "Eritrea" => "Eritrea", "Estonia" => "Estonia", "Ethiopia" => "Ethiopia", "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)", "Faroe Islands" => "Faroe Islands", "Fiji" => "Fiji", "Finland" => "Finland", "France" => "France", "France Metropolitan" => "France Metropolitan", "French Guiana" => "French Guiana", "French Polynesia" => "French Polynesia", "French Southern Territories" => "French Southern Territories", "Gabon" => "Gabon", "Gambia" => "Gambia", "Georgia" => "Georgia", "Germany" => "Germany", "Ghana" => "Ghana", "Gibraltar" => "Gibraltar", "Greece" => "Greece", "Greenland" => "Greenland", "Grenada" => "Grenada", "Guadeloupe" => "Guadeloupe", "Guam" => "Guam", "Guatemala" => "Guatemala", "Guinea" => "Guinea", "Guinea-Bissau" => "Guinea-Bissau", "Guyana" => "Guyana", "Haiti" => "Haiti", "Heard and Mc Donald Islands" => "Heard and Mc Donald Islands", "Holy See (Vatican City State)" => "Holy See (Vatican City State)", "Honduras" => "Honduras", "Hong Kong" => "Hong Kong", "Hungary" => "Hungary", "Iceland" => "Iceland", "India" => "India", "Indonesia" => "Indonesia", "Iran (Islamic Republic of)" => "Iran (Islamic Republic of)", "Iraq" => "Iraq", "Ireland" => "Ireland", "Israel" => "Israel", "Italy" => "Italy", "Jamaica" => "Jamaica", "Japan" => "Japan", "Jordan" => "Jordan", "Kazakhstan" => "Kazakhstan", "Kenya" => "Kenya", "Kiribati" => "Kiribati", "Korea, Democratic People's Republic of" => "Korea, Democratic People's Republic of", "Korea, Republic of" => "Korea, Republic of", "Kuwait" => "Kuwait", "Kyrgyzstan" => "Kyrgyzstan", "Lao, People's Democratic Republic" => "Lao, People's Democratic Republic", "Latvia" => "Latvia", "Lebanon" => "Lebanon", "Lesotho" => "Lesotho", "Liberia" => "Liberia", "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya", "Liechtenstein" => "Liechtenstein", "Lithuania" => "Lithuania", "Luxembourg" => "Luxembourg", "Macau" => "Macau", "Macedonia, The Former Yugoslav Republic of" => "Macedonia, The Former Yugoslav Republic of", "Madagascar" => "Madagascar", "Malawi" => "Malawi", "Malaysia" => "Malaysia", "Maldives" => "Maldives", "Mali" => "Mali", "Malta" => "Malta", "Marshall Islands" => "Marshall Islands", "Martinique" => "Martinique", "Mauritania" => "Mauritania", "Mauritius" => "Mauritius", "Mayotte" => "Mayotte", "Mexico" => "Mexico", "Micronesia, Federated States of" => "Micronesia, Federated States of", "Moldova, Republic of" => "Moldova, Republic of", "Monaco" => "Monaco", "Mongolia" => "Mongolia", "Montserrat" => "Montserrat", "Morocco" => "Morocco", "Mozambique" => "Mozambique", "Myanmar" => "Myanmar", "Namibia" => "Namibia", "Nauru" => "Nauru", "Nepal" => "Nepal", "Netherlands" => "Netherlands", "Netherlands Antilles" => "Netherlands Antilles", "New Caledonia" => "New Caledonia", "New Zealand" => "New Zealand", "Nicaragua" => "Nicaragua", "Niger" => "Niger", "Nigeria" => "Nigeria", "Niue" => "Niue", "Norfolk Island" => "Norfolk Island", "Northern Mariana Islands" => "Northern Mariana Islands", "Norway" => "Norway", "Oman" => "Oman", "Pakistan" => "Pakistan", "Palau" => "Palau", "Panama" => "Panama", "Papua New Guinea" => "Papua New Guinea", "Paraguay" => "Paraguay", "Peru" => "Peru", "Philippines" => "Philippines", "Pitcairn" => "Pitcairn", "Poland" => "Poland", "Portugal" => "Portugal", "Puerto Rico" => "Puerto Rico", "Qatar" => "Qatar", "Reunion" => "Reunion", "Romania" => "Romania", "Russian Federation" => "Russian Federation", "Rwanda" => "Rwanda", "Saint Kitts and Nevis" => "Saint Kitts and Nevis", "Saint Lucia" => "Saint Lucia", "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines", "Samoa" => "Samoa", "San Marino" => "San Marino", "Sao Tome and Principe" => "Sao Tome and Principe", "Saudi Arabia" => "Saudi Arabia", "Senegal" => "Senegal", "Seychelles" => "Seychelles", "Sierra Leone" => "Sierra Leone", "Singapore" => "Singapore", "Slovakia (Slovak Republic)" => "Slovakia (Slovak Republic)", "Slovenia" => "Slovenia", "Solomon Islands" => "Solomon Islands", "Somalia" => "Somalia", "South Africa" => "South Africa", "South Georgia and the South Sandwich Islands" => "South Georgia and the South Sandwich Islands", "Spain" => "Spain", "Sri Lanka" => "Sri Lanka", "St. Helena" => "St. Helena", "St. Pierre and Miquelon" => "St. Pierre and Miquelon", "Sudan" => "Sudan", "Suriname" => "Suriname", "Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands", "Swaziland" => "Swaziland", "Sweden" => "Sweden", "Switzerland" => "Switzerland", "Syrian Arab Republic" => "Syrian Arab Republic", "Taiwan, Province of China" => "Taiwan, Province of China", "Tajikistan" => "Tajikistan", "Tanzania, United Republic of" => "Tanzania, United Republic of", "Thailand" => "Thailand", "Togo" => "Togo", "Tokelau" => "Tokelau", "Tonga" => "Tonga", "Trinidad and Tobago" => "Trinidad and Tobago", "Tunisia" => "Tunisia", "Turkey" => "Turkey", "Turkmenistan" => "Turkmenistan", "Turks and Caicos Islands" => "Turks and Caicos Islands", "Tuvalu" => "Tuvalu", "Uganda" => "Uganda", "Ukraine" => "Ukraine", "United Arab Emirates" => "United Arab Emirates", "United Kingdom" => "United Kingdom", "United States" => "United States", "United States Minor Outlying Islands" => "United States Minor Outlying Islands", "Uruguay" => "Uruguay", "Uzbekistan" => "Uzbekistan", "Vanuatu" => "Vanuatu", "Venezuela" => "Venezuela", "Vietnam" => "Vietnam", "Virgin Islands (British)" => "Virgin Islands (British)", "Virgin Islands (U.S.)" => "Virgin Islands (U.S.)", "Wallis and Futuna Islands" => "Wallis and Futuna Islands", "Western Sahara" => "Western Sahara", "Yemen" => "Yemen", "Yugoslavia" => "Yugoslavia", "Zambia" => "Zambia", "Zimbabwe" => "Zimbabwe");


global $year_list;

$year_list =  array(
	1990,
	1991,
	1992,
	1993,
	1994,
	1995,
	1996,
	1997,
	1998,
	1999,
	2000,
	2001,
	2002,
	2003,
	2004,
	2005,
	2006,
	2007,
	2008,
	2009,
	2010,
	2011,
	2012,
	2013,
	2014,
	2015,
	2016,
	2017,
	2018,
	2019,
	2020,
	2021,
	2022,
	2023,
	2024,
);


$year_list[] = date("Y") + 1;
$year_list[] = date("Y") + 2;
$year_list[] = date("Y") + 3;


global $month_2;

$month_2 = array(
	'Jan_Feb',
	'Mar_Apr',
	'May_Jun',
	'Jul_Aug',
	'Sep_Oct',
	'Nov_Dec',
);

global $month;

$month = array(
	'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'Spetember',
	'October',
	'November',
	'December',
);


global $day;

$day = array(
	1,
	2,
	3,
	4,
	5,
	6,
	7,
	8,
	9,
	10,
	11,
	12,
	13,
	14,
	15,
	16,
	17,
	18,
	19,
	20,
	21,
	22,
	23,
	24,
	25,
	26,
	27,
	28,
	29,
	30,
	31,
);
