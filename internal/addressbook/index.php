<?php
include ("../key.php");
include ("address_header.html");

if ($submit) { 

  if ($id) { $sql = "UPDATE main SET first_name='$first_name',last_name='$last_name',company='$company',email1='$email1',phone1='$phone1',phone2='$phone2',phone3='$phone3',phone4='$phone4',text_message='$text_message',address='$address',website='$website',username='$username',password='$password',phone5='$phone5',email2='$email2',notes='$notes',label1='$label1',label2='$label2',label3='$label3',label4='$label4',label5='$label5',email_label1='$email_label1',email_label2='$email_label2' WHERE id=$id";  } 

 else { $sql = "INSERT INTO main (first_name,last_name,company,email1,phone1,phone2,phone3,phone4,text_message,address,website,username,password,phone5,notes,email2,label1,label2,label3,label4,label5,email_label1,email_label2) VALUES ('$first_name','$last_name','$company','$email1','$phone1','$phone2','$phone3','$phone4','$text_message','$address','$website','$username','$password','$phone5','$notes','$email2','$label1','$label2','$label3','$label4','$label5','$email_label1','$email_label2')"; }

  // run SQL against the DB

  $result = mysql_query($sql);

  echo "Record updated/edited!<p>";
  echo "<font size=4><b><a href=\"$PHP_SELF\"><<-Back</a></font></b><BR><BR>";

} 

// delete a record

elseif ($delete) {
  $sql = "DELETE FROM main WHERE id=$id";	
  $result = mysql_query($sql);
  echo " Record deleted!<p>";
  echo "<a href=\"$PHP_SELF\">Back</a>";

} 

// this part happens if we don't press submit

else {

  if (!$id) {
    // print the list if we're not editing

if ($sort == "") { $sort = "last_name"; }
# echo "<a href=\"$PHP_SELF?username=all\">All</a>";
if ($username == "") { $username = "all"; }

$result = mysql_query("SELECT * FROM main WHERE username like '%$username%' ORDER BY (CONCAT(company, ' ', last_name))",$db);

printf ("<br><table border=\"2\" cellpadding=\"2\"cellspacing=\"2\" width=770><tr><td>Company</td><td>Name</td><td>Primary Phone</td><td align=\"center\" width=\"65\">Text Msg</td><td align=center width=\"65\">Website</td><td>&nbsp;</td></tr>"); 


while ($myrow = mysql_fetch_array($result)) {


// Company Name
if (!$myrow[company]) { echo "<tr><td>&nbsp;</td>"; }
else { echo "<tr><td>$myrow[company] </a></td>"; }


// Email and Names
if (!$myrow[email1]) { echo "<td>&nbsp;$myrow[first_name] $myrow[last_name]</td>"; }
else { echo "<td>&nbsp;<a href=\"mailto:$myrow[email1]\"</a>$myrow[first_name] $myrow[last_name]</a></td>"; }


// Phone1
if (!$myrow[phone1]) { echo "<td>&nbsp; </td>"; }
else { echo "<td width=190> $myrow[label1] $myrow[phone1]</a> </td>"; }


// Cell and Text Messaging
if (!$myrow[text_message]) { echo "<td>&nbsp; </td>"; }
elseif (!$myrow[text_message]) { echo "<td>$myrow[cell_phone]</td>"; }
else { echo "<td align=\"center\"><a href=\"$myrow[text_message]\"target=_blank>Send</a></td>"; }


// Website
if (!$myrow[website]) { echo "<td>&nbsp; </td>"; }
else { echo "<td align=center><a href=\"http://$myrow[website]\" target=_blank>Visit</a></td>"; }


echo "<td align=right width=40><a href=\"$PHP_SELF?id=$myrow[id]\">Edit</a></td></tr>";


printf ("</table"); 

  }
}

?>

<P>
<HR>
<P>

 <form method="post" action="<?php echo $PHP_SELF?>">

  <?php

  if ($id) {

    // editing so select a record


    $sql = "SELECT * FROM main WHERE id=$id";
    $result = mysql_query($sql);
    $myrow = mysql_fetch_array($result);
    $id = $myrow["id"];

    $first_name = $myrow["first_name"];
    $last_name = $myrow["last_name"];
    $company = stripslashes($myrow["company"]);
    $email1 = $myrow["email1"];
    $email2 = $myrow["email2"];
    $phone1 = $myrow["phone1"];
    $phone2 = $myrow["phone2"];
    $phone3 = $myrow["phone3"];
    $phone4 = $myrow["phone4"];
    $text_message = $myrow["text_message"];
    $website = $myrow["website"];
    $address = stripslashes($myrow["address"]);
    $notes = stripslashes($myrow["notes"]);
    $phone5 = stripslashes($myrow["phone5"]);
    $label1 = $myrow["label1"];
    $label2 = $myrow["label2"];
    $label3 = $myrow["label3"];
    $label4 = $myrow["label4"];
    $label5 = $myrow["label5"];
    $email_label1 = $myrow["email_label1"];
    $email_label2 = $myrow["email_label2"];


    $username = $myrow["username"];
    $password = $myrow["password"];

    // print the id for editing


    ?>

    <input type=hidden name="id" value="<?php echo $id ?>">
    <input type="hidden" name="password" value="2055"><br>
    <input type="hidden" name="username" value="cscape">


<?php

}

?>

<table border=2 width=550>
<tr><td>First Name:</td><td><input type="Text" name="first_name" SIZE=11 MAXLENGTH=11 value="<?php echo $first_name ?>"></td><td> Last Name:</td><td><input type="Text" name="last_name" SIZE=11 MAXLENGTH=11 value="<?php echo $last_name ?>"></td></tr>
<tr><td>Company Name:</td><td colspan=3><input type="Text" name="company" SIZE=36 MAXLENGTH=36 value="<?php echo $company ?>"></td></tr>


<tr><td colspan=2 align=center><table><tr><td align="center"><font size=3 face=arial>Primary Phone #</font> <font size=1><br> Displayed in List</font></td></tr><tr><td>
<INPUT TYPE="radio" NAME="label1" VALUE="(Home) "<?php if ($myrow[label1] == "(Home)" ) { echo "CHECKED";}?> >Home
<INPUT TYPE="radio" NAME="label1" VALUE="(Work) "<?php if ($myrow[label1] == "(Work)" ) { echo "CHECKED";}?> >Work
<INPUT TYPE="radio" NAME="label1" VALUE="(Cell) "<?php if ($myrow[label1] == "(Cell)" ) { echo "CHECKED";}?> >Cell
<INPUT TYPE="radio" NAME="label1" VALUE="(Voicemail) "<?php if ($myrow[label1] == "(Voicemail)" ) { echo "CHECKED";}?> >Voicemail<br>
<INPUT TYPE="radio" NAME="label1" VALUE="(Pager) "<?php if ($myrow[label1] == "(Pager)" ) { echo "CHECKED";}?> >Pager
<INPUT TYPE="radio" NAME="label1" VALUE="(Fax) "<?php if ($myrow[label1] == "(Fax)" ) { echo "CHECKED";}?> >Fax
<INPUT TYPE="radio" NAME="label1" VALUE="(Other) "<?php if ($myrow[label1] == "(Other)" ) { echo "CHECKED";}?> >Other
<INPUT TYPE="radio" NAME="label1" VALUE="">None
<tr><td align="center">
<input type="Text" name="phone1" value="<?php echo $phone1 ?>"></td></tr></table></td>

<td colspan=2 align=center><table><tr><td align="center"><font size=3 face=arial>Secondary Phone #</font></td></tr><tr><td>
<INPUT TYPE="radio" NAME="label2" VALUE="(Home) "<?php if ($myrow[label2] == "(Home)" ) { echo "CHECKED";}?> >Home
<INPUT TYPE="radio" NAME="label2" VALUE="(Work) "<?php if ($myrow[label2] == "(Work)" ) { echo "CHECKED";}?> >Work
<INPUT TYPE="radio" NAME="label2" VALUE="(Cell) "<?php if ($myrow[label2] == "(Cell)" ) { echo "CHECKED";}?> >Cell
<INPUT TYPE="radio" NAME="label2" VALUE="(Voicemail) "<?php if ($myrow[label2] == "(Voicemail)" ) { echo "CHECKED";}?> >Voicemail<br>
<INPUT TYPE="radio" NAME="label2" VALUE="(Pager) "<?php if ($myrow[label2] == "(Pager)" ) { echo "CHECKED";}?> >Pager
<INPUT TYPE="radio" NAME="label2" VALUE="(Fax) "<?php if ($myrow[label2] == "(Fax)" ) { echo "CHECKED";}?> >Fax
<INPUT TYPE="radio" NAME="label2" VALUE="(Other) "<?php if ($myrow[label2] == "(Other)" ) { echo "CHECKED";}?> >Other
<INPUT TYPE="radio" NAME="label2" VALUE="">None

<tr><td align="center">
<input type="Text" name="phone2" value="<?php echo $phone2 ?>"></td></tr></table></td>

<tr><td colspan=2 align=center><table><tr><td align="center"><font size=3 face=arial>Phone # 3</font></td></tr><tr><td>
<INPUT TYPE="radio" NAME="label3" VALUE="(Home) "<?php if ($myrow[label3] == "(Home)" ) { echo "CHECKED";}?> >Home
<INPUT TYPE="radio" NAME="label3" VALUE="(Work) "<?php if ($myrow[label3] == "(Work)" ) { echo "CHECKED";}?> >Work
<INPUT TYPE="radio" NAME="label3" VALUE="(Cell) "<?php if ($myrow[label3] == "(Cell)" ) { echo "CHECKED";}?> >Cell
<INPUT TYPE="radio" NAME="label3" VALUE="(Voicemail) "<?php if ($myrow[label3] == "(Voicemail)" ) { echo "CHECKED";}?> >Voicemail<br>
<INPUT TYPE="radio" NAME="label3" VALUE="(Pager) "<?php if ($myrow[label3] == "(Pager)" ) { echo "CHECKED";}?> >Pager
<INPUT TYPE="radio" NAME="label3" VALUE="(Fax) "<?php if ($myrow[label3] == "(Fax)" ) { echo "CHECKED";}?> >Fax
<INPUT TYPE="radio" NAME="label3" VALUE="(Other) "<?php if ($myrow[label3] == "(Other)" ) { echo "CHECKED";}?> >Other
<INPUT TYPE="radio" NAME="label3" VALUE="">None
<tr><td align="center">
<input type="Text" name="phone3" value="<?php echo $phone3 ?>"></td></tr></table></td>

<td colspan=2 align=center><table><tr><td align="center"><font size=3 face=arial>Phone # 4</font></td></tr><tr><td>
<INPUT TYPE="radio" NAME="label4" VALUE="(Home) "<?php if ($myrow[label4] == "(Home)" ) { echo "CHECKED";}?> >Home
<INPUT TYPE="radio" NAME="label4" VALUE="(Work) "<?php if ($myrow[label4] == "(Work)" ) { echo "CHECKED";}?> >Work
<INPUT TYPE="radio" NAME="label4" VALUE="(Cell) "<?php if ($myrow[label4] == "(Cell)" ) { echo "CHECKED";}?> >Cell
<INPUT TYPE="radio" NAME="label4" VALUE="(Voicemail) "<?php if ($myrow[label4] == "(Voicemail)" ) { echo "CHECKED";}?> >Voicemail<br>
<INPUT TYPE="radio" NAME="label4" VALUE="(Pager) "<?php if ($myrow[label4] == "(Pager)" ) { echo "CHECKED";}?> >Pager
<INPUT TYPE="radio" NAME="label4" VALUE="(Fax) "<?php if ($myrow[label4] == "(Fax)" ) { echo "CHECKED";}?> >Fax
<INPUT TYPE="radio" NAME="label4" VALUE="(Other) "<?php if ($myrow[label4] == "(Other)" ) { echo "CHECKED";}?> >Other
<INPUT TYPE="radio" NAME="label4" VALUE="">None
<tr><td align="center">
<input type="Text" name="phone4" value="<?php echo $phone4 ?>"></td></tr></table></td>

<tr><td colspan=2 align=center><table><tr><td align="center"><font size=3 face=arial>Phone # 5</font></td></tr><tr><td>
<INPUT TYPE="radio" NAME="label5" VALUE="(Home) "<?php if ($myrow[label5] == "(Home)" ) { echo "CHECKED";}?> >Home
<INPUT TYPE="radio" NAME="label5" VALUE="(Work) "<?php if ($myrow[label5] == "(Work)" ) { echo "CHECKED";}?> >Work
<INPUT TYPE="radio" NAME="label5" VALUE="(Cell) "<?php if ($myrow[label5] == "(Cell)" ) { echo "CHECKED";}?> >Cell
<INPUT TYPE="radio" NAME="label5" VALUE="(Voicemail) "<?php if ($myrow[label5] == "(Voicemail)" ) { echo "CHECKED";}?> >Voicemail<br>
<INPUT TYPE="radio" NAME="label5" VALUE="(Pager) "<?php if ($myrow[label5] == "(Pager)" ) { echo "CHECKED";}?> >Pager
<INPUT TYPE="radio" NAME="label5" VALUE="(Fax) "<?php if ($myrow[label5] == "(Fax)" ) { echo "CHECKED";}?> >Fax
<INPUT TYPE="radio" NAME="label5" VALUE="(Other) "<?php if ($myrow[label5] == "(Other)" ) { echo "CHECKED";}?> >Other
<INPUT TYPE="radio" NAME="label5" VALUE="">None
<tr><td align="center">
<input type="Text" name="phone5" value="<?php echo $phone5 ?>"></td></tr></table></td>

<tr><td>Text Message:</td><td colspan=2 valign="middle"><input type="text" name="text_message" value="<?php echo $text_message ?>" size=36 maxlength=46></td><td><font size=2> (http:// or mailto: required)</font></td></tr>
<tr><td>Email1:</td><td colspan=3><input type="Text" name="email1" value="<?php echo $email1 ?>" size=36 maxlength=36></td></tr>
<tr><td>Email2:</td><td colspan=3><input type="Text" name="email2" value="<?php echo $email2 ?>" size=36 maxlength=36></td></tr>
<tr><td>Website:</td><td colspan=2 valign="middle"><input type="Text" name="website" value="<?php echo $website ?>" size=36 maxlength=36></td><td><font size=2> (http:// NOT required)</font></td></tr>
<tr><td>Address:</td><td colspan=3><TEXTAREA name="address" ROWS=4 COLS=30><?php echo $address ?></TEXTAREA></td></tr>
<tr><td>Notes:</td><td colspan=3><TEXTAREA name="notes" ROWS=4 COLS=50><?php echo $notes ?></TEXTAREA></td></tr>
<tr><td>Listed On:<td colspan=3><SELECT NAME="username">
<option value="<?php echo $username ?>" SELECTED><?php echo $username ?></option>
<option value="-------"</option>
<option value="all">All</option>
</select>
</td></tr>
<tr><td align="center" colspan="4">
<table width=510 border=0><tr><td align="center" width="170">
<?php
if ($id) { echo "<a href=\"$PHP_SELF\">Cancel</a></td>"; }
else { echo "&nbsp;</td>"; }
?>
<td align="center" width=170><input type="Submit" name=submit value="Enter information"></td>
<?php
if ($id) { echo "<td align=center><a href=\"$PHP_SELF?id=$myrow[id]&delete=yes\"> Delete</a> $myrow[first_name]  $myrow[last_name]"; }
else { echo "<td>&nbsp;</td>"; }
}
?>
</tr>
</table>
</td></tr>
</table>
</form>

<?php
include ("address_footer.html");

?>


