---
marp: true
size: 4:3
paginate: true
title: Project 1 – REST API Foundations
---

# Project 1 — User Manager API

## Secure REST API with PHP + MySQL
- Bearer Token authentication
- NGINX deployment
- Marp slides + cURL tests

---

# Slide 1 — Overview
- What you'll find in this repository
- Endpoints, testing, deployment

---

# Slide 2 — Requirements mapping
- 8+ REST APIs
- 2+ Bearer Token-protected endpoints
- MySQL DB with CRUD
- cURL + HTML/JS tests
- Marp slides
- NGINX deployment documentation & screenshots

---

# Slide 3 — API Design 
- POST /api/auth/register
- POST /api/auth/login
- GET  /api/users
- POST /api/users
- PUT  /api/users
- DELETE /api/users
- GET  /api/profile
- PUT  /api/profile
- GET  /api/users/roles?id={id}
- POST /api/password-reset

---

# Slide 4 — Database Schema (code/db.sql)
```sql
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) UNIQUE NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL);
CREATE TABLE tokens (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, token VARCHAR(255) NOT NULL, expires_at DATETIME NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX(token));
```

---

# Slide 5 — Configuring DB
- Edit DB_HOST, DB_NAME, DB_USER, DB_PASS
- Import `code/db.sql` into MySQL: `mysql -u root -p < code/db.sql`

---

# Slide 6 — Register
**Request**
```
POST /api/auth/register
Content-Type: application/json
{"email":"alice@example.com","password":"secret"}
```
**Response**
```
{"message":"registered","user_id":1}
```

---

# Slide 7 — Login 
**Request**
```
POST /api/auth/login
{"email":"alice@example.com","password":"secret"}
```
**Response**
```
{"message":"ok","token":"<TOKEN>"}
```

---

# Slide 8 — Using the Token (Authorization header)
- Add header: `Authorization: Bearer <token>`
- Token stored in `tokens` table with expiry

---

# Slide 9 — Get Users
- Protected by token (for this starter)
**Request**
```
GET /api/users
Authorization: Bearer <token>
```
**Response**
```
[{ "id":1, "email":"alice@example.com", "created_at":"..." }, ...]
```

---

# Slide 10 — Create User (POST /api/users)
- Admin-like endpoint (no role checks in minimal implementation)
**Request**
```
POST /api/users
{"email":"bob@example.com","password":"pass"}
```
**Response**
```
{"message":"created","user_id":2}
```

---

# Slide 11 — Update User 
**Request**
```
PUT /api/users
Authorization: Bearer <token>
{"id":2,"email":"bob2@example.com"}
```
**Response**
```
{"message":"updated"}
```

---

# Slide 12 — Delete User 
**Request**
```
DELETE /api/users
Authorization: Bearer <token>
{"id":2}
```
**Response**
```
{"message":"deleted"}
```

---

# Slide 13 — Profile GET 
- Returns authenticated user details
**Request**
```
GET /api/profile
Authorization: Bearer <token>
```
**Response**
```
{"id":1,"email":"alice@example.com","created_at":"..."}
```

---

# Slide 14 — Profile PUT 
**Request**
```
PUT /api/profile
Authorization: Bearer <token>
{"email":"alice+updated@example.com"}
```
**Response**
```
{"message":"profile updated"}
```

---

# Slide 15 — Roles endpoint 
- Minimal: returns static ['user'] role
**Request**
```
GET /api/users/roles?id=2
```
**Response**
```
{"user_id":"2","roles":["user"]}
```

---

# Slide 16 — Password Reset 
- Minimal stub to receive email
**Request**
```
POST /api/password-reset
{"email":"bob@example.com"}
```
**Response**
```
{"message":"password reset request received for bob@example.com"}
```

---

# Slide 17 — Test UI
- Live test page using Fetch API
- Stores token in localStorage
- Use Live Server to open it while PHP backend runs on localhost:8000

---

# Slide 18 — cURL Tests
- Run the included script to exercise the API endpoints
- Example: `bash tests/curl-tests-full.txt` (make executable or copy commands manually)

---

# Slide 19 — NGINX Deployment Steps
1. Install NGINX + PHP-FPM: `sudo apt update && sudo apt install nginx php-fpm php-mysql -y`
2. Copy project `code/` into `/var/www/project1`
3. Create `/etc/nginx/sites-available/project1` with contents (next slide)
4. Enable site: `sudo ln -s /etc/nginx/sites-available/project1 /etc/nginx/sites-enabled/`
5. Restart: `sudo systemctl restart nginx`

---

# Slide 20 — NGINX Config
```nginx
server {
  listen 80;
  server_name your_server_domain_or_IP;
  root /var/www/project1;
  index index.php index.html;

  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }

  location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.2-fpm.sock;
  }
}
```

---

# Slide 21 — Testing deployed server
- Use `curl http://your_server_domain/api/users` etc.
- Capture screenshot of a successful request to include in submission

---

# Slide 22 — Security Notes & Next Steps
- Production should use JWT libraries, HTTPS, revoke/rotate tokens, input sanitization
- Add role checks and rate limiting

---

# Slide 23 — Grading Checklist (fill in)
- [x ] ≥8 REST APIs
- [ x] ≥2 Bearer Token APIs
- [ x] cURL tests included
- [ x] HTML/JS tests included
- [ x] MySQL integration working
- [x ] Marp slides (this deck) converted to PDF
- [ x] NGINX deployment documented + screenshot

---
