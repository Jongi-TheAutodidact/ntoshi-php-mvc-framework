# ntoshi-php-mvc-framework 
With a user-friendly interface and intuitive design patterns, Ntoshi MVC Framework takes you from the absolute beginning of your project to about 70% completion in no time. Our framework is not only easy to use but also highly customizable to fit the needs of your unique project.
This lightweight, easy-to-use framework offers a fast and efficient way to develop and maintain your PHP applications with minimal hassle. Whether you're a seasoned developer or just starting out, this framework has everything you need to bring your projects to life.

## Features
- **MVC Architecture**: The framework follows the Model-View-Controller (MVC) pattern, making it easier to manage and maintain your application code.
- **Easy to use**: This framework is designed to be simple and straightforward, allowing you to get started quickly and easily.
- **Lightweight**: The framework is built to be lightweight, reducing the overhead and bloat often found in other frameworks.
- **CRM state of readyness**: This framework ships with already configured modules, on the fly(Dashboard).
- **Command Line Dev**: CLI functionality for even more seamless development.
- **In-App Blog**: Seamlessly engage with clients and the wider community on issues of interest through in-app blogging features.
- **All-in-One Application**: Combines a Business Management System and Content Management System with a front-end website, all in a single platform.
- **Framework Version**: Beta Version - the framework is still under robust development.

### Development Made Easy

- **CLI Development**: Streamline development tasks with CLI commands for database operations, model and controller creation, and more.

## Getting Started - Installation

1. **Using Github**: To get started, simply clone the repository and follow the installation instructions. Once installed, you can begin building your application using the framework's features, OR

2. **Using Composer**: Install project using Composer. <br>
   STEP ONE
    ```bash
    composer create-project --stability=beta jongi/ntoshi [your-project-name]
    ```
   STEP TWO
   - **Database Setup**: Create a new database.
    ```bash
    php jongi db:create [dbname]
    ```
    STEP THREE (inside `app/core/config.php`)
    - **Configure The Database Name**: Update the database name to match the recently created database (line 9).
    ```bash
    /** database config **/
	define('DBNAME', 'ntoshi_framework_db');
    ```
   
    - **Configure Root Path**: Update the "ROOT" constant value such that it matches the name of the directory you have set your project in. Replace `ntoshi-framework` (line 15)
    ```bash
    /** rootpath config **/
	define('ROOT', 'http://localhost/ntoshi-framework/public');
    ```

   - **Configure User Roles**: Configure User Roles inside `app/core/config.php`at about line 45. See below:    
    ```bash
    define('USER_ROLES', array_map('ucwords', array_map('strtolower', [
	    'Admin',
	    'User',
	    'Customer'
	])));
    ```
    STEP FOUR
   - **Migrations**: Configure and execute migrations to set up the database tables.
    ```bash
    php jongi migrate:all
    ```
    STEP FIVE
   - **Spin The Server**: Start the server and open your application on your default browser, automatically using only the command below.
    ```bash
    php jongi spinit
    ```
   DEFAULT ADMIN USER
   - **Login Credentials**: 
    ```bash
    Username: MbuMpofu
    Email: mbuzeli.mpofu@ntoshi.co.za
    Password: 12345678
    ```

Now your application is ready to go! Benefit from essential features such as user authentication, validation, and session management right out of the box.

- **Dark/Light Mode**: Customize the user interface with dark and light mode options.
- **Google Translate Integration**: Enhance accessibility with front-end language translation capabilities.
- **Company Details and Social Links**: Easily manage company information and social media links within the application.

## License

This project is licensed under the GPL-3.0-or-later license.

## Credits

In summary, the  Ntoshi MVC framework offers a unique blend of functionality, combining the flexibility of CMS (Content Management System) with the power of a PHP Web Applications Framework. Experience streamlined development like never before! <br>
Powered by [Jongi Brands Tech Solutions](https://techsolutions.jongibrandz.co.za) <br>
Developed by [Jongi - TheTechKaffir](https://jongimbodla.africa)

## Documentation ##
For a quick easy guide, kindly get the documentation - [here](#)
## Contributing ##
If you would like to contribute to this project, please feel free to submit a pull request or open an issue on GitHub. We welcome all contributions and are always looking for ways to improve the framework.

## Support ##
If you need help or have any questions, please don't hesitate to reach out. You can either open an issue on GitHub or send an email to jongim@jongimbodla.africa. We are always happy to help and will do our best to respond in a timely manner.

## License ##
Ntoshi Framework is licensed under GPL-3.0-or-later [https://](https://spdx.org/licenses/GPL-3.0-or-later.html)https://spdx.org/licenses/GPL-3.0-or-later.html