( function ( document, window, index )
{
	let input = document.querySelector( '.inputfile' );
	let label = input.nextElementSibling;
	let labelVal = label.innerHTML;

	let imagenActualizar = document.querySelector( '#imagenActualizar' );
	let textoActualizar = document.querySelector('#textoActualizar');

	input.addEventListener( 'change', function( e )
	{
		let fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;

		
		//Recuperamos el archivo subido
		file = input.files[0];
		console.log(file);

		//Creamos la url
		objectURL = URL.createObjectURL(file);

		//Modificamos el atributo src de la etiqueta img
		imagenActualizar.src = objectURL;

		textoActualizar.innerHTML = "Visualizacion Nueva Imagen";

		// console.log(imagenActualizar);
	});
}( document, window, 0 ));
