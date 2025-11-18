# VCK Application - Implementation Document

## Table of Contents
1. [Overview](#overview)
2. [Technology Stack](#technology-stack)
3. [Application Architecture](#application-architecture)
4. [Core Features](#core-features)
5. [Frontend Features](#frontend-features)
6. [Admin Panel Features](#admin-panel-features)
7. [Database Structure](#database-structure)
8. [API Endpoints](#api-endpoints)
9. [Third-Party Integrations](#third-party-integrations)
10. [Security Features](#security-features)
11. [Localization & Internationalization](#localization--internationalization)
12. [File Structure](#file-structure)
13. [Deployment Considerations](#deployment-considerations)

---

## Overview

**VCK (Viduthalai Chiruthaigal Katchi)** is a comprehensive web application built for a political party in Tamil Nadu, India. The application serves as both a public-facing website and an administrative management system for party operations, member management, media content, donations, and applications.

### Key Objectives
- Provide an informative public website showcasing party ideology, history, and activities
- Manage party members, office bearers, and representatives
- Handle media content (news, press releases, events, videos, gallery)
- Process donations with payment gateway integration
- Manage party applications and member registrations
- Generate member ID cards in PDF format
- Support multiple languages (Tamil, English, and others)

---

## Technology Stack

### Backend
- **Framework**: Laravel 12.x
- **PHP Version**: PHP 8.2+
- **Database**: MySQL/PostgreSQL (configurable)
- **Admin Panel**: Filament 4.x
- **PDF Generation**: barryvdh/laravel-dompdf
- **Payment Gateway**: Razorpay
- **Localization**: mcamara/laravel-localization

### Frontend
- **CSS Framework**: Tailwind CSS
- **JavaScript**: Vanilla JS with Vite
- **Animation Library**: AOS (Animate On Scroll)
- **Icons**: Heroicons (Blade UI Kit)
- **Fonts**: Mukta Malar (Tamil support)

### Development Tools
- **Package Manager**: Composer (PHP), npm (JavaScript)
- **Build Tool**: Vite
- **Code Quality**: Laravel Pint
- **Testing**: PHPUnit

---

## Application Architecture

### MVC Pattern
The application follows Laravel's Model-View-Controller architecture:

- **Models**: Located in `app/Models/` - Handle database interactions
- **Views**: Located in `resources/views/` - Blade templates for rendering
- **Controllers**: Located in `app/Http/Controllers/` - Handle HTTP requests
- **Resources**: Filament resources in `app/Filament/Resources/` - Admin panel CRUD operations

### Key Components
1. **PageController**: Handles all public-facing routes
2. **Filament Resources**: Admin panel management for all entities
3. **Services**: Business logic (e.g., LLMService)
4. **Facades**: Application facades (e.g., LLM facade)
5. **Mail**: Email notifications (ContactMail)

---

## Core Features

### 1. Member Management System

#### Features
- **Member Registration**: Public registration form with comprehensive data collection
- **Member Database**: Complete member information storage
- **Member ID Cards**: PDF generation for member identification
- **Member Search & Filter**: Advanced filtering in admin panel
- **Member View**: Detailed member profile pages

#### Member Data Fields
- Personal Information: Name, Father Name, DOB, Gender, Blood Group, Photo
- Contact Information: Phone, Email, Address, Pincode, Voter ID
- Administrative Details: State, District, Assembly, Block, Perur, City, Corporation
- Registration Details: Member ID, Registration Date, Last Update

#### ID Card Generation
- **Three Download Options**:
  1. Full ID Card (Both Sides) - A4 format
  2. Front Only - Credit card size (85.6mm x 53.98mm)
  3. Back Only - Credit card size
- **Features**: VCK logo, member photo, QR code placeholder, party guidelines
- **Format**: PDF with professional gradient design

### 2. Media Management System

#### Media Categories
1. **Press Releases** (Category ID: 1)
2. **Events** (Category ID: 2)
3. **Latest News** (Category ID: 3)
4. **Interviews** (Category ID: 4)
5. **Gallery** (Category ID: 5)
6. **Videos** (Category ID: 6)
7. **Kalaththil Siruthaigal** (Category ID: 7)
8. **Live** (Category ID: 8)

#### Media Features
- **Rich Content**: Support for Tamil and English content
- **Featured Images**: Image upload and management
- **Multiple Photos**: Support for additional photo galleries
- **Video Links**: YouTube/Vimeo video embedding
- **Event Dates**: Date-based sorting and filtering
- **Slug-based URLs**: SEO-friendly URLs
- **Pagination**: Efficient content pagination

### 3. Donation System

#### Features
- **Online Donations**: Razorpay payment gateway integration
- **Donation Tracking**: Complete donation history
- **Payment Verification**: Secure payment signature verification
- **Tax Benefits**: PAN number collection for tax deduction (80G)
- **Member Association**: Link donations to member IDs
- **Payment Status**: Track pending, success, and failed payments
- **Success Page**: Confirmation page after successful payment

#### Donation Flow
1. User fills donation form
2. System creates donation record with "pending" status
3. Razorpay order is created
4. User completes payment
5. Payment signature is verified
6. Donation status updated to "success"
7. User redirected to success page

### 4. Application Management System

#### Features
- **Party Applications**: Comprehensive application form for party positions
- **Document Upload**: Support for photo and document uploads
- **Posting Stage Selection**: Dynamic posting stage selection
- **Subbody & Post Selection**: Dynamic dropdowns based on posting stage
- **Status Tracking**: Application status management (Pending, Approved, Rejected)
- **Location Hierarchy**: Support for complex location structures

#### Application Fields
- Personal Details: Name, Father/Mother/Spouse Name, DOB, Gender, Education, Occupation
- Marital & Social: Marital Status, Social Category
- Party Details: Joining Date, Current Post, Posting Stage, Subbody, Post
- Location: State, District, Assembly, Block, City, Perur, Paguthi, Vattam, Corporation
- Contact: Address, Mobile, Email
- Documents: Photo, Document upload

### 5. Book Management System

#### Features
- **Book Library**: Digital book collection
- **Categories**: Book categorization
- **Book Viewer**: PDF viewer with page navigation
- **Active/Inactive**: Book visibility control
- **Sort Order**: Custom sorting
- **Slug-based URLs**: SEO-friendly book URLs

#### Book Viewer Features
- Page-by-page navigation
- Zoom controls (Zoom In, Zoom Out, Fit to Width)
- Page counter
- Responsive design

### 6. Contact Management System

#### Features
- **Contact Form**: Public contact form
- **Email Notifications**: Automatic email to party
- **Contact Database**: Store all contact inquiries
- **Admin Management**: View and manage contacts in admin panel

### 7. Office Bearers & Representatives

#### Features
- **Office Bearers**: Display party office bearers
- **Elected Members**: Showcase elected representatives
- **Party Representatives**: Display party representatives
- **Post-based Grouping**: Organize by post/position
- **Assembly Association**: Link bearers to assemblies

---

## Frontend Features

### 1. Public Website Pages

#### Home Page
- Hero slider with party messaging
- Latest news section
- Press releases section
- Events section
- Interviews section
- Gallery preview
- Videos section
- Quick links to key sections

#### Content Pages
- **Ideology**: Party ideology and principles
- **History**: Party history and evolution
- **Administration**: Administrative information
- **Latest News**: Paginated news listing
- **Press Releases**: Paginated press releases
- **Events**: Event listings
- **Gallery**: Image gallery with lightbox
- **Videos**: Video collection
- **Interviews**: Exclusive interviews
- **Kalaththil Siruthaigal**: Special content section
- **Books**: Book library with categories
- **Contact**: Contact form page
- **Join VCK**: Member registration form
- **Donation**: Donation form with payment
- **Applications**: Party application form

#### Member Pages
- **Elected Members**: List of elected representatives
- **Office Bearers**: Party office bearers by post
- **Party Representatives**: Party representatives listing

### 2. Design System

#### Color Scheme
- **Primary (Blue)**: Working People's Liberation (நீலம் - உழைக்கும் மக்கள் விடுதலை)
- **Secondary (Red)**: Liberation & Justice (சிவப்பு - விடுதலை மற்றும் நீதி)
- **Accent (Yellow)**: Equality & Hope (மஞ்சள் - சமத்துவம் மற்றும் நம்பிக்கை)

#### Design Patterns
- **Animated Gradient Borders**: Glowing borders on hover
- **Card Components**: Consistent card design across pages
- **AOS Animations**: Scroll-triggered animations
- **Dark Mode**: Full dark mode support
- **Responsive Design**: Mobile-first approach
- **Typography**: Mukta Malar font for Tamil support

#### Component Library
- News/Media Cards
- Member/Profile Cards
- Color Symbolism Cards
- Vision/Mission Cards
- Hero Cards
- Slogan Cards
- Empty State Components
- Pagination Components

### 3. User Experience Features

#### Navigation
- Multi-level navigation menu
- Language switcher
- Responsive mobile menu
- Breadcrumb navigation

#### Search & Filter
- Dynamic dropdowns for location selection
- API-based cascading selects
- Real-time filtering

#### Forms
- Comprehensive validation
- File upload support
- Multi-step forms
- Success/error messaging
- Loading states

#### Media Display
- Image galleries with lightbox
- Video embedding
- PDF viewer for books
- Responsive image handling

---

## Admin Panel Features

### Filament Admin Panel

The application uses Filament 4.x for the admin panel, providing a modern, intuitive interface for content management.

### Available Resources

#### 1. Member Management
- **List Members**: View all members with filters
- **Create Member**: Add new members
- **Edit Member**: Update member information
- **View Member**: Detailed member view with ID card download options
- **Search & Filter**: Advanced filtering by location, status, etc.
- **Bulk Actions**: Bulk operations on members

#### 2. Media Management
- **List Media**: View all media items by category
- **Create Media**: Add news, events, press releases, etc.
- **Edit Media**: Update media content
- **Categories**: Manage media categories
- **Featured Images**: Image upload and management
- **Video Links**: Video URL management
- **Event Dates**: Date-based organization

#### 3. Donation Management
- **List Donations**: View all donations
- **Payment Status**: Track payment status
- **Razorpay Integration**: View payment details
- **Export**: Export donation data
- **Filters**: Filter by status, date, amount

#### 4. Application Management
- **List Applications**: View all party applications
- **Status Management**: Update application status
- **Document Viewing**: View uploaded documents
- **Filter by Status**: Filter by pending/approved/rejected

#### 5. Book Management
- **List Books**: View all books
- **Create/Edit Books**: Manage book content
- **Categories**: Organize books by category
- **Sort Order**: Custom sorting
- **Active/Inactive**: Control book visibility

#### 6. Contact Management
- **List Contacts**: View all contact inquiries
- **Contact Details**: View full contact information
- **Email Integration**: Email notifications

#### 7. Location Management
- **States**: Manage states
- **Districts**: Manage districts (linked to states)
- **Assemblies**: Manage assemblies (linked to districts)
- **Blocks**: Manage blocks (linked to assemblies/districts)
- **Cities**: Manage cities (linked to districts)
- **Corporations**: Manage corporations (linked to districts)
- **Perurs**: Manage perurs (linked to cities/districts)
- **Paguthis**: Manage paguthis (linked to perurs/districts)
- **Vattams**: Manage vattams (linked to paguthis/districts)

#### 8. Party Structure Management
- **Posting Stages**: Manage posting stages
- **Subbodies**: Manage subbodies (linked to posting stages)
- **Posts**: Manage posts (linked to posting stages)
- **Bearers**: Manage office bearers and representatives
- **Users**: Manage admin users

### Admin Panel Features

#### Dashboard
- Statistics widgets
- Recent activity
- Quick actions

#### Widgets
- Custom Filament widgets for analytics
- Data visualization

#### Permissions
- Role-based access control
- User management
- Permission management

---

## Database Structure

### Core Tables

#### Members
- Personal information
- Contact details
- Location associations
- Registration data
- Photo storage

#### Media
- Category association
- Tamil and English content
- Featured images
- Video links
- Event dates
- Multiple photos (JSON)

#### Donations
- Donor information
- Payment details (Razorpay)
- Payment status
- Tax information (PAN)
- Member association

#### Applications
- Comprehensive application data
- Document uploads
- Status tracking
- Location associations
- Posting stage data

#### Books
- Book metadata
- Category
- PDF storage
- Sort order
- Active status

#### Contacts
- Contact form submissions
- Email notifications

#### Location Tables
- States
- Districts
- Assemblies
- Blocks
- Cities
- Corporations
- Perurs
- Paguthis
- Vattams

#### Party Structure Tables
- Postingstages
- Subbodies
- Posts
- Bearers

#### System Tables
- Users (admin users)
- Categories (media categories)

### Relationships

#### Member Relationships
- belongsTo: State, District, Assembly, Block, City, Perur, Corporation

#### Media Relationships
- belongsTo: Category

#### Donation Relationships
- belongsTo: District, Member

#### Application Relationships
- belongsTo: State, District, Assembly, Block, City, Perur, Paguthi, Vattam, Corporation, Postingstage, Subbody, Post

#### Location Relationships
- Hierarchical: State → District → Assembly/Block/City/Corporation
- City → Perur → Paguthi → Vattam

---

## API Endpoints

### Public API Endpoints

#### Location APIs (Dynamic Dropdowns)
```
GET /api/districts/{stateId}
GET /api/assemblies/{districtId}
GET /api/blocks/{assemblyId}
GET /api/cities/{districtId}
GET /api/perurs/{cityId}
GET /api/paguthis/{perurId}
GET /api/vattams/{paguthiId}
GET /api/blocks/by-district/{districtId}
GET /api/perurs/by-district/{districtId}
GET /api/cities/by-district/{districtId}
GET /api/corporations/by-district/{districtId}
GET /api/paguthis/by-district/{districtId}
GET /api/vattams/by-district/{districtId}
GET /api/subbodies/by-postingstage/{postingstageId}
GET /api/posts/by-postingstage/{postingstageId}
```

#### Payment APIs
```
POST /donation
POST /donation/verify
GET /donation/success
```

### Response Format
All API endpoints return JSON responses with consistent structure:
```json
{
  "id": 1,
  "name_en": "Name in English",
  "name_ta": "Name in Tamil"
}
```

---

## Third-Party Integrations

### 1. Razorpay Payment Gateway

#### Integration Details
- **Package**: razorpay/razorpay (v2.9)
- **Purpose**: Online donation processing
- **Features**:
  - Order creation
  - Payment processing
  - Signature verification
  - Payment status tracking

#### Configuration
- API Key and Secret in `.env`
- Webhook support (optional)
- Test mode support

### 2. LLM Service Integration

#### Service Details
- **Service Class**: `App\Services\LLMService`
- **Facade**: `App\Facades\LLM`
- **Providers**: Ollama, OpenAI-compatible

#### Features
- Chat completion
- Text generation
- Context length management
- Token estimation
- Model management (Ollama)

#### Configuration
- Provider selection in `config/llm.php`
- Model configuration
- API endpoints
- Timeout settings

### 3. Email Service

#### Integration
- **Laravel Mail**: Built-in mail system
- **SMTP Configuration**: Configurable in `.env`
- **Templates**: Blade email templates

#### Email Types
- Contact form notifications
- Application confirmations
- Donation receipts (future)

### 4. PDF Generation

#### Integration
- **Package**: barryvdh/laravel-dompdf
- **Purpose**: Member ID card generation
- **Features**:
  - Custom PDF templates
  - Image embedding
  - Font support (Mukta Malar for Tamil)
  - Multiple page formats

---

## Security Features

### 1. Authentication & Authorization
- **Admin Panel**: Filament authentication
- **User Roles**: Role-based access control
- **Password Security**: Laravel's built-in hashing

### 2. Form Validation
- **Request Classes**: Dedicated form request classes
- **Server-side Validation**: Comprehensive validation rules
- **CSRF Protection**: Laravel CSRF tokens

### 3. File Upload Security
- **File Type Validation**: Allowed file types
- **File Size Limits**: Maximum file size restrictions
- **Storage**: Secure file storage in `storage/app/public`

### 4. Payment Security
- **Signature Verification**: Razorpay signature verification
- **HTTPS**: Secure payment processing
- **Payment Status Tracking**: Complete audit trail

### 5. Data Protection
- **Input Sanitization**: Laravel's built-in sanitization
- **SQL Injection Prevention**: Eloquent ORM
- **XSS Protection**: Blade template escaping

---

## Localization & Internationalization

### Supported Languages
- **Tamil** (ta) - Primary language
- **English** (en) - Secondary language
- **Hindi** (hi) - Partial support
- **Kannada** (kn) - Partial support
- **Malayalam** (ml) - Partial support
- **Telugu** (te) - Partial support

### Implementation
- **Package**: mcamara/laravel-localization
- **Route Prefixing**: Language-based route prefixes
- **Translation Files**: Located in `resources/lang/`
- **Blade Directives**: `__()` helper for translations

### Translation Structure
```
resources/lang/
├── en/
│   ├── site.php
│   ├── auth.php
│   └── messages.php
├── ta/
│   └── site.php
└── [other languages]/
```

### Usage in Views
```blade
{{ __('site.menu.home') }}
{{ __('site.contact.title') }}
```

### Database Content
- **Bilingual Content**: Most content stored in both Tamil and English
- **Field Naming**: `name_en`, `name_ta`, `title_en`, `title_ta`, etc.
- **Dynamic Display**: Content displayed based on current locale

---

## File Structure

### Key Directories

```
app/
├── Facades/          # Application facades
├── Filament/         # Filament admin panel resources
│   ├── Resources/    # CRUD resources
│   └── Widgets/      # Dashboard widgets
├── Http/
│   ├── Controllers/  # Application controllers
│   └── Requests/      # Form request validation
├── Livewire/         # Livewire components
├── Mail/             # Email classes
├── Models/           # Eloquent models
├── Providers/        # Service providers
└── Services/         # Business logic services

resources/
├── css/              # CSS files
├── js/               # JavaScript files
├── lang/             # Translation files
└── views/            # Blade templates
    ├── components/   # Reusable components
    ├── layouts/      # Layout templates
    ├── pages/        # Page templates
    └── pdf/          # PDF templates

routes/
└── web.php           # Web routes

database/
├── factories/        # Model factories
├── migrations/       # Database migrations
└── seeders/          # Database seeders

public/
├── assets/           # Public assets
├── build/           # Compiled assets
└── storage/         # Storage symlink

config/
└── [config files]   # Configuration files
```

---

## Deployment Considerations

### Environment Configuration

#### Required Environment Variables
```env
APP_NAME="VCK"
APP_ENV=production
APP_KEY=[generated key]
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vck_db
DB_USERNAME=db_user
DB_PASSWORD=db_password

RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Storage Configuration
- **Public Storage**: Symlink `storage/app/public` to `public/storage`
- **File Permissions**: Ensure proper permissions for storage directories
- **Font Storage**: Ensure `storage/fonts` exists for PDF generation

### Database Setup
1. Run migrations: `php artisan migrate`
2. Seed initial data: `php artisan db:seed`
3. Create admin user: Use Filament or tinker

### Asset Compilation
```bash
npm install
npm run build
```

### Optimization
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### Server Requirements
- PHP 8.2 or higher
- MySQL 5.7+ or PostgreSQL 10+
- Composer
- Node.js and npm
- Web server (Apache/Nginx)
- SSL certificate (for payment processing)

### Security Checklist
- [ ] Set `APP_DEBUG=false` in production
- [ ] Use strong `APP_KEY`
- [ ] Configure secure database credentials
- [ ] Enable HTTPS
- [ ] Configure proper file permissions
- [ ] Set up regular backups
- [ ] Configure email notifications
- [ ] Set up monitoring and logging

---

## Additional Features

### 1. Offline Support
- **Service Worker**: Basic offline support
- **Offline Page**: Custom offline page

### 2. Progressive Web App (PWA)
- **Manifest**: Web app manifest
- **Service Worker**: Basic PWA functionality

### 3. SEO Features
- **Slug-based URLs**: SEO-friendly URLs
- **Meta Tags**: Dynamic meta tags
- **Sitemap**: XML sitemap generation (future)

### 4. Analytics Integration
- **Google Analytics**: Ready for integration
- **Custom Tracking**: Event tracking support

### 5. Social Media Integration
- **Social Sharing**: Share buttons (future)
- **Social Login**: OAuth integration (future)

---

## Future Enhancements

### Planned Features
1. **QR Code Integration**: Add QR codes to member ID cards
2. **Barcode Support**: Barcode with member ID
3. **Signature Upload**: Digital signature on ID cards
4. **Batch Operations**: Bulk member ID card generation
5. **Email Notifications**: Automated email notifications
6. **SMS Integration**: SMS notifications
7. **Advanced Analytics**: Detailed analytics dashboard
8. **Export Features**: Excel/CSV export for all data
9. **Multi-language PDFs**: PDF content in multiple languages
10. **Expiry Management**: ID card expiry and renewal system

### Technical Improvements
1. **API Versioning**: RESTful API with versioning
2. **Caching Strategy**: Advanced caching implementation
3. **Queue System**: Background job processing
4. **Search Functionality**: Full-text search
5. **Image Optimization**: Automatic image optimization
6. **CDN Integration**: Content delivery network
7. **Backup Automation**: Automated database backups

---

## Support & Maintenance

### Documentation
- **Design System**: See `DESIGN_SYSTEM.md`
- **Member ID Cards**: See `MEMBER_ID_CARD_FEATURE.md`
- **Storage Fix**: See `STORAGE_FIX_DEPLOYMENT.md`
- **Tamil Font PDF**: See `TAMIL_FONT_PDF_FIX.md`

### Logging
- **Laravel Logs**: `storage/logs/laravel.log`
- **Error Tracking**: Configure error tracking service
- **Payment Logs**: Payment-related logs

### Backup Strategy
- **Database Backups**: Regular database backups
- **File Backups**: Storage directory backups
- **Configuration Backups**: Environment configuration

---

## Conclusion

The VCK application is a comprehensive web platform that combines public-facing website functionality with powerful administrative tools. It provides a complete solution for political party management, including member management, media content, donations, applications, and more.

The application is built with modern technologies, follows best practices, and is designed to be scalable and maintainable. With its multi-language support, payment integration, and comprehensive admin panel, it serves as a complete solution for political party operations.

---

**Document Version**: 1.0  
**Last Updated**: 2025  
**Maintained By**: Development Team









