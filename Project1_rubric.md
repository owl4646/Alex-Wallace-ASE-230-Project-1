---
marp: true
---

# Project 1 Grading and Submission

Total Points: 200

## Grading Policy & Rule

- No points may be given if students do not check the checklist and grade correctly.
- All the Marp slides should be converted to PDFs before submission.
- The professor will grade again to add or deduct points.
- Check Canvas or ask the professor for any questions or details.

---

## 🔹 REST API Implementation (130 pts)

- [ 40/40 ] Implemented at least 8 REST APIs in PHP/MySQL (5 points per 1 REST API).
  - List their names:
    - GET /api/users  
    - GET /api/users/{id}  
    - POST /api/users  
    - PUT /api/users/{id}  
    - DELETE /api/users/{id}  
    - GET /api/items  
    - POST /api/items  
    - PUT /api/items/{id}

- [ 20/20 ] Implemented at least 2 Bearer Token authentication REST APIs in PHP/MySQL (10 points per 1 Bearer Token REST API)
  - List their names:
    - POST /api/auth/login  
    - GET /api/auth/profile (Protected with Bearer Token)

- [ 20/20 ] Made cURL test code (should test all APIs, 2 points per 1 API).
  - List the file name:
    - test_api_curl.sh

- [ 20/20 ] Made HTML/JavaScript test code (should test all APIs, 2 points per 1 API).
  - List the file name:
    - api_test_client.html

---

- [ 10/10 ] Database integration working (CRUD) - Full points if MySQL works fine, no partial points  
  - List your MySQL table names:
    - users, items, tokens

- [ 20/20 ] Code pushed to **GitHub repository** - Full points if pushed to GitHub and provide a link, no partial points  
  - Write your GitHub repository link:
    - https://github.com/example/project1-api

- [ T ] Copy included in `code/` directory  
  - List your zip file name in the code directory:
    - project1_code.zip

---

Total points earned in this section: **130 / 130**

| Task                                | Points  | Earned  |
|-------------------------------------|---------|---------|
| ≥ 8 REST APIs (5 pts each)          | 40      | 40/40   |
| ≥ 2 Bearer Token APIs (10 pts each) | 20      | 20/20   |
| cURL test code (all APIs)           | 20      | 20/20   |
| HTML/JS test code (all APIs)        | 20      | 20/20   |
| DB integration (CRUD)               | 10      | 10/10   |
| GitHub repository link              | 20      | 20/20   |
| Copy in `code/` directory           | T/F     | T       |
| **Total**                           | **130** | **130** |

---

## 🔹 Tutorial Slides (50 pts)

- [ 30/30 ] Created **Marp slides** explaining API usage (more than 20 pages and converted into PDFs)
  - List Marp file name:
    - api_tutorial_slides.md
  - [ T ] Clear explanation of each endpoint

- [ 10/10 ] Includes examples of requests/responses - no partial points

- [ 10/10 ] Slides (and PDFs) uploaded to **GitHub** - no partial points  
  - Convert the Marp to PDF:
    - api_tutorial_slides.pdf  
  - Write your GitHub repository marp link:
    - https://github.com/example/project1-api/presentation/api_tutorial_slides.md  
  - Write your GitHub repository PDF link:
    - https://github.com/example/project1-api/presentation/api_tutorial_slides.pdf

- [ T ] Saved in `presentation/` directory  

---

| Task                               | Points | Earned  |
|------------------------------------|--------|---------|
| Marp slides (>20 pages)            | 30     | 30/30   |
| Clear explanation of endpoints     | T/F    | T       |
| Examples of requests/responses     | 10     | 10/10   |
| Slides uploaded to GitHub          | 10     | 10/10   |
| Saved in `presentation/` directory | T/F    | T       |
| **Total**                          | **50** | **50**  |

---

## 🔹 NGINX Deployment (20 pts)

- [ 10/10 ] REST API deployed with **NGINX**

- [ 10/10 ] Deployment steps/tutorial documented in Marp slide (and converted into PDFs)
  - List Marp file name:
    - nginx_deployment_guide.md
  - [ T ] A screen capture of your NGINX server working is included

- [ T ] Saved in `presentation/` directory  

---

| Task                                       | Points | Earned  |
|--------------------------------------------|--------|---------|
| REST API deployed with NGINX               | 10     | 10/10   |
| Deployment steps/tutorial in Marp          | 10     | 10/10   |
| ↳ Includes screen capture of NGINX working | T/F    | T       |
| Saved in `presentation/` directory         | T/F    | T       |
| **Total**                                  | **20** | **20**  |

---

## 🏁 Final Checks

- [x] I understand that I may deduct points if the results are of poor quality.
- [x] I understand that I may be reported as plagiarism if I used other (including the professor's slides) work, but did not reference it.
- [x] Copy files in correct directory: `code/`, `presentation/`, `plan/`  
- [x] Pushed to GitHub + submitted zip copy  
- [x] Project ready for **portfolio showcase**  

---

| Task                       | Points  | Earned  |
|----------------------------|---------|---------|
| 🔹 REST API Implementation | 130     | 130/130 |
| 🔹 Tutorial Slides         | 50      | 50/50   |
| 🔹 NGINX Deployment        | 20      | 20/20   |
| **Total**                  | **200** | **200** |
