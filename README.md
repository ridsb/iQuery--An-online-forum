# iQuery: Online Forum for Coding Questions and Answers

Welcome to **iQuery**, an online forum designed for coding enthusiasts, from beginners to experts, to ask questions, share answers, and collaborate on coding challenges. This platform is created to foster a community-driven environment where knowledge is shared, and learning is continuous.

## Features

- **User Authentication:** Secure login and registration system for users.
- **Question and Answer:** Post questions, provide answers, and engage in discussions.
- **Comment System:** Add and view comments on questions and answers.
- **Categories:** Organize questions by categories for easier navigation.
- **Search Functionality:** Find questions and answers quickly using the search feature.
- **Responsive Design:** Access the forum seamlessly across different devices.

## Login page:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/29e48366-4c5c-47b5-b96a-7dad737116fd)

## About page:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/caa2ba83-491a-417c-81b2-c4cb3a0d01d9)

## Contact me:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/cb1f22a1-508d-4a81-8e43-9d7694d65305)

## Dropdown:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/efe8df52-9537-4d67-baba-48c00f2b8379)

## Inside:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/719f3dc7-7636-488c-8e00-ec71e5b79315)

 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/99228756-a364-40f7-a05f-af2734ea601a)

## Ask a query page:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/612909cd-0837-4bc6-a97a-9c77ece36b44)

## Threads:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/158eb1d5-9b04-4836-a054-b2c2a713ef45)

## Comments section:
 ![image](https://github.com/ridsb/iQuery--An-online-forum/assets/108459805/96a4946e-aef3-48b8-b87e-02d7dded16fc)


## Installation

To set up iQuery locally, follow these steps:

1. **Clone the Repository:**
    ```sh
    git clone https://github.com/yourusername/iQuery.git
    ```

2. **Navigate to the Project Directory:**
    ```sh
    cd iQuery
    ```

3. **Set Up the Database:**
    - Create a MySQL database named `iquery`.
    - Import the provided SQL file to set up the tables:
        ```sh
        mysql -u yourusername -p iquery < iquery.sql
        ```

4. **Configure the Database Connection:**
    - Update the database connection details in `partials/_dbconnect.php`.

5. **Start the Server:**
    - Use a local server like XAMPP or WAMP, and place the project in the `htdocs` (for XAMPP) or `www` (for WAMP) directory.
    - Start the Apache and MySQL modules.

6. **Access iQuery:**
    - Open your web browser and go to `http://localhost/iQuery`.

## Usage

- **Register:** Create a new account to start participating in the forum.
- **Login:** Access your account to post questions, answer others, and comment.
- **Ask Questions:** Post your coding questions and get answers from the community.
- **Answer Questions:** Help others by providing answers to their coding queries.
- **Comment:** Add comments to questions and answers to provide additional insights.

## Contributing

We welcome contributions to enhance iQuery! Here's how you can help:

1. **Fork the Repository:** Click the "Fork" button on the top right of this page.
2. **Clone Your Fork:** 
    ```sh
    git clone https://github.com/yourusername/iQuery.git
    ```
3. **Create a Branch:** 
    ```sh
    git checkout -b feature/your-feature-name
    ```
4. **Make Changes:** Implement your feature or fix.
5. **Commit Changes:**
    ```sh
    git commit -m "Describe your feature or fix"
    ```
6. **Push to Branch:**
    ```sh
    git push origin feature/your-feature-name
    ```
7. **Create a Pull Request:** Go to the original repository on GitHub and create a pull request.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

For any inquiries, issues, or suggestions, feel free to reach out:

- **Email:** your-email@example.com
- **GitHub:** [yourusername](https://github.com/yourusername)

Thank you for being a part of iQuery! Together, let's make coding easier and more enjoyable for everyone.
