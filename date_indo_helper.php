<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Indonesian Date Helper
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Adie Tuk
 * @link		""
 */

if ( ! function_exists('date_indo'))
{
	function date_indo($dt)
	{
		$change     = gmdate($dt, time()+60*60*8);
		$separate   = explode("-", $change);
		$date       = $separate[2];
		$month      = month($separate[1]);
		$year       = $separate[0];
		return $date . ' ' . $month . ' '. $year;
	}
}

if ( ! function_exists('month'))
{
	function month($month)
	{
		switch ($month)
		{
			case 1:
				return 'Januari';
				break;
			case 2:
				return 'Februari';
				break;
			case 3:
				return 'Maret';
				break;
			case 4:
				return 'April';
				break;
			case 5:
				return 'Mei';
				break;
			case 6:
				return 'Juni';
				break;
			case 7:
				return 'Juli';
				break;
			case 8:
				return 'Agustus';
				break;
			case 9:
				return 'September';
				break;
			case 10:
				return 'Oktober';
				break;
			case 11:
				return 'November';
				break;
			case 12:
				return 'Desember';
			break;
		}
	}
}

if ( ! function_exists('name_of_the_day'))
{
	function name_of_the_day($dt)
	{
		$change     = gmdate($dt, time()+60*60*8);
		$separate   = explode('-', $change);
		$date       = $separate[2];
		$month      = $separate[1];
		$year       = $separate[0];
		$name       = date('l', mktime(0, 0, 0, $month, $date, $year));
		$of_the_day = '';
		if ($name == 'Sunday') {$of_the_day = 'Minggu';}
		else if ($name == 'Monday') {$of_the_day = 'Senin';}
		else if ($name == 'Tuesday') {$of_the_day = 'Selasa';}
		else if ($name == 'Wednesday') {$of_the_day = 'Rabu';}
		else if ($name == 'Thursday') {$of_the_day = 'Kamis';}
		else if ($name == 'Friday') {$of_the_day = 'Jumat';}
		else if ($name == 'Saturday') {$of_the_day = 'Sabtu';}
		return $of_the_day;
	}
}

if ( ! function_exists('countdown'))
{
	function countdown($pr)
	{
		$periods = array(365*24*60*60	=> 'tahun',
						30*24*60*60		=> 'bulan',
						7*24*60*60		=> 'minggu',
						24*60*60		=> 'hari',
						60*60			=> 'jam',
						60				=> 'menit',
						1				=> 'detik');

		$arithmetic = strtotime(gmdate ('Y-m-d H:i:s', time () +60 * 60 * 8))-$pr;
		$result = array();
		if ($arithmetic < 5)
		{
			$result = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($periods as $period => $unit)
			{
				if ($stop>=6 || ($stop > 0 && $period < 60)) break;
				$for = floor ($arithmetic / $period);
				if($for > 0)
				{
					$result[] = $for . ' '. $unit;
					$arithmetic -= $for * $period;
					$stop++;
				}
				else if($stop>0) $stop++;
            }
                    $result = implode(' ', $result).' yang lalu';
        }
		return $result;
	}
}