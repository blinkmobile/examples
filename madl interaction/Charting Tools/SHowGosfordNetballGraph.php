$t->fetch("http://gosford.netball.asn.au/ladder.asp?comp=37796&OrgID=70");
$t->between("<td class=ta11Bw>:: Ladder // ", "<!--Ladder Output End-->");
$t->str_replace("&nbsp;","");
$t->rows(
 "|<td bgcolor=#~* class=ta10bw>{TEAM}</td>~*<td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>{WINS}</td><td bgcolor=#~* align=center class=ta10w>{LOSES}</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>~*</td><td bgcolor=#~* align=center class=ta10w>{POINTS}</td><td bgcolor=#~* align=center class=ta10w>~*</td>|U",
"{c:[{v: '{TEAM}'},{v: {WINS}}, {v: {LOSES}}, {v: {POINTS}}]},");

$tickets = '

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
     function drawChart() {
        var data = new google.visualization.DataTable(

{
       cols: [{id: \'Team\', label: \'Team\', type: \'string\'},
{id: \'Wins\', label: \'Wins\', type: \'number\'},
               {id: \'Loses\', label: \'Loses\', type: \'number\'},
{id: \'Points\', label: \'Points\', type: \'number\'}],
       rows: [

';

        
$tickets .= $t->result;
        
$tickets .= ' ]
     }

	);
	var chart = new google.visualization. BarChart(document.getElementById(\'dev_chart_div\'));
        chart.draw(data, {width: 600, height: 250, title: \'Gosford Under 13s Netball\'});
      }    </script>
';

$tickets .= '<span id="dev_chart_div"></span>';


return $tickets;