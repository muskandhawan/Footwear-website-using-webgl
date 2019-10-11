<!doctype>
<html>
<head>
  <title>three.js</title>
  <style>
    body{
      margin:0;
    }
    canvas{
      width: 100%;
      height: 100%;
    }
    </style>
</head>
<body>
  <script src="js/three.js"></script>
  <script src = "js/OrbitControls.js"></script>
  <script>
    var scene = new THREE.Scene();  //whatever we are viewing and what user will be interactive with
    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000);
      //last 2 arguments are near and far clipping plane //virtual camera and user will see pic with this or graphic PerspectiveCamera
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    window.addEventListener( 'resize', function( ){
      var width = window.innerWidth;
      var height = window.innerHeight;
      renderer.setSize( width, height);
      camera.aspect = width / heigth ;
      camera.updateProjectionMatrix( );
    });

    controls = new THREE.OrbitControls( camera, renderer.domElement);


      //create the shape
       var geometry = new THREE.BoxGeometry( 2, 2, 2);
       //array for global mesh basic material 6 MeshBasicMaterial for 6 basis
       //mesh basic material is not affected by any light(ambient, point etc)
       var cubeMaterials = [
         new THREE.MeshBasicMaterial( {map: new THREE.TextureLoader( ).load( 'img/shoes1.jpg'), side: THREE.DoubleSide}),//right side
         new THREE.MeshBasicMaterial( {map: new THREE.TextureLoader( ).load( 'img/shoes2.jpg'), side: THREE.DoubleSide}),//left side
         new THREE.MeshBasicMaterial( {map: new THREE.TextureLoader( ).load( 'img/shoes3.jpg'), side: THREE.DoubleSide}),//top side
         new THREE.MeshBasicMaterial( {map: new THREE.TextureLoader( ).load( 'img/shoes4.jpg'), side: THREE.DoubleSide}),//top side
         new THREE.MeshBasicMaterial( {map: new THREE.TextureLoader( ).load( 'img/shoes5.jpg'), side: THREE.DoubleSide}),//front side
         new THREE.MeshBasicMaterial( {map: new THREE.TextureLoader( ).load( 'img/shoes6.jpg'), side: THREE.DoubleSide})//back side
         ];

//create a material, color or image texture
      var material = new THREE.MeshFaceMaterial( cubeMaterials );
      var cube = new THREE.Mesh( geometry, material);
      scene.add( cube );// at this point camera is inside cube so we can't see anything

      camera.position.z = 3;//changing camera detection


//game logic
    var update = function( ){
      cube.rotation.x += 0.01;
      cube.rotation.y += 0.005;
    };
//draw scene
    var render = function( ){
      renderer.render( scene, camera );
    };
//run game loop (update, render, repeat)
    var GameLoop = function( ){
      requestAnimationFrame( GameLoop );

      update( );
      render( );
    };

    GameLoop( );


  </script>




</body>
</html>
