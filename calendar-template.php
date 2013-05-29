<?php
/*
Template Name: Calendar
*/
?>

<?php get_header(); ?>
<!--calendar-template.php-->

<div id="content">
<?php //include(TEMPLATEPATH."/feature-cal.inc.php");  ?>
     
  
  <?php
		
	
		$locations = array(
			'ARG' => 'Regional',
			'COL' => 'Columbia',
			'CAL' => 'Fulton',
			'SBC' => 'Ashland',
			'BMP' => 'Harrisburg'
		);
		
		$rooms = array(
			'CAL' => 'Callaway County Public Library',
			'COL' => 'Columbia Public Library',
			'SBC' => 'Southern Boone County Public Library'			
		);
		
		
		$bkm_locations = array(
			'auxvasse' => 'Auxvasse', 
			'hallsville' => 'Hallsville', 
			'harrisburg' => 'Harrisburg',
			'holtssummit' => 'Holts Summit', 
			'sturgeon' => 'Sturgeon' ,
			'williamsburg' => 'Williamsburg'
		);
	
	
		$types = array(
			'author' 	=> 'Author Interview & Visit',
			'radio' 		=> 'Radio Broadcasts',
			'booktalk'	=> 'Book Discussions',
			'runner-up' 	=> 'Runners-Up Book Discussions',
			'art' 		=> 'Art, Writing, Music & Movies',
			'movie' 		=> 'Films',			
			'display' 	=> 'Art Exhibits',
			'psych' 	=> 'Psychology & Identity',
			'family' => 'Family',
			'presentation' => 'Presentations',
			'history' => 'History'
		);
		
?>
<h1><a href="/calendar/">Calendar of Events</a></h1>
<div id="calendar-controls">
    <p class="events-filters"><strong>Browse by location</strong>:<br />
    <a href="?l=col">Columbia</a>, 
    <a href="?l=cal">Fulton</a>, 
    <a href="?l=sbc">Ashland</a>, 
    <a href="?l=bmp">Harrisburg</a>, 
    <a href="?t=radio">Radio</a></p>
    
<p class="events-filters"><strong>Browse by subject</strong>:<br />
    <a href="?t=art">Arts</a>, 
    <a href="?t=author">Author</a>, 
    <a href="?t=display">Art Exhibits</a>, 
    <a href="?t=booktalk">Booktalks</a>, 
    <a href="?t=family">Family</a>, 
    <a href="?t=movie">Films</a>,
    <a href="?t=history">History</a>, 
    <a href="?t=presentation">Presentations</a>,
    <a href="?t=psych">Psychology & Identity</a>, 
    <a href="?t=runner-up">Runners-Up</a></p>
</div>
<?php		
		if ( isset($_GET['t']) && array_key_exists($_GET['t'], $types) ):
		
			echo '<h3>' . $types[$_GET['t']] . '</h3>';		
			echo file_get_contents('http://www.dbrl.org/api.calendar.php?f=html&e=o&l=100&t='. $_GET['t']);					  								  
			
		elseif ( isset($_GET['l']) && array_key_exists(strtoupper($_GET['l']), $locations) ):
		
			echo '<h3>Programs in ' . $locations[strtoupper($_GET['l'])] . '</h3>';			
			echo file_get_contents('http://www.dbrl.org/api.calendar.php?f=html&e=o&l=100&o=1&w='. $_GET['l']);
		
		else:
			echo '<h3>Featured Programs </h3>';			
			echo file_get_contents('http://www.dbrl.org/api.calendar.php?f=html&e=o&l=5&t=feature');
		endif;

	
	?>
	

</div>

<!--include sidebar-->
<?php get_sidebar(); ?>

<!--include footer-->
<?php get_footer(); ?>