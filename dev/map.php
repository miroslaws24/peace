
<html>
    <head>
        <meta charset="utf-8">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
		<style>
			@font-face {
				font-family: FuturaPT;
				src: url(FuturaPT.otf);
			}
			@font-face {
				font-family: FuturaPTMedium;
				src: url(FuturaPTMedium.otf);
			}
			*{
				margin: 0;
				padding: 0;
			}
		</style>
    </head>
        <body>
			<div id="map" style="width:100%; height:100%"></div>
			<script type="text/javascript">
				var map;

				DG.then(function () {
					map = DG.map('map', {
						center: [54.98, 82.89],
						zoom: 3
					});
				});
			</script>
		</body>
</html>
