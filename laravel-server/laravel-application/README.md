# Quick tutorial

Hello! In the following lines I'll show you how to interact with this Laravel Project.

## Steps

### Create an user

Using postman, you will have to make an POST API call to the following URI like image:

!["Create request method"](images/createUserRequest.png "Create request method")

### Login 

Using postman, you will have to make an POST API call to the following URI like image:

!["Login method"](images/login.png "Login method")

NOTE: It's mandatory to save the returned token in order to make the following call method


### Create tweet
Using postman, you will have to make an POST API call to the following URI like image:

!["Login method"](images/createTuit.png "Create Tweet")

You will have to add an Authorization Bearer with the returned token before

!["Add authorization method"](images/addAuthorization.png "Add authorization")

### Get all tweets

Using postman, you will have to make a GET POST API call to the follwing URI like image:

!["Get all tweets"](images/getAllTweets.png "Get all tweets")

You will have to add an Authorization Bearer with the returned token before again

