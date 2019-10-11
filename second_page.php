<!--<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="#home">HOME</a></li>
  <li><a href="nike(shoes).php">SHOES</a></li>
  <li><a href="nike(allproducts).php">SPORTS WEAR</a></li>
  <li><a href="nike(sports).php">SPORTS EQUIPMENTS</a></li>
</ul>

</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - effects - ascii</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #111;
    }

			body {
				padding:0;
				margin:0;
				font-weight: bold;
				overflow:hidden;
			}
			#info {
				position: absolute;
				top: 0px; width: 100%;
				color: #ffffff;
				padding: 5px;
				font-family:Monospace;
				font-size:13px;
				text-align:center;
				z-index:1000;
			}
			a {
				color: #ff0000;
			}
			#webglmessage a { color:#da0 }
		</style>
	</head>

	<body>
    <ul>
      <li><a class="active" href="#home">HOME</a></li>
      <li><a href="nike(shoes).php">SHOES</a></li>
      <li><a href="nike(allproducts).php">SPORTS WEAR</a></li>
      <li><a href="nike(sports).php">SPORTS EQUIPMENTS</a></li>
    </ul>
		<script src="js/three.js"></script>

		<script src="js/TrackballControls.js"></script>
		<script src="js/AsciiEffect.js"></script>

		<script src="js/WebGL.js"></script>

		<script>
			if ( WEBGL.isWebGLAvailable() === false ) {
				document.body.appendChild( WEBGL.getWebGLErrorMessage() );
			}
			var camera, controls, scene, renderer, effect;
			var sphere, plane;
			var start = Date.now();
			init();
			animate();
			function init() {
				camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.y = 150;
				camera.position.z = 500;
				controls = new THREE.TrackballControls( camera );
				scene = new THREE.Scene();
				var light = new THREE.PointLight( 0xffffff );
				light.position.set( 500, 500, 500 );
				scene.add( light );
				var light = new THREE.PointLight( 0xffffff, 0.25 );
				light.position.set( - 500, - 500, - 500 );
				scene.add( light );
				sphere = new THREE.Mesh( new THREE.SphereBufferGeometry( 200, 20, 10 ), new THREE.MeshPhongMaterial( { flatShading: true }) );
				scene.add( sphere );
				// Plane
				plane = new THREE.Mesh( new THREE.PlaneBufferGeometry( 400, 400 ), new THREE.MeshBasicMaterial( { color: 0xe0e0e0 } ) );
				plane.position.y = - 200;
				plane.rotation.x = - Math.PI / 2;
				scene.add( plane );
				renderer = new THREE.WebGLRenderer();
				renderer.setSize( window.innerWidth, window.innerHeight );
				effect = new THREE.AsciiEffect( renderer, ' .:-+*=%@#', { invert: true } );
				effect.setSize( window.innerWidth, window.innerHeight );
				effect.domElement.style.color = 'white';
				effect.domElement.style.backgroundColor = 'black';
				// Special case: append effect.domElement, instead of renderer.domElement.
				// AsciiEffect creates a custom domElement (a div container) where the ASCII elements are placed.
				document.body.appendChild( effect.domElement );
				//
				window.addEventListener( 'resize', onWindowResize, false );
			}
			function onWindowResize() {
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight );
				effect.setSize( window.innerWidth, window.innerHeight );
			}
			//
			function animate() {
				requestAnimationFrame( animate );
				render();
			}
			function render() {
				var timer = Date.now() - start;
				sphere.position.y = Math.abs( Math.sin( timer * 0.002 ) ) * 150;
				sphere.rotation.x = timer * 0.0003;
				sphere.rotation.z = timer * 0.0002;
				controls.update();
				effect.render( scene, camera );
			}
		</script>

	</body>
</html>
