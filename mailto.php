<?php
header('Content-type:text/html;charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="da" version="XHTML+RDFa 1.0" dir="ltr">
<head profile="http://www.w3.org/1999/xhtml/vocab">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<script type="text/javascript">
location.href='mailto:?<?php echo htmlentities(utf8_decode($_GET['e'])); ?>&amp;subject=<?php echo htmlentities(utf8_decode($_GET['s'])); ?>&amp;body=<?php echo htmlentities(utf8_decode($_GET['b'])); ?>';
</script>
</body>
</html>
