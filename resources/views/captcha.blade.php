<html>
<head>
	<title>EmCap</title>
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
	<style type="text/css">
	@font-face {
 font-family: OpenSansEmoji;
 src: url("{{ public_path('OpenSansEmoji.ttf') }}");
}
	</style>
Enter these emojis in correct order:<br><br>
<img src="{{asset('foo.png')}}"/>
  <form action="{{route('subCap')}}" method="post">
    @csrf
  <input type="text" name="cap_entered" id="result"/>
			<!-- clr() function will call clr to clear all value -->
<button type="button" onclick="clr()">Clear</button>
<br>
		<!-- <tr> -->
			<!-- create button and assign value to each button -->
			<!-- dis("1") will call function dis to display value -->
			@php
			$i = 0;
			@endphp
			@foreach ($emojis as $emo)
			<button type="button"  onclick="dis('{{$emojis[$i]}}')">{{$emojis[$i]}}</button>
			@php
			$i++;
			@endphp
			@endforeach
			<br>
			<button type="submit">Submit</button>
</form>
</body>
</html>
