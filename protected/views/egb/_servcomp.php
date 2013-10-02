<html> 
<head> 
<script type="text/javascript"> 
next=0; 
function nextel(event) 
{ 
if(event.keyCode==13){ 
if(next>2){next=0} 
document.forms[0].elements[next].focus(); 
next++; 
} 
} 
</script> 
</head> 
<body> 
<form> 
<input size="4" maxlength="4" onkeypress="nextel(event)"> 
<input size="4" maxlength="4" onkeypress="nextel(event)"> 
<input size="4" maxlength="4" onkeypress="nextel(event)"> 
</form> 
</body> 
</html>