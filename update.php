<?php
$city="matera"; //inserire città in minuscolo
$id="F052"; //inserire codice di impresainungiorno. di solito è il CAP
exec('curl -v -c cookies.txt "https://www.impresainungiorno.gov.it" ');

exec('curl -v -b cookies.txt -L "https://www.impresainungiorno.gov.it/web/'.$city.'/comune/pratiche-presentate/t/'.$id.'" -H "Host: www.impresainungiorno.gov.it" -H "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36" -H "Accept: text/csv,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8" -H "Accept-Language: it-IT,it;q=0.8,en-US;q=0.6,en;q=0.4,cs;q=0.2" -H "Upgrade-Insecure-Requests: 1" -H "Accept-Encoding: gzip, deflate, sdch, br" --compressed -H "Referer: https://www.impresainungiorno.gov.it/web/'.$city.'/comune/pratiche-presentate/t/'.$id.'" -H "Connection: keep-alive" > /usr/www/piersoft/suapmatera/db/falairnew.txt');

	$html = file_get_contents("/usr/www/piersoft/suapmatera/db/falairnew.txt");
    $html=str_replace(",","",$html);
  $html=str_replace("p_auth=","<prova>",$html);
  $html=str_replace("&p_p_id=","<prova>",$html);

function getInnerSubstring($string,$delim){
  $string = explode($delim, $string, 3); // also, we only need 2 items at most
  return isset($string[1]) ? $string[1] : '';
}
$auth=getInnerSubstring($html,'<prova>');
$data="p_auth=".$auth."&p_p_id=3_WAR_servizi_attiviportlet&p_p_lifecycle=1&p_p_state=normal&p_p_mode=view&p_p_col_id=column-2&p_p_col_pos=1&p_p_col_count=3&_3_WAR_servizi_attiviportlet_cciaa=MT&_3_WAR_servizi_attiviportlet_javax.portlet.action=exportCSV";
exec('curl -v -b cookies.txt -L "https://www.impresainungiorno.gov.it/web/'.$city.'/comune/pratiche-presentate/t/'.$id.'" -H "Host: www.impresainungiorno.gov.it" -H "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36" -H "Accept: text/csv,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8" -H "Accept-Language: it-IT,it;q=0.8,en-US;q=0.6,en;q=0.4,cs;q=0.2" -H "Upgrade-Insecure-Requests: 1" -H "Accept-Encoding: gzip, deflate, sdch, br" --compressed -H "Referer: https://www.impresainungiorno.gov.it/web/'.$city.'/comune/pratiche-presentate/t/'.$id.'" -H "Connection: keep-alive" --data "'.$data.'" > /usr/www/piersoft/suapmatera/db/export.csv');


echo "finito";
?>
