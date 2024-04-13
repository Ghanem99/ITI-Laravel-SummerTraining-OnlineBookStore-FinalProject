## Project Description

<aside>
💡 The website is divided into two modules:
    
● Student
● Admin
</aside>
<br>

● Admin Module Features 

- Admin can see (Borrowed books - All Books - All User )
- Admin can add/update/ delete books
- Admin can search student by using their
student ID
- Admin can also view student details
- Admin can update their own profile.
- Authorization is applied so only the admin can
perform these tasks.

● Students Module features

- Students can register to the website.
- Students can view all the books and their details.
- Students can borrow a book.
- After login students can view their own dashboard
(they can see the books they borrowed before and
they can return it back to the shelf)
- Students can update their own profile.
- Students can view the borrowed book and book
return date-time.

## ERD Description

ERD (Entity Relationship Diagram) for a website that enables students to borrow and return books from the library.

### Entities:

1. Student: Stores information about the students.
    - Student ID (Primary Key)
    - Name
    - Email
2. Book: Stores information about the books available in the library.
    - Book ID (Primary Key)
    - Title
    - Available Copies
3. Borrow Transaction: Keeps track of the books borrowed by students.
    - Borrow ID (Primary Key)
    - Student ID (Foreign Key)
    - Book ID (Foreign Key)
    - Borrow Date
    - Return Date

### Relationships:

1. Many-to-Many relationship between Student and Book (Borrow Transaction):
    - One student can borrow multiple books.
    - One book can be borrowed by multiple students.
    - Connects Student and Book entities through the Borrow Transaction entity.
