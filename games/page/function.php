<?
function rus_date() {
// Перевод
 $translate = array(
 "am" => "дп",
 "pm" => "пп",
 "AM" => "ДП",
 "PM" => "ПП",
 "Monday" => "Понедельник",
 "Mon" => "Пн",
 "Tuesday" => "Вторник",
 "Tue" => "Вт",
 "Wednesday" => "Среда",
 "Wed" => "Ср",
 "Thursday" => "Четверг",
 "Thu" => "Чт",
 "Friday" => "Пятница",
 "Fri" => "Пт",
 "Saturday" => "Суббота",
 "Sat" => "Сб",
 "Sunday" => "Воскресенье",
 "Sun" => "Вс",
 "January" => "января",
 "Jan" => "Янв",
 "February" => "февраля",
 "Feb" => "Фев",
 "March" => "марта",
 "Mar" => "мар",
 "April" => "апреля",
 "Apr" => "апр",
 "May" => "мая",
 "May" => "Мая",
 "June" => "июня",
 "Jun" => "Июн",
 "July" => "июля",
 "Jul" => "Июл",
 "August" => "августа",
 "Aug" => "Авг",
 "September" => "сентября",
 "Sep" => "Сен",
 "October" => "октября",
 "Oct" => "Окт",
 "November" => "ноября",
 "Nov" => "Ноя",
 "December" => "декабря",
 "Dec" => "Дек",
 "st" => "ое",
 "nd" => "ое",
 "rd" => "е",
 "th" => "ое"
 );
 // если передали дату, то переводим ее
 if (func_num_args() > 1) {
 $timestamp = func_get_arg(1);
 return strtr(date(func_get_arg(0), $timestamp), $translate);
 } else {
// иначе текущую дату
 return strtr(date(func_get_arg(0)), $translate);
 }
 }
?>