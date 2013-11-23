<?php
/**
 * The loop that displays a page.
 *
 * @package WordPress
 * @subpackage Purple Sun
 * @since Starkers HTML5 3.2
 */
?>

<?php //get_header(); ?>

	<h1>Form Factory Demo</h1>
	
	<h2>Form Factory Plugin Status</h2>
	
	<?php if ( atgc_purple__dep_plugins_loaded( 'Form Factory' ) ) : ?>
	
		<p>Congratulations, Form Factory is successfully loaded!</p>
	
	<?php
	
		$ff = new TW_FormFactory('client');
		
		$json = $ff->jsonTestSchemaExpansion();
		
		//var_dump($json);
		
		//$ff_json = $ff->json_load_schema('client');
		
		//$ff->json_locate_refs( $ff_json );
			
	?>
	
	<h2>Testing JSON Extended class functions</h2>
	
	<?php
	
		$json_extended = new TW_JsonExtended( $json );
		
		$json_extended->iterate();
	
	?>
	
	<?php else : ?>
	
		<p>Bummer, Form Factory is not loaded.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>