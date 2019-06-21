<?php
	// Header
?>
<p>Meteosondy
 <form method='get' action='' id='form_lang' >
   Select Language : <select name='lang' onchange='changeLang();' >
   <option value='eng' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng'){ echo "selected"; } ?> >English</option>
   <option value='svk' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'svk'){ echo "selected"; } ?> >Slovak</option>
  </select>
 </form>
</p>
