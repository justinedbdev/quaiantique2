# Quai Antique

**This Fullstack project is based on an exercise proposed during my training with Studi.**

## Technologies

This project uses the following technologies:
- HTML / CSS / Javascript
- Bootstrap 5
- PHP 8.1 / Symfony 6 / TWIG
- MySQL
- Heroku

## Project presentation

**Subject of the project :**

The project involved the creation of a showcase website for the "Quai Antique" restaurant in Chambéry, featuring Savoy dishes by Chef Arnaud Michant. This restaurant offers a real gastronomic experience for lunch and dinner, with no-frills cooking and quality dishes.

**Expected functionalities:**
- Login: For the administrator
- Create an image gallery: Visible on the homepage and editable in the back-office
- Publish menu: Present on a dedicated page and editable in the back-office
- Present menus: Modifiable in the back-office
- Set opening times: Can be modified in the back-office
- Book a table: Form available on a dedicated page, and admin must have access to back-office reservations.

**For this project, several deliverables were expected:**
- Class diagram 
- Use case diagram 
- Sequence diagram based on the "Book a table" functionality
- Corporate identity and style guide 
- Wireframes 
All these documents can be viewed at the end of the Read Me. 

## Utilisation

To create my project, I used Symfony CLI with the -webapp option in order to have a global project base, containing all the tools made available by Symfony, in particular Composer, Doctrine, Profiler and Mailer. I installed and used the EasyAdmin bundle to create my administration interface and Maildev to manage sending and receiving emails in development mode.

To connect the database, this can be found in the .env file. You must add the data relating to BDD and your RDBMS in the DATABASE_URL.

```
DATABASE_URL="mysql://USER:PASSWORD@HOST:3306/DBNAME?serverVersion=10.6.11-MariaDB"
```

Use this command to start a local server :

```
$ symfony serve
```

## Views

**- Homepage Screenshot**

![Homepage Screenshot](https://github.com/justinedbdev/quaiantique2/assets/124370560/03ed7b05-7374-4143-8543-9064da415abd)

**- Class diagram**

![Class Diagram](https://github.com/justinedbdev/quaiantique2/assets/124370560/7308252e-e805-4bb1-b14b-0177613227e6)

**- Use case diagram**

![Use case diagram](https://github.com/justinedbdev/quaiantique2/assets/124370560/5816a3a8-a9b3-4363-b242-1c76a467aed3)

**- Sequence diagram based on the "Book a table" functionality**

![Sequence diagram](https://github.com/justinedbdev/quaiantique2/assets/124370560/e0c72742-32a5-4b56-9724-fd59963f2bc0)

**- Corporate identity and style guide** 

![Corporate identity and style guide](https://github.com/justinedbdev/quaiantique2/assets/124370560/d8d481ba-91b5-4590-b4a0-9095e2704b36)

**- Wireframes**

![HOMEPAGE - DESKTOP](https://github.com/justinedbdev/quaiantique2/assets/124370560/8f97d9e3-266f-4851-a6b7-df28e576fbdd)
![HOMEPAGE- MOBILE](https://github.com/justinedbdev/quaiantique2/assets/124370560/3e26f0d0-f2e3-451b-bcce-2d0561b8d72c)
