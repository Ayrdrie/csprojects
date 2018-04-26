# csprojects
Computer Science projects by Ayrdrie


### STEPS FOR SETUP
1. Build docker containers
    * cd cs210_webdev/docker_wordpress 
    * type the following command
    ```./build-images.sh  4.9.1```
2. Verify containers are created
    * using this command: ```docker images```
3. Initialize wordpress database.
    * Docker compose downloads MySQL and runs it. ```docker-compose up -d db```
    * cd db_setup
    * Run setup script with the following:
```docker run --name wp_stateless_setup --rm --interactive \
-v $(pwd)/output:/var/config \
-v $(pwd)/wp-cli.yml:/var/www/html/wp-cli.yml \
-v $(pwd)/setup.sh:/var/www/html/setup.sh \
wp-stateless-cli:wp-4.9.1 /var/www/html/setup.sh
```
4. Stop database
    * ```docker-compose down ```
5. Create new Wordpress Image
    * cd ..
    * Move generated wp-config.php file ```mv db_setup/output/wp-config.php ./wordpress```
6. Create wordpress container
    * ```docker-compose build```
7. Edit your ETC host file with the following:
    * LINUX: ```sudo /bin/su -c "echo '127.0.0.1 www.mywordpress.local' >> /etc/hosts"```
    * MAC: ```sudo echo “127.0.0.1 www.mywordpress.local” >> /etc/hosts```
    * WINDOWS: google it to edit host file
8. Start mywordpress Container
    *```docker-compose up -d```
    
### TESTING THE CUSTOM REST API PLUGIN
#### This is the code from the file we will be testing: https://github.com/Ayrdrie/csprojects/blob/master/cs210_webdev/docker_wordpress/themes/twentyseventeen-child/functions.php
This is a custom REST API that creates a new rest path using PHP and the Wordpress rest API.  The custom rest API lists hosts by category using a GET request.  There are some setup steps you first need to do in order to enable this custom REST API.
1. Browser:  http://www.mywordpress.local 
    * If you see an image, you are connected.
2. Admin Login: http://www.mywordpress.local/wp-admin
    * Username:root, Password:root
    * Enable theme by Selecting the following:
        * Press 'My sites' --network admin --themes
        * Select 'Twenty Seventeen Child Theme'
        * Go to 'My Sites' --wordpress --dashboards
        --Select 'appearance' --themes
        --Activate 'Twenty Seventeen Child Theme'
3. Create post categories thru admin tool
    * Select 'post' 
    --click 'add new' 
    --type whatever you want for your post 
    --before you save add it to a category (bottom right feature)
    --save
    --Repeat until you have an efficient amount of data
4. Test that the PHP custom rest api plugin
	  * The plugin lets you query posts by category
	  * Open a browser and test out one of your posts
	      * Ex: http://www.mywordpress.local/wp-json/myposts/category?sports
	  * To see multiple categories just add an ‘&’ sign between your categories of choice
	      * Ex: http://www.mywordpress.local/wp-json/myposts/category?sports&school&cooking
  
### TEST THE NODE EXPRESS SERVER TO ACCESS WORDPRESS POSTS
#### https://github.com/Ayrdrie/csprojects/blob/master/cs210_webdev/node_express_wp/app.js  This file uses Node express  to create a simple REST API to interrogate Wordpress.
##### REQUIREMENTS:
    * Node version 8.x or above
    * NPM Version 5.8.x or above
1. cd to node_express_wp directory
2. ```Run npm install``` 
3. Run the node express server
    * ```node app.js```
4. Check if node server is running
    * ```http://localhost:3000/```
    * Shows Hello World
5. Show Posts using the Node WP API
    * http://localhost:3000/getPosts
