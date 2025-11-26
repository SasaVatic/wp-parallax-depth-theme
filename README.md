# Parallax Depth - WordPress Custom Theme

A custom WordPress theme built as a learning project, transforming a one-page parallax template into a fully functional multi-page WordPress theme with custom meta boxes and dynamic content management.

## 📋 Project Overview

This project is based on the [Parallax Depth template](https://www.tooplate.com/view/2144-parallax-depth) by Tooplate. The original single-page website has been converted into a WordPress custom theme where each section became an individual page, demonstrating WordPress theme development concepts including:

- Custom page templates
- WordPress meta boxes for content management
- Template hierarchy and WordPress loop
- Theme functions and hooks
- SCSS architecture with component-based styling
- Custom JavaScript interactions

## 🎯 Learning Objectives

This theme was created to practice and demonstrate:

- Converting static HTML templates to WordPress themes
- Creating custom page templates
- Building admin interfaces with meta boxes
- Implementing WordPress coding standards
- Organizing SCSS with a modular architecture
- Setting up a development workflow with Sass compilation and live reloading

## 📁 Project Structure

### Original Template

```
└── 📁2144_parallax_depth
    └── 📁images
    ├── ABOUT THIS TEMPLATE.txt
    ├── index.html
    ├── tooplate-2144-parallax-scripts.js
    └── tooplate-parallax-depth.css
```

### WordPress Theme Structure

```
└── 📁parallax-depth (theme folder)
    └── 📁content
        ├── about.php
        ├── contact.php
        ├── features.php
        ├── gallery.php
        └── home.php
    └── 📁css
        ├── main.css
        └── main.css.map
    └── 📁js
        ├── carousel.js
        ├── fade-in-animation.js
        ├── form.js
        ├── mouse-follower.js
        └── parallax-layer.js
    └── 📁scss
        └── 📁components
            ├── _carousel.scss
            ├── _contact-form.scss
            ├── _feature-card.scss
            ├── _footer.scss
            ├── _gallery-item.scss
            ├── _header.scss
            ├── _info-box.scss
            ├── _navigation.scss
            └── index.scss
        └── 📁global
            ├── _base.scss
            └── index.scss
        └── 📁pages
            ├── _about.scss
            ├── _contact.scss
            ├── _features.scss
            ├── _gallery.scss
            ├── _home.scss
            └── index.scss
        └── main.scss
    ├── .gitignore
    ├── footer.php
    ├── front-page.php
    ├── functions.php
    ├── header.php
    ├── index.php
    ├── package-lock.json
    ├── package.json
    ├── page-about.php
    ├── page-contact.php
    ├── page-features.php
    ├── page-gallery.php
    ├── style.css
    └── stylelint.config.mjs
```

## 🚀 Installation

### Prerequisites

- WordPress installation (local or live server)
- Node.js and npm installed
- Local development environment (XAMPP, Local by Flywheel, MAMP, etc.)

### Setup Steps

1. **Clone or download the theme**

   ```bash
   cd wp-content/themes/
   git clone https://github.com/SasaVatic/wp-parallax-depth-theme.git parallax-depth
   ```

2. **Install dependencies**

   ```bash
   cd parallax-depth
   npm install
   ```

3. **Activate the theme**

   - Go to WordPress Admin → Appearance → Themes
   - Activate "Parallax Depth"

4. **Create pages**
   Create the following pages in WordPress Admin:

   - Home (assign template: "Front Page")
   - About (assign template: "About Page")
   - Features (assign template: "Features Page")
   - Gallery (assign template: "Gallery Page")
   - Contact (assign template: "Contact Page")

5. **Set homepage**
   - Go to Settings → Reading
   - Set "Your homepage displays" to "A static page"
   - Select your "Home" page as the homepage

## 🛠️ Development

### Available Scripts

```bash
# Start development server with live reload
npm start

# Compile and watch SCSS files
npm run scss

# Lint and fix SCSS files
npm run lint:scss
```

### Development Workflow

1. **SCSS Compilation**: Run `npm run scss` to watch and compile SCSS files
2. **Live Reload**: Run `npm start` to start BrowserSync for automatic page reloading
3. **Edit Files**: Make changes to PHP, SCSS, or JS files
4. **View Changes**: Browser will automatically refresh when files are saved

## 📄 Page Templates

### Front Page (Home)

- **Template**: `front-page.php`
- **Content**: `content/home.php`
- **Features**: Parallax scrolling layers, animated hero section
- **Meta Fields**: Heading, intro text

### About Page

- **Template**: `page-about.php`
- **Content**: `content/about.php`
- **Features**: Animated orbit visualization, info boxes
- **Meta Fields**: Heading, subheading, paragraphs, info cards (icon, title, text)

### Features Page

- **Template**: `page-features.php`
- **Content**: `content/features.php`
- **Features**: 3D carousel with feature cards
- **Meta Fields**: Heading, feature cards (icon, title, description)

### Gallery Page

- **Template**: `page-gallery.php`
- **Content**: `content/gallery.php`
- **Features**: Responsive grid gallery with overlay effects
- **Meta Fields**: Heading, gallery items (image URL, title, subtitle)

### Contact Page

- **Template**: `page-contact.php`
- **Content**: `content/contact.php`
- **Features**: Contact form, contact information display
- **Meta Fields**: Heading, form heading, email, phone, address, website

## 🎨 Customization

### Editing Content

All page content can be edited through WordPress Admin:

1. Go to Pages → Select page to edit
2. Scroll down to the custom meta box for that page
3. Fill in the fields (headings, text, images, etc.)
4. Click "Save"

### Styling

- Main SCSS file: `scss/main.scss`
- Component styles: `scss/components/`
- Page-specific styles: `scss/pages/`
- Global styles: `scss/global/`

### JavaScript Interactions

- Parallax layers: `js/parallax-layer.js`
- Carousel: `js/carousel.js`
- Mouse follower: `js/mouse-follower.js`
- Fade animations: `js/fade-in-animation.js`
- Contact form: `js/form.js`

## 🔧 Features

### WordPress Integration

- ✅ Custom page templates
- ✅ Meta boxes for content management
- ✅ WordPress coding standards
- ✅ Proper escaping and sanitization
- ✅ Theme support for title tags
- ✅ Conditional script loading

### Design Features

- ✅ Parallax scrolling effects
- ✅ Responsive design
- ✅ 3D carousel
- ✅ Animated navigation elements
- ✅ Custom mouse follower
- ✅ Grid overlay effects
- ✅ Smooth scroll animations

### Development Tools

- ✅ SCSS with modular architecture
- ✅ BrowserSync live reloading
- ✅ Stylelint for code quality
- ✅ Automatic CSS compilation
- ✅ Source maps for debugging

## 📝 Notes

- This theme is built for learning purposes and demonstrates WordPress theme development concepts
- The original template was a single HTML page; this version splits it into multiple WordPress pages
- All meta boxes include fallback content for better user experience
- The theme follows WordPress coding standards and security best practices

## 📄 License

### Original Template License

The base design is from [Tooplate - Parallax Depth](https://www.tooplate.com/view/2144-parallax-depth).

According to Tooplate's license:

- ✅ You can edit and use this template for any purpose (personal or commercial)
- ✅ You can modify text and images to suit your needs
- ❌ You are NOT allowed to re-distribute the original template ZIP file

### This WordPress Theme

This WordPress theme adaptation is created for **educational purposes only**. The WordPress-specific code (theme structure, meta boxes, functions.php, etc.) can be used freely for learning.

If you wish to use this theme for commercial purposes, please:

1. Respect the original Tooplate license terms
2. Consider downloading the original template from Tooplate directly
3. Give proper credit to Tooplate for the original design

## 🙏 Credits

- **Original Design**: [Tooplate - Parallax Depth Template](https://www.tooplate.com/view/2144-parallax-depth)
- **WordPress Theme Development**: Created as a learning project for WordPress custom theme development
- **Developer**: Saša Vatić ([@SasaVatic](https://github.com/SasaVatic))

---
