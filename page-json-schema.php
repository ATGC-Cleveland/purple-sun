<?php
/**
 * The loop that displays a page.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.2
 */
?>

get_header(); ?>

	<h1>JSON Schema Testing</h1>
	
	<?php
	
		$schema = file_get_contents( get_template_directory() . '/schemas/client.json' );
		
		$data = json_decode($schema);
		
		//var_dump($data);
		
		foreach ( $data->properties as $key => $value ) {
			$list = get_object_vars($value);
			
			if ( array_key_exists( '$ref' , $list ) ) {
				echo 'There is a reference pointer constraint in ' . $key . ' property.<br />';
				
				//var_dump($list[ '$ref' ]);
				
				/**
				 *    found a ref pointer...now need to find the file
				 *    The file location should be a string value
				 *    Will always be contained in the 'schemas' folder of the theme directory.
				 *    Needs to handle uri's that are in subfolders.
				 *    Needs to only search for external file if pointer doesn't start with #.
				 *    RULE: ref pointer objects will be found under 'definitions' object when ref pointer starts
				 *          with # and is located in the same document.
				 *    RULE: All external schema URI's will be relative to the 'schema' directory.
				 *    RULE: External schemas with multiple definitions will be references by a pointer structured as
				 *          schema.json#definition
				 *    TODO: Need code to handle these three different situations.
				 */
				
				$pointer = file_get_contents( get_template_directory() . '/schemas/' . $list['$ref'] );
				
				//var_dump($pointer);
				
				$pointer = json_decode($pointer);
				
				//var_dump($pointer);
				
				$data->properties->$key = $pointer;
				
			} else {
				echo 'There is no reference pointer constraint in ' . $key . ' property.<br />';
			}
		}
		
		var_dump($data);
		
	?>

<?php get_footer(); ?>