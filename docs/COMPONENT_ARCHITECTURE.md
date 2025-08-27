# Component-Driven Design Architecture

> **Modern Component Architecture for WPForPro WordPress Theme**

## 🎯 Vision & Strategy

Transform the wpforpro theme from a traditional template-based WordPress theme into a **modern component-driven architecture** that emphasizes reusability, maintainability, and scalability while preserving WordPress functionality.

## 🏗️ Architecture Overview

### Design Principles

1. **Component-First Thinking**: Every UI element is a reusable component
2. **Atomic Design Methodology**: Build from atoms → molecules → organisms → templates
3. **Single Responsibility**: Each component has one clear purpose
4. **Composition over Inheritance**: Combine simple components to create complex ones
5. **WordPress Integration**: Seamless integration with WordPress hooks and filters

### Current vs Target Architecture

**🔴 Current State:**
```
Traditional WordPress Theme
├── Template files (index.php, single.php, etc.)
├── Basic JavaScript modules (2 modules)
├── SASS components (limited reusability)
└── Hardcoded template structures
```

**🟢 Target State:**
```
Component-Driven WordPress Theme
├── Component Library (40+ reusable components)
├── Design System (tokens, patterns, guidelines)
├── State Management (centralized app state)
├── Template Composition (component-based templates)
└── Developer Tools (Storybook, testing, documentation)
```

---

## 🧩 Component Hierarchy & Classification

### Atomic Design System

#### **Atoms** (Basic Building Blocks)
Smallest, indivisible UI components that serve as the foundation.

```typescript
// Button Atom
interface ButtonProps {
  variant: 'primary' | 'secondary' | 'outline' | 'ghost'
  size: 'sm' | 'md' | 'lg'
  disabled?: boolean
  loading?: boolean
  icon?: string
  onClick?: () => void
  children: React.ReactNode
}

// Input Atom  
interface InputProps {
  type: 'text' | 'email' | 'password' | 'search'
  placeholder?: string
  label?: string
  error?: string
  disabled?: boolean
  required?: boolean
  value?: string
  onChange?: (value: string) => void
}

// Typography Atoms
interface HeadingProps {
  level: 1 | 2 | 3 | 4 | 5 | 6
  children: React.ReactNode
  className?: string
}

interface TextProps {
  variant: 'body' | 'caption' | 'overline'
  color: 'primary' | 'secondary' | 'muted' | 'error'
  children: React.ReactNode
}
```

**Complete Atoms Library:**
- Button (variants, sizes, states)
- Input (text, email, password, search, textarea)
- Typography (headings, paragraphs, links, lists)
- Image (with lazy loading, aspect ratios)
- Icon (SVG icon system)
- Badge (status indicators, tags)
- Spinner (loading states)
- Divider (content separation)

#### **Molecules** (Component Combinations)
Combinations of atoms that form more complex, reusable UI components.

```typescript
// Search Bar Molecule
interface SearchBarProps {
  placeholder?: string
  onSearch: (query: string) => void
  suggestions?: string[]
  loading?: boolean
}

// Card Molecule
interface CardProps {
  image?: {
    src: string
    alt: string
    aspectRatio?: '16:9' | '4:3' | '1:1'
  }
  title: string
  excerpt?: string
  meta?: {
    author?: string
    date?: string
    readTime?: string
    categories?: string[]
  }
  actions?: {
    primary?: ButtonProps
    secondary?: ButtonProps
  }
  href?: string
  featured?: boolean
}

// Form Field Molecule
interface FormFieldProps {
  input: InputProps
  label?: string
  helperText?: string
  error?: string
  required?: boolean
}

// Navigation Item Molecule
interface NavItemProps {
  label: string
  href: string
  icon?: string
  badge?: string
  active?: boolean
  children?: NavItemProps[]
  onClick?: () => void
}
```

**Complete Molecules Library:**
- SearchBar (input + button + suggestions)
- FormField (label + input + error + helper text)
- Card (image + content + actions)
- MediaObject (image + content)
- ButtonGroup (multiple buttons)
- Pagination (navigation controls)
- Breadcrumbs (navigation trail)
- Alert (icon + message + actions)
- Modal (header + content + footer)
- Dropdown (trigger + menu + items)

#### **Organisms** (Complex Components)
Large components made of molecules and atoms that serve specific functions.

```typescript
// Header Organism
interface HeaderProps {
  logo: {
    src: string
    alt: string
    href: string
  }
  navigation: NavItemProps[]
  actions?: {
    search?: boolean
    theme?: boolean
    user?: {
      avatar: string
      name: string
      menu: NavItemProps[]
    }
  }
  sticky?: boolean
}

// Article Organism
interface ArticleProps {
  title: string
  excerpt?: string
  content: string
  meta: {
    author: {
      name: string
      avatar: string
      bio?: string
    }
    publishedDate: string
    modifiedDate?: string
    readTime: string
    categories: string[]
    tags: string[]
  }
  featuredImage?: {
    src: string
    alt: string
    caption?: string
  }
  navigation?: {
    previous?: { title: string; href: string }
    next?: { title: string; href: string }
  }
  shareButtons?: boolean
  comments?: boolean
}

// Post Grid Organism
interface PostGridProps {
  posts: CardProps[]
  columns: {
    mobile: 1
    tablet: 2 | 3
    desktop: 2 | 3 | 4
  }
  pagination?: {
    currentPage: number
    totalPages: number
    onPageChange: (page: number) => void
  }
  loading?: boolean
  emptyState?: {
    title: string
    description: string
    action?: ButtonProps
  }
}
```

**Complete Organisms Library:**
- Header (logo + navigation + actions)
- Footer (links + social + newsletter)
- ArticleHero (title + meta + featured image)
- PostGrid (post cards + pagination)
- CommentSection (comments + form)
- Newsletter (form + validation)
- ContactForm (fields + validation + submission)
- SearchResults (results + pagination + filters)
- UserProfile (avatar + info + stats)
- RelatedPosts (recommendations)

#### **Templates** (Page Layouts)
Complete page structures using organisms, molecules, and atoms.

```typescript
// Blog Template
interface BlogTemplateProps {
  header: HeaderProps
  hero?: {
    title: string
    subtitle?: string
    backgroundImage?: string
  }
  posts: PostGridProps
  sidebar?: {
    widgets: WidgetProps[]
  }
  footer: FooterProps
}

// Single Post Template
interface SinglePostTemplateProps {
  header: HeaderProps
  article: ArticleProps
  sidebar?: {
    widgets: WidgetProps[]
    sticky?: boolean
  }
  relatedPosts?: PostGridProps
  footer: FooterProps
}
```

---

## 💼 Component Implementation Strategy

### Phase 1: Component Foundation (Weeks 1-2)

#### 1.1 Component Base Class

```typescript
// src/components/base/Component.ts
export abstract class Component<T = {}> {
  protected element: HTMLElement
  protected props: T
  protected children: Component[] = []
  
  constructor(props: T, element?: HTMLElement) {
    this.props = props
    this.element = element || this.createElement()
    this.init()
  }
  
  protected abstract createElement(): HTMLElement
  protected abstract render(): void
  
  protected init(): void {
    this.render()
    this.bindEvents()
  }
  
  protected bindEvents(): void {
    // Override in child classes
  }
  
  public mount(parent: HTMLElement): void {
    parent.appendChild(this.element)
  }
  
  public unmount(): void {
    this.element.remove()
    this.cleanup()
  }
  
  protected cleanup(): void {
    // Override in child classes for cleanup
  }
  
  public update(newProps: Partial<T>): void {
    this.props = { ...this.props, ...newProps }
    this.render()
  }
}
```

#### 1.2 Button Component Implementation

```typescript
// src/components/atoms/Button.ts
import { Component } from '../base/Component'

export interface ButtonProps {
  variant: 'primary' | 'secondary' | 'outline' | 'ghost'
  size: 'sm' | 'md' | 'lg'
  disabled?: boolean
  loading?: boolean
  icon?: string
  text: string
  onClick?: () => void
}

export class Button extends Component<ButtonProps> {
  protected createElement(): HTMLElement {
    const button = document.createElement('button')
    button.type = 'button'
    return button
  }
  
  protected render(): void {
    const { variant, size, disabled, loading, icon, text } = this.props
    
    // Set classes
    this.element.className = [
      'btn',
      `btn--${variant}`,
      `btn--${size}`,
      disabled && 'btn--disabled',
      loading && 'btn--loading'
    ].filter(Boolean).join(' ')
    
    // Set attributes
    this.element.setAttribute('disabled', disabled?.toString() || 'false')
    this.element.setAttribute('aria-busy', loading?.toString() || 'false')
    
    // Set content
    this.element.innerHTML = `
      ${loading ? '<span class="btn__spinner"></span>' : ''}
      ${icon ? `<i class="btn__icon icon-${icon}"></i>` : ''}
      <span class="btn__text">${text}</span>
    `
  }
  
  protected bindEvents(): void {
    this.element.addEventListener('click', (e) => {
      if (this.props.disabled || this.props.loading) {
        e.preventDefault()
        return
      }
      
      this.props.onClick?.()
    })
  }
}
```

#### 1.3 Card Component Implementation

```typescript
// src/components/molecules/Card.ts
import { Component } from '../base/Component'
import { Button, ButtonProps } from '../atoms/Button'

export interface CardProps {
  image?: {
    src: string
    alt: string
    aspectRatio?: '16:9' | '4:3' | '1:1'
  }
  title: string
  excerpt?: string
  meta?: {
    author?: string
    date?: string
    readTime?: string
    categories?: string[]
  }
  actions?: {
    primary?: ButtonProps
    secondary?: ButtonProps
  }
  href?: string
  featured?: boolean
}

export class Card extends Component<CardProps> {
  private primaryButton?: Button
  private secondaryButton?: Button
  
  protected createElement(): HTMLElement {
    const article = document.createElement('article')
    return article
  }
  
  protected render(): void {
    const { image, title, excerpt, meta, actions, href, featured } = this.props
    
    // Set classes
    this.element.className = [
      'card',
      featured && 'card--featured'
    ].filter(Boolean).join(' ')
    
    // Build content
    const imageHtml = image ? `
      <div class="card__image-wrapper card__image-wrapper--${image.aspectRatio || '16:9'}">
        <img 
          src="${image.src}" 
          alt="${image.alt}" 
          class="card__image"
          loading="lazy"
        />
      </div>
    ` : ''
    
    const metaHtml = meta ? `
      <div class="card__meta">
        ${meta.author ? `<span class="card__meta-item">${meta.author}</span>` : ''}
        ${meta.date ? `<time class="card__meta-item">${meta.date}</time>` : ''}
        ${meta.readTime ? `<span class="card__meta-item">${meta.readTime}</span>` : ''}
        ${meta.categories ? `
          <div class="card__categories">
            ${meta.categories.map(cat => `<span class="card__category">${cat}</span>`).join('')}
          </div>
        ` : ''}
      </div>
    ` : ''
    
    this.element.innerHTML = `
      ${imageHtml}
      <div class="card__content">
        ${metaHtml}
        <h3 class="card__title">
          ${href ? `<a href="${href}">${title}</a>` : title}
        </h3>
        ${excerpt ? `<p class="card__excerpt">${excerpt}</p>` : ''}
        <div class="card__actions"></div>
      </div>
    `
    
    // Add action buttons
    const actionsContainer = this.element.querySelector('.card__actions')
    
    if (actions?.primary && actionsContainer) {
      this.primaryButton = new Button(actions.primary)
      this.primaryButton.mount(actionsContainer)
    }
    
    if (actions?.secondary && actionsContainer) {
      this.secondaryButton = new Button(actions.secondary)
      this.secondaryButton.mount(actionsContainer)
    }
  }
  
  protected cleanup(): void {
    this.primaryButton?.unmount()
    this.secondaryButton?.unmount()
  }
}
```

### Phase 2: WordPress Integration (Weeks 2-3)

#### 2.1 WordPress Component Bridge

```php
<?php
// inc/component-bridge.php

class ComponentBridge {
    private static $instance = null;
    private $components = [];
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function registerComponent($name, $callback) {
        $this->components[$name] = $callback;
    }
    
    public function renderComponent($name, $props = []) {
        if (!isset($this->components[$name])) {
            return false;
        }
        
        $callback = $this->components[$name];
        return $callback($props);
    }
    
    public function enqueueComponentData($name, $data) {
        wp_localize_script('wpforpro-components', "component_{$name}", $data);
    }
}

// Register WordPress-specific components
function wpforpro_register_components() {
    $bridge = ComponentBridge::getInstance();
    
    // Post Card Component
    $bridge->registerComponent('post-card', function($props) {
        $post = get_post($props['post_id']);
        
        return [
            'title' => get_the_title($post),
            'excerpt' => get_the_excerpt($post),
            'href' => get_permalink($post),
            'image' => has_post_thumbnail($post) ? [
                'src' => get_the_post_thumbnail_url($post, 'medium'),
                'alt' => get_post_meta(get_post_thumbnail_id($post), '_wp_attachment_image_alt', true)
            ] : null,
            'meta' => [
                'author' => get_the_author_meta('display_name', $post->post_author),
                'date' => get_the_date('', $post),
                'readTime' => wpforpro_get_read_time($post->post_content),
                'categories' => wp_get_post_categories($post->ID, ['fields' => 'names'])
            ]
        ];
    });
    
    // Navigation Component
    $bridge->registerComponent('navigation', function($props) {
        $menu_items = wp_get_nav_menu_items($props['menu_location']);
        
        return array_map(function($item) {
            return [
                'label' => $item->title,
                'href' => $item->url,
                'active' => $item->url === $_SERVER['REQUEST_URI']
            ];
        }, $menu_items);
    });
}
add_action('init', 'wpforpro_register_components');
```

#### 2.2 Component Shortcodes

```php
<?php
// inc/component-shortcodes.php

// [wpforpro-button variant="primary" size="lg"]Click me[/wpforpro-button]
function wpforpro_button_shortcode($atts, $content = '') {
    $atts = shortcode_atts([
        'variant' => 'primary',
        'size' => 'md',
        'href' => '',
        'disabled' => false,
        'class' => ''
    ], $atts);
    
    $component_data = [
        'variant' => $atts['variant'],
        'size' => $atts['size'],
        'text' => $content,
        'disabled' => $atts['disabled']
    ];
    
    if ($atts['href']) {
        $component_data['href'] = $atts['href'];
    }
    
    $unique_id = 'button-' . uniqid();
    
    wp_localize_script('wpforpro-components', $unique_id, $component_data);
    
    return sprintf(
        '<div class="component-placeholder" data-component="button" data-id="%s" data-class="%s"></div>',
        $unique_id,
        esc_attr($atts['class'])
    );
}
add_shortcode('wpforpro-button', 'wpforpro_button_shortcode');

// [wpforpro-post-grid posts="5" columns="3"]
function wpforpro_post_grid_shortcode($atts) {
    $atts = shortcode_atts([
        'posts' => 6,
        'columns' => 3,
        'category' => '',
        'orderby' => 'date',
        'order' => 'DESC'
    ], $atts);
    
    $query_args = [
        'posts_per_page' => intval($atts['posts']),
        'orderby' => $atts['orderby'],
        'order' => $atts['order']
    ];
    
    if ($atts['category']) {
        $query_args['category_name'] = $atts['category'];
    }
    
    $posts = get_posts($query_args);
    $bridge = ComponentBridge::getInstance();
    
    $post_data = array_map(function($post) use ($bridge) {
        return $bridge->renderComponent('post-card', ['post_id' => $post->ID]);
    }, $posts);
    
    $component_data = [
        'posts' => $post_data,
        'columns' => [
            'mobile' => 1,
            'tablet' => min(2, intval($atts['columns'])),
            'desktop' => intval($atts['columns'])
        ]
    ];
    
    $unique_id = 'post-grid-' . uniqid();
    wp_localize_script('wpforpro-components', $unique_id, $component_data);
    
    return sprintf(
        '<div class="component-placeholder" data-component="post-grid" data-id="%s"></div>',
        $unique_id
    );
}
add_shortcode('wpforpro-post-grid', 'wpforpro_post_grid_shortcode');
```

### Phase 3: State Management (Week 3)

#### 3.1 Lightweight State Manager

```typescript
// src/store/StateManager.ts
interface AppState {
  theme: 'light' | 'dark'
  navigation: {
    isOpen: boolean
    currentPath: string
  }
  search: {
    query: string
    results: any[]
    loading: boolean
  }
  user: {
    isLoggedIn: boolean
    preferences: Record<string, any>
  }
  ui: {
    modals: Record<string, boolean>
    notifications: Notification[]
  }
}

interface Notification {
  id: string
  type: 'success' | 'warning' | 'error' | 'info'
  message: string
  timeout?: number
}

type StateUpdateCallback = (state: AppState) => void
type StateSelector<T> = (state: AppState) => T

export class StateManager {
  private state: AppState
  private subscribers: Set<StateUpdateCallback> = new Set()
  private selectors: Map<string, StateSelector<any>> = new Map()
  
  constructor(initialState?: Partial<AppState>) {
    this.state = {
      theme: 'light',
      navigation: {
        isOpen: false,
        currentPath: window.location.pathname
      },
      search: {
        query: '',
        results: [],
        loading: false
      },
      user: {
        isLoggedIn: false,
        preferences: {}
      },
      ui: {
        modals: {},
        notifications: []
      },
      ...initialState
    }
    
    this.loadPersistedState()
  }
  
  // State updates
  public setState(updates: Partial<AppState> | ((prevState: AppState) => Partial<AppState>)): void {
    const newState = typeof updates === 'function' 
      ? updates(this.state)
      : updates
      
    this.state = { ...this.state, ...newState }
    this.persistState()
    this.notifySubscribers()
  }
  
  public getState(): AppState {
    return { ...this.state }
  }
  
  // Subscriptions
  public subscribe(callback: StateUpdateCallback): () => void {
    this.subscribers.add(callback)
    
    // Return unsubscribe function
    return () => {
      this.subscribers.delete(callback)
    }
  }
  
  private notifySubscribers(): void {
    this.subscribers.forEach(callback => {
      try {
        callback(this.state)
      } catch (error) {
        console.error('State subscriber error:', error)
      }
    })
  }
  
  // Selectors
  public createSelector<T>(name: string, selector: StateSelector<T>): () => T {
    this.selectors.set(name, selector)
    
    return () => selector(this.state)
  }
  
  // Actions
  public actions = {
    // Theme actions
    setTheme: (theme: 'light' | 'dark') => {
      this.setState({ theme })
      document.documentElement.setAttribute('data-theme', theme)
    },
    
    // Navigation actions
    toggleNavigation: () => {
      this.setState(state => ({
        navigation: {
          ...state.navigation,
          isOpen: !state.navigation.isOpen
        }
      }))
    },
    
    setCurrentPath: (path: string) => {
      this.setState(state => ({
        navigation: {
          ...state.navigation,
          currentPath: path
        }
      }))
    },
    
    // Search actions
    setSearchQuery: (query: string) => {
      this.setState(state => ({
        search: {
          ...state.search,
          query
        }
      }))
    },
    
    setSearchResults: (results: any[]) => {
      this.setState(state => ({
        search: {
          ...state.search,
          results,
          loading: false
        }
      }))
    },
    
    setSearchLoading: (loading: boolean) => {
      this.setState(state => ({
        search: {
          ...state.search,
          loading
        }
      }))
    },
    
    // Modal actions
    openModal: (modalId: string) => {
      this.setState(state => ({
        ui: {
          ...state.ui,
          modals: {
            ...state.ui.modals,
            [modalId]: true
          }
        }
      }))
    },
    
    closeModal: (modalId: string) => {
      this.setState(state => ({
        ui: {
          ...state.ui,
          modals: {
            ...state.ui.modals,
            [modalId]: false
          }
        }
      }))
    },
    
    // Notification actions
    addNotification: (notification: Omit<Notification, 'id'>) => {
      const id = `notification-${Date.now()}-${Math.random()}`
      const newNotification: Notification = { ...notification, id }
      
      this.setState(state => ({
        ui: {
          ...state.ui,
          notifications: [...state.ui.notifications, newNotification]
        }
      }))
      
      // Auto-remove notification after timeout
      if (notification.timeout) {
        setTimeout(() => {
          this.actions.removeNotification(id)
        }, notification.timeout)
      }
    },
    
    removeNotification: (id: string) => {
      this.setState(state => ({
        ui: {
          ...state.ui,
          notifications: state.ui.notifications.filter(n => n.id !== id)
        }
      }))
    }
  }
  
  // Persistence
  private persistState(): void {
    try {
      const persistableState = {
        theme: this.state.theme,
        user: this.state.user
      }
      
      localStorage.setItem('wpforpro-state', JSON.stringify(persistableState))
    } catch (error) {
      console.warn('Failed to persist state:', error)
    }
  }
  
  private loadPersistedState(): void {
    try {
      const persisted = localStorage.getItem('wpforpro-state')
      if (persisted) {
        const parsed = JSON.parse(persisted)
        this.state = { ...this.state, ...parsed }
        
        // Apply theme immediately
        if (this.state.theme) {
          document.documentElement.setAttribute('data-theme', this.state.theme)
        }
      }
    } catch (error) {
      console.warn('Failed to load persisted state:', error)
    }
  }
}

// Global state instance
export const stateManager = new StateManager()

// Convenience selectors
export const selectors = {
  theme: stateManager.createSelector('theme', state => state.theme),
  isNavigationOpen: stateManager.createSelector('isNavigationOpen', state => state.navigation.isOpen),
  searchQuery: stateManager.createSelector('searchQuery', state => state.search.query),
  searchResults: stateManager.createSelector('searchResults', state => state.search.results),
  isSearchLoading: stateManager.createSelector('isSearchLoading', state => state.search.loading),
  notifications: stateManager.createSelector('notifications', state => state.ui.notifications),
  isModalOpen: (modalId: string) => stateManager.createSelector(`modal-${modalId}`, state => state.ui.modals[modalId] || false)
}
```

### Phase 4: Component Registry & Factory (Week 4)

#### 4.1 Component Factory

```typescript
// src/components/ComponentFactory.ts
import { Component } from './base/Component'

// Import all components
import { Button } from './atoms/Button'
import { Input } from './atoms/Input'
import { Card } from './molecules/Card'
import { SearchBar } from './molecules/SearchBar'
import { Header } from './organisms/Header'
import { PostGrid } from './organisms/PostGrid'

interface ComponentConstructor<T = any> {
  new (props: T): Component<T>
}

interface ComponentRegistration<T = any> {
  constructor: ComponentConstructor<T>
  defaultProps?: Partial<T>
  dependencies?: string[]
}

export class ComponentFactory {
  private static instance: ComponentFactory
  private registry: Map<string, ComponentRegistration> = new Map()
  private instances: Map<string, Component> = new Map()
  
  public static getInstance(): ComponentFactory {
    if (!ComponentFactory.instance) {
      ComponentFactory.instance = new ComponentFactory()
    }
    return ComponentFactory.instance
  }
  
  private constructor() {
    this.registerDefaultComponents()
  }
  
  // Component registration
  public register<T>(
    name: string, 
    constructor: ComponentConstructor<T>, 
    options: {
      defaultProps?: Partial<T>
      dependencies?: string[]
    } = {}
  ): void {
    this.registry.set(name, {
      constructor,
      defaultProps: options.defaultProps,
      dependencies: options.dependencies || []
    })
  }
  
  // Component creation
  public create<T>(name: string, props: T, options: {
    id?: string
    parent?: HTMLElement
    replace?: HTMLElement
  } = {}): Component<T> | null {
    const registration = this.registry.get(name)
    if (!registration) {
      console.error(`Component "${name}" not found in registry`)
      return null
    }
    
    // Check dependencies
    if (registration.dependencies) {
      for (const dep of registration.dependencies) {
        if (!this.registry.has(dep)) {
          console.error(`Dependency "${dep}" not found for component "${name}"`)
          return null
        }
      }
    }
    
    // Merge with default props
    const finalProps = {
      ...registration.defaultProps,
      ...props
    } as T
    
    // Create component instance
    const component = new registration.constructor(finalProps, options.replace)
    
    // Store instance if ID provided
    if (options.id) {
      this.instances.set(options.id, component)
    }
    
    // Mount to parent if provided
    if (options.parent) {
      component.mount(options.parent)
    }
    
    return component
  }
  
  // Get existing instance
  public getInstance(id: string): Component | null {
    return this.instances.get(id) || null
  }
  
  // Batch creation from data
  public createFromData(data: Array<{
    component: string
    props: any
    id?: string
    parent?: HTMLElement
  }>): Component[] {
    return data.map(item => 
      this.create(item.component, item.props, {
        id: item.id,
        parent: item.parent
      })
    ).filter(Boolean) as Component[]
  }
  
  // Auto-initialization from DOM
  public initializeFromDOM(): void {
    const placeholders = document.querySelectorAll('.component-placeholder')
    
    placeholders.forEach(placeholder => {
      const componentName = placeholder.getAttribute('data-component')
      const dataId = placeholder.getAttribute('data-id')
      const className = placeholder.getAttribute('data-class')
      
      if (!componentName || !dataId) return
      
      // Get component data from localized script
      const componentData = (window as any)[dataId]
      if (!componentData) return
      
      // Create and mount component
      const component = this.create(componentName, componentData, {
        id: dataId,
        replace: placeholder as HTMLElement
      })
      
      // Add custom class if provided
      if (component && className) {
        component.element.classList.add(...className.split(' '))
      }
    })
  }
  
  private registerDefaultComponents(): void {
    // Atoms
    this.register('button', Button, {
      defaultProps: {
        variant: 'primary',
        size: 'md',
        disabled: false,
        loading: false
      }
    })
    
    this.register('input', Input, {
      defaultProps: {
        type: 'text',
        disabled: false,
        required: false
      }
    })
    
    // Molecules
    this.register('card', Card, {
      defaultProps: {
        featured: false
      }
    })
    
    this.register('search-bar', SearchBar, {
      defaultProps: {
        placeholder: 'Search...',
        loading: false
      }
    })
    
    // Organisms
    this.register('header', Header, {
      defaultProps: {
        sticky: true
      }
    })
    
    this.register('post-grid', PostGrid, {
      defaultProps: {
        columns: {
          mobile: 1,
          tablet: 2,
          desktop: 3
        },
        loading: false
      }
    })
  }
}

// Global factory instance
export const componentFactory = ComponentFactory.getInstance()

// Auto-initialize components when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  componentFactory.initializeFromDOM()
})
```

---

## 🧪 Testing Strategy

### Unit Testing Components

```typescript
// src/components/__tests__/Button.test.ts
import { Button, ButtonProps } from '../atoms/Button'

describe('Button Component', () => {
  let container: HTMLElement
  
  beforeEach(() => {
    container = document.createElement('div')
    document.body.appendChild(container)
  })
  
  afterEach(() => {
    document.body.removeChild(container)
  })
  
  it('should render with correct variant class', () => {
    const props: ButtonProps = {
      variant: 'primary',
      size: 'md',
      text: 'Click me'
    }
    
    const button = new Button(props)
    button.mount(container)
    
    expect(button.element.classList.contains('btn--primary')).toBe(true)
    expect(button.element.textContent).toContain('Click me')
  })
  
  it('should handle click events', () => {
    const onClick = jest.fn()
    const props: ButtonProps = {
      variant: 'primary',
      size: 'md',
      text: 'Click me',
      onClick
    }
    
    const button = new Button(props)
    button.mount(container)
    
    button.element.click()
    expect(onClick).toHaveBeenCalledTimes(1)
  })
  
  it('should not trigger click when disabled', () => {
    const onClick = jest.fn()
    const props: ButtonProps = {
      variant: 'primary',
      size: 'md',
      text: 'Click me',
      disabled: true,
      onClick
    }
    
    const button = new Button(props)
    button.mount(container)
    
    button.element.click()
    expect(onClick).not.toHaveBeenCalled()
  })
})
```

### Integration Testing

```typescript
// src/components/__tests__/PostGrid.integration.test.ts
import { PostGrid } from '../organisms/PostGrid'
import { componentFactory } from '../ComponentFactory'

describe('PostGrid Integration', () => {
  it('should render post cards correctly', () => {
    const props = {
      posts: [
        {
          title: 'Test Post 1',
          excerpt: 'This is a test post',
          href: '/test-post-1',
          meta: {
            author: 'John Doe',
            date: '2024-01-01',
            categories: ['Technology']
          }
        }
      ],
      columns: {
        mobile: 1,
        tablet: 2,
        desktop: 3
      }
    }
    
    const postGrid = componentFactory.create('post-grid', props)
    expect(postGrid).toBeTruthy()
    
    const cards = postGrid?.element.querySelectorAll('.card')
    expect(cards?.length).toBe(1)
  })
})
```

---

## 📚 Documentation & Style Guide

### Component Documentation Template

```markdown
# Button Component

## Overview
A flexible button component that supports multiple variants, sizes, and states.

## Props
| Prop | Type | Default | Description |
|------|------|---------|-------------|
| variant | 'primary' \| 'secondary' \| 'outline' \| 'ghost' | 'primary' | Visual variant |
| size | 'sm' \| 'md' \| 'lg' | 'md' | Button size |
| disabled | boolean | false | Whether button is disabled |
| loading | boolean | false | Whether button shows loading state |
| text | string | - | Button text content |
| onClick | () => void | - | Click handler |

## Usage

### Basic Usage
```typescript
const button = new Button({
  variant: 'primary',
  size: 'md',
  text: 'Click me',
  onClick: () => console.log('Clicked!')
})
```

### WordPress Shortcode
```php
[wpforpro-button variant="primary" size="lg"]Get Started[/wpforpro-button]
```

## Accessibility
- Proper focus management
- ARIA attributes for screen readers
- Keyboard navigation support
```

---

## 🚀 Implementation Timeline

### Month 1: Foundation
- **Week 1**: Component base classes and architecture
- **Week 2**: Atom components (Button, Input, Typography, etc.)
- **Week 3**: Molecule components (Card, SearchBar, FormField, etc.)
- **Week 4**: Testing setup and documentation

### Month 2: Integration
- **Week 1**: WordPress integration and bridge classes
- **Week 2**: Organism components (Header, Footer, PostGrid, etc.)
- **Week 3**: State management implementation
- **Week 4**: Component factory and registry

### Month 3: Enhancement
- **Week 1**: Advanced components (Modal, Dropdown, etc.)
- **Week 2**: Performance optimization and lazy loading
- **Week 3**: Accessibility improvements and testing
- **Week 4**: Documentation and design system

### Month 4: Production
- **Week 1**: Integration testing and bug fixes
- **Week 2**: Performance testing and optimization
- **Week 3**: Cross-browser testing and polyfills
- **Week 4**: Production deployment and monitoring

---

This component-driven architecture transforms the wpforpro theme into a modern, maintainable, and scalable system that leverages the best practices of modern frontend development while maintaining full WordPress compatibility.