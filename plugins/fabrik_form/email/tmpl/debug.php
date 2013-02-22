<?php
/**
 * This is a sample email template. It will just print out all of the request data:
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.form.email
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
?>
<table>
<h1>Field trip reserved!</h2>
<p> Sorry for the ugly "welcome" email, we're working on it...  We just wanted ot make sure you received some confirmation of your reservation. </p>

<p> Please call the office if you haven't already talked to Lisa regarding the date and time and she'll walk you through the procedure to pay the deposit and what to expect in the mail from us.</p>

<p> We know that you have many choices in educational field trips and we are thrilled that you chose us, so we look forward to your visit!</p>

<p> Sincerely, Cathy's Critters and the Myers Park and Events Center staff</p>

<p> ====================== Below this line only intended for office use ============================== </p>

<?php
foreach ($this->data as $key => $val)
{
	if ($key === 'join') :
		continue;
	endif;
	echo '<tr><td>' . $key . '</td><td>';
	if (is_array($val)) :
		foreach ($val as $v):
			if (is_array($v)) :
				echo implode("<br>", $v);
			else:
				echo implode("<br>", $val);
			endif;
		endforeach;
	else:
		echo $val;
	endif;
	echo "</td></tr>";
}
?>
</table>

<table>
<?php
$joindata = $this->data['join'];
foreach (array_keys($joindata) as $joinkey) :
	$keys = array_keys($joindata[$joinkey]);
	$length = count($joindata[$joinkey][$keys[0]]);
	for ($i = 0; $i < $length; $i++) :
		echo '<tr><td colspan="2"><h3>record ' . $i . '</h3></td></tr>';
		foreach ($keys as $k) :
			echo '<tr><td>' . $k . '</td><td>' . $this->data['join'][$joinkey][$k][$i] . '</td></tr>';
		endforeach;
	endfor;
endforeach;
?>
</table>
