# Blog Management System

A complete Blog Management System built using Laravel and MySQL with an Admin Panel for managing blogs.

---

# 🚀 Live Demo

### Main Website
https://blog-management-system-ehxs.onrender.com

### Admin Panel
https://blog-management-system-ehxs.onrender.com/admin/blogs

---

# 🔐 Admin Login Credentials

### Email
admin@gmail.com

### Password
password123

---

# ✨ Features

- Admin Authentication
- Create Blog
- Edit Blog
- Delete Blog
- AJAX Delete with SweetAlert
- Image Upload
- Rich Text Editor (Summernote)
- Responsive Admin Dashboard
- Blog Categories
- Dynamic Blog Distribution Chart
- Blog Listing Page
- Blog Detail Page
- Clean UI Design

---

# 🛠 Tech Stack

## Frontend
- HTML
- CSS
- JavaScript
- jQuery
- SweetAlert2
- Chart.js
- Summernote Editor

## Backend
- Laravel 13
- PHP 8+

## Database
- MySQL

---

# ⚙️ Setup Instructions

## 1️⃣ Clone Repository

```bash
git clone https://github.com/bansalpratham/blog-management-system.git


---

## 2️⃣ Move Into Project Folder

```bash
cd blog-management-system
```

---

## 3️⃣ Install Dependencies

```bash
composer install
```

---

## 4️⃣ Create Environment File

```bash
cp .env.example .env
```

---

## 5️⃣ Generate App Key

```bash
php artisan key:generate
```

---

## 6️⃣ Configure Database

Update `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## 7️⃣ Run Migrations

```bash
php artisan migrate
```

---

## 8️⃣ Start Development Server

```bash
php artisan serve
```

---

# 📂 Project Structure

```text
app/
resources/views/
routes/
database/
public/uploads/
```

---

# 👨‍💻 Developed By

Pratham Bansal

---

# 📌 Notes

This project was developed as part of an internship assignment.