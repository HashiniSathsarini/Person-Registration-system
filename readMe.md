#  Person Registration System

A Laravel-based Person Registration System for a financial institution with secure login, role-based access, and live search functionality.


## Admin and User Credentials

### Admin User
- **Username**: `admin@gmail.com`
- **Password**: `admin@1234`

### Viewer Users
- **Username**: `user@gmail.com`
- **Password**: `user@1234`

- **Username**: `orange@orange.com`
- **Password**: `user@1234`

## Features

- ✅ User Authentication (Login/Logout)
- ✅ Role-Based Access (Admin, Viewer)
- ✅ Add/Edit Person Records (Admin only)
- ✅ Ajax-Based Live Search (Admin only)
- ✅ Form Validation
- ✅ MySQL Database in 3rd Normal Form (3NF)



## Technologies Used

- **Backend**: PHP (Laravel Framework)
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap
- **Interactivity**: JavaScript, Ajax



## 🗃 Database Schema (3NF)

- **Users** – Stores login credentials and role information
- **Customers** – Stores personal data of registered individuals
- **Genders** – Lookup table for gender options

---

## 💡 Usage

1. **Login** using the credentials provided above.
2. **Admin Users** can:
   - Add new person records
   - Edit existing records
   - Use live Ajax search
3. **Viewer Users** can:
   - Only view records (read-only access)
4. **Search Functionality**:
   - Use the search bar to filter persons by **name**, **NIC**, etc.
  
     
