<?php

const SITE_DESCRIPTION_BLOCK_TITLE = 'Advanced WordPress Tutorials and Resources for Leveling Up';
$SITE_DESCRIPTION_LINK = [
	'text' => 'Continue reading...',
	'link' => esc_url( home_url() ) . '/' . 'about-this-site' . '/',
];
const SITE_DESCRIPTION_TEXT = "Although there is plenty of general information about WordPress online, my focus is to dive into advanced discussions around complex projects built on this CMS. 
Specifically, I aim to explore the development and maintenance of large-scale business applications and the unique challenges developers face in this space. 
By gathering insights and answers to these questions, I hope we can simplify and improve our work moving forward.";

const SITE_DESCRIPTION_TEXT_SMALL = "While there is an abundance of general information about WordPress available online, my aim is to delve into more advanced discussions...";

?>
<section id="home-site-presentation-summary" class="hero-section section--spacing-bottom">
    <div class="hero-section__container">
        <div class="hero-section__content">
            <div class="hero-section__text">
                <h2 class="hero-section__title"><?php echo SITE_DESCRIPTION_BLOCK_TITLE ?></h2>
                <p class="hero-section__description"><?php echo SITE_DESCRIPTION_TEXT ?></p>
                <p class="hero-section__description--small d-none"><?php echo SITE_DESCRIPTION_TEXT_SMALL ?></p>
                <div class="hero-section__actions">
                    <a href="<?php echo esc_url( $SITE_DESCRIPTION_LINK['link'] ) ?>" class="hero-section__cta hero-section__cta--primary">
                        <?php echo $SITE_DESCRIPTION_LINK['text'] ?> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="hero-section__visual">
                <div class="hero-section__icon">
                    <svg width="150" height="150" viewBox="0 0 150 150" fill="none" class="hero-section__svg">
                        <circle cx="75" cy="75" r="60" fill="#f8f9fa" stroke="#e2e8f0" stroke-width="2"/>
                        <rect x="45" y="50" width="60" height="40" rx="6" fill="#007cba"/>
                        <rect x="55" y="60" width="40" height="4" rx="2" fill="#ffffff"/>
                        <rect x="55" y="70" width="30" height="4" rx="2" fill="#ffffff"/>
                        <rect x="55" y="80" width="35" height="4" rx="2" fill="#ffffff"/>
                        <circle cx="120" cy="40" r="15" fill="#28a745"/>
                        <path d="M112 40L116 44L128 32" stroke="#ffffff" stroke-width="2" fill="none"/>
                        <rect x="25" y="100" width="100" height="20" rx="10" fill="#ffc107"/>
                        <rect x="35" y="105" width="80" height="10" rx="5" fill="#ffffff"/>
                    </svg>
                </div>
                <div class="hero-section__floating">
                    <div class="hero-section__float-element" data-speed="2">
                        <i class="fab fa-wordpress" aria-hidden="true"></i>
                    </div>
                    <div class="hero-section__float-element" data-speed="3">
                        <i class="fab fa-php" aria-hidden="true"></i>
                    </div>
                    <div class="hero-section__float-element" data-speed="1">
                        <i class="fas fa-code" aria-hidden="true"></i>
                    </div>
                    <div class="hero-section__float-element" data-speed="2.5">
                        <i class="fab fa-react" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>