# Momentum - System Architecture

## 1. Technology Stack

### Backend

Framework:
- Laravel

Language:
- PHP

Database:
- MySQL

---

### Frontend

Rendering:
- Blade Templates

Styling:
- Tailwind CSS

Interactivity:
- Alpine.js

Build Tool:
- Vite

---

### Testing

Framework:
- Pest

---

## 2. Application Structure

Momentum follows the Laravel MVC architecture.

---

## 3. Core Application Components

### Authentication Module

Responsible for:

- User registration
- Login
- Logout
- Profile management

Provided by Laravel Breeze.

---

### Task Management Module

Responsible for:

- Creating tasks
- Updating tasks
- Completing tasks
- Managing task information

---

### Recommendation Engine

The main feature of Momentum.

Responsible for:

- Evaluating user tasks
- Calculating task priority
- Ranking possible actions
- Suggesting the next task

---

### Notification System

Responsible for:

- Deadline reminders
- Task alerts
- Daily recommendations

---

## 4. Database Overview

Initial entities:

### User

Stores account information.

---

### Task

Stores user-created tasks.

Possible attributes:

- title
- description
- category
- priority
- difficulty
- estimated_duration
- deadline
- status

---

### Category

Groups tasks into meaningful sections.

Examples:

- School
- Work
- Personal
- Health

---

## 5. Development Principles

### Keep It Simple

Avoid unnecessary complexity.

---

### Build Features Around User Problems

Features should exist because they solve a problem.

---

### Separate Responsibilities

Controllers handle requests.

Services handle business logic.

Models handle data.

---

### Build Incrementally

Features should be developed, tested, and committed individually.