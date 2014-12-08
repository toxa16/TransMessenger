TransMessenger
==============

A messenger which instantly translates your messages into different languages

Description
===========
This project combines messenger and translator. It seems to be very useful in the case when you speak with some person but you don't have common languages known. It greatly fits to the fifth theme of the Hackathon "Real time communication and translation", because it allows to communicate with translation in real-time mode.

Screenshots
===========
To use this app, first you have to sign up: leave your username, email, password and choose your language.

![alt tag](https://github.com/toxa16/TransMessenger/blob/master/screenshots/signup.PNG)

After that you are able to see a list of app's users.

![alt tag](https://github.com/toxa16/TransMessenger/blob/master/screenshots/findusers.PNG)

Choose one of the user, and you can start chatting with him using instant translator or just sending raw (original) messages.

![alt tag](https://github.com/toxa16/TransMessenger/blob/master/screenshots/Antonio.PNG)
![alt tag](https://github.com/toxa16/TransMessenger/blob/master/screenshots/Alejandro.PNG)

APIs used
=========
1. Respoke - used for providing messaging service.
2. Lingo24 - translation API, used to translate messages.
3. APItools - a aservice used for tracking APIs' work.

Also I was trying to use Spellcheck from Mashape, but unfortunately spellchecked messages were generally worse than original, so I eventually decided to refuse from this API.

Additional information
======================
TransMessenger project is driven on Yii Framework, a PHP framework. 

For frontend scripts jQuery was used.
