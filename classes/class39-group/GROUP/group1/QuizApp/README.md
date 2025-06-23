# Complete Online Quiz Application Development Roadmap

## Project Overview
A comprehensive online quiz platform with multi-level categorization, payment integration, admin controls, and competitive features.

## Technology Stack
- **Backend**: PHP 8.1+ with Composer
- **Database**: MySQL 8.0+
- **Frontend**: Bootstrap 5.3+ with JavaScript
- **Payment**: bKash API Integration
- **Additional**: PHPMailer, JWT for authentication

## Database Schema

### Core Tables

```sql
-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20),
    avatar VARCHAR(255),
    role ENUM('admin', 'user') DEFAULT 'user',
    status ENUM('active', 'inactive', 'banned') DEFAULT 'active',
    email_verified_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Categories table
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    icon VARCHAR(100),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Classes table
CREATE TABLE classes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL,
    description TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id),
    UNIQUE KEY unique_class_category (category_id, slug)
);

-- Subjects table
CREATE TABLE subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    class_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL,
    description TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id),
    UNIQUE KEY unique_subject_class (class_id, slug)
);

-- Topics/Chapters table
CREATE TABLE topics (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL,
    description TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id),
    UNIQUE KEY unique_topic_subject (subject_id, slug)
);

-- Quizzes table
CREATE TABLE quizzes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE NOT NULL,
    description TEXT,
    category_id INT NOT NULL,
    class_id INT,
    subject_id INT,
    topic_id INT,
    level ENUM('beginner', 'intermediate', 'advanced') NOT NULL,
    type ENUM('general', 'event') DEFAULT 'general',
    total_questions INT NOT NULL DEFAULT 0,
    duration INT NOT NULL, -- in minutes
    passing_marks INT NOT NULL,
    max_attempts INT DEFAULT 1,
    is_paid BOOLEAN DEFAULT FALSE,
    price DECIMAL(10,2) DEFAULT 0.00,
    instructions TEXT,
    start_datetime TIMESTAMP NULL, -- for event-based quizzes
    end_datetime TIMESTAMP NULL,
    status ENUM('draft', 'pending', 'approved', 'rejected') DEFAULT 'draft',
    is_featured BOOLEAN DEFAULT FALSE,
    created_by INT NOT NULL,
    approved_by INT NULL,
    approved_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (class_id) REFERENCES classes(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id),
    FOREIGN KEY (topic_id) REFERENCES topics(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    FOREIGN KEY (approved_by) REFERENCES users(id)
);

-- Questions table
CREATE TABLE questions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    quiz_id INT NOT NULL,
    question_text TEXT NOT NULL,
    question_type ENUM('multiple_choice', 'true_false', 'fill_blank') DEFAULT 'multiple_choice',
    marks INT DEFAULT 1,
    explanation TEXT,
    image VARCHAR(255),
    order_index INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE
);

-- Question Options table
CREATE TABLE question_options (
    id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT NOT NULL,
    option_text TEXT NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,
    order_index INT DEFAULT 0,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);

-- Quiz Attempts table
CREATE TABLE quiz_attempts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    quiz_id INT NOT NULL,
    start_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    end_time TIMESTAMP NULL,
    total_questions INT NOT NULL,
    correct_answers INT DEFAULT 0,
    wrong_answers INT DEFAULT 0,
    unanswered INT DEFAULT 0,
    score DECIMAL(5,2) NOT NULL,
    percentage DECIMAL(5,2) NOT NULL,
    passed BOOLEAN DEFAULT FALSE,
    time_taken INT, -- in seconds
    status ENUM('in_progress', 'completed', 'abandoned') DEFAULT 'in_progress',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);

-- User Answers table
CREATE TABLE user_answers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    attempt_id INT NOT NULL,
    question_id INT NOT NULL,
    selected_option_id INT,
    answer_text TEXT, -- for fill in blanks
    is_correct BOOLEAN DEFAULT FALSE,
    marks_obtained DECIMAL(3,1) DEFAULT 0,
    answered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (attempt_id) REFERENCES quiz_attempts(id) ON DELETE CASCADE,
    FOREIGN KEY (question_id) REFERENCES questions(id),
    FOREIGN KEY (selected_option_id) REFERENCES question_options(id)
);

-- Quiz Ratings table
CREATE TABLE quiz_ratings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    quiz_id INT NOT NULL,
    rating TINYINT CHECK (rating >= 1 AND rating <= 5),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id),
    UNIQUE KEY unique_user_quiz_rating (user_id, quiz_id)
);

-- Quiz Reports table
CREATE TABLE quiz_reports (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    quiz_id INT NOT NULL,
    report_type ENUM('inappropriate', 'wrong_answer', 'spam', 'other') NOT NULL,
    description TEXT NOT NULL,
    status ENUM('pending', 'resolved', 'dismissed') DEFAULT 'pending',
    admin_response TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    resolved_at TIMESTAMP NULL,
    resolved_by INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id),
    FOREIGN KEY (resolved_by) REFERENCES users(id)
);

-- Payments table
CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    quiz_id INT NOT NULL,
    transaction_id VARCHAR(100) UNIQUE NOT NULL,
    bkash_transaction_id VARCHAR(100) UNIQUE NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'BDT',
    payment_method VARCHAR(20) DEFAULT 'bkash',
    status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    verification_status ENUM('pending', 'verified', 'rejected') DEFAULT 'pending',
    verified_by INT,
    verified_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id),
    FOREIGN KEY (verified_by) REFERENCES users(id)
);

-- Badges table
CREATE TABLE badges (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    icon VARCHAR(100),
    criteria_type ENUM('score', 'attempts', 'streak', 'level', 'category') NOT NULL,
    criteria_value INT NOT NULL,
    badge_color VARCHAR(7) DEFAULT '#FFD700',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User Badges table
CREATE TABLE user_badges (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    badge_id INT NOT NULL,
    earned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    quiz_attempt_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (badge_id) REFERENCES badges(id),
    FOREIGN KEY (quiz_attempt_id) REFERENCES quiz_attempts(id),
    UNIQUE KEY unique_user_badge (user_id, badge_id)
);

-- Leaderboards table (cached rankings)
CREATE TABLE leaderboards (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    category_id INT,
    class_id INT,
    subject_id INT,
    level VARCHAR(20),
    total_score INT DEFAULT 0,
    total_attempts INT DEFAULT 0,
    average_score DECIMAL(5,2) DEFAULT 0,
    rank_position INT DEFAULT 0,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (class_id) REFERENCES classes(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);
```

## Project Structure

```
quiz-app/
├── composer.json
├── .env
├── config/
│   ├── database.php
│   ├── app.php
│   └── bkash.php
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   └── uploads/
├── src/
│   ├── Controllers/
│   ├── Models/
│   ├── Services/
│   ├── Middleware/
│   └── Utils/
├── templates/
│   ├── layouts/
│   ├── pages/
│   └── components/
├── migrations/
└── vendor/
```

## Phase 1: Project Setup & Core Foundation (Week 1-2)

### 1.1 Environment Setup
- Initialize Composer project
- Install dependencies:
  ```bash
  composer require vlucas/phpdotenv
  composer require phpmailer/phpmailer
  composer require firebase/php-jwt
  composer require intervention/image
  ```
- Setup database connection
- Create basic routing system
- Implement authentication middleware

### 1.2 User Management
- User registration/login system
- Email verification
- Password reset functionality
- User profile management
- Role-based access control (Admin/User)

### 1.3 Basic Admin Panel
- Dashboard with statistics
- User management (view, activate, deactivate)
- Basic CRUD operations setup

## Phase 2: Content Management System (Week 3-4)

### 2.1 Category Management
- Create/Edit/Delete categories (School, Admission, Job, Skill Development)
- Category status management
- Category-wise analytics

### 2.2 Hierarchical Structure
- Class management under categories
- Subject management under classes
- Topic/Chapter management under subjects
- Bulk import/export functionality

### 2.3 Admin Controls
- Approval workflow for user-generated content
- Content moderation tools
- Bulk operations

## Phase 3: Quiz Management System (Week 5-7)

### 3.1 Quiz Creation
- Quiz builder interface
- Question types (Multiple choice, True/False, Fill in blanks)
- Question bank management
- Image upload for questions
- Quiz settings (duration, attempts, passing marks)

### 3.2 Quiz Categories & Levels
- Level-based categorization (Beginner, Intermediate, Advanced)
- Subject/Class/Category assignment
- Quiz tagging system

### 3.3 Event-Based Quizzes
- Scheduled quiz system
- Registration management
- Countdown timers
- Automated start/end functionality

## Phase 4: Quiz Taking Engine (Week 8-9)

### 4.1 Quiz Interface
- Responsive quiz taking interface
- Timer functionality
- Progress tracking
- Auto-save answers
- Question navigation

### 4.2 Result System
- Immediate result display
- Detailed answer explanations
- Performance analytics
- Result history

### 4.3 Attempt Management
- Multiple attempt handling
- Best score tracking
- Attempt limitations

## Phase 5: Payment Integration (Week 10-11)

### 5.1 bKash Integration
- bKash payment gateway setup
- Transaction handling
- Payment verification system
- Receipt generation

### 5.2 Paid Quiz System
- Premium quiz marking
- Access control for paid content
- Payment history
- Refund management

### 5.3 Transaction Management
- Transaction ID verification
- Payment status tracking
- Admin payment approval system

## Phase 6: Gamification & Social Features (Week 12-13)

### 6.1 Badge System
- Achievement badges
- Performance-based rewards
- Badge display system
- Custom badge creation

### 6.2 Rating & Review System
- Quiz rating functionality (1-5 stars)
- Written reviews
- Average rating calculation
- Review moderation

### 6.3 Report System
- Quiz reporting functionality
- Report categories
- Admin review system
- Automated actions

## Phase 7: Leaderboard System (Week 14-15)

### 7.1 Ranking System
- Overall leaderboards
- Category-wise rankings
- Class/Subject specific leaderboards
- Level-based rankings

### 7.2 Performance Metrics
- Score calculations
- Streak tracking
- Average performance
- Comparative analytics

### 7.3 Leaderboard Display
- Real-time updates
- Filtering options
- Historical data
- Social sharing

## Phase 8: Advanced Features (Week 16-17)

### 8.1 Analytics Dashboard
- User performance analytics
- Quiz performance metrics
- Revenue analytics
- Engagement statistics

### 8.2 Notification System
- Email notifications
- In-app notifications
- Quiz reminders
- Achievement alerts

### 8.3 Mobile Optimization
- Responsive design improvements
- Touch-friendly interfaces
- Offline capability (basic)

## Phase 9: Testing & Optimization (Week 18-19)

### 9.1 Testing
- Unit testing
- Integration testing
- User acceptance testing
- Performance testing

### 9.2 Security Hardening
- SQL injection prevention
- XSS protection
- CSRF protection
- Input validation

### 9.3 Performance Optimization
- Database query optimization
- Caching implementation
- Image optimization
- Code minification

## Phase 10: Deployment & Launch (Week 20)

### 10.1 Production Setup
- Server configuration
- Database optimization
- SSL certificate
- Backup system

### 10.2 Launch Preparation
- Content seeding
- User guides
- Admin training
- Marketing materials

## Key Features Implementation Details

### Authentication System
```php
// JWT-based authentication
// Session management
// Role-based middleware
```

### Quiz Engine
```php
// Question randomization
// Timer implementation
// Auto-submit functionality
// Progress tracking
```

### Payment Integration
```php
// bKash API integration
// Transaction verification
// Webhook handling
// Payment status updates
```

### Leaderboard Calculation
```php
// Scheduled ranking updates
// Real-time score calculation
// Category-wise rankings
// Performance metrics
```

## Security Considerations
- Input sanitization and validation
- Prepared SQL statements
- CSRF token implementation
- Rate limiting for API endpoints
- File upload security
- Password encryption (bcrypt)

## Performance Optimization
- Database indexing strategy
- Query optimization
- Caching implementation (Redis/Memcached)
- Image optimization and CDN
- Lazy loading for large datasets

## Scalability Planning
- Database sharding strategy
- Load balancing considerations
- Microservices architecture migration path
- API rate limiting
- Automated backup and recovery

## Maintenance & Updates
- Database migration system
- Version control strategy
- Automated testing pipeline
- Error logging and monitoring
- Regular security updates

This roadmap provides a comprehensive 20-week development plan for your online quiz application with all requested features including payment integration, multi-level categorization, leaderboards, and gamification elements.