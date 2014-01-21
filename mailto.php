<?php
header('Content-type:text/html;charset=iso-8859-1');
function lf2entities($subject) {
  return str_replace("\n", '%0a', $subject);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" version="XHTML+RDFa 1.0" dir="ltr">
<head profile="http://www.w3.org/1999/xhtml/vocab">	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

  <body onload="location.href = document.getElementById('l').href;">
  <a style="display: none;" id="l" href="mailto:?subject=<?php echo htmlentities(utf8_decode($_GET['s'])); ?>&amp;body=<?php echo lf2entities(htmlentities(utf8_decode($_GET['b']))); ?>">test</a>

</body>
</html>
