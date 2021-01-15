<!DOCTYPE html>
	<html lang="en">
		<?php require "header.inc"; ?>
		<body>
			<?php require "menu.inc"; ?>
			<header>
				<h1>APNG - Animated PNG</h1>
			</header>
			
			<hr/>
			<h1>Enhancements</h1>
			<section>
				<h2>Enhancement 1</h2>
				<p>The web app was made more responsive to be compatible with mobile sized displays. This feature is not part of the original assignment specification. Techniques used to achieve this are: </p>
				<ol>
					<li>Using only relative scalars in the style sheet. This means that "px" is changed to either "rem", "vw" or "%".</li>
					<li>Setting the viewport with use of the following meta tag: &lt;meta name="viewport" content="width=device-width, initial-scale=1.0&gt; </li>
					<li>Using a media query to change the size and position of an image at a breakpoint.</li>
				</ol>
				<p><a href="https://mercury.swin.edu.au/cos10011/s101884292/assign1/topic.html">Click here and resize the window!</a></p>
				<p>Resource used: <a href="https://www.w3schools.com/html/html_responsive.asp">https://www.w3schools.com/html/html_responsive.asp</a></p>
			</section>
			
			<section>
				<h2>Enhancement 2</h2>
				<p>The menu of the web app has been made more interactive. This feature is not part of the original assignment specification. Techniques used to achieve this are: </p>
				<ol>
					<li>Changing the colour of the navigation link which the mouse is hovering over. This is done using the "hover" pseudo element.</li>
					<li>Changing the colour of the menu link associated with the current page. </li>
					<li>Making the colour in the quiz dropdown menu alternate colours. This is done using the nth-child() element.</li>
				</ol>
				<p><a href="https://mercury.swin.edu.au/cos10011/s101884292/assign1/quiz.html">Click here to go to the quiz!</a></p>
				<p>Resource used: <a href="https://www.w3schools.com/css/css_pseudo_elements.asp">https://www.w3schools.com/css/css_pseudo_elements.asp</a></p>
			</section>
			<?php require "footer.inc"; ?>
		</body>
	</html>