# SASS 7-1 Architecture Migration Plan

> **Complete Guide for Migrating WPForPro Theme to True 7-1 SASS Architecture**

## 🎯 Overview

The wpforpro theme currently uses a **modified 7-1 architecture** with several missing directories and organizational inconsistencies. This migration plan will establish a **complete, maintainable 7-1 SASS architecture** that follows industry best practices.

## 📊 Current State Analysis

### ✅ Existing Structure
```
src/sass/
├── abstracts/          # ✅ Properly implemented
├── base/              # ✅ Exists but needs expansion  
├── components/        # ✅ Good foundation
├── layouts/           # ✅ Basic implementation
└── plugins/           # ✅ Plugin-specific styles
```

### ❌ Missing Directories
- `vendors/` - Third-party CSS (Bootstrap, normalize, etc.)
- `pages/` - Page-specific styles
- `themes/` - Theme variations (light/dark mode)
- `utilities/` - Helper classes and utilities

## 🏗️ Target 7-1 Architecture

### Complete Directory Structure
```scss
src/sass/
├── abstracts/          # Configuration & helpers
│   ├── _variables.scss
│   ├── _functions.scss
│   ├── _mixins.scss
│   └── _placeholders.scss
├── vendors/            # Third-party CSS
│   ├── _bootstrap.scss
│   ├── _normalize.scss
│   └── _prism.scss
├── base/               # Base & default styles
│   ├── _reset.scss
│   ├── _typography.scss
│   ├── _helpers.scss
│   └── _base.scss
├── layout/             # Layout-related styles
│   ├── _header.scss
│   ├── _footer.scss
│   ├── _sidebar.scss
│   ├── _grid.scss
│   └── _navigation.scss
├── components/         # Reusable components
│   ├── _buttons.scss
│   ├── _cards.scss
│   ├── _forms.scss
│   ├── _modals.scss
│   ├── _tables.scss
│   ├── _navigation.scss
│   └── _pagination.scss
├── pages/              # Page-specific styles
│   ├── _home.scss
│   ├── _single.scss
│   ├── _archive.scss
│   ├── _search.scss
│   └── _404.scss
├── themes/             # Theme variations
│   ├── _default.scss
│   ├── _dark.scss
│   └── _high-contrast.scss
├── utilities/          # Utilities & helpers
│   ├── _utilities.scss
│   ├── _animations.scss
│   └── _shame.scss
└── style.scss          # Main stylesheet
```

---

## 🚀 Migration Plan: Phase by Phase

## Phase 1: Foundation Setup (Week 1)

### 1.1 Create Missing Directory Structure

```bash
# Create missing directories
mkdir -p src/sass/vendors
mkdir -p src/sass/pages  
mkdir -p src/sass/themes
mkdir -p src/sass/utilities

# Create placeholder files
touch src/sass/vendors/_bootstrap.scss
touch src/sass/vendors/_normalize.scss
touch src/sass/pages/_home.scss
touch src/sass/pages/_single.scss
touch src/sass/pages/_archive.scss
touch src/sass/pages/_search.scss
touch src/sass/pages/_404.scss
touch src/sass/themes/_default.scss
touch src/sass/themes/_dark.scss
touch src/sass/utilities/_utilities.scss
touch src/sass/utilities/_animations.scss
touch src/sass/utilities/_shame.scss
```

### 1.2 Enhanced Variables System

**Current**: Basic variable definitions
**Target**: Comprehensive design token system

```scss
// src/sass/abstracts/_variables.scss
// ==============================================
// DESIGN TOKENS - WPFORPRO THEME
// ==============================================

// Brand Colors
$color-primary: #007cba;
$color-secondary: #50575e;
$color-accent: #00a0d2;

// Color Palette
$white: #fff;
$black: #000;
$gray-100: #f8f9fa;
$gray-200: #e9ecef;
$gray-300: #dee2e6;
$gray-400: #ced4da;
$gray-500: #adb5bd;
$gray-600: #6c757d;
$gray-700: #495057;
$gray-800: #343a40;
$gray-900: #212529;

// Semantic Colors
$color-success: #28a745;
$color-warning: #ffc107;
$color-danger: #dc3545;
$color-info: #17a2b8;

// Typography Scale
$font-family-primary: 'Lato', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
$font-family-secondary: Georgia, 'Times New Roman', serif;
$font-family-mono: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;

// Font Weights
$font-weight-light: 300;
$font-weight-normal: 400;
$font-weight-medium: 500;
$font-weight-semibold: 600;
$font-weight-bold: 700;

// Font Sizes (Mobile First)
$font-size-xs: 0.75rem;    // 12px
$font-size-sm: 0.875rem;   // 14px
$font-size-base: 1rem;     // 16px
$font-size-lg: 1.125rem;   // 18px
$font-size-xl: 1.25rem;    // 20px
$font-size-2xl: 1.5rem;    // 24px
$font-size-3xl: 1.875rem;  // 30px
$font-size-4xl: 2.25rem;   // 36px
$font-size-5xl: 3rem;      // 48px

// Line Heights
$line-height-tight: 1.25;
$line-height-snug: 1.375;
$line-height-normal: 1.5;
$line-height-relaxed: 1.625;
$line-height-loose: 2;

// Spacing Scale (8px grid system)
$spacing-0: 0;
$spacing-1: 0.25rem;  // 4px
$spacing-2: 0.5rem;   // 8px
$spacing-3: 0.75rem;  // 12px
$spacing-4: 1rem;     // 16px
$spacing-5: 1.25rem;  // 20px
$spacing-6: 1.5rem;   // 24px
$spacing-8: 2rem;     // 32px
$spacing-10: 2.5rem;  // 40px
$spacing-12: 3rem;    // 48px
$spacing-16: 4rem;    // 64px
$spacing-20: 5rem;    // 80px

// Breakpoints
$breakpoints: (
  xs: 0,
  sm: 576px,
  md: 768px,
  lg: 992px,
  xl: 1200px,
  xxl: 1400px
);

// Z-Index Scale  
$z-index-dropdown: 1000;
$z-index-sticky: 1020;
$z-index-fixed: 1030;
$z-index-modal-backdrop: 1040;
$z-index-modal: 1050;
$z-index-popover: 1060;
$z-index-tooltip: 1070;

// Border Radius
$border-radius-sm: 0.125rem;
$border-radius: 0.25rem;
$border-radius-lg: 0.5rem;
$border-radius-xl: 1rem;
$border-radius-full: 9999px;

// Shadows
$shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
$shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
$shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
$shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
$shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

// Animation/Transition
$transition-fast: 150ms ease-in-out;
$transition-base: 250ms ease-in-out;
$transition-slow: 350ms ease-in-out;

// Container Widths
$container-max-widths: (
  sm: 540px,
  md: 720px,
  lg: 960px,
  xl: 1140px,
  xxl: 1320px
);
```

### 1.3 Enhanced Mixins Library

```scss
// src/sass/abstracts/_mixins.scss
// ==============================================
// MIXINS LIBRARY - WPFORPRO THEME
// ==============================================

// Responsive Breakpoints
@mixin respond-to($breakpoint) {
  @if map-has-key($breakpoints, $breakpoint) {
    @media (min-width: map-get($breakpoints, $breakpoint)) {
      @content;
    }
  } @else {
    @warn "Unfortunately, no value could be retrieved from `#{$breakpoint}`. "
        + "Please make sure it is defined in `$breakpoints` map.";
  }
}

// Typography Mixins
@mixin font-size($size, $line-height: null) {
  font-size: $size;
  @if $line-height {
    line-height: $line-height;
  }
}

@mixin heading($level) {
  @if $level == 1 {
    @include font-size($font-size-4xl, $line-height-tight);
    font-weight: $font-weight-bold;
  } @else if $level == 2 {
    @include font-size($font-size-3xl, $line-height-tight);
    font-weight: $font-weight-semibold;
  } @else if $level == 3 {
    @include font-size($font-size-2xl, $line-height-snug);
    font-weight: $font-weight-semibold;
  } @else if $level == 4 {
    @include font-size($font-size-xl, $line-height-snug);
    font-weight: $font-weight-medium;
  } @else if $level == 5 {
    @include font-size($font-size-lg, $line-height-normal);
    font-weight: $font-weight-medium;
  } @else if $level == 6 {
    @include font-size($font-size-base, $line-height-normal);
    font-weight: $font-weight-medium;
  }
}

// Layout Mixins
@mixin container($max-width: 1200px) {
  width: 100%;
  max-width: $max-width;
  margin-left: auto;
  margin-right: auto;
  padding-left: $spacing-4;
  padding-right: $spacing-4;
  
  @include respond-to(sm) {
    padding-left: $spacing-6;
    padding-right: $spacing-6;
  }
}

@mixin flex-center {
  display: flex;
  align-items: center;
  justify-content: center;
}

@mixin flex-between {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

// Button Mixins
@mixin button-base {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-family: inherit;
  font-weight: $font-weight-medium;
  text-align: center;
  text-decoration: none;
  border: 1px solid transparent;
  cursor: pointer;
  user-select: none;
  transition: all $transition-base;
  
  &:focus {
    outline: 2px solid $color-primary;
    outline-offset: 2px;
  }
  
  &:disabled {
    opacity: 0.6;
    cursor: not-allowed;
  }
}

@mixin button-size($padding-y, $padding-x, $font-size, $border-radius) {
  padding: $padding-y $padding-x;
  font-size: $font-size;
  border-radius: $border-radius;
}

@mixin button-variant($bg-color, $text-color, $border-color: $bg-color) {
  background-color: $bg-color;
  color: $text-color;
  border-color: $border-color;
  
  &:hover {
    background-color: darken($bg-color, 8%);
    border-color: darken($border-color, 10%);
  }
  
  &:active {
    background-color: darken($bg-color, 12%);
    border-color: darken($border-color, 12%);
  }
}

// Card Mixins
@mixin card-base {
  background-color: $white;
  border: 1px solid $gray-200;
  border-radius: $border-radius-lg;
  box-shadow: $shadow-sm;
  overflow: hidden;
}

// Animation Mixins
@mixin fade-in($duration: $transition-base) {
  opacity: 0;
  animation: fadeIn $duration ease-in-out forwards;
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

@mixin slide-up($duration: $transition-base) {
  transform: translateY(1rem);
  opacity: 0;
  animation: slideUp $duration ease-out forwards;
}

@keyframes slideUp {
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

// Utility Mixins
@mixin visually-hidden {
  position: absolute !important;
  width: 1px !important;
  height: 1px !important;
  padding: 0 !important;
  margin: -1px !important;
  overflow: hidden !important;
  clip: rect(0, 0, 0, 0) !important;
  white-space: nowrap !important;
  border: 0 !important;
}

@mixin clearfix {
  &::after {
    content: "";
    display: table;
    clear: both;
  }
}

@mixin aspect-ratio($width, $height) {
  position: relative;
  overflow: hidden;
  
  &::before {
    content: "";
    display: block;
    width: 100%;
    padding-top: calc(#{$height} / #{$width} * 100%);
  }
  
  > * {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}
```

---

## Phase 2: Vendor Integration (Week 1-2)

### 2.1 Bootstrap Integration Strategy

```scss
// src/sass/vendors/_bootstrap.scss
// ==============================================
// BOOTSTRAP 5 CUSTOM BUILD
// ==============================================

// Override Bootstrap variables with our design tokens
$primary: $color-primary;
$secondary: $color-secondary;
$success: $color-success;
$warning: $color-warning;
$danger: $color-danger;
$info: $color-info;

// Typography overrides
$font-family-sans-serif: $font-family-primary;
$font-size-base: $font-size-base;
$line-height-base: $line-height-normal;

// Spacing overrides
$spacer: 1rem; // 16px base
$spacers: (
  0: 0,
  1: $spacing-1,
  2: $spacing-2,
  3: $spacing-3,
  4: $spacing-4,
  5: $spacing-5,
  6: $spacing-6
);

// Border radius overrides
$border-radius: $border-radius;
$border-radius-sm: $border-radius-sm;
$border-radius-lg: $border-radius-lg;

// Import Bootstrap functions and variables first
@import "bootstrap/scss/functions";
@import "bootstrap/scss/variables";
@import "bootstrap/scss/mixins";

// Import only needed Bootstrap components
@import "bootstrap/scss/root";
@import "bootstrap/scss/reboot";
@import "bootstrap/scss/type";
@import "bootstrap/scss/images";
@import "bootstrap/scss/containers";
@import "bootstrap/scss/grid";
@import "bootstrap/scss/tables";
@import "bootstrap/scss/forms";
@import "bootstrap/scss/buttons";
@import "bootstrap/scss/transitions";
@import "bootstrap/scss/dropdown";
@import "bootstrap/scss/button-group";
@import "bootstrap/scss/nav";
@import "bootstrap/scss/navbar";
@import "bootstrap/scss/card";
@import "bootstrap/scss/pagination";
@import "bootstrap/scss/badge";
@import "bootstrap/scss/alert";
@import "bootstrap/scss/close";
@import "bootstrap/scss/modal";
@import "bootstrap/scss/utilities";

// Skip unused components to reduce bundle size:
// - Accordion
// - Breadcrumb  
// - Carousel
// - Collapse
// - Offcanvas
// - Popover
// - Progress
// - Scrollspy
// - Spinners
// - Toast
// - Tooltip
```

### 2.2 Normalize.css Integration

```scss
// src/sass/vendors/_normalize.scss
// ==============================================
// NORMALIZE.CSS v8.0.1 CUSTOM BUILD
// ==============================================

/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

/* Document
   ========================================================================== */

/**
 * 1. Correct the line height in all browsers.
 * 2. Prevent adjustments of font size after orientation changes in iOS.
 */

html {
  line-height: 1.15; /* 1 */
  -webkit-text-size-adjust: 100%; /* 2 */
}

/* Sections
   ========================================================================== */

/**
 * Remove the margin in all browsers.
 */

body {
  margin: 0;
}

// ... Continue with normalize.css rules
// Focus on the most critical normalizations for WordPress themes
```

---

## Phase 3: Component Architecture (Week 2-3)

### 3.1 Component Library Structure

```scss
// src/sass/components/_buttons.scss
// ==============================================
// BUTTON COMPONENTS
// ==============================================

.btn {
  @include button-base;
  
  // Size variants
  &--sm {
    @include button-size($spacing-2, $spacing-3, $font-size-sm, $border-radius-sm);
  }
  
  &--md {
    @include button-size($spacing-3, $spacing-4, $font-size-base, $border-radius);
  }
  
  &--lg {
    @include button-size($spacing-4, $spacing-6, $font-size-lg, $border-radius-lg);
  }
  
  // Color variants
  &--primary {
    @include button-variant($color-primary, $white);
  }
  
  &--secondary {
    @include button-variant($color-secondary, $white);
  }
  
  &--outline {
    @include button-variant(transparent, $color-primary, $color-primary);
    
    &:hover {
      background-color: $color-primary;
      color: $white;
    }
  }
  
  &--ghost {
    @include button-variant(transparent, $color-primary, transparent);
    
    &:hover {
      background-color: rgba($color-primary, 0.1);
    }
  }
}
```

```scss
// src/sass/components/_cards.scss
// ==============================================
// CARD COMPONENTS
// ==============================================

.card {
  @include card-base;
  
  &__header {
    padding: $spacing-4 $spacing-4 0;
    border-bottom: 1px solid $gray-200;
    margin-bottom: $spacing-4;
  }
  
  &__body {
    padding: $spacing-4;
  }
  
  &__footer {
    padding: 0 $spacing-4 $spacing-4;
    margin-top: auto;
  }
  
  &__image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    
    &--aspect-16-9 {
      @include aspect-ratio(16, 9);
    }
    
    &--aspect-4-3 {
      @include aspect-ratio(4, 3);
    }
  }
  
  &__title {
    @include heading(3);
    margin-bottom: $spacing-2;
    
    a {
      color: inherit;
      text-decoration: none;
      
      &:hover {
        color: $color-primary;
      }
    }
  }
  
  &__excerpt {
    color: $gray-600;
    margin-bottom: $spacing-4;
  }
  
  &__meta {
    font-size: $font-size-sm;
    color: $gray-500;
    
    &-item {
      display: inline-flex;
      align-items: center;
      margin-right: $spacing-4;
      
      &:last-child {
        margin-right: 0;
      }
    }
  }
  
  // Card variations
  &--horizontal {
    @include respond-to(md) {
      display: flex;
      
      .card__image {
        width: 40%;
        height: auto;
      }
      
      .card__content {
        width: 60%;
        display: flex;
        flex-direction: column;
      }
    }
  }
  
  &--featured {
    border: 2px solid $color-primary;
    position: relative;
    
    &::before {
      content: "Featured";
      position: absolute;
      top: $spacing-2;
      right: $spacing-2;
      background-color: $color-primary;
      color: $white;
      padding: $spacing-1 $spacing-2;
      font-size: $font-size-xs;
      font-weight: $font-weight-semibold;
      border-radius: $border-radius-sm;
      text-transform: uppercase;
    }
  }
}

// WordPress-specific card components
.post-card {
  @extend .card;
  
  &__categories {
    margin-bottom: $spacing-2;
    
    a {
      display: inline-block;
      background-color: $gray-100;
      color: $gray-700;
      padding: $spacing-1 $spacing-2;
      font-size: $font-size-xs;
      border-radius: $border-radius-sm;
      text-decoration: none;
      margin-right: $spacing-1;
      
      &:hover {
        background-color: $color-primary;
        color: $white;
      }
    }
  }
}
```

### 3.2 Layout Components

```scss
// src/sass/layout/_header.scss
// ==============================================
// HEADER LAYOUT
// ==============================================

.site-header {
  background-color: $white;
  border-bottom: 1px solid $gray-200;
  position: sticky;
  top: 0;
  z-index: $z-index-sticky;
  
  &__container {
    @include container;
    @include flex-between;
    padding-top: $spacing-4;
    padding-bottom: $spacing-4;
  }
  
  &__logo {
    font-size: $font-size-2xl;
    font-weight: $font-weight-bold;
    color: $color-primary;
    text-decoration: none;
    
    &:hover {
      color: darken($color-primary, 10%);
    }
  }
  
  &__navigation {
    display: none;
    
    @include respond-to(lg) {
      display: block;
    }
  }
  
  &__mobile-toggle {
    display: block;
    background: none;
    border: none;
    font-size: $font-size-lg;
    cursor: pointer;
    
    @include respond-to(lg) {
      display: none;
    }
  }
}
```

---

## Phase 4: Page-Specific Styles (Week 3-4)

### 4.1 Homepage Styles

```scss
// src/sass/pages/_home.scss
// ==============================================
// HOMEPAGE STYLES
// ==============================================

.home {
  // Hero section
  &__hero {
    background: linear-gradient(135deg, $color-primary, darken($color-primary, 20%));
    color: $white;
    padding: $spacing-16 0;
    text-align: center;
    
    &-title {
      @include heading(1);
      margin-bottom: $spacing-4;
      
      @include respond-to(lg) {
        font-size: $font-size-5xl;
      }
    }
    
    &-subtitle {
      @include font-size($font-size-lg, $line-height-relaxed);
      margin-bottom: $spacing-8;
      opacity: 0.9;
    }
    
    &-cta {
      @extend .btn;
      @extend .btn--lg;
      background-color: $white;
      color: $color-primary;
      
      &:hover {
        background-color: $gray-100;
      }
    }
  }
  
  // Featured posts section
  &__featured {
    padding: $spacing-16 0;
    
    &-title {
      @include heading(2);
      text-align: center;
      margin-bottom: $spacing-8;
    }
    
    &-grid {
      display: grid;
      gap: $spacing-6;
      
      @include respond-to(md) {
        grid-template-columns: repeat(2, 1fr);
      }
      
      @include respond-to(lg) {
        grid-template-columns: repeat(3, 1fr);
      }
    }
  }
  
  // Newsletter signup
  &__newsletter {
    background-color: $gray-50;
    padding: $spacing-12 0;
    text-align: center;
    
    &-title {
      @include heading(3);
      margin-bottom: $spacing-4;
    }
    
    &-form {
      max-width: 400px;
      margin: 0 auto;
      display: flex;
      gap: $spacing-2;
      
      input {
        flex: 1;
        padding: $spacing-3;
        border: 1px solid $gray-300;
        border-radius: $border-radius;
      }
      
      button {
        @extend .btn;
        @extend .btn--primary;
      }
    }
  }
}
```

### 4.2 Single Post Styles

```scss
// src/sass/pages/_single.scss
// ==============================================
// SINGLE POST STYLES
// ==============================================

.single-post {
  &__header {
    padding: $spacing-8 0;
    text-align: center;
    
    &-meta {
      font-size: $font-size-sm;
      color: $gray-600;
      margin-bottom: $spacing-4;
      
      &-item {
        display: inline-block;
        margin-right: $spacing-4;
        
        &::after {
          content: "•";
          margin-left: $spacing-4;
          color: $gray-400;
        }
        
        &:last-child::after {
          display: none;
        }
      }
    }
    
    &-title {
      @include heading(1);
      margin-bottom: $spacing-4;
    }
    
    &-excerpt {
      @include font-size($font-size-lg, $line-height-relaxed);
      color: $gray-600;
      max-width: 600px;
      margin: 0 auto;
    }
  }
  
  &__content {
    max-width: 750px;
    margin: 0 auto;
    padding: $spacing-8 0;
    
    // Typography styles for post content
    h1, h2, h3, h4, h5, h6 {
      margin-top: $spacing-8;
      margin-bottom: $spacing-4;
      
      &:first-child {
        margin-top: 0;
      }
    }
    
    p {
      margin-bottom: $spacing-4;
      line-height: $line-height-relaxed;
    }
    
    img {
      max-width: 100%;
      height: auto;
      border-radius: $border-radius;
      margin: $spacing-6 0;
    }
    
    blockquote {
      border-left: 4px solid $color-primary;
      padding-left: $spacing-4;
      margin: $spacing-6 0;
      font-style: italic;
      color: $gray-600;
    }
    
    code {
      background-color: $gray-100;
      padding: $spacing-1 $spacing-2;
      border-radius: $border-radius-sm;
      font-family: $font-family-mono;
      font-size: 0.9em;
    }
    
    pre {
      background-color: $gray-900;
      color: $white;
      padding: $spacing-4;
      border-radius: $border-radius;
      overflow-x: auto;
      margin: $spacing-6 0;
      
      code {
        background: none;
        padding: 0;
      }
    }
  }
  
  &__navigation {
    padding: $spacing-8 0;
    border-top: 1px solid $gray-200;
    
    &-links {
      @include flex-between;
      
      &-prev,
      &-next {
        max-width: 45%;
        
        a {
          text-decoration: none;
          color: $color-primary;
          
          &:hover {
            text-decoration: underline;
          }
        }
      }
      
      &-next {
        text-align: right;
      }
    }
  }
}
```

---

## Phase 5: Theme System (Week 4)

### 5.1 Theme Variations Setup

```scss
// src/sass/themes/_default.scss
// ==============================================
// DEFAULT THEME
// ==============================================

:root {
  // Light theme (default)
  --color-bg: #{$white};
  --color-surface: #{$gray-50};
  --color-text: #{$gray-900};
  --color-text-muted: #{$gray-600};
  --color-border: #{$gray-200};
  --color-primary: #{$color-primary};
  --color-secondary: #{$color-secondary};
}
```

```scss
// src/sass/themes/_dark.scss
// ==============================================
// DARK THEME
// ==============================================

[data-theme="dark"] {
  --color-bg: #{$gray-900};
  --color-surface: #{$gray-800};
  --color-text: #{$white};
  --color-text-muted: #{$gray-300};
  --color-border: #{$gray-700};
  --color-primary: #{lighten($color-primary, 10%)};
  --color-secondary: #{lighten($color-secondary, 20%)};
}

// Dark theme specific component overrides
[data-theme="dark"] {
  .card {
    background-color: var(--color-surface);
    border-color: var(--color-border);
    color: var(--color-text);
  }
  
  .site-header {
    background-color: var(--color-surface);
    border-color: var(--color-border);
  }
}
```

### 5.2 Utilities System

```scss
// src/sass/utilities/_utilities.scss
// ==============================================
// UTILITY CLASSES
// ==============================================

// Spacing utilities
@each $name, $value in (
  0: 0,
  1: $spacing-1,
  2: $spacing-2,
  3: $spacing-3,
  4: $spacing-4,
  5: $spacing-5,
  6: $spacing-6,
  8: $spacing-8,
  10: $spacing-10,
  12: $spacing-12,
  16: $spacing-16,
  20: $spacing-20
) {
  .m-#{$name} { margin: $value !important; }
  .mt-#{$name} { margin-top: $value !important; }
  .mr-#{$name} { margin-right: $value !important; }
  .mb-#{$name} { margin-bottom: $value !important; }
  .ml-#{$name} { margin-left: $value !important; }
  .mx-#{$name} { margin-left: $value !important; margin-right: $value !important; }
  .my-#{$name} { margin-top: $value !important; margin-bottom: $value !important; }
  
  .p-#{$name} { padding: $value !important; }
  .pt-#{$name} { padding-top: $value !important; }
  .pr-#{$name} { padding-right: $value !important; }
  .pb-#{$name} { padding-bottom: $value !important; }
  .pl-#{$name} { padding-left: $value !important; }
  .px-#{$name} { padding-left: $value !important; padding-right: $value !important; }
  .py-#{$name} { padding-top: $value !important; padding-bottom: $value !important; }
}

// Display utilities
.d-none { display: none !important; }
.d-block { display: block !important; }
.d-inline { display: inline !important; }
.d-inline-block { display: inline-block !important; }
.d-flex { display: flex !important; }
.d-grid { display: grid !important; }

// Flex utilities
.flex-row { flex-direction: row !important; }
.flex-column { flex-direction: column !important; }
.flex-wrap { flex-wrap: wrap !important; }
.flex-nowrap { flex-wrap: nowrap !important; }
.justify-start { justify-content: flex-start !important; }
.justify-center { justify-content: center !important; }
.justify-end { justify-content: flex-end !important; }
.justify-between { justify-content: space-between !important; }
.items-start { align-items: flex-start !important; }
.items-center { align-items: center !important; }
.items-end { align-items: flex-end !important; }

// Text utilities
.text-left { text-align: left !important; }
.text-center { text-align: center !important; }
.text-right { text-align: right !important; }
.text-primary { color: var(--color-primary) !important; }
.text-secondary { color: var(--color-secondary) !important; }
.text-muted { color: var(--color-text-muted) !important; }

// Font weight utilities
.font-light { font-weight: $font-weight-light !important; }
.font-normal { font-weight: $font-weight-normal !important; }
.font-medium { font-weight: $font-weight-medium !important; }
.font-semibold { font-weight: $font-weight-semibold !important; }
.font-bold { font-weight: $font-weight-bold !important; }

// Responsive utilities
@each $breakpoint in map-keys($breakpoints) {
  @include respond-to($breakpoint) {
    .d-#{$breakpoint}-none { display: none !important; }
    .d-#{$breakpoint}-block { display: block !important; }
    .d-#{$breakpoint}-flex { display: flex !important; }
    
    .text-#{$breakpoint}-left { text-align: left !important; }
    .text-#{$breakpoint}-center { text-align: center !important; }
    .text-#{$breakpoint}-right { text-align: right !important; }
  }
}
```

---

## Phase 6: Main Stylesheet Update (Week 4)

### 6.1 Updated Main Stylesheet

```scss
// src/sass/style.scss
// ==============================================
// WPFORPRO THEME - MAIN STYLESHEET
// 7-1 SASS ARCHITECTURE
// ==============================================

// 1. ABSTRACTS
@import 'abstracts/variables';
@import 'abstracts/functions';
@import 'abstracts/mixins';
@import 'abstracts/placeholders';

// 2. VENDORS
@import 'vendors/normalize';
@import 'vendors/bootstrap';

// 3. BASE
@import 'base/reset';
@import 'base/typography';
@import 'base/helpers';
@import 'base/base';

// 4. LAYOUT
@import 'layout/header';
@import 'layout/footer';
@import 'layout/sidebar';
@import 'layout/grid';
@import 'layout/navigation';

// 5. COMPONENTS
@import 'components/buttons';
@import 'components/cards';
@import 'components/forms';
@import 'components/modals';
@import 'components/tables';
@import 'components/navigation';
@import 'components/pagination';

// 6. PAGES
@import 'pages/home';
@import 'pages/single';
@import 'pages/archive';
@import 'pages/search';
@import 'pages/404';

// 7. THEMES
@import 'themes/default';
@import 'themes/dark';

// 8. UTILITIES
@import 'utilities/utilities';
@import 'utilities/animations';
@import 'utilities/shame';
```

---

## 🚀 Migration Implementation Steps

### Step 1: Backup Current Implementation
```bash
# Create backup of current SASS structure
cp -r src/sass src/sass-backup-$(date +%Y%m%d)
```

### Step 2: Create New Directory Structure
```bash
# Execute the directory creation script from Phase 1.1
```

### Step 3: Migrate Existing Code
1. **Move existing files** to appropriate 7-1 directories
2. **Refactor existing styles** to use new mixins and variables
3. **Update import statements** in all files
4. **Test build process** after each major move

### Step 4: Add New Components
1. **Implement component library** following BEM methodology
2. **Add page-specific styles** for all template types
3. **Create theme system** with CSS custom properties
4. **Build utility classes** for common patterns

### Step 5: Testing & Optimization
1. **Visual regression testing** comparing old vs new styles
2. **Performance testing** of build times and bundle sizes
3. **Cross-browser testing** for compatibility
4. **Documentation updates** for new architecture

---

## 📊 Success Metrics

### Bundle Size Optimization
- **Target CSS Reduction**: 30-40% smaller bundles
- **Bootstrap Optimization**: Only include used components
- **Utility Class Efficiency**: Replace repetitive CSS with utilities

### Developer Experience
- **Build Time**: Maintain or improve current build speeds
- **Code Reusability**: 70%+ component reuse across pages
- **Maintainability**: Standardized naming conventions and structure

### Performance Impact
- **Critical CSS**: Implement above-the-fold CSS extraction
- **Unused CSS**: Eliminate through better organization
- **Cache Efficiency**: Better file organization for browser caching

---

This migration plan provides a comprehensive roadmap to transform the wpforpro theme's SASS architecture into a true 7-1 system that's scalable, maintainable, and optimized for modern WordPress development.