<?php
/**
 * About Author Section
 *
 * Personal introduction from the site author with development journey story.
 * Professional presentation for developer credibility and personal connection.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

// Section configuration
const ABOUT_SECTION_TITLE    = 'About the Author';
const ABOUT_SECTION_SUBTITLE = 'A developer\'s journey through programming languages and CMS evolution';
const ABOUT_READ_MORE_TEXT   = 'Read Full Story';
const ABOUT_PAGE_SLUG        = 'about-me';

// Author information
const AUTHOR_NAME            = 'Josanu Andrei';
const AUTHOR_TITLE          = 'Full-Stack WordPress Developer';
const AUTHOR_IMAGE_ALT      = 'Josanu Andrei - WordPress Developer and Programming Enthusiast';

// Author story text
$author_story = "I remember my first experiments with HTML and writing my first \"Hello World\" in PHP. In fact, the first programming language I studied was Blaise Pascal, and then Python, about which I had no idea would become so popular.

After some time, I discovered Joomla! CMS (that's how it's written, with the exclamation mark) and I have to admit that I like its core which applies the MVC pattern. However, whether you like it or not, WordPress has gained popularity and during the 2000s, it was considered \"trendy\". A lot of water has passed under the bridge since then and now, as I write this little story, WordPress is a very great CMS, with so many advantages as well as disadvantages that are actually advantages in another way 🙂 Personally, I can't say that I love it, but I respect it because it has an impressive number of users and is a fairly versatile content system that works wonders if you know how to use it correctly.";
?>

<section class="about-author-section section--spacing-bottom" id="about-author" aria-labelledby="about-heading">
	<div class="container">
		<div class="about-author-section__inner">
			
			<!-- Section Header -->
			<header class="about-author-section__header text-center ds-mb-lg">
				<div class="about-author-section__badge">
					<span class="badge bg-info">
						<i class="fas fa-user-circle me-2"></i>Meet the Developer
					</span>
				</div>
				<h2 id="about-heading" class="about-author-section__title text-4xl font-bold ds-mt-md ds-mb-md">
					<?php echo esc_html( ABOUT_SECTION_TITLE ); ?>
				</h2>
				<p class="about-author-section__subtitle text-lg text-muted">
					<?php echo esc_html( ABOUT_SECTION_SUBTITLE ); ?>
				</p>
			</header>

			<!-- Author Content -->
			<div class="about-author-section__content">
				<div class="row align-items-center g-5">
					
					<!-- Author Image -->
					<div class="col-lg-4 col-md-5">
						<div class="about-author-section__image-container">
							<div class="about-author-section__image">
								<!-- Image placeholder - replace with actual author photo -->
								<div class="author-image-placeholder">
									<i class="fas fa-user-tie"></i>
								</div>
								<!-- 
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/author-photo.jpg" 
								     alt="<?php echo esc_attr( AUTHOR_IMAGE_ALT ); ?>"
								     class="author-photo"
								     loading="lazy">
								-->
							</div>
							<div class="about-author-section__image-info text-center ds-mt-md">
								<h3 class="author-name text-xl font-semibold text-primary">
									<?php echo esc_html( AUTHOR_NAME ); ?>
								</h3>
								<p class="author-title text-sm text-muted font-medium">
									<?php echo esc_html( AUTHOR_TITLE ); ?>
								</p>
							</div>
						</div>
					</div>

					<!-- Author Story -->
					<div class="col-lg-8 col-md-7">
						<div class="about-author-section__story">
							<div class="author-story-content">
								<?php 
								// Split the story into paragraphs
								$paragraphs = explode("\n\n", $author_story);
								foreach ($paragraphs as $paragraph) :
									if (trim($paragraph)) :
								?>
									<p class="author-story-paragraph text-base text-secondary ds-mb-md">
										<?php echo esc_html( trim($paragraph) ); ?>
									</p>
								<?php 
									endif;
								endforeach; 
								?>
							</div>

							<!-- Read More Link -->
							<div class="about-author-section__cta ds-mt-lg">
								<a href="<?php echo esc_url( home_url( '/' . ABOUT_PAGE_SLUG . '/' ) ); ?>" 
								   class="about-author-section__read-more btn btn-outline-primary btn-lg">
									<i class="fas fa-book-open me-2"></i>
									<?php echo esc_html( ABOUT_READ_MORE_TEXT ); ?>
								</a>
							</div>
						</div>
					</div>

				</div><!-- /.row -->
			</div><!-- /.about-author-section__content -->

			<!-- Developer Skills/Technologies (Optional visual element) -->
			<div class="about-author-section__skills ds-mt-xl">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="skills-showcase">
							<h3 class="skills-showcase__title text-center text-xl font-semibold ds-mb-lg">
								Technologies & Expertise
							</h3>
							<div class="skills-showcase__list d-flex justify-content-center align-items-center gap-4 flex-wrap">
								<div class="skill-badge">
									<i class="fab fa-php text-primary me-2"></i>
									<span>PHP</span>
								</div>
								<div class="skill-badge">
									<i class="fab fa-wordpress text-primary me-2"></i>
									<span>WordPress</span>
								</div>
								<div class="skill-badge">
									<i class="fab fa-html5 text-primary me-2"></i>
									<span>HTML5</span>
								</div>
								<div class="skill-badge">
									<i class="fab fa-css3-alt text-primary me-2"></i>
									<span>CSS3</span>
								</div>
								<div class="skill-badge">
									<i class="fab fa-js text-primary me-2"></i>
									<span>JavaScript</span>
								</div>
								<div class="skill-badge">
									<i class="fas fa-database text-primary me-2"></i>
									<span>MySQL</span>
								</div>
								<div class="skill-badge">
									<i class="fab fa-git-alt text-primary me-2"></i>
									<span>Git</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- /.about-author-section__inner -->
	</div><!-- /.container -->
</section><!-- /.about-author-section -->