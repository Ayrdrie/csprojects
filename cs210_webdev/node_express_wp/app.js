'use strict';

const express = require('express');
var WPAPI = require('wpapi');
const app = express();

var wp = new WPAPI({
    endpoint: 'http://www.mywordpress.local/wp-json',
    username: 'root',
    password: 'root'

});

app.get('/', (req, res, next) => {
   res.send('Hello world!');
});

app.get('/getPosts', (req, res, next) => {
    wp.posts().get(function( err, data){
        if(err) {
            console.log('An error occurred' + err);
        }
        console.log('Here is the data: ' + data);
        res.send(data)
    })
    //res.send('See posts in the console')
    //res.send(data)
});

app.get('/generatepost', (req, res, next) => {
    console.log("Try to post here");
    //res.send('Got a POST request')
    wp.posts().create({
    //Title and Content are required properties
    title: "Generated Post",
    content: "Here is a randomonly generated post",

    //Post is created as a draft by default if a specific "status" is not specified
    status: 'publish'
    }).then(function( response ) {
      console.log("Here is the post ID: " + response.id );
      res.send(response);
    })

});

app.put('/', function(req, res){
    res.send('Got a POST request')
})

app.listen(3000, () => console.log('Example app listening on port 3000!'))