# WPForPro Design System

A comprehensive design system built with SASS design tokens for consistent, maintainable theming.

## 🎨 Design Tokens

### Colors
```scss
// Usage examples
.my-element {
  color: color(text-primary);           // #2d3748
  background: color(bg-secondary);      // #f8f9fa
  border-color: color(border-primary);  // #e2e8f0
}
```

**Available Colors:**
- `primary`, `primary-light`, `primary-dark` - Brand colors
- `text-primary`, `text-secondary`, `text-muted` - Text colors  
- `bg-primary`, `bg-secondary`, `bg-muted`, `bg-dark` - Background colors
- `border-primary`, `border-light`, `border-dark` - Border colors
- `success`, `warning`, `error`, `info` - State colors

### Spacing
```scss
// Usage examples  
.my-element {
  padding: spacing(4);     // 1rem
  margin: spacing(lg);     // 2rem
  gap: spacing(card);      // 2rem
}
```

**Scale:** `0, 1, 2, 3, 4, 5, 6, 8, 10, 12, 16, 20, 24, 32`  
**Semantic:** `xs, sm, md, lg, xl, xxl, section, card, gap`

### Typography
```scss
// Usage examples
.my-element {
  font-size: text(text-lg);         // 1.125rem
  font-weight: text(font-semibold); // 600
  line-height: text(leading-relaxed); // 1.6
}
```

**Sizes:** `text-xs` to `text-5xl`  
**Weights:** `font-light` (300) to `font-bold` (700)  
**Line Heights:** `leading-tight` (1.2) to `leading-loose` (1.8)

### Border Radius
```scss
// Usage examples
.my-element {
  border-radius: radius(card);    // 12px
  border-radius: radius(button);  // 25px
  border-radius: radius(full);    // 50%
}
```

**Scale:** `none, sm, base, md, lg, xl, full, button, card, badge, icon`

### Shadows
```scss
// Usage examples
.my-element {
  box-shadow: shadow(card);       // Subtle card shadow
  box-shadow: shadow(card-hover); // Elevated hover shadow
}
```

**Types:** `none, sm, base, md, lg, hover, focus, card, card-hover, button`

## 🛠 Utility Classes

### BEM Spacing Modifiers (Recommended for Sections)
```html
<!-- Section spacing - use these for consistent site-wide spacing -->
<section class="hero-section section--spacing-bottom">...</section>
<section class="content-section section--spacing-vertical">...</section>
<section class="footer-section section--spacing-top">...</section>

<!-- Size variants -->
<section class="small-section section--spacing-bottom-sm">...</section>
<section class="large-section section--spacing-bottom-lg">...</section>
```

### Spacing Utilities
```html
<!-- Design System spacing (semantic) -->
<div class="ds-m-lg ds-mt-section ds-mb-card">...</div>
<div class="ds-p-card ds-px-lg ds-py-section">...</div>

<!-- Bootstrap 5 spacing (numeric scale) -->
<div class="m-3 p-4 mb-5">...</div>
```

**Note:** Design system utilities use `ds-` prefix to avoid conflicts with Bootstrap 5 spacing classes.

### Typography Utilities
```html
<!-- Font sizes -->
<h1 class="text-4xl font-bold">Large Heading</h1>
<p class="text-base font-medium">Regular text</p>

<!-- Text colors -->
<span class="text-primary">Primary text</span>
<span class="text-muted">Muted text</span>
```

### Color Utilities
```html
<!-- Text colors -->
<div class="text-primary text-secondary text-muted text-white text-brand">...</div>

<!-- Background colors -->
<div class="bg-primary bg-secondary bg-muted bg-dark bg-brand">...</div>
```

### Border Utilities
```html
<!-- Border radius -->
<div class="rounded-card rounded-button rounded-full">...</div>
```

### Shadow Utilities
```html
<!-- Box shadows -->
<div class="shadow-card shadow-card-hover shadow-button">...</div>
```

## 🧩 Component System

### Cards
```scss
.my-card {
  background: color(bg-primary);
  border: 1px solid color(border-primary);
  border-radius: radius(card);
  padding: spacing(card);
  box-shadow: shadow(card);
  transition: transition(all);
  
  &:hover {
    transform: translateY(-4px);
    box-shadow: shadow(card-hover);
    border-color: color(primary);
  }
}
```

### Buttons
```scss
.my-button {
  @extend .btn-base;
  background: color(primary);
  color: color(text-white);
  
  &:hover {
    background: color(primary-dark);
  }
}
```

### Article Meta
```html
<div class="article-meta">
  <span class="category">Category</span>
  <span class="date">Dec 10, 2024</span>
</div>
```

## 📱 Responsive System

### Breakpoints
```scss
$breakpoints: (
  xs: 0,
  sm: 576px,
  md: 768px, 
  lg: 992px,
  xl: 1200px,
  xxl: 1400px
);
```

### Usage
```scss
@media (min-width: breakpoint(md)) {
  .my-element {
    font-size: text(text-lg);
  }
}
```

## ⚡ Helper Functions

```scss
// Use design tokens in your SCSS
.my-component {
  color: color(primary);
  padding: spacing(4);
  font-size: text(text-lg);
  border-radius: radius(card);
  box-shadow: shadow(base);
  z-index: z(modal);
  transition: transition(all);
}
```

## 🎯 Best Practices

### 1. Always Use Design Tokens
```scss
// ✅ Good
.element { color: color(text-primary); }

// ❌ Avoid
.element { color: #2d3748; }
```

### 2. Use BEM Spacing Modifiers for Sections
```html
<!-- ✅ Good - Consistent site-wide spacing -->
<section class="my-section section--spacing-bottom">...</section>

<!-- ❌ Avoid - Hardcoded spacing -->
<section class="my-section" style="margin-bottom: 80px;">...</section>
```

### 3. Choose the Right Spacing System
```html
<!-- ✅ Good - BEM for sections -->
<section class="content section--spacing-bottom">...</section>

<!-- ✅ Good - Design System for components -->
<div class="card ds-p-card ds-mb-lg">...</div>

<!-- ✅ Good - Bootstrap for fine-tuning -->
<div class="content m-2 p-3">...</div>
```

### 4. Consistent Spacing Hierarchy
```scss
// ✅ Good - Use spacing scale
.element { margin: spacing(4) spacing(8); }

// ❌ Avoid - Random values
.element { margin: 17px 23px; }
```

### 5. Component-First Approach
```scss
// ✅ Good - Semantic component classes
.article-card { ... }
.category-badge { ... }

// ❌ Avoid - Generic utility overuse
.p-4.bg-white.rounded-lg.shadow-md { ... }
```

### 6. Consistent Transitions
```scss
// ✅ Good - Use design tokens
.element { transition: transition(all); }

// ❌ Avoid - Inconsistent timing
.element { transition: color 0.2s linear; }
```

## 🔧 Extending the System

### Adding New Colors
```scss
// In _design-tokens.scss
$colors: (
  // ... existing colors
  accent-blue: #3b82f6,
  accent-green: #10b981
);
```

### Adding New Components
```scss
// In _design-tokens.scss
$component-tokens: (
  // ... existing components
  alert: (
    padding: spacing(4),
    radius: radius(base),
    border-width: 1px
  )
);
```

## 📋 Available Utility Classes

### BEM Spacing Modifiers (Primary - Use for Sections)
- **Main modifiers**: `.section--spacing-bottom`, `.section--spacing-top`, `.section--spacing-vertical`
- **Size variants**: `.section--spacing-bottom-sm` (2rem), `.section--spacing-bottom-lg` (5rem)
- **Auto-responsive**: Desktop 5rem → Mobile 2rem automatically
- **Responsive values**:
  - Desktop (1200px+): 5rem (80px)
  - Mobile (767px-): 2rem (32px)
- **Usage**: `<section class="my-section section--spacing-bottom">` for consistent site-wide spacing

### Spacing (Design System)
- Margins: `.ds-m-{size}`, `.ds-mt-{size}`, `.ds-mr-{size}`, `.ds-mb-{size}`, `.ds-ml-{size}`, `.ds-mx-{size}`, `.ds-my-{size}`
- Padding: `.ds-p-{size}`, `.ds-pt-{size}`, `.ds-pr-{size}`, `.ds-pb-{size}`, `.ds-pl-{size}`, `.ds-px-{size}`, `.ds-py-{size}`
- Sizes: `xs, sm, md, lg, xl, xxl, section, card, gap`

### Spacing (Bootstrap 5)
- Standard Bootstrap classes: `.m-0` to `.m-5`, `.p-0` to `.p-5`
- Use Bootstrap for fine-tuned spacing, design system for semantic spacing

### Typography
- Sizes: `.text-xs`, `.text-sm`, `.text-base`, `.text-lg`, `.text-xl`, `.text-2xl`, `.text-3xl`, `.text-4xl`, `.text-5xl`
- Weights: `.font-light`, `.font-normal`, `.font-medium`, `.font-semibold`, `.font-bold`
- Colors: `.text-primary`, `.text-secondary`, `.text-muted`, `.text-white`, `.text-brand`

### Backgrounds
- Colors: `.bg-primary`, `.bg-secondary`, `.bg-muted`, `.bg-dark`, `.bg-brand`

### Borders
- Radius: `.rounded-none`, `.rounded-sm`, `.rounded-base`, `.rounded-md`, `.rounded-lg`, `.rounded-xl`, `.rounded-full`

### Shadows
- Types: `.shadow-none`, `.shadow-sm`, `.shadow-base`, `.shadow-md`, `.shadow-lg`, `.shadow-hover`, `.shadow-focus`

This design system ensures consistency, maintainability, and scalability across the entire WPForPro theme.

## 🏗️ Quick Reference - Three Spacing Systems

### When to Use Which:

1. **BEM Spacing Modifiers** → **Sections & Large Components**
   ```html
   <section class="hero-section section--spacing-bottom">
   <article class="content-block section--spacing-vertical">
   ```
   - ✅ Site-wide consistency
   - ✅ Auto-responsive (5rem → 2rem)
   - ✅ Semantic and clear

2. **Design System Utilities** → **Components & Cards**  
   ```html
   <div class="card ds-p-card ds-mb-lg">
   <div class="button-group ds-mx-md ds-py-sm">
   ```
   - ✅ Component-focused spacing
   - ✅ Design token consistency
   - ✅ Semantic naming

3. **Bootstrap 5** → **Fine-tuning & Quick Adjustments**
   ```html
   <div class="content m-3 p-2">
   <span class="badge mt-1 mb-2">
   ```
   - ✅ Precise control
   - ✅ Familiar Bootstrap scale
   - ✅ Quick prototyping

### Complete Spacing Hierarchy:
```
BEM Modifiers (5rem)     ← Section gaps (between sections)
  ↓
Internal Padding         ← Component content spacing (hero: 5rem, cards: 2rem)
  ↓
Design System (2rem)     ← Component margins/padding
  ↓
Bootstrap 5 (0.25-3rem)  ← Fine-tuning & adjustments
```

### Component Internal Padding Examples:
```scss
// Hero section needs internal padding for content breathing room
.hero-section { 
  padding: 5rem 0; // Internal content spacing
}

// Other sections rely on child component spacing
.resources-section { 
  // No padding - child components handle their own spacing
}
```