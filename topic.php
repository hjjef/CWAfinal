<!DOCTYPE html>
	<html lang="en">
		<?php require "header.inc"; ?>
		<body>
			<?php require "menu.inc"; ?>
			
			<header>
				<h1>APNG - Animated PNG</h1>
			</header>
			<hr/>
			<h1>Animated Portable Network Graphics</h1>
			<section>
				<h2>History</h2>
				<h3>Creators</h3>
				<p>
					Mozilla employees Stuart Parmenter and Vladimir Vukicevic created APNG in 2004 to store animated elements for websites, extending on the commonly used image format PNG.
					APNG was not approved officially by the PNG development group due to an insistance on using the .png extension rather than .apng.
				</p>
			</section>
			<section>
				<h2>Why was it Created?</h2>
				
				<p>
					APNG was created as an intended replacement for the antiquated GIF format, and as a simpler alternative to the MNG format.
					The below table is a summary of the differences between APNG and GIF.
				</p>
				
				<h3>
					PNG - GIF Comparison
				</h3>
				<img src="images/swirl.png" id="swirl-topic-page" alt="APNG Swirl"/>
				<table>
					<tr>
						<th></th>
						<th>APNG</th>
						<th>GIF</th>
					</tr>
					<tr>
						<th scope="row">Colour Resolution</th>
						<td>24 bits</td>
						<td>8 bits</td>
					</tr>
					<tr>
						<th scope="row">Max Frame Rate</th>
						<td>Unlimited</td>
						<td>10 FPS</td>
					</tr>
					<tr>
						<th scope="row">Compressibility</th>
						<td>Better</td>
						<td>Worse</td>
					</tr>
					<tr>
						<th scope="row">Transparency</th>
						<td>Supports Partial</td>
						<td>Full Only</td>
					</tr>
					<tr>
						<th scope="row">Browser Support</th>
						<td>Less</td>
						<td>More</td>
					</tr>
				</table>
			</section>
			<section>
				<h2>Other Benefits</h2>
				<p>Benefits of APNG over other animation formats:</p>
				<ul>
					<li>Backwards compatibility with PNG. Will display a single frame if the application or browser does not support APNG.</li>
					<li>Smaller library size.</li>
					<li>Smaller file size while maintaining equal quality compared to GIF and WebP.</li>
				</ul>
			</section>
			
			<section>
				<h2>How it Works</h2>
				<aside>
					<p>
						The PNG Specification is a document containing information and standards for the PNG file format.
					</p>
				</aside>
				
				<p>APNG streams use the PNG specification with three extra chunks:</p>
				<ol>
					<li>Animation control chunk (acTL) - This chunk must appear before any PNG chunks for the file to be recognised as APNG.
					This chunk also shows the number of frames and how long to play the animation.</li>
					<li>Frane control chunk (fcTL) - There is one of these chunks for each frame and contains information.
					This chunk contains how long the frame should be displayed.</li>
					<li>Frame data chunk (fdAT) - Similar to regular PNG blocks (IDAT),
					but also containing information about frame sequence in the animation.</li>
				</ol>
			</section>
			<hr/>
			<section class="bottom">
				<h2>Resources</h2>
				<p>
					<a href="https://www.ionos.com/digitalguide/websites/web-design/what-is-apng/">[1] https://www.ionos.com/digitalguide/websites/web-design/what-is-apng</a><br/><br/>
					<a href="https://en.wikipedia.org/wiki/APNG">[2] https://en.wikipedia.org/wiki/APNG</a><br/><br/>
					<a href="https://wiki.mozilla.org/APNG_Specification">[3] https://wiki.mozilla.org/APNG_Specification</a>
				</p>
			</section>
			<?php require "footer.inc"; ?>
		</body>
	</html>
	
