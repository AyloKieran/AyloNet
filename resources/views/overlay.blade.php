<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="stylesheet" href="/assets/overlay/styles/style.css">

<div id="container"></div>

<video id="transition" muted="">
    <source src="./assets/overlay/T.webm">
</video>

<script> 
    function loadJS(lscript) {
        var script = document.createElement("script")
        script.src = lscript
        document.head.appendChild(script);
    }

    loadJS("/assets/overlay/scripts/main.js")
   
</script>
