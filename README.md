## Blog Project Structure and Flow


1) Home page 

Navbar - Blog (redirects to home page), Search bar shown at center( only for home page for logged in and non logged in user), Toggle Theme button , Login, Register (Once logged in , then Username is shown and logout button) 

Create button  - If the user is not logged in then button shows to login to create a blog ( and once logged in then he can click on create button again and create the blog)

Blog cards
 Latest blogs will be shown first , and pagination used so only 5 blogs per page, 
each blog card shows Name,.created_At time . edited(if blog is edited or nthg, if just created and not edited)

Then Title , then image 
Then relad Blog button , 
Then like dislike button(for non logged in users it is read only , only logged in users can react)
Then edit and delete button 

Then going down , It shows pagination links and Also text showing how many out of total blogs
Then footer


2) Register 
name,email, pass, confirm pass 
validation errors handled using toast also success msg , using js

3) Login
email, pass, remember me 
validation errors handled using toast also success msg , using js


CRUD of posts with title, content and image 
4) Create 
Create blog button at home page 
If the user is logged in then only he is allowed to post blog, if not logged in then Login to create blog button is shown

A new create page is opened , once click on create
User can type in title(req) and content(req) , and upload image

Content has cke editor

cancel button - again takes to home page

Post button, adds the post to db and redirects to home page with new post updated as latest and shown

Preview Blog button - helps to create a blog using axios (title and content) , image is loaded from local storage

**Here validation of form is happening using reload, so we need to make it using toast



4) Read  

Redirects to other page where full blog is shown, here blog is fetched using it's id.

Image is shown above, the username . created_at time . edited (if edited)
Then title then a brk line then content 
Below Edit and Delete button 
Back to Feed Button , to go to home page 

The char count of title and content is also shown

5) Edit and Update

It could also be edited from the home page or show blog page 

Redirects to other page where full blog current data is  shown and form is editable, here also blog is fetched using it's id. 
Title and content is required and content has cke 
Old image is shown in preview from the local storage 
If user removes all data from title and content then validation error is thrown , but here toast can be made 

If new image is added here then the old image will get deleted from db 

The char count of title and content is also shown, here the initial count is already reflected and new count keeps on updating


Cancel button - redirects to home page

Update button - updates the blog in db and then redirected to the home page and that blog will be shown as updated


6) Delete


It could be deleted from Home page or show blog page 
Once a delete is clicked then a modal is popped up using js and it will ask user whether he is sure, if yes, then blog will be deleted permanently from the db and it will also be removed from the home page using ajax

When the delete modal is triggered at that time , the blog that is to be deleted will be stored in a temporary state , from where if user cancels it can go back and if user deletes then it can get deleted successfully 


Features 

1) Live Search 

It searches title and username

The search box  is visible at the navbar 
Both logged in and logged out users can do live search 
It is shown on home page only and not on create, edit ,login,register page 

js code is executed only after full HTML page is loaded and DOM is created 
Js detects the typing, waits 300ms(debouncing - old timer destroys and new is created ), then the old request is aborted, then input value is stored in query and sends Ajax req to Laravel route , controller searches db, Laravel returns HTML partial, js replaces blog section dynamically 


2) Toggle theme

the button is on the navbar 
Dark to light and vice versa
It is using the data-theme of daisy UI , light and dark 
using ajax

For cke editor and paginate we need to overwrite the css to get the expected output 

3) Like-Dislike

created reactions table , with user_id and blog_id as foreign key, 
many<->many relationship among user , blog, reaction
 
Used Laravel Livewire framework(updates like/dislike instantly , without page reload)
 
Logic used: 
Logged out user can only see the like and dislike count
- eager loaded like and dislike count
 
Logged in user can like or dislike 
- it highlights like/dislike for logged in user when user clicks on like/dislike
- if user likes/dislike first time, count++
- if user again clicks the same button of same post, then the reaction is removed , count--
- if user clicks like and then clicks dislike of the same blog then like count-- and dislike count++ and vice versa

4)Paginate

Laravel pagination works with page reload , and adds ?page=2 , like this page number to the url, but we are handling it using ajax and without url change and no page reload 

JS intercepts that click and:
sends AJAX request instead
fetches new page content
replaces only blog section and not the whole page 

It is useful as we are doing livesearch using ajax and paginate also using ajax

5) CKE editor and character count- create and edit

normally for char count we can do  textarea.value.length

But as we are using CKE editor so as it returns text alonh with HTML tags so we have to use DOMParser 

first the whole DOM will be loaded and then   

6) Preview blog (before blog creating) - using axios





code Structure 


1) Controller - Service Repo structure 

2) blade files  - partials, layout,components 






<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


