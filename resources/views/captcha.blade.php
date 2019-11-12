<html>
<title></title>
<head>
	<script>
		//function that display value
		function dis(val)
		{
			document.getElementById("result").value+=val
		}

		//function that clear the display
		function clr()
		{
			document.getElementById("result").value = ""
		}
	</script>
</head>
<body>
  <form action="{{route('subCap')}}" method="post">
    @csrf
  <input type="text" id="result"/>
			<!-- clr() function will call clr to clear all value -->
<button type="button" onclick="clr()">Clear</button>
<br>
		<!-- <tr> -->
			<!-- create button and assign value to each button -->
			<!-- dis("1") will call function dis to display value -->
      <button type="button" onclick="dis('{{IntlChar::chr(128513)}}')">{{IntlChar::chr(128513)}}</button>
      <button type="button" onclick="dis('{{IntlChar::chr(128514)}}')">{{IntlChar::chr(128514)}}</button>
			<button type="button" onclick="dis('{{IntlChar::chr(128515)}}')">{{IntlChar::chr(128515)}}</button>
			<button type="button" onclick="dis('{{IntlChar::chr(128516)}}')">{{IntlChar::chr(128516)}}</button>
      <br>
			<button type="submit">Submit</button>
</form>
</body>
</html>
