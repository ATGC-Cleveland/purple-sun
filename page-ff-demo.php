<?php
/**
 * The loop that displays a page.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.2
 */
?>

<?php //get_header(); ?>

	<h1>JSON Schema Testing</h1>
	
	<?php if ( atgc_purple__dep_plugins_loaded( 'Form Factory' ) ) : ?>
	
	<p>Congratulations, Form Factory is successfully loaded!</p>
	
	<?php
	
		$ff = new TW_FormFactory('client');
		
		$ff->jsonTestSchemaExpansion();
		
		//$ff_json = $ff->json_load_schema('client');
		
		//$ff->json_locate_refs( $ff_json );
			
	?>
	
	<?php else : ?>
	
	<p>Bummer, Form Factory is not loaded.</p>
	
	<?php endif; ?>

<?php get_footer(); ?>