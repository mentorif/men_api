<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_master')->insert([
            [
                "id" => 1,
                "code" => "AF",
                "name" => "Afghanistan",
                "dial_code" => 93
            ],
            [
                "id" => 2,
                "code" => "AL",
                "name" => "Albania",
                "dial_code" => 355
            ],
            [
                "id" => 3,
                "code" => "DZ",
                "name" => "Algeria",
                "dial_code" => 213
            ],
            [
                "id" => 4,
                "code" => "AS",
                "name" => "American Samoa",
                "dial_code" => 1684
            ],
            [
                "id" => 5,
                "code" => "AD",
                "name" => "Andorra",
                "dial_code" => 376
            ],
            [
                "id" => 6,
                "code" => "AO",
                "name" => "Angola",
                "dial_code" => 244
            ],
            [
                "id" => 7,
                "code" => "AI",
                "name" => "Anguilla",
                "dial_code" => 1264
            ],
            [
                "id" => 8,
                "code" => "AQ",
                "name" => "Antarctica",
                "dial_code" => 0
            ],
            [
                "id" => 9,
                "code" => "AG",
                "name" => "Antigua And Barbuda",
                "dial_code" => 1268
            ],
            [
                "id" => 10,
                "code" => "AR",
                "name" => "Argentina",
                "dial_code" => 54
            ],
            [
                "id" => 11,
                "code" => "AM",
                "name" => "Armenia",
                "dial_code" => 374
            ],
            [
                "id" => 12,
                "code" => "AW",
                "name" => "Aruba",
                "dial_code" => 297
            ],
            [
                "id" => 13,
                "code" => "AU",
                "name" => "Australia",
                "dial_code" => 61
            ],
            [
                "id" => 14,
                "code" => "AT",
                "name" => "Austria",
                "dial_code" => 43
            ],
            [
                "id" => 15,
                "code" => "AZ",
                "name" => "Azerbaijan",
                "dial_code" => 994
            ],
            [
                "id" => 16,
                "code" => "BS",
                "name" => "Bahamas The",
                "dial_code" => 1242
            ],
            [
                "id" => 17,
                "code" => "BH",
                "name" => "Bahrain",
                "dial_code" => 973
            ],
            [
                "id" => 18,
                "code" => "BD",
                "name" => "Bangladesh",
                "dial_code" => 880
            ],
            [
                "id" => 19,
                "code" => "BB",
                "name" => "Barbados",
                "dial_code" => 1246
            ],
            [
                "id" => 20,
                "code" => "BY",
                "name" => "Belarus",
                "dial_code" => 375
            ],
            [
                "id" => 21,
                "code" => "BE",
                "name" => "Belgium",
                "dial_code" => 32
            ],
            [
                "id" => 22,
                "code" => "BZ",
                "name" => "Belize",
                "dial_code" => 501
            ],
            [
                "id" => 23,
                "code" => "BJ",
                "name" => "Benin",
                "dial_code" => 229
            ],
            [
                "id" => 24,
                "code" => "BM",
                "name" => "Bermuda",
                "dial_code" => 1441
            ],
            [
                "id" => 25,
                "code" => "BT",
                "name" => "Bhutan",
                "dial_code" => 975
            ],
            [
                "id" => 26,
                "code" => "BO",
                "name" => "Bolivia",
                "dial_code" => 591
            ],
            [
                "id" => 27,
                "code" => "BA",
                "name" => "Bosnia and Herzegovina",
                "dial_code" => 387
            ],
            [
                "id" => 28,
                "code" => "BW",
                "name" => "Botswana",
                "dial_code" => 267
            ],
            [
                "id" => 29,
                "code" => "BV",
                "name" => "Bouvet Island",
                "dial_code" => 0
            ],
            [
                "id" => 30,
                "code" => "BR",
                "name" => "Brazil",
                "dial_code" => 55
            ],
            [
                "id" => 31,
                "code" => "IO",
                "name" => "British Indian Ocean Territory",
                "dial_code" => 246
            ],
            [
                "id" => 32,
                "code" => "BN",
                "name" => "Brunei",
                "dial_code" => 673
            ],
            [
                "id" => 33,
                "code" => "BG",
                "name" => "Bulgaria",
                "dial_code" => 359
            ],
            [
                "id" => 34,
                "code" => "BF",
                "name" => "Burkina Faso",
                "dial_code" => 226
            ],
            [
                "id" => 35,
                "code" => "BI",
                "name" => "Burundi",
                "dial_code" => 257
            ],
            [
                "id" => 36,
                "code" => "KH",
                "name" => "Cambodia",
                "dial_code" => 855
            ],
            [
                "id" => 37,
                "code" => "CM",
                "name" => "Cameroon",
                "dial_code" => 237
            ],
            [
                "id" => 38,
                "code" => "CA",
                "name" => "Canada",
                "dial_code" => 1
            ],
            [
                "id" => 39,
                "code" => "CV",
                "name" => "Cape Verde",
                "dial_code" => 238
            ],
            [
                "id" => 40,
                "code" => "KY",
                "name" => "Cayman Islands",
                "dial_code" => 1345
            ],
            [
                "id" => 41,
                "code" => "CF",
                "name" => "Central African Republic",
                "dial_code" => 236
            ],
            [
                "id" => 42,
                "code" => "TD",
                "name" => "Chad",
                "dial_code" => 235
            ],
            [
                "id" => 43,
                "code" => "CL",
                "name" => "Chile",
                "dial_code" => 56
            ],
            [
                "id" => 44,
                "code" => "CN",
                "name" => "China",
                "dial_code" => 86
            ],
            [
                "id" => 45,
                "code" => "CX",
                "name" => "Christmas Island",
                "dial_code" => 61
            ],
            [
                "id" => 46,
                "code" => "CC",
                "name" => "Cocos (Keeling) Islands",
                "dial_code" => 672
            ],
            [
                "id" => 47,
                "code" => "CO",
                "name" => "Colombia",
                "dial_code" => 57
            ],
            [
                "id" => 48,
                "code" => "KM",
                "name" => "Comoros",
                "dial_code" => 269
            ],
            [
                "id" => 49,
                "code" => "CG",
                "name" => "Republic Of The Congo",
                "dial_code" => 242
            ],
            [
                "id" => 50,
                "code" => "CD",
                "name" => "Democratic Republic Of The Congo",
                "dial_code" => 242
            ],
            [
                "id" => 51,
                "code" => "CK",
                "name" => "Cook Islands",
                "dial_code" => 682
            ],
            [
                "id" => 52,
                "code" => "CR",
                "name" => "Costa Rica",
                "dial_code" => 506
            ],
            [
                "id" => 53,
                "code" => "CI",
                "name" => "Cote D&#039;Ivoire (Ivory Coast)",
                "dial_code" => 225
            ],
            [
                "id" => 54,
                "code" => "HR",
                "name" => "Croatia (Hrvatska)",
                "dial_code" => 385
            ],
            [
                "id" => 55,
                "code" => "CU",
                "name" => "Cuba",
                "dial_code" => 53
            ],
            [
                "id" => 56,
                "code" => "CY",
                "name" => "Cyprus",
                "dial_code" => 357
            ],
            [
                "id" => 57,
                "code" => "CZ",
                "name" => "Czech Republic",
                "dial_code" => 420
            ],
            [
                "id" => 58,
                "code" => "DK",
                "name" => "Denmark",
                "dial_code" => 45
            ],
            [
                "id" => 59,
                "code" => "DJ",
                "name" => "Djibouti",
                "dial_code" => 253
            ],
            [
                "id" => 60,
                "code" => "DM",
                "name" => "Dominica",
                "dial_code" => 1767
            ],
            [
                "id" => 61,
                "code" => "DO",
                "name" => "Dominican Republic",
                "dial_code" => 1809
            ],
            [
                "id" => 62,
                "code" => "TP",
                "name" => "East Timor",
                "dial_code" => 670
            ],
            [
                "id" => 63,
                "code" => "EC",
                "name" => "Ecuador",
                "dial_code" => 593
            ],
            [
                "id" => 64,
                "code" => "EG",
                "name" => "Egypt",
                "dial_code" => 20
            ],
            [
                "id" => 65,
                "code" => "SV",
                "name" => "El Salvador",
                "dial_code" => 503
            ],
            [
                "id" => 66,
                "code" => "GQ",
                "name" => "Equatorial Guinea",
                "dial_code" => 240
            ],
            [
                "id" => 67,
                "code" => "ER",
                "name" => "Eritrea",
                "dial_code" => 291
            ],
            [
                "id" => 68,
                "code" => "EE",
                "name" => "Estonia",
                "dial_code" => 372
            ],
            [
                "id" => 69,
                "code" => "ET",
                "name" => "Ethiopia",
                "dial_code" => 251
            ],
            [
                "id" => 70,
                "code" => "XA",
                "name" => "External Territories of Australia",
                "dial_code" => 61
            ],
            [
                "id" => 71,
                "code" => "FK",
                "name" => "Falkland Islands",
                "dial_code" => 500
            ],
            [
                "id" => 72,
                "code" => "FO",
                "name" => "Faroe Islands",
                "dial_code" => 298
            ],
            [
                "id" => 73,
                "code" => "FJ",
                "name" => "Fiji Islands",
                "dial_code" => 679
            ],
            [
                "id" => 74,
                "code" => "FI",
                "name" => "Finland",
                "dial_code" => 358
            ],
            [
                "id" => 75,
                "code" => "FR",
                "name" => "France",
                "dial_code" => 33
            ],
            [
                "id" => 76,
                "code" => "GF",
                "name" => "French Guiana",
                "dial_code" => 594
            ],
            [
                "id" => 77,
                "code" => "PF",
                "name" => "French Polynesia",
                "dial_code" => 689
            ],
            [
                "id" => 78,
                "code" => "TF",
                "name" => "French Southern Territories",
                "dial_code" => 0
            ],
            [
                "id" => 79,
                "code" => "GA",
                "name" => "Gabon",
                "dial_code" => 241
            ],
            [
                "id" => 80,
                "code" => "GM",
                "name" => "Gambia The",
                "dial_code" => 220
            ],
            [
                "id" => 81,
                "code" => "GE",
                "name" => "Georgia",
                "dial_code" => 995
            ],
            [
                "id" => 82,
                "code" => "DE",
                "name" => "Germany",
                "dial_code" => 49
            ],
            [
                "id" => 83,
                "code" => "GH",
                "name" => "Ghana",
                "dial_code" => 233
            ],
            [
                "id" => 84,
                "code" => "GI",
                "name" => "Gibraltar",
                "dial_code" => 350
            ],
            [
                "id" => 85,
                "code" => "GR",
                "name" => "Greece",
                "dial_code" => 30
            ],
            [
                "id" => 86,
                "code" => "GL",
                "name" => "Greenland",
                "dial_code" => 299
            ],
            [
                "id" => 87,
                "code" => "GD",
                "name" => "Grenada",
                "dial_code" => 1473
            ],
            [
                "id" => 88,
                "code" => "GP",
                "name" => "Guadeloupe",
                "dial_code" => 590
            ],
            [
                "id" => 89,
                "code" => "GU",
                "name" => "Guam",
                "dial_code" => 1671
            ],
            [
                "id" => 90,
                "code" => "GT",
                "name" => "Guatemala",
                "dial_code" => 502
            ],
            [
                "id" => 91,
                "code" => "XU",
                "name" => "Guernsey and Alderney",
                "dial_code" => 44
            ],
            [
                "id" => 92,
                "code" => "GN",
                "name" => "Guinea",
                "dial_code" => 224
            ],
            [
                "id" => 93,
                "code" => "GW",
                "name" => "Guinea-Bissau",
                "dial_code" => 245
            ],
            [
                "id" => 94,
                "code" => "GY",
                "name" => "Guyana",
                "dial_code" => 592
            ],
            [
                "id" => 95,
                "code" => "HT",
                "name" => "Haiti",
                "dial_code" => 509
            ],
            [
                "id" => 96,
                "code" => "HM",
                "name" => "Heard and McDonald Islands",
                "dial_code" => 0
            ],
            [
                "id" => 97,
                "code" => "HN",
                "name" => "Honduras",
                "dial_code" => 504
            ],
            [
                "id" => 98,
                "code" => "HK",
                "name" => "Hong Kong S.A.R.",
                "dial_code" => 852
            ],
            [
                "id" => 99,
                "code" => "HU",
                "name" => "Hungary",
                "dial_code" => 36
            ],
            [
                "id" => 100,
                "code" => "IS",
                "name" => "Iceland",
                "dial_code" => 354
            ],
            [
                "id" => 101,
                "code" => "IN",
                "name" => "India",
                "dial_code" => 91
            ],
            [
                "id" => 102,
                "code" => "ID",
                "name" => "Indonesia",
                "dial_code" => 62
            ],
            [
                "id" => 103,
                "code" => "IR",
                "name" => "Iran",
                "dial_code" => 98
            ],
            [
                "id" => 104,
                "code" => "IQ",
                "name" => "Iraq",
                "dial_code" => 964
            ],
            [
                "id" => 105,
                "code" => "IE",
                "name" => "Ireland",
                "dial_code" => 353
            ],
            [
                "id" => 106,
                "code" => "IL",
                "name" => "Israel",
                "dial_code" => 972
            ],
            [
                "id" => 107,
                "code" => "IT",
                "name" => "Italy",
                "dial_code" => 39
            ],
            [
                "id" => 108,
                "code" => "JM",
                "name" => "Jamaica",
                "dial_code" => 1876
            ],
            [
                "id" => 109,
                "code" => "JP",
                "name" => "Japan",
                "dial_code" => 81
            ],
            [
                "id" => 110,
                "code" => "XJ",
                "name" => "Jersey",
                "dial_code" => 44
            ],
            [
                "id" => 111,
                "code" => "JO",
                "name" => "Jordan",
                "dial_code" => 962
            ],
            [
                "id" => 112,
                "code" => "KZ",
                "name" => "Kazakhstan",
                "dial_code" => 7
            ],
            [
                "id" => 113,
                "code" => "KE",
                "name" => "Kenya",
                "dial_code" => 254
            ],
            [
                "id" => 114,
                "code" => "KI",
                "name" => "Kiribati",
                "dial_code" => 686
            ],
            [
                "id" => 115,
                "code" => "KP",
                "name" => "Korea North",
                "dial_code" => 850
            ],
            [
                "id" => 116,
                "code" => "KR",
                "name" => "Korea South",
                "dial_code" => 82
            ],
            [
                "id" => 117,
                "code" => "KW",
                "name" => "Kuwait",
                "dial_code" => 965
            ],
            [
                "id" => 118,
                "code" => "KG",
                "name" => "Kyrgyzstan",
                "dial_code" => 996
            ],
            [
                "id" => 119,
                "code" => "LA",
                "name" => "Laos",
                "dial_code" => 856
            ],
            [
                "id" => 120,
                "code" => "LV",
                "name" => "Latvia",
                "dial_code" => 371
            ],
            [
                "id" => 121,
                "code" => "LB",
                "name" => "Lebanon",
                "dial_code" => 961
            ],
            [
                "id" => 122,
                "code" => "LS",
                "name" => "Lesotho",
                "dial_code" => 266
            ],
            [
                "id" => 123,
                "code" => "LR",
                "name" => "Liberia",
                "dial_code" => 231
            ],
            [
                "id" => 124,
                "code" => "LY",
                "name" => "Libya",
                "dial_code" => 218
            ],
            [
                "id" => 125,
                "code" => "LI",
                "name" => "Liechtenstein",
                "dial_code" => 423
            ],
            [
                "id" => 126,
                "code" => "LT",
                "name" => "Lithuania",
                "dial_code" => 370
            ],
            [
                "id" => 127,
                "code" => "LU",
                "name" => "Luxembourg",
                "dial_code" => 352
            ],
            [
                "id" => 128,
                "code" => "MO",
                "name" => "Macau S.A.R.",
                "dial_code" => 853
            ],
            [
                "id" => 129,
                "code" => "MK",
                "name" => "Macedonia",
                "dial_code" => 389
            ],
            [
                "id" => 130,
                "code" => "MG",
                "name" => "Madagascar",
                "dial_code" => 261
            ],
            [
                "id" => 131,
                "code" => "MW",
                "name" => "Malawi",
                "dial_code" => 265
            ],
            [
                "id" => 132,
                "code" => "MY",
                "name" => "Malaysia",
                "dial_code" => 60
            ],
            [
                "id" => 133,
                "code" => "MV",
                "name" => "Maldives",
                "dial_code" => 960
            ],
            [
                "id" => 134,
                "code" => "ML",
                "name" => "Mali",
                "dial_code" => 223
            ],
            [
                "id" => 135,
                "code" => "MT",
                "name" => "Malta",
                "dial_code" => 356
            ],
            [
                "id" => 136,
                "code" => "XM",
                "name" => "Man (Isle of)",
                "dial_code" => 44
            ],
            [
                "id" => 137,
                "code" => "MH",
                "name" => "Marshall Islands",
                "dial_code" => 692
            ],
            [
                "id" => 138,
                "code" => "MQ",
                "name" => "Martinique",
                "dial_code" => 596
            ],
            [
                "id" => 139,
                "code" => "MR",
                "name" => "Mauritania",
                "dial_code" => 222
            ],
            [
                "id" => 140,
                "code" => "MU",
                "name" => "Mauritius",
                "dial_code" => 230
            ],
            [
                "id" => 141,
                "code" => "YT",
                "name" => "Mayotte",
                "dial_code" => 269
            ],
            [
                "id" => 142,
                "code" => "MX",
                "name" => "Mexico",
                "dial_code" => 52
            ],
            [
                "id" => 143,
                "code" => "FM",
                "name" => "Micronesia",
                "dial_code" => 691
            ],
            [
                "id" => 144,
                "code" => "MD",
                "name" => "Moldova",
                "dial_code" => 373
            ],
            [
                "id" => 145,
                "code" => "MC",
                "name" => "Monaco",
                "dial_code" => 377
            ],
            [
                "id" => 146,
                "code" => "MN",
                "name" => "Mongolia",
                "dial_code" => 976
            ],
            [
                "id" => 147,
                "code" => "MS",
                "name" => "Montserrat",
                "dial_code" => 1664
            ],
            [
                "id" => 148,
                "code" => "MA",
                "name" => "Morocco",
                "dial_code" => 212
            ],
            [
                "id" => 149,
                "code" => "MZ",
                "name" => "Mozambique",
                "dial_code" => 258
            ],
            [
                "id" => 150,
                "code" => "MM",
                "name" => "Myanmar",
                "dial_code" => 95
            ],
            [
                "id" => 151,
                "code" => "NA",
                "name" => "Namibia",
                "dial_code" => 264
            ],
            [
                "id" => 152,
                "code" => "NR",
                "name" => "Nauru",
                "dial_code" => 674
            ],
            [
                "id" => 153,
                "code" => "NP",
                "name" => "Nepal",
                "dial_code" => 977
            ],
            [
                "id" => 154,
                "code" => "AN",
                "name" => "Netherlands Antilles",
                "dial_code" => 599
            ],
            [
                "id" => 155,
                "code" => "NL",
                "name" => "Netherlands The",
                "dial_code" => 31
            ],
            [
                "id" => 156,
                "code" => "NC",
                "name" => "New Caledonia",
                "dial_code" => 687
            ],
            [
                "id" => 157,
                "code" => "NZ",
                "name" => "New Zealand",
                "dial_code" => 64
            ],
            [
                "id" => 158,
                "code" => "NI",
                "name" => "Nicaragua",
                "dial_code" => 505
            ],
            [
                "id" => 159,
                "code" => "NE",
                "name" => "Niger",
                "dial_code" => 227
            ],
            [
                "id" => 160,
                "code" => "NG",
                "name" => "Nigeria",
                "dial_code" => 234
            ],
            [
                "id" => 161,
                "code" => "NU",
                "name" => "Niue",
                "dial_code" => 683
            ],
            [
                "id" => 162,
                "code" => "NF",
                "name" => "Norfolk Island",
                "dial_code" => 672
            ],
            [
                "id" => 163,
                "code" => "MP",
                "name" => "Northern Mariana Islands",
                "dial_code" => 1670
            ],
            [
                "id" => 164,
                "code" => "NO",
                "name" => "Norway",
                "dial_code" => 47
            ],
            [
                "id" => 165,
                "code" => "OM",
                "name" => "Oman",
                "dial_code" => 968
            ],
            [
                "id" => 166,
                "code" => "PK",
                "name" => "Pakistan",
                "dial_code" => 92
            ],
            [
                "id" => 167,
                "code" => "PW",
                "name" => "Palau",
                "dial_code" => 680
            ],
            [
                "id" => 168,
                "code" => "PS",
                "name" => "Palestinian Territory Occupied",
                "dial_code" => 970
            ],
            [
                "id" => 169,
                "code" => "PA",
                "name" => "Panama",
                "dial_code" => 507
            ],
            [
                "id" => 170,
                "code" => "PG",
                "name" => "Papua new Guinea",
                "dial_code" => 675
            ],
            [
                "id" => 171,
                "code" => "PY",
                "name" => "Paraguay",
                "dial_code" => 595
            ],
            [
                "id" => 172,
                "code" => "PE",
                "name" => "Peru",
                "dial_code" => 51
            ],
            [
                "id" => 173,
                "code" => "PH",
                "name" => "Philippines",
                "dial_code" => 63
            ],
            [
                "id" => 174,
                "code" => "PN",
                "name" => "Pitcairn Island",
                "dial_code" => 0
            ],
            [
                "id" => 175,
                "code" => "PL",
                "name" => "Poland",
                "dial_code" => 48
            ],
            [
                "id" => 176,
                "code" => "PT",
                "name" => "Portugal",
                "dial_code" => 351
            ],
            [
                "id" => 177,
                "code" => "PR",
                "name" => "Puerto Rico",
                "dial_code" => 1787
            ],
            [
                "id" => 178,
                "code" => "QA",
                "name" => "Qatar",
                "dial_code" => 974
            ],
            [
                "id" => 179,
                "code" => "RE",
                "name" => "Reunion",
                "dial_code" => 262
            ],
            [
                "id" => 180,
                "code" => "RO",
                "name" => "Romania",
                "dial_code" => 40
            ],
            [
                "id" => 181,
                "code" => "RU",
                "name" => "Russia",
                "dial_code" => 70
            ],
            [
                "id" => 182,
                "code" => "RW",
                "name" => "Rwanda",
                "dial_code" => 250
            ],
            [
                "id" => 183,
                "code" => "SH",
                "name" => "Saint Helena",
                "dial_code" => 290
            ],
            [
                "id" => 184,
                "code" => "KN",
                "name" => "Saint Kitts And Nevis",
                "dial_code" => 1869
            ],
            [
                "id" => 185,
                "code" => "LC",
                "name" => "Saint Lucia",
                "dial_code" => 1758
            ],
            [
                "id" => 186,
                "code" => "PM",
                "name" => "Saint Pierre and Miquelon",
                "dial_code" => 508
            ],
            [
                "id" => 187,
                "code" => "VC",
                "name" => "Saint Vincent And The Grenadines",
                "dial_code" => 1784
            ],
            [
                "id" => 188,
                "code" => "WS",
                "name" => "Samoa",
                "dial_code" => 684
            ],
            [
                "id" => 189,
                "code" => "SM",
                "name" => "San Marino",
                "dial_code" => 378
            ],
            [
                "id" => 190,
                "code" => "ST",
                "name" => "Sao Tome and Principe",
                "dial_code" => 239
            ],
            [
                "id" => 191,
                "code" => "SA",
                "name" => "Saudi Arabia",
                "dial_code" => 966
            ],
            [
                "id" => 192,
                "code" => "SN",
                "name" => "Senegal",
                "dial_code" => 221
            ],
            [
                "id" => 193,
                "code" => "RS",
                "name" => "Serbia",
                "dial_code" => 381
            ],
            [
                "id" => 194,
                "code" => "SC",
                "name" => "Seychelles",
                "dial_code" => 248
            ],
            [
                "id" => 195,
                "code" => "SL",
                "name" => "Sierra Leone",
                "dial_code" => 232
            ],
            [
                "id" => 196,
                "code" => "SG",
                "name" => "Singapore",
                "dial_code" => 65
            ],
            [
                "id" => 197,
                "code" => "SK",
                "name" => "Slovakia",
                "dial_code" => 421
            ],
            [
                "id" => 198,
                "code" => "SI",
                "name" => "Slovenia",
                "dial_code" => 386
            ],
            [
                "id" => 199,
                "code" => "XG",
                "name" => "Smaller Territories of the UK",
                "dial_code" => 44
            ],
            [
                "id" => 200,
                "code" => "SB",
                "name" => "Solomon Islands",
                "dial_code" => 677
            ],
            [
                "id" => 201,
                "code" => "SO",
                "name" => "Somalia",
                "dial_code" => 252
            ],
            [
                "id" => 202,
                "code" => "ZA",
                "name" => "South Africa",
                "dial_code" => 27
            ],
            [
                "id" => 203,
                "code" => "GS",
                "name" => "South Georgia",
                "dial_code" => 0
            ],
            [
                "id" => 204,
                "code" => "SS",
                "name" => "South Sudan",
                "dial_code" => 211
            ],
            [
                "id" => 205,
                "code" => "ES",
                "name" => "Spain",
                "dial_code" => 34
            ],
            [
                "id" => 206,
                "code" => "LK",
                "name" => "Sri Lanka",
                "dial_code" => 94
            ],
            [
                "id" => 207,
                "code" => "SD",
                "name" => "Sudan",
                "dial_code" => 249
            ],
            [
                "id" => 208,
                "code" => "SR",
                "name" => "Suriname",
                "dial_code" => 597
            ],
            [
                "id" => 209,
                "code" => "SJ",
                "name" => "Svalbard And Jan Mayen Islands",
                "dial_code" => 47
            ],
            [
                "id" => 210,
                "code" => "SZ",
                "name" => "Swaziland",
                "dial_code" => 268
            ],
            [
                "id" => 211,
                "code" => "SE",
                "name" => "Sweden",
                "dial_code" => 46
            ],
            [
                "id" => 212,
                "code" => "CH",
                "name" => "Switzerland",
                "dial_code" => 41
            ],
            [
                "id" => 213,
                "code" => "SY",
                "name" => "Syria",
                "dial_code" => 963
            ],
            [
                "id" => 214,
                "code" => "TW",
                "name" => "Taiwan",
                "dial_code" => 886
            ],
            [
                "id" => 215,
                "code" => "TJ",
                "name" => "Tajikistan",
                "dial_code" => 992
            ],
            [
                "id" => 216,
                "code" => "TZ",
                "name" => "Tanzania",
                "dial_code" => 255
            ],
            [
                "id" => 217,
                "code" => "TH",
                "name" => "Thailand",
                "dial_code" => 66
            ],
            [
                "id" => 218,
                "code" => "TG",
                "name" => "Togo",
                "dial_code" => 228
            ],
            [
                "id" => 219,
                "code" => "TK",
                "name" => "Tokelau",
                "dial_code" => 690
            ],
            [
                "id" => 220,
                "code" => "TO",
                "name" => "Tonga",
                "dial_code" => 676
            ],
            [
                "id" => 221,
                "code" => "TT",
                "name" => "Trinidad And Tobago",
                "dial_code" => 1868
            ],
            [
                "id" => 222,
                "code" => "TN",
                "name" => "Tunisia",
                "dial_code" => 216
            ],
            [
                "id" => 223,
                "code" => "TR",
                "name" => "Turkey",
                "dial_code" => 90
            ],
            [
                "id" => 224,
                "code" => "TM",
                "name" => "Turkmenistan",
                "dial_code" => 7370
            ],
            [
                "id" => 225,
                "code" => "TC",
                "name" => "Turks And Caicos Islands",
                "dial_code" => 1649
            ],
            [
                "id" => 226,
                "code" => "TV",
                "name" => "Tuvalu",
                "dial_code" => 688
            ],
            [
                "id" => 227,
                "code" => "UG",
                "name" => "Uganda",
                "dial_code" => 256
            ],
            [
                "id" => 228,
                "code" => "UA",
                "name" => "Ukraine",
                "dial_code" => 380
            ],
            [
                "id" => 229,
                "code" => "AE",
                "name" => "United Arab Emirates",
                "dial_code" => 971
            ],
            [
                "id" => 230,
                "code" => "GB",
                "name" => "United Kingdom",
                "dial_code" => 44
            ],
            [
                "id" => 231,
                "code" => "US",
                "name" => "United States",
                "dial_code" => 1
            ],
            [
                "id" => 232,
                "code" => "UM",
                "name" => "United States Minor Outlying Islands",
                "dial_code" => 1
            ],
            [
                "id" => 233,
                "code" => "UY",
                "name" => "Uruguay",
                "dial_code" => 598
            ],
            [
                "id" => 234,
                "code" => "UZ",
                "name" => "Uzbekistan",
                "dial_code" => 998
            ],
            [
                "id" => 235,
                "code" => "VU",
                "name" => "Vanuatu",
                "dial_code" => 678
            ],
            [
                "id" => 236,
                "code" => "VA",
                "name" => "Vatican City State (Holy See)",
                "dial_code" => 39
            ],
            [
                "id" => 237,
                "code" => "VE",
                "name" => "Venezuela",
                "dial_code" => 58
            ],
            [
                "id" => 238,
                "code" => "VN",
                "name" => "Vietnam",
                "dial_code" => 84
            ],
            [
                "id" => 239,
                "code" => "VG",
                "name" => "Virgin Islands (British)",
                "dial_code" => 1284
            ],
            [
                "id" => 240,
                "code" => "VI",
                "name" => "Virgin Islands (US)",
                "dial_code" => 1340
            ],
            [
                "id" => 241,
                "code" => "WF",
                "name" => "Wallis And Futuna Islands",
                "dial_code" => 681
            ],
            [
                "id" => 242,
                "code" => "EH",
                "name" => "Western Sahara",
                "dial_code" => 212
            ],
            [
                "id" => 243,
                "code" => "YE",
                "name" => "Yemen",
                "dial_code" => 967
            ],
            [
                "id" => 244,
                "code" => "YU",
                "name" => "Yugoslavia",
                "dial_code" => 38
            ],
            [
                "id" => 245,
                "code" => "ZM",
                "name" => "Zambia",
                "dial_code" => 260
            ],
            [
                "id" => 246,
                "code" => "ZW",
                "name" => "Zimbabwe",
                "dial_code" => 26
            ]
        ]);
    }
}
