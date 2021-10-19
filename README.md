# Rakshak - _a saviour in Covid19_

<img src="https://drive.google.com/uc?export=view&id=1sg3Tdf_MasShK8YpYuzgV6Bsn32DPGMK"/>



Taking into consideration the COVID situation of the world, especially India, the COVID19 pandemic has swept the lives of many people. This situation demands a platform where necessary information about the availability of medical assistants (like oxygen cylinders and plasma donors) is stated.

This project provides a solution to the real-time problem that is to find the oxygen cylinders and plasma donors around ourselves under a covid situation.

## Features

- Accessible to All Users
- Authentication of Data 
- Well-Formatted Content That Is Easy to Search
- Responsive Design
- Browser Consistency


> The overall design goal of the website is to 
> make it possible of all to get an information 
> about plasma donors and oxygen cylinders,
> without making an account or registrations.


## Requirements

Rakshak uses the following technologies:
- [Laravel 8](https://laravel.com/docs/8.x) -  A free, open-source PHP web framework
- [HTML5](https://dev.w3.org/html5/html-author/)
-  [Twitter Bootstrap](https://getbootstrap.com/) - Great UI boilerplate for modern web apps
- [Javascript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [JQuery](https://jquery.com/) - Mostly used javascript library
- [Charts.js](https://www.chartjs.org/) - Flexible JavaScript charting
- [MySQL](https://dev.mysql.com/downloads/mysql/) - An open-source relational database management system.


## Setup

Install the dependencies and devDependencies and start the server.
- XAMPP Server- [download](https://www.apachefriends.org/download.html)
- Download Composer from [download](https://getcomposer.org/download/) and follow [this](https://www.youtube.com/watch?v=bWPPDjpWgW8) to install Laravel.
- CDNs are included in the code itself
- To use phpmyadmin refer [this](https://docs.phpmyadmin.net/en/latest/)

## Project Notes
The project is intended to be used under two contexts:-
##### _Contributors_ 

<p float="left">
<img src="https://drive.google.com/uc?export=view&id=1cvhTo7n89y6NbBFm-0UHbenN-d-FLyxD" width="200" height="375"/>
<img src="https://drive.google.com/uc?export=view&id=1Hd8c3Jxkn50WB0dBrdAKGYKP2qN7XNEo" width="200"/>
</p>

 Contributors are the users who can view the current availability of oxygen cylinders and plasma all around India and after registering to the site can provide their help in any of the one forms. 
The contributors can be a single person in the case of a plasma donor or the head of any organization in the case of oxygen cylinders. 
Their data is authenticated and if valid, is displayed to other users who can benefit from that.

##### _Viewers_

![image](https://drive.google.com/uc?export=view&id=1BZAYbp9qAhkC7Qt85PHSrd_ID11z-UTg)

The users who without registering to the website can view the data of availability of plasma donors and oxygen cylinders which is provided by the contributors.

## Flow of the Website
##### Viewer features
- Viewer can view the graphical representation of the available plasma donors and oxygen cylinder oragnizations.
- The data is even represented in the tabular form with a search feature provided, to search for the data of a particular location.

##### Contributor features
- All features of a viewer are provided and the aditional features are listed below.
- Registeration and login of a contributor who wants to contribute as a lasma donor or a oxygen cylinder provider.
- Registeration is done with auhentication.
- At some later oint of time when a contributor can no more contribute then he can edit his status.

## MVC flow of the project
- #### Model
    - oxygenDonor.php
    - plasmaDonor.php
    - User.php
- #### View 
    - navs/auth.blade.php
    - navs/guest.blade.php
    - app.blade.php
    - pages/oxygenTable.blade.php
    - pages/plasmaTable.blade.php
    - profile/edit.blade.php
    - home.blade.php
    - welcome.blade.php


- #### Controller
    - HomeController.php
    - OxygenController.php
    - PlasmaController.php
    - ProfileController.php
    - PageController.php
    - UserController.php    


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://github.com/aditi0701/Rakshak-a_saviour_in_COVID19/blob/aditi0701-patch-1/CODE_OF_CONDUCT.md).

## Contributing Vulnerabilities

We will be really greatful if you contribute to make our project better. Go throught the [Contrbuting Rules](https://github.com/aditi0701/Rakshak-a_saviour_in_COVID19/blob/aditi0701-patch-1/CONTRIBUTING.md) once.
