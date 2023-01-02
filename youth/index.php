<?php
$strTitle = 'Youth Ministries: Meeting Schedule';
$strDescr = 'What&#39;s happening in our youth group.';
require ('../start.inc');
?>

<p id="pgt">Youth Ministries</p>

<div align="center">
<p id="pgt"><a name="events">Weekly Meetings</a></p>
</div>

<div align="center">
  <table border="0" width="90%">
    <tr id="ythgh">
      <td align="center" valign="top">
      <img border="0" src="../images/daytime.gif" height="14"></td>
      <td align="center" valign="top">
      <img border="0" src="../images/event1.gif" height="14"></td>
      <td align="center" valign="top">
      <img border="0" src="../images/leaders.gif" height="14"></td>
    </tr>
    <tr id="ythgdk">
      <td valign="top" align="right" id="ythbld">Sunday<br>
        9:30 a.m.</td>
      <td valign="top" id="ythbld">Sunday School<i><br>
        </i><span class="ythreg">A Bible study to help you grow deeper in the Lord.</span></td>
      <td valign="top" id="ythbld">Terry Watson</td>
    </tr>
    <tr id="ythglt">
      <td valign="top" align="right" id="ythbld">Wednesday<br>
        6:15-7:45 p.m.<br>
        Sept-May</td>
      <td valign="top" id="ythbld">Youth Group<br>
        <span class="ythreg">A time for Bible study and games led by Pastor Ed with the help of youth parents.</span></td>
      <td valign="top" id="ythbld">Ed Vasicek</td>
    </tr>
    </table>
<p><br><br><a href="https://www.highlandpc.com/aboutus/camp.php" class="reg">Camp Emmanuel</a></p>
</div>
<div>
  <p align="left"><a name="wantedemail"><br></a>
	If you would like to hear about upcoming events, please email 
	<a href="<?php print $mellCmd; ?>" class=reg><?php print $mellMe; ?></a>.</p>
  <p align="left">
	Parents: We need your involvement for transportation when possible. Please join
	our effort to provide a great youth experience. We are out to help you, not 
	replace you. Please make sure you fill out and return 
	<a href="permslip13.pdf" target="offline" class="reg">parental permission forms</a>.</p>
</div>
    
<?php
require ('../stop.inc');
?>
