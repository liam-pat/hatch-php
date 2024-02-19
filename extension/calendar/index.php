<?php
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$year202210Days = cal_days_in_month(CAL_MONTH_GREGORIAN_LONG, 10, 2022);
printf("There were %d days in August 2003 \n", $year202210Days);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * output : There were 31 days in August 2003
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
var_export(cal_from_jd(unixtojd(time()), CAL_GREGORIAN));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * output :
 * (
 *   [date] => 12/7/2022
 *   [month] => 12
 *   [day] => 7
 *   [year] => 2022
 *   [dow] => 3
 *   [abbrevdayname] => Wed
 *   [dayname] => Wednesday
 *   [abbrevmonth] => Dec
 *   [monthname] => December
 * )
 *
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
var_export(cal_info(CAL_GREGORIAN));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo cal_to_jd(CAL_GREGORIAN, 10, 12, 2022), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
printf("2022 easter day timestamp : %d\n", easter_date(2022));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
printf("2022 easter days : %d\n", easter_days(2022));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$jd = cal_to_jd(CAL_GREGORIAN, 10, 12, 2022);
$weekDayNum = jddayofweek($jd, 0);
$monthDayName = jdmonthname($jd, 0);
$dayToTimestamp = jdtounix($jd);
echo sprintf('day in week : %d', $weekDayNum), PHP_EOL;
echo sprintf('day in month name : %s', $monthDayName), PHP_EOL;
echo sprintf('day to timestamp: %s', $dayToTimestamp), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
