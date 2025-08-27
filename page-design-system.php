<?php
/**
 * Design System Test Page Template
 *
 * Template Name: Design System Test
 * 
 * Comprehensive showcase of all design tokens, components, and utilities
 * for testing and development purposes.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

get_header();
?>

<main id="primary" class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- Hero Section with Design System -->
		<section class="hero-section section--spacing-bottom">
			<div class="container">
				<div class="hero-section__content">
					<div class="hero-section__text">
						<h1 class="hero-section__title">Design System Test Page</h1>
						<p class="hero-section__description">
							Complete showcase of WPForPro design tokens, components, and utilities
						</p>
						<div class="hero-section__actions">
							<a href="#colors" class="hero-section__cta hero-section__cta--primary">
								<i class="fas fa-palette"></i> View Colors
							</a>
							<a href="#components" class="hero-section__cta hero-section__cta--secondary">
								<i class="fas fa-cubes"></i> Components
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Typography Section -->
		<section class="typography-test section--spacing-bottom" id="typography">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Typography Scale</h2>
				
				<div class="row">
					<div class="col-md-8">
						<h1 class="text-5xl font-bold">Heading 1 - 5xl Bold</h1>
						<h2 class="text-4xl font-semibold">Heading 2 - 4xl Semibold</h2>
						<h3 class="text-3xl font-semibold">Heading 3 - 3xl Semibold</h3>
						<h4 class="text-2xl font-medium">Heading 4 - 2xl Medium</h4>
						<h5 class="text-xl font-medium">Heading 5 - xl Medium</h5>
						<h6 class="text-lg font-medium">Heading 6 - lg Medium</h6>
						
						<p class="text-base font-normal ds-mt-lg">
							This is regular body text using text-base with normal weight. 
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						
						<p class="text-sm text-muted">
							This is small text with muted color for captions and metadata.
						</p>
						
						<p class="text-xs text-secondary">
							This is extra small text for fine print and labels.
						</p>
					</div>
					
					<div class="col-md-4">
						<div class="bg-secondary ds-p-card rounded-card">
							<h4 class="ds-mb-md">Font Weights</h4>
							<p class="font-light">Light (300)</p>
							<p class="font-normal">Normal (400)</p>
							<p class="font-medium">Medium (500)</p>
							<p class="font-semibold">Semibold (600)</p>
							<p class="font-bold">Bold (700)</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Color System -->
		<section class="colors-test section--spacing-bottom" id="colors">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Color System</h2>
				
				<div class="row ds-mb-lg">
					<div class="col-md-12">
						<h3 class="text-2xl font-semibold ds-mb-md">Primary Colors</h3>
						<div class="row">
							<div class="col-md-4 ds-mb-md">
								<div class="bg-primary text-white ds-p-card rounded-card text-center">
									<strong>Primary</strong><br>
									<small>#667eea</small>
								</div>
							</div>
							<div class="col-md-4 ds-mb-md">
								<div class="bg-secondary ds-p-card rounded-card text-center">
									<strong>Secondary</strong><br>
									<small>#f8f9fa</small>
								</div>
							</div>
							<div class="col-md-4 ds-mb-md">
								<div class="bg-muted ds-p-card rounded-card text-center">
									<strong>Muted</strong><br>
									<small>#e9ecef</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h3 class="text-2xl font-semibold ds-mb-md">Text Colors</h3>
						<div class="row">
							<div class="col-md-3">
								<p class="text-primary ds-p-sm">Primary Text</p>
								<p class="text-secondary ds-p-sm">Secondary Text</p>
								<p class="text-muted ds-p-sm">Muted Text</p>
								<p class="text-white bg-dark ds-p-sm rounded-base">White Text</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Button System -->
		<section class="buttons-test section--spacing-bottom" id="buttons">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Button System</h2>
				
				<div class="row">
					<div class="col-md-6">
						<h3 class="text-2xl font-semibold ds-mb-md">Primary Buttons</h3>
						<div class="d-flex flex-wrap gap-3 ds-mb-lg">
							<button class="btn btn-primary">Primary Button</button>
							<button class="btn btn-primary btn-lg">Large Primary</button>
							<button class="btn btn-primary btn-sm">Small Primary</button>
						</div>
						
						<h3 class="text-2xl font-semibold ds-mb-md">Secondary Buttons</h3>
						<div class="d-flex flex-wrap gap-3 ds-mb-lg">
							<button class="btn btn-outline-primary">Outline Button</button>
							<button class="btn btn-secondary">Secondary Button</button>
							<button class="btn btn-light">Light Button</button>
						</div>

						<h3 class="text-2xl font-semibold ds-mb-md">Button States</h3>
						<div class="d-flex flex-wrap gap-3">
							<button class="btn btn-primary">Normal</button>
							<button class="btn btn-primary" disabled>Disabled</button>
							<button class="btn btn-primary active">Active</button>
						</div>
					</div>
					
					<div class="col-md-6">
						<h3 class="text-2xl font-semibold ds-mb-md">Link Buttons</h3>
						<div class="d-flex flex-column gap-3">
							<a href="#" class="hero-section__cta hero-section__cta--primary">
								<i class="fas fa-download"></i> Hero Primary CTA
							</a>
							<a href="#" class="hero-section__cta hero-section__cta--secondary">
								<i class="fas fa-info-circle"></i> Hero Secondary CTA
							</a>
							<a href="#" class="posts-section__more-link">
								Text Link with Arrow <i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Card System -->
		<section class="cards-test section--spacing-bottom" id="cards">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Card System</h2>
				
				<div class="row">
					<div class="col-md-4 ds-mb-card">
						<div class="bg-primary text-white ds-p-card rounded-card shadow-card">
							<h3 class="text-xl font-semibold ds-mb-md">Primary Card</h3>
							<p class="ds-mb-md">This is a primary colored card with white text and card shadow.</p>
							<a href="#" class="btn btn-light btn-sm">Action</a>
						</div>
					</div>
					
					<div class="col-md-4 ds-mb-card">
						<div class="bg-secondary ds-p-card rounded-card shadow-card">
							<h3 class="text-xl font-semibold ds-mb-md">Secondary Card</h3>
							<p class="ds-mb-md">This is a secondary colored card with default text color.</p>
							<a href="#" class="btn btn-primary btn-sm">Action</a>
						</div>
					</div>
					
					<div class="col-md-4 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-card-hover border">
							<h3 class="text-xl font-semibold ds-mb-md">Hover Card</h3>
							<p class="ds-mb-md">This card has hover shadow effect. Try hovering over it!</p>
							<a href="#" class="btn btn-outline-primary btn-sm">Action</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="bg-white ds-p-card rounded-card shadow-base border">
							<div class="article-meta ds-mb-md">
								<span class="category">Design System</span>
								<span class="date">Dec 13, 2024</span>
							</div>
							<h3 class="text-xl font-semibold ds-mb-sm">Article Meta Example</h3>
							<p class="text-muted">This card demonstrates the article-meta component with category badges and date formatting.</p>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="bg-muted ds-p-card rounded-lg">
							<h4 class="font-semibold ds-mb-sm">Border Radius Examples</h4>
							<div class="d-flex gap-2 flex-wrap">
								<span class="bg-primary text-white px-2 py-1 rounded-sm">Small</span>
								<span class="bg-primary text-white px-2 py-1 rounded-base">Base</span>
								<span class="bg-primary text-white px-2 py-1 rounded-md">Medium</span>
								<span class="bg-primary text-white px-2 py-1 rounded-lg">Large</span>
								<span class="bg-primary text-white px-2 py-1 rounded-full">Full</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Spacing System -->
		<section class="spacing-test section--spacing-bottom" id="spacing">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Spacing System</h2>
				
				<div class="row">
					<div class="col-md-6">
						<h3 class="text-2xl font-semibold ds-mb-md">BEM Section Spacing</h3>
						<div class="bg-secondary ds-p-md rounded-base">
							<p class="ds-mb-sm"><strong>Current Section:</strong> <code>.section--spacing-bottom</code></p>
							<p class="text-sm text-muted ds-mb-none">
								Desktop: 5rem (80px) bottom margin<br>
								Mobile: 2rem (32px) bottom margin
							</p>
						</div>
						
						<h4 class="text-lg font-medium ds-mt-lg ds-mb-md">Available BEM Modifiers:</h4>
						<ul class="list-unstyled">
							<li class="ds-mb-xs"><code>.section--spacing-bottom</code> - Bottom margin</li>
							<li class="ds-mb-xs"><code>.section--spacing-top</code> - Top margin</li>
							<li class="ds-mb-xs"><code>.section--spacing-vertical</code> - Top & bottom margins</li>
							<li class="ds-mb-xs"><code>.section--spacing-bottom-sm</code> - Small bottom margin (2rem)</li>
							<li class="ds-mb-xs"><code>.section--spacing-bottom-lg</code> - Large bottom margin (5rem)</li>
						</ul>
					</div>
					
					<div class="col-md-6">
						<h3 class="text-2xl font-semibold ds-mb-md">Design System Utilities</h3>
						
						<h4 class="text-lg font-medium ds-mb-sm">Margin Examples:</h4>
						<div class="bg-light p-2 ds-mb-md">
							<div class="bg-primary text-white text-center py-2 ds-m-xs">ds-m-xs</div>
						</div>
						<div class="bg-light p-2 ds-mb-md">
							<div class="bg-primary text-white text-center py-2 ds-m-sm">ds-m-sm</div>
						</div>
						<div class="bg-light p-2 ds-mb-md">
							<div class="bg-primary text-white text-center py-2 ds-m-md">ds-m-md</div>
						</div>
						
						<h4 class="text-lg font-medium ds-mb-sm">Padding Examples:</h4>
						<div class="bg-primary text-white ds-p-xs ds-mb-xs">ds-p-xs</div>
						<div class="bg-primary text-white ds-p-sm ds-mb-xs">ds-p-sm</div>
						<div class="bg-primary text-white ds-p-md ds-mb-xs">ds-p-md</div>
						<div class="bg-primary text-white ds-p-lg">ds-p-lg</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Shadow System -->
		<section class="shadows-test section--spacing-bottom" id="shadows">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Shadow System</h2>
				
				<div class="row">
					<div class="col-md-3 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-sm text-center">
							<h4 class="font-semibold">Small Shadow</h4>
							<p class="text-sm text-muted ds-mb-none">.shadow-sm</p>
						</div>
					</div>
					
					<div class="col-md-3 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-base text-center">
							<h4 class="font-semibold">Base Shadow</h4>
							<p class="text-sm text-muted ds-mb-none">.shadow-base</p>
						</div>
					</div>
					
					<div class="col-md-3 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-md text-center">
							<h4 class="font-semibold">Medium Shadow</h4>
							<p class="text-sm text-muted ds-mb-none">.shadow-md</p>
						</div>
					</div>
					
					<div class="col-md-3 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-lg text-center">
							<h4 class="font-semibold">Large Shadow</h4>
							<p class="text-sm text-muted ds-mb-none">.shadow-lg</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-card text-center">
							<h4 class="font-semibold">Card Shadow</h4>
							<p class="text-sm text-muted ds-mb-none">.shadow-card (default for cards)</p>
						</div>
					</div>
					
					<div class="col-md-6 ds-mb-card">
						<div class="bg-white ds-p-card rounded-card shadow-card-hover text-center">
							<h4 class="font-semibold">Card Hover Shadow</h4>
							<p class="text-sm text-muted ds-mb-none">.shadow-card-hover (elevated hover state)</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Responsive Grid -->
		<section class="grid-test section--spacing-bottom" id="grid">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Responsive Grid System</h2>
				
				<div class="row ds-mb-lg">
					<div class="col-12"><div class="bg-primary text-white text-center ds-p-sm rounded-base">col-12</div></div>
				</div>
				
				<div class="row ds-mb-lg">
					<div class="col-6"><div class="bg-secondary text-center ds-p-sm rounded-base">col-6</div></div>
					<div class="col-6"><div class="bg-secondary text-center ds-p-sm rounded-base">col-6</div></div>
				</div>
				
				<div class="row ds-mb-lg">
					<div class="col-4"><div class="bg-muted text-center ds-p-sm rounded-base">col-4</div></div>
					<div class="col-4"><div class="bg-muted text-center ds-p-sm rounded-base">col-4</div></div>
					<div class="col-4"><div class="bg-muted text-center ds-p-sm rounded-base">col-4</div></div>
				</div>
				
				<div class="row">
					<div class="col-md-8"><div class="bg-primary text-white text-center ds-p-sm rounded-base">col-md-8</div></div>
					<div class="col-md-4"><div class="bg-secondary text-center ds-p-sm rounded-base">col-md-4</div></div>
				</div>
			</div>
		</section>

		<!-- Component Examples -->
		<section class="components-test section--spacing-bottom" id="components">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Component Examples</h2>
				
				<!-- Navigation Breadcrumb -->
				<nav aria-label="breadcrumb" class="ds-mb-lg">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Design System</a></li>
						<li class="breadcrumb-item active" aria-current="page">Test Page</li>
					</ol>
				</nav>

				<!-- Alert Examples -->
				<div class="row ds-mb-lg">
					<div class="col-md-6">
						<div class="alert alert-primary" role="alert">
							<i class="fas fa-info-circle me-2"></i>
							<strong>Info Alert:</strong> This is an informational message.
						</div>
					</div>
					<div class="col-md-6">
						<div class="alert alert-success" role="alert">
							<i class="fas fa-check-circle me-2"></i>
							<strong>Success Alert:</strong> Action completed successfully!
						</div>
					</div>
				</div>

				<div class="row ds-mb-lg">
					<div class="col-md-6">
						<div class="alert alert-warning" role="alert">
							<i class="fas fa-exclamation-triangle me-2"></i>
							<strong>Warning Alert:</strong> Please check your input.
						</div>
					</div>
					<div class="col-md-6">
						<div class="alert alert-danger" role="alert">
							<i class="fas fa-times-circle me-2"></i>
							<strong>Error Alert:</strong> Something went wrong.
						</div>
					</div>
				</div>

				<!-- Form Examples -->
				<div class="row">
					<div class="col-md-8">
						<h3 class="text-2xl font-semibold ds-mb-md">Form Components</h3>
						<form class="bg-secondary ds-p-card rounded-card">
							<div class="mb-3">
								<label for="testInput" class="form-label font-medium">Input Field</label>
								<input type="text" class="form-control" id="testInput" placeholder="Enter text here">
							</div>
							
							<div class="mb-3">
								<label for="testSelect" class="form-label font-medium">Select Dropdown</label>
								<select class="form-select" id="testSelect">
									<option selected>Choose an option</option>
									<option value="1">Option 1</option>
									<option value="2">Option 2</option>
									<option value="3">Option 3</option>
								</select>
							</div>
							
							<div class="mb-3">
								<label for="testTextarea" class="form-label font-medium">Textarea</label>
								<textarea class="form-control" id="testTextarea" rows="3" placeholder="Enter your message"></textarea>
							</div>
							
							<div class="mb-3 form-check">
								<input class="form-check-input" type="checkbox" id="testCheck">
								<label class="form-check-label" for="testCheck">
									I agree to the terms and conditions
								</label>
							</div>
							
							<button type="submit" class="btn btn-primary">Submit Form</button>
						</form>
					</div>
					
					<div class="col-md-4">
						<h3 class="text-2xl font-semibold ds-mb-md">Badge Examples</h3>
						<div class="d-flex flex-column gap-2">
							<span class="badge bg-primary">Primary Badge</span>
							<span class="badge bg-secondary">Secondary Badge</span>
							<span class="badge bg-success">Success Badge</span>
							<span class="badge bg-warning text-dark">Warning Badge</span>
							<span class="badge bg-danger">Danger Badge</span>
							<span class="badge bg-info text-dark">Info Badge</span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Utility Classes Reference -->
		<section class="utilities-reference">
			<div class="container">
				<h2 class="text-4xl font-bold ds-mb-lg">Quick Reference</h2>
				
				<div class="row">
					<div class="col-md-6">
						<div class="bg-secondary ds-p-card rounded-card">
							<h3 class="text-xl font-semibold ds-mb-md">Most Used Classes</h3>
							<ul class="list-unstyled text-sm">
								<li class="ds-mb-xs"><code>.section--spacing-bottom</code> - Section spacing</li>
								<li class="ds-mb-xs"><code>.ds-p-card</code> - Card padding</li>
								<li class="ds-mb-xs"><code>.ds-mb-lg</code> - Large bottom margin</li>
								<li class="ds-mb-xs"><code>.rounded-card</code> - Card border radius</li>
								<li class="ds-mb-xs"><code>.shadow-card</code> - Card shadow</li>
								<li class="ds-mb-xs"><code>.text-primary</code> - Primary text color</li>
								<li class="ds-mb-xs"><code>.bg-secondary</code> - Secondary background</li>
								<li class="ds-mb-xs"><code>.font-semibold</code> - Semibold weight</li>
							</ul>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="bg-muted ds-p-card rounded-card">
							<h3 class="text-xl font-semibold ds-mb-md">Breakpoints</h3>
							<ul class="list-unstyled text-sm">
								<li class="ds-mb-xs"><strong>xs:</strong> 0px and up</li>
								<li class="ds-mb-xs"><strong>sm:</strong> 576px and up</li>
								<li class="ds-mb-xs"><strong>md:</strong> 768px and up</li>
								<li class="ds-mb-xs"><strong>lg:</strong> 992px and up</li>
								<li class="ds-mb-xs"><strong>xl:</strong> 1200px and up</li>
								<li class="ds-mb-xs"><strong>xxl:</strong> 1400px and up</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

	</article>
</main>

<?php
get_footer();
?>