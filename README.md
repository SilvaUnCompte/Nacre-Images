# 🇬🇧 Nacre-Images - Photography Website

A professional website for **Nacre-Images**, a photographer specialized in photography workshops and photographic services in Normandy (Caen region).

## About the project

Nacre-Images is the website of Gilles Quesnot, a professional photographer since 2009. The site presents his photography training services, various types of workshops and services, as well as a complete management system for the administrator.

### Main features

- **Showcase website** with service presentation
- **Workshop presentation** with description pages and calendar
- **Administrator dashboard** for content management
- **REST API** for CRUD operations
- **Responsive design** adaptive
- **SEO optimized** with sitemap and metadata

## Project architecture

### Folder structure

```
Nacre-Images/
├── assets/                # Static resources
│   ├── fonts/             # Custom fonts
│   └── images/            # Site images (carousels, logos, etc.)
├── controler/             # MVC controllers
│   ├── dashboard/         # Administration pages
│   └── pages/             # Public pages
├── database/              # Database and API
│   ├── api/               # REST API endpoints
│   ├── tables/            # Data models (PHP classes)
│   └── connexion.php      # DB configuration
├── public/                # Public files
│   ├── html/              # HTML/PHP templates
│   ├── js/                # JavaScript scripts
│   └── styles/            # Stylesheets (SCSS/CSS)
├── index.php              # Main entry point + routing
├── robots.txt             # SEO configuration
├── sitemap.xml            # Site map
└── README.md              # Documentation
```

### Technical architecture

- **Frontend**: HTML5, CSS3/SCSS, _vanilla_ JavaScript
- **Backend**: PHP 8+ with MVC approach
- **Database**: MariaDB with PDO
- **Authentication**: PHP Sessions (Should change to JWT in the future)
- **API**: REST with JSON responses
- **Design**: Responsive, mobile-first

## Prerequisites

- **PHP 8.0+** with extensions:
  - PDO
  - MySQL
  - Session
- **MariaDB 10.3+**
- **Web server** (Apache, Nginx)
- **SSL certificate** for production

### 2. Database configuration

Create a `.env` file at the project root:
```env
DB_HOST=localhost
DB_PORT=3306
DB_USERNAME=username
DB_PASSWORD=password
DB_NAME=db
```

### 3. Database creation

Create the necessary tables:
- `user` - Administrator users
- `workshop_type` - Photography workshop types
- `workshop_session` - Planned workshop sessions
- `prices` - Pricing grid
- `services` - Offered services
- `news` - Site news
- `faq` - Frequently asked questions

### 4. Permissions
```bash
chmod 755 -R ./
chmod 644 -R ./assets/images/
```

## Usage

### Public interface

The site offers several sections:

- **Home** (`/`) - Presentation and news
- **Workshops** (`/infos-stage`) - List of available training courses
- **Calendar** (`/calendrier`) - Session schedule
- **Services** (`/prestations`) - Photography services
- **Pricing** (`/stage/tarifs`) - Pricing grid
- **Contact** (`/contact`) - Contact information
- **FAQ** (`/faq`) - Frequently asked questions

### Administrator dashboard

Access via `/dashboard` with authentication:

#### Management features
- **Calendar** - Session planning
- **Pricing** - Pricing grid management
- **News** - News publishing
- **FAQ** - Questions/answers management
- **Workshops** - Workshop type creation/modification
- **Services** - Service management

#### Authentication
- **Email**: Unique identifier
- **Password**: Hashed with PBKDF2 + salt
- **Sessions**: Automatic timeout management

### REST API

Available endpoints (authentication required):

#### Workshop sessions
- `GET /api/get-sessions-by-date` - Sessions by period
- `POST /api/add-session` - Create a session
- `POST /api/update-info-session` - Modify a session
- `DELETE /api/delete-session` - Delete a session
- `POST /api/duplicate-session` - Duplicate a session

#### Content management
- `POST /api/add-news` - Add news
- `POST /api/update-news` - Update news
- `DELETE /api/delete-news` - Delete news
- `POST /api/add-question` - Add FAQ
- `POST /api/update-question` - Update FAQ

## Technical features

### Image carousel
- **Touch and keyboard** navigation
- **Automatic autoplay** with pause
- **Responsive** on all devices
- **Lazy loading** of images

### News system
- **Time management** (start/end dates)
- **Optional images**
- **Controlled visibility**
- **Conditional display**

### SEO optimization
- **Clean URLs** with rewriting
- **Dynamic metadata** per page
- **Automatic sitemap.xml**
- **Configured robots.txt**
- **HTML5 semantic** structure

## Development

### MVC structure
- **Models**: Classes in `/database/tables/`
- **Views**: Templates in `/public/html/`
- **Controllers**: Logic in `/controler/`

### SCSS styles
Compile SCSS files to CSS:
```bash
sass --watch public/styles/scss:public/styles --style compressed
```

### JavaScript
- **ES6 modules** with import
- **Fetch API** for AJAX requests
- **Event listeners** with delegation
- **Responsive design** with media queries

## Contact and support

- **Developer**: SilvaUnCompte
- **Repository**: [GitHub](https://github.com/SilvaUnCompte/Nacre-Images)
- **Website**: [stages-photos-nacre-images.fr](https://www.stages-photos-nacre-images.fr/)

## License

**Non-Commercial License**

This project is the property of Nacre-Images and Gilles Quesnot. All rights reserved.

### Terms of Use

✅ **Permitted uses:**
- View and study the source code for educational purposes
- Fork and modify for personal, non-commercial learning
- Contribute improvements via pull requests

❌ **Prohibited uses:**
- Commercial use of any kind
- Redistribution for commercial purposes
- Use as a template for commercial photography websites
- Selling or monetizing this code or its derivatives

### Copyright Notice

Copyright (c) 2024 Gilles Quesnot - Nacre-Images. All rights reserved.

This software is provided "as is", without warranty of any kind. The authors disclaim all liability for any damages arising from the use of this software.

For commercial licensing inquiries, please contact: [stages-photos-nacre-images.fr](https://www.stages-photos-nacre-images.fr/contact)
