<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index(){
    	$curr = [
    'Albania Lek' => 'ALL',
    'Afghanistan Afghani' => 'AFN',
    'Argentina Peso' => 'ARS',
    'Aruba Guilder' => 'AWG',
    'Australia Dollar' => 'AUD',
    'Azerbaijan New Manat' => 'AZN',
    'Bahamas Dollar' => 'BSD',
    'Barbados Dollar' => 'BBD',
    'Bangladeshi taka' => 'BDT',
    'Belarus Ruble' => 'BYR',
    'Belize Dollar' => 'BZD',
    'Bermuda Dollar' => 'BMD',
    'Bolivia Boliviano' => 'BOB',
    'Bosnia and Herzegovina Convertible Marka' => 'BAM',
    'Botswana Pula' => 'BWP',
    'Bulgaria Lev' => 'BGN',
    'Brazil Real' => 'BRL',
    'Brunei Darussalam Dollar' => 'BND',
    'Cambodia Riel' => 'KHR',
    'Canada Dollar' => 'CAD',
    'Cayman Islands Dollar' => 'KYD',
    'Chile Peso' => 'CLP',
    'China Yuan Renminbi' => 'CNY',
    'Colombia Peso' => 'COP',
    'Costa Rica Colon' => 'CRC',
    'Croatia Kuna' => 'HRK',
    'Cuba Peso' => 'CUP',
    'Czech Republic Koruna' => 'CZK',
    'Denmark Krone' => 'DKK',
    'Dominican Republic Peso' => 'DOP',
    'East Caribbean Dollar' => 'XCD',
    'Egypt Pound' => 'EGP',
    'El Salvador Colon' => 'SVC',
    'Estonia Kroon' => 'EEK',
    'Euro Member Countries' => 'EUR',
    'Falkland Islands (Malvinas) Pound' => 'FKP',
    'Fiji Dollar' => 'FJD',
    'Ghana Cedis' => 'GHC',
    'Gibraltar Pound' => 'GIP',
    'Guatemala Quetzal' => 'GTQ',
    'Guernsey Pound' => 'GGP',
    'Guyana Dollar' => 'GYD',
    'Honduras Lempira' => 'HNL',
    'Hong Kong Dollar' => 'HKD',
    'Hungary Forint' => 'HUF',
    'Iceland Krona' => 'ISK',
    'India Rupee' => 'INR',
    'Indonesia Rupiah' => 'IDR',
    'Iran Rial' => 'IRR',
    'Isle of Man Pound' => 'IMP',
    'Israel Shekel' => 'ILS',
    'Jamaica Dollar' => 'JMD',
    'Japan Yen' => 'JPY',
    'Jersey Pound' => 'JEP',
    'Kazakhstan Tenge' => 'KZT',
    'Korea (North) Won' => 'KPW',
    'Korea (South) Won' => 'KRW',
    'Kyrgyzstan Som' => 'KGS',
    'Laos Kip' => 'LAK',
    'Latvia Lat' => 'LVL',
    'Lebanon Pound' => 'LBP',
    'Liberia Dollar' => 'LRD',
    'Lithuania Litas' => 'LTL',
    'Macedonia Denar' => 'MKD',
    'Malaysia Ringgit' => 'MYR',
    'Mauritius Rupee' => 'MUR',
    'Mexico Peso' => 'MXN',
    'Mongolia Tughrik' => 'MNT',
    'Mozambique Metical' => 'MZN',
    'Namibia Dollar' => 'NAD',
    'Nepal Rupee' => 'NPR',
    'Netherlands Antilles Guilder' => 'ANG',
    'New Zealand Dollar' => 'NZD',
    'Nicaragua Cordoba' => 'NIO',
    'Nigeria Naira' => 'NGN',
    'Norway Krone' => 'NOK',
    'Oman Rial' => 'OMR',
    'Pakistan Rupee' => 'PKR',
    'Panama Balboa' => 'PAB',
    'Paraguay Guarani' => 'PYG',
    'Peru Nuevo Sol' => 'PEN',
    'Philippines Peso' => 'PHP',
    'Poland Zloty' => 'PLN',
    'Qatar Riyal' => 'QAR',
    'Romania New Leu' => 'RON',
    'Russia Ruble' => 'RUB',
    'Saint Helena Pound' => 'SHP',
    'Saudi Arabia Riyal' => 'SAR',
    'Serbia Dinar' => 'RSD',
    'Seychelles Rupee' => 'SCR',
    'Singapore Dollar' => 'SGD',
    'Solomon Islands Dollar' => 'SBD',
    'Somalia Shilling' => 'SOS',
    'South Africa Rand' => 'ZAR',
    'Sri Lanka Rupee' => 'LKR',
    'Sweden Krona' => 'SEK',
    'Switzerland Franc' => 'CHF',
    'Suriname Dollar' => 'SRD',
    'Syria Pound' => 'SYP',
    'Taiwan New Dollar' => 'TWD',
    'Thailand Baht' => 'THB',
    'Trinidad and Tobago Dollar' => 'TTD',
    'Turkey Lira' => 'TRL',
    'Tuvalu Dollar' => 'TVD',
    'Ukraine Hryvna' => 'UAH',
    'United Kingdom Pound' => 'GBP',
    'United States Dollar' => 'USD',
    'Uruguay Peso' => 'UYU',
    'Uzbekistan Som' => 'UZS',
    'Venezuela Bolivar' => 'VEF',
    'Viet Nam Dong' => 'VND',
    'Yemen Rial' => 'YER',
    'Zimbabwe Dollar' => 'ZWD',
];
    	return View('welcome',compact('curr'));
    }

    public function converter(Request $request){
    	$from = request('from');
    	$to = request('to');
    	$amount = request('amount');
    	$string = $from . "_" . $to;

    	$response = Http::get("https://free.currconv.com/api/v7/convert?q=$string&compact=ultra&apiKey=d30842f7181c25187732");

    	$data = $response->body();

    	$rate = json_decode($data,true);
    	$converter_price = $rate[$string];
    	$result = $converter_price * $amount;

    	echo $result;
    	
    	/*$ch = curl_init();
    	
    	curl_setopt($ch, CURLOPT_URL, "https://free.currconv.com/api/v7/convert?q=$string&compact=ultra&apiKey=d30842f7181c25187732");

    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    	$response = curl_exec($ch);

    	$rate = json_decode($response,true);

    	//$total = $rate * $amount;

    	$converter_price = $rate[$string];
    	$result = $converter_price * $amount;

    	echo $result;*/
    	
    }
}
